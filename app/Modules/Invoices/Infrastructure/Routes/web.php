<?php

declare(strict_types=1);

use App\Modules\Invoices\Application\Http\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'invoice'], function (): void {
    Route::get('{id}', [InvoiceController::class, 'show']);
    Route::get('{id}/approve', [InvoiceController::class, 'approve']);
    Route::get('{id}/reject', [InvoiceController::class, 'reject']);
});
