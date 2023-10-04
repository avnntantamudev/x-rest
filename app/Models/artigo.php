<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artigo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_familia',
        'artigo',
        'descricao',
        'unidade_base',
        'pvp1',
        'pvp2',
        'pvp3',
        'pvp4',
        'pvp5',
        'movimenta_conta',
        'componente',
        'cod_barra',
    ];
    public function familiaArtigo()
    {
        return $this->belongsTo(familiaArtigo::class);
    }
    public function stock()
    {
        return $this->hasOne(stock::class);
    }
}
