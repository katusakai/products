<?php


namespace App\Http\Controllers\Admin;


use App\Aggregators\Products;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductDiscount;
use App\Validations\ProductValidation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function indexJson()
    {
        $products = new Products;
        $products = $products->getSome(15);
        return response()->json(
            $products
        );
    }

    public function show($product)
    {
        $product = Product::find($product);
        return view('admin.product.show', compact('product'));
    }

    public function showJson($product)
    {
        $singleProduct = new Products();
        $singleProduct = $singleProduct->getOne($product);
        return response()->json(
            $singleProduct

        );
    }

    public function store(Request $request)
    {
        $request->validate(ProductValidation::get());

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

    public function update($id, Request $request)
    {
        $request->validate(ProductValidation::get());

        $product = Product::find($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        if ($product->save()) {
            $discount = ProductDiscount::where('product_id', $id)->first();
            $discount->discount = $request->discount;

            $discount->save();
        }

        return redirect(route('admin.product.update', ['id' => $id]));
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