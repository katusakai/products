<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return json_encode($products);
    }
}