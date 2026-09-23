<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonio;

class TestimonioController extends Controller
{
    public function index()
    {
        return view('admin.pages.testimonios.index');
    }

    public function getTestimonios()
    {
        $testimonios = Testimonio::all();
        return response()->json($testimonios);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:150',
            'profesion'   => 'nullable|string|max:150',
            'comentario'  => 'nullable|string|max:1000',
            'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $testimonio = new Testimonio();
        $testimonio->nombre = $request->nombre;
        $testimonio->profesion = $request->profesion;
        $testimonio->comentario = $request->comentario;
        $testimonio->calificacion = $request->calificacion;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'testimonio_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = $this->testimoniosUploadPath();
            $file->move($path, $nameimg);
            $testimonio->imagen = $nameimg;
        }

        $testimonio->save();

        return response()->json(true);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id'          => 'required|exists:testimonios,id',
            'nombre'      => 'required|string|max:150',
            'profesion'   => 'nullable|string|max:150',
            'comentario'  => 'nullable|string|max:1000',
            'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $testimonio = Testimonio::find($request->id);
        $testimonio->nombre = $request->nombre;
        $testimonio->profesion = $request->profesion;
        $testimonio->comentario = $request->comentario;
        $testimonio->calificacion = $request->calificacion;

        if ($request->hasFile('imagen')) {
            if ($testimonio->imagen) {
                $oldFilePath = public_path('testimonios_imagenes/' . $testimonio->imagen);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'testimonio_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = $this->testimoniosUploadPath();
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
            $oldFilePath = public_path('testimonios_imagenes/' . $testimonio->imagen);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $testimonio->delete();
        return response()->json(true);
    }

    private function testimoniosUploadPath(): string
    {
        $path = public_path('testimonios_imagenes');

        if (!is_dir($path)) {
            mkdir($path, 0775, true);
        }

        return $path . '/';
    }
}
