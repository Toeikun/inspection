<?php

use Faker\Generator as Faker;

$factory->define(App\Staff::class, function (Faker $faker) {
    return [
        'staff_id' => str_random(10),
        'firstname' => $faker->firstNameMale(),
        'lastname' => $faker->lastname(),
        'email' => 'kuhlman@example.com',
        'contact' => '0801113846',
        'status_id' => 1,
        'faculty_id' => 1,
        'position_id' => 1,
        'department_id' => 1,
        'permission_id' => 1,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
