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
        Schema::create('internal_agent_mission', function (Blueprint $table) {

            $table->id();

            $table->foreignId('internal_agent_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('mission_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_agent_mission');
    }
};
