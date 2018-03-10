<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 06.03.2018
 * Time: 0:45
 */

declare(strict_types=1);

namespace application\core;

use application\core\View;


abstract class Controller
{
    public $route;
    public $view;
    public $acl;

    public function __construct($route)
    {
        $this->route = $route;
        if (!$this->checkAcl()) {
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
        // call our layout for Controller in general
        // $this->before();
    }

    public function loadModel($name)
    {
        $path = "application\models\\".ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

    // check access control
    public function checkAcl()
    {
        $this->acl = require 'application/access-control-list/'.$this->route['controller'].'.php';
        if ($this->isAcl('all')) {
            return true;
        } elseif (($this->isAcl('authorized')) && (isset($_SESSION['authorized']['id']))) {
            return true;
        } elseif (($this->isAcl('guest')) && (!isset($_SESSION['authorized']['id']))) {
            return true;
        } elseif (($this->isAcl('admin')) && (!isset($_SESSION['admin']))) {
            return true;
        }
        return false;
    }

    public function isAcl($key)
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }
}