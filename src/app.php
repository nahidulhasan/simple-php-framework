<?php

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;


$routes = new Routing\RouteCollection();

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::index',
)));


$routes->add('home', new Routing\Route('/', array(
    '_controller' => 'API\Controller\APIController::test',
)));

$routes->add('twitter_search', new Routing\Route('/search/{param}', array(
    'param' => null,
    '_controller' => 'API\Controller\APIController::index',
)));

return $routes;
