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
        'base_salary' => $faker->numberBetween(100000, 300000),
    ];
});

$factory->define(\App\Models\Department::class, function (Generator $faker) {
    return [
        'name' => $faker->company,
    ];
});

$factory->define(\App\Models\Feedback::class, function (Generator $faker) {
    return [
        'content' => $faker->paragraphs(2, TRUE),
        'reply' => $faker->paragraphs(2, TRUE),
        'is_resolved' => $faker->boolean,
    ];
});

$factory->define(\App\Models\MonthlyLog::class, function (Generator $faker) {
    return [
        'date' => $faker->date(),
        'overtime_hours' => $faker->numberBetween(0, 10),
        'days_off' => $faker->numberBetween(0, 5),
    ];
});

$factory->define(\App\Models\DailyLog::class, function (Generator $faker) {
    $checkInAt = $faker->dateTimeThisMonth;
    $checkOutAt = $checkInAt;
    $workingHours = $faker->numberBetween(5, 9);
    $checkOutAt->add(new DateInterval('PT' . $workingHours . 'H'));

    return [
        'checked_in_at' => $checkInAt,
        'checked_out_at' => $checkOutAt,
        'working_hours' => $workingHours,
    ];
});
