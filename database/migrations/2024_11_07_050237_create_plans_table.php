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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->enum('type', ['m','q','y'])->default(NULL)->comment('m=>monthly');
            $table->json('benefits')->nullable();
            $table->enum('status', ['0','1'])->default('1')->comment('1=>active,0=>inactive');
            $table->string('color_code')->nullable();
            $table->integer('per_day_credits')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
