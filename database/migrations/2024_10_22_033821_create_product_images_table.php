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
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_activated')->nullable()->default(true);
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');
            $table->string('path_image')->nullable(); //path or name path de la imagen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
