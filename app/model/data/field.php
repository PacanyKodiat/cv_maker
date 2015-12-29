<?php
/**
 * Created by PhpStorm.
 * User: stelm
 * Date: 13.12.2015
 * Time: 22:55
 */

class Field
{
    public $key;
    public $value;
    public $type;
    public function __construct($key,$type)
    {
        $this->key = $key;
        $this->type = $type;
    }
}

?>