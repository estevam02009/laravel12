<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colaborador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'logradouro',
        'numero',
        'municipio',
        'estado',
        'cargo'
    ];

    protected $table = "colaboradores";
}
