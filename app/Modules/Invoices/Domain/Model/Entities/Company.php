<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\Entities;

class Company
{
    public function __construct(
        public int $id,
        public string $name,
        public string $street_address,
        public string $city,
        public string $zip_code,
        public string $phone,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'street_address' => $this->street_address,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'phone' => $this->phone,
        ];
    }
}
