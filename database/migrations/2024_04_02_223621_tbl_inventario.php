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
        Schema::create('tbl_categories', function (Blueprint $table) {
            $table->id();
            $table->string('a_categories');
            $table->rememberToken();
            $table->timestamps();
        });
        
        // Reglas de negocio
        /* 
        1. El codigo del producto es unico.
        2. No pueden haber 2 productos iguales con diferentes precios.
        3. Se registra solamente el precio de venta del producto.         
        */

        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id();
            $table->string('a_codeaproduct')->unique();
            $table->foreignId('a_idcategories')->references('id')->on('tbl_categories');
            $table->string('a_productname');
            $table->decimal('a_salesprice', total: 8, places: 2);
            $table->binary('a_image');
            $table->rememberToken();
            $table->timestamps();
        });
       
        Schema::create('tbl_productssales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('a_idproduct')->references('id')->on('tbl_products');
            $table->date('a_dateinput');
            $table->integer('a_stock');
            $table->integer('a_input');
            $table->integer('a_output');
            $table->rememberToken();
            $table->timestamps();

        });
        Schema::create('tbl_reception', function (Blueprint $table) {
            $table->id();
            $table->foreignId('a_idproduct')->references('id')->on('tbl_products');
            $table->integer('a_amount');
            $table->decimal('a_price', total: 8, places: 2);
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::create('tbl_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('a_idproductssales')->references('id')->on('tbl_productssales');
            $table->integer('a_order');
            $table->decimal('a_price', total: 8, places: 2);
            $table->decimal('a_amount', total: 8, places: 2);
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_categories');
        Schema::dropIfExists('tbl_products');
        Schema::dropIfExists('tbl_productssales');
        Schema::dropIfExists('tbl_reception');
        Schema::dropIfExists('tbl_ticket');
    }
};
