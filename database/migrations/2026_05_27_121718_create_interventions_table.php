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
        Schema::create('interventions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mission_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->longText('report')->nullable();

            $table->dateTime('performed_at')->nullable();

            $table->enum('status', [
                'planifié',
                'effectué',
                'annulé'
            ])->default('planifié');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
