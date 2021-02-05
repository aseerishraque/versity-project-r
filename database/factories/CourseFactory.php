<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    $teacherArr = \App\Teacher::pluck('id')->toArray();
    $sessionArr = \App\Session_list::pluck('id')->toArray();
    $subjectsArr = \App\Subject::pluck('id')->toArray();
    return [
        'subject_id' => $faker->randomElement($subjectsArr),
        'teacher_id' => $faker->randomElement($teacherArr),
        'session_id' => $faker->randomElement($sessionArr)
    ];
});
