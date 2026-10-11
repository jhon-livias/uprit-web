<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFlyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HomeFlyerController extends Controller
{
    public function index()
    {
        return view('admin.pages.home-flyers.index');
    }

    public function getFlyers()
    {
        return response()->json(HomeFlyer::orderBy('orden')->orderBy('id')->get());
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);
        $data['imagen'] = $this->storeImage($request);

        HomeFlyer::create($data);

        return response()->json(true);
    }

    public function update(Request $request)
    {
        $request->validate(['id' => ['required', 'exists:home_flyers,id']]);
        $data = $this->validated($request, false);
        $flyer = HomeFlyer::findOrFail($request->id);

        if ($request->hasFile('imagen')) {
            $this->deleteImage($flyer->imagen);
            $data['imagen'] = $this->storeImage($request);
        }

        $flyer->update($data);

        return response()->json(true);
    }

    public function delete($id)
    {
        $flyer = HomeFlyer::findOrFail($id);
        $this->deleteImage($flyer->imagen);
        $flyer->delete();

        return response()->json(true);
    }

    public function reorder(Request $request)
    {
        $data = $request->validate([
            'flyers' => ['required', 'array'],
            'flyers.*.id' => ['required', 'integer', 'distinct', 'exists:home_flyers,id'],
        ]);

        DB::transaction(function () use ($data) {
            foreach ($data['flyers'] as $position => $flyer) {
                HomeFlyer::whereKey($flyer['id'])->update(['orden' => $position + 1]);
            }
        });

        return response()->json(true);
    }

    private function validated(Request $request, bool $imageRequired): array
    {
        $data = $request->validate([
            'titulo' => ['nullable', 'string', 'max:255'],
            'tipo_enlace' => ['required', Rule::in(['interno', 'externo'])],
            'enlace' => ['nullable', 'string', 'max:500'],
            'nueva_pestana' => ['nullable', 'boolean'],
            'activo' => ['nullable', 'boolean'],
            'orden' => ['required', 'integer', 'min:0', 'max:9999'],
            'imagen' => [$imageRequired ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        if (!empty($data['enlace'])) {
            if ($data['tipo_enlace'] === 'interno' && !str_starts_with($data['enlace'], '/')) {
                abort(422, 'El enlace interno debe comenzar con /.');
            }

            if ($data['tipo_enlace'] === 'externo' && !filter_var($data['enlace'], FILTER_VALIDATE_URL)) {
                abort(422, 'Ingresa una URL externa válida.');
            }
        }

        $data['nueva_pestana'] = $request->boolean('nueva_pestana');
        $data['activo'] = $request->boolean('activo');
        unset($data['imagen']);

        return $data;
    }

    private function storeImage(Request $request): string
    {
        $directory = public_path('home_flyers');
        File::ensureDirectoryExists($directory);
        $file = $request->file('imagen');
        $name = 'flyer_' . bin2hex(random_bytes(16)) . '.' . strtolower($file->extension());
        $file->move($directory, $name);

        return 'home_flyers/' . $name;
    }

    private function deleteImage(?string $image): void
    {
        if (!$image || !str_starts_with($image, 'home_flyers/')) {
            return;
        }

        $path = public_path($image);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
