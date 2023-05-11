<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\EloquentModel;

use Illuminate\Database\Eloquent\Model;

class ProductEloquentModel extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'price',
        'currency',
    ];
}
