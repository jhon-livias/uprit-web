<div id="left-sidebar" class="sidebar" style="left:0px;background-color:#20272F;">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{asset('admin/demo/user4.jpg')}}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span style="color:#fff">Bienvenido,</span><br>
                <strong style="color:#fff"> {{ Auth::user()->name }} </strong>

            </div>
            <hr>

        </div>
        
        

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0" style="padding:0px;">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">

                    <ul id="main-menu" class="metismenu">
                        <li id="sliders">
                            <a href="{{ route('sliders.index') }}"><i class="icon-picture"></i>
                                <span>Sliders</span></a>
                        </li>
                        <li id="sliderscarrera">
                            <a href="{{ route('sliderscarrera.index') }}"><i class="icon-picture"></i>
                                <span>Sliders Carrera</span></a>
                        </li>
                        <li id="testimonios">
                            <a href="{{ route('testimonios.index') }}"><i class="icon-bubbles"></i>
                                <span>Testimonios</span></a>
                        </li>
                        <li id="noticias">
                            <a href="{{ route('noticias.index') }}"><i class="fa fa-newspaper-o"></i>
                                <span>Noticias</span></a>
                        </li>
                        <li id="reclamos">
                            <a href="{{ route('reclamos.index') }}"><i class="fa fa-file-text-o"></i>
                                <span>Reclamos</span></a>
                        </li>
                        <li id="niveles">
                            <a href="{{ route('niveles.index') }}"><i class="icon-graduation"></i>
                                <span>Niveles Académicos</span></a>
                        </li>
                        <li id="categorias">
                            <a href="{{ route('categorias.index') }}"><i class="icon-tag"></i>
                                <span>Categorías</span></a>
                        </li>
                        <li id="carreras">
                            <a href="{{ route('carreras.index') }}"><i class="icon-briefcase"></i>
                                <span>Carreras</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
            
        </div>
    </div>
</div>






