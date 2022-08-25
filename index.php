<?php
    //Request
    require_once "env/config.class.php";
    require "env/exceptions.def.php"; 
    require_once "env/dbmanager.class.php"; 
    require "env/rain.tpl.class.php"; 
    require "env/httprequest.class.php"; 
    require "env/controller.class.php";
    require "env/php7support.inc.php";
    
    include "lang/it_IT.php"; //default language
   
    
    $config;
    $db;
    $view;
      
    try{
       
       $config = new Config("./config.json");
       $db = new DbManager($config->get_param('database'));
       $app = new Controller();
       
       RainTPL::$tpl_ext = "tpl";
       $view = new RainTPL();
       $view->assign("ver", $config->get_param("version"));
       $view->assign("title", $config->get_param("title"));
       
       //Avvio l'aplicazione
       $app->doService(new HttpRequest());
           
    } catch (ConfigException $ex) {
        echo $ex->getCode()." - ".$ex->getMessage()."<br><pre>".$ex->getTraceAsString()."</pre>";
    } catch (PDOException $ex) {
        echo $ex->getCode()." - ".$ex->getMessage()."<br><pre>".$ex->getTraceAsString()."</pre>";
    } catch (Exception $ex) {
        echo $ex->getCode()." - ".$ex->getMessage()."<br><pre>".$ex->getTraceAsString()."</pre>";
    }
?>