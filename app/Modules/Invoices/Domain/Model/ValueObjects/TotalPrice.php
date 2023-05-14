<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects;

use App\Modules\Invoices\Domain\Model\Entities\InvoiceProduct;

class TotalPrice
{
    private float $value;

    public function __construct(array $invoiceProducts)
    {
        $this->value = collect($invoiceProducts)->reduce(function (?int $carry, InvoiceProduct $invoiceProduct) {
            return $carry + ($invoiceProduct->product->price * $invoiceProduct->quantity);
        });
    }

    public function jsonSerialize(): float
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
