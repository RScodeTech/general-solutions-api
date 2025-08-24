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
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('complement')->nullable();
            $table->string('fone');
            $table->string('email')->unique();
            $table->integer('distance')->nullable();
            $table->string('ssn')->nullable();
            $table->string('dmv')->nullable();
            $table->string('state_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
