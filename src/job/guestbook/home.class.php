<?php

    /* 
     * home.class.php
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
     * Modulo per la visualizzazione dei post nel GuestBook.
     * 
     * @author  lucliscio <lucliscio@h0model.org>
     * @version v 1.0.0
     * @copyright Copyright 2022 HZKnight
     * @license http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL3
     *   
     * @package eXperience/GuestBook
     * @filesource
     */

    class home {
        
        private $share;

        public function __construct(){
            $this->share = new Share();
        }

        public function doAction (HttpRequest $request){
            global $view, $config, $db;
            
            $page = 1;

            if($request->getParam('page'))
            {
                $page = $request->getParam('page');
            }
            
            // how many lines of data to display
            $display = $config->get_param('display_msg'); 
            
            $header = $this->share->makeHeader($request);
            $nummsg = $header['nummsg']; //$db->getTableNumRows('$_guestbook_post'); //Quanti post ci sono?
            
            // where to start depending on what page we're viewing
            $start = ($page * $display) - ($display);

            // create an array of data
            $news = $db->getRowSubSet('$_guestbook_post', $start, $display, 'idh_post', 'desc');

            // the actual news we're going to print
            if ($page==$header['npage']) $display++;

            $end=$display*$page;

            $view->assign("announce", $config->get_param('allert'));
            $view->assign("bpager", range(1, $header['npage']));        
            $view->assign("page", $page);

            $posts = array();
            
            //sostituisco gli smile
            for ($i=0; $i<sizeof($news); $i++){
                if($news[$i]){
                    $news[$i]['messaggio'] = $this->smile($news[$i]['messaggio']);
                }
            }
            
            $view->assign("posts", $news);
            
            return $view->draw("guestbook/post", true); 
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