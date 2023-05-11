<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model;

use App\Modules\Invoices\Domain\Model\Entities\Company;
use App\Modules\Invoices\Domain\Model\ValueObjects\DueDate;
use App\Modules\Invoices\Domain\Model\ValueObjects\InvoiceDate;
use App\Modules\Invoices\Domain\Model\ValueObjects\InvoiceProducts;
use App\Modules\Invoices\Domain\Model\ValueObjects\Status;
use App\Modules\Invoices\Domain\Model\ValueObjects\TotalPrice;
use Ramsey\Uuid\UuidInterface;

class Invoice
{
    public function __construct(
        public UuidInterface $id,
        public string $invoice_number,
        public InvoiceDate $invoice_date,
        public DueDate $due_date,
        public Company $company,
        public Company $billed_company,
        public InvoiceProducts $products,
        public TotalPrice $total_price,
        public Status $status

    ) {
    }

}
