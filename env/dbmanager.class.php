<?php

    /* 
     * dbmanager.class.php
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
     * HZSystem Ver.1.0.0
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
     * Interfaccia di comunicazione con il db (Database type MySql-PDO)
     * 
     * @author  lucliscio <lucliscio@h0model.org>
     * @version v 2.2-PDO 2022/08/30 16:03:20
     * @copyright Copyright 2022 HZKnight 
     * @copyright Copyright 2013 Luca Liscio & Marco Lettieri 
     * @license http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL3
     *   
     * @package HZSystem
     * @filesource
     */

    class DbManager {
 		
        private $_conn;
        private $tbprefix;
 		
        /**
         * All'atto della costruziine di un nuovo ogetto esegue la connessione al DB
         * 
         * @param array $config contiene i parametri (type, host, uname, passwd, db) necessari alla connesione
         * @throws PDOException
         */
        public function __construct($config) {
            $connstr = $config['type'].":host=".$config['host'].";port=".$config['port'].";dbname=".$config['db'].";charset=utf8";
            $this->_conn = new PDO($connstr, $config['uname'], $config['passwd']);
            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->tbprefix = $config['tb_prefix'];
        }
		
        /**
         * Chiude la connesione con il db
         */
        public function close(){
            $this->_conn = null;
        }
    
    	/**
         * Esegue un query sql e restituisce il risultato
         * 
         * @param string $sql stringa contenente la query
         * @return array $res contiene il resultset
         */
        public function doQuery($sql){
            //Send a sql query that returns a result
            $sql = str_replace('$_', $this->tbprefix, $sql);
            $stmt = $this->_conn->query($sql);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        /**
         * Invia al db query di tipo comando e restituisce l'esito dell'esecuzione
         * 
         * @param string $sql
         * @return array restituisce l'esito della query
         */
        public function doUpdate($sql){
            //Send a sql command that returns the number of rows affected
            $sql = str_replace('$_', $this->tbprefix, $sql);
            $af = $this->_conn->exec($sql);
            $result["sql"] = $sql;
            $result["nbrows"] = $af;
            return $result;
        }
    
        /**
         * Restituisce l'ultimo id inserito
         * @return mixed 
         */
        public function sql_insert_id(){
            return $this->_conn->lastInsertId();
        }

        /**
         * Restituisce il numero di righe di una tebella
         *
         * @param string $table tabella 
         * @return int numero di righe della tabella
         */
        public function getTableNumRows($table){
            $sql = 'SELECT COUNT(*) AS "rows" FROM '.$table;
            $num = $this->doQuery($sql);
            return $num[0]['rows'];
        }

        /**
         * Restituisce un sottoinsieme delle righe di una tabella
         *
         * @param string $table
         * @param integer $start
         * @param integer $numrow
         * @param string $order
         * @param string $otype
         * @return resultset
         */
        public function getRowSubSet($table, $start, $numrow, $order="", $otype=""){
            $sql = 'SELECT * FROM '.$table;
            
            // Tipo di ordinamento delle righe
            if($order != ""){
                $sql .= ' ORDER BY '.$order." ".$otype;
            }
            
            $sql .=' LIMIT '.$start.', '.$numrow;

            return $this->doQuery($sql);
        }
    
        /**
         * Formater for \' items
         */
        public function sql_format($data){
            //When passing the data from a post form, the \' are already set, we will
            //replace them with a system code, then replace the single ' by \' and re
            //replace the old system code with \'
            $formateddata = str_replace("\'", "@sc:bsqu@", $data);
            $formateddata = str_replace("'", "\'", $formateddata);
            $formateddata = str_replace("@sc:bsqu@", "\'", $formateddata);
            return $formateddata;
        }
    
    }