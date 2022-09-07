<?php

    /* 
     * send.class.php
     *                                    
     *                                         __  __                _                     
     *                                      ___\ \/ /_ __   ___ _ __(_) ___ _ __   ___ ___ 
     *                                     / _ \\  /| '_ \ / _ \ '__| |/ _ \ '_ \ / __/ _ \
     *                                    |  __//  \| |_) |  __/ |  | |  __/ | | | (_|  __/
     *                                     \___/_/\_\ .__/ \___|_|  |_|\___|_| |_|\___\___|
     *                                              |_| HZKnight free PHP Scripts           
     *      
     *                                           lucliscio <lucliscio@h0model.org>, ITALY
     *
     * GuestBook Ver.1.0.0
     * 
     * -------------------------------------------------------------------------------------------
     * Lincense
     * -------------------------------------------------------------------------------------------
     * Copyright (C)2022 HZKnight
     *
     * This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU Affero General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU Affero General Public License for more details.
     *
     * You should have received a copy of the GNU Affero General Public License
     * along with this program.  If not, see <http://www.gnu.org/licenses/agpl-3.0.html>.
     * -------------------------------------------------------------------------------------------
     */    

    require_once 'includes/share.class.php';

    /**
     * Modulo per l'inserimento dei post nel GuestBook.
     * 
     * @author  lucliscio <lucliscio@h0model.org>
     * @version v 1.0.0
     * @copyright Copyright 2022 HZKnight
     * @license http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL3
     *   
     * @package eXperience/GuestBook
     * @filesource
     */

    class send {

        private $share;
        private $show_success = false;
        private $show_error = false;
        private $msg = "";

        public function __construct(){
            $this->share = new Share();
        }

        public function doAction (HttpRequest $request){
            global $db, $view;
            $info = ""; //Messagio
            
            $header = $this->share->makeHeader($request);

            // Definizione campi template
            $view->assign('name',"");
            $view->assign('email',"");
            $view->assign('message',"");
            $view->assign('place',"");

            if ($request->getParam('submit')){
                
                $status = $this->validateData($request);
                
                if ($status == "OK"){

                    $sql = 'insert into $_guestbook_post (nick,mail,nazione,messaggio,data) values (\''.
                            $request->getParam('name').'\',\''.
                            $request->getParam('email').'\',\''.
                            ucfirst($request->getParam('place')).'\',\''.
                            ucfirst($this->formatMessage($request->getParam('message'))).'\',\''.
                            date("d.F.Y").'\')';
                    
                    $db->doUpdate($sql);
                    
                    $this->msg = "Grazie per aver lasciato un messaggio nel GuestBook!!<br>Messaggio inserito correttamente!";
                    $this->show_success = true;
                        
                } else {
                    $view->assign('name',$request->getParam('name'));
                    $view->assign('email',$request->getParam('email'));
                    $view->assign('message',$request->getParam('message'));
                    $view->assign('place',$request->getParam('place'));

                    $this->msg = $status;
                    $this->show_error = true;
                }
                
            } 
            
            $view->assign('info', $this->msg);        
            $view->assign("show_success", $this->show_success);
            $view->assign("show_error", $this->show_error);
            
            return $view->draw('guestbook/send',true);
        }
        
        private function validateData (HttpRequest $request){
            
            $nm = 1;
            $errmsg=""; 

            if(empty($request->getParam('name')))
            {
                $errmsg .= "Devi inserire il tuo Nome o un Nick!";
            }
            
            if(empty($request->getParam('message')))
            {
                $errmsg .= "&nbsp;Devi inserire un messaggio!";
            }	 
            
            if(!empty($request->getParam('name'))&&!empty($request->getParam('message')))
            {
                if (!empty($request->getParam('email')))
                {
                    if(!eregi("^[A-za-z0-9\_-]+@[A-za-z0-9\_-]+.[A-za-z0-9\_-]+.*",$request->getParam('email')))
                    {
                        $errmsg.="La tua E-mail non &egrave; corretta!";
                    }
                }
            }
            
            if($errmsg != ""){
                return $errmsg;
            } else {
                return 'OK';
            }
                                            
        }
        
        private function formatMessage($message){
            //////Divisione del messaggio in rige di 110 caratteri/////////////////////////////
            $a =  strlen($message);
            
            if ($a>110)
            {
                $i = 104;
                $messager = "";
            
                for ($c=0;$c<=$a;$c++)
                {
                    $p=0;
                    $messager.=$message[$c];
                    
                    if ($c == $i)
                    {
                        if ($message[$c+1]!= " ")
                        {
                            $cc = $c+1;
                
                            while ($message[$cc]!= " ")
                            {
                                $messager.=$message[$cc];
                                $cc++;
                            }
                            
                            $p = $cc-$c;
                            $c = $cc-1;
                        }
                        
                        $messager.="<br>";
                        $i+=(110+$p);
                    }
                
                }
            
                $message = $messager;
                
            }
        
            //$message = $this->smile($message);
            
            return $message."<br><br>";
        }
        
    }
