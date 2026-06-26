<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\NivelController;
use App\Http\Controllers\admin\CategoriaController;
use App\Http\Controllers\admin\CarreraController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TestimonioController;
use App\Http\Controllers\admin\NoticiaController;
use App\Http\Controllers\admin\ReclamoController;


//web
use App\Http\Controllers\web\WebController;




Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('administrador.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // NIVEL ACADEMICO
    Route::get('/listar_niveles', [NivelController::class, 'index'])->name('niveles.index');
    Route::get('/get_niveles', [NivelController::class, 'getNiveles'])->name('niveles.get');
    Route::post('/niveles/store', [NivelController::class, 'store'])->name('niveles.store');
    Route::post('/niveles/edit', [NivelController::class, 'update'])->name('niveles.edit');
    Route::post('/niveles/delete/{id}', [NivelController::class, 'delete'])->name('niveles.delete');

    // CATEGORIA
    Route::get('/listar_categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/get_categorias', [CategoriaController::class, 'getCategoria'])->name('categorias.get');
    Route::post('/categorias/store', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::post('/categorias/edit', [CategoriaController::class, 'update'])->name('categorias.edit');
    Route::post('/categorias/delete/{id}', [CategoriaController::class, 'delete'])->name('categorias.delete');

    // CARRERA
    Route::get('/listar_carreras', [CarreraController::class, 'index'])->name('carreras.index');
    Route::get('/get_carreras', [CarreraController::class, 'getCarrera'])->name('carreras.get');
    Route::post('/carreras/store', [CarreraController::class, 'store'])->name('carreras.store');
    Route::post('/carreras/edit', [CarreraController::class, 'update'])->name('carreras.edit');
    Route::post('/carreras/delete/{id}', [CarreraController::class, 'delete'])->name('carreras.delete');
    Route::post('/carreras/descripcion/store', [CarreraController::class, 'storeDescipcion'])->name('carreras.descripcion.store');
    Route::post('/carreras/malla/store', [CarreraController::class, 'storeMalla'])->name('carreras.malla.store');
    Route::post('/carreras/perfil/store', [CarreraController::class, 'storePerfilEgresado'])->name('carreras.perfil.store');
    Route::post('/carreras/docente/store', [CarreraController::class, 'storeDocente'])->name('carreras.docente.store');


    // SLIDER
    Route::get('/listar_sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('/get_sliders', [SliderController::class, 'getSlider'])->name('sliders.get');
    Route::post('/sliders/store', [SliderController::class, 'store'])->name('sliders.store');
    Route::post('/sliders/edit', [SliderController::class, 'update'])->name('sliders.edit');
    Route::post('/sliders/delete/{id}', [SliderController::class, 'delete'])->name('sliders.delete');
    //SLIDER CARRERA
    Route::get('/listar_sliders_carrera', [SliderController::class, 'indexCarrera'])->name('sliderscarrera.index');
    Route::get('/get_sliders_carrera', [SliderController::class, 'getSliderCarrera'])->name('sliderscarrera.get');
    Route::post('/sliders/storeCarrera', [SliderController::class, 'storeCarrera'])->name('sliderscarrera.store');
    Route::post('/sliders/editCarrera', [SliderController::class, 'updateCarrera'])->name('sliderscarrera.edit');
    Route::post('/sliders/deleteCarrera/{id}', [SliderController::class, 'deleteCarrera'])->name('sliderscarrera.delete');


    // TESTIMONIO
    Route::get('/listar_testimonios', [TestimonioController::class, 'index'])->name('testimonios.index');
    Route::get('/get_testimonios', [TestimonioController::class, 'getTestimonios'])->name('testimonios.get');
    Route::post('/testimonios/store', [TestimonioController::class, 'store'])->name('testimonios.store');
    Route::post('/testimonios/edit', [TestimonioController::class, 'update'])->name('testimonios.edit');
    Route::post('/testimonios/delete/{id}', [TestimonioController::class, 'delete'])->name('testimonios.delete');

    // NOTICIA
    Route::get('/listar_noticias', [NoticiaController::class, 'index'])->name('noticias.index');
    Route::get('/get_categorias_noticias', [NoticiaController::class, 'getCatNoticia'])->name('noticias.get.categoria');
    Route::get('/get_noticias', [NoticiaController::class, 'getNoticias'])->name('noticias.get');
    Route::post('/noticias/store', [NoticiaController::class, 'store'])->name('noticias.store');
    Route::post('/noticias/edit/{id}', [NoticiaController::class, 'update'])->name('noticias.edit');
    Route::post('/noticias/delete/{id}', [NoticiaController::class, 'delete'])->name('noticias.delete');
    Route::post('/noticias/categorias/store', [NoticiaController::class, 'storeCategoria'])->name('noticias.categorias.store');
    Route::post('/noticias/categorias/edit', [NoticiaController::class, 'updateCategoria'])->name('noticias.categorias.edit');
    Route::post('/noticias/categorias/delete/{id}', [NoticiaController::class, 'deleteCategoria'])->name('noticias.categorias.delete');

    // RECLAMO
    Route::get('/listar_reclamos', [ReclamoController::class, 'index'])->name('reclamos.index');
    Route::get('/get_reclamos', [ReclamoController::class, 'getReclamos'])->name('reclamos.get');
    Route::post('/reclamos/delete/{id}', [ReclamoController::class, 'delete'])->name('reclamos.delete');

});


Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/noticias/{categoria?}', [WebController::class, 'noticias'])->name('web.noticias');
Route::get('/detalle-noticia/{id}', [WebController::class, 'detallenoticia'])->name('web.detallenoticia');
Route::get('/detalle-carrera/{id}', [WebController::class, 'detallecarrera'])->name('web.detallecarrera');
Route::get('/soporte', [WebController::class, 'soporte'])->name('soporte');
Route::get('/salud', [WebController::class, 'salud'])->name('salud');
Route::get('/futbol', [WebController::class, 'futbol'])->name('futbol');
Route::get('/libro-reclamaciones', [WebController::class, 'libroreclamaciones'])->name('libroreclamaciones');
Route::get('/transparencia', [WebController::class, 'transparencia'])->name('transparencia');
Route::post('/reclamos/store', [WebController::class, 'storeReclamo'])->name('reclamos.store');
Route::get('/talleres', [WebController::class, 'talleres'])->name('talleres');
Route::get('/becas', [WebController::class, 'becas'])->name('becas');
Route::get('/honors', [WebController::class, 'honors'])->name('honors');
Route::get('/global', [WebController::class, 'global'])->name('global');
Route::get('/alumni', [WebController::class, 'alumni'])->name('alumni');
Route::get('/programa', [WebController::class, 'programa'])->name('programa');


Route::get('/convalidacion', [WebController::class, 'convalidacion'])->name('convalidacion');
Route::get('/doble-grado', [WebController::class, 'doblegrado'])->name('doble-grado');
Route::get('/beca18', [WebController::class, 'becadieciocho'])->name('beca18');
Route::get('/intercambio-peru', [WebController::class, 'intercambioperu'])->name('intercambio-peru');
Route::get('/taller-titulacion', [WebController::class, 'tallertitulacion'])->name('taller-titulacion');
Route::get('/asesores', [WebController::class, 'asesores'])->name('asesores');

Route::get('/escuela-posgrado', [WebController::class, 'escuelaposgrado'])->name('escuela-posgrado');
Route::get('/posgrado-doble', [WebController::class, 'posgradodoble'])->name('posgrado-doble');
Route::get('/mision-academica', [WebController::class, 'misionacademica'])->name('mision-academica');
Route::get('/vive', [WebController::class, 'vive'])->name('vive');

Route::get('/porque', [WebController::class, 'porque'])->name('porque');
Route::get('/modelo-educativo', [WebController::class, 'modeloeducativo'])->name('modelo-educativo');

Route::get('/autoridades', [WebController::class, 'autoridades'])->name('autoridades');
Route::get('/red-nexo', [WebController::class, 'rednexo'])->name('red-nexo');
Route::get('/a2iprograma', [WebController::class, 'a2iprograma'])->name('a2iprograma');
Route::get('/medioambiental', [WebController::class, 'medioambiental'])->name('medioambiental');
Route::get('/defensoria', [WebController::class, 'defensoria'])->name('defensoria');

Route::get('/direccion', [WebController::class, 'direccion'])->name('direccion');
Route::get('/centro_investigacion', [WebController::class, 'centro_investigacion'])->name('centro_investigacion');


Route::get('/contactenos', function () {
    return view('web.contactenos');
});

