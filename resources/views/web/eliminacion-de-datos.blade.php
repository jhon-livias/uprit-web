@extends('web.layouts.principal')
@section('content')

@include('web.partials.breadcrumb')

<section class="privacy-area py-5" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="privacy-content" style="background: #fff; border-radius: 15px; padding: 40px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                    <h2 style="font-weight: 700; color: #a30f25; margin-bottom: 30px;">Eliminación de Datos</h2>

                    <div style="font-size: 16px; color: #555; line-height: 1.8;">
                        <p style="color: #555; font-size: 16px; line-height: 1.8; margin-bottom: 15px; text-align: justify;">Para solicitar la eliminación de sus datos recolectados a través de nuestra integración con plataformas Meta (Facebook, Instagram, WhatsApp), siga estas instrucciones:</p>
                        
                        <p style="color: #555; font-size: 16px; line-height: 1.8; margin-bottom: 15px; text-align: justify;">Envíe un correo electrónico a <strong>defensoriauniversitaria@uprit.edu.pe</strong> con el asunto: "Solicitud de Eliminación de Datos"</p>
                        
                        <p style="color: #555; font-size: 16px; line-height: 1.8; margin-bottom: 15px; text-align: justify;">Incluya en el mensaje:</p>
                        <ul style="color: #555; font-size: 16px; line-height: 1.8; margin-bottom: 15px; padding-left: 20px; text-align: justify;">
                            <li style="margin-bottom: 10px;">Su nombre completo</li>
                            <li style="margin-bottom: 10px;">ID de usuario de Meta o correo electrónico registrado</li>
                            <li style="margin-bottom: 10px;">Plataforma utilizada (Facebook/Instagram/WhatsApp)</li>
                        </ul>
                        
                        <p style="color: #555; font-size: 16px; line-height: 1.8; margin-bottom: 15px; text-align: justify;">Procesaremos su solicitud en un plazo máximo de 30 días hábiles y le enviaremos una confirmación por correo electrónico.</p>
                        
                        <div class="alert alert-warning mt-4 mb-4" role="alert" style="font-size: 16px;">
                            <strong>Nota importante:</strong> Este proceso solo elimina datos almacenados en nuestros sistemas. Para datos en las plataformas de Meta, debe gestionarlo directamente en la configuración de su cuenta.
                        </div>
                        
                        <p style="color: #555; font-size: 16px; line-height: 1.8; margin-bottom: 15px; text-align: justify;">Para más información, consulte nuestra <a href="{{ route('privacy-policy') }}" style="color: #a30f25; text-decoration: underline;">Política de Privacidad</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
