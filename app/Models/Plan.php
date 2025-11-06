<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'planes';

    protected $fillable = [
        'nombre',
        'precio',
        'duracion_meses',
    ];

    // Relación muchos a muchos con Cliente
    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'clientes_plan', 'plan_id', 'cliente_id')
                    ->withPivot('fecha_venta', 'valor_venta', 'meses_comprados')
                    ->withTimestamps();
    }

    // Relación hasMany con la tabla intermedia
    public function ventas()
    {
        return $this->hasMany(ClientePlan::class, 'plan_id');
    }
}





