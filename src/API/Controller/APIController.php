<?php
namespace API\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TwitterAPIExchange;


class APIController
{
    public function index(Request $request, $str)
    {
       // var_dump($str); exit;

        $settings = array(
            'oauth_access_token' => "164222452-hlvpCDNQgtZqjGszAdTnohnzq2Enzf1JiCW5sLlq",
            'oauth_access_token_secret' => "25odCoYSf2D2DKFjYqaCLrO33Hj01chx7FASOPx8uXLgN",
            'consumer_key' => "AqPfq62fwRqxhlv1OiKfv374D",
            'consumer_secret' => "xA8oMWH3twGefixJISjhrcUdLXNJwlmteMdXVnX2NmGgb7e1K7"
        );


        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $requestMethod = 'GET';

        $getfield = "?q=#laravel";

        $twitter = new TwitterAPIExchange($settings);


        $response =  $twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest();

        return new Response($response);

        //var_dump($response); exit();


    }
}
