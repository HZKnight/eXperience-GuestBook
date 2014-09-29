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
        $myArray = file("data.htm");
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
        
        if ($page==$p) $dirplay++;

        $news = array_slice($myArray, $start, $display--);
        $end=$display*$page;

        if ($start != '0') {
            $new_page=$page-1;
            $prev="<a href='index.php?page=$new_page'><< Precedente</a>";
        } else {
            $prev="";
        }
        
        if ($end < $s) {
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
        
        foreach($news as $value)
        {
            $new=explode("#","$value");
            $posts[]=$new;
        }
        
        $view->assign("posts", $posts);
        
        return $view->draw("post", true); 
    }
}
