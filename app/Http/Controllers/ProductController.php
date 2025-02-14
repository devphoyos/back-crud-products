<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Product;
use App\Utils\Constants;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return ApiResponse::success(Product::all(), Constants::SUCCESS, 200);
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $newProduct = Product::create($data);
        return ApiResponse::success($newProduct);
    }

    public function updateProduct(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $updatedProduct = $product->update($data);
        return ApiResponse::success($data);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return ApiResponse::success(["message" => "producto eliminado correctamente"]);
    }
}
