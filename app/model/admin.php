<?php
/**
 * Created by PhpStorm.
 * admin: stelmakh
 * Date: 23.10.2015
 * Time: 23:17
 */

require_once("db.php");

class Admin
{
    private $obj;
    private $pass;
    public $error;
    public $goodauth;
    /*
    public function registration()
    {
        global $db;
        $admin = "igor";
        $pass = md5(md5("qwerty"));
        $sql = "Insert into admins(name,pass) values('{$admin}','{$pass}')";
        $db->connect();
        $db->mysqli->query($sql);
        $db->mysqli->close();
    }
    */

    public function auth($login,$pass)
    {
        global $db;
        $pass = md5(md5($pass));
        $sql = "select * from admins where name='{$login}' and pass ='{$pass}'";
        $db->connect();
        if($result = $db->mysqli->query($sql))
        {
            /*while ($row = $result->fetch_object('admin'))
            {
                $this->obj = $row;
            }*/
            if($result->num_rows==0)
                $this->error.="логин или пароль гавно";
            else {
                $this->obj = $result->fetch_object('admin');
                $this->obj->goodauth = "вы успешно вошли под именем {$this->obj->name}.";
            }
        }
        else $this->error = 'Database error: '. $db->mysqli->error;
        $db->mysqli->close();
        if($this->error)
            $this->obj = $this;
        echo json_encode($this->obj);
    }

};
$admin = new Admin();
//$admin->registration();
$postdata = file_get_contents("php://input");
$data = json_decode($postdata);
$admin->auth($data->admin->name,$data->admin->pass);
?>