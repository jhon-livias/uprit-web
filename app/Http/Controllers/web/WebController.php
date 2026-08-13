<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Carrera;
use App\Models\Testimonio;
use App\Models\Noticia;
use App\Models\Categoria;
use App\Models\NivelAcademico;
use App\Models\CategoriaNoticia;
use App\Models\SliderCarrera;
use App\Models\Reclamo;
use App\Models\Docente;


class WebController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::whereNotNull('video')
            ->where('video', '!=', '')
            ->orderby('orden', 'asc')
            ->get();
        $noticias = Noticia::with('categoriaNoticia')
            ->orderBy('fecha', 'desc')
            ->get();
        $testimonios = Testimonio::whereNotNull('imagen')
            ->where('imagen', '!=', '')
            ->get();
        $sliderscarrera = SliderCarrera::orderby('orden', 'asc')->get();
        return view('web.index', compact('sliders', 'noticias', 'testimonios', 'sliderscarrera'));
    }

    public function noticias(Request $request, $categoria = null)
    {
        $categorias = CategoriaNoticia::all();

        $query = Noticia::with('categoriaNoticia')->orderBy('fecha', 'desc');

        if ($categoria) {

            $query->where('categoria_noticia_id', $categoria);
        }

        if ($request->filled('buscar')) {

            $buscar = $request->buscar;

            $query->where(function ($q) use ($buscar) {

                $q->where('titulo', 'LIKE', "%{$buscar}%")->orWhereHas('categoriaNoticia', function ($cat) use ($buscar) {

                    $cat->where('nombre', 'LIKE', "%{$buscar}%");
                });
            });
        }

        $noticias = $query->paginate(6)
            ->withQueryString();

        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')
            
            ->get();

        return view('web.noticia', compact(
            'noticias',
            'categorias',
            'ultimasnoticias'
        ));
    }

    public function detallenoticia($id)
    {
        $noticia = Noticia::findOrFail($id);
        $categorias = CategoriaNoticia::all();
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.detalle-noticia', compact('noticia', 'categorias', 'ultimasnoticias'));
    }

    public function detallecarrera($id)
    {
        $carrera = Carrera::with('docentes')->findOrFail($id);
        $categoria = Categoria::findOrFail($carrera->categoria_id);
        return view('web.detalle-carrera', compact('carrera', 'categoria'));
    }

    public function soporte()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.soporte', compact('ultimasnoticias'));
    }

    public function bienestarRsu()
    {
        return view('web.bienestar-rsu');
    }

    public function salud()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.salud', compact('ultimasnoticias'));
    }

    public function serviciosDeSalud()
    {
        return view('web.servicios-de-salud');
    }

    public function servicioPsicopedagogico()
    {
        return view('web.servicio-psicopedagogico');
    }

    public function futbol()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.futbol', compact('ultimasnoticias'));
    }

    public function libroreclamaciones()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.libro-reclamaciones', compact('ultimasnoticias'));
    }

    public function transparencia()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        $secciones = \App\Models\TransparenciaSeccion::with('documentos')->orderBy('orden')->get();

        return view('web.transparencia', compact('ultimasnoticias', 'secciones'));
    }

    public function talleres()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.talleres', compact('ultimasnoticias'));
    }

    public function becas()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.becas', compact('ultimasnoticias'));
    }

    public function honors()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.honors', compact('ultimasnoticias'));
    }
    public function global()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.global', compact('ultimasnoticias'));
    }
    public function alumni()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.alumni', compact('ultimasnoticias'));
    }
    public function programa()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.programa', compact('ultimasnoticias'));
    }
    
        public function convalidacion()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.convalidacion', compact('ultimasnoticias'));
    }

    public function doblegrado()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.doble-grado', compact('ultimasnoticias'));
    }

    public function becadieciocho()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.beca18', compact('ultimasnoticias'));
    }

    public function intercambioperu()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get(); 
        return view('web.intercambio-peru', compact('ultimasnoticias'));
    }

    public function tallertitulacion()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get(); 
        return view('web.taller-titulacion', compact('ultimasnoticias'));
    }

    public function asesores()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get(); 
        return view('web.asesores', compact('ultimasnoticias'));
    }
    
     public function escuelaposgrado()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();   
        return view('web.escuela-posgrado', compact('ultimasnoticias'));
    }

    public function posgradodoble()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();   
        return view('web.posgrado-doble', compact('ultimasnoticias'));
    }

    public function misionacademica()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();   
        return view('web.mision-academica', compact('ultimasnoticias'));
    }

    public function vive()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();   
        return view('web.vive', compact('ultimasnoticias'));
    }
    
    public function porque()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();  
        return view('web.porque', compact('ultimasnoticias'));
    }

    public function modeloeducativo()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();   
        return view('web.modelo-educativo', compact('ultimasnoticias'));
    }
    
    
    public function direccion()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        $docentesInvestigadores = Docente::query()
            ->where('es_investigador', true)
            ->orderBy('orden_investigacion')
            ->orderBy('nombre')
            ->get();

        return view('web.direccion', compact('ultimasnoticias', 'docentesInvestigadores'));
    }

    public function detalleDocenteInvestigacion(int $id)
    {
        $docente = Docente::query()
            ->where('id', $id)
            ->where('es_investigador', true)
            ->firstOrFail();

        return view('web.detalle-docente-investigacion', compact('docente'));
    }

    public function centro_investigacion()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();       
        return view('web.centro_investigacion', compact('ultimasnoticias'));
    }

    public function autoridades()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.autoridades', compact('ultimasnoticias'));
    }

    public function rednexo()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.red-nexo', compact('ultimasnoticias'));
    }

    public function a2iprograma()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.a2iprograma', compact('ultimasnoticias'));
    }

    public function medioambiental()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.medioambiental', compact('ultimasnoticias'));
    }

    public function defensoria()
    {
        $ultimasnoticias = Noticia::orderBy('fecha', 'desc')->get();
        return view('web.defensoria', compact('ultimasnoticias'));
    }

    public function storeReclamo(Request $request)
    {
        if (!empty($request->website)) {
            abort(403, 'Spam detectado');
        }

        $startedAt = (int) $request->form_started_at;
        $seconds = time() - $startedAt;

        if ($seconds <= 3) {
            return back()->withErrors([
                'spam' => 'Se detectó una posible actividad automática.'
            ]);
        }

        $request->validate([
            'nombres'      => 'required|string|max:100',
            'apellidos'    => 'required|string|max:100',
            'dni'          => 'required|digits_between:8,12',
            'correo'       => 'required|email|max:150',
            'telefono'     => 'nullable|string|max:20',
            'sede'         => 'required|string|max:100',
            'tipo'         => 'required|string|max:100',
            'tipo_reclamo' => 'required|string|max:100',
            'descripcion'  => 'required|string|min:10|max:2000',
            'evidencia'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ], [
            'nombres.required'      => 'El nombre es obligatorio.',
            'apellidos.required'    => 'Los apellidos son obligatorios.',
            'dni.required'          => 'El DNI es obligatorio.',
            'dni.digits_between'    => 'El DNI debe tener entre 8 y 12 dígitos.',
            'correo.required'       => 'El correo electrónico es obligatorio.',
            'correo.email'          => 'Ingrese un correo válido.',
            'sede.required'         => 'Seleccione una sede.',
            'tipo.required'         => 'Seleccione el tipo de reclamo.',
            'tipo_reclamo.required' => 'Seleccione la categoría del reclamo.',
            'descripcion.required'  => 'La descripción es obligatoria.',
            'descripcion.min'       => 'La descripción debe tener al menos 10 caracteres.',
            'evidencia.mimes'       => 'La evidencia debe ser JPG, PNG o PDF.',
            'evidencia.max'         => 'La evidencia no puede superar 5 MB.',
        ]);

        $reclamo = new Reclamo();
        $reclamo->razon_social = $request->razon_social;
        $reclamo->ruc = $request->ruc;
        $reclamo->domicilio_fiscal = $request->domicilio_fiscal;
        $reclamo->fecha = now()->timezone('America/Lima')->toDateString();
        $reclamo->sede = $request->sede;
        $reclamo->unidad = $request->unidad;
        $reclamo->nombres = $request->nombres;
        $reclamo->apellidos = $request->apellidos;
        $reclamo->domicilio = $request->domicilio;
        $reclamo->dni = $request->dni;
        $reclamo->telefono = $request->telefono;
        $reclamo->correo = $request->correo;
        $reclamo->apoderado = $request->apoderado;
        $reclamo->tipo = $request->tipo;
        $reclamo->descripcion = $request->descripcion;
        $reclamo->monto = $request->monto;
        $reclamo->tipo_reclamo = $request->tipo_reclamo;
        $reclamo->detalle = $request->detalle;


        if ($request->hasFile('evidencia')) {
            $file = $request->file('evidencia');
            $nameimg = 'evidencia_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/reclamos_evidencia/';
            $file->move($path, $nameimg);
            $reclamo->evidencia = $nameimg;
        }


        $reclamo->save();
        return redirect()->route('libroreclamaciones')->with('agregar-reclamo', 'ok');
    }
}
