<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\PostDescription::class, function (Faker $faker) {
    return [
        'post_id' => factory(App\Post::class),
        'description' => $faker->paragraph(5),
    ];
});
