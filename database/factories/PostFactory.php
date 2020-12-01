<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph(2),
        'status' => true,
        'photo' => 'https://via.placeholder.com/900x500',
        'author_id' => factory(App\User::class),
        'category_id' => factory(App\Category::class),
    ];
});

