<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        factory(App\User::class, 10)->create();
    }
}
