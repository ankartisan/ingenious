<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Repositories;

use App\Modules\Invoices\Application\Dto\InvoiceStatusData;
use App\Modules\Invoices\Domain\Model\Invoice;

interface InvoiceRepositoryInterface
{
    public function findById(string $id): Invoice;

    public function updateStatus(InvoiceStatusData $invoice): void;
}
