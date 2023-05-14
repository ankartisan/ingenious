<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects;

use App\Modules\Invoices\Application\Mappers\InvoiceProductMapper;
use App\Modules\Invoices\Domain\Model\Entities\InvoiceProduct;

class InvoiceProducts
{
    public array $value;

    public function __construct(array $invoiceProducts)
    {
        foreach ($invoiceProducts as $invoiceProduct) {
            if (!$invoiceProduct instanceof InvoiceProduct) {
                throw new \InvalidArgumentException('Invalid invoice product');
            }
        }
        $this->value = array_values($invoiceProducts);
    }

    public function jsonSerialize(): array
    {
        return array_map(function ($invoiceProduct) {
            return [
                'name' => $invoiceProduct->product->name,
                'quantity' => $invoiceProduct->quantity,
                'unit_price' => $invoiceProduct->product->price,
                'total' => $invoiceProduct->product->price * $invoiceProduct->quantity,
            ];
        }, $this->value);
    }


}
