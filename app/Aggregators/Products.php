<?php


namespace App\Aggregators;


use App\Config;
use App\Product;

class Products
{
    public function get()
    {
        $products = Product::paginate(15);
        foreach ($products as $key => $product) {
            $discount = intval($product->discount->discount);

            $product['discount'] = $discount;
            $product['discounted_price'] = $this->priceCalculator($product['price'], $discount);
            $product['images'] = $product->images;

            $products[$key] = $product;
        }
        return $products;
    }

    private function priceCalculator($price, $discount)
    {
        $discounted_price = $price * (1 - $this->choseDiscount($discount)/100);
        return $discounted_price;
    }

    private function choseDiscount($discount)
    {
        if ($discount == 0) {
            return Config::getGlobalDiscount();
        } else {
            return $discount;
        }
    }


}