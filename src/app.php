<?php

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;


$routes = new Routing\RouteCollection();

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::index',
)));

$routes->add('twitter_overview', new Routing\Route('/overview/{input}', array(
    'input' => null,
    '_controller' => 'Twitter\Controller\TwitterAPIController::index',
)));


return $routes;
