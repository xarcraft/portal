<?php

namespace App\Livewire;

use Livewire\Component;

class ShowOferta extends Component
{
    public $oferta;
    public function render()
    {
        return view('livewire.show-oferta');
    }
}
