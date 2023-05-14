<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects;

class DueDate
{
    private \DateTime $value;

    public function __construct(string $date)
    {
        $this->value = new \DateTime($date);
    }

    public function jsonSerialize(): string
    {
        return $this->value->format("m/d/Y");
    }

    public function __toString(): string
    {
        return $this->value->format("m/d/Y");
    }
}
