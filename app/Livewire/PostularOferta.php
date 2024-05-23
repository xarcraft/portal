<?php

namespace App\Livewire;

use App\Models\Oferta;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularOferta extends Component
{
    use WithFileUploads;

    public $cv;
    public $oferta;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Oferta $oferta)
    {
        $this->oferta = $oferta;
    }

    public function postularme()
    {
        $datos = $this->validate();

        // Almacenar CV en disco
        $cv = $this->cv->store('public/cvs');
        $datos['cv'] = str_replace('public/cvs/', '', $cv);

        // Crear la el candidato
        $this->oferta->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);

        // Crear notificación y email

        // Mostrar mensaje de enviado
        session()->flash('mensaje', 'Se cargo con exito tu CV en la oferta mucha suerte');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-oferta');
    }
}
