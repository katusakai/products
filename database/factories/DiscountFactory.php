<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\ProductDiscount;

$factory->define(ProductDiscount::class, function (Faker $faker) {
    $randomDiscount = rand(1,30);
    $randomNumber = rand(0,10);
    return [
        'discount' => $randomNumber < 3 ? $randomDiscount : 0,
    ];
});
