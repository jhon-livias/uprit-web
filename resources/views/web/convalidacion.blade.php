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
                            Convalidaciones y Traslados
                        </h3>

                        <p style="margin-bottom:30px;">
                            ¡Continúa tu carrera con nosotros! Únete a la universidad mediante un convenio o traslado y avanza en tu formación profesional.
                        </p>
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
                                                        Acaba tu carrera en menos tiempo
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Convalida tus cursos y adelanta tu graduación.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        ¡Ya puedes venir!
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Puedes solicitar convalidaciones con al menos 1 ciclo cursado.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        ¡No te atrasas!
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Convalida hasta el 100% de tus cursos culminados. <br>

                                                                * (Varia según la universidad de origen y la carrera elegida)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                        ¡Reduce tus gastos!
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Exonera el pago de convalidación de los cursos.</p>
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
                    <div class="text-block" style="text-align: justify;">
                        <ul>
                            <li>La convalidación de estudios, tanto para traslados internos como externos, implica el reconocimiento de cursos, créditos o calificaciones que cursaste en una institución educativa técnica, pedagógico u otra universidad licenciada o no licenciada, permitiendo a los estudiantes continuar sus estudios en nuestra Universidad. <br> </li>

                            <li> La Universidad en el marco de la Ley Universitaria y su autonomía ha reglamentado el procedimiento en su Reglamento General y otros reglamentos y procedimientos específicos. Cuando se trata de postulantes con estudios previos no concluidos es requisito indispensable no haber sido dado de baja o expulsado por nuestra Universidad ni en la universidad de procedencia por motivos académicos ni disciplinarios​. <br> </li>

                            <li> <strong style="color: #000000;">Examen de Admisión. </strong>Test de Aptitudes y Vocacional, su finalidad ​es ​conocer la motivación vocacional y conocimientos básicos del postulante.​​
                            </li>
                        </ul>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Requisitos de Inscripción</h3>
                        <ul>
                            <li>Para iniciar tu proceso de convalidación, necesitarás los siguientes documentos:</li>
                        </ul>
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

                                                        Copia del DNI o Pasaporte:

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                En el caso de ser extranjero, carné de extranjería o pasaporte vigente.
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

                                                        Fotografía digital a color:

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>De frente (ropa oscura, fondo blanco, sin lentes ni gorro), tamaño pasaporte, de alta calidad y en formato JPG. La fotografía deberá tener una antigüedad menor a un mes al momento de la inscripción.
                                                            </p>
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

                                                        Certificados de estudios previos universitarios, técnicos o pedagógicos:
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>En el caso de que el postulante provenga de una universidad del extranjero, los certificados deberán estar legalizados por el Ministerio de Relaciones Exteriores del Perú, el cual exige la firma del cónsul del Perú en el país de procedencia o tener la Apostilla de La Haya. Original.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingFourSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFourSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFourSeguro">

                                                        En caso de tratarse de traslado con Estudios Universitarios previos No concluidos:
                                                    </button>

                                                </h2>

                                                <div id="collapseFourSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFourSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Constancia académica emitida por la Universidad de procedencia que indique no haber sido de baja por motivos académicos ni disciplinarios, con no más de un mes de haberse expedido.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingFiveSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFiveSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFiveSeguro">

                                                        Constancia académica:
                                                    </button>

                                                </h2>

                                                <div id="collapseFiveSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFiveSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>En la que indique día, mes y año de la primera matrícula de la universidad o institución educativa superior de procedencia.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingSixSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSixSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseSixSeguro">

                                                        Sílabos originales:
                                                    </button>

                                                </h2>

                                                <div id="collapseSixSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingSixSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Programas analíticos originales (sílabos) de las materias cursadas que el postulante con estudios previos no concluidos solicita convalidar, debidamente sellados y refrendados por la universidad de procedencia. Originales.
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
                        <h3 class="title">Modalidades de Convalidación</h3>
                    </div>
                    <div class="tab-content" id="myTabContentLider">

                        <div class="tab-pane fade show active"
                            id="overviewLider"
                            role="tabpanel"
                            aria-labelledby="overview-tab-lider">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleLider"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneLider">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneLider"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneLider">

                                                        1. Por competencias (automática)

                                                    </button>

                                                </h3>

                                                <div id="collapseOneLider"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOneLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p style="text-align: justify;">Lo solicitan en caso de optar por una segunda carrera postulantes egresados de la UPRIT y/o de otras Universidades, así como también Titulados de institutos técnicos y/o pedagógicos. Se ejecuta de acuerdo al reglamento y procedimiento respectivo vigente verificando la correspondencia en el logro de competencias en su primera carrera profesional y/o técnica concluida. Los procedimientos regulan los plazos mínimos a estudiar y/o créditos máximos a convalidar, que suelen corresponder en pregrado con estudios por completar en periodos de 1 año, 2 años o 2 y medio años. Es automática en caso de egresados de la Uprit y provenientes de instituciones educativas con convenio vigente con nuestra Universidad sobre la materia.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTwoLider">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoLider"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoLider">

                                                        2. Por examen de suficiencia

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p style="text-align: justify;">Los solicitan estudiantes y/o postulantes que tienen experiencia laboral y/o dominio en el campo de la materia del curso. Se ejecuta de acuerdo al reglamento y procedimiento respectivo vigente, por curso y hasta un máximo de cinco cursos.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingThreeLider">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThreeLider"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThreeLider">

                                                        3. Por correspondencia silábica
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p style="text-align: justify;">Se aplica en casos de solicitudes de postulantes con estudios previos no concluidos en otras Universidades. Es un proceso en el que se verifica la similitud de contenidos y competencias entre los planes de estudios de ambas instituciones.
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
                        <h3 class="title">Pasos del Procedimiento</h3>
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

                                                        1. Inscripción y Admisión:

                                                    </button>
                                                </h3>

                                                <div id="collapseExperienciaOne"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="headingExperienciaOne"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>El postulante completa los requisitos de admisión y test correspondiente y podrá ser admitido con Matricula Condicionada por la Dirección de Registro académico.
                                                            </p>
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

                                                        2. Verificación y Evaluación:

                                                    </button>

                                                </h2>

                                                <div id="collapseExperienciaTwo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaTwo"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>El área de admisión revisará tu expediente y lo remitirá a las facultades. Se realizará una proforma de convalidación, indicando los cursos convalidados y los pendientes.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Item 2 -->
                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperienciaTres">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperienciaTres"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperienciaTres">

                                                        3. Aceptación y Exámenes (Opcional):

                                                    </button>

                                                </h2>

                                                <div id="collapseExperienciaTres"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaTres"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Si solicitó la convalidación de estudios previos concluidos o no concluidos, el área de admisión verificará el cumplimiento de requisitos y remitirá el expediente a las facultades respectivas y/o escuela de posgrado.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Item 2 -->
                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperienciaCuatro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperienciaCuatro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperienciaCuatro">

                                                        4. Preconvalidación:

                                                    </button>

                                                </h2>

                                                <div id="collapseExperienciaCuatro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaCuatro"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p> Las facultades y/o escuela de posgrado realizarán la proforma de convalidación (preconvalidación) con la indicación de cursos no convalidados, y los cursos convalidados con la nota respectiva, así como también los cursos que tienes opción a convalidar por examen de suficiencia complementario. Esta es remitida al postulante para su aceptación. Este podrá solicitar la revisión de la misma adjuntando nuevos medios sustentatorios para revisión.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Item 2 -->
                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperienciaCinco">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperienciaCinco"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperienciaCinco">

                                                        5. Exámen de Convalidación:

                                                    </button>

                                                </h2>

                                                <div id="collapseExperienciaCinco"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaCinco"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Las Facultades programarán y tomarán examen de convalidación por suficiencia en caso lo solicite el estudiante, por curso.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Item 2 -->
                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperienciaSeis">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperienciaSeis"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperienciaSeis">

                                                        6. Resolución Final:

                                                    </button>

                                                </h2>

                                                <div id="collapseExperienciaSeis"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaSeis"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Completado el procedimiento se emitirá la resolución decanal o de la escuela de posgrado respectiva, la misma que se remite a la Dirección de Registro académico.
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
                        <h3 class="title">Notas Importantes</h3>
                    </div>
                    <div class="tab-content" id="myTabContentNotas">

                        <div class="tab-pane fade show active"
                            id="overviewNotas"
                            role="tabpanel"
                            aria-labelledby="overview-tab-notas">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleNotas"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneNotas">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneNotas"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneNotas">

                                                        Traducciones

                                                    </button>

                                                </h3>

                                                <div id="collapseOneNotas"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOneNotas"
                                                    data-bs-parent="#accordionExampleNotas">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p style="text-align: justify;">Todos los documentos expedidos en otro idioma deberán ser traducidos oficialmente al español y adjuntar la equivalencia de notas al sistema vigesimal.
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingTwoNotas">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoNotas"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoNotas">

                                                        Documentación

                                                    </button>

                                                </h3>

                                                <div id="collapseTwoNotas"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoNotas"
                                                    data-bs-parent="#accordionExampleNotas">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p style="text-align: justify;">Para ingresantes por la modalidad de Traslados, únicamente se evaluarán la convalidación de los cursos cuyos programas analíticos (sílabos) sean presentados de acuerdo con el calendario de formalización de ingreso y sean previamente declarados en la inscripción (mediante el formato de declaración de asignaturas cursadas en la universidad de origen). Solo se recibirá la documentación de la última universidad en la cual el postulante estuvo matriculado, y se considerarán los cursos aprobados durante la última carrera cursada. La convalidación Se ejecuta de acuerdo al reglamento y procedimiento respectivo vigente cursos es inapelable.
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
                                    <li><a href="{{ route('convalidacion') }}">Convalidaciones / Traslados</a></li>
                                    <li><a href="{{ route('doble-grado') }}">Programas Doble Grado</a></li>
                                    <li><a href="{{ route('beca18') }}">Beca18</a></li>
                                    <li><a href="{{ route('intercambio-peru') }}">Tu intercambio en Perú</a></li>
                                    <li><a href="{{ route('taller-titulacion') }}">Taller de Titulación</a></li>
                                    <li><a href="">Vive Previamente Nuestras Carreras</a></li>
                                    <li><a href="#">Prospecto de Admisión</a></li>
                                    <li><a href="#">Resultados Admisión</a></li>
                                    <li><a href="{{ route('asesores') }}">Asesores de Admisión</a></li>
                                    <li><a href="#">Registra Amigo Referido</a></li>
                                    <li><a href="#">Prematricúlate</a></li>

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