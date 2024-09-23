<?php

namespace App\Http\Controllers;

use App\Models\Visador;
use Illuminate\Http\Request;

class VisadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('visado.listado');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function detalle($id)
    {
        return view('visado.visar');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $visador = $request->input('visador');

        if (!empty($visador)) {
            foreach ($visador as $visadores) {
                Visador::create([
                    'id_usuario' => $visadores,
                    'id_archivo' => $request->input('id_archivo')
                ]);
            }
        }

        return redirect()->back()->with('success', 'Items inserted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visador $visador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visador $visador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visador $visador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $visador = Visador::find($id);
        $visador->delete();
        return redirect()->back()->with('success', 'success');
    }
}
