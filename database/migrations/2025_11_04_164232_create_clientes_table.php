<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identidad')->unique();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('mensualidad')->nullable(); // VIGENTE/VENCIDA
            $table->string('estado')->default('ACTIVO'); // ACTIVO/INACTIVO
            $table->timestamp('fecha_registro')->nullable();
            $table->timestamp('fecha_vencimiento')->nullable();
            $table->decimal('valor_pagado', 10, 2)->default(0);
            $table->integer('meses_del_plan')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};


