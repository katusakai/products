<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store($product, Request $request)
    {
        $pathInfoArray = explode('/', $request->getPathInfo());  //todo fix this to use function parameter, not find it from request
        $productId = end($pathInfoArray);

        $data = $request->validate([
            'image' => 'required|image'
        ]);

        $imagePath = request()->file('image')->store('images', ['disk' => 'my_files']);
        $savedPath = public_path() . '/uploads/' . $imagePath;
        \Intervention\Image\Facades\Image::make($savedPath)->fit(800, 800)->save();

        $image = new Image();
        $image->product_id = $productId;
        $image->image = $imagePath;
        $image->save();
//
        return redirect(route('admin.product.show', ['id' => $productId]));

    }

}