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

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction() {
        if (isset($_SESSION['admin'])) {
            $this->view->redirect("admin/add");
        }
        if(!empty($_POST)) {
            if(!$this->model->loginValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location("admin/add");
            $this->view->message('success', "login successful");
        }
        $this->view->render("Login page");
    }

    public function addAction() {
        if (!empty($_POST)) {
            if (!$this->model->postValidate($_POST, 'add')) {
                $this->view->message('error', $this->model->error);
            }
            $id = $this->model->postAdd($_POST);
            if (!$id) {
                $this->view->message('error', "Ошибка при добавлении поста");
            }
            $this->model->postUploadImage($_FILES['img']['tmp_name'], $id);
            $this->view->message('success', 'Пост добавлен');
        }
        $this->view->render("Add post");
    }

    public function editAction() {
        if (!empty($_POST)) {
            if (!$this->model->postValidate($_POST, 'edit')) {
                $this->view->message('error', $this->model->error);
            }
            $this->view->message('success', 'OK');
        }
        $this->view->render("Edit post");
    }

    public function deleteAction() {
        // no need for views for this action
        exit('Deleting post');
    }

    public function logoutAction() {
        unset($_SESSION['admin']);
        $this->view->redirect('admin/login');
    }

    public function postsAction() {
        $this->view->render('posts go here');
    }

}