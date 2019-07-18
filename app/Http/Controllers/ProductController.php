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

        if ($product->status == '0' || $product->images->isEmpty()) {
            return abort(404);
        }
        return view('product', compact('product'));
    }

    public function showJson($product)
    {
        $singleProduct = new Products();
        $singleProduct = $singleProduct->getOne($product);

        return response()->json(
            $singleProduct
        );
    }
}
