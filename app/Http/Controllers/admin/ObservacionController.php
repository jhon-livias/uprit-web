<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Observacion;
use App\Models\ObservacionComentario;
use App\Models\User;
use Database\Seeders\ObservacionSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ObservacionController extends Controller
{
    public function index()
    {
        return view('admin.pages.observaciones.index', [
            'currentUserId' => auth()->id(),
            'currentUserName' => auth()->user()->name,
        ]);
    }

    public function getObservaciones()
    {
        $observaciones = Observacion::query()
            ->with([
                'duplicadoDe:id,titulo',
                'asignado:id,name',
                'comentarios' => fn ($q) => $q->with('user:id,name')->latest()->limit(3),
            ])
            ->withCount('comentarios')
            ->orderBy('orden')
            ->orderBy('id')
            ->get();

        return response()->json($observaciones);
    }

    public function getMeta()
    {
        return response()->json([
            'estados' => Observacion::ESTADOS,
            'prioridades' => Observacion::PRIORIDADES,
            'areas' => Observacion::query()->distinct()->orderBy('area')->pluck('area'),
            'paginas' => Observacion::query()->distinct()->orderBy('pagina')->pluck('pagina'),
            'carpetas' => Observacion::query()->distinct()->orderBy('carpeta_origen')->pluck('carpeta_origen'),
            'usuarios' => User::query()->orderBy('name')->get(['id', 'name', 'email']),
            'totales' => [
                'total' => Observacion::count(),
                'duplicados' => Observacion::where('es_duplicado', true)->count(),
                'pendientes' => Observacion::where('estado', 'pendiente')->count(),
                'en_progreso' => Observacion::where('estado', 'en_progreso')->count(),
                'hechas' => Observacion::where('estado', 'hecho')->count(),
                'sin_asignar' => Observacion::whereNull('asignado_user_id')->whereNotIn('estado', ['hecho', 'rechazado'])->count(),
            ],
        ]);
    }

    public function getComentarios($id)
    {
        $comentarios = ObservacionComentario::query()
            ->where('observacion_id', $id)
            ->with('user:id,name')
            ->latest()
            ->get();

        return response()->json($comentarios);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['orden'] = (Observacion::max('orden') ?? 0) + 1;

        $observacion = Observacion::create($data);

        return response()->json($observacion->load('asignado:id,name'));
    }

    public function update(Request $request)
    {
        $observacion = Observacion::findOrFail($request->id);
        $observacion->update($this->validated($request));

        return response()->json(
            $observacion->fresh(['duplicadoDe:id,titulo', 'asignado:id,name'])->loadCount('comentarios')
        );
    }

    public function updateEstado(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:observaciones,id',
            'estado' => 'required|in:' . implode(',', Observacion::ESTADOS),
            'orden' => 'nullable|integer|min:0',
        ]);

        $observacion = Observacion::findOrFail($request->id);
        $observacion->estado = $request->estado;

        if ($request->filled('orden')) {
            $observacion->orden = $request->orden;
        }

        $observacion->save();

        return response()->json($observacion);
    }

    public function storeComentario(Request $request)
    {
        $request->validate([
            'observacion_id' => 'required|exists:observaciones,id',
            'comentario' => 'required|string|max:5000',
        ]);

        $comentario = ObservacionComentario::create([
            'observacion_id' => $request->observacion_id,
            'user_id' => auth()->id(),
            'comentario' => trim($request->comentario),
        ]);

        return response()->json($comentario->load('user:id,name'));
    }

    public function deleteComentario($id)
    {
        $comentario = ObservacionComentario::findOrFail($id);

        if ($comentario->user_id !== auth()->id()) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $comentario->delete();

        return response()->json(true);
    }

    public function delete($id)
    {
        Observacion::findOrFail($id)->delete();

        return response()->json(true);
    }

    public function reimport()
    {
        Artisan::call('db:seed', [
            '--class' => ObservacionSeeder::class,
            '--force' => true,
        ]);

        return response()->json([
            'ok' => true,
            'total' => Observacion::count(),
            'duplicados' => Observacion::where('es_duplicado', true)->count(),
        ]);
    }

    private function validated(Request $request): array
    {
        $request->validate([
            'area' => 'required|string|max:255',
            'pagina' => 'required|string|max:255',
            'carpeta_origen' => 'required|string|max:255',
            'titulo' => 'required|string|max:500',
            'descripcion' => 'required|string',
            'tipo' => 'nullable|string|max:50',
            'archivo_origen' => 'nullable|string|max:500',
            'estado' => 'nullable|in:' . implode(',', Observacion::ESTADOS),
            'prioridad' => 'nullable|in:' . implode(',', Observacion::PRIORIDADES),
            'asignado_user_id' => 'nullable|exists:users,id',
            'fecha_limite' => 'nullable|date',
            'es_duplicado' => 'nullable|boolean',
            'duplicado_de' => 'nullable|exists:observaciones,id',
        ]);

        return [
            'area' => $request->area,
            'pagina' => $request->pagina,
            'carpeta_origen' => $request->carpeta_origen,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo ?? 'observación',
            'archivo_origen' => $request->archivo_origen,
            'estado' => $request->estado ?? 'pendiente',
            'prioridad' => $request->prioridad ?? 'media',
            'asignado_user_id' => $request->asignado_user_id ?: null,
            'fecha_limite' => $request->fecha_limite ?: null,
            'es_duplicado' => (bool) $request->es_duplicado,
            'duplicado_de' => $request->duplicado_de,
        ];
    }
}
