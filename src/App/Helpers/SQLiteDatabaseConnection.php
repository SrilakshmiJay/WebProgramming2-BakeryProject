<?php
namespace App\Helpers;
use PDO;
class SQLiteDatabaseConnection{
    private static $pdo;
    public static function connect(){
        if(self::$pdo == null){
            $dsn = "sqlite:".__DIR__."/../../../app.db";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES=>false
            ];
            self::$pdo = new PDO($dsn, null, null, $options);
        }
        return self::$pdo;
    }
}