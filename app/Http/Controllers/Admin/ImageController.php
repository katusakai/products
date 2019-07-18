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

//        $imagePath = $request->image->store('uploads', 'public');
//
//        \Intervention\Image\Facades\Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200)->save();

        $imagePath = request()->file('image')->store('images', ['disk' => 'my_files']);

        $image = new Image();
        $image->product_id = $productId;
        $image->image = $imagePath;
        $image->save();
//
        return redirect(route('admin.product.show', ['id' => $productId]));

    }

}