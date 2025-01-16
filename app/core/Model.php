<?php

namespace app\core;

use app\database\Database;

abstract class Model
{
    public $connect;
    public function __construct()
    {
        $this->connect = new Database;
    }
}

?>  