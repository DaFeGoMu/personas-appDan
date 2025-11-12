<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::paginate(5);
        return view('municipio.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('municipio.new', ['departamentos' => $departamentos]);
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
            'name' => 'required|string|max:255|unique:tb_municipio,muni_nomb', // Asumiendo que el nombre del campo es 'name'
            'depa_codi' => 'required|integer|exists:tb_departamento,depa_codi',
        ]);

        $municipio = new Municipio();
        $municipio->depa_codi = $request->depa_codi;
        $municipio->muni_nomb = $request->name;
        $municipio->save();

        return redirect()->route('municipios.index')->with('success', 'Municipio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('municipio.edit', compact('municipio', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tb_municipio,muni_nomb,'.$municipio->muni_codi.',muni_codi', // Asumiendo que el nombre del campo es 'name'
            'depa_codi' => 'required|integer|exists:tb_departamento,depa_codi',
        ]);

        $municipio->depa_codi = $request->depa_codi;
        $municipio->muni_nomb = $request->name;
        $municipio->save();

        return redirect()->route('municipios.index')->with('success', 'Municipio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        try {
            $municipio->delete();
            return redirect()->route('municipios.index')->with('success', 'Municipio eliminado exitosamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('municipios.index')->with('error', 'No se puede eliminar el municipio porque tiene comunas asociadas.');
        }
    }
}