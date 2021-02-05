<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name($gender = 'male' | 'female'),
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => 'password'
    ];
});
