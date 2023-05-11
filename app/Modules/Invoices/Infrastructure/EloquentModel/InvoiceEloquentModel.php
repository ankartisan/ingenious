<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\EloquentModel;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class InvoiceEloquentModel extends Model
{
    use HasUuids;

    protected $table = 'invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'date',
        'due_date',
        'company_id',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(CompanyEloquentModel::class, 'company_id');
    }

    public function billedCompany()
    {
        return $this->belongsTo(CompanyEloquentModel::class, 'company_id');
    }

    public function products()
    {
        return $this->hasMany(InvoiceProductEloquentModel::class, 'invoice_id');
    }
}
