<?php
// Base class with model from which all other models will inherit

namespace application\core;

use application\lib\Db;

abstract class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Db;
    }
}