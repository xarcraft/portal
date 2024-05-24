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

    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    public function modalida()
    {
        return $this->belongsTo(Modalida::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'DESC');
    }

    public function empleador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
