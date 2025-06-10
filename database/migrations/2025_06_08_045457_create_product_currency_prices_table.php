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
        Schema::create('product_currency_prices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('product_id')->nullable()->unsigned()->default();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('currency_id')->nullable()->unsigned()->default();
            $table->foreign('currency_id')->references('id')->on('country_currencies')->onDelete('cascade');

            // Precios en la moneda especificada
            $table->decimal('purchase_price', 15, 4)->nullable()->comment('Precio de compra en la moneda');
            $table->decimal('sale_price', 15, 4)->nullable()->comment('Precio de venta en la moneda');
            $table->decimal('discount_price', 15, 4)->nullable()->comment('Precio con descuento en la moneda');

            // Tipos y categorías de precios
            $table->string('price_type')->nullable()->comment('Tipo de precio: retail, wholesale, promotional');
            $table->date('effective_date')->nullable()->comment('Fecha en que entra en vigor este precio');
            $table->date('expiration_date')->nullable()->comment('Fecha en que expira este precio');

            // Margen de ganancia y ganancias
            $table->decimal('profit_margin_percentage', 5, 2)->nullable()->comment('Porcentaje de ganancia sobre costo');
            $table->decimal('profit_amount', 15, 2)->nullable()->comment('Cantidad de ganancia en dinero');
            $table->decimal('profit_value', 15, 2)->nullable()->comment('Valor total de ganancia por venta');

            // Conceptos contables (cuentas)
            $table->string('account_income')->nullable()->comment('Cuenta contable de ingreso');
            $table->string('account_cost')->nullable()->comment('Cuenta contable de costo');
            $table->string('account_tax')->nullable()->comment('Cuenta de impuestos');

            // Tasas y conceptos fiscales
            $table->decimal('tax_rate', 5, 2)->nullable()->comment('Tasa de impuesto aplicable en porcentaje');
            $table->string('tax_account')->nullable()->comment('Cuenta de impuestos en contabilidad');

            // Otros conceptos
            $table->string('price_category')->nullable()->comment('Categoría de precio: premium, standard, etc.');
            $table->string('concept')->nullable()->comment('Concepto de venta o descripción adicional');

            // Campos adicionales útiles
            $table->decimal('exchange_rate', 15, 6)->nullable()->comment('Tasa de cambio en el momento si se guarda en base');
            $table->string('notes')->nullable()->comment('Notas adicionales');

            // Timestamps
            $table->timestamps();





            // Índices
            $table->index(['product_id', 'currency_id', 'price_type']);
        });
    }

    // Explicación de los campos adicionales:
    //purchase_price: precio de compra del producto en esa moneda.
    //sale_price: precio de venta en esa moneda.
    //discount_price: precio con descuento, si aplica.
    //profit_margin_percentage: porcentaje de ganancia sobre el costo.
    //profit_amount: cantidad de ganancia en dinero (puede ser calculada o guardada si se desea).
    //profit_value: valor total de ganancia por venta (puede ser la multiplicación de profit_amount por cantidad).
    //account_income / account_cost / account_tax: conceptos contables para registrar en las cuentas correspondientes.
    //effective_date: fecha en que la tarifa entra en vigor.
    //price_type: para distinguir diferentes precios (retail, wholesale, etc.).


    //En muchos negocios, un producto puede tener diferentes precios dependiendo del contexto o el tipo de cliente:

    //Retail price: Precio que paga un cliente final.
    //Wholesale price: Precio para compras al por mayor, generalmente con descuentos por volumen.
    //Special price: Precio promocional por tiempo limitado.
    //Discounted price: Precio con un descuento aplicado en campaña.
    //Este campo ayuda a gestionar esos diferentes precios en una sola tabla y a distinguirlos fáci

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_currency_prices');
    }
};
