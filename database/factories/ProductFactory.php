<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'description' => $faker->text(),
        'price'=>  $faker->randomFloat(2,1,20),
    ];
});
