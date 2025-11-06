<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes_plan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')
                  ->constrained('clientes')
                  ->onDelete('cascade');

            $table->foreignId('plan_id')
                  ->constrained('planes')
                  ->onDelete('cascade');

            $table->timestamp('fecha_venta')->useCurrent();
            $table->decimal('valor_venta', 10, 2);
            $table->integer('meses_comprados')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes_plan');
    }
};





