<?php
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