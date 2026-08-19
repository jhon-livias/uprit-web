<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Services\WebNavigationCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocenteController extends Controller
{
    public function index()
    {
        return view('admin.pages.docente.index');
    }

    public function getDocentes()
    {
        $docentes = Docente::query()
            ->with(['carreras.categoria.nivelAcademico'])
            ->withCount('carreras')
            ->orderBy('nombre')
            ->get();

        return response()->json($docentes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'correo' => 'nullable|email|max:150',
            'departamento' => 'nullable|string|max:250',
            'linkedin' => 'nullable|string|max:250',
            'imagen' => 'nullable|image|max:5120',
            'es_investigador' => 'nullable|boolean',
            'orden_investigacion' => 'nullable|integer|min:1|max:999',
            'resumen_investigacion' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'carrera_ids' => 'nullable|array',
            'carrera_ids.*' => 'integer|exists:carreras,id',
        ]);

        $docente = new Docente();
        $docente->nombre = $request->nombre;
        $docente->correo = $request->correo;
        $docente->departamento = $request->departamento;
        $docente->descripcion = $request->descripcion;
        $docente->linkedin = $request->linkedin;
        $docente->tags = $this->decodeTags($request->etiquetas_tags);
        $docente->es_investigador = $request->boolean('es_investigador');
        $docente->orden_investigacion = $docente->es_investigador ? $request->orden_investigacion : null;
        $docente->resumen_investigacion = $docente->es_investigador ? $request->resumen_investigacion : null;

        $imagen = $this->savePublicUpload($request, 'imagen');
        if ($imagen !== null) {
            $docente->imagen = $imagen;
        }

        $docente->save();
        $this->syncCarreras($docente, $request);
        WebNavigationCache::forget();

        return response()->json(true);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:docentes,id',
            'nombre' => 'required|string|max:150',
            'correo' => 'nullable|email|max:150',
            'departamento' => 'nullable|string|max:250',
            'linkedin' => 'nullable|string|max:250',
            'imagen' => 'nullable|image|max:5120',
            'es_investigador' => 'nullable|boolean',
            'orden_investigacion' => 'nullable|integer|min:1|max:999',
            'resumen_investigacion' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'carrera_ids' => 'nullable|array',
            'carrera_ids.*' => 'integer|exists:carreras,id',
        ]);

        $docente = Docente::findOrFail($request->id);
        $docente->nombre = $request->nombre;
        $docente->correo = $request->correo;
        $docente->departamento = $request->departamento;
        $docente->descripcion = $request->descripcion;
        $docente->linkedin = $request->linkedin;
        $docente->tags = $this->decodeTags($request->etiquetas_tags);
        $docente->es_investigador = $request->boolean('es_investigador');
        $docente->orden_investigacion = $docente->es_investigador ? $request->orden_investigacion : null;
        $docente->resumen_investigacion = $docente->es_investigador ? $request->resumen_investigacion : null;

        $imagen = $this->savePublicUpload($request, 'imagen', $docente->imagen);
        if ($imagen !== null) {
            $docente->imagen = $imagen;
        }

        $docente->save();
        $this->syncCarreras($docente, $request);
        WebNavigationCache::forget();

        return response()->json(true);
    }

    public function delete($id)
    {
        $docente = Docente::findOrFail($id);

        if ($docente->imagen) {
            $oldFilePath = public_path($docente->imagen);
            if (is_file($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $docente->delete();
        WebNavigationCache::forget();

        return response()->json(true);
    }

    private function syncCarreras(Docente $docente, Request $request): void
    {
        $carreraIds = collect($request->carrera_ids ?? [])
            ->filter(fn ($id) => $id !== null && $id !== '')
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values()
            ->all();

        $docente->carreras()->sync($carreraIds);
    }

    private function decodeTags(?string $rawTags): array
    {
        $tags = json_decode($rawTags ?? '[]', true);

        if (!is_array($tags)) {
            return [];
        }

        return array_values(array_filter(array_map(function ($tag) {
            if (is_array($tag)) {
                return trim((string) ($tag['value'] ?? ''));
            }

            return trim((string) $tag);
        }, $tags)));
    }

    private function savePublicUpload(Request $request, string $field, ?string $oldFilename = null): ?string
    {
        if (!$request->hasFile($field)) {
            return null;
        }

        $file = $request->file($field);
        if (!$file->isValid()) {
            return null;
        }

        $directory = 'carreras_docentes';
        $path = public_path($directory);
        File::ensureDirectoryExists($path, 0775);

        if ($oldFilename) {
            $oldFilePath = public_path($oldFilename);
            if (is_file($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move($path, $filename);

        return $directory . '/' . $filename;
    }
}
