<?php

declare(strict_types=1);

namespace App\Storages\Product;

use App\Models\Product;

interface ProductStorageInterface
{
    /**
     * @return Product[]
     */
    public function getAllProducts(): array;

    public function getProductDetails(int $productId): ?Product;
}
