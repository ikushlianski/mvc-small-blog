<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 06.03.2018
 * Time: 0:29
 */

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{

    // Переопределить шаблон для всего контроллера
    //public function before()
    //{
    //    $this->view->layout = 'custom';
    //}

    public function loginAction()
    {
        if (!empty($_POST)) {
            $this->view->location("/account/register");
        }
        // $this->view->redirect("/");
        $this->view->render('Вход');
    }

    public function registerAction()
    {
        $this->view->render('Регистрация');
    }
}