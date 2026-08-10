@include('web.partials.nav.legacy-pregrado-desktop')
<li class="has-droupdown mega-posgrado">
    <a href="#">Posgrado</a>
    <div class="mega-posgrado-wrapper mega-tabs-wrapper">
        <div class="mega-categorias" role="tablist" aria-label="Posgrado">
            @foreach($posgradoCategorias as $index => $categoria)
            <button type="button" class="cat-btn {{ $index == 0 ? 'active' : '' }}" data-target="cat-{{ $categoria->id }}" role="tab" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $categoria->nombre }}</button>
            @endforeach
            <button type="button" class="cat-btn" data-target="informes" role="tab" aria-selected="false">Infórmate Más</button>
        </div>
        <div class="mega-contenido">
            @foreach($posgradoCategorias as $index => $categoria)
            <div class="mega-box {{ $index == 0 ? 'active' : '' }}" id="cat-{{ $categoria->id }}" role="tabpanel">
                @foreach($categoria->hijos as $hijo)
                <div class="mega-col">
                    <h6 class="menu-title">{{ $hijo->nombre }}</h6>
                    <ul class="content-lista">
                        @foreach($hijo->carreras as $carrera)
                        <li><a href="{{ route('web.detallecarrera', $carrera->id) }}">{{ $carrera->nombre }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
            @endforeach
            <div class="mega-box" id="informes" role="tabpanel">
                <div class="mega-col">
                    <ul class="content-lista">
                        @include('web.partials.menu-nav-links', ['section' => 'posgrado'])
                    </ul>
                </div>
            </div>
        </div>
    </div>
</li>
<li class="has-droupdown"><a href="#">Innovación</a>
    <ul class="mega-menu servicios">
        <li>
            <ul class="submenu mega-sub-menu mega-sub-menu-01">
                @include('web.partials.menu-nav-links', ['section' => 'innovacion', 'routesOnly' => false])
            </ul>
        </li>
    </ul>
</li>
<li class="has-droupdown"><a href="#">Servicios</a>
    <ul class="mega-menu servicios">
        <li>
            <ul class="submenu mega-sub-menu mega-sub-menu-01">
                @include('web.partials.menu-nav-links', ['section' => 'servicios'])
            </ul>
        </li>
    </ul>
</li>
<li class="has-droupdown"><a href="#">Conócenos</a>
    <ul class="mega-menu conocenos">
        <li>
            <ul class="submenu mega-sub-menu mega-sub-menu-01">
                @include('web.partials.menu-nav-links', ['section' => 'conocenos'])
            </ul>
        </li>
    </ul>
</li>
<li class="has-droupdown"><a href="#">Contáctanos</a>
    <ul class="mega-menu servicios">
        <li>
            <ul class="submenu mega-sub-menu mega-sub-menu-01">
                @include('web.partials.menu-nav-links', ['section' => 'contactanos'])
            </ul>
        </li>
    </ul>
</li>
<li class="has-droupdown boton-li">
    <button type="button" class="edu-btn btn-secondary d-flex align-items-center gap-2" data-postula-trigger>
        <iconify-icon icon="mdi:pencil" style="font-size:20px"></iconify-icon>
        Postula Aquí
    </button>
</li>
