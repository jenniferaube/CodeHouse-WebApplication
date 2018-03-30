<!--File: style-footer.css-->
<!--Created by: Evandro Ramos-->
<!--Date: February 23, 2018-->
<!--Last modified: March 19, 2018 by Evandro Ramos-->
<?php

class Connection {
    private static $host = "localhost";
    private static $port = "3306";
    private static $database = "codehouse";
    private static $user = "codehouse";
    private static $pass = "codehouse";

    public static function getConnection() {
        $connection = new mysqli(self::$host, self::$user, self::$pass, self::$database);
        return $connection;
    }

    public static function closeConnection($conn) {
        $conn->close();
        return $conn = NULL;
    }
}
