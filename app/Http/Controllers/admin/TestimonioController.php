<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonio;

class TestimonioController extends Controller
{
    //
    public function index()
    {
        
        return view('admin.pages.testimonios.index');
    }

    public function getTestimonios(){
        $testimonios = Testimonio::all();
        return response()->json($testimonios);
    }


    public function store(Request $request)
    {
        $testimonio = new Testimonio();
        $testimonio->nombre = $request->nombre;
        $testimonio->profesion = $request->profesion;
        $testimonio->comentario = $request->comentario;
        $testimonio->calificacion = $request->calificacion;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nameimg = 'testimonio_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/testimonios_imagenes/';
            $file->move($path, $nameimg);
            $testimonio->imagen = $nameimg;
        }
        
        $testimonio->save();

        return response()->json(true);
    }

    public function update(Request $request)
    {
        $testimonio = Testimonio::find($request->id);
        $testimonio->nombre = $request->nombre;
        $testimonio->profesion = $request->profesion;
        $testimonio->comentario = $request->comentario;
        $testimonio->calificacion = $request->calificacion;

        if ($request->hasFile('imagen')) {
            if ($testimonio->imagen) {
                $oldFilePath = public_path() . '/testimonios_imagenes/' . $testimonio->imagen;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('imagen');
            $nameimg = 'testimonio_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/testimonios_imagenes/';
            $file->move($path, $nameimg);
            $testimonio->imagen = $nameimg;
        }
        
        $testimonio->save();

        return response()->json(true);
    }

    public function delete($id)
    {
        $testimonio = Testimonio::find($id);
        if ($testimonio->imagen) {
            $oldFilePath = public_path() . '/testimonios_imagenes/' . $testimonio->imagen;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $testimonio->delete();
        return response()->json(true);
    }
}
