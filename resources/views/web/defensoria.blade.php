@extends('web.layouts.principal')
@section('content')
<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner" style="margin-top:40px">
            <div class="page-title">
                <h1 class="title">Más Información</h1>
            </div>
            <ul class="edu-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('web.index')}}">Inicio</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{route('convalidacion')}}">Más Información</a></li>
            </ul>
        </div>
    </div>

</div>
<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <div class="text-block text-center">
                        <h3 style="margin-bottom:20px;font-weight: 700;font-size:30px">
                            Lo que Guía Nuestras Acciones
                        </h3>

                        <p>
                            En la Defensoría Universitaria, nuestros principios no son solo palabras; son la base que guía cada una de nuestras decisiones y acciones diarias, formando nuestra cultura y promoviendo el éxito de nuestra comunidad.
                        </p>
                    </div>
                    <div style="display:flex;align-items:center;gap:50px;flex-wrap:wrap;margin-top:50px;">

                        <!-- Texto izquierda -->
                        <div style="flex:1;min-width:350px;">

                            <h2 style="margin-bottom:10px;font-size:20px">
                                Defensoría Universitaria
                            </h2>


                            <p style="text-align:justify">
                                Somos el área encargada de proteger los derechos individuales de todos los miembros de la comunidad universitaria: estudiantes, docentes, egresados, graduados, personal administrativo, autoridades académicas y personal de servicio contratado; y procurar el cumplimiento del Principio de Autoridad Responsable. De esta manera, tenemos la facultad de tomar conocimiento y recepcionar las solicitudes, reclamos, quejas y denuncias que formulen los miembros de nuestra comunidad universitaria.
                            </p>


                        </div>



                        <!-- Video derecha -->
                        <!-- Imagen derecha -->
                        <div style=" flex:1;min-width:350px;">

                            <div style="overflow:hidden;border-radius:15px;">

                                <img
                                    src="{{ asset('web/imagenes/por.jpg') }}"
                                    alt="Mensaje del Director"
                                    style="width:100%;height:auto;display:block;">

                            </div>

                        </div>

                    </div>
                    <br> <br>
                    <div class="text-block">
                        <h3 class="title">Canales de Atención</h3>
                        <ul>
                            <li>
                                Oficina Presencial: Manzana Z′ Lote Resultante 1A, Urbanización Semirústica El Bosque, Campus Universitario de UPRIT, 3er piso (costado de oficina de la Dirección de Investigación).
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="course-tab-content">
                                <div class="course-overview">



                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec" id="accordionExample" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Horario de Atención
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Lunes a Viernes, de 8 am a 1 pm y de 2 pm a 5pm
                                                                Sábados, de 8 am a 1 pm

                                                                Correo Institucional

                                                                defensoriauniversitaria@uprit.e
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Correo Institucional
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p><a href="">defensoriauniversitaria@uprit.edu.pe</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="text-block">
                        <h3 class="title">¿Qué Hacemos?</h3>
                    </div>
                    <div class="tab-content" id="myTabContentSeguro">

                        <div class="tab-pane fade show active"
                            id="overviewSeguro"
                            role="tabpanel"
                            aria-labelledby="overview-tab-seguro">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleSeguro"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneSeguro">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneSeguro"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneSeguro">

                                                        Tutelar

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Tutelar los derechos de los miembros de la comunidad universitaria.
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTwoSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoSeguro">

                                                        Recibir y Atender
                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Recibir y atender las solicitudes, reclamos, quejas y denuncias que realicen los miembros de nuestra comunidad universitaria.
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingThreeSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThreeSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThreeSeguro">

                                                        Proponer Normas
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Proponer normas y políticas que permitan garantizar y mejorar la defensa de los derechos de nuestra comunidad universitaria.
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingThreeSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThreeSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThreeSeguro">

                                                        Asegurar el Principio de Autoridad
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Asegurar el Principio de Autoridad Responsable, la justicia e igualdad para toda nuestra comunidad universitaria, mantener la confidencialidad y discreción en nuestra actuación, y el respeto a la Constitución Política del Perú, a la Ley Universitaria y a nuestro Estatuto.
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="heading4Seguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse4Seguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapse4Seguro">

                                                        Fomentar la conciliación
                                                    </button>

                                                </h2>

                                                <div id="collapse4Seguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading4Seguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Fomentar la conciliación y/o mediación en los conflictos que surjan entre los miembros de la comunidad universitaria.
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="heading5Seguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse5Seguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapse5Seguro">

                                                        Prevenir
                                                    </button>

                                                </h2>

                                                <div id="collapse5Seguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading5Seguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Prevenir e intervenir en casos de Hostigamiento Sexual.
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="heading6Seguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse6Seguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapse6Seguro">

                                                        Promover en las actividades formativas
                                                    </button>

                                                </h2>

                                                <div id="collapse6Seguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading6Seguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Promover en las actividades formativas, en los procedimientos de inducción capacitación docente y no docente, los derechos y deberes de los miembros de nuestra comunidad universitaria.
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="heading7Seguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse7Seguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapse7Seguro">

                                                        Organizar
                                                    </button>

                                                </h2>

                                                <div id="collapse7Seguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading7Seguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Organizar y dirigir las labores y actividades de Defensoría Universitaria.
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="text-block text-center">
                        <h3 class="title">¿Para qué casos puedo acudir a la Defensoría Universitaria?</h3>
                        <p>Aquí detallamos los tipos de requerimientos que puedes presentar ante la Defensoría Universitaria: solicitudes, reclamos, quejas y denuncias.</p>
                    </div>
                    <!-- AUTORIDAD 1 -->
                    <div style="display:flex;align-items:center;gap:50px;margin-top:60px;margin-bottom:80px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <img src="{{ asset('web/imagenes/de1.avif') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
                        </div>

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;font-size:25px;">
                                Solicitudes
                            </h3>

                            <p style="margin:0;font-size:13px;line-height:1.8;text-align:justify;">
                                Es un requerimiento formal que realiza un miembro de nuestra comunidad universitaria, pudiendo presentarse de manera escrita o virtual, debidamente fundamentada a fin de obtener una respuesta o acción al respecto. Puede presentarse de manera escrita (presencial o virtual).
                            </p>
                        </div>

                    </div>

                    <!-- AUTORIDAD 2 -->
                    <div style="display:flex;align-items:center;gap:50px;margin-bottom:50px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;font-size:25px;">
                                Reclamos
                            </h3>

                            <p style="margin:0;font-size:13px;line-height:1.8;text-align:justify;">
                                Es aquella disconformidad que se genera respecto a productos y servicios que ofrece la universidad a nuestra comunidad universitaria a fin de obtener una solución o compensación por un problema relacionado con el producto o servicio adquirido. Puede presentarse de manera escrita (presencial o virtual).
                            </p>
                        </div>

                        <div style="flex:1;min-width:300px;text-align:right;">
                            <img src="{{ asset('web/imagenes/d2.jpg') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
                        </div>

                    </div>
                    <!-- AUTORIDAD 1 -->
                    <div style="display:flex;align-items:center;gap:50px;margin-top:60px;margin-bottom:80px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <img src="{{ asset('web/imagenes/d3.avif') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
                        </div>

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;font-size:25px;">
                                Quejas
                            </h3>

                            <p style="margin:0;font-size:13px;line-height:1.8;text-align:justify;">
                                Es la insatisfacción por la atención recibida de parte del personal académico, administrativo u otro que forma parte de la universidad, relacionado con productos, servicios y/o situaciones a fines. Se debe presentar de manera escrita (presencial o virtual).
                            </p>
                        </div>

                    </div>

                    <!-- AUTORIDAD 2 -->
                    <div style="display:flex;align-items:center;gap:50px;margin-bottom:50px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;font-size:25px;">
                                Denuncias
                            </h3>

                            <p style="margin:0;font-size:13px;line-height:1.8;text-align:justify;">
                                Es la acción ante una o más vulneraciones de los derechos individuales de algún miembro de nuestra comunidad universitaria, con el propósito de que se lleve a cabo una investigación de los hechos, a fin de imponer una sanción a la parte denunciada. Esta, se puede presentar de manera escrita (presencial o virtual).
                            </p>
                        </div>

                        <div style="flex:1;min-width:300px;text-align:right;">
                            <img src="{{ asset('web/imagenes/d4.jpg') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
                        </div>

                    </div>
                    <div class="text-block text-center">
                        <h3 class="title">Conoce nuestra normativa</h3>
                        <p>Accede a los documentos normativos clave de la Defensoría Universitaria. Estos reglamentos y políticas son fundamentales para entender cómo protegemos y garantizamos los derechos de nuestra comunidad, promoviendo un ambiente seguro y equitativo para todos.</p>
                    </div>
                    <div class="text-block text-center">
                        <h3 class="title">¿Tienes algún pedido a la Defensoría?</h3>
                        <p>Ingresa los datos del siguiente formulario y envianos tu pedido.</p>
                    </div>
                    <div class="text-block text-center">
                        <h3 class="title">Conoce nuestra normativa</h3>
                        <p>
                            Accede a los documentos normativos clave de la Defensoría Universitaria.
                            Estos reglamentos y políticas son fundamentales para entender cómo protegemos
                            y garantizamos los derechos de nuestra comunidad, promoviendo un ambiente
                            seguro y equitativo para todos.
                        </p>
                    </div>

                    <div class="text-block text-center" style="margin-bottom:40px;">
                        <h3 class="title">¿Tienes algún pedido a la Defensoría?</h3>
                        <p>Ingresa los datos del siguiente formulario y envíanos tu pedido.</p>
                    </div>

                    <div style="max-width:1100px;margin:auto;background:#fff;padding:40px;border-radius:12px;box-shadow:0 5px 25px rgba(0,0,0,.08);">

                        <form>

                            <div style="display:flex;gap:20px;flex-wrap:wrap;margin-bottom:20px;">
                                <div style="flex:1;min-width:300px;">
                                    <label style="display:block;font-weight:600;margin-bottom:8px;">Nombre</label>
                                    <input type="text" placeholder="Nombre"
                                        style="width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;outline:none;">
                                </div>

                                <div style="flex:1;min-width:300px;">
                                    <label style="display:block;font-weight:600;margin-bottom:8px;">Apellidos</label>
                                    <input type="text" placeholder="Apellidos"
                                        style="width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;outline:none;">
                                </div>
                            </div>

                            <div style="display:flex;gap:20px;flex-wrap:wrap;margin-bottom:20px;">
                                <div style="flex:1;min-width:300px;">
                                    <label style="display:block;font-weight:600;margin-bottom:8px;">DNI o CE</label>
                                    <input type="text" placeholder="Número de Documento"
                                        style="width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;outline:none;">
                                </div>

                                <div style="flex:1;min-width:300px;">
                                    <label style="display:block;font-weight:600;margin-bottom:8px;">Teléfono</label>
                                    <input type="text" placeholder="Teléfono"
                                        style="width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;outline:none;">
                                </div>
                            </div>

                            <div style="margin-bottom:20px;">
                                <label style="display:block;font-weight:600;margin-bottom:8px;">Correo</label>
                                <input type="email" placeholder="Correo"
                                    style="width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;outline:none;">
                            </div>

                            <div style="margin-bottom:20px;">
                                <label style="display:block;font-weight:600;margin-bottom:8px;">Tipo de petición</label>
                                <select style="width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;outline:none;">
                                    <option>Seleccione el tipo de Petición</option>
                                    <option>Solicitud</option>
                                    <option>Queja</option>
                                    <option>Reclamo</option>
                                    <option>Denuncia</option>
                                </select>
                            </div>

                            <div style="margin-bottom:20px;">
                                <label style="display:block;font-weight:600;margin-bottom:8px;">Tipo de Programa</label>
                                <select style="width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;outline:none;">
                                    <option>Pregrado Regular</option>
                                    <option>Maestría</option>
                                    <option>Doctorado</option>
                                    <option>Diplomados y Cursos de Especialización</option>
                                    <option>Posdoctorado</option>
                                    <option>Segunda Especialidad</option>
                                    <option>Pregrado Puede</option>
                                    <option>Traslado de Carrera Profesional</option>
                                    <option>Titulación / Licenciaturas</option>
                                    <option>Experiencia Internacional en Perú</option>
                                    <option>Congresos SUMMITS</option>
                                    <option>Bootcamps</option>
                                    <option>MOOC</option>
                                    <option>Webinars</option>
                                </select>
                            </div>

                            <div style="margin-bottom:20px;">
                                <label style="display:block;font-weight:600;margin-bottom:8px;">Programa de Interés</label>
                                <select style="width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;outline:none;">
                                    <option>Selecciona tu programa</option>
                                    <option>Selecciona tu programa</option>
                                    <option>Selecciona tu programa</option>
                                    <option>Selecciona tu programa</option>
                                    <option>Selecciona tu programa</option>
                                    <option>Selecciona tu programa</option>
                                    <option>Selecciona tu programa</option>
                                    <option>Selecciona tu programa</option>
                                    <option>Selecciona tu programa</option>
                                    <option>Selecciona tu programa</option>
                                </select>
                            </div>

                            <div style="margin-bottom:10px;">
                                <label style="display:block;font-weight:600;margin-bottom:8px;">Adjuntar Archivo</label>
                                <input type="file"
                                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                            </div>

                            <p style="font-size:14px;color:#666;margin-bottom:20px;">
                                Adjunte documentos, imágenes o cualquier evidencia relacionada.
                            </p>

                            <div style="margin-bottom:30px;">
                                <label style="display:block;font-weight:600;margin-bottom:8px;">Descripción</label>
                                <textarea rows="5"
                                    placeholder="Detalle la fecha, hora, lugar y cuéntanos lo sucedido"
                                    style="width:100%;padding:12px 15px;border:1px solid #ddd;border-radius:8px;outline:none;resize:vertical;"></textarea>
                            </div>

                            <div style="text-align:center;">
                                <button type="submit"
                                    style="background:#b30d2f;color:#fff;border:none;padding:14px 45px;border-radius:50px;font-weight:600;cursor:pointer;font-size:16px;">
                                    Enviar Pedido
                                </button>
                            </div>

                        </form>

                    </div>
                    <br> <br>
                    <div class="text-block text-center" style="margin-bottom:40px;">
                        <h3 class="title">¿Qué es Hostigamiento Sexual?</h3>
                        <ul>
                            <li>
                                El Hostigamiento Sexual es una manifestación de violencia que se produce por medio de actos (físicos o verbales) de naturaleza o significado sexual o sexista no deseada y/o rechazada por la persona a la que se dirigen estos actos. Esta conducta puede ser efectuada por uno o varias personas; intimidando, humillando y afectando la dignidad de la persona hostigada y sus derechos fundamentales. No es un requisito indispensable comprobar el rechazo de la víctima o la reiteración del acto.
                            </li>
                        </ul>
                    </div>
                    <div class="text-block" style="margin-bottom:40px;">
                        <h3 class="title">¿Cómo reconocer un acto de Hostigamiento Sexual?</h3>
                        <ul>
                            <li>
                                Algunas de las conductas a través de las que se puede manifestar el Hostigamiento Sexual son:
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="course-tab-content">
                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExperiencia"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <!-- Item 1 -->
                                            <div class="accordion-item">

                                                <h3 class="accordion-header" id="headingExperienciaOne">
                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperienciaOne"
                                                        aria-expanded="true"
                                                        aria-controls="collapseExperienciaOne">

                                                        01
                                                    </button>
                                                </h3>

                                                <div id="collapseExperienciaOne"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaOne"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Ante la promesa implícita o explícita al hostigado de algún tipo de trato preferente y/o beneficioso, relacionado con su situación (actual o futura) a cambio de favores sexuales.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Item 2 -->
                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperienciaTwo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperienciaTwo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperienciaTwo">

                                                        02

                                                    </button>

                                                </h2>

                                                <div id="collapseExperienciaTwo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaTwo"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Las amenazas con las que se exija de manera implícita o explícita determinada acción no deseada por la víctima, atentado o agraviando así, su dignidad.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperiencia3">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperiencia3"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperiencia3">

                                                        03

                                                    </button>

                                                </h2>

                                                <div id="collapseExperiencia3"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperiencia3"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>El uso de palabras de índole o tono sexual o sexista (escritas o verbales), insinuaciones y/o proposiciones sexuales, gestos obscenos o exhibición de imágenes de contenido sexual a través de cualquier medio, que sean insoportables, hostiles, humillantes u ofensivas para la víctima.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperiencia4">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperiencia4"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperiencia4">

                                                        04

                                                    </button>

                                                </h2>

                                                <div id="collapseExperiencia4"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperiencia4"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Cualquier tipo de acercamiento corporal, roces, tocamientos u otras conductas físicas de naturaleza sexual que sean ofensivas y no deseadas por la víctima.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperiencia5">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperiencia5"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperiencia5">

                                                        05

                                                    </button>

                                                </h2>

                                                <div id="collapseExperiencia5"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperiencia5"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>El trato ofensivo u hostil por la negativa a las conductas descritas anteriormente.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperiencia6">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperiencia6"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperiencia6">

                                                        06

                                                    </button>

                                                </h2>

                                                <div id="collapseExperiencia6"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperiencia6"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Cualquier otra conducta que se configure como Hostigamiento Sexual.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-block">
                        <h3 class="title">¿Qué hacer ante un acto de Hostigamiento Sexual?</h3>
                        <ul>
                            <li>
                                Si extraviaste o encontraste algo, dirígete a la Oficina 3203, Edificio 3.
                            </li>
                        </ul>
                    </div>
                    <div class="accordion edu-accordion edu-accordion-sec"
                        id="accordionInternacional">

                        <!-- Item 1 -->
                        <div class="accordion-item">

                            <h3 class="accordion-header" id="headingInternacionalOne">
                                <button class="accordion-button"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseInternacionalOne"
                                    aria-expanded="true"
                                    aria-controls="collapseInternacionalOne">

                                    De manera Presencial

                                </button>
                            </h3>

                            <div id="collapseInternacionalOne"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingInternacionalOne"
                                data-bs-parent="#accordionInternacional">

                                <div class="accordion-body">
                                    <div class="course-lesson">
                                        <p>Puedes acercarte a la oficina de Defensoría Universitaria en la 3er piso (costado de oficina de la Dirección de Investigación); Manzana Z′ Lote Resultante 1A, Urbanización Semirústica El Bosque, Campus Universitario de UPRIT.</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Item 2 -->
                        <div class="accordion-item">

                            <h3 class="accordion-header" id="headingInternacionalTwo">
                                <button class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseInternacionalTwo"
                                    aria-expanded="false"
                                    aria-controls="collapseInternacionalTwo">

                                    De manera Virtual

                                </button>
                            </h3>

                            <div id="collapseInternacionalTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingInternacionalTwo"
                                data-bs-parent="#accordionInternacional">

                                <div class="accordion-body">
                                    <div class="course-lesson">
                                        <p>Paso 1: Descarga el formato, completa los datos resaltados y adjunta los documentos (opcional dependiendo del caso)Ver Documento
                                            <br>
                                            Paso 2: Escanea el documento y envíalo al correo institucional:defensoriauniversitaria@uprit.edu.pe
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="edu-blog-sidebar textos-derecha">
                    <div class="edu-blog-widget widget-categories">
                        <div class="inner">
                            <h4 class="widget-title">Categorias</h4>
                            <div class="content">
                                <ul class="category-list lista-vist-sec">
                                    <li><a href="{{ route('porque') }}">¿Por qué Estudiar en la Uprit?</a></li>
                                            <li><a href="{{ route('modelo-educativo') }}">Modelo Educativo: Método L4P</a></li>  
                                            <li><a href="{{ route('autoridades') }}">Nuestras autoridades</a></li> 
                                            <li><a href="{{ route('red-nexo') }}">Nuestra Red Nexo Uprit</a></li>
                                            <li><a href="{{ route('a2iprograma') }}">A2i Programa Aceleración hacia la industria</a></li>  
                                            <li><a href="{{ route('defensoria') }}">Defensoría Universitaria</a></li> 
                                            <li><a href="{{ route('medioambiental') }}">Política Medioambiental (S.S.O.M.A)</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <div class="edu-blog-widget widget-latest-post">
                        <div class="inner">
                            <h4 class="widget-title">Últimas Noticias</h4>
                            <div class="content latest-post-list">
                                @foreach($ultimasnoticias as $ultima)
                                <div class="latest-post">
                                    <div class="thumbnail">
                                        <a href="{{route('web.detallenoticia',$ultima->id)}}">
                                            <img src="{{ asset('noticias_imagenes/' . $ultima->imagen) }}" alt="Blog Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title"><a href="{{route('web.detallenoticia',$ultima->id)}}">{{$ultima->titulo}}</a></h6>
                                        <ul class="blog-meta">
                                            <li><i class="icon-27"></i>{{ ucfirst(\Carbon\Carbon::parse($ultima->fecha)->locale('es')->translatedFormat('d F, Y')) }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layouts.marquesina')
@endsection