<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NivelAcademico;

class NivelController extends Controller
{
    //
    public function index()
    {
        
        return view('admin.pages.nivel_academico.index');
    }

    public function getNiveles(){
        $niveles = NivelAcademico::all();
        return response()->json($niveles);
    }

    public function store(Request $request)
    {
        $nivel = new NivelAcademico();
        $nivel->nombre = $request->nombre;
        $nivel->save();
        return response()->json(true);
    }
    public function update(Request $request)
    {
        $nivel = NivelAcademico::find($request->id);
        $nivel->nombre = $request->nombre;
        $nivel->save();
        return response()->json(true);
    }

    public function delete($id)
    {
        $nivel = NivelAcademico::with('categorias')->findOrFail($id);

        if ($nivel->categorias->count() > 0) {

            return response()->json(false);
        }

        $nivel->delete();

        return response()->json(true);
    }
}
