<?php

namespace App\Livewire;

use App\Models\Horario;
use App\Models\Modalida;
use App\Models\Oferta;
use App\Models\Salario;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CrearOferta extends Component
{
    public $titulo;
    public $empresa;
    public $ubicacion;
    public $descripcion;
    public $salario;
    public $modalidad;
    public $requerimientos;
    public $horario;
    public $imagen;

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
        'imagen' => 'nullable|image|max:1024',
    ];

    public function crearOferta()
    {
        $datos = $this->validate();

        // Validar datos opcionales
        if ($datos['requerimientos'] == '') {
            $datos['requerimientos'] = '';
        }

        // Almacenando la imagen
        if ($datos['imagen'] != '') {
            $imagen = $this->imagen->store('public/ofertas');
            $datos['imagen'] = str_replace('public/ofertas/', '', $imagen);
        } else {
            $datos['imagen'] = '';
        }

        //Crear la oferta
        Oferta::create([
            'titulo' => $datos['titulo'],
            'empresa' => $datos['empresa'],
            'ubicacion' => $datos['ubicacion'],
            'descripcion' => $datos['descripcion'],
            'salario_id' => $datos['salario'],
            'modalida_id' => $datos['modalidad'],
            'requerimientos' => $datos['requerimientos'],
            'horario_id' => $datos['horario'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        // mensaje de exito
        session()->flash('mensaje', 'La oferta fue enviada a revisión pronto estará disponible para posterior publicación. Gracias por elegirnos');

        //Borrar temporales
        $oldfiles = Storage::files('livewire-tmp');

        foreach ($oldfiles as $file) {
            Storage::delete($file);
        }

        // redireccionar agente publicitador
        return redirect()->route('ofertas.index');
    }

    public function render()
    {
        // consulta de la base de datos
        $salarios = Salario::all();
        $modalidas = Modalida::all();
        $horarios = Horario::all();

        return view('livewire.crear-oferta', [
            'salarios' => $salarios,
            'modalidas' => $modalidas,
            'horarios' => $horarios,
        ]);
    }
}
