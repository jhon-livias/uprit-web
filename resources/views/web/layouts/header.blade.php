<header class="edu-header header-style-2">
    <div class="header-top-bar">
        <div class="container">
            <div class="header-top">
                <div class="header-top-left">
                    <ul class="header-info">
                        <li id="fecha"></li>
                        <li style="padding-right:0px"><iconify-icon icon="mdi:phone" style="font-size:14px; margin-top:5px"></iconify-icon></li>
                        <li style="padding-left:5px">Central telefónica: +51970597183</li>
                    </ul>
                </div>
                <div class="header-top-right">
                    <ul class="header-info sup-derecha">
                        <li class="raya"><a href="{{route('web.noticias')}}" class="hov-sup">Noticias</a></li>
                        <li class="raya"><a href="{{route('transparencia')}}" class="hov-sup">Transparecia</a></li>
                        <li class="submenu-platform menu-plataforma ">
                            <a href="#" class="hov-sup">
                                Nuestra Plataforma
                            </a>

                            <ul class="platform-dropdown">
                                <li style="padding-bottom: 0px;"><a href="#">ERP</a></li>
                                <li style="padding-bottom: 0px; padding-top: 5px;"><a href="#">Biblioteca Virtual</a></li>
                                <li style="padding-bottom: 0px; padding-top: 5px;"><a href="https://repositorio.uprit.edu.pe/">Repositorio - ALICIA</a></li>
                                <li style="padding-bottom: 0px; padding-top: 5px;"><a href="#">Bolsa de Trabajo</a></li>
                                <li style="padding-bottom: 0px; padding-top: 5px;"><a href="#">Correo Institucional</a></li>
                                <li style=" padding-top: 0px;"><a href="https://moodle.uprit.edu.pe/login/index.php">Aula Virtual</a></li>

                        </li>
                    </ul>
                    </li>
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
                        <a href="{{route('web.index')}}">
                            <img class="logo-light" src="{{asset('web/imagenes/logo_uprit_light.svg')}}" alt="Corporate Logo">
                            <img class="logo-dark" src="{{asset('web/imagenes/logo_uprit_light.svg')}}" alt="Corporate Logo">

                        </a>
                    </div>
                </div>
                <div class="header-mainnav">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li class="has-droupdown"><a href="#">Pregrado</a>
                                <ul class="mega-menu mega-menu-one">
                                    @foreach($pregradoCategorias as $categoria)
                                    <li>
                                        <h6 class="menu-title" style="color:#91001E">{{ $categoria->nombre }}</h6>
                                        <ul class="submenu mega-sub-menu mega-sub-menu-01">
                                            @foreach($categoria->carreras as $carrera)
                                            <li><a href="{{route('web.detallecarrera', $carrera->id)}}">{{ $carrera->nombre }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    <li>
                                        <h6 class="menu-title" style="color:#91001E">Infórmate Más</h6>
                                        <ul class="submenu mega-sub-menu mega-sub-menu-01">
                                            <li><a href="{{ route('convalidacion') }}">Convalidaciones / Traslados</a></li>
                                            <li><a href="{{ route('doble-grado') }}">Programas Doble Grado</a></li>
                                            <li><a href="{{ route('beca18') }}">Beca18</a></li>
                                            <li><a href="{{ route('intercambio-peru') }}">Tu intercambio en Perú</a></li>
                                            <li><a href="{{ route('taller-titulacion') }}">Taller de Titulación</a></li>
                                            <li><a href="{{ route('asesores') }}">Asesores de Admisión</a></li>

                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-droupdown"><a href="#">Pregrado Puede</a>
                                <ul class="mega-menu pre-puede">
                                    @foreach($pregradoPuedeCategorias as $categoria)
                                    <li>
                                        <h6 class="menu-title" style="color:#91001E">{{ $categoria->nombre }}</h6>
                                        <ul class="submenu mega-sub-menu mega-sub-menu-01">
                                            @foreach($categoria->carreras as $carrera)
                                            <li><a href="{{route('web.detallecarrera', $carrera->id)}}">{{ $carrera->nombre }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    <li>
                                        <h6 class="menu-title" style="color:#91001E">Infórmate Más</h6>
                                        <ul class="submenu mega-sub-menu mega-sub-menu-01">
                                            <li><a href="{{ route('convalidacion') }}">Convalidaciones / Traslados</a></li>
                                            <li><a href="{{ route('doble-grado') }}">Programas Doble Grado</a></li>
                                            <li><a href="{{ route('beca18') }}">Beca18</a></li>
                                            <li><a href="{{ route('intercambio-peru') }}">Tu intercambio en Perú</a></li>
                                            <li><a href="{{ route('taller-titulacion') }}">Taller de Titulación</a></li>
                                            <li><a href="{{ route('asesores') }}">Asesores de Admisión</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-droupdown mega-posgrado">
                                <a href="#">Posgrado</a>

                                <div class="mega-posgrado-wrapper">

                                    <div class="mega-categorias">
                                        @foreach($posgradoCategorias as $index => $categoria)

                                        <button class="cat-btn {{ $index == 0 ? 'active' : '' }}"
                                            data-target="cat-{{ $categoria->id }}">
                                            {{ $categoria->nombre }}
                                        </button>

                                        @endforeach

                                        <button class="cat-btn"
                                            data-target="informes">
                                            Infórmate Más
                                        </button>

                                    </div>

                                    <div class="mega-contenido">
                                        @foreach($posgradoCategorias as $index => $categoria)
                                        <div class="mega-box {{ $index == 0 ? 'active' : '' }}" id="cat-{{ $categoria->id }}">
                                            @foreach($categoria->hijos as $hijo)
                                            <div class="mega-col">
                                                <h6 class="menu-title">{{ $hijo->nombre }}</h6>

                                                <ul class="content-lista">
                                                    @foreach($hijo->carreras as $carrera)
                                                    <li>
                                                        <a href="{{route('web.detallecarrera', $carrera->id)}}">
                                                            {{ $carrera->nombre }}
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endforeach

                                        </div>
                                        @endforeach

                                        <div class="mega-box" id="informes">

                                            <div class="mega-col">

                                                <ul class="content-lista">
                                                    <li><a href="{{ route('escuela-posgrado') }}">UGS Escuela de Posgrado</a></li>
                                                    <li><a href="{{ route('posgrado-doble') }}">Programas Doble Grado</a></li>  
                                                    <li><a href="{{ route('mision-academica') }}">Misiones Académicas Internacionales</a></li>
                                                    <li><a href="{{ route('vive') }}">Vive nuestros Másteres y Doctorados</a></li>
                                                    <li><a href="{{ route('asesores') }}">Asesores de Admisión</a></li>
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
                                            <li><a href="{{ route('web.noticias') }}">Uprit Exprets - Blog</a></li>
                                            <li><a href="{{ route('direccion') }}">Dirección de Investigación</a></li>
                                            <li><a href="{{ route('centro_investigacion') }}">Centro de Investigación</a></li>
                                            <li><a href="#">Servicios para Empresas</a></li>
                                            <li><a href="https://drive.google.com/drive/folders/136MRdt_fKaUNK7kLVfmbnlR863c7Ox8E" target="_blank">Reglamentos de Investigación</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-droupdown"><a href="#">Servicios</a>
                                <ul class="mega-menu servicios">
                                    <li>

                                        <ul class="submenu mega-sub-menu mega-sub-menu-01">
                                            <li><a href="{{ route('soporte') }}">Uprit Data: Soporte Técnico</a></li>
                                            <li><a href="{{ route('salud') }}">Servicios Psicopedagógicos y Salud</a></li>
                                            <li><a href="{{ route('futbol') }}">Espacios y Servicios Deportivos</a></li>
                                            <li><a href="{{ route('talleres') }}">Talleres y Servicios Culturales</a></li>
                                            <li><a href="{{ route('becas') }}">Becas y Ayudas Financieras</a></li>
                                            <li><a href="{{ route('honors') }}">Honors College</a></li>
                                            <li><a href="{{ route('global') }}">Uprit Global/Internacional</a></li>
                                            <li><a href="{{ route('alumni') }}">Alumni - Red de Egresados</a></li>
                                            <li><a href="{{ route('programa') }}">Programa VIVE Emprededor</a></li>
                                            <li><a href="#">Uprit Store</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-droupdown"><a href="#">Conócenos</a>
                                <ul class="mega-menu conocenos">
                                    <li>

                                        <ul class="submenu mega-sub-menu mega-sub-menu-01">
                                            <li><a href="{{ route('porque') }}">¿Por qué Estudiar en la Uprit?</a></li>
                                            <li><a href="{{ route('modelo-educativo') }}">Modelo Educativo: Método L4P</a></li>  
                                            <li><a href="{{ route('autoridades') }}">Nuestras autoridades</a></li> 
                                            <li><a href="{{ route('red-nexo') }}">Nuestra Red Nexo Uprit</a></li>
                                            <li><a href="{{ route('a2iprograma') }}">A2i Programa Aceleración hacia la industria</a></li>  
                                            <li><a href="{{ route('defensoria') }}">Defensoría Universitaria</a></li> 
                                            <li><a href="{{ route('medioambiental') }}">Política Medioambiental (S.S.O.M.A)</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-droupdown boton-li">
                                <button class="edu-btn btn-secondary d-flex align-items-center gap-2">
                                    <iconify-icon icon="mdi:pencil" style="font-size:20px"></iconify-icon>
                                    Postula Aquí
                                </button>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <ul class="header-action">

                        <li class="mobile-menu-bar d-block d-xl-none">
                            <button class="hamberger-button">
                                <i class="icon-54"></i>
                            </button>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="popup-mobile-menu">
        <div class="inner">
            <div class="header-top">
                <div class="logo">
                    <a href="{{route('web.index')}}">
                        <img class="logo-light" src="{{asset('web/imagenes/logo_uprit_light.svg')}}" alt="Corporate Logo">
                        <img class="logo-dark" src="{{asset('web/imagenes/logo_uprit_light.svg')}}" alt="Corporate Logo">
                    </a>
                </div>
                <div class="close-menu">
                    <button class="close-button">
                        <i class="icon-73"></i>
                    </button>
                </div>
            </div>
            <ul class="mainmenu">
                <li class="has-droupdown"><a href="#">Pregrado</a>
                    <ul class="submenu">

                        @foreach($pregradoCategorias as $categoria)
                        <li class="has-droupdown">
                            <a href="#">{{ $categoria->nombre }}</a>

                            <ul class="submenu">
                                @foreach($categoria->carreras as $carrera)
                                <li><a href="{{route('web.detallecarrera', $carrera->id)}}">{{ $carrera->nombre }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach

                        <li class="has-droupdown">
                            <a href="#">Infórmate Más</a>

                            <ul class="submenu">
                                <li><a href="#">Convalidaciones / Traslados</a></li>
                                <li><a href="#">Programas Doble Grado</a></li>
                                <li><a href="#">Beca18</a></li>
                                <li><a href="#">Tu intercambio en Perú</a></li>
                                <li><a href="#">Taller de Titulación</a></li>
                                <li><a href="#">Vive Previamente Nuestras Carreras</a></li>
                                <li><a href="#">Prospecto de Admisión</a></li>
                                <li><a href="#">Resultados Admisión</a></li>
                                <li><a href="#">Asesores de Admisión</a></li>
                                <li><a href="#">Registra Amigo Referido</a></li>
                                <li><a href="#">Prematricúlate</a></li>
                            </ul>
                        </li>


                    </ul>

                </li>
                <li class="has-droupdown">
                    <a href="#">Pregrado Puede</a>
                    <ul class="submenu">

                        @foreach($pregradoPuedeCategorias as $categoria)
                        <li class="has-droupdown">
                            <a href="#">{{ $categoria->nombre }}</a>

                            <ul class="submenu">
                                @foreach($categoria->carreras as $carrera)
                                <li><a href="{{route('web.detallecarrera', $carrera->id)}}">{{ $carrera->nombre }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach

                        <li class="has-droupdown">
                            <a href="#">Infórmate Más</a>

                            <ul class="submenu">
                                <li><a href="#">Vive Previamente Nuestras Carreras</a></li>
                                <li><a href="#">Prospecto de Admisión</a></li>
                                <li><a href="#">Resultados Admisión</a></li>
                                <li><a href="#">Asesores de Admisión</a></li>
                                <li><a href="#">Registra Amigo Referido</a></li>
                                <li><a href="#">Prematricúlate</a></li>
                                <li><a href="#">Segunda Carrera profesional</a></li>
                            </ul>
                        </li>


                    </ul>

                </li>

                <li class="has-droupdown">
                    <a href="#">Posgrado</a>

                    <ul class="submenu">

                        @foreach($posgradoCategorias as $index => $categoria)
                        <li class="has-droupdown">

                            <a href="#">{{$categoria->nombre}}</a>

                            <ul class="submenu">
                                @foreach($categoria->hijos as $hijo)
                                <li class="has-droupdown">
                                    <a href="#">{{ $hijo->nombre }}</a>

                                    <ul class="submenu">
                                        @foreach($hijo->carreras as $carrera)
                                        <li>
                                            <a href="{{route('web.detallecarrera', $carrera->id)}}">
                                                {{ $carrera->nombre }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach

                            </ul>
                        </li>
                        @endforeach

                        <!-- INFORMES -->
                        <li class="has-droupdown">
                            <a href="#">Infórmate Más</a>

                            <ul class="submenu">
                                <li><a href="#">UGS Escuela de Posgrado</a></li>
                                <li><a href="#">Programas Doble Grado</a></li>
                                <li><a href="#">Misiones Académicas Internacionales</a></li>
                                <li><a href="#">Vive nuestros Másteres y Doctorados</a></li>
                                <li><a href="#">Asesores de Admisión</a></li>
                                <li><a href="#">Registra Amigo Referido</a></li>
                                <li><a href="#">Prematricúlate</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li><a href="#">Innovación</a></li>
                <li class="has-droupdown"><a href="#">Servicios</a>
                    <ul class="submenu">
                        <li><a href="{{ route('soporte') }}">Uprit Data: Soporte Técnico</a></li>
                        <li><a href="{{ route('salud') }}">Servicios Psicopedagógicos y Salud</a></li>
                        <li><a href="{{ route('futbol') }}">Espacios y Servicios Deportivos</a></li>
                        <li><a href="{{ route('talleres') }}">Talleres y Servicios Culturales</a></li>
                        <li><a href="{{ route('becas') }}">Becas y Ayudas Financieras</a></li>
                        <li><a href="{{ route('honors') }}">Honors College</a></li>
                        <li><a href="{{ route('global') }}">Uprit Global/Internacional</a></li>
                        <li><a href="{{ route('alumni') }}">Alumni - Red de Egresados</a></li>
                        <li><a href="{{ route('programa') }}">Programa VIVE Emprededor</a></li>
                        <li><a href="#">Uprit Store</a></li>
                    </ul>
                </li>
                <li class="has-droupdown"><a href="#">Conócenos</a>
                    <ul class="submenu">
                        <li><a href="#">¿Por qué Estudiar en la Uprit?</a></li>
                        <li><a href="#">Modelo Educativo: Método L4P</a></li>
                        <li><a href="#">Nuestras autoridades</a></li>
                        <li><a href="#">Nuestra Red Nexo Uprit</a></li>
                        <li><a href="#">A2i Programa Aceleración hacia la industria</a></li>
                        <li><a href="#">Defensoría Universitaria</a></li>
                        <li><a href="#">Política Medioambiental (S.S.O.M.A)</a></li>
                        <li><a href="#">Convenios y Afiliaciones</a></li>
                        <li><a href="#">Acceso a la Información Pública</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('web.noticias') }}">Noticias</a></li>
                <li><a href="{{route('transparencia')}}">Transparencia</a></li>
                <li>
                    <button class="edu-btn btn-secondary d-flex align-items-center gap-2">
                        <iconify-icon icon="mdi:pencil" style="font-size:20px"></iconify-icon>
                        Postula Aquí
                    </button>
                </li>
            </ul>
        </div>
    </div>

</header>