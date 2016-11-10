<?php

namespace Vendor\DataBase\View;

require_once '/home/lilia/PhpstormProjects/homework4/vendor/autoload.php';

class Render
{
    private $loader;
    private $twig;

    public function __construct()
    {
        $this->loader = new \Twig_Loader_Filesystem('src/View/templates');
        $this->twig = new \Twig_Environment($this->loader);
    }

    public function getMainView($values)
    {
        $template = $this->twig->loadTemplate('main.html');
        echo $template->render(array('data' => $values));
    }
    public function getUnivView($values)
    {
        $template = $this->twig->loadTemplate('univ.html');
        echo $template->render(array('data' => $values));
    }
    public function getDepView($values)
    {
        $template = $this->twig->loadTemplate('depart.html');
        echo $template->render(array('data' => $values));
    }
    public function getStudView($values)
    {
        $template = $this->twig->loadTemplate('student.html');
        echo $template->render(array('data' => $values));
    }
    public function getHWView($values)
    {
        $template = $this->twig->loadTemplate('homeworks.html');
        echo $template->render(array('data' => $values));
    }
}
