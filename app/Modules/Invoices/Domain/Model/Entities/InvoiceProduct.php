<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\Entities;

class InvoiceProduct
{
    public function __construct(
        public int $id,
        public Product $product,
        public int $quantity
    ) {
    }
}
