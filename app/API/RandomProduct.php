<?php


namespace App\API;


use PragmaRX\Random\Random;

class RandomProduct
{
    public $name;
    public $image;
    public $sku;
    public $price;

    public function __construct()
    {
        $this->generate();
    }

    private function generate()
    {
        $json = file_get_contents('https://www.randomlists.com/data/things.json');
        $products = json_decode($json)->RandL->items;
        $random_value = array_rand($products);

        $random_string = new Random();

        $this->name = $products[$random_value];
        $this->image = 'https://www.randomlists.com/img/things/'. $this->name . '.jpg';
        $this->sku = $random_string->size(8)->get();
        $this->price = $random_string->numeric()->size(rand(4, 5))->get()/100;
    }
}