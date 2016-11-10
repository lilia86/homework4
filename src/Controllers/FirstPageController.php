<?php

namespace Vendor\DataBase\Controllers;

require_once '/home/lilia/PhpstormProjects/homework4/vendor/autoload.php';

use Vendor\DataBase\View\Render;

class FirstPageController
{
    public function getMainPage()
    {
        $value = 1;
        $render = new Render();
        $render->getMainView($value);
    }
}
