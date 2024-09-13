<?php

namespace App\Livewire;

use App\Models\Oferta;
use App\Notifications\aprobado;
use App\Notifications\denegado;
use Livewire\Component;
use Livewire\Attributes\On;

class ValidarOferta extends Component
{
    public $oferta;

    public function mount(Oferta $oferta)
    {
        $this->oferta = $oferta;
    }

    public function aprobar()
    {
        $oferta = Oferta::find($this->oferta->id);

        $oferta->publicado = 1;
        $oferta->revision = 1;

        $oferta->save();

        $this->oferta->empleador->notify(new aprobado($this->oferta->id, $this->oferta->titulo));


        return redirect()->route('admin.index');
    }

    public function denegar()
    {
        $oferta = Oferta::find($this->oferta->id);
        $this->oferta->empleador->notify(new denegado());
        $oferta->delete();
        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.validar-oferta');
    }
}
