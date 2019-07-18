<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;
use App\API\RandomProduct;

$factory->define(Product::class, function (Faker $faker) {
    $product = new RandomProduct();
    return [
        'name' => $product->name,
        'sku' => $product->sku,
        'price' => $product->price,
        'description' => $faker->realText(),
    ];
});
