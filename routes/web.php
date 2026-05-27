<?php

use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\SupplyOfferController;
use App\Http\Controllers\SupplyRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', MarketplaceController::class)->name('marketplace.index');
Route::post('/requests', [SupplyRequestController::class, 'store'])->name('requests.store');
Route::post('/requests/{supplyRequest}/offers', [SupplyOfferController::class, 'store'])->name('offers.store');
