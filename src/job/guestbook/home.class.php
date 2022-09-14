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
            $message = str_replace(":)","<img src='assets/images/smile.png'>",$message);
            $message = str_replace(":-D","<img src='assets/images/bigsmile.png'>",$message);
            $message = str_replace(":-O","<img src='assets/images/omg.png'>",$message);
            $message = str_replace(":P","<img src='assets/images/toung.png'>",$message);
            $message = str_replace(";)","<img src='assets/images/wink.png'>",$message);
            $message = str_replace(":(","<img src='assets/images/sad_smile.png'>",$message);
            $message = str_replace(":-S","<img src='assets/images/confused.png'>",$message);
            $message = str_replace(":|","<img src='assets/images/what_smile.png'>",$message);
            
            $message = str_replace(":_(","<img src='assets/images/cry_smile.png'>",$message);
            $message = str_replace(":-$","<img src='assets/images/red_smile.png'>",$message);
            $message = str_replace("(H)","<img src='assets/images/shades_smile.png'>",$message);
            $message = str_replace(":-@","<img src='assets/images/angry_smile.png'>",$message);
            $message = str_replace(":-#","<img src='assets/images/47_47.png'>",$message);
            $message = str_replace("8o|","<img src='assets/images/48_48.png'>",$message);
            $message = str_replace("8-|","<img src='assets/images/49_49.png'>",$message);
            $message = str_replace("^o)","<img src='assets/images/50_50.png'>",$message);
        
            $message = str_replace("+o(","<img src='assets/images/52_52.png'>",$message);
            $message = str_replace(":^|","<img src='assets/images/71_71.png'>",$message);
            $message = str_replace("*-)","<img src='assets/images/72_72.png'>",$message);
            $message = str_replace("8-)","<img src='assets/images/75_75.png'>",$message);
            $message = str_replace("|-)","<img src='assets/images/77_77.png'>",$message);
            $message = str_replace("(A)","<img src='assets/images/angel_smile.png'>",$message);
            $message = str_replace("(6)","<img src='assets/images/devil_smile.png'>",$message);
            $message = str_replace(":-*","<img src='assets/images/51_51.png'>",$message);
            
            $message = str_replace("<:o)","<img src='assets/images/74_74.png'>",$message);
            $message = str_replace("(@)","<img src='assets/images/cat.png'>",$message);
            $message = str_replace("(&)","<img src='assets/images/dog.png'>",$message);
            $message = str_replace("(S)","<img src='assets/images/moon.png'>",$message);
            
            return $message;
        }
    }
