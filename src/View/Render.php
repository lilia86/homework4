<?php

namespace Vendor\DataBase\View;

require_once '/home/lilia/PhpstormProjects/homework4/vendor/autoload.php';

class Render
{
    public function getMainView($values)
    {
        $loader = new \Twig_Loader_Filesystem('src/View/templates');
        $twig = new \Twig_Environment($loader);
        $template = $twig->loadTemplate('main.html');
        echo $template->render(array('data' => $values));
    }
    public function getUnivView($values)
    {
        $loader = new \Twig_Loader_Filesystem('src/View/templates');
        $twig = new \Twig_Environment($loader);
        $template = $twig->loadTemplate('univ.html');
        echo $template->render(array('data' => $values));
    }
    public function getDepView($values)
    {
        $loader = new \Twig_Loader_Filesystem('src/View/templates');
        $twig = new \Twig_Environment($loader);
        $template = $twig->loadTemplate('depart.html');
        echo $template->render(array('data' => $values));
    }
}
