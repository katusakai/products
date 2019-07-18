<?php

namespace App\Http\Controllers;

use App\Aggregators\Products;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexJson()
    {
        $products = new Products;
        $products = $products->getSomeClient(15);
        return response()->json(
            $products
        );
    }

    public function show($product)
    {
        $product = Product::find($product);
        return view('product', compact('product'));
    }

    public function showJson($product)
    {
        $singleProduct = new Products();
        $singleProduct = $singleProduct->getOneClient($product);
        return response()->json(
            $singleProduct
        );
    }
}
