<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Mappers;

use App\Modules\Invoices\Domain\Model\Entities\InvoiceProduct;
use App\Modules\Invoices\Infrastructure\EloquentModel\InvoiceProductEloquentModel;

class InvoiceProductMapper
{
    public static function fromEloquent(InvoiceProductEloquentModel $invoiceProductEloquent): InvoiceProduct
    {
        return new InvoiceProduct(
            id: $invoiceProductEloquent->id,
            product: ProductMapper::fromEloquent($invoiceProductEloquent->product),
            quantity: $invoiceProductEloquent->quantity
        );
    }

    public static function fromArray(array $invoiceProduct): InvoiceProduct
    {
        $invoiceProductEloquentModel = new InvoiceProductEloquentModel($invoiceProduct);
        $invoiceProductEloquentModel->id = $invoiceProduct['id'] ?? null;

        return self::fromEloquent($invoiceProductEloquentModel);
    }

}
