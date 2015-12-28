<?php
/**
 * Created by PhpStorm.
 * User: stelmakh
 * Date: 23.10.2015
 * Time: 23:25
 */
require_once("db.php");
require_once("data/section.php");
require_once("data/record.php");
require_once("data/field.php");

class GetInfo
{
    private $data;
    public function getAll()
    {
        $db = Db::getDb();
        $db->connect();
        $this->data = array();
        $sqlSections = "SELECT `id`, `name` FROM `sections`";
        if($sectionsQuery = $db->mysqli->query($sqlSections)){
            while ($rowSection = $sectionsQuery->fetch_object('Section')){
                $sqlRecords = "SELECT * FROM `records` WHERE `idsection` = {$rowSection->id}";
                if($recordQuery = $db->mysqli->query($sqlRecords)){
                    while($record = $recordQuery->fetch_object('Record')){
                        $sqlFields = "SELECT * FROM `fields` WHERE `idsection` = {$rowSection->id}";
                        if($fieldQuery = $db->mysqli->query($sqlFields)){
                            $record->fields = array();
                            while($rowField = $fieldQuery->fetch_object()){
                                $sqlValues = "SELECT * FROM `values` WHERE `idrecord` = {$record->id} AND `idfield` = {$rowField->id}";
                                if($valueQuery = $db->mysqli->query($sqlValues)){
                                    $rowValue = $valueQuery->fetch_object('Field',array($rowField->key));
                                    $record->fields[count($record->fields)] = $rowValue;
                                }
                            }
                        }
                        $rowSection->records[count($rowSection->records)] = $record;
                    }
                }
                $this->data[count($this->data)] = $rowSection;
            }
        }
        $db->mysqli->close();
        echo json_encode($this->data);
    }
}
?>