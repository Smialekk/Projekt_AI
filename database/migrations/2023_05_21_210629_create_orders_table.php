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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('name'); // Dodane pole "name"
            $table->string('surname'); // Dodane pole "surname"
            $table->string('category');
            $table->string('subcategory');
            $table->date('date'); // Dodane pole "date"
            $table->string('street'); // Dodane pole "street"
            $table->string('number'); // Dodane pole "number"
            $table->string('city'); // Dodane pole "city"
            $table->string('region'); // Dodane pole "region"
            $table->string('postal_code'); // Dodane pole "postal_code"
            $table->string('country'); // Dodane pole "country"
            $table->string('status')->default("Weryfikacja");
            //$table->boolean('know_what_to_buy')->default(false); // Dodane pole "know_what_to_buy"

            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
