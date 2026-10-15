<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\TransparenciaDocumento;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TransparenciaDocumentoController extends Controller
{
    /**
     * Entrega documentos públicos de Transparencia desde almacenamiento privado.
     */
    public function show(TransparenciaDocumento $documento): BinaryFileResponse
    {
        abort_unless($documento->archivo && $documento->storage_disk === 'local', 404);

        $path = 'transparencia/documentos/' . $documento->archivo;
        abort_unless(Storage::disk('local')->exists($path), 404);

        return response()->file(Storage::disk('local')->path($path), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="documento-transparencia.pdf"',
        ]);
    }
}
