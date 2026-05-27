<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplyRequest extends Model
{
    /** @use HasFactory<\Database\Factories\SupplyRequestFactory> */
    use HasFactory;

    protected $fillable = [
        'requester_name',
        'business_name',
        'product_name',
        'quantity',
        'unit',
        'delivery_location',
        'needed_at',
        'notes',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'needed_at' => 'date',
            'quantity' => 'decimal:2',
        ];
    }

    public function offers(): HasMany
    {
        return $this->hasMany(SupplyOffer::class);
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }
}
