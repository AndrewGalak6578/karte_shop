<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->tags()->detach();
        $product->colors()->detach();
        $product->images()->delete();
        $product->sizes()->detach();

        $product->delete();

        return redirect()->route('product.index');
    }
    public function create()
    {

    }
}
