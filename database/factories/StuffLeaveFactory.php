<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stuff_leave;
use Faker\Generator as Faker;

$factory->define(Stuff_leave::class, function (Faker $faker) {
    $teacherArr = \App\Teacher::pluck('id')->toArray();
    $date_start = date_create($faker->date($format = 'Y-m-d', $max = 'now')) ;
    $date_end = date_create($faker->date($format = 'Y-m-d', $max = '2020-12-7'));
    $number_of_days = date_diff($date_start, $date_end);
    $number_of_days = $number_of_days->format('%a');
    return [
        'teacher_id' => $faker->randomElement($teacherArr),
        'date_start' => $date_start,
        'date_end' => $date_end,
        'number_of_days' => $number_of_days,
        'remarks' =>$faker->text(100),
        'document' => $faker->countryCode.'jpg',
        'is_approve' => $faker->randomElement(array(0, 1))
    ];
});
