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

use Faker\Generator;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'gender' => $faker->boolean() ? 'Male' : 'Female',
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'base_salary' => $faker->numberBetween(10000000, 20000000),
    ];
});

$factory->define(\App\Models\Department::class, function (Generator $faker) {
    return [
        'name' => $faker->company,
    ];
});

$factory->define(\App\Models\Feedback::class, function (Generator $faker) {
    return [
        'content' => $faker->paragraphs(3, TRUE),
        'reply' => $faker->paragraphs(3, TRUE),
        'is_resolved' => $faker->boolean,
    ];
});

$factory->define(\App\Models\MonthlyLog::class, function (Generator $faker) {
    return [
        'month_year' => $faker->date(),
        'overtime_hours' => $faker->numberBetween(0, 10),
        'days_off' => $faker->numberBetween(0, 5),
    ];
});

$factory->define(\App\Models\DailyLog::class, function (Generator $faker) {
    return [
        'checked_in_at' => $faker->dateTime(),
        'checked_out_at' => $faker->dateTime(),
        'working_hours' => $faker->numberBetween(7, 9),
    ];
});
