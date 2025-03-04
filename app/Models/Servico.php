<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $fillable=[
        'nomeServ',
        'telefoneServ',
        'idFor',
        'idEsp',
        'descricaoServ',
        'fotoCapa',
        'idCat',
        'updated_at',
        'created_at'
    ];
    

}
