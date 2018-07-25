<?php
namespace Services;

use Contracts\OutPutInterface;

class JsonOutputService implements OutPutInterface
{
    public function output($data)
    {
       return json_encode(array('Search_summary' => $data), JSON_FORCE_OBJECT);
    }
}
