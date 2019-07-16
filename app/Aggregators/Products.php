<?php


namespace App\Aggregators;


use App\Product;

class Products
{
    public static function get()
    {
        $products = Product::paginate(15);
        foreach ($products as $key => $product) {
            $product['images'] = $product->images;
            $product['discount'] = $product->discount;
            $products[$key] = $product;
        }
        return $products;
    }
}