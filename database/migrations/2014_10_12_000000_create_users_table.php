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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('email',200)->unique();
            $table->timestamp('email_verified_at');
            $table->string('password',200);
            $table->string('address',200)->nullable();
            $table->string('phone',50)->nullable();
            $table->enum('role', ['admin', 'gestionnaire', 'client','livreur'])->default('client');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
