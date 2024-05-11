<?php

declare(strict_types=1);

namespace App\Storages\Product;

use App\Models\Product;

class ProductStorage implements ProductStorageInterface
{
    public function getAllProducts(): array
    {
        return Product::all()->toArray();
    }

    public function getProductDetails(int $productId): ?Product
    {
        return Product::find($productId);
    }
}
