<?php

class Connection {

    private static $database = "web_db";
    private static $host = "localhost";
    private static $user = "web_user";
    private static $pass = "adm@user";


    public static function getConnection() {
        return pg_connect("host=".self::$host." port=5432 dbname=".self::$database." user=".self::$user." password=".self::$pass);
    }

    public static function closeConnection($conn) {
        return pg_close($conn);
    }

    public static function checkError() {
        
    }
}

?>