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
 * Description of home
 *
 * @author Luca
 */
class home {
    
    public function doAction (HttpRequest $request){
        global $view, $config, $db;
        
        $page = 1;

        if($request->getParam('page'))
        {
            $page = $request->getParam('page');
        }
    
        // create an array of data
        $sql = 'select * from $guestbook_post';
        $myArray = $db->doQuery($sql);
        
        $s=sizeof($myArray);
        
        $nummsg = count($myArray);
        
        // reverse the order of the data
        $myArray = array_reverse($myArray);
       
        //Caricamento messaggio di ben venuto
        $ben = file("data1.htm");

        // how many lines of data to display
        $display = $config->get_param('display_msg');

        // where to start depending on what page we're viewing
        $start = ($page * $display) - ($display);

        // the actual news we're going to print
        $ar=($nummsg+1)%$display; 
        $sum=($ar)?1:0; 
        $p=((($nummsg+1)-$ar)/$display)+$sum;
        
        if ($page==$p) $display++;

        $news = array_slice($myArray, $start, $display--);
        
        $end=$display*$page;

        if ($start != '0') {
            $new_page=$page-1;
            $prev="<a href='index.php?page=$new_page'><< Precedente</a>";
        } else {
            $prev="";
        }
        
        if ($page != $p) {
            $new_page1=$page+1;
            $next="<a href='index.php?page=$new_page1'>Successiva >></a>";
        } else {
            $next="";
        }

        $Pager = "Pagine [";
        for ($i=1;$i<=$p;$i++)
        {
            $Pager.=" <a href='?page=$i'>$i</a> ";
        }
        $Pager.="]";

        // printing the data
        $new1=explode("#","$ben[0]");
              
        $view->assign("announce", $new1[3]);
        $view->assign("num_mex", $nummsg);
        $view->assign("num_pages", $p);
        $view->assign("prev", $prev);
        $view->assign("next", $next);
        $view->assign("pager", $Pager);

        $posts = array();
        
        //sostituisco gli smile
        for ($i=0;$i<$s;$i++){
            $news[$i]['messaggio'] = $this->smile($news[$i]['messaggio']);
        }
        
        $view->assign("posts", $news);
        
        return $view->draw("post", true); 
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
