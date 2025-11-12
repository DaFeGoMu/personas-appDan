<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::paginate(10);
        return view('pais.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pais.new');
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
            'code' => 'required|string|size:3|unique:tb_pais,pais_codi',
            'name' => 'required|string|max:255',
            'capital' => 'required|integer',
        ]);

        $pais = new Pais();
        $pais->pais_codi = strtoupper($request->code);
        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->capital;
        $pais->save();

        return redirect()->route('paises.index')->with('success', 'País creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = Pais::find($id);
        return view('pais.edit', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pais = Pais::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'capital' => 'required|integer',
        ]);

        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->capital;
        $pais->save();

        return redirect()->route('paises.index')->with('success', 'País actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pais = Pais::find($id);
            $pais->delete();
            return redirect()->route('paises.index')->with('success', 'País eliminado exitosamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == "23000") { // Error de integridad de clave foránea
                return redirect()->route('paises.index')->with('error', 'No se puede eliminar el país porque tiene departamentos asociados.');
            }
            return redirect()->route('paises.index')->with('error', 'Ocurrió un error al eliminar el país.');
        }
    }
}