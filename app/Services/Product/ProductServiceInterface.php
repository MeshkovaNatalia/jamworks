<?php

declare(strict_types=1);

namespace App\Services\Product;

use App\Models\Product;

interface ProductServiceInterface
{
    /**
     * @return array<Product>
     */
    public function getAllProducts(): array;

    public function getProductDetails(int $productId): ?Product;
}
