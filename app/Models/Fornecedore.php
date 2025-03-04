<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedore extends Model
{
    use HasFactory;
    protected $fillable=[
        'nomeFor',
        'emailFor',
        'telefoneFor',
        'descricaoFor',
        'nif',
        'updated_at',
        'created_at'
    ];
    
}
