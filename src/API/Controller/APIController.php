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

        $summary = $this->search($param);

        $summary = json_encode(array('Search_summary' => $summary), JSON_FORCE_OBJECT);

        return new Response($summary);
    }

    public  function search($param)
    {

        $searchParam = "?q=#".$param;

        $url = Config::getUrl();
        $settings = Config::getSettings();

        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($settings);

        $jsonData =  $twitter->setGetfield($searchParam)
            ->buildOauth($url, $requestMethod)
            ->performRequest();

        $data = $jsonData;

        $sum = $this->getResult($jsonData);

        while (json_decode($jsonData)->search_metadata->next_results != null){

            $searchParam=json_decode($jsonData)->search_metadata->next_results;

            $jsonData =  $twitter->setGetfield($searchParam)
                ->buildOauth($url, $requestMethod)
                ->performRequest();

            $sum += $this->getResult($jsonData);

        }

        $avg = number_format($sum/7);

        $result = [
           'avg_tweet_per_day' => $avg,
           'total_tweet_past_week' => $sum
        ];
        
        return $result;
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
