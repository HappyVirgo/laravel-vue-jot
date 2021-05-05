<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'name' => $faker->name,
        'email' => $faker->email,
        'birthday' => '09/10/1999',
        'company' => $faker->company,
    ];
});
