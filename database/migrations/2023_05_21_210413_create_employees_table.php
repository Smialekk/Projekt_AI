<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * role_id = 1 admin
     * role_id = 2 employee
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('name');
            $table->string('surename');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('profession')->nullable();
            $table->text('skills')->nullable();
            $table->text('schedule')->nullable();
            $table->decimal('salary', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
