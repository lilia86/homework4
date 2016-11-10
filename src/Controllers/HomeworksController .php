<?php

namespace Vendor\DataBase\Controllers;

require_once '/home/lilia/PhpstormProjects/homework4/vendor/autoload.php';

use Vendor\DataBase\Datas\Homeworks;
use Vendor\DataBase\View\Render;

class DepartmentController
{
    public function allHomeworks()
    {
        $ob = new Homeworks();
        $values = $ob->findAll();
        $render = new Render();
        $render->getHWView($values);
    }
}
