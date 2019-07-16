<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $product = new \App\API\RandomProduct();
    return [
        'image' => $product->image,
    ];
});
