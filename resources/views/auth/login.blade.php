<!doctype html>
<html lang="es">

<head>
    <title>UPRIT</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


    <link rel="icon" href="{{asset('web/imagenes/favicon.png')}}" type="image/x-icon">
    <!-- VENDOR CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <link href="{{ asset('admin/demo/vendors.bundle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/demo/style.bundle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>


</head>

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin"
            id="m_login">
            <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside" style="background: #91001E;">
                <div class="m-stack m-stack--hor m-stack--desktop">
                    <div class="m-stack__item m-stack__item--fluid">
                        <div class="m-login__wrapper">
                            <div class="m-login__logo">
                                <a href="#">
                                    <img src="{{ asset('admin/demo/logo_uprit_light.svg') }}" alt="" />
                                </a>
                            </div>
                            <div class="m-login__signin">
                                <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="m-login__head">
                                        <h3 class="m-login__title" style="color: #fff;">
                                            Ingresa a tu cuenta
                                        </h3>
                                    </div>
                                    <br>

                                    <div class="form-group m-form__group ">
                                        <input class="form-control m-input @error('email') is-invalid @enderror" type="text"
                                            style="padding: 12px 20px;border-radius: 5px;" placeholder="Usuario"
                                            name="email"
                                            required autofocus>

                                    </div>
                                    <div class="form-group m-form__group ">
                                        <input class="form-control m-input m-login__form-input--last @error('password') is-invalid @enderror"
                                            style=" padding: 12px 20px;border-radius: 5px;margin-top: 5%;"
                                            type="password" placeholder="Contraseña" name="password" autocomplete="current-password" required>
                                        @if ($errors->has('password'))
                                        <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show"
                                            style="margin-top: 5%;" role="alert">
                                            <div class="m-alert__icon">
                                                <i class="fas fa-exclamation-triangle"></i>
                                                <span></span>
                                            </div>
                                            <div class="m-alert__text">
                                                <strong>
                                                    Los Datos son Incorrectos
                                                </strong>

                                            </div>
                                            <div class="m-alert__close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($errors->has('email'))
                                        <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show"
                                            style="margin-top: 5%;" role="alert">
                                            <div class="m-alert__icon">
                                                <i class="fas fa-exclamation-triangle"></i>
                                                <span></span>
                                            </div>
                                            <div class="m-alert__text">
                                                <strong>
                                                    Los Datos son Incorrectos
                                                </strong>

                                            </div>
                                            <div class="m-alert__close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="row m-login__form-sub">
                                        {{-- <div class="col m--align-left">
                                            <label class="m-checkbox m-checkbox--focus">
                                                <input type="checkbox" name="remember"> Recuérdame
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col m--align-right">
                                            <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                                Contraseña olvidada ?
                                            </a>
                                        </div>--}}
                                    </div>
                                    <div class="m-login__form-action">
                                        <button type="submit"
                                            class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air" style="background-color: #EE4A62 !important;border-color: #EE4A62 !important;border-radius: 5px !important;">
                                            Ingresar
                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                    <div class="m-stack__item m-stack__item--center">
                        <span class="m-footer__copyright" style="color:#fff;">
                            2018 a la actualidad &copy; UNIVERSIDAD PRIVADA DE TRUJILLO
                            <span>DESARROLLADO POR :
                                <a href="http://pyrusstudio.com" style="color:#fff;" title="Pyrus Studio" target="_blank">WWW.PYRUSSTUDIO.COM</a>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor 
            m-grid__item--order-tablet-and-mobile-1 m-login__content"

                style="
        background-image: url('{{ asset('admin/demo/blo.avif') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    ">
            </div>
        </div>
    </div>






    <script src="{{ asset('admin/demo/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/demo/scripts.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/demo/login.js') }}" type="text/javascript"></script>

</body>

</html>