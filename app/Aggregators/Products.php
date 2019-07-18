<?php


namespace App\Aggregators;


use App\Config;
use App\Helpers\UrlParser;
use App\Image;
use App\Product;

class Products
{
    public function getSomeAdmin($pages)
    {
        $products = Product::orderBy('created_at', 'desc')->paginate($pages);
        foreach ($products as $key => $product) {

            $this->agregate($product);

            $products[$key] = $product;
        }
        return $products;
    }

    public function getSomeClient($pages)
    {
        $imagesIds = Image::all()->pluck('product.id');
        $products = Product::where('status', 1)->whereIn('id', $imagesIds)->orderBy('created_at', 'desc')->paginate($pages);
        foreach ($products as $key => $product) {

            $this->agregate($product);

            $products[$key] = $product;
        }
        return $products;
    }

    public function getOne($id)
    {
        $product = Product::find($id);

        $this->agregate($product);

        return $product;

    }

    private function agregate($product)
    {
        $discount = intval($product->discount->discount);

        $product['base_price'] = round(floatval($product->price), 2);
        $product['price'] = round($this->priceWithTaxes(floatval($product->price)), 2);
        $product['discount'] = $discount;  //todo fix this. in php it dumps integer, but in json it dumps whole object from discount_table
        $product['discounted_price'] = round($this->priceCalculator($product['price'], $discount), 2);
        $this->taxesText($product);
        $product['images'] = $this->imgUrls($product->images);

        return $product;
    }

    private function imgUrls($images)
    {
        foreach ($images as $image) {
            if (UrlParser::ifLocal($image->image)) {
                $image->image = '/uploads/' . $image->image;
            }
        }
        return $images;
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
        if (Config::ifShowWithTaxes() && Config::getTaxRate()){
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