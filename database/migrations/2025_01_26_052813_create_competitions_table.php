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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('area');
            $table->string('name');
            $table->string('code');
            $table->string('type');
            $table->string('emblem');
            $table->string('plan');
            // $table->json('currentSeason');
            $table->integer('number_of_available_seasons');
            // $table->string('url');
            // $table->timestamp('start_date')->nullable();
            // $table->timestamp('end_date')->nullable();
            // $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
