<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Repositories;

use App\Modules\Invoices\Application\Dto\InvoiceStatusData;
use App\Modules\Invoices\Application\Mappers\InvoiceMapper;
use App\Modules\Invoices\Domain\Model\Invoice;
use App\Modules\Invoices\Domain\Model\ValueObjects\Status;
use App\Modules\Invoices\Domain\Repositories\InvoiceRepositoryInterface;
use App\Modules\Invoices\Infrastructure\EloquentModel\InvoiceEloquentModel;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function findById(string $id): Invoice
    {
        $invoiceEloquent = InvoiceEloquentModel::query()->findOrFail($id);

        return InvoiceMapper::fromEloquent($invoiceEloquent);
    }

    public function updateStatus(InvoiceStatusData $invoice): void
    {
        $invoiceEloquent = InvoiceEloquentModel::query()->findOrFail($invoice->id);

        $invoiceEloquent->update([
            'status' => $invoice->status->value,
        ]);
    }
}
