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
        Schema::create('user_transcations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->cascadeOnDelete();
            $table->string("payment_mode")->nullable();
            $table->foreignId("plan_id")->constrained("plans")->cascadeOnDelete();
            $table->string("transaction_id")->nullable();
            $table->string("order_id")->nullable();
            $table->string("status")->nullable();
            $table->string("timestamp")->nullable();
            $table->json("response_received")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_transcations');
    }
};
