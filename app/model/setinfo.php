<?php
/**
 * Created by PhpStorm.
 * User: stelmakh
 * Date: 23.10.2015
 * Time: 23:25
 */
require_once("db.php");

class SetInfo
{
    public function updateSectionName($table, $if, $query)
    {
        global $db;
        $db->connect();
        $sql = "UPDATE `{$table}` SET `name`='' WHERE ";
       // $db->mysqli->query($sql);
        $db->mysqli->close();
    }
}