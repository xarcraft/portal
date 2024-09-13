<?php

namespace App\Livewire;

use App\Models\Oferta;
use Livewire\Component;

class Validables extends Component
{
    public function render()
    {
        $ofertas = Oferta::where('revision', 0)->orderBy('updated_at', 'DESC')->paginate(40);
        return view('livewire.validables', ['ofertas' => $ofertas]);
    }
}
