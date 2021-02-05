<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Session_list;
use Faker\Generator as Faker;

$factory->define(Session_list::class, function (Faker $faker) {
    return [
        'name' => 'Spring 2020'
    ];
});
