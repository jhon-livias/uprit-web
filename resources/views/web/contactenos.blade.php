@extends('web.layouts.principal')
@section('content')

<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Contáctenos</h1>
            </div>
            <ul class="edu-breadcrumb mas-bajo">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="#">Contáctenos</a></li>
            </ul>
        </div>
    </div>
</div>

<section class="contact-us-area">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-4 col-lg-6">
                <div class="contact-us-info">
                    <h3 class="heading-title">¡Siempre estamos deseando saber de ti!</h3>
                    <ul class="address-list">
                        <li>
                            <h5 class="title">Dirección</h5>
                            <p>Nos encontramos aquí, para ayudarte con cualquier duda o consulta. <br>

                                Av. Industrial km. 4 - Semirústica El Bosque
                                Trujillo - La Libertad</p>
                        </li>
                        <li>
                            <h5 class="title">Email</h5>
                            <p>Nos pondremos en contácto contigo lo más pronto posible<br><a href="https://mail.google.com/mail/?view=cm&fs=1&to=informes@uprit.edu.pe"><span class="__cf_email__" data-cfemail="e98c8d9c8b85808782a98c91888499858cc78a8684">informes@uprit.edu.pe</span></a></p>
                        </li>
                        <li>
                            <h5 class="title">Llamanos</h5>
                            <p>Lunes a Viernes de 8:00 am a 5:00 pm<br>
                                <a href="tel:+51970597183">+51 970 597 183</a></p>
                        </li>
                        <li>
                            <h5 class="title">Escríbenos por Whatsapp</h5>
                            <p>Te responderemos a la brevedad posible<br>
                                <a href="https://api.whatsapp.com/send?phone=%2B51970597183&context=AferTi8xZX836bsH1jwi_SMA_wJ5XhwsM8Ykr7oA6jN0Axmgusf4_o5E0hZaTmh9dEIUIonhdp3E2uHQ9EFB0zAJ5YkOnQRElIjAfwGuWTyXgtrLJ0AQDOTKZuCErkGWiPv24e0Eu2riCwhTyruS2LoSUA&source=FB_Page&app=facebook&entry_point=page_cta&fbclid=IwY2xjawKjA_tleHRuA2FlbQIxMABicmlkETFxam4wb0VPYTlIRUZLcjdNAR48jGqyZHyQapDXwxRZatsFzr5p58GPK1q5br-7XLxOYlGkawtbWv5koMLmsQ_aem_6f09mYlMquvt7aKbArCx8Q" target="_blank">+51 970 597 183</a></p>
                        </li>
                    </ul>
                    <ul class="social-share">
                        <li><a href="https://www.instagram.com/upritrujillo"><i class="icon-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/uptrujillo"><i class="icon-facebook"></i></a></li>
                        <li><a href="https://x.com/UpritTrujillo"><i class="icon-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/school/universidad-privada-de-trujillo/"><i class="icon-linkedin2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="offset-xl-2 col-lg-6">
                <div class="contact-form form-style-2">
                    <div class="section-title">
                        <h4 class="title">Solicita Información</h4>
                        <p>Tú eliges cómo estudiar</p>
                    </div>
                    <form class="rnt-contact-form rwt-dynamic-form" id="contact-form" method="POST" action="mail.php">
                        <div class="row row--10">
                            <div class="form-checks col-12">
                                <label>
                                    <input type="radio" name="modalidad">
                                    Presencial
                                </label>

                                <label>
                                    <input type="radio" name="modalidad">
                                    Virtual
                                </label>

                                <label>
                                    <input type="radio" name="modalidad">
                                    Semipresencial
                                </label>

                                <label>
                                    <input type="radio" name="modalidad">
                                    Hyflex
                                </label>
                            </div>
                            <div class="form-group col-12">
                                <select>
                                    <option value="" selected="" disabled>Tipo de Programa</option>
                                    <option value="PREGRADO">Pregrado Regular</option>
                                    <option value="MAESTRIA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <option value="DIPLOMADO">Diplomados y Cursos de Especialización</option>
                                    <option value="POST_DOCTORADO">Posdoctorado</option>
                                    <option value="SECOND_SPECIALITY">Segunda Especialidad</option>
                                    <option value="CAREERS_FOR_WORKERS">Pregrado Puede</option>
                                    <option value="TRANSFER">Traslado de Carrera Profesional</option>
                                    <option value="DEGREE_COMPLETION">Titulación / Licenciatura</option>
                                    <option value="EXPERIENCE_INTERNATIONAL_PERU">Experiencia Internacional en Perú</option>
                                    <option value="MISION_ACADEMIC_INTERNATIONAL">Misiones Académicas Internacionales</option>
                                    <option value="CONGRESS_SUMMITS">Congresos - SUMMITS</option>
                                    <option value="BOOTCAMPS">Bootcamps</option>
                                    <option value="MOOC">MOOC</option>
                                    <option value="WEBINARS">Webinars</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <select>
                                    <option value="" selected="" disabled>Programa de Interés</option>
                                    <option value="Administración Portuaria y de Transporte Intermodal">Administración Portuaria y de Transporte Intermodal</option>
                                    <option value="Psicología">Psicología</option>
                                    <option value="Derecho (Presencial)">Derecho (Presencial)</option>
                                    <option value="Arquitectura y Urbanismo">Arquitectura y Urbanismo</option>
                                    <option value="Ingenieria Industrial">Ingenieria Industrial</option>
                                    <option value="Educación Inicial">Educación Inicial</option>
                                    <option value="Educación Primaria">Educación Primaria</option>
                                    <option value="Educación Secundaria con Mención en Ciencias Sociales">Educación Secundaria con Mención en Ciencias Sociales</option>
                                    <option value="Administración de Empresas">Administración de Empresas</option>
                                    <option value="Contabilidad y Finanzas">Contabilidad y Finanzas</option>
                                    <option value="Ingeniería Civil">Ingeniería Civil</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <input type="text" placeholder="Nombres">
                            </div>
                            <div class="form-group col-6">
                                <input type="text" placeholder="Apellidos">
                            </div>
                            <div class="form-group col-6">
                                <input type="text" placeholder="DNI">
                            </div>
                            <div class="form-group col-6">
                                <input type="text" placeholder="Documento">
                            </div>
                            <div class="form-group col-6">
                                <input type="email" placeholder="Correo">
                            </div>
                            <div class="form-group col-6">
                                <input type="text" placeholder="Whatsapp">
                            </div>
                            <div class="form-group col-12">
                                <button class="rn-btn edu-btn btn-medium submit-btn" name="submit" type="submit">Postular <i class="icon-4"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layouts.marquesina')
@endsection