<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 06.03.2018
 * Time: 0:29
 */

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
    public function indexAction() {
        $this->view->render("Main page");
    }

    public function aboutAction() {
        $this->view->render("About me page");
    }

    public function contactAction() {
        if (!empty($_POST)) {
            if (!$this->model->contactValidate($_POST)) {
                $this->view->message("error", $this->model->error);
            }
            mail($_POST['email'], 'Сообщение из блога от ' . $_POST['name'], $_POST['text']);
            $this->view->message("success", "Сообщение отправлено");
        }
        $this->view->render("Contacts");
    }

    public function postAction() {
        debug($this->route['id']);
        // $this->view->render("Post");
    }

}