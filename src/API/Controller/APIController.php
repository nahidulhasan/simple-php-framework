<?php

namespace API\Controller;

use Services\JsonOutputService;
use Services\TwitterAPIService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class APIController
{

    protected $formatter;
    protected $response;
    protected $twitterAPIService;

    /**
     * APIController constructor.
     */
    public function __construct()
    {
        $this->formatter = new JsonOutputService();
        $this->twitterAPIService = new TwitterAPIService();
        $this->response = new Response();

    }

    /**
     * Show formatted json data
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $param = $request->attributes->get('param');

        if (empty($param)) {

            $this->response->setStatusCode(422);
            $this->response->setContent('Parameter is missing in the request');

            return $this->response;

        }

        $data = $this->twitterAPIService->getDataFromAPI($param);

        $this->response->setStatusCode(200);
        $this->response->setContent($this->formatter->output($data));

        return $this->response;
    }
    
}
