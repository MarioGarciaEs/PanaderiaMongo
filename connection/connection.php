<?php
  include_once "../../vendor/autoload.php";

  class MongoDatabase {
    
    private static $client;

    public static function getInstance() {
      if(self::$client == null) {
        self::$client = new MongoDB\Client();
      }
      
      return self::$client;
    }

  }