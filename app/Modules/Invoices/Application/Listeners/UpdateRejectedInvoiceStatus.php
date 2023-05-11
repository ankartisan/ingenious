<?php

namespace App\Modules\Invoices\Application\Listeners;

use App\Modules\Approval\Api\Events\EntityRejected;
use App\Modules\Invoices\Application\Dto\InvoiceStatusData;
use App\Modules\Invoices\Domain\Model\ValueObjects\Status;
use App\Modules\Invoices\Domain\Repositories\InvoiceRepositoryInterface;

class UpdateRejectedInvoiceStatus
{
    public InvoiceRepositoryInterface $repository;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        $this->repository = app()->make(InvoiceRepositoryInterface::class);
    }

    /**
     * Handle the event.
     */
    public function handle(EntityRejected $event): void
    {
        $data = $event->approvalDto;

        $this->repository->updateStatus(new InvoiceStatusData(
            $data->id,
            Status::REJECTED
        ));
    }
}
