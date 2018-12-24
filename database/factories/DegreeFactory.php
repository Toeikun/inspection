<?php

use Faker\Generator as Faker;

$factory->define(App\Degree::class, function (Faker $faker) {
    return [
        'name' => 'ปริญญาตรี',
        'note' => '-',
    ];
});
