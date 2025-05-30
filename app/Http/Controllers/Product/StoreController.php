<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $productImages = $data['product_images'];

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);



        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        $sizesIds = $data['sizes'];
        unset($data['tags'], $data['colors'], $data['product_images'], $data['sizes']);

        $product = Product::firstOrCreate([
            'title' => $data['title'],
        ], $data);

        foreach ($tagsIds as $tagId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId,
            ]);
        }
        foreach ($sizesIds as $sizeId) {
            ProductSize::firstOrCreate([
                'product_id' => $product->id,
                'size_id' => $sizeId,
            ]);
        }
        foreach ($colorsIds as $colorId) {
            ColorProduct::firstOrCreate([
                'color_id' => $colorId,
                'product_id' => $product->id,
            ]);
        }
        foreach ($productImages as $productImage) {
            $currentImagesCount = ProductImage::where('product_id', $product->id)->count();

            if ($currentImagesCount > 3) continue;
            $filePath = Storage::disk('public')->put('/images', $productImage);
            ProductImage::create([
                'file_path' => $filePath,
                'product_id' => $product->id,
            ]);
        }


        return redirect()->route('product.index');
    }
}
