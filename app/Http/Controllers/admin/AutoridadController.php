<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autoridad;

class AutoridadController extends Controller
{
    public function index()
    {
        return view('admin.pages.autoridades.index');
    }

    public function getAutoridades()
    {
        $autoridades = Autoridad::orderBy('orden', 'asc')->get();
        return response()->json($autoridades);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'  => 'required|string|max:255',
            'cargo'   => 'required|string|max:255',
            'tipo'    => 'required|in:Consejo Directivo,Alta Dirección,Gobierno Interno',
            'orden'   => 'nullable|integer',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'cv_path' => 'nullable|mimes:pdf|max:10240',
        ]);

        $autoridad = new Autoridad();
        $autoridad->nombre = $request->nombre;
        $autoridad->cargo = $request->cargo;
        $autoridad->tipo = $request->tipo;
        $autoridad->orden = $request->orden ?? 0;
        $autoridad->estado = 1;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext = strtolower($file->extension());
            $nameimg = 'autoridad_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = $this->autoridadesUploadPath();
            $file->move($path, $nameimg);
            $autoridad->foto = 'web/imagenes/autoridades/' . $nameimg;
        }

        if ($request->hasFile('cv_path')) {
            $file = $request->file('cv_path');
            $ext = strtolower($file->extension());
            $namepdf = 'cv_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = $this->autoridadesUploadPath('cv');
            $file->move($path, $namepdf);
            $autoridad->cv_path = 'web/cv_autoridades/' . $namepdf;
        }

        $autoridad->save();

        return response()->json(true);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id'      => 'required|exists:autoridades,id',
            'nombre'  => 'required|string|max:255',
            'cargo'   => 'required|string|max:255',
            'tipo'    => 'required|in:Consejo Directivo,Alta Dirección,Gobierno Interno',
            'orden'   => 'nullable|integer',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'cv_path' => 'nullable|mimes:pdf|max:10240',
        ]);

        $autoridad = Autoridad::find($request->id);
        $autoridad->nombre = $request->nombre;
        $autoridad->cargo = $request->cargo;
        $autoridad->tipo = $request->tipo;
        $autoridad->orden = $request->orden ?? 0;

        if ($request->hasFile('foto')) {
            if ($autoridad->foto) {
                $oldFilePath = public_path($autoridad->foto);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('foto');
            $ext = strtolower($file->extension());
            $nameimg = 'autoridad_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = $this->autoridadesUploadPath();
            $file->move($path, $nameimg);
            $autoridad->foto = 'web/imagenes/autoridades/' . $nameimg;
        }

        if ($request->hasFile('cv_path')) {
            if ($autoridad->cv_path) {
                $oldFilePath = public_path($autoridad->cv_path);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('cv_path');
            $ext = strtolower($file->extension());
            $namepdf = 'cv_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = $this->autoridadesUploadPath('cv');
            $file->move($path, $namepdf);
            $autoridad->cv_path = 'web/cv_autoridades/' . $namepdf;
        }

        $autoridad->save();

        return response()->json(true);
    }

    public function delete($id)
    {
        $autoridad = Autoridad::find($id);
        if ($autoridad->foto) {
            $oldFilePath = public_path($autoridad->foto);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($autoridad->cv_path) {
            $oldFilePath = public_path($autoridad->cv_path);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $autoridad->delete();
        return response()->json(true);
    }

    private function autoridadesUploadPath(string $type = 'foto'): string
    {
        $dir = $type === 'foto' ? 'web/imagenes/autoridades' : 'web/cv_autoridades';
        $path = public_path($dir);

        if (!is_dir($path)) {
            mkdir($path, 0775, true);
        }

        return $path . '/';
    }
}
