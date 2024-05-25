<?php

namespace App\Livewire;

use App\Models\Horario;
use App\Models\Modalida;
use Livewire\Component;

class FiltrarOfertas extends Component
{
    public $termino;
    public $modalida;
    public $horario;

    public function leerDatosFormulario()
    {
        $this->dispatch('terminosBusqueda',$this->termino, $this->modalida, $this->horario);
    }

    public function render()
    {
        $modalidas = Modalida::all();
        $horarios = Horario::all();

        return view('livewire.filtrar-ofertas', [
            'modalidas' => $modalidas,
            'horarios' => $horarios,
        ]);
    }
}
