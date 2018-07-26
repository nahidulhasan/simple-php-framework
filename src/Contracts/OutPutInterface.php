<?php
namespace Contracts;

interface OutPutInterface
{
    /**
     * Formatter Method
     *
     * @param $data array
     * @return mixed
     */
    public function output($data);
}