<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\ImagePost::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
    ];
});

$factory->define(App\Upload::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'folder' => $faker->word,
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    $title = $faker->title;
    return [
        'title' => $title,
        'slug' => $faker->slug($title),
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
        'image_post_id' => function() {
            return factory('App\ImagePost')->create()->id;
        },
    ];
});