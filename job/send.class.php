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
class send {
     public function doAction (HttpRequest $request){
         global $db, $view;
         $info = "";
         
         if ($request->getParam('submit')){
             
             $info = $this->validateData($request);
             
             if ($info == "OK"){
                 
                 $fp = fopen('data.htm','a');
                 
                 if(!$fp)
                 {
                     $info.= "Non &egrave; stato possibile salvare il tuo messaggio<br>ci scusiamo per l'nconveniente!!!<br>Errore di apertura del file!";
                     exit;
                 }
                 
                 $line = date("d.F.Y") . "#" . $request->getParam('name');
                 $line .= "#" . $request->getParam('email');
                 $line .= "#" . ucfirst($this->formatMessage($request->getParam('message')));
                 $line .= "#" . ucfirst($request->getParam('place'));
                 $line = str_replace("\r\n","<BR>",$line);
                 $line .= "\r\n";
                 fwrite($fp, $line);
                 
                 if(!fclose($fp))
                 {
                     $info.= "Errore di chisura file!";
                     exit;
                 }
                 
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
	
         $message = $this->smile($message);
         
         return $message."<br><br>";
     }
     
     private function smile ($message){
         $message = str_replace(":)","<img src='img/smile.png'>",$message);
         $message = str_replace(":-D","<img src='img/bigsmile.png'>",$message);
         $message = str_replace(":-O","<img src='img/omg.png'>",$message);
         $message = str_replace(":P","<img src='img/toung.png'>",$message);
         $message = str_replace(";)","<img src='img/wink.png'>",$message);
         $message = str_replace(":(","<img src='img/sad_smile.png'>",$message);
         $message = str_replace(":-S","<img src='img/confused.png'>",$message);
         $message = str_replace(":|","<img src='img/what_smile.png'>",$message);
         
         $message = str_replace(":_(","<img src='img/cry_smile.png'>",$message);
         $message = str_replace(":-$","<img src='img/red_smile.png'>",$message);
         $message = str_replace("(H)","<img src='img/shades_smile.png'>",$message);
         $message = str_replace(":-@","<img src='img/angry_smile.png'>",$message);
         $message = str_replace(":-#","<img src='img/47_47.png'>",$message);
         $message = str_replace("8o|","<img src='img/48_48.png'>",$message);
         $message = str_replace("8-|","<img src='img/49_49.png'>",$message);
         $message = str_replace("^o)","<img src='img/50_50.png'>",$message);
	
         $message = str_replace("+o(","<img src='img/52_52.png'>",$message);
         $message = str_replace(":^|","<img src='img/71_71.png'>",$message);
         $message = str_replace("*-)","<img src='img/72_72.png'>",$message);
         $message = str_replace("8-)","<img src='img/75_75.png'>",$message);
         $message = str_replace("|-)","<img src='img/77_77.png'>",$message);
         $message = str_replace("(A)","<img src='img/angel_smile.png'>",$message);
         $message = str_replace("(6)","<img src='img/devil_smile.png'>",$message);
         $message = str_replace(":-*","<img src='img/51_51.png'>",$message);
         
         $message = str_replace("<:o)","<img src='img/74_74.png'>",$message);
         $message = str_replace("(@)","<img src='img/cat.png'>",$message);
         $message = str_replace("(&)","<img src='img/dog.png'>",$message);
         $message = str_replace("(S)","<img src='img/moon.png'>",$message);
         
         return $message;
     }
}
