<?php


namespace App\Http\Controllers\Admin;


use App\Aggregators\Products;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function home()
    {
        return view('admin/index');
    }

    public function index()
    {
        $products = Products::get();
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