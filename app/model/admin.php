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
    public $pass;
    public $error;
    public $goodauth;
    /*
    public function registration()
    {
        global $db;
        $admin = "Igor";
        $pass = md5(md5("qwerty"));
        $sql = "Insert into admins(name,pass) values('{$admin}','{$pass}')";
        $db->connect();
        $db->mysqli->query($sql);
        $db->mysqli->close();
    }
    */

    public function auth($login,$pass)
    {
        $db = Db::getDb();
        $this->pass = md5(md5($pass));
        $sql = "select * from personaldata where name='{$login}' and pass ='{$this->pass}'";
        $db->connect();
        if($result = $db->mysqli->query($sql))
        {
            if($result->num_rows==0)
                $this->error.="логин или пароль гавно";
            else {
                $this->obj = $result->fetch_object('admin');
                $this->obj->goodauth = "вы успешно вошли под именем {$this->obj->name}.";
                $this->obj->pass = $pass;
            }
        }
        else $this->error = 'Database error: '. $db->mysqli->error;
        $db->mysqli->close();
        if($this->error)
            $this->obj = $this;
        echo json_encode($this->obj);
    }

};
?>