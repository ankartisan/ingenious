<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects;

use App\Modules\Invoices\Domain\Model\Entities\Company as CompanyEntity;

class BilledCompany
{
    public CompanyEntity $company;

    public function __construct($company)
    {
        if (!$company instanceof CompanyEntity) {
            throw new \InvalidArgumentException('Invalid company');
        };

        $this->company = $company;
    }
}
