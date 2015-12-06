<?php
/**
 * Created by PhpStorm.
 * User: stelmakh
 * Date: 23.10.2015
 * Time: 23:25
 */
require_once("db.php");

class Sections
{
    public $id;
    public $name;
    public $fields;
}

class Fields
{
    public $id;
    public $key;
    public $value;
    private $idsections;
}

class GetInfo
{
    private $data;
    public function getAll()
    {
        global $db;
        $db->connect();
        $this->data = array();
        $sql = "SELECT `id`, `name` FROM `sections`";
        if($sectionsQuery = $db->mysqli->query($sql)){
            while ($rowSection = $sectionsQuery->fetch_object('Sections')){
                $sql2 = "SELECT * FROM `fields` WHERE `idsections` = {$rowSection->id}";
                if($fieldQuery = $db->mysqli->query($sql2)){
                    while($rowField = $fieldQuery->fetch_object('Fields')){
                        $rowSection->fields[count($rowSection->fields)] = $rowField;
                    }
                }
                $this->data[count($this->data)] = $rowSection;
            }
        }
        $db->mysqli->close();
    }

    public function Display()
    {
        echo json_encode($this->data);
      // var_dump($this->array);
    }
}

?>