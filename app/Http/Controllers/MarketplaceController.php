<?php

namespace App\Http\Controllers;

use App\Models\SupplyRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class MarketplaceController extends Controller
{
    public function __invoke(): View
    {
        $requests = Cache::remember('marketplace:open-requests', now()->addMinutes(5), fn () => SupplyRequest::query()
            ->open()
            ->withCount('offers')
            ->withMin('offers', 'price_per_unit')
            ->with([
                'offers' => fn ($query) => $query
                    ->orderByDesc('supplier_verified')
                    ->orderBy('price_per_unit')
                    ->orderByDesc('created_at'),
            ])
            ->orderBy('needed_at')
            ->orderByDesc('created_at')
            ->get());

        return view('marketplace', compact('requests'));
    }
}
