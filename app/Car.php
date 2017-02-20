<?php

namespace App;

use Izupet\Api\ApiModel;

class Car extends ApiModel
{
    protected $table = 'cars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',
        'type',
        'model',
        'brand',
        'user_id'
    ];

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable')->orderBy('position', 'asc');
    }
}
