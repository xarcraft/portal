<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ofertas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ofertas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oferta $oferta)
    {
        //$this->authorize('update',$oferta);
        if (Gate::allows('update', $oferta)) {
            return view('ofertas.edit', [
                'oferta' => $oferta
            ]);
        } else {
            return redirect()->route('ofertas.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
