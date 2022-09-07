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

    /**
     * Funzioni condivise tra i moduli del GuestBook.
     * 
     * @author  lucliscio <lucliscio@h0model.org>
     * @version v 1.0.0
     * @copyright Copyright 2022 HZKnight
     * @license http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL3
     *   
     * @package eXperience/GuestBook/includes
     * @filesource
     */
    class Share {
        
        private $header_data = array();

        public function makeHeader(HttpRequest $request){
            global $view, $config, $db;
            
            $display = $config->get_param('display_msg');
            
            //Calcolo i dati di testata
            $this->header_data['nummsg'] = $db->getTableNumRows('$_guestbook_post'); //Quanti post ci sono?

            $ar=$this->header_data['nummsg']%$display; 
            $sum=($ar)?1:0; 
            $this->header_data['npage'] = (($this->header_data['nummsg']-$ar)/$display)+$sum; //Pagine nel guestbook
            
            //Trasmetto i dati al template engine
            $view->assign("num_mex", $this->header_data['nummsg']);
            $view->assign("num_pages", $this->header_data['npage']); 
            $view->assign("job", $request->getParam('job'));       

            return $this->header_data;        
        }

    }