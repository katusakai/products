<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Product;

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

    public function changeStatus(int $id, bool $value)
    {
        $product = Product::find($id);
        $product->status = $value;
        $product->save();
    }
}