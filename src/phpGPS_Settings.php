<?php

  // enable for development only
  // ini_set('display_errors',1);  
  // error_reporting(E_ALL);
  
  class phpGPS_Settings {

    //Map Info
    public static $_defaultZoom = 6;
    public static $_defaultCenterLat = "15.327726";
    public static $_defaultCenterLong = "105.186648";
    public static $_defaultMapType = "roadmap";
    public static $_windowW = 500;
    public static $_windowH = 500;
    public static $_embedAddition = 20;
    
    public static $_devKey = "AIzaSyBammpQQ3sZpyE0l-p87WbsYchzairuGgU";
    
    //GPS Defaults
    public static $_defaultDeviceID = 1;
    public static $_defaultTypeID = 1;
    
    public static $_title = "phpGPS";
    
    //Database Info
    public static $_host = "localhost";  //DB HOSTNAME
    public static $_username = "root"; //DB USER
    public static $_password = ""; //DB PASS
    public static $_dbname = "phpgps";   //DB NAME
    
    //Days to delay displaying markers
    public static $_markerDelay = 0;
    
    //Secret key for adding an entry using addGpsEntry.php
    public static $_secretKey = "1234";


    // override defaults from environment variables if defined
    static function init() {
      phpGPS_Settings::$_host     = phpGPS_Settings::loadFromEnv("DB_HOSTNAME", phpGPS_Settings::$_host);
      phpGPS_Settings::$_username = phpGPS_Settings::loadFromEnv("DB_USERNAME", phpGPS_Settings::$_username);
      phpGPS_Settings::$_password = phpGPS_Settings::loadFromEnv("DB_PASSWORD", phpGPS_Settings::$_password);
      phpGPS_Settings::$_dbname   = phpGPS_Settings::loadFromEnv("DB_NAME",     phpGPS_Settings::$_dbname);

      phpGPS_Settings::$_devKey   = phpGPS_Settings::loadFromEnv("DEV_KEY", phpGPS_Settings::$_devKey);

      phpGPS_Settings::$_secretKey = phpGPS_Settings::loadFromEnv("SECRET_KEY", phpGPS_Settings::$_secretKey);
    }

    private static function loadFromEnv($name, $default) {
      if (isset($_ENV[$name])) {
        return $_ENV[$name];
      } else {
        return $default;
      }
    }
  }

  phpGPS_Settings::init();
?>
