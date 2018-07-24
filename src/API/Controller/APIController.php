<?php
namespace API\Controller;


use Helper\Config;
use Nahid\JsonQ\Jsonq;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TwitterAPIExchange;


class APIController
{
    public function index(Request $request)
    {
        $param = $request->attributes->get('param');

        if(empty($param)){
            $param = "laravel";
        }

        $jsonData = $this->search($param);

        $response = $this->getResult($jsonData);

        return new Response($jsonData);

    }

    public  function search($param)
    {
        $searchParam = "?q=#".$param.'&count=100&since_id=100';

       /* $url = Config::getConfig('url');
        $settings = Config::getConfig('settings');

        var_dump($url, $settings); exit();*/

        $url = Config::getUrl();
        $settings = Config::getSettings();

        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($settings);

        $jsonData =  $twitter->setGetfield($searchParam)
            ->buildOauth($url, $requestMethod)
            ->performRequest();

        return $jsonData;
    }

    public  function getResult($jsonData)
    {
        $q = (new Jsonq())->json($jsonData);
        $res = $q->from('statuses')
            ->count();

        return $res;

    }

    public  function test(Request $request)
    {
        return new Response('Hello World');
    }
}
