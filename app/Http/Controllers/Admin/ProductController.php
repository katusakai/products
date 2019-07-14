<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
//        $products = Product::all();
        $products = Product::paginate(15);
        return json_encode($products);
    }
}