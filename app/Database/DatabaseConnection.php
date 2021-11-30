<?php

namespace App\Database;
use PDO;

final class DatabaseConnection
{
    private static $connection = false;

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getConnection()
    {
        if(!self::$connection){
            self::$connection =  new PDO('mysql:host=localhost;dbname=books', 'root', '2200');
        }

        return self::$connection;
    }
}