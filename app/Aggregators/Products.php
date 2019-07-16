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

            $product['price'] = $this->priceWithTaxes(floatval($product->price));
            $product['discount'] = $discount;  //todo fix this. in php it dumps integer, but in json it dumps whole object from discount_table
            $product['discounted_price'] = $this->priceCalculator($product['price'], $discount);
            $this->taxesText($product);
            $product['images'] = $product->images;

            $products[$key] = $product;
        }
        return $products;
    }

    private function priceCalculator($price, $discount)
    {
        $discounted_price = $price * (1 - $this->chooseDiscount($discount)/100);
        return $discounted_price;
    }

    private function chooseDiscount($discount)
    {
        if ($discount == 0) {
            return Config::getGlobalDiscount();
        } else {
            return $discount;
        }
    }

    private function taxesText($product) {
        if (Config::ifShowWithTaxes()){
            $product['taxes_text'] = ' including VAT';
        }
        return $product;
    }

    private function priceWithTaxes($price) {
        if(Config::ifShowWithTaxes()){
            $price *= 1 + Config::getTaxRate()/100;
        }
        return $price;
    }
}