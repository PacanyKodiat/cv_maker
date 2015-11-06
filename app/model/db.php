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
    public function connect()
    {
        $this->mysqli = new mysqli('localhost', 'root', '', 'igor');
        if ($mysqli->connect_errno)
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    function __construct()
    {

    }
};
$db = new Db();
?>
