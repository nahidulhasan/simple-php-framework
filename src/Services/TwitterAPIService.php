<?php
namespace Services;

use Helper\Config;
use TwitterAPIExchange;
use Symfony\Component\HttpFoundation\Response;

class TwitterAPIService
{

    protected $twitterHelperService;

    public function __construct()
    {
        $this->twitterHelperService = new TwitterHelperService();

    }

    /**
     * Retrieve data from API
     *
     * @param $param
     * @return array
     */
    public function getDataFromAPI($param)
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

            $sum +=  $this->twitterHelperService->countTweet($jsonData);

            while (isset(json_decode($jsonData)->search_metadata->next_results) != null) {

                $searchParam = json_decode($jsonData)->search_metadata->next_results;

                $jsonData = $twitter->setGetfield($searchParam)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest();

                $sum +=  $this->twitterHelperService->countTweet($jsonData);
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
    }

}