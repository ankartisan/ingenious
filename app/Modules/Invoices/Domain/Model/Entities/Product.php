<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\Entities;

class Product
{
    public function __construct(
        public int $id,
        public string $name,
        public float $price,
        public string $currency
    ) {
    }
}
