<?php
namespace Services;

use Nahid\JsonQ\Jsonq;


class TwitterHelperService
{

    /**
     * Count Tweet from Json data
     *
     * @param $jsonData
     * @return int
     */
    public function countTweet($jsonData)
    {
        $q = (new Jsonq())->json($jsonData);
        $res = $q->from('statuses')
            ->count();

        return $res;

    }

}