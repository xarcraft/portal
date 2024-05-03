<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'empresa',
        'ubicacion',
        'descripcion',
        'salario_id',
        'modalida_id',
        'requerimientos',
        'horario_id',
        'imagen',
        'user_id',
    ];
}
