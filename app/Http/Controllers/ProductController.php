<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAllProducts(): JsonResponse
    {
        $products = Product::all();

        return new JsonResponse(['products' => $products]);
    }

    public function getProductDetails(int $productId): JsonResponse
    {
        $product = Product::find($productId);

        return new JsonResponse(['product' => $product]);
    }
}
