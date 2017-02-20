<?php

use Illuminate\Database\Seeder;

class Cars extends Seeder
{
    public function run()
    {
        factory(App\Car::class, 500)->create()->each(function($cars) {
            for ($i=0; $i < rand(1, 5) ; $i++) {
                $cars->images()->save(factory(App\Image::class)->make([
                    'position'          => $i,
                    'imageable_id'      => $cars->id
                ]));
            }
        });
    }
}
