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
        Schema::create('agent_locations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('internal_agent_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('external_agent_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->timestamp('tracked_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_locations');
    }
};
