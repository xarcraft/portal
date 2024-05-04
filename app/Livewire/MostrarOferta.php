<?php

namespace App\Livewire;

use App\Models\Oferta;
use Livewire\Component;

class MostrarOferta extends Component
{
    public function render()
    {
        $ofertas = Oferta::where('user_id', auth()->user()->id)->orderBy('updated_at','DESC')->paginate(10);

        return view('livewire.mostrar-oferta', [
            'ofertas' => $ofertas
        ]);
    }
}
