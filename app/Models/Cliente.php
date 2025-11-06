<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'identidad',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'mensualidad',
        'estado',
        'fecha_registro',
        'fecha_vencimiento',
        'valor_pagado',
        'meses_del_plan',
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
        'fecha_vencimiento' => 'datetime',
        'fecha_nacimiento' => 'date',
    ];

    // Nombre completo
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }

    // Verificar si vencido
    public function getEstaVencidoAttribute()
    {
        return $this->fecha_vencimiento
            ? Carbon::now()->greaterThan($this->fecha_vencimiento)
            : false;
    }

    // Relación con tabla intermedia (ventas)
    public function compras()
    {
        return $this->hasMany(ClientePlan::class, 'cliente_id');
    }

    // Relación muchos a muchos con Plan
    public function planes()
    {
        return $this->belongsToMany(Plan::class, 'clientes_plan', 'cliente_id', 'plan_id')
                    ->withPivot('fecha_venta', 'valor_venta', 'meses_comprados')
                    ->withTimestamps();
    }

    // Calcular días restantes dinámicamente
    public function getDiasRestantesAttribute()
    {
        $ultimaCompra = $this->compras()->latest('fecha_venta')->first();
        if (!$ultimaCompra) return 0;

        $fechaFin = Carbon::parse($ultimaCompra->fecha_venta)
                     ->addMonths($ultimaCompra->meses_comprados);

        return max($fechaFin->diffInDays(Carbon::now(), false), 0);
    }
}


