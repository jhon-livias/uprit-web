<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TransparenciaDocumento;
use App\Models\TransparenciaSeccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'icono' => 'nullable|string|max:100',
            'orden' => 'nullable|integer',
        ]);

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
        $request->validate([
            'id' => 'required|exists:transparencia_secciones,id',
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'icono' => 'nullable|string|max:100',
            'orden' => 'nullable|integer',
        ]);

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
        $request->validate([
            'seccion_id' => 'required|exists:transparencia_secciones,id',
            'etiqueta' => 'required|string|max:255',
            'url' => 'nullable|url|max:1000',
            'orden' => 'nullable|integer',
            'archivo' => 'nullable|file|mimes:pdf|mimetypes:application/pdf|max:25600',
        ]);

        $documento = new TransparenciaDocumento();
        $documento->seccion_id = $request->seccion_id;
        $documento->etiqueta = $request->etiqueta;
        $documento->url = $request->url ?: null;
        $documento->orden = $request->orden ?? ((int) TransparenciaDocumento::where('seccion_id', $request->seccion_id)->max('orden') + 1);

        if ($request->hasFile('archivo')) {
            $documento->archivo = $this->saveUpload($request->file('archivo'));
            $documento->storage_disk = 'local';
            $documento->url = null;
        }

        $documento->save();

        return response()->json($documento);
    }

    public function updateDocumento(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:transparencia_documentos,id',
            'etiqueta' => 'required|string|max:255',
            'url' => 'nullable|url|max:1000',
            'orden' => 'nullable|integer',
            'archivo' => 'nullable|file|mimes:pdf|mimetypes:application/pdf|max:25600',
        ]);

        $documento = TransparenciaDocumento::findOrFail($request->id);
        $documento->etiqueta = $request->etiqueta;
        $documento->orden = $request->orden ?? $documento->orden;

        if ($request->hasFile('archivo')) {
            $this->deleteArchivo($documento->archivo);
            $documento->archivo = $this->saveUpload($request->file('archivo'));
            $documento->storage_disk = 'local';
            $documento->url = null;
        } elseif ($request->filled('url')) {
            if ($documento->archivo) {
                $this->deleteArchivo($documento->archivo);
                $documento->archivo = null;
                $documento->storage_disk = null;
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
        $header = $file->openFile()->fread(5);

        if ($header !== '%PDF-') {
            throw ValidationException::withMessages([
                'archivo' => 'El archivo debe ser un PDF válido.',
            ]);
        }

        $filename = 'transparencia_' . bin2hex(random_bytes(16)) . '.pdf';
        Storage::disk('local')->putFileAs('transparencia/documentos', $file, $filename);

        return $filename;
    }

    private function deleteArchivo(?string $archivo): void
    {
        if (!$archivo) {
            return;
        }

        $privatePath = 'transparencia/documentos/' . $archivo;
        if (Storage::disk('local')->exists($privatePath)) {
            Storage::disk('local')->delete($privatePath);
            return;
        }

        // Compatibilidad temporal con documentos publicados antes de esta mejora.
        $legacyPath = public_path('transparencia_documentos/' . $archivo);
        if (is_file($legacyPath)) {
            unlink($legacyPath);
        }
    }
}
