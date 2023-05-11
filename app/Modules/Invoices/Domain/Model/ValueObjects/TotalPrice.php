<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects;

use App\Modules\Invoices\Domain\Model\Entities\InvoiceProduct;

class TotalPrice
{
    public float $totalPrice;

    public function __construct(array $invoiceProducts)
    {
        $this->totalPrice = collect($invoiceProducts)->reduce(function (?int $carry, InvoiceProduct $invoiceProduct) {
            return $carry + ($invoiceProduct->product->price * $invoiceProduct->quantity);
        });
    }

    public function __toString(): string
    {
        return (string) $this->totalPrice;
    }
}
