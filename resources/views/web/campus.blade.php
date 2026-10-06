@extends('web.layouts.principal')
@section('content')

@include('web.partials.breadcrumb')

<section class="campus-area py-5" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="container">
        <!-- Introducción -->
        <div class="text-center mb-5" style="margin-bottom: 50px;">
            <h2 style="font-weight: 700; color: #a30f25; font-size: 36px; margin-bottom: 20px;">Conoce el Campus UPRIT</h2>
            <p style="font-size: 18px; color: #555; max-width: 800px; margin: 0 auto;">Un entorno moderno y seguro, diseñado para inspirar tu aprendizaje y potenciar tu desarrollo profesional en la ciudad de Trujillo.</p>
        </div>

        <!-- Galería de Instalaciones -->
        <div class="row g-4 mb-5" style="margin-bottom: 50px;">
            <div class="col-lg-4 col-md-6" style="margin-bottom: 30px;">
                <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); height: 100%;">
                    <div style="height: 200px; background: #f4f6f9; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-test-tube-line" style="font-size: 4rem; color: #a30f25;"></i>
                    </div>
                    <div style="padding: 25px; text-align: center;">
                        <h4 style="font-weight: 700; font-size: 20px; margin-bottom: 10px;">Laboratorios Modernos</h4>
                        <p style="color: #666; margin: 0;">Equipados con tecnología de punta para potenciar la práctica en ciencias, ingeniería y tecnología.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" style="margin-bottom: 30px;">
                <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); height: 100%;">
                    <div style="height: 200px; background: #f4f6f9; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-book-open-line" style="font-size: 4rem; color: #a30f25;"></i>
                    </div>
                    <div style="padding: 25px; text-align: center;">
                        <h4 style="font-weight: 700; font-size: 20px; margin-bottom: 10px;">Biblioteca Central</h4>
                        <p style="color: #666; margin: 0;">Espacios diseñados para la concentración y el estudio, con acceso a recursos físicos y virtuales.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" style="margin-bottom: 30px;">
                <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); height: 100%;">
                    <div style="height: 200px; background: #f4f6f9; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-team-line" style="font-size: 4rem; color: #a30f25;"></i>
                    </div>
                    <div style="padding: 25px; text-align: center;">
                        <h4 style="font-weight: 700; font-size: 20px; margin-bottom: 10px;">Zonas de Recreación</h4>
                        <p style="color: #666; margin: 0;">Cafetería, áreas verdes y espacios deportivos para que compartas y te relajes entre clases.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ubicación y Mapa -->
        <div class="row align-items-center" style="background: #f8f9fa; border-radius: 20px; padding: 40px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <div class="col-lg-5" style="margin-bottom: 30px;">
                <h3 style="font-weight: 700; color: #a30f25; margin-bottom: 20px;">Ubicación Estratégica</h3>
                <p style="font-size: 16px; margin-bottom: 15px;">
                    <i class="ri-map-pin-line" style="color: #e50000; font-size: 20px; vertical-align: middle;"></i> 
                    <strong>Dirección:</strong> Av. Industrial Km. 04, Mz. Z′ Lote Resultante 1A, Urb. Semirústica El Bosque (Espalda de Sedalib), Trujillo - La Libertad, Perú
                </p>
                <p style="font-size: 16px; color: #555; margin-bottom: 30px;">
                    Nuestras puertas están siempre abiertas. Contamos con estacionamiento, seguridad 24/7 y fácil acceso a las principales líneas de transporte de la ciudad.
                </p>
                <a href="https://wa.me/51933253400?text=Hola,%20me%20gustar%C3%ADa%20agendar%20una%20visita%20guiada%20al%20campus%20UPRIT" target="_blank" style="display: inline-block; background: #a30f25; color: #fff; padding: 12px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; transition: 0.3s;">
                    <i class="ri-calendar-check-line" style="vertical-align: middle;"></i> Agendar una Visita
                </a>
            </div>
            <div class="col-lg-7">
                <div style="border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <!-- Mismo iframe de Google Maps que usan actualmente -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.9369592498533!2d-78.9954189077685!3d-8.107901804488558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad164907601117%3A0x1555065496eeda11!2sUniversidad%20Privada%20de%20Trujillo%20-%20UPRIT!5e0!3m2!1ses-419!2spe!4v1791232299586!5m2!1ses-419!2spe" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
