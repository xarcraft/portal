<?php

namespace App\Livewire;

use App\Models\Horario;
use App\Models\Modalida;
use App\Models\Oferta;
use App\Models\Salario;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarOferta extends Component
{
    public $oferta_id;
    public $titulo;
    public $empresa;
    public $ubicacion;
    public $descripcion;
    public $salario;
    public $modalidad;
    public $requerimientos;
    public $horario;
    public $imagen;
    public $nueva_imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'empresa' => 'required',
        'ubicacion' => 'required',
        'descripcion' => 'required',
        'salario' => 'required',
        'modalidad' => 'required',
        'requerimientos' => 'nullable',
        'horario' => 'required',
        'nueva_imagen' => 'nullable|image|max:1024',
    ];

    public function mount(Oferta $oferta)
    {
        $this->oferta_id = $oferta->id;
        $this->titulo = $oferta->titulo;
        $this->empresa = $oferta->empresa;
        $this->ubicacion = $oferta->ubicacion;
        $this->descripcion = $oferta->descripcion;
        $this->salario = $oferta->salario_id;
        $this->modalidad = $oferta->modalida_id;
        $this->requerimientos = $oferta->requerimientos;
        $this->horario = $oferta->horario_id;
        $this->imagen = $oferta->imagen;
    }

    public function editarOferta()
    {
        $datos = $this->validate();

        //consultando cambios en imagen
        if ($this->nueva_imagen) {
            $imagen = $this->nueva_imagen->store('public/ofertas');
            $datos['imagen'] = str_replace('public/ofertas/', '', $imagen);
        }

        //buscando la oferta a editar
        $oferta = Oferta::find($this->oferta_id);

        //asignando los valores
        $oferta->titulo = $datos['titulo'];
        $oferta->empresa = $datos['empresa'];
        $oferta->ubicacion = $datos['ubicacion'];
        $oferta->descripcion = $datos['descripcion'];
        $oferta->salario_id = $datos['salario'];
        $oferta->modalida_id = $datos['modalidad'];
        $oferta->requerimientos = $datos['requerimientos'];
        $oferta->horario_id = $datos['horario'];
        $oferta->imagen = $datos['imagen'] ?? $oferta->imagen;

        //guardando la oferta
        $oferta->save();

        //redireccionamiento
        session()->flash('mensaje', 'La oferta se actualizo correctamente');
        return redirect()->route('ofertas.index');
    }

    public function render()
    {
        // consulta de la base de datos
        $salarios = Salario::all();
        $modalidas = Modalida::all();
        $horarios = Horario::all();

        return view('livewire.editar-oferta', [
            'salarios' => $salarios,
            'modalidas' => $modalidas,
            'horarios' => $horarios,
        ]);
    }
}
