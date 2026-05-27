<?php

namespace Tests\Feature;

use App\Models\SupplyOffer;
use App\Models\SupplyRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MarketplaceTest extends TestCase
{
    use RefreshDatabase;

    public function test_marketplace_dashboard_shows_active_requests_and_offers(): void
    {
        $request = SupplyRequest::factory()->create([
            'requester_name' => 'UMKM Sari Buah',
            'product_name' => 'Pisang Cavendish Segar',
            'delivery_location' => 'Bandung',
        ]);

        SupplyOffer::factory()->for($request)->create([
            'supplier_name' => 'Supplier Nusantara',
            'company_name' => 'PT Segar Makmur',
            'price_per_unit' => 12000,
            'supplier_verified' => true,
        ]);

        $response = $this->get(route('marketplace.index'));

        $response->assertOk()
            ->assertSee('Pisang Cavendish Segar')
            ->assertSee('UMKM Sari Buah')
            ->assertSee('Supplier Nusantara')
            ->assertSee('PT Segar Makmur');
    }

    public function test_business_can_publish_a_supply_request(): void
    {
        $response = $this->post(route('requests.store'), [
            'requester_name' => 'Rafael',
            'business_name' => 'Toko Buah Maju',
            'product_name' => 'Pisang Cavendish Segar',
            'quantity' => 150,
            'unit' => 'kg',
            'delivery_location' => 'Jakarta Timur',
            'needed_at' => now()->addDays(5)->toDateString(),
            'notes' => 'Butuh kualitas premium untuk promo akhir pekan.',
        ]);

        $response->assertRedirect(route('marketplace.index'));

        $this->assertDatabaseHas('supply_requests', [
            'requester_name' => 'Rafael',
            'business_name' => 'Toko Buah Maju',
            'product_name' => 'Pisang Cavendish Segar',
            'status' => 'open',
        ]);
    }

    public function test_verified_supplier_can_submit_an_offer_for_an_open_request(): void
    {
        $request = SupplyRequest::factory()->create();

        $response = $this->post(route('offers.store', $request), [
            'supplier_name' => 'Budi',
            'company_name' => 'CV Panen Raya',
            'price_per_unit' => 9800,
            'available_quantity' => 200,
            'quality_grade' => 'Grade A',
            'lead_time_days' => 2,
            'message' => 'Siap kirim dengan cold chain.',
            'supplier_verified' => '1',
        ]);

        $response->assertRedirect(route('marketplace.index'));

        $this->assertDatabaseHas('supply_offers', [
            'supply_request_id' => $request->id,
            'supplier_name' => 'Budi',
            'company_name' => 'CV Panen Raya',
            'supplier_verified' => 1,
        ]);
    }
}
