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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->string('courier_name')->nullable();
            $table->string('tracking_code')->nullable();
            $table->enum('delivery_status', ['Pending', 'Shipped', 'Delivered', 'Returned'])->default('Pending');
            $table->decimal('delivery_charge', 8, 2)->default(0);
            $table->json('courier_response_log')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
