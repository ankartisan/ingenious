<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application\Mappers;

use App\Modules\Invoices\Infrastructure\EloquentModel\CompanyEloquentModel;
use App\Modules\Invoices\Domain\Model\Entities\Company;

class CompanyMapper
{
    public static function fromEloquent(CompanyEloquentModel $companyEloquent): Company
    {
        return new Company(
            id: $companyEloquent->id,
            name: $companyEloquent->name,
            street_address: $companyEloquent->street,
            city: $companyEloquent->city,
            zip_code: $companyEloquent->zip,
            phone: $companyEloquent->phone,
            email: $companyEloquent->email
        );
    }

}
