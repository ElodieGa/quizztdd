<?php

class Db {
    private static $oDatabase;

    private function __construct()
    {
        self::$oDatabase = new PDO('mysql:dbname=quizztdd;host=localhost', 'root', '');
        self::$oDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$oDatabase->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
        self::$oDatabase->exec("SET CHARACTER SET utf8");
    }

    public static function getInstance()
    {
        if (is_null(self::$oDatabase)) {
            new Db();
        }
        return self::$oDatabase;
    }
}