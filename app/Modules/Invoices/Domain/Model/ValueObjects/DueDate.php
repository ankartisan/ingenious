<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects;

class DueDate
{
    private \DateTime $dueDate;

    public function __construct(string $date)
    {
        $this->dueDate = new \DateTime($date);
    }

    public function __toString(): string
    {
        return $this->dueDate->format("m/d/Y");
    }
}
