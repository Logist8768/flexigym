<?php

namespace Modules\Product\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Resources\ProductCollection;
use Modules\Product\Http\Resources\ProductResource;
use Modules\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    public function index(Request $request, ProductRepository $data)
    {
        $products = $data->list($request);

        return new ProductCollection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
