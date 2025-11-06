<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientePlan extends Model
{
    use HasFactory;

    protected $table = 'clientes_plan';

    protected $fillable = [
        'cliente_id',
        'plan_id',
        'fecha_venta',
        'valor_venta',
        'meses_comprados',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}



