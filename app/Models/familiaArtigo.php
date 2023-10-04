<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class familiaArtigo extends Model
{
    use HasFactory;
    protected $fillable = [
        'familia',
        'descricao',
    ];
    public function artigos()
    {
        return $this->hasMany(artigo::class);
    }
}
