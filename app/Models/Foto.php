<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $fillable=[
        'idImg',
        'nomeImg',
        'idEsp',
        'idFun',
        'idFor',
        'idCli',
        'id',
        'idCom',
        'idEve',
        'updated_at',
        'created_at'
    ];
}
