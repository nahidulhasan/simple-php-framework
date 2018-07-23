<?php
namespace API\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TwitterAPIExchange;


class APIController
{
    public function index(Request $request, $str)
    {
        $settings = array(
            'oauth_access_token' => getenv('OAUTH_ACCESS_TOKEN'),
            'oauth_access_token_secret' => getenv('OAUTH_ACCESS_TOKEN_SECRET'),
            'consumer_key' => getenv('CONSUMER_KEY'),
            'consumer_secret' => getenv('CONSUMER_SECRET')
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
