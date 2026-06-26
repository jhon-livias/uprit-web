<nav class="navbar navbar-fixed-top" style="background-color: #91001E;top:0px; border-bottom: 10px solid #91001E !important;">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>

        <div class="navbar-brand">
            <a href="{{ route('admin.home') }}">
                <img src="{{ asset('admin/demo/logo_uprit_light.svg') }}"
                    style="width:90%;">
            </a>
        </div>

        <div class="navbar-right">
            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a title="Inicio" href="{{ route('admin.home') }}" class="icon-menu"><i class="icon-home" style="color: #fff"></i></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="icon-menu"><i class="icon-login" style="color: #fff"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>