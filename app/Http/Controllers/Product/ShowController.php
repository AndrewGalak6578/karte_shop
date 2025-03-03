<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = $product->tags()->get();
        $colors = $product->colors()->get();

        return view('product.show', compact('product', 'tags', 'colors'));
    }
}
