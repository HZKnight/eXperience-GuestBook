<?php
/**		
 *	--------------------------------------------------------------------
 *	HZGuestBook
 *	--------------------------------------------------------------------
 *      File: httprequest.class.php
 *	Description: Classe che rappresenta la quesry string
 *		
 *	@author Luca Liscio & Marco Lettiri
 * 	@version $Id: httprequest.class.php,v 1.1 2008/05/26 20:39:20
 * 	@package HZGuestBook
 *      @subpackage env
 *      @license http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL3
 *	--------------------------------------------------------------------
 *      
 *      Copyright 2008 Luca Liscio & Marco Lettieri 
 *      
 *      This program is free software: you can redistribute it and/or modify
 *      it under the terms of the GNU Affero General Public License as published by
 *      the Free Software Foundation, either version 3 of the License, or
 *      (at your option) any later version.
 *
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU Affero General Public License for more details.
 *
 *      You should have received a copy of the GNU Affero General Public License
 *      along with this program.  If not, see <http://www.gnu.org/licenses/agpl-3.0.html>
 */

	class HttpRequest {
		private $_requestParams = array();
		
		public function __construct() {
			$this->_requestParams = array_merge($_GET, $_POST);
		}
		
		public function getParam($paramName) {
			return $this->_requestParams[$paramName];
		}		
		
		public function getRequest() {
			return $this->_requestParams;
		}
	}
?>
