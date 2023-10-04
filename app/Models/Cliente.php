<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'pais',
        'n_contribuente',
        'contrib_pais_origem',
        'espaco_fiscal',
        'regime_iva',
        'pessoa',
        'provincia',
    ];

    public function moradas()
    {
        return $this->hasMany(Morada::class);
    }
    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }
    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
    public function dadosComercial()
    {
        return $this->hasOne(Dados_Comercial::class);
    }
}
