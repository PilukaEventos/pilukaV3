<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillabe=[
        'idCom',
        'nomeEsp',
        'nomeCom',
        'comentario',
        'dia',
        'horario',
        'estrelas',
        '_token'
    ];
}
