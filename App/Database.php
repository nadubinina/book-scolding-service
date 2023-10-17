<?php

namespace App;

use App\Models\Environment;
use PDO;

class Database
{
    protected static $connection;

    public static function getConnection(): PDO
    {
        if (self::$connection) {
            return self::$connection;
        }

        $dbSettings = new Environment();

        $host = $dbSettings->getDbHost();
        $db   = $dbSettings->getDbName();
        $user = $dbSettings->getDbUser();
        $pass = $dbSettings->getDbPassword();
        $charset = $dbSettings->getDbCharset();
        $port = $dbSettings->getDbPort();

        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        self::$connection = new PDO($dsn, $user, $pass, $opt);
        return self::$connection;
    }
}
