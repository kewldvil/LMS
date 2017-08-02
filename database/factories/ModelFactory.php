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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'username'=> strtolower($faker->username),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Borrower::class, function (Faker\Generator $faker) {

    return [
        'name' => ucfirst($faker->name),
        'sex'=>$faker->randomElement($array = array ('m', 'f')),
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'photo'=> $faker->imageUrl($width = 640, $height = 480),
    ];
});
