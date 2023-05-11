<?php

namespace App\Modules\Invoices\Application\Dto;

use App\Modules\Invoices\Domain\Model\ValueObjects\Status;
use Ramsey\Uuid\UuidInterface;

class InvoiceStatusData
{
    public function __construct(
        public UuidInterface $id,
        public Status $status
    )
    {}
}
