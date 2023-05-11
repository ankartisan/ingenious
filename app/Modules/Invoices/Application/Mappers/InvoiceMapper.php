<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Mappers;

use App\Modules\Invoices\Domain\Model\Invoice;
use App\Modules\Invoices\Domain\Model\ValueObjects\DueDate;
use App\Modules\Invoices\Domain\Model\ValueObjects\InvoiceDate;
use App\Modules\Invoices\Domain\Model\ValueObjects\InvoiceProducts;
use App\Modules\Invoices\Domain\Model\ValueObjects\Status;
use App\Modules\Invoices\Domain\Model\ValueObjects\TotalPrice;
use App\Modules\Invoices\Infrastructure\EloquentModel\InvoiceEloquentModel;
use Ramsey\Uuid\Uuid;

class InvoiceMapper
{
    public static function fromEloquent(InvoiceEloquentModel $invoiceEloquent): Invoice
    {
        return new Invoice(
            id: Uuid::fromString($invoiceEloquent->id),
            invoice_number: $invoiceEloquent->number,
            invoice_date: new InvoiceDate($invoiceEloquent->date),
            due_date: new DueDate($invoiceEloquent->due_date),
            company: CompanyMapper::fromEloquent($invoiceEloquent->company),
            billed_company: CompanyMapper::fromEloquent($invoiceEloquent->company),
            products: new InvoiceProducts(array_map(function ($invoiceProduct) {
                return InvoiceProductMapper::fromArray($invoiceProduct);
            }, $invoiceEloquent->products->toArray())),
            total_price: new TotalPrice(array_map(function ($invoiceProduct) {
                return InvoiceProductMapper::fromArray($invoiceProduct);
            }, $invoiceEloquent->products->toArray())),
            status: Status::from($invoiceEloquent->status)
        );
    }
}
