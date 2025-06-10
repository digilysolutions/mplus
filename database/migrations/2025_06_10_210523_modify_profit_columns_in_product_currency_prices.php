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
        Schema::table('product_currency_prices', function (Blueprint $table) {
             $table->decimal('profit_amount', 15, 2)->nullable()->comment('Cantidad de ganancia en dinero')->change();
            $table->decimal('profit_value', 15, 2)->nullable()->comment('Valor total de ganancia por venta')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_currency_prices', function (Blueprint $table) {
            // Si quieres revertir a la definición anterior
            $table->decimal('profit_amount', 15, 4)->nullable()->comment('Cantidad de ganancia en dinero')->change();
            $table->decimal('profit_value', 15, 4)->nullable()->comment('Valor total de ganancia por venta')->change();
        });
    }
};
