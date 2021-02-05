<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enrollment;
use Faker\Generator as Faker;

$factory->define(Enrollment::class, function (Faker $faker) {
    $courseArr = \App\Course::pluck('id')->toArray();
    $sessionArr = \App\Session_list::pluck('id')->toArray();
    $studentArr = \App\Student::pluck('id')->toArray();
    $type = array('Retake', 'Recourse');
    return [
        'student_id' =>$faker->randomElement($studentArr),
        'course_id' =>$faker->randomElement($courseArr),
        'session_id' =>$faker->randomElement($sessionArr),
        'type' =>  $faker->randomElement($type),
    ];
});
