<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\EloquentModel;

use Illuminate\Database\Eloquent\Model;

class InvoiceProductEloquentModel extends Model
{
    protected $table = 'invoice_product_lines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_id' ,
        'product_id',
        'quantity',
    ];

    public function invoice()
    {
        return $this->belongsTo(InvoiceEloquentModel::class, 'invoice_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductEloquentModel::class, 'product_id');
    }
}
