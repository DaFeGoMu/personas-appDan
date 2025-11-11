<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna; 
use Illuminate\Support\Facades\DB;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$comunas = Comuna::all();

        $comunas = DB::table('tb_comuna')
                ->join('tb_municipio','tb_comuna.muni_codi','tb_municipio.muni_codi')
                ->select('tb_comuna.*', "tb_municipio.muni_nomb")
                ->get();
        return view('comuna.index', ['comunas' => $comunas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = DB::table('tb_municipio')
                ->orderBy('muni_nomb')
                ->get();
        return view('comuna.new', ['municipios' => $municipios]);
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
            'name' => 'required|string|max:255',
            'muni_codi' => 'required|integer|exists:tb_municipio,muni_codi',
        ]);

        $comuna = new Comuna();
        // $comuna->comu codi = $request->id;
        // El código de comuna es auto incremental
        $comuna->comu_nomb = $request->name;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();

        // Redirigir a la página de índice después de crear
        return redirect()->route('comunas.index')->with('success', 'Comuna creada exitosamente.');
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
    public function edit($id)
    {
        $comuna = Comuna::find($id);
        $municipios = DB::table('tb_municipio')
                ->orderBy('muni_nomb')
                ->get();
        return view('comuna.edit', ['comuna'=> $comuna,'municipios'=> $municipios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comuna = Comuna::find($id);
        $comuna->comu_nomb = $request->name;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();

        return redirect()->route('comunas.index')->with('success', 'Comuna actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comuna = Comuna::find($id);
        $comuna->delete();

        return redirect()->route('comunas.index')->with('success', 'Comuna eliminada exitosamente.');
    }
}
