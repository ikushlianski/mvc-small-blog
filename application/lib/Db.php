<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 05.03.2018
 * Time: 1:58
 */

namespace application\lib;

use PDO;

class Db
{
    protected $db;

    public function __construct()
    {
        $config = require "application/config/db.php";
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'',
            $config['user'], $config['password']);
    }

    public function query($sql)
    {
        $query = $this->db->query($sql);
        return $query;
    }

    public function row($sql)
    {
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql)
    {
        $result = $this->query($sql);
        return $result->fetchColumn();
    }

}