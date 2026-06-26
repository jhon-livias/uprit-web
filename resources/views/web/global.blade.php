@extends('web.layouts.principal')
@section('content')
<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner" style="margin-top:40px">
            <div class="page-title">
                <h1 class="title">Servicios</h1>
            </div>
            <ul class="edu-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('web.index')}}">Inicio</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{route('futbol')}}">Servicios</a></li>
            </ul>
        </div>
    </div>

</div>
<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <div class="text-block">
                        <h3 class="title">Internacionalización y Visión Global</h3>
                        <ul>
                            <li>En la UPRIT, fomentamos la internacionalización como un eje transversal que proporciona una visión global, permitiendo a nuestros estudiantes crecer tanto personal como profesionalmente.</li>
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
                                                        Becas Internacionales
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Estamos implementando becas para programas trimestrales, semestrales y anuales como Intercambio, Internado, Práctica y Doble Grado en el extranjero.

                                                                <br>

                                                                <a href="" style="color:#91001E; text-decoration: underline;">
                                                                    Revisa las becas disponibles aquí
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Semana Internacional
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Participa en actividades académicas, culturales y recreativas en torno a un país invitado, propiciando el conocimiento del mundo en nuestra comunidad universitaria.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Intercambio por Semestre
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Vive una inmersión académica profunda, matriculándote en cursos en universidades extranjeras y obteniendo créditos para tu carrera en la UPRIT.

                                                                <br>

                                                                <a href="" style="color:#91001E; text-decoration: underline;">
                                                                    Revisa los intercambios disponibles aquí
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Práctica Profesional Internacional
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Genera un impacto positivo y significativo al unirte a un programa de práctica profesional en el extranjero.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Estancias Doctorales o de Investigación
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Realiza estancias de investigación en la UPRIT si tu universidad tiene un convenio vigente, o matricúlate como alumno libre en nuestros programas postdoctorales.

                                                                <br><br>

                                                                <span style="color:#000;">
                                                                    Para más información, escríbenos:
                                                                </span>

                                                                <br>

                                                                <a href="mailto:oficina.internacional@uprit.edu.pe" style="color:#91001E; text-decoration: underline;">
                                                                    oficina.internacional@uprit.edu.pe
                                                                </a>
                                                            </p>
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
                        <h3 class="title">Aulas y Metodologías de Colaboración Global</h3>
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

                                                        Clases Espejo
                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Una experiencia de aula internacional sin necesidad de viajar. Permite la interacción de estudiantes y docentes con pares nacionales e internacionales a través de las TICs.
                                                            </p>

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

                                                        Collaborative Online International Learning (COIL)

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Metodología que fomenta la colaboración virtual entre estudiantes y profesores de diferentes países para desarrollar competencias interculturales y trabajo en equipo.
                                                            </p>

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
                        <h3 class="title">Capacitación Global: Construyendo Éxito</h3>

                        <ul>
                            <li>
                                Nuestros programas globales de educación y capacitación te dotan de las habilidades para superar las brechas culturales y maximizar tu eficacia en un mundo interconectado.
                            </li>
                        </ul>

                        <!-- Imagen -->
                        <div style="margin-top:30px;">
                            <img src="{{ asset('web/imagenes/globlal.jpeg') }}" alt="Capacitación Global"
                                style="width:100%; height:250px; border-radius:20px; object-fit:cover;" ;">
                        </div>

                        <!-- Bloques -->
                        <div class="row" style="margin-top:35px;">

                            <!-- Item 1 -->
                            <div class="col-lg-6 col-md-6">
                                <div style="display:flex; gap:15px; align-items:flex-start;">

                                    <div>
                                        <i class="flaticon flaticon-idea"
                                            style="color:#91001E; font-size:28px;"></i>
                                    </div>

                                    <div>
                                        <h4 style="margin-bottom:10px;">
                                            Capacitación en Habilidades Globales
                                        </h4>

                                        <p style="margin:0;text-align:justify;">
                                            Mejora tus habilidades de comunicación y liderazgo intercultural con talleres diseñados para ayudarte a gestionar diferencias culturales en situaciones profesionales y personales.
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="col-lg-6 col-md-6">
                                <div style="display:flex; gap:15px; align-items:flex-start;">

                                    <div>
                                        <i class="flaticon flaticon-bulb"
                                            style="color:#91001E; font-size:28px;"></i>
                                    </div>

                                    <div>
                                        <h4 style="margin-bottom:10px;">
                                            Objetivos del Programa
                                        </h4>

                                        <p style="margin:0;text-align:justify;">
                                            Ampliar tu conocimiento sobre el contexto mundial, alcanzar un dominio del idioma inglés, y desarrollar competencias como pensamiento crítico, resolución de problemas y creatividad.
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Habilidades Globales Comúnmente Reconocidas</h3>
                    </div>
                    <div class="tab-content" id="myTabContentNuevo">

                        <div class="tab-pane fade show active"
                            id="overviewNuevo"
                            role="tabpanel"
                            aria-labelledby="overview-tab-nuevo">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleNuevo"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneNuevo">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneNuevo"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneNuevo">

                                                        Conciencia Global
                                                    </button>

                                                </h3>

                                                <div id="collapseOneNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Conocimiento y comprensión de problemas globales e interconexiones.

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTwoNuevo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoNuevo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoNuevo">

                                                        Competencia Cultural

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Capacidad de colaborar respetuosamente a través de fronteras.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingThreeeNuevo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThreeeNuevo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThreeeNuevo">

                                                        Habilidades de Comunicación

                                                    </button>

                                                </h2>

                                                <div id="collapseThreeeNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeeNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Capacidad de expresar ideas con claridad y de escuchar activamente.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingFourNuevo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFourNuevo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFourNuevo">

                                                        Colaboración y Trabajo en Equipo

                                                    </button>

                                                </h2>

                                                <div id="collapseFourNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFourNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Habilidad para trabajar eficazmente con grupos diversos de personas.

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingFiveNuevo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFiveNuevo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFiveNuevo">

                                                        Pensamiento Crítico

                                                    </button>

                                                </h2>

                                                <div id="collapseFiveNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFiveNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Capacidad de analizar información y generar soluciones creativas.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingSixNuevo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSixNuevo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseSixNuevo">

                                                        Adaptabilidad y Resiliencia

                                                    </button>

                                                </h2>

                                                <div id="collapseSixNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingSixNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Capacidad de aceptar el cambio y adaptarse a nuevas circunstancias.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingSevenNuevo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSevenNuevo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseSevenNuevo">

                                                        Creatividad e Innovación

                                                    </button>

                                                </h2>

                                                <div id="collapseSevenNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingSevenNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Capacidad de generar nuevas ideas y enfoques imaginativos.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingEigthNuevo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseEigthNuevo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseEigthNuevo">

                                                        Inteligencia Emocional

                                                    </button>

                                                </h2>

                                                <div id="collapseEigthNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingEigthNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Capacidad de gestionar las propias emociones y empatizar con los demás.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingNineNuevo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseNineNuevo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseNineNuevo">

                                                        Alfabetización Digital

                                                    </button>

                                                </h2>

                                                <div id="collapseNineNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingNineNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Competencia en el uso de tecnologías digitales y la búsqueda de información.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTenNuevo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTenNuevo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTenNuevo">

                                                        Aprendizaje Permanente

                                                    </button>

                                                </h2>

                                                <div id="collapseTenNuevo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTenNuevo"
                                                    data-bs-parent="#accordionExampleNuevo">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                La motivación para aprender continuamente y adquirir nuevas habilidades.
                                                            </p>

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
                        <p>Estas habilidades se consideran cruciales para tener éxito en diversos dominios para navegar en un mundo cada vez más complejo e interconectado.
                        </p>
                    </div>
                    <div class="tab-content" id="myTabContentHabil">

                        <div class="tab-pane fade show active"
                            id="overviewHabil"
                            role="tabpanel"
                            aria-labelledby="overview-tab-habil">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleHabil"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneHabil">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneHabil"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneHabil">

                                                        Talleres específicos de cada cultura
                                                    </button>

                                                </h3>

                                                <div id="collapseOneHabil"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneHabil"
                                                    data-bs-parent="#accordionExampleHabil">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Capacitación con un público objetivo o culturas específicas en mente (por ejemplo, acortando las distancias culturales entre EE. UU. y China).
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTwoHabil">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoHabil"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoHabil">

                                                        Talleres de Team Building

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoHabil"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoHabil"
                                                    data-bs-parent="#accordionExampleHabil">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Capacitación que utiliza perfiles de evaluación para identificar fortalezas, desafíos y estrategias para aprovechar las diferencias culturales y superar las brechas.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingThreeHabil">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThreeHabil"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThreeHabil">

                                                        Formación en Coaching y Liderazgo

                                                    </button>

                                                </h2>

                                                <div id="collapseThreeHabil"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeHabil"
                                                    data-bs-parent="#accordionExampleHabil">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Se utilizan perfiles y herramientas de evaluación para ayudar a las personas a desarrollar sus habilidades de comunicación y liderazgo.
                                                            </p>

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
                        <h3 class="title">Objetivos de Aprendizaje y Programas Adicionales</h3>
                        <ul>
                            <li>Al finalizar el Programa de Compromiso Global, los participantes adquirirán un conjunto de habilidades y conocimientos clave para sobresalir en entornos internacionales.</li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContentObje">

                        <div class="tab-pane fade show active"
                            id="overviewObje"
                            role="tabpanel"
                            aria-labelledby="overview-tab-obje">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleObje"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneObje">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneObje"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneObje">

                                                        Comprensión de Programas Internacionales
                                                    </button>

                                                </h3>

                                                <div id="collapseOneObje"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneObje"
                                                    data-bs-parent="#accordionExampleObje">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Comprenda cómo UPRIT desarrolla y sostiene programas y asociaciones internacionales.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTwoObje">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoObje"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoObje">

                                                        Estrategias para Perspectivas Globales

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoObje"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoObje"
                                                    data-bs-parent="#accordionExampleObje">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Desarrollar estrategias para integrar perspectivas globales, contenidos y experiencias en sus cursos y proyectos de investigación.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingThreeObje">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThreeObje"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThreeObje">

                                                        Fomento de Entornos Inclusivos
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeObje"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeObje"
                                                    data-bs-parent="#accordionExampleObje">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Fomentar entornos de aprendizaje que involucren a estudiantes y académicos internacionales en entornos de aula e investigación.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingFourObje">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFourObje"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFourObje">

                                                        Oportunidades de Colaboración

                                                    </button>

                                                </h2>

                                                <div id="collapseFourObje"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFourObje"
                                                    data-bs-parent="#accordionExampleObje">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Identificar y buscar oportunidades de colaboraciones de investigación internacionales, incluyendo fuentes de financiación.
                                                            </p>

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
                        <h3 class="title">Objetivos de Aprendizaje y Programas Adicionales</h3>
                        <div style="margin-top:30px;">
                            <img src="{{ asset('web/imagenes/obje.jpeg') }}" alt="Capacitación Global"
                                style="width:100%; height:250px; border-radius:20px; object-fit:cover;" ;">
                        </div>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Acuerdos y Redes Internacionales</h3>                     
                    </div>
                    <div class="tab-content" id="myTabContentAcu">

                        <div class="tab-pane fade show active"
                            id="overviewAcu"
                            role="tabpanel"
                            aria-labelledby="overview-tab-acu">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleAcu"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneAcu">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneAcu"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneAcu">

                                                        Acuerdos de Cooperación
                                                    </button>

                                                </h3>

                                                <div id="collapseOneAcu"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneAcu"
                                                    data-bs-parent="#accordionExampleAcu">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                La UPRIT Global apoya a la facultad y la administración para establecer colaboraciones con expertos en educación superior y otras instituciones internacionales.
                                                                <br><br>

                                                                <span style="color:#000;">
                                                                    Para consultas, contacte a:
                                                                </span>

                                                                <br>

                                                                <a href="mailto:oficina.internacional@uprit.edu.pe" style="color:#91001E; text-decoration: underline;">
                                                                    internationalagreements@uprit.edu
                                                                </a>
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTwoAcu">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoAcu"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoAcu">

                                                        Memorandos de Entendimiento (MOU)

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoAcu"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoAcu"
                                                    data-bs-parent="#accordionExampleAcu">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Un MOU es un documento general para documentar áreas de interés mutuo y la intención de cooperar, siendo el primer paso para establecer una colaboración.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingThreeAcu">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThreeAcu"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThreeAcu">

                                                        Redes Académicas
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeAcu"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeAcu"
                                                    data-bs-parent="#accordionExampleAcu">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Promovemos la utilización de redes nacionales e internacionales que facilitan la movilidad entrante y saliente de docentes y estudiantes a nivel internacional o intercampus.
                                                            </p>

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
                </div>
            </div>
            <div class="col-lg-4">
                <div class="edu-blog-sidebar textos-derecha">
                    <div class="edu-blog-widget widget-categories">
                        <div class="inner">
                            <h4 class="widget-title">Categorias</h4>
                            <div class="content">
                                <ul class="category-list lista-vist-sec">
                                    <li><a href="{{ route('soporte') }}">Uprit Data: Soporte Técnico </a></li>
                                    <li><a href="{{ route('salud') }}">Servicios Psicopedagógicos y Salud </a></li>
                                    <li><a href="{{ route('futbol') }}">Espacios y Servicios Deportivos</a></li>
                                    <li><a href="{{ route('talleres') }}">Talleres y Servicios Culturales</a></li>
                                    <li><a href="{{ route('becas') }}">Becas y Ayudas Financieras</a></li>
                                    <li><a href="{{ route('global') }}">Uprit Global/Internacional</a></li>
                                    <li><a href="{{ route('honors') }}">Honors College</a></li>
                                    <li><a href="{{ route('alumni') }}">Alumni - Red de Egresados</a></li>
                                    <li><a href="{{ route('programa') }}">Programa VIVE Emprededor</a></li>
                                    <li><a href="#">Uprit Store</a></li>

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