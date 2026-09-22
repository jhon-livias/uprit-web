@extends('web.layouts.principal')
@php $title = 'Biblioteca Virtual'; @endphp
@section('content')
@include('web.partials.breadcrumb')

<section class="edu-section-gap privacy-policy-area">
    <div class="container">

        {{-- Hero intro --}}
        <div class="row justify-content-center mb--60">
            <div class="col-lg-8 text-center">
                <h3 class="title mb--20">Accede a Digitalia Hispánica</h3>
                <p class="description">
                    La UPRIT pone a tu disposición <strong>Digitalia Hispánica</strong>, una de las bibliotecas virtuales
                    más grandes en español, con miles de libros académicos, revistas y recursos científicos. El acceso es
                    <strong>gratuito</strong> para toda la comunidad universitaria y se realiza a través del Aula Virtual.
                </p>
                <a href="https://moodle.uprit.edu.pe" target="_blank" rel="noopener" class="edu-btn btn-medium mt--20">
                    Ir al Aula Virtual &nbsp;<i class="icon-arrow-right-line-right"></i>
                </a>
            </div>
        </div>

        {{-- Logo de Digitalia con logo UPRIT --}}
        <div class="row justify-content-center mb--60">
            <div class="col-lg-10">
                <div class="d-flex align-items-center justify-content-center gap-5 flex-wrap"
                     style="background:#f8f9fa; border-radius:16px; padding:32px 40px;">
                    <img src="{{ asset('web/imagenes/logo_uprit_dark.svg') }}" alt="Logo UPRIT" style="height:64px;">
                    <div style="width:2px; height:48px; background:#dee2e6;"></div>
                    <div class="text-center">
                        <p class="mb-0" style="font-size:13px; color:#6c757d; letter-spacing:1px; text-transform:uppercase;">Recurso Institucional</p>
                        <p class="mb-0 fw-bold" style="font-size:15px; color:#212529;">Digitalia Hispánica para UPRIT</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pasos --}}
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h4 class="title mb--40 text-center">Paso a paso: ¿Cómo acceder?</h4>

                {{-- Paso 1 --}}
                <div class="row align-items-center mb--60">
                    <div class="col-lg-2 col-md-2 text-center mb-4 mb-md-0">
                        <div style="width:64px; height:64px; background:var(--color-primary); border-radius:50%;
                                    display:flex; align-items:center; justify-content:center; margin:0 auto;">
                            <span style="color:#fff; font-size:28px; font-weight:700;">1</span>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <h5 class="mb-2">Ingresa al Aula Virtual UPRIT</h5>
                        <p class="mb-2">
                            Ve a <a href="https://moodle.uprit.edu.pe" target="_blank" rel="noopener" class="color-primary fw-bold">moodle.uprit.edu.pe</a>
                            e inicia sesión con tu correo institucional UPRIT y tu contraseña.
                        </p>
                        <div class="notice-board mt--10" style="border-left:4px solid var(--color-primary); padding:12px 18px; background:#fff8f5; border-radius:0 8px 8px 0;">
                            <p class="mb-0" style="font-size:14px;">
                                <iconify-icon icon="mdi:information-outline" style="font-size:16px; vertical-align:middle;"></iconify-icon>
                                &nbsp;Usa tus credenciales institucionales UPRIT (ej.&nbsp;<code>nombre.apellido@uprit.edu.pe</code>).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="separator separator-dashed mb--60"></div>

                {{-- Paso 2 --}}
                <div class="row align-items-center mb--60">
                    <div class="col-lg-2 col-md-2 text-center mb-4 mb-md-0">
                        <div style="width:64px; height:64px; background:var(--color-secondary); border-radius:50%;
                                    display:flex; align-items:center; justify-content:center; margin:0 auto;">
                            <span style="color:#fff; font-size:28px; font-weight:700;">2</span>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <h5 class="mb-2">Busca la opción <strong>"Biblioteca"</strong> en el menú principal</h5>
                        <p class="mb-0">
                            Una vez dentro del dashboard, en la barra de navegación superior encontrarás la opción
                            <strong>Biblioteca</strong>. Haz clic en ella.
                        </p>
                    </div>
                </div>

                <div class="separator separator-dashed mb--60"></div>

                {{-- Paso 3 --}}
                <div class="row align-items-center mb--60">
                    <div class="col-lg-2 col-md-2 text-center mb-4 mb-md-0">
                        <div style="width:64px; height:64px; background:var(--color-extra02); border-radius:50%;
                                    display:flex; align-items:center; justify-content:center; margin:0 auto;">
                            <span style="color:#fff; font-size:28px; font-weight:700;">3</span>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <h5 class="mb-2">Haz clic en <strong>"Acceder al recurso"</strong></h5>
                        <p class="mb-2">
                            Dentro de la sección Biblioteca encontrarás el recurso <strong>Digitalia Hispánica — Biblioteca Virtual</strong>.
                            Presiona el botón <strong>"Acceder al recurso"</strong> y serás redirigido automáticamente.
                        </p>
                        <div class="notice-board mt--10" style="border-left:4px solid #28a745; padding:12px 18px; background:#f0fff4; border-radius:0 8px 8px 0;">
                            <p class="mb-0" style="font-size:14px;">
                                <iconify-icon icon="mdi:check-circle-outline" style="font-size:16px; vertical-align:middle; color:#28a745;"></iconify-icon>
                                &nbsp;No necesitas crear una cuenta adicional. El sistema te autenticará automáticamente como miembro de la UPRIT.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="separator separator-dashed mb--60"></div>

                {{-- Paso 4 --}}
                <div class="row align-items-center mb--60">
                    <div class="col-lg-2 col-md-2 text-center mb-4 mb-md-0">
                        <div style="width:64px; height:64px; background:#c82034; border-radius:50%;
                                    display:flex; align-items:center; justify-content:center; margin:0 auto;">
                            <span style="color:#fff; font-size:28px; font-weight:700;">4</span>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <h5 class="mb-2">¡Ya estás dentro de Digitalia con el logo de la UPRIT!</h5>
                        <p class="mb-2">
                            Serás redirigido a <strong>digitaliapublishing.com</strong>. Notarás que en la esquina
                            superior derecha aparece el <strong>logo de la Universidad Privada de Trujillo (UPRIT)</strong>,
                            lo que confirma que estás accediendo como miembro institucional con acceso completo a todos los recursos.
                        </p>
                        <div class="notice-board mt--10" style="border-left:4px solid #c82034; padding:12px 18px; background:#fff5f5; border-radius:0 8px 8px 0;">
                            <p class="mb-0" style="font-size:14px;">
                                <iconify-icon icon="mdi:school-outline" style="font-size:16px; vertical-align:middle; color:#c82034;"></iconify-icon>
                                &nbsp;El logo de la UPRIT en Digitalia indica que tienes acceso institucional completo. Si no ves el logo, vuelve al Moodle y repite desde el paso 3.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- CTA final --}}
        <div class="row justify-content-center mt--20">
            <div class="col-lg-8 text-center">
                <div style="background: linear-gradient(135deg, #c82034 0%, #8b0000 100%); border-radius:16px; padding:48px 32px; color:#fff;">
                    <h4 class="mb--16" style="color:#fff;">¿Listo para explorar miles de libros?</h4>
                    <p class="mb--24" style="color:rgba(255,255,255,0.85);">
                        Accede ahora al Aula Virtual y descubre el universo académico que la UPRIT pone a tu disposición.
                    </p>
                    <a href="https://moodle.uprit.edu.pe" target="_blank" rel="noopener"
                       style="background:#fff; color:#c82034; padding:14px 36px; border-radius:8px; font-weight:700; font-size:16px; text-decoration:none; display:inline-block;">
                        <iconify-icon icon="mdi:open-in-new" style="vertical-align:middle; margin-right:6px;"></iconify-icon>
                        Ir al Aula Virtual
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
