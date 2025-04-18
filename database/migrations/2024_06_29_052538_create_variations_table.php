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
        Schema::create('variations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_activated')->nullable()->default(true);

         
            $table->integer('stock_id')->unsigned();
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_term_product');
    }
};
