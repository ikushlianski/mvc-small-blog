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

    public $error;

    public function contactValidate($post)
    {
        $nameLen = strlen($post['name']);
        $textLen = strlen($post['text']);
        if( ($nameLen < 3) || ($nameLen > 30)) {
            $this->error = 'Имя должно содержать от 3 до 20 символов';
            return false;
        } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error = 'Email is not correct';
            return false;
        } elseif (($textLen < 4) || ($textLen > 500)) {
            $this->error = 'Message should contain from 4 to 500 chars';
            return false;
        }
        return true;
    }
}