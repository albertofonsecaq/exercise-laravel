<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\PurchaseOrder;
use Faker\Generator as Faker;

$factory->define(PurchaseOrder::class, function (Faker $faker) {
    return [
        'code' => $faker->uuid
    ];
});
