<?php

namespace Test\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TwitterController
{
    public function index(Request $request, $input)
    {
       echo 'test';
    }
}
