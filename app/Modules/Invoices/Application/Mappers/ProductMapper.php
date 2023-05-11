<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Mappers;

use App\Modules\Invoices\Domain\Model\Entities\Product;
use App\Modules\Invoices\Infrastructure\EloquentModel\ProductEloquentModel;

class ProductMapper
{
    public static function fromEloquent(ProductEloquentModel $productEloquent): Product
    {
        return new Product(
            id: $productEloquent->id,
            name: $productEloquent->name,
            price: $productEloquent->price,
            currency: $productEloquent->currency
        );
    }

}
