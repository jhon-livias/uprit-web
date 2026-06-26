@extends('web.layouts.principal')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

@endsection
@section('content')
<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner" style="margin-top:40px">
            <div class="page-title">
                <h1 class="title">Libro de Reclamaciones</h1>
            </div>
            <ul class="edu-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('web.index')}}">Inicio</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{route('libroreclamaciones')}}">Libro de Reclamaciones</a></li>
            </ul>
        </div>
    </div>

</div>
<form action="{{ route('reclamos.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <section class="privacy-policy-area">
        <div class="container">
            <div class="row row--30">
                <div class="col-lg-12">

                    <div class="reclamo-wrapper libro-re">

                        <div class="text-center mb-5">
                            <h2 class="title">Hoja de Reclamo</h2>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-4">1. Información de la Universidad</h4>

                            <div class="row">
                                <div class="col-lg-9 mb-3">
                                    <label>Razón Social</label>
                                    <input type="text" class="form-control"
                                        value="Universidad Privada de Trujillo" disabled>
                                    <input type="hidden" value="Universidad Privada de Trujillo" name="razon_social">
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label>RUC</label>
                                    <input type="text" class="form-control"
                                        value="20482309381" disabled>
                                    <input type="hidden" value="20482309381" name="ruc">
                                </div>

                                <div class="col-lg-9 mb-3">
                                    <label>Domicilio Fiscal</label>
                                    <input type="text" class="form-control"
                                        value="Av. Industrial km. 4 - Semirústica El Bosque" disabled>
                                    <input type="hidden" value="Av. Industrial km. 4 - Semirústica El Bosque" name="domicilio_fiscal">
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label>Fecha</label>
                                    <input type="date"
                                        class="form-control"
                                        id="fechaActual" name="fecha"
                                        disabled>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>Sede / Filial</label>
                                    <select class="form-control" name="sede">
                                        <option>Sede Trujillo</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>Unidad</label>
                                    <select class="form-control" name="unidad">
                                        <option>UPRIT</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <h4 class="mb-4">2. Identificación del Consumidor Reclamante</h4>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label>Nombres</label>
                                    <input type="text"
                                        class="form-control"
                                        name="nombres"
                                        placeholder="Nombres">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label>Apellidos</label>
                                    <input type="text"
                                        class="form-control"
                                        name="apellidos"
                                        placeholder="Apellidos">
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>Domicilio</label>
                                    <input type="text"
                                        class="form-control"
                                        name="domicilio"
                                        placeholder="Domicilio">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label>DNI/CE</label>
                                    <input type="text"
                                        class="form-control"
                                        name="dni"
                                        placeholder="DNI o CE">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label>Teléfono</label>
                                    <input type="text"
                                        class="form-control"
                                        name="telefono"
                                        placeholder="Teléfono">
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>Correo</label>
                                    <input type="email"
                                        class="form-control"
                                        name="correo"
                                        placeholder="Correo">
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>Apoderado</label>
                                    <input type="text"
                                        class="form-control"
                                        name="apoderado"
                                        placeholder="Apoderado">
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <h4 class="mb-4">3. Identificación del bien contratado</h4>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label>Tipo</label>
                                    <select class="form-control" name="tipo">
                                        <option value="Producto">Producto</option>
                                        <option value="Servicio">Servicio</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>Descripción del Reclamo</label>
                                    <textarea class="form-control"
                                        rows="4"
                                        name="descripcion"
                                        placeholder="¿Cuál fue el producto / servicio y en qué Oficina se encuentra"></textarea>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>Monto Reclamado</label>
                                    <input type="number"
                                        class="form-control"
                                        name="monto"
                                        value="0">
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <h4 class="mb-4">4. Detalle de la Reclamación</h4>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label>Tipo de Reclamo</label>

                                    <select class="form-control" name="tipo_reclamo">
                                        <option value="Reclamo">Reclamo</option>
                                        <option value="Queja">Queja</option>
                                    </select>

                                    <small class="d-block mt-3">
                                        1.- RECLAMO: Disconformidad relacionada a los productos o servicios.
                                    </small>

                                    <small class="d-block">
                                        2.- QUEJA: Disconformidad no relacionada a los productos o servicios,
                                        o malestar o descontento respecto a la atención al público.
                                    </small>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>Detalle</label>

                                    <textarea class="form-control"
                                        rows="5"
                                        name="detalle"
                                        placeholder="Detalle la fecha, hora, lugar y cuéntanos lo sucedido"></textarea>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>Adjuntar Evidencia</label>

                                    <input type="file"
                                        class="form-control"
                                        name="evidencia">


                                    <small class="d-block mt-2">
                                        Adjunte documentos, imágenes o cualquier evidencia relacionada.
                                    </small>
                                </div>
                                <div style="display:none;">
                                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                                    <input type="hidden" name="form_started_at" value="{{ time() }}">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="reclamo-info mt-4">
                            <p>
                                La respuesta a la presente será atendida mediante correo electrónico a la dirección que usted ha consignado en la presente hoja de reclamación.
                            </p>

                            <p>
                                La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo para interponer una denuncia ante el INDECOPI.
                            </p>

                            <p>
                                El proveedor debe dar respuesta al reclamo o queja en un plazo no mayor a quince (15) días hábiles, el cual es improrrogable.
                            </p>
                        </div>

                        <div class="text-center mt-5">
                            <button class="rn-btn edu-btn btn-medium submit-btn"
                                type="submit">
                                Enviar Reclamo
                                <i class="icon-4"></i>
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</form>
@include('web.layouts.marquesina')

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('agregar-reclamo') == 'ok')
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Reclamo registrado!',
        text: 'Tu solicitud fue enviada correctamente.',
        confirmButtonText: 'Entendido',
        confirmButtonColor: '#91001E',
        background: '#ffffff',
        color: '#222',
        backdrop: `
            rgba(0,0,0,0.55)
        `,
        customClass: {
            popup: 'swal-reclamo'
        }
    })
</script>
@endif
<script>
    const fechaInput = document.getElementById('fechaActual');

    const fechaLima = new Date().toLocaleDateString('en-CA', {
        timeZone: 'America/Lima'
    });

    fechaInput.value = fechaLima;
</script>
@endsection