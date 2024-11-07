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
        Schema::create('email_responses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->string('email',96)->nullable();
            $table->string('status')->nullable();
            $table->string('user',36)->nullable();
            $table->string('time',36)->nullable();
            $table->string('domain',96)->nullable();
            $table->string('disposable')->nullable();
            $table->string('role',36)->nullable();
            $table->string('free_email')->nullable();
            $table->string('valid_format')->nullable();
            $table->longText('reason')->nullable();
            $table->longText('mx_domain')->nullable();
            $table->longText('mx_record')->nullable();
            $table->date('email_check_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_responses');
    }
};
