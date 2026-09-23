<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SliderCarrera;
use App\Models\Carrera;


class SliderController extends Controller
{
    //
    public function index()
    {
        return view('admin.pages.sliders.index');
    }

    public function getSlider()
    {
        $sliders = Slider::orderBy('orden', 'asc')->get();
        return response()->json($sliders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_superior'  => 'nullable|string|max:255',
            'titulo_principal' => 'nullable|string|max:255',
            'descripcion'      => 'nullable|string|max:500',
            'enlace_boton'     => 'nullable|url|max:500',
            'orden'            => 'nullable|integer|min:0|max:999',
            'video'            => 'nullable|file|mimes:mp4,webm,ogg|max:204800',  // 200 MB max
            'imagen'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $slider = new Slider();
        $slider->titulo_superior = $request->titulo_superior;
        $slider->titulo_principal = $request->titulo_principal;
        $slider->descripcion = $request->descripcion;
        $slider->enlace_boton = $request->enlace_boton;
        $slider->orden = $request->orden;
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $ext = strtolower($file->extension());
            $namevideo = 'video_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/slider_principal_videos/';
            $file->move($path, $namevideo);
            $slider->video = $namevideo;
        }

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'slider_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/slider_principal_imagenes/';
            $file->move($path, $nameimg);
            $slider->imagen = $nameimg;
        }

        $slider->save();

        return response()->json(true);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id'               => 'required|exists:sliders,id',
            'titulo_superior'  => 'nullable|string|max:255',
            'titulo_principal' => 'nullable|string|max:255',
            'descripcion'      => 'nullable|string|max:500',
            'enlace_boton'     => 'nullable|url|max:500',
            'orden'            => 'nullable|integer|min:0|max:999',
            'video'            => 'nullable|file|mimes:mp4,webm,ogg|max:204800',  // 200 MB max
            'imagen'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $slider = Slider::find($request->id);
        $slider->titulo_superior = $request->titulo_superior;
        $slider->titulo_principal = $request->titulo_principal;
        $slider->descripcion = $request->descripcion;
        $slider->enlace_boton = $request->enlace_boton;
        $slider->orden = $request->orden;

        if ($request->hasFile('video')) {
            if ($slider->video) {
                $oldFilePath = public_path() . '/slider_principal_videos/' . $slider->video;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('video');
            $ext = strtolower($file->extension());
            $namevideo = 'video_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/slider_principal_videos/';
            $file->move($path, $namevideo);
            $slider->video = $namevideo;
        }

        if ($request->hasFile('imagen')) {
            if ($slider->imagen) {
                $oldFilePath = public_path() . '/slider_principal_imagenes/' . $slider->imagen;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'slider_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/slider_principal_imagenes/';
            $file->move($path, $nameimg);
            $slider->imagen = $nameimg;
        }

        $slider->save();

        return response()->json(true);
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if ($slider->video) {
            $oldFilePath = public_path() . '/slider_principal_videos/' . $slider->video;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($slider->imagen) {
            $oldFilePath = public_path() . '/slider_principal_imagenes/' . $slider->imagen;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $slider->delete();

        return response()->json(true);
    }

    public function getSliderCarrera()
    {
        $sliders = SliderCarrera::orderBy('orden', 'asc')->get();
        $sliders->load('carrera');
        return response()->json($sliders);
    }

    public function indexCarrera()
    {

        return view('admin.pages.sliders.carrera');
    }

    public function storeCarrera(Request $request)
    {
        $sliderCarrera = new SliderCarrera();
        $sliderCarrera->carrera_id = $request->carrera_id;
        $sliderCarrera->orden = $request->orden;
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'slidercarrera_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/slider_carreras_imagenes/';
            $file->move($path, $nameimg);
            $sliderCarrera->imagen = $nameimg;
        }

        $sliderCarrera->save();

        return response()->json(true);
    }

    public function updateCarrera(Request $request)
    {
        $sliderCarrera = SliderCarrera::find($request->id);
        $sliderCarrera->carrera_id = $request->carrera_id;
        $sliderCarrera->orden = $request->orden;
        if ($request->hasFile('imagen')) {
            if ($sliderCarrera->imagen) {
                $oldFilePath = public_path() . '/slider_carreras_imagenes/' . $sliderCarrera->imagen;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('imagen');
            $ext = strtolower($file->extension());
            $nameimg = 'slidercarrera_' . bin2hex(random_bytes(16)) . '.' . $ext;
            $path = public_path() . '/slider_carreras_imagenes/';
            $file->move($path, $nameimg);
            $sliderCarrera->imagen = $nameimg;
        }

        $sliderCarrera->save();

        return response()->json(true);
    }

    public function deleteCarrera($id)
    {
        $sliderCarrera = SliderCarrera::find($id);
        if ($sliderCarrera->imagen) {
            $oldFilePath = public_path() . '/slider_carreras_imagenes/' . $sliderCarrera->imagen;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $sliderCarrera->delete();

        return response()->json(true);
    }
}
