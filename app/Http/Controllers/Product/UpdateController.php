<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($data['preview_image'] == null) {
            unset($data['preview_image']);
        }
        else {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        $sizesIds = $data['sizes'];
        unset($data['tags'], $data['colors'], $data['sizes']);

        if ($data['is_published'] == null) {
            $data['is_published'] = 0;
        }

        $product->update($data);

        $product->tags()->sync($tagsIds);

        $product->colors()->sync($colorsIds);

        $product->sizes()->sync($sizesIds);


        return redirect()->route('product.show', $product->id);
    }
}
