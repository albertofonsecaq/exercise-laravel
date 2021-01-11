<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'description'=> $faker->streetName
    ];
});
