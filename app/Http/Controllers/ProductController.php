<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Services\Product\ProductServiceInterface;

class ProductController extends Controller
{
    public function __construct(
        private ProductServiceInterface $productService,
    ) {
    }

    public function getAllProducts(): JsonResponse
    {
        $products = $this->productService->getAllProducts();

        return new JsonResponse(['products' => $products]);
    }

    public function getProductDetails(int $productId): JsonResponse
    {
        $product = $this->productService->getProductDetails($productId);

        return new JsonResponse(['product' => $product]);
    }
}
