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

        $result = $this->model->getNews();
        $vars = ['news' => $result];
        $this->view->render("Page title here", $vars);
    }

}