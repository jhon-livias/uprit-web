<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\CategoriaNoticia;


class NoticiaController extends Controller
{
    //
    public function index()
    {
        return view('admin.pages.noticias.index');
    }

    public function getCatNoticia(){
        $cat_noticias = CategoriaNoticia::all();
        return response()->json($cat_noticias);
    }
    public function getNoticias(){
        $noticias = Noticia::orderBy('fecha', 'desc')->get();
        $noticias->load('categoriaNoticia');
        return response()->json($noticias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_noticia_id' => 'required|exists:categoria_noticias,id',
            'titulo'              => 'required|string|max:255',
            'fecha'               => 'required|date',
            'descripcion_corta'   => 'nullable|string|max:500',
            'autor_nombre'        => 'nullable|string|max:150',
            'autor_descripcion'   => 'nullable|string|max:500',
            'descripcion_total'   => 'nullable|string',
            'imagen'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'autor_imagen'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $noticia = new Noticia();
        $noticia->categoria_noticia_id = $request->categoria_noticia_id;
        $noticia->titulo = $request->titulo;
        $noticia->fecha = $request->fecha;
        $noticia->descripcion_corta = $request->descripcion_corta;
        $noticia->tags = json_decode($request->tags);
        $noticia->autor_nombre = $request->autor_nombre;
        $noticia->autor_descripcion = $request->autor_descripcion;
        $noticia->descripcion_total = $request->descripcion_total;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'noticia_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/noticias_imagenes/';
            $file->move($path, $nameimg);
            $noticia->imagen = $nameimg;
        }

        if ($request->hasFile('autor_imagen')) {
            $file = $request->file('autor_imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'noticia_autor_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/noticias_autor_imagenes/';
            $file->move($path, $nameimg);
            $noticia->autor_imagen = $nameimg;
        }


        $noticia->save();
        return response()->json(true);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id'                  => 'required|exists:noticias,id',
            'categoria_noticia_id' => 'required|exists:categoria_noticias,id',
            'titulo'              => 'required|string|max:255',
            'fecha'               => 'required|date',
            'descripcion_corta'   => 'nullable|string|max:500',
            'autor_nombre'        => 'nullable|string|max:150',
            'autor_descripcion'   => 'nullable|string|max:500',
            'descripcion_total'   => 'nullable|string',
            'imagen'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'autor_imagen'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $noticia = Noticia::find($request->id);
        $noticia->categoria_noticia_id = $request->categoria_noticia_id;
        $noticia->titulo = $request->titulo;
        $noticia->fecha = $request->fecha;
        $noticia->descripcion_corta = $request->descripcion_corta;
        $noticia->tags = json_decode($request->tags);
        $noticia->autor_nombre = $request->autor_nombre;
        $noticia->autor_descripcion = $request->autor_descripcion;
        $noticia->descripcion_total = $request->descripcion_total;
        if ($request->hasFile('imagen')) {
            if ($noticia->imagen) {
                $oldFilePath = public_path() . '/noticias_imagenes/' . $noticia->imagen;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'noticia_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/noticias_imagenes/';
            $file->move($path, $nameimg);
            $noticia->imagen = $nameimg;
        }

        if ($request->hasFile('autor_imagen')) {
            if ($noticia->autor_imagen) {
                $oldFilePath = public_path() . '/noticias_autor_imagenes/' . $noticia->autor_imagen;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $file = $request->file('autor_imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'noticia_autor_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/noticias_autor_imagenes/';
            $file->move($path, $nameimg);
            $noticia->autor_imagen = $nameimg;
        }

        $noticia->save();
        return response()->json(true);
    }

    public function delete($id)
    {
        $noticia = Noticia::find($id);
        if ($noticia->imagen) {
            $oldFilePath = public_path() . '/noticias_imagenes/' . $noticia->imagen;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        if ($noticia->autor_imagen) {
            $oldautorFilePath = public_path() . '/noticias_autor_imagenes/' . $noticia->autor_imagen;
            if (file_exists($oldautorFilePath)) {
                unlink($oldautorFilePath);
            }
        }


        $noticia->delete();
        return response()->json(true);
    }

    public function storeCategoria(Request $request)
    {
        $categoria = new CategoriaNoticia();
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return response()->json(true);
    }

    public function updateCategoria(Request $request)
    {
        $categoria = CategoriaNoticia::find($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return response()->json(true);
    }

    public function deleteCategoria($id)
    {
        $categoria = CategoriaNoticia::find($id);
        $categoria->delete();
        return response()->json(true);
    }

}
