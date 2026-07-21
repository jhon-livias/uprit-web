<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TransparenciaDocumento;
use App\Models\TransparenciaSeccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TransparenciaController extends Controller
{
    public function index()
    {
        return view('admin.pages.transparencia.index');
    }

    public function getSecciones()
    {
        $secciones = TransparenciaSeccion::with('documentos')
            ->orderBy('orden')
            ->get();

        return response()->json($secciones);
    }

    public function storeSeccion(Request $request)
    {
        $seccion = new TransparenciaSeccion();
        $seccion->titulo = $request->titulo;
        $seccion->subtitulo = $request->subtitulo;
        $seccion->icono = $request->icono ?: 'document';
        $seccion->orden = $request->orden ?? ((int) TransparenciaSeccion::max('orden') + 1);
        $seccion->abierta_por_defecto = filter_var($request->abierta_por_defecto, FILTER_VALIDATE_BOOLEAN);
        $seccion->save();

        return response()->json($seccion->load('documentos'));
    }

    public function updateSeccion(Request $request)
    {
        $seccion = TransparenciaSeccion::findOrFail($request->id);
        $seccion->titulo = $request->titulo;
        $seccion->subtitulo = $request->subtitulo;
        $seccion->icono = $request->icono ?: 'document';
        $seccion->orden = $request->orden ?? $seccion->orden;
        $seccion->abierta_por_defecto = filter_var($request->abierta_por_defecto, FILTER_VALIDATE_BOOLEAN);
        $seccion->save();

        return response()->json($seccion->load('documentos'));
    }

    public function deleteSeccion($id)
    {
        $seccion = TransparenciaSeccion::findOrFail($id);

        foreach ($seccion->documentos as $documento) {
            $this->deleteArchivo($documento->archivo);
        }

        $seccion->delete();

        return response()->json(true);
    }

    public function storeDocumento(Request $request)
    {
        $documento = new TransparenciaDocumento();
        $documento->seccion_id = $request->seccion_id;
        $documento->etiqueta = $request->etiqueta;
        $documento->url = $request->url ?: null;
        $documento->orden = $request->orden ?? ((int) TransparenciaDocumento::where('seccion_id', $request->seccion_id)->max('orden') + 1);

        if ($request->hasFile('archivo')) {
            $documento->archivo = $this->saveUpload($request->file('archivo'));
            $documento->url = null;
        }

        $documento->save();

        return response()->json($documento);
    }

    public function updateDocumento(Request $request)
    {
        $documento = TransparenciaDocumento::findOrFail($request->id);
        $documento->etiqueta = $request->etiqueta;
        $documento->orden = $request->orden ?? $documento->orden;

        if ($request->hasFile('archivo')) {
            $this->deleteArchivo($documento->archivo);
            $documento->archivo = $this->saveUpload($request->file('archivo'));
            $documento->url = null;
        } elseif ($request->filled('url')) {
            if ($documento->archivo) {
                $this->deleteArchivo($documento->archivo);
                $documento->archivo = null;
            }
            $documento->url = $request->url;
        }

        $documento->save();

        return response()->json($documento);
    }

    public function deleteDocumento($id)
    {
        $documento = TransparenciaDocumento::findOrFail($id);
        $this->deleteArchivo($documento->archivo);
        $documento->delete();

        return response()->json(true);
    }

    private function saveUpload($file): string
    {
        $path = public_path('transparencia_documentos');
        File::ensureDirectoryExists($path, 0775);

        $filename = 'transparencia_' . time() . '_' . rand(1, 200) . '.' . $file->getClientOriginalExtension();
        $file->move($path, $filename);

        return $filename;
    }

    private function deleteArchivo(?string $archivo): void
    {
        if (!$archivo) {
            return;
        }

        $filePath = public_path('transparencia_documentos/' . $archivo);
        if (is_file($filePath)) {
            unlink($filePath);
        }
    }
}
