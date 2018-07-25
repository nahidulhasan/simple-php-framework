<?php
namespace API\Controller;


class HomeController
{
    /**
     * Show dashboard
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return new Response('Welcome! in the API Dashboard');
    }

}