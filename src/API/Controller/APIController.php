<?php

namespace API\Controller;

use Helper\Config;
use Nahid\JsonQ\Jsonq;
use Contracts\OutPutInterface;
use Services\JsonOutputService;
use Services\TwitterAPIService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class APIController
{

    protected $formatter;
    protected $twitterAPIService;

    /**
     * APIController constructor.
     */
    public function __construct()
    {
        $this->formatter = new JsonOutputService();
        $this->twitterAPIService = new TwitterAPIService();

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
            $param = "laravel";
        }

        $data = $this->twitterAPIService->getDataFromAPI($param);

        return new Response($this->formatter->output($data));
    }


    /**
     * Retrieve data from API
     *
     * @param $param
     * @return array
     */
    /*public function getDataFromAPI($param)
    {
        $sum = 0;
        $searchParam = "?q=#" . $param;

        $url = Config::getUrl();
        $settings = Config::getSettings();

        $requestMethod = 'GET';

        try {

            $twitter = new TwitterAPIExchange($settings);

            $jsonData = $twitter->setGetfield($searchParam)
                ->buildOauth($url, $requestMethod)
                ->performRequest();

            $sum += $this->countTweet($jsonData);

            while (isset(json_decode($jsonData)->search_metadata->next_results) != null) {

                $searchParam = json_decode($jsonData)->search_metadata->next_results;

                $jsonData = $twitter->setGetfield($searchParam)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest();

                $sum += $this->countTweet($jsonData);
            }

        } catch (\Exception $exception){
            return new Response('Something went wrong!', 500);
        }

        $avg = number_format($sum / 7);

        $result = [
            'avg_tweet_per_day' => $avg,
            'total_tweet_past_week' => $sum
        ];

        return $result;
    }*/

    /**
     * Count Tweet from Json data
     *
     * @param $jsonData
     * @return int
     */
    /*public function countTweet($jsonData)
    {
        $q = (new Jsonq())->json($jsonData);
        $res = $q->from('statuses')
            ->count();

        return $res;

    }*/
}
