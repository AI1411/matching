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
        'age' => config('const.ages')[rand(1,8)],
        'pref_id' => rand(1,47),
        'image' => 'berkay-gumustekin-ngqyo2AYYnE-unsplash.jpg',
        'introduce' => $faker->paragraph(rand(2,5)),
        'hobby_1' => $faker->word,
        'hobby_2' => $faker->word,
        'hobby_3' => $faker->word,
        'favorites_count' => rand(1,50),
        'likes_count' => rand(1, 50),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
