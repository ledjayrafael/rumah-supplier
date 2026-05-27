<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplyOffer extends Model
{
    /** @use HasFactory<\Database\Factories\SupplyOfferFactory> */
    use HasFactory;

    protected $fillable = [
        'supply_request_id',
        'supplier_name',
        'company_name',
        'price_per_unit',
        'available_quantity',
        'quality_grade',
        'lead_time_days',
        'message',
        'supplier_verified',
    ];

    protected function casts(): array
    {
        return [
            'available_quantity' => 'decimal:2',
            'price_per_unit' => 'decimal:2',
            'supplier_verified' => 'boolean',
        ];
    }

    public function supplyRequest(): BelongsTo
    {
        return $this->belongsTo(SupplyRequest::class);
    }
}
