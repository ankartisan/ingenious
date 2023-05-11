<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Providers;

use App\Modules\Invoices\Application\Repositories\InvoiceRepository;
use App\Modules\Invoices\Domain\Repositories\InvoiceRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            InvoiceRepositoryInterface::class,
            InvoiceRepository::class
        );
    }
}
