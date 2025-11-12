<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Pais; // Importa el modelo Pais
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::with('pais')->paginate(15);
        return view('departamento.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::orderBy('pais_nomb')->get();
        return view('departamento.new', ['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tb_departamento,depa_nomb',
            'pais_codi' => 'required|string|exists:tb_pais,pais_codi',
        ]);

        $departamento = new Departamento();
        $departamento->depa_nomb = $request->name;
        $departamento->pais_codi = $request->pais_codi;
        $departamento->save();

        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        $paises = Pais::orderBy('pais_nomb')->get();
        return view('departamento.edit', compact('departamento', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tb_departamento,depa_nomb,'.$departamento->depa_codi.',depa_codi',
            'pais_codi' => 'required|string|exists:tb_pais,pais_codi',
        ]);

        $departamento->depa_nomb = $request->name;
        $departamento->pais_codi = $request->pais_codi;
        $departamento->save();

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        try {
            $departamento->delete();
            return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado exitosamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('departamentos.index')->with('error', 'No se puede eliminar el departamento porque tiene municipios asociados.');
        }
    }
}