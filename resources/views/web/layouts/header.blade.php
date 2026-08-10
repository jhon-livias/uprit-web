<header class="edu-header header-style-2">
    <div class="header-top-bar">
        <div class="container">
            <div class="header-top">
                <div class="header-top-left">
                    <ul class="header-info">
                        <li id="fecha"></li>
                        <li style="padding-right:0px"><iconify-icon icon="mdi:phone" style="font-size:14px; margin-top:5px"></iconify-icon></li>
                        <li style="padding-left:5px">Central telefónica: +51933248429</li>
                    </ul>
                </div>
                <div class="header-top-right">
                    <ul class="header-info sup-derecha">
                        @if(\App\Support\SiteNavigation::hasDbNav())
                            @include('web.partials.nav.topbar-desktop')
                        @else
                            <li class="raya"><a href="{{ route('web.noticias') }}" class="hov-sup">Noticias</a></li>
                            <li class="raya"><a href="{{ route('transparencia') }}" class="hov-sup">Transparencia</a></li>
                            <li class="submenu-platform menu-plataforma">
                                <a href="#" class="hov-sup">Nuestra Plataforma</a>
                                <ul class="platform-dropdown">
                                    <li style="padding-bottom: 0px;"><a href="https://intranet.uprit.edu.pe/" target="_blank" rel="noopener">ERP</a></li>
                                    <li style="padding-bottom: 0px; padding-top: 5px;"><a href="https://www.digitaliapublishing.com/" target="_blank" rel="noopener">Biblioteca Virtual</a></li>
                                    <li style="padding-bottom: 0px; padding-top: 5px;"><a href="https://repositorio.uprit.edu.pe/" target="_blank" rel="noopener">Repositorio - ALICIA</a></li>
                                    <li style="padding-top: 0px;"><a href="https://moodle.uprit.edu.pe" target="_blank" rel="noopener">Aula Virtual</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="edu-sticky-placeholder"></div>
    <div class="header-mainmenu">
        <div class="container header-nuevo-der">
            <div class="header-navbar mar-cab">
                <div class="header-brand">
                    <div class="logo">
                        <a href="{{ route('web.index') }}">
                            <img class="logo-light" src="{{ asset('web/imagenes/logo_uprit_light.svg') }}" alt="Corporate Logo">
                            <img class="logo-dark" src="{{ asset('web/imagenes/logo_uprit_light.svg') }}" alt="Corporate Logo">
                        </a>
                    </div>
                </div>
                <div class="header-mainnav">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            @if(\App\Support\SiteNavigation::hasDbNav())
                                @include('web.partials.nav.main-desktop')
                            @else
                                {{-- Fallback legacy hasta ejecutar nav:import-legacy --}}
                                @include('web.partials.nav.legacy-desktop')
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <ul class="header-action">
                        <li class="mobile-menu-bar d-block d-xl-none">
                            <button type="button" class="hamberger-button" aria-label="Abrir menú de navegación" aria-expanded="false" aria-controls="mobile-navigation">
                                <iconify-icon icon="mdi:menu" aria-hidden="true"></iconify-icon>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-mobile-menu" id="mobile-navigation" aria-hidden="true">
        <div class="inner">
            <div class="header-top">
                <div class="logo">
                    <a href="{{ route('web.index') }}">
                        <img class="logo-light" src="{{ asset('web/imagenes/logo_uprit_light.svg') }}" alt="UPRIT">
                        <img class="logo-dark" src="{{ asset('web/imagenes/logo_uprit_light.svg') }}" alt="UPRIT">
                    </a>
                </div>
                <div class="close-menu">
                    <button type="button" class="close-button" aria-label="Cerrar menú de navegación">
                        <iconify-icon icon="mdi:close" aria-hidden="true"></iconify-icon>
                    </button>
                </div>
            </div>
            <ul class="mainmenu">
                @if(\App\Support\SiteNavigation::hasDbNav())
                    @include('web.partials.nav.main-mobile')
                    @include('web.partials.nav.topbar-mobile')
                @else
                    @include('web.partials.nav.legacy-mobile')
                @endif
            </ul>
        </div>
    </div>
</header>
