@include('web.partials.nav.legacy-pregrado-mobile')
<li class="has-droupdown">
    <a href="#">Posgrado</a>
    <ul class="submenu">
        @foreach($posgradoCategorias as $categoria)
        <li class="has-droupdown">
            <a href="#">{{ $categoria->nombre }}</a>
            <ul class="submenu">
                @foreach($categoria->hijos as $hijo)
                <li class="has-droupdown">
                    <a href="#">{{ $hijo->nombre }}</a>
                    <ul class="submenu">
                        @foreach($hijo->carreras as $carrera)
                        <li><a href="{{ route('web.detallecarrera', $carrera->id) }}">{{ $carrera->nombre }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
        <li class="has-droupdown">
            <a href="#">Infórmate Más</a>
            <ul class="submenu">
                @include('web.partials.menu-nav-links', ['section' => 'posgrado', 'context' => 'mobile'])
            </ul>
        </li>
    </ul>
</li>
<li class="has-droupdown"><a href="#">Innovación</a>
    <ul class="submenu">
        @include('web.partials.menu-nav-links', ['section' => 'innovacion', 'routesOnly' => false, 'context' => 'mobile'])
    </ul>
</li>
@include('web.partials.nav.servicios-mobile', ['navGroup' => (object) ['label' => 'Servicios']])
<li class="has-droupdown"><a href="#">Conócenos</a>
    <ul class="submenu">
        @include('web.partials.menu-nav-links', ['section' => 'conocenos', 'context' => 'mobile'])
    </ul>
</li>
<li class="has-droupdown"><a href="#">Contáctanos</a>
    <ul class="submenu">
        @include('web.partials.menu-nav-links', ['section' => 'contactanos', 'context' => 'mobile'])
    </ul>
</li>
<li class="has-droupdown">
    <a href="#">Nuestra Plataforma</a>
    <ul class="submenu">
        <li><a href="https://intranet.uprit.edu.pe/" target="_blank" rel="noopener">ERP</a></li>
        <li><a href="https://www.digitaliapublishing.com/" target="_blank" rel="noopener">Biblioteca Virtual</a></li>
        <li><a href="https://repositorio.uprit.edu.pe/" target="_blank" rel="noopener">Repositorio - ALICIA</a></li>
        <li><a href="https://moodle.uprit.edu.pe" target="_blank" rel="noopener">Aula Virtual</a></li>
    </ul>
</li>
<li><a href="{{ route('web.noticias') }}">Noticias</a></li>
<li><a href="{{ route('transparencia') }}">Transparencia</a></li>
<li>
    <button type="button" class="edu-btn btn-secondary d-flex align-items-center gap-2" data-postula-trigger style="color: white !important">
        <iconify-icon icon="mdi:pencil" style="font-size:20px"></iconify-icon>
        Postula Aquí
    </button>
</li>
