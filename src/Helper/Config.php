<?php
namespace Helper;


class Config
{
    public static  function getSettings()
    {
        return $settings = array(
            'oauth_access_token' => getenv('OAUTH_ACCESS_TOKEN'),
            'oauth_access_token_secret' => getenv('OAUTH_ACCESS_TOKEN_SECRET'),
            'consumer_key' => getenv('CONSUMER_KEY'),
            'consumer_secret' => getenv('CONSUMER_SECRET')
        );
    }


    public  static  function getUrl()
    {
        return $url = getenv('API_URL');

        //'https://api.twitter.com/1.1/search/tweets.json';

        //https://api.twitter.com/1.1/search/tweets.json?q=google&count=100&since_id=100
    }

    public  static  function getConfig($index)
    {
        $config =require(ROOT_DIR.'/Config/api.php');

        if(isset($config[$index])) {
            return $config[$index];
        } else {
            return NULL;
        }
    }

}