<?php

namespace App\Livewire;

use App\Models\Oferta;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class MostrarOferta extends Component
{
    #[On('eliminarOferta')]
    public function eliminarOferta(Oferta $oferta)
    {
        // Compruebo el policy
        $this->authorize('delete', $oferta);
        // Elimino Imagen
        $result = Storage::delete('public/ofertas/' . $oferta->imagen);
        // Elimino la oferta
        $oferta->delete();
    }

    public function render()
    {
        $ofertas = Oferta::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate(10);

        return view('livewire.mostrar-oferta', [
            'ofertas' => $ofertas
        ]);
    }
}
