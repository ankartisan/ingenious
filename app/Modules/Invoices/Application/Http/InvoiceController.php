<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Http;

use App\Domain\Enums\StatusEnum;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Invoices\Application\Resources\InvoiceResource;
use App\Modules\Invoices\Domain\Repositories\InvoiceRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class InvoiceController
{
    public InvoiceRepositoryInterface $repository;

    public ApprovalFacadeInterface $approval;

    public function __construct()
    {
        $this->repository = app()->make(InvoiceRepositoryInterface::class);
        $this->approval = app()->make(ApprovalFacadeInterface::class);
    }

    public function show(string $id)
    {
        $invoice = $this->repository->findById($id);

        return new InvoiceResource($invoice);
    }

    public function approve(string $id): JsonResponse
    {
        $invoice = $this->repository->findById($id);

        try {
            $this->approval->approve(new ApprovalDto(
                $invoice->id,
                StatusEnum::tryFrom($invoice->status->value),
                get_class($invoice)
            ));

            return response()->json([
                'message' => 'Invoice approved',
            ]);
        } catch (\LogicException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function reject(string $id): JsonResponse
    {
        $invoice = $this->repository->findById($id);

        try {
            $this->approval->reject(new ApprovalDto(
                $invoice->id,
                StatusEnum::tryFrom($invoice->status->value),
                get_class($invoice)
            ));

            return response()->json([
                'message' => 'Invoice rejected',
            ]);
        } catch (\LogicException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
