<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 07.03.2018
 * Time: 16:39
 */

namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function getNews()
    {
        $result = $this->db->row("SELECT title, text FROM news");
        return $result;
    }
}