<?php

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;

$collection = new RouteCollection();
$collection->add('main', new Route('/c', array(
    'controller' => 'Vendor\DataBase\Controllers\FirstPageController',
    'action' => 'getMainPage',
)));
$collection->add('create', new Route('/create', array(
    'controller' => 'Vendor\DataBase\Datas\Creator',
    'action' => 'createDataStructure',
)));
$collection->add('fill', new Route('/fill', array(
    'controller' => 'Vendor\DataBase\Datas\Filler',
    'action' => 'insertValues',
)));
$collection->add('findUniv', new Route('/universities', array(
    'controller' => 'Vendor\DataBase\Controllers\UniversityController',
    'action' => 'allUniversities',
)));
$collection->add('insertUniv', new Route('/addUniv', array(
    'controller' => 'Vendor\DataBase\Controllers\UniversityController',
    'action' => 'insertUniversities',
)));
$collection->add('findDep', new Route('/findDep', array(
    'controller' => 'Vendor\DataBase\Controllers\DepartmentController',
    'action' => 'allDepartment',
)));
$context = new RequestContext();
$request = Request::createFromGlobals();
$context->fromRequest($request);
$matcher = new UrlMatcher($collection, $context);
$attributes = $matcher->match($request->getPathInfo());
$controller = $attributes['controller'];
$action = $attributes['action'];

eval('$ob = new '.$controller.'();');
eval('$ob->'.$action.'();');
