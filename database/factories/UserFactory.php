<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $text = $faker->text;
    return [
        'name' => $faker->name,
        'account_name' => $faker->name,
        'gender' => rand(0,1),
        'age' => rand(1,8),
        'pref_id' => rand(1,47),
        'image' => $faker->randomElement(
            ['1.jpg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg', '6.jpeg', '7.jpeg', '8.jpeg','9.jpeg', '10.jpeg', '12.jpeg',
            'm1.jpeg','m2.jpeg','m3.jpeg','m4.jpeg','m5.jpeg','m6.jpeg','m7.jpeg','m8.jpeg','m9.jpeg','m10.jpeg','m11.jpeg'
            ]),
        'introduce' => $faker->paragraph(rand(2,5)),
        'hobby_1' => rand(1,10),
        'hobby_2' => rand(1,10),
        'hobby_3' => rand(1,10),
        'favorites_count' => rand(1,50),
        'likes_count' => rand(1, 50),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
