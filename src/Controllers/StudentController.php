<?php

namespace Vendor\DataBase\Controllers;

require_once '/home/lilia/PhpstormProjects/homework4/vendor/autoload.php';

use Vendor\DataBase\Datas\Students;
use Vendor\DataBase\View\Render;

class StudentController
{
    public function allStudents()
    {
        $ob = new Students();
        $values = $ob->findAll();
        $render = new Render();
        $render->getStudView($values);
    }
}
