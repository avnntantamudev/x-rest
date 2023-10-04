<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'preco_total',
        'valor_entregue',
        'forma_pagamento',
        'troco',
        'cliente',
        'contribuente',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function produtos()
    {
        return $this->hasMany(Produtos_Venda::class);
    }
}
