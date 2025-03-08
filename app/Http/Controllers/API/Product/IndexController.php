<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\IndexProductResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        if (empty($data["order"]) || !in_array($data["order"], ["ASC", "DESC"])) {
            $products = Product::filter($filter)->paginate(12, ['*'], 'page', $data["page"]);
        }
        else {
            $order = $data["order"];
            $products = Product::filter($filter)->orderBy('price', $order)->paginate(12, ['*'], 'page', $data["page"]);
        }
        return IndexProductResource::collection($products);
    }
}
