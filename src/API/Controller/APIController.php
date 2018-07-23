<?php
namespace API\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class APIController
{
    public function index(Request $request, $str)
    {
        var_dump($str); exit;
    }
}
