<?php

namespace App\Livewire;

use App\Models\Oferta;
use Livewire\Component;

class HomeOfertas extends Component
{
    public $termino;
    public $modalida;
    public $horario;

    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino, $modalida, $horario)
    {
        $this->termino = $termino;
        $this->modalida = $modalida;
        $this->horario = $horario;
    }

    public function render()
    {
        //$ofertas = Oferta::where('publicado', 1)->orderBy('updated_at', 'DESC')->paginate(20);
        $ofertas = Oferta::where('publicado', 1)
            ->when($this->termino, function ($query) {
                $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
            })
            ->when($this->termino, function ($query) {
                $query->orWhere('empresa', 'LIKE', "%" . $this->termino . "%");
            })
            ->when($this->termino, function ($query) {
                $query->orWhere('ubicacion', 'LIKE', "%" . $this->termino . "%");
            })
            ->when($this->modalida, function ($query) {
                $query->where('modalida_id', $this->modalida);
            })
            ->when($this->horario, function ($query) {
                $query->where('horario_id', $this->horario);
            })
            ->orderBy('updated_at', 'DESC')
            ->paginate(20);

        return view('livewire.home-ofertas', [
            'ofertas' => $ofertas
        ]);
    }
}
