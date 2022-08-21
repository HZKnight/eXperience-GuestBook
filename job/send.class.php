<?php

/*
 * Copyright (C) 2014 Luca
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
 */

/**
 * Description of send
 *
 * @author Luca
 */

//require "env/php7support.inc.php";

class send {
    public function doAction (HttpRequest $request){
        global $db, $view;
        $info = "";
         
        // Definizione campi template
        $view->assign('name',"");
        $view->assign('email',"");
        $view->assign('message',"");
        $view->assign('place',"");

        if ($request->getParam('submit')){
            
            $info = $this->validateData($request);
             
            if ($info == "OK"){

                $sql = 'insert into $_guestbook_post (nick,mail,nazione,messaggio,data) values (\''.
                         $request->getParam('name').'\',\''.
                         $request->getParam('email').'\',\''.
                         ucfirst($request->getParam('place')).'\',\''.
                         ucfirst($this->formatMessage($request->getParam('message'))).'\',\''.
                         date("d.F.Y").'\')';
                 
                $db->doUpdate($sql);
                 
                $info = "<center><font color='green' size='1'>Grazie per aver lasciato un messaggio nel GuestBook!!<br>Messaggio inserito correttamente!</font>";
                    
            } else {
                $view->assign('name',$request->getParam('name'));
                $view->assign('email',$request->getParam('email'));
                $view->assign('message',$request->getParam('message'));
                $view->assign('place',$request->getParam('place'));
            }
             
        } else {
            $info = "<center><font face=\"verdana\" color=\"green\" size=\"1\">Scrivi un messaggio poi premi Invia per inserirlo nel GuestBook!!<br>";
          
        }
         
        $view->assign('info', $info);        
         
        return $view->draw('send',true);
    }
     
    private function validateData (HttpRequest $request){
         
        $nm = 1;
        $errmsg=""; 

        //below section checks that name feild is empty or not/////////////////////////////////////
        if(empty($request->getParam('name')))
        {
            $errmsg .= "<font color='red' size='1'>Devi inserire il tuo Nome o un Nick!</font>";
        }
         
        //////////////////////////////////below section checks that you have enter message or not
	    if(empty($request->getParam('message')))
        {
            $errmsg .= "<br><font color='red' size='1'>Devi inserire un messaggio!</font>";
        }	 
        
        //if every thing is filled////////////////////////////////
	    if(!empty($request->getParam('name'))&&!empty($request->getParam('message')))
	    {
            /////////////////////////////checks for the correct format of the email////////////////////////////////
            if (!empty($request->getParam('email')))
            {
		        if(!eregi("^[A-za-z0-9\_-]+@[A-za-z0-9\_-]+.[A-za-z0-9\_-]+.*",$request->getParam('email')))
		        {
                    $errmsg.="<font color='red' size='1'>La tua E-mail non &egrave; corretta!</font>";
		        }
            }
	        //////////////////////////////end of email check///////////////////////////////////
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
