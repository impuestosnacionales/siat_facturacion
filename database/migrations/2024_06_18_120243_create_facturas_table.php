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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion');
            $table->string('Caracteristicas');
            $table->unsignedBigInteger('id_sucursal');
            $table->foreign('id_sucursal')->references('id')->on('sucursales')->onDelete('cascade');
            $table->unsignedBigInteger('id_tipodoc');
            $table->foreign('id_tipodoc')->references('id')->on('tipo_documentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
