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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('razon_social');
            $table->string('email');
            $table->integer('nit')->nullable();
            $table->integer('celular');
            $table->integer('telefono');
            $table->string('complemento');
            $table->unsignedBigInteger('tipodoc_id');
            $table->foreign('tipodoc_id')->references('id')->on('tipo_documentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
