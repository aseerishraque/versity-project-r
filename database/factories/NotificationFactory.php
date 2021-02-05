<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notification;
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'notification' => $faker->text(100),
        'user_id' => $faker->numberBetween(1,5),
        'is_notify' => $faker->randomElement($array = array(0, 1)),
        'is_delete' => $faker->randomElement($array = array(0, 1)),
        'is_admin' => $faker->randomElement($array = array(0, 1)),
        'is_teacher' => $faker->randomElement($array = array(0, 1)),
        'is_student' => $faker->randomElement($array = array(0, 1)),
    ];
});
