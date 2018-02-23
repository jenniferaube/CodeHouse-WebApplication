<?php

class Connection {

    private static $host = "localhost";
    private static $port = "5432";
    private static $database = "web_db";
    private static $user = "web_user";
    private static $pass = "adm@user";

    public static function getConnection() {
        $connection = "pgsql:host=".self::$host.";port=".self::$port.";dbname=".self::$database.";user=".self::$user.";password=".self::$pass;
        $conn = new PDO($connection);

        // Active throw exceptions mode
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    }

    public static function closeConnection($conn) {
        return $conn = NULL;
    }
}
