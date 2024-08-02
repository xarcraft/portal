<?php

namespace App\Livewire;

use App\Models\Candidato;
use App\Models\Oferta;
use Livewire\Component;

class MostrarPublicaciones extends Component
{
    public function render()
    {
        $postulaciones = Candidato::where([['user_id', auth()->user()->id]])->orderBy('updated_at', 'DESC')->paginate(10);
        $ofertas = Oferta::all();
        return view('livewire.mostrar-publicaciones', ['postulaciones' => $postulaciones, 'ofertas' => $ofertas]);
    }
}
