<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects;

use App\Modules\Invoices\Domain\Model\Entities\InvoiceProduct;

class InvoiceProducts
{
    public array $invoiceProducts;

    public function __construct(array $invoiceProducts)
    {
        foreach ($invoiceProducts as $invoiceProduct) {
            if (!$invoiceProduct instanceof InvoiceProduct) {
                throw new \InvalidArgumentException('Invalid invoice product');
            }
        }
        $this->invoiceProducts = array_values($invoiceProducts);
    }
}
