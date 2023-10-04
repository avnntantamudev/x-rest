<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morada extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'morada',
        'localidade',
        'codigo_postal'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
