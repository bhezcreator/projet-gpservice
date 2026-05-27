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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('reference')->unique();

            $table->string('title');

            $table->longText('description')->nullable();

            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();

            $table->text('location');
            $table->enum('priority', [
                'faible',
                'moyen',
                'élevé',
                'urgent'
            ])->default('moyen');

            $table->enum('status', [
                'en attente',
                'assigné',
                'en cours',
                'terminé',
                'annulé'
            ])->default('en attente');

            $table->decimal('budget', 12, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
