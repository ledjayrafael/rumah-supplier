<?php

namespace App\Http\Controllers;

use App\Models\SupplyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class SupplyRequestController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'requester_name' => ['required', 'string', 'max:100'],
            'business_name' => ['nullable', 'string', 'max:120'],
            'product_name' => ['required', 'string', 'max:120'],
            'quantity' => ['required', 'numeric', 'min:0.01', 'max:999999.99'],
            'unit' => ['required', 'string', 'max:20'],
            'delivery_location' => ['required', 'string', 'max:120'],
            'needed_at' => ['required', 'date', 'after_or_equal:today'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'status' => ['nullable', Rule::in(['open', 'matched', 'fulfilled'])],
        ]);

        SupplyRequest::create($validated + ['status' => $validated['status'] ?? 'open']);

        Cache::forget('marketplace:open-requests');

        return to_route('marketplace.index')->with('status', 'Kebutuhan berhasil dipublikasikan.');
    }
}
