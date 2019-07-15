<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        return response()->json(
            $products
        );
    }

    public function destroy($id)
    {
        Product::destroy($id);

    }
}