<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects;

class InvoiceDate
{
    private \DateTime $invoiceDate;

    public function __construct(string $date)
    {
        $this->invoiceDate = new \DateTime($date);
    }

    public function __toString(): string
    {
        return $this->invoiceDate->format("m/d/Y");
    }
}
