<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table=[
        'telefoneCli',
        'nomeCli',
        'emailCli',
        'nomeEsp',
        'numConv',
        'dataEvento',
        'nomeEve'
    ];
    

    protected $fillable=[
        'telefoneCli',
        'nomeCli',
        'emailCli',
        'nomeEsp',
        'numConv',
        'dataEvento',
        'nomeEve'
    ];
}
