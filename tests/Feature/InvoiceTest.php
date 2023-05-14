<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Domain\Enums\StatusEnum;
use App\Modules\Invoices\Infrastructure\EloquentModel\InvoiceEloquentModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testInvoiceShow(): void
    {
        $invoice = InvoiceEloquentModel::all()->random();

        $response = $this->get('/invoice/' . $invoice->id);

        $response->assertJsonStructure([
            'data' => [
                'invoice_number',
                'invoice_date',
                'due_date',
                'company' => [
                    'id',
                    'name',
                    'street_address',
                    'city',
                    'zip_code',
                    'phone',
                    'email',
                ],
                'billed_company' => [
                    'id',
                    'name',
                    'street_address',
                    'city',
                    'zip_code',
                    'phone',
                    'email',
                ],
                'products' => [
                    [
                        'name',
                        'quantity',
                        'unit_price',
                        'total',
                    ],
                ],
                'total_price',
                'status',
            ],
        ]);
    }

    /**
     * @test
     */
    public function testInvoiceApprove(): void
    {
        $invoice = InvoiceEloquentModel::where('status', StatusEnum::DRAFT)->get()->random();

        $response = $this->put('/invoice/' . $invoice->id . '/approve');

        $response->assertOk();

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'status' => StatusEnum::APPROVED,
        ]);
    }

    /**
     * @test
     */
    public function testInvoiceReject(): void
    {
        $invoice = InvoiceEloquentModel::where('status', StatusEnum::DRAFT)->get()->random();

        $response = $this->put('/invoice/' . $invoice->id . '/reject');

        $response->assertOk();

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'status' => StatusEnum::REJECTED,
        ]);
    }

    /**
     * @test
     */
    public function testInvoiceAlreadyApprovedOrRejected(): void
    {
        $invoice = InvoiceEloquentModel::where('status', StatusEnum::APPROVED)->get()->random();

        $response = $this->put('/invoice/' . $invoice->id . '/reject');

        $this->assertEquals($response->getStatusCode(), Response::HTTP_BAD_REQUEST);

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'status' => $invoice->status,
        ]);
    }
}
