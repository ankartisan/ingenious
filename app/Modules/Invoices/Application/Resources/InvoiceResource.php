<?php

namespace App\Modules\Invoices\Application\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'invoice_number' => $this->invoice_number,
            'invoice_date' => $this->invoice_date->jsonSerialize(),
            'due_date' => $this->due_date->jsonSerialize(),
            'company' => $this->company,
            'billed_company' => $this->billed_company,
            'products' => $this->products->jsonSerialize(),
            'total_price' => $this->total_price->jsonSerialize(),
            'status' => $this->status,
        ];
    }
}
