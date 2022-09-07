<?php
    /* 
     * index.php
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
     * Modulo di avvio dell'applicazione.
     * 
     * @author  lucliscio <lucliscio@h0model.org>
     * @version v 1.0.0
     * @copyright Copyright 2022 HZKnight
     * @license http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL3
     *   
     * @package eXperience
     * @filesource
     */

    //Request
    require_once "env/config.class.php";
    require "env/exceptions.def.php"; 
    require_once "env/dbmanager.class.php"; 
    require "env/rain.tpl.class.php"; 
    require "env/httprequest.class.php"; 
    require "env/controller.class.php";
    require "env/php7support.inc.php";
    
    include "assets/lang/it_IT.php"; //default language
   
    
    $config;
    $db;
    $view;
      
    try{
       
        $config = new Config("./config.json");
        $db = new DbManager($config->get_param('database'));
        $req = new HttpRequest();
        $app = new Controller();
       
        RainTPL::$tpl_ext = "tpl";
        RainTPL::$tpl_dir = "templates/";
        RainTPL::$cache_dir = "temp/templates_c/";
        RainTPL::$path_replace = false;
        $view = new RainTPL();
       
        $view->assign("ver", $config->get_param("version"));
        $view->assign("title", $config->get_param("title"));
       
        //Verifico se devo aggiungere l'action di default
        if(!$req->has("action")){
            $req->setParam("action", "guestbook");
        }

        //Avvio l'aplicazione
        $app->doService($req);
           
    } catch (ConfigException $ex) {
        echo $ex->getCode()." - ".$ex->getMessage()."<br><pre>".$ex->getTraceAsString()."</pre>";
    } catch (PDOException $ex) {
        echo $ex->getCode()." - ".$ex->getMessage()."<br><pre>".$ex->getTraceAsString()."</pre>";
    } catch (Exception $ex) {
        echo $ex->getCode()." - ".$ex->getMessage()."<br><pre>".$ex->getTraceAsString()."</pre>";
    }
?>