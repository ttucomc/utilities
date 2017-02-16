<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name'     => $faker->name,
        'last_name'      => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'is_admin'       => $faker->randomNumber(1),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        'eraiderID'      => 'test-raiderID',
        'first_name'     => $faker->name,
        'last_name'      => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'title'          => $faker->titleMale,
        'department'     => $faker->company,
        'room_number'    => '225B'
    ];
});

$factory->define(App\TeamChangeProfileRequest::class, function (Faker\Generator $faker) {
    return [
        'first_name'     => 'New First Name',
        'last_name'      => 'New Last Name',
        'email'          => 'newtestemail@mail.com',
        'title'          => 'New Fake Title',
        'department'     => 'CoMC New Fake Department',
        'room_number'    => '220B'
    ];
});
