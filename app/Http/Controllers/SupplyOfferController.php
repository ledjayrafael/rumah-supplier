<?php

namespace App\Http\Controllers;

use App\Models\SupplyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class SupplyOfferController extends Controller
{
    public function store(Request $request, SupplyRequest $supplyRequest): RedirectResponse
    {
        if ($supplyRequest->status !== 'open') {
            throw ValidationException::withMessages([
                'offer' => 'Kebutuhan ini sudah ditutup dan tidak menerima penawaran baru.',
            ]);
        }

        $validated = $request->validate([
            'supplier_name' => ['required', 'string', 'max:100'],
            'company_name' => ['nullable', 'string', 'max:120'],
            'price_per_unit' => ['required', 'numeric', 'min:0.01', 'max:999999999.99'],
            'available_quantity' => ['required', 'numeric', 'min:0.01', 'max:999999.99'],
            'quality_grade' => ['required', 'string', 'max:80'],
            'lead_time_days' => ['nullable', 'integer', 'min:0', 'max:365'],
            'message' => ['nullable', 'string', 'max:1000'],
            'supplier_verified' => ['nullable', 'boolean'],
        ]);

        $supplyRequest->offers()->create($validated + [
            'supplier_verified' => $request->boolean('supplier_verified'),
        ]);

        Cache::forget('marketplace:open-requests');

        return to_route('marketplace.index')->with('status', 'Penawaran supplier berhasil dikirim.');
    }
}
