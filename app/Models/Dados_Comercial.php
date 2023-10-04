<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dados_Comercial extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'desconto',
        'tipo_preco',
        'condi_pagamento',
        'modo_pagamento',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
