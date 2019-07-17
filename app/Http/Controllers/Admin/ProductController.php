<?php


namespace App\Http\Controllers\Admin;


use App\Aggregators\Products;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductDiscount;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        return view('admin/index');
    }

    public function index()
    {
        $products = new Products;
        $products = $products->get();
        return response()->json(
            $products
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:60',
            'sku' => 'required',
            'price' => 'required|numeric|min:0.01',
            'description' => 'required',
            'discount' => 'required|numeric|max:99|min:0'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        if ($product->save()) {
            $discount = new ProductDiscount();
            $discount->product_id = Product::latest()->first()->id;
            $discount->discount = $request->discount;

            $discount->save();
        }

        return redirect(route('admin.products'));
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