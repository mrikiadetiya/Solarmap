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
        Schema::create('cost_estimations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calculation_id')->constrained()->onDelete('cascade');
            $table->decimal('total_cost', 10, 2);
            $table->decimal('panel_cost', 10, 2);
            $table->decimal('inverter_cost', 10, 2);
            $table->decimal('installation_cost', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cost_estimations');
    }
};
