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
    private $object;
    public function __construct()
    {
    }

    public function addCat($cat)
    {
        $db = Db::getDb();
        $db->connect();
        $sqlCat = "INSERT INTO sections(name) VALUES('{$cat->name}')";
        $db->mysqli->query($sqlCat);
        echo $db->mysqli->insert_id;
        $db->mysqli->close();
    }

    private function update($table, $info,$where)
    {
        $str1 = "";
        $str2 = "";
        for($i=0;$i<count($info);$i++){
            if($i>0){
                $str1.=",";
            }
            $str1.= "`{$info[$i]->key}`= '{$info[$i]->value}'";
        }
        for($i=0;$i<count($where);$i++){
            if($i>0){
                $str2.=" AND ";
            }
            $str2.= "`{$where[$i]->key}`={$where[$i]->value}";
        }
        $setdata = "UPDATE SET `{$table}` {$str1} WHERE {$str2}";
        echo $setdata;
    }

    private function delete()
    {

    }

    private function updateSectionName($table, $if, $query)
    {
        $db = Db::getDb();
        $db->connect();
        $sql = "UPDATE `{$table}` SET `name`='' WHERE ";
       // $db->mysqli->query($sql);
        $db->mysqli->close();
    }
}