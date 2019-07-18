<?php

namespace App\Http\Controllers;

use App\Aggregators\Products;
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
}
