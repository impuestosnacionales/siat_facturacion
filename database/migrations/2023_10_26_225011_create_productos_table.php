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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->integer('Codigo_Producto_SIN');
            $table->integer('Codigo_Actividad_CAEB');
            $table->string('Descripcion_o_producto_SIN', 75);
            $table->unsignedBigInteger('id_contribuyente');
            $table->foreign('id_contribuyente')->references('id')->on('contribuyentes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
