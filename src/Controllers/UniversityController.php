<?php

namespace Vendor\DataBase\Controllers;

require_once '/home/lilia/PhpstormProjects/homework4/vendor/autoload.php';

use Vendor\DataBase\Datas\Universities;
use Vendor\DataBase\View\Render;

class UniversityController
{
    public function allUniversities()
    {
        $ob = new Universities();
        $values = $ob->findAll();
        $render = new Render();
        $render->getUnivView($values);
    }
}
