<?php

declare(strict_types=1);

use App\Modules\Invoices\Application\Http\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'invoice'], function (): void {
    Route::get('{id}', [InvoiceController::class, 'show']);
    Route::put('{id}/approve', [InvoiceController::class, 'approve']);
    Route::put('{id}/reject', [InvoiceController::class, 'reject']);
});
