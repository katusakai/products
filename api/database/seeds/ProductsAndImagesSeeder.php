<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Image;
use App\ProductDiscount;

class ProductsAndImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 500)->create()
            ->each(function ($product) {
                $product->images()->save(factory(Image::class)->make());
        })
            ->each(function ($product) {
            $product->discount()->save(factory(ProductDiscount::class)->make());
        });
    }
}
