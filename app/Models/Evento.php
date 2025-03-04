<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'idAgen',
        'idCliente',
        'dataEvento',
        'horaEvento',
        'idServ',
        'idEve',
        'idEsp',
        'idFun',
    ];


}


