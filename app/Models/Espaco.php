<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espaco extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'idEsp',
        'nomeEsp',
        'fotoEsp',
        'telefoneEsp',
        'emailEsp',
        'moradaEsp',
        'descricaoEsp',
        'redes',
        'updated_at',
        'created_at'
    ];
    
    protected $date=['foto'=>'array'];
}


