<?php

abstract class Model {
    private static $pdo;

    private static function setBdd(){
        self::$pdo = new PDO("mysql:host=localhost;dbname=dbanimaux;charset=utf8", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd(){
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
    }

 /**
  * Formater les data en json
  *
  * @param [type] $info
  * 
  */
    public static function sendJSON($info){
        header("Access-Controll-Allow-Origin: *");
        header("Content-Type-application/json");
      echo json_encode($info);

    }
}