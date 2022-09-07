<?php
    /* 
     * httprequest.class.php
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
     * HZCms Ver.1.1.0
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
     * Classe che rappresenta la http quesry string
     * 
     * @author  lucliscio <lucliscio@h0model.org>
     * @version v 1.1 2008/05/26 20:39:20
     * @copyright Copyright 2022 HZKnight
     * @copyright Copyright 2013 Luca Liscio & Marco Lettieri 
     * @license http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL3
     *   
     * @package HZCms
     * @filesource
     */
	class HttpRequest {
		private $_requestParams = array();
		
		public function __construct() {
			$this->_requestParams = array_merge($_GET, $_POST);
		}
		
		public function getParam($paramName) {
			if (in_array($paramName, array_keys($this->_requestParams))) {
				return $this->_requestParams[$paramName];
			} else {
				return '';
			}
		}
		
		public function has($paramName){
			return in_array($paramName, array_keys($this->_requestParams));
		}

		public function setParam($paramName, $value){
			$this->_requestParams[$paramName] = $value;
		}
		
		public function getRequest() {
			return $this->_requestParams;
		}
	}
?>
