<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_serie',
        'cod_barra',
        'qtd',
        'status',
        'artigo_id'
    ];
    
    public function artigo()
    {
        return $this->belongsTo(artigo::class);
    }
}
