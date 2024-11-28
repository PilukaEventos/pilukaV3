<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
protected $casts=['servicos'=>'array'];
protected $date =['dataEvento','dataVisita'];
   protected $fillable=
   [
   'nomeRes',
   'contactoRes',
   'emailRes',
   'dataEvento',
   'reserva',
   'tipoEve',
   'numConv',
   'servicos',
   'dataVisita'
    ];
}
