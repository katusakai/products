<?php

use Illuminate\Database\Seeder;
use App\Product;
Use App\Image;

class ProductsAndImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 100)->create()->each(function ($product) {
            $product->images()->save(factory(Image::class)->make());
        });
    }
}
