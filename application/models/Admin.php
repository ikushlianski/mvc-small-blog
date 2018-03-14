<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 07.03.2018
 * Time: 16:39
 */

namespace application\models;

use application\core\Model;

class Admin extends Model
{

    public $error;

    public function loginValidate($post)
    {
        $config = require 'application/config/admin_config.php';
        if (($config['login'] !== $post['login']) || ($config['password'] !== $post['password'])) {
            $this->error = "Error logging in";
            return false;
        } else {
            return true;
        }
    }

    public function postValidate($post, $type)
    {
        $nameLen = iconv_strlen($post['name']);
        $descriptionLen = iconv_strlen($post['description']);
        $textLen = iconv_strlen($post['text']);
        if( ($nameLen < 3) || ($nameLen > 100)) {
            $this->error = 'Название должно содержать от 3 до 100 символов';
            return false;
        } elseif( ($descriptionLen < 3) || ($descriptionLen > 300)) {
        $this->error = 'Описание должно содержать от 3 до 100 символов';
        return false;
        } elseif (($textLen < 4) || ($textLen > 5000)) {
            $this->error = 'Text should contain from 4 to 5000 chars';
            return false;
        }
        if (($type == 'add') && (empty($_FILES['img']['tmp_name']))) {
            $this->error = "Image not chosen";
            return false;
        }
        return true;
    }

    public function postAdd($post)
    {
        $params = [
            'id' => '',
            'name' => $post['name'],
            'description' => $post['description'],
            'text' => $post['text']
        ];
        $this->db->query("INSERT INTO posts VALUES (:id, :name, :description, :text)", $params);
        return $this->db->lastInsertId();
    }

    public function postUploadImage($path, $id)
    {
        move_uploaded_file($path, 'public/materials/'.$id.'.jpg');
    }
}