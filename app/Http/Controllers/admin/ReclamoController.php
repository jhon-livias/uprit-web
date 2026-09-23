<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Reclamo;

class ReclamoController extends Controller
{
    //
    public function index()
    {
        return view('admin.pages.libro_reclamaciones.index');
    }

    public function getReclamos(){
        $reclamos = Reclamo::orderby('fecha', 'desc')->paginate(50);
        return response()->json($reclamos);
    }

    public function delete($id)
    {
        $reclamo = Reclamo::find($id);
        $reclamo->delete();
        return response()->json(true);
    }

    /**
     * HIGH-03: Descarga protegida de evidencias de reclamos.
     * Solo accesible por administradores autenticados (auth:sanctum).
     */
    public function descargarEvidencia(string $filename)
    {
        // Sanitizar: solo nombre de archivo sin rutas para evitar path traversal
        $filename = basename($filename);
        $path = 'reclamos/' . $filename;

        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'Evidencia no encontrada.');
        }

        return Storage::disk('local')->download($path);
    }
}
