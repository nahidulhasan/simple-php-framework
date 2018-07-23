<?php

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;


$routes = new Routing\RouteCollection();

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::index',
)));

$routes->add('twitter_overview', new Routing\Route('/get-info/{str}', array(
    'str' => null,
    '_controller' => 'API\Controller\APIController::index',
)));


return $routes;
