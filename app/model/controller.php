<?php
/**
 * Created by PhpStorm.
 * User: stelmakh
 * Date: 28.10.2015
 * Time: 10:24
 */


//$admin->registration();
$postdata = file_get_contents("php://input");
$data = json_decode($postdata);
if(isset($data->auth)){
    require_once("admin.php");
    $admin = new Admin();
    $admin->auth($data->auth->name,$data->auth->pass);
}else if(isset($_GET['getdata'])){
    require_once("getinfo.php");
    $getInfo = new GetInfo();
    $getInfo->getAll();
    $getInfo->Display();
}else if(isset($_GET['setdata'])){
    require_once("setinfo.php");
    $setInfo = new SetInfo();
}
?>