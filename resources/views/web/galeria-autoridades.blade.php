@extends('web.layouts.principal')
@section('body_class', 'page-galeria-autoridades')
@section('content')
@include('web.partials.breadcrumb')

<section class="galeria-autoridades">
    <div class="container">
        <div class="galeria-autoridades__head">
            <p class="galeria-autoridades__intro">{{ $galeria['intro'] }}</p>
            <a class="galeria-autoridades__ficha" href="{{ route('autoridades') }}">Ver fichas y cargos</a>
        </div>

        <nav class="galeria-nav" aria-label="Secciones de la galería">
            @foreach($galeria['secciones'] as $seccion)
                <a href="#{{ $seccion['id'] }}" data-galeria-nav="{{ $seccion['id'] }}" @if($loop->first) class="is-active" aria-current="true" @endif>{{ $seccion['titulo'] }}</a>
            @endforeach
        </nav>

        @foreach($galeria['secciones'] as $seccion)
            <section class="galeria-bloque" id="{{ $seccion['id'] }}">
                <header class="galeria-bloque__head">
                    <p>{{ $seccion['indice'] }}</p>
                    <div>
                        <h2>{{ $seccion['titulo'] }}</h2>
                        <p>{{ $seccion['texto'] }}</p>
                    </div>
                </header>

                <div class="galeria-muros">
                    @foreach($seccion['grupos'] as $grupo)
                        <div class="galeria-muro-grupo">
                            @if(count($seccion['grupos']) > 1)
                                <h3>{{ $grupo['titulo'] }}</h3>
                            @endif
                            <div class="galeria-muro galeria-muro--columna">
                                @foreach($grupo['personas'] as $persona)
                                    @include('web.partials.autoridades.retrato', ['persona' => $persona, 'modificador' => 'galeria-autoridad--banda'])
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach
    </div>
</section>

<dialog class="galeria-dialog" id="galeria-dialog" aria-labelledby="galeria-dialog-nombre">
    <div class="galeria-dialog__foto" data-galeria-dialog-foto></div>
    <div class="galeria-dialog__texto">
        <button type="button" class="galeria-dialog__cerrar" data-galeria-cerrar aria-label="Cerrar retrato">Cerrar</button>
        <p class="galeria-dialog__kicker" data-galeria-dialog-kicker></p>
        <h2 id="galeria-dialog-nombre" data-galeria-dialog-nombre></h2>
        <p class="galeria-dialog__rol" data-galeria-dialog-rol></p>
        <p class="galeria-dialog__periodo" data-galeria-dialog-periodo hidden></p>
        <p class="galeria-dialog__detalle" data-galeria-dialog-detalle hidden></p>
        <ul class="galeria-dialog__credenciales" data-galeria-dialog-credenciales hidden></ul>
    </div>
</dialog>

@include('web.layouts.marquesina')
@endsection

@push('scripts')
<script>
(function () {
    var dialog = document.getElementById('galeria-dialog');
    if (!dialog) return;

    var foto = dialog.querySelector('[data-galeria-dialog-foto]');
    var kicker = dialog.querySelector('[data-galeria-dialog-kicker]');
    var nombre = dialog.querySelector('[data-galeria-dialog-nombre]');
    var rol = dialog.querySelector('[data-galeria-dialog-rol]');
    var periodo = dialog.querySelector('[data-galeria-dialog-periodo]');
    var detalle = dialog.querySelector('[data-galeria-dialog-detalle]');
    var credenciales = dialog.querySelector('[data-galeria-dialog-credenciales]');
    var links = document.querySelectorAll('[data-galeria-nav]');
    var secciones = document.querySelectorAll('.galeria-bloque');

    function abrir(boton) {
        var src = boton.getAttribute('data-foto') || '';
        var medalla = boton.getAttribute('data-medalla') === '1';
        var lista = (boton.getAttribute('data-credenciales') || '').split('|').filter(Boolean);
        var texto = boton.getAttribute('data-detalle') || '';
        var facultad = boton.getAttribute('data-facultad') || '';
        var etiqueta = boton.getAttribute('data-etiqueta') || '';
        var cargo = boton.getAttribute('data-rol') || '';
        var fechas = boton.getAttribute('data-periodo') || '';

        foto.replaceChildren();
        if (src) {
            var imagen = document.createElement('img');
            imagen.src = src;
            imagen.alt = '';
            if (medalla) imagen.className = 'is-medalla';
            foto.appendChild(imagen);
        } else {
            var iniciales = document.createElement('span');
            iniciales.className = 'galeria-autoridad__iniciales';
            iniciales.textContent = boton.getAttribute('data-iniciales') || '';
            foto.appendChild(iniciales);
        }
        kicker.textContent = [etiqueta, facultad, fechas].filter(Boolean).join(' · ') || cargo;
        nombre.textContent = boton.getAttribute('data-nombre') || '';
        rol.textContent = cargo;
        rol.hidden = cargo === '' || cargo === kicker.textContent;
        periodo.textContent = fechas;
        periodo.hidden = fechas === '' || fechas === kicker.textContent;
        detalle.textContent = texto;
        detalle.hidden = texto === '';
        credenciales.innerHTML = '';
        lista.forEach(function (item) {
            var li = document.createElement('li');
            li.textContent = item;
            credenciales.appendChild(li);
        });
        credenciales.hidden = lista.length === 0;
        dialog.showModal();
    }

    document.querySelectorAll('[data-galeria-persona]').forEach(function (boton) {
        boton.addEventListener('click', function () {
            abrir(boton);
        });
    });

    dialog.querySelector('[data-galeria-cerrar]').addEventListener('click', function () {
        dialog.close();
    });

    dialog.addEventListener('click', function (event) {
        if (event.target === dialog) dialog.close();
    });

    if (!('IntersectionObserver' in window) || !secciones.length) return;

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            var id = entry.target.id;
            links.forEach(function (link) {
                var on = link.getAttribute('data-galeria-nav') === id;
                link.classList.toggle('is-active', on);
                if (on) link.setAttribute('aria-current', 'true');
                else link.removeAttribute('aria-current');
            });
        });
    }, { rootMargin: '-30% 0px -55% 0px', threshold: 0.01 });

    secciones.forEach(function (seccion) {
        observer.observe(seccion);
    });
})();
</script>
@endpush
