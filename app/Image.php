<?php

namespace App;

use Izupet\Api\ApiModel;

class Image extends ApiModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'path',
        'extension',
        'mime',
        'imageable_id',
        'imageable_type',
        'position'
    ];

    protected $visible = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'imageable_type',
        'imageable_id'
    ];
}
