<?php
/**
 * Created by PhpStorm.
 * User: stelmakh
 * Date: 23.10.2015
 * Time: 23:24
 */

class Db
{
    public $mysqli;
    private static $db = null;
    public static function getDb()
    {
        if($db === null)
        {
            self::$db = new self();
        }
        return self::$db;
    }
    public function connect()
    {
        $this->mysqli = new mysqli('n1.hosting.energy', 'Igor', 'qwerty123', 'Igor');
        if ($mysqli->connect_errno)
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        $this->mysqli->set_charset("utf8");
    }

    private function __construct(){}
    private function __clone(){}
};
?>
