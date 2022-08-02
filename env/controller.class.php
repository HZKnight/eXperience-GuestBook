<?php
/**		
 *      --------------------------------------------------------------------
 *      HZCms
 *      --------------------------------------------------------------------
 *      File: controller.class.php
 *      Description: controller dell'applicazione
 *		
 *      @author Luca Liscio & Marco Lettiri
 *      @version $Id: controller.class.php,v 2.0 2008/06/30 12:03:20
 *      @package rubrica
 *      --------------------------------------------------------------------
 *      
 *      Copyright 2008 Luca Liscio & Marco Lettieri 
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */
 
    session_start();	
 
    class Controller {
 	
        public function doService(HttpRequest $request) {
            global $db, $config, $view;
            
			$start = microtime();
			            
            $jobName = $request->getParam('job');

            if ($jobName == '') {
                $jobName = "home";
            }
                    
            $jobClassFileName = explode("env",dirname(__FILE__))[0]."/job/".$jobName.".class.php";
                           
            if(!class_exists($jobName)){
                if (file_exists($jobClassFileName)){
                    require_once($jobClassFileName);
                } else {
                    throw new RuntimeException("Sul disco manca il file con la definizione dell'azione '$jobClassFileName'");
                }
            }
				
            $jobClass = new $jobName();
					
            $res = $jobClass->doAction($request);
            
            $view->assign("content", $res);
            $view->assign("title",$config->get_param('title'));
            $view->assign("slogan",$config->get_param('slogan'));
            $view->assign("copy",$config->get_param('copyright'));
            
			settype($start, "float");
			$now = microtime();
			settype($now, "float");

            $view->assign("time", $now-$start);
            
            $view->draw("main");
            	
	       	//	 error_log("[".date("F j, Y, g:i a")."]-[Exception]-".$e->getMessage()." --> ".$e->getTraceAsString()."\n",3,"/home/luca/www/www/rubrica1/log/error.log");

        }
	
            
		private function makeSecure($job, $request){
			if((($_SESSION['zope_vars'][AUTHENTICATED_USER]!='root') and ($_SESSION['zope_vars'][AUTHENTICATED_USER]!='gnapoli')) and ($job->requireLogin)){
				header('Location: http://www.scienzemfn.unisa.it/facolta/login_form');
			}
			else
			{
				if ($request->getParam('job') != 'RecordExist'){ 	
					echo '<div id="region-content" class="documentContent">';
					if (($request->getParam('job')!='') and ($request->getParam('job')!='Admin') and ($job->requireLogin))
					{
						echo ' <p align="right" style="border:1px dotted lightgrey; font-size:10px;">
										<a href = "rubrica/iview/?job=Admin"><b>Amministrazione</b></a>
									</p>';
					
						$job->doAction($request);
						
						echo ' <p align="right" style="border:1px dotted lightgrey; font-size:10px;">
										<a href = "rubrica/iview/?job=Admin"><b>Amministrazione</b></a>
									</p>';
					}
					else
					{
						$job->doAction($request);
					}
					echo '</div>';
				}
				else
					$job->doAction($request); //job invocati tramite ajax
			}
		}
	}

	class Result {
		public $data="";
		public $tpl="";
	}
	
?>
