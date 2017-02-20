<?php

namespace App;

use Izupet\Api\Requests\ApiRequest;

class name=Cars extends ApiRequest
{
    protected $model = 'car';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function getRules()
    {
        //
    }

    public function postRules()
    {
        //
    }

    public function putRules()
    {
        //
    }

    public function deleteRules()
    {
        //
    }

    public function modify(array $input)
    {
        return $input;
    }
}
