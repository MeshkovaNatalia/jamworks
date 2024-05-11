<?php

declare(strict_types=1);

namespace App\Services\Product;

use App\Models\Product;
use App\Storages\Product\ProductStorageInterface;

class ProductService implements ProductServiceInterface
{
    public function __construct(
        private ProductStorageInterface $productStorage,
    ) {
    }

    public function getAllProducts(): array
    {
        return $this->productStorage->getAllProducts();
    }

    public function getProductDetails(int $productId): ?Product
    {
        return $this->productStorage->getProductDetails($productId);
    }
}
