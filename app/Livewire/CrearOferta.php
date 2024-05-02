<?php

namespace App\Livewire;

use App\Models\Horario;
use App\Models\Modalida;
use App\Models\Salario;
use Livewire\Component;

class CrearOferta extends Component
{
    public function render()
    {
        // consulta de la base de datos
        $salarios = Salario::all();
        $modalidas = Modalida::all();
        $horarios = Horario::all();

        return view('livewire.crear-oferta',[
            'salarios' => $salarios,
            'modalidas' => $modalidas,
            'horarios' => $horarios,
        ]);
    }
}
