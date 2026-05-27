<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supply_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supply_request_id')->constrained()->cascadeOnDelete();
            $table->string('supplier_name');
            $table->string('company_name')->nullable();
            $table->decimal('price_per_unit', 12, 2);
            $table->decimal('available_quantity', 10, 2);
            $table->string('quality_grade');
            $table->unsignedSmallInteger('lead_time_days')->nullable();
            $table->text('message')->nullable();
            $table->boolean('supplier_verified')->default(false);
            $table->timestamps();

            $table->index(['supply_request_id', 'price_per_unit']);
            $table->index(['supplier_verified', 'price_per_unit']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_offers');
    }
};
