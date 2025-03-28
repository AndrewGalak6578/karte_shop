<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductMinResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class FilterListController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $colors = Color::all();
        $tags = Tag::all();

        $maxPrice = Product::orderBy('price', 'DESC')->first()->price;
        $minPrice = Product::orderBy('price', 'ASC')->first()->price;

        $result = [
            'categories' => $categories,
            'colors' => $colors,
            'tags' => $tags,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice,
            ]
        ];

        return response()->json($result, 200);

    }
}
