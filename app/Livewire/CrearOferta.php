<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;

class CrearOferta extends Component
{
    public function render()
    {
        // consulta de la base de datos
        $salarios = Salario::all();
        return view('livewire.crear-oferta',[
            'salarios' => $salarios
        ]);
    }
}
