<?php

namespace App\Http\Requests;

use Izupet\Api\Requests\ApiRequest;

class CarsRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function getRules()
    {
        return $this
            ->search(['model', 'brand'])
            ->pagination()
            ->fields(['model', 'brand', 'id', 'type', 'createdAt', 'images' => ['path', 'id', 'position', 'mime', 'extension', 'createdAt']])
            ->order(['model', 'brand', 'id'])
            ->filter([
                'type'                => 'in:coupe,convertable,suv,sedan',
                'images_position'     => 'numeric|min:0|max:4',
                'images_position_nq'  => 'numeric|min:0|max:4',
                'images_path'         => 'max:99',
                'brand'               => 'alpha',
                'images_createdAt_gt' => 'date_format:Y-m-d',
                'createdAt_lt'        => 'date_format:Y-m-d',
                'id'                  => 'numeric'
            ]);
    }

    public function postRules()
    {
        return $this
            ->fields(['model', 'brand', 'id', 'type', 'createdAt'])
            ->body([
                'type'  => 'required|in:coupe,convertable,suv,sedan',
                'model' => 'required',
                'brand' => 'required'
            ]);
    }

    public function putRules()
    {
        return $this
            ->fields(['model', 'id', 'images', 'brand', 'images' => ['id', 'path', 'position', 'mime', 'extension']])
            ->body([
                'type'  => 'in:coupe,convertable,suv,sedan',
                'model' => 'alpha',
                'brand' => 'alpha_dash'
            ]);
    }

    public function modify(array $input)
    {
        if (array_key_exists('images', $input['fields']['relations'])) {
            $input['fields']['relations']['images'][] = 'imageable_id';
        }

        return $input;
    }
}
