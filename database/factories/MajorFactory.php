<?php

use Faker\Generator as Faker;

$factory->define(App\Major::class, function (Faker $faker) {
    return [
        'name' => 'สาขาวิชาเทคโนโลยีสารสนเทศ',
        'note' => '-',
    ];
});
