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
        Schema::create('supply_requests', function (Blueprint $table) {
            $table->id();
            $table->string('requester_name');
            $table->string('business_name')->nullable();
            $table->string('product_name');
            $table->decimal('quantity', 10, 2);
            $table->string('unit', 20);
            $table->string('delivery_location');
            $table->date('needed_at');
            $table->text('notes')->nullable();
            $table->string('status', 20)->default('open');
            $table->timestamps();

            $table->index(['status', 'needed_at']);
            $table->index('product_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_requests');
    }
};
