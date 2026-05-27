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
        Schema::create('external_agents', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();

            $table->string('full_name');

            $table->string('speciality');

            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->decimal('hourly_rate', 12, 2)->nullable();

            $table->boolean('is_available')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_agents');
    }
};
