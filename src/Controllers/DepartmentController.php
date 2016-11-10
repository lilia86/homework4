<?php

namespace Vendor\DataBase\Controllers;

require_once '/home/lilia/PhpstormProjects/homework4/vendor/autoload.php';

use Vendor\DataBase\Datas\Departments;
use Vendor\DataBase\View\Render;

class DepartmentController
{
    public function allDepartment()
    {
        $ob = new Departments();
        $values = $ob->findAll();
        $render = new Render();
        $render->getDepView($values);
    }
}
