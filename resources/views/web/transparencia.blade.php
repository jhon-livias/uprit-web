@extends('web.layouts.principal')
@section('content')
<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner" style="margin-top:40px">
            <div class="page-title">
                <h1 class="title">Transparencia</h1>
            </div>
            <ul class="edu-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('web.index')}}">Inicio</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{route('transparencia')}}">Transparencia</a></li>
            </ul>
        </div>
    </div>
    
</div>
<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-12">
                <div class="privacy-policy">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="course-tab-content">
                                <div class="course-overview">


                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec" id="accordionExample" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                            viewBox="0 0 448 512" class="icon-trans" height="24"
                                                            width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M318.38 208h-39.09c-1.49 27.03-6.54 51.35-14.21 70.41 27.71-13.24 48.02-39.19 53.3-70.41zm0-32c-5.29-31.22-25.59-57.17-53.3-70.41 7.68 19.06 12.72 43.38 14.21 70.41h39.09zM224 97.31c-7.69 7.45-20.77 34.42-23.43 78.69h46.87c-2.67-44.26-15.75-71.24-23.44-78.69zm-41.08 8.28c-27.71 13.24-48.02 39.19-53.3 70.41h39.09c1.49-27.03 6.53-51.35 14.21-70.41zm0 172.82c-7.68-19.06-12.72-43.38-14.21-70.41h-39.09c5.28 31.22 25.59 57.17 53.3 70.41zM247.43 208h-46.87c2.66 44.26 15.74 71.24 23.43 78.69 7.7-7.45 20.78-34.43 23.44-78.69zM448 358.4V25.6c0-16-9.6-25.6-25.6-25.6H96C41.6 0 0 41.6 0 96v320c0 54.4 41.6 96 96 96h326.4c12.8 0 25.6-9.6 25.6-25.6v-16c0-6.4-3.2-12.8-9.6-19.2-3.2-16-3.2-60.8 0-73.6 6.4-3.2 9.6-9.6 9.6-19.2zM224 64c70.69 0 128 57.31 128 128s-57.31 128-128 128S96 262.69 96 192 153.31 64 224 64zm160 384H96c-19.2 0-32-12.8-32-32s16-32 32-32h288v64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>ESTATUTO</div>
                                                            <small>ESTATUTO (TEXTO ÚNICO ORDENO)</small>
                                                        </div>

                                                    </button>
                                                </h3>

                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson espacio-trans">

                                                            <a href="https://cdn.uprit.edu.pe/documents/1758039053078-estatuto_compressed-(1).pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>
                                                                Resolución Asamblea General de Asociados Nª005-2023-UPRIT
                                                            </a>

                                                            <a href="https://cdn.uprit.edu.pe/documents/1758642738677-aea.pdf" target="_blank" class="d-flex align-items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>
                                                                OTRO
                                                            </a>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"></path>
                                                        </svg>
                                                        <div class="ms-3 text-start">
                                                            <div>ROF </div>
                                                            <small>Reglamento de Organización y Funciones </small>
                                                        </div>
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">

                                                            <a href="https://cdn.uprit.edu.pe/documents/1758057261749-rof.pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>
                                                                Resolución del Consejo Directivo Nª 099 - 2023-UPRIT
                                                            </a>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThree"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThree">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>CONTRATO DOCENTES</div>
                                                            <small>
                                                                Reglamento de Nombramiento, Contratación,
                                                                Promoción, Ratificación y Remoción Docente
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseThree"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">

                                                            <a href="https://cdn.uprit.edu.pe/documents/1758057443729-contrato-docente_compressed.pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>
                                                                Resolución del Consejo Directivo N° 107-2023-UPRIT
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFour">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>REGLAMENTO DE DISCIPLINA DOCENTE</div>
                                                            <small>Reglamento de Disciplina Docente (Revisión 01)</small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseFour"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">

                                                            <a href="https://cdn.uprit.edu.pe/documents/1758058150053-disciplina-docente_compressed.pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>

                                                                Resolución del Consejo Directivo N° 103-2023-UPRIT
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFive">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>


                                                        <div class="ms-3 text-start">
                                                            <div>TUPA, PLAN ESTRATÉGICO INSTITUCIONAL</div>
                                                            <small>
                                                                TUPA, PLAN ESTRATÉGICO INSTITUCIONAL,
                                                                REGLAMENTOS DE LA UNIVERSIDAD PRIVADA DE TRUJILLO
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseFive"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758830760805-estatuto.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estatuto</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831053701-repau-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>REPAU 2023</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831209759-pei.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Plan Estratégico Institucional</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831398512-reglamento-general.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento General</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831475519-rof.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Organización y Funciones</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831692984-contrato-docente.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Nombramiento, Contratación, Promoción, Ratificación y Remoción Docente</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831739752-disciplina-docente.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Disciplina Docente</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831801654-disciplina-estudiante.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Disciplina Estudiante</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831847960-diversidad-y-permanencia.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento a la Diversidad y Permanencia</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831938711-grados-y-titulos.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Grados y Títulos</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758831989353-insercion-laboral.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Inserción Laboral y Seguimiento al Egresado</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832033441-prevencion-hostigamiento.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Prevención de Hostigamiento Sexual</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832094377-bienestar-universitario.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Programas de Bienestar Universitario</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832151987-investigacion-cientifica.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Investigación Científica</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832198515-fondo-editorial.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Fondo Editorial</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832244122-requisitos-idioma.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Requisitos de Idioma</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832339506-defensoria-universitaria.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de defensoría Universitaria</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832378803-admision.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Admisión</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832435427-proyeccion-social.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Programas de Proyección Social y Voluntariado</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832688756-movilidad-academica.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Movilidad Académica de Estudiantes y Docentes</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832734957-tutoria-y-permanencia.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Tutoría y Permanencia</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832782740-rit.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento Interno de Trabajo</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832838028-propiedad-intelectual.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Propiedad Intelectual</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832899244-buen-gobierno.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento del Buen Gobierno y Gestión de Riesgos Institucional</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832937222-seguridad-salud-trabajo.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Seguridad y Salud en el Trabajo</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758832978734-portal-transparencia.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Reglamento de Portal de Transparencia Universitaria</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758833251412-regadmisionyestudios-epg_r00.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>REGLAMENTO DE ADMISIÓN Y ESTUDIOS - ESCUELA DE POSGRADO</a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758833312277-reggradytitulos-posgrado.pdf">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>REGLAMENTO DE GRADOS Y TITULOS DE SEGUNDA ESPECIALIDAD PROFESIONAL - ESCUELA DE POSGRADO
                                                            </a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758833364461-regreqidiomasposgrado-r00.pdf">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>REGLAMENTO DE REQUISITO DE IDIOMAS
                                                            </a>
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1762287854960-reglamento-general-de-convalidaciones-uprit.pdf">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>REGLAMENTO GENERAL DE CONVALIDACIONES
                                                            </a>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ========================================= -->
                                            <!-- ACTAS -->
                                            <!-- ========================================= -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingSix">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSix">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>ACTAS</div>
                                                            <small>
                                                                SESIONES CONSEJO DE FACULTAD,
                                                                CONSEJO UNIVERSITARIO,
                                                                ASAMBLEA GENERAL DE ASOCIADOS
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseSix"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">

                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758833829319-20224-vista.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acuerdos de la Asamblea General de Asociados - Año 2024</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834040342-acuerdos-de-la-aga-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acuerdos de la Asamblea General de Asociados - Año 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834334319-acuerdos-de-la-aga-2022.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acuerdos de la Asamblea General de Asociados - Año 2022</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834448608-acuerdos-de-la-aga-2021.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acuerdos de la Asamblea General de Asociados - Año 2021</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834481815-acuerdos-de-la-aga-2020.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acuerdos de la Asamblea General de Asociados - Año 2020</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834510232-acuerdos-de-la-aga-2019.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acuerdos de la Asamblea General de Asociados - Año 2019</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834589255-actas-sesion-derecho-2020.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Derecho - Año 2020</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834643982-actas-consejo-universitario-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo Universitario - Año 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834683511-actas-consejo-universitario-2019.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo Universitario - Año 2019</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834746545-actas-sesion-empresariales-2019.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Ciencias Empresariales - Año 2019</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834797960-actas-sesion-derecho-2019.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Derecho - Año 2019</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758834953885-actas-sesion-ingenieria-2019.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Ingeniería - Año 2019</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835080175-actas-consejo-universitario-2018.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo Universitario - Año 2018</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835160534-actas-sesion-empresariales-2018.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Ciencias Empresariales - Año 2018</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835208771-actas-sesion-derecho-2018.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Derecho - Año 2018</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835259233-actas-sesion-ingenieria-2018.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Ingeniería - Año 2018</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835415223-actas-consejo-universitario-2017.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo Universitario - Año 2017</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835516855-actas-sesion-empresariales-2017.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Ciencias Empresariales - Año 2017</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835565705-actas-sesion-derecho-2017.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Derecho - Año 2017</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835604913-actas-sesion-ingenieria-2017.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo de la Facultad de Ingeniería - Año 2017</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835634992-actas-consejo-universitario-2016.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Acta de Sesión de Consejo Universitario - Año 2016</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1762617295862-resolucion-directoral-02-uprit.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>RESOLUCION DIRECTORAL N° 002- 2025-UPRIT</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ========================================= -->
                                            <!-- ESTADOS FINANCIEROS -->
                                            <!-- ========================================= -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingSeven">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSeven">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>ESTADOS FINANCIEROS</div>
                                                            <small>
                                                                PRESUPUESTO INSTITUCIONAL,
                                                                EJECUCIÓN PRESUPUESTAL Y BALANCES
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseSeven"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">

                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835832761-ejecución-presupuestal-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Ejecución Presupuestal 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758835964982-ejecución-presupuestal-2022.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Ejecución Presupuestal 2022</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758836222751-dictamen-eeff-2019-2020.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Dictamen Estados Financieros 2020</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758836316714-dictamen-eeff-2020-2021.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Dictamen Estados Financieros 2021</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758836338999-dictamen-eeff-2021-2022.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Dictamen Estados Financieros 2022</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758836355153-dictamen-eeff-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Dictamen Estados Financieros 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758836464128-presupuesto-institucional-2023-2029.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Presupuesto Institucional 2023-2029</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758836482329-presupuesto-operativo-institucional-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Presupuesto Operativo Institucional 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758836496928-presupuesto-operativo-institucional-2024.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Presupuesto Operativo Institucional 2024</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1778549216547-estado-de-situación-financiera-al-31-de-diciembre-de-2024.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>ESTADO DE SITUACIÓN FINANCIERA AL 31 DE DICIEMBRE DE 2024</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1778549248485-reinversión-de-excedentes-del-ejercicio-2024.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>REINVERSIÓN DE EXCEDENTES DEL EJERCICIO 2024</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingEight">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseEight">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>BECAS Y CRÉDITOS - EDUCATIVOS DISPONIBLES Y OTORGADOS</div>
                                                            <small>
                                                                BECAS Y CRÉDITOS - EDUCATIVOS DISPONIBLES Y OTORGADOS
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseEight"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">

                                                            <a href="https://cdn.uprit.edu.pe/documents/1758836629144-becas-y-recategorizacion.pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>

                                                                Reglamento de Becas y Recategorización
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingNine">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseNine">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>INVERSIONES - REINVERSIONES, DONACIONES, OBRAS DE INFRAESTRUCTURA, RECURSOS DE DIVERSA FUENTE, OTROS</div>
                                                            <small>
                                                                INVERSIONES - REINVERSIONES, DONACIONES, OBRAS DE INFRAESTRUCTURA, RECURSOS DE DIVERSA FUENTE, OTROS
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseNine"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">

                                                            <a href="https://cdn.uprit.edu.pe/documents/1758836696385-plan-inversion-infraestructura.pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>

                                                                Plan Inversion Infraestructura 2023 - 2029
                                                            </a>
                                                            <a href="https://cdn.uprit.edu.pe/documents/1778549248485-reinversión-de-excedentes-del-ejercicio-2024.pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>

                                                                REINVERSIÓN DE EXCEDENTES DEL EJERCICIO 2024
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTen">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTen">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>TASAS EDUCATIVAS - RELACIÓN DE PAGOS EXIGIDOS A LOS ALUMNOS POR TODA ÍNDOLE, SEGÚN CORRESPONDA</div>
                                                            <small>
                                                                TASAS EDUCATIVAS - RELACIÓN DE PAGOS EXIGIDOS A LOS ALUMNOS POR TODA ÍNDOLE, SEGÚN CORRESPONDA
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseTen"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">

                                                            <a href="https://cdn.uprit.edu.pe/documents/1758837802290-tasas-educativas-2025.pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>

                                                                Tasas Educativas 2025
                                                            </a>
                                                            <a href="https://cdn.uprit.edu.pe/documents/1758837812665-tasas-educativas-2024.pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>

                                                                Tasas Educativas 2024
                                                            </a>
                                                            <a href="https://cdn.uprit.edu.pe/documents/1758837820946-tasas-educativas-2023.pdf" target="_blank" class="d-flex align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>

                                                                Tasas Educativas 2023
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOnce">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOnce">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>NÚMERO DE ESTUDIANTES - MATRICULADOS Y EGRESADOS POR PROGRAMAS DE ESTUDIO</div>
                                                            <small>
                                                                NÚMERO DE ESTUDIANTES - MATRICULADOS Y EGRESADOS POR PROGRAMAS DE ESTUDIO
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseOnce"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896043815-matriculados201902.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes matriculados 2019 - II</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896080725-matriculados201901.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes matriculados 2019 - I</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896101727-matriculados201802.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes matriculados 2018 - II</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896122270-matriculados201801.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes matriculados 2018 - I</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896144342-matriculados201702.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes matriculados 2017 - II</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896333470-egesados-contabilidad-y-finanzas.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes egresados de Contabilidad y Finanzas</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896354131-egesados-derecho.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes egresados de Derecho</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896374482-egesados-ingenieria-civil.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes egresados de Ingeniería Civil</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896401154-egesados-ingenieria-de-sistemas.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes egresados de Ingeniería de Sistemas e Informática</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896423957-egesados-marketing.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Estudiantes egresados de Marketing y Negocios Internacionales</a>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingDoce">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseDoce">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>CUERPO DOCENTE - CLASE, CATEGORÍA, HOJA DE VIDA</div>
                                                            <small>
                                                                CUERPO DOCENTE - CLASE, CATEGORÍA, HOJA DE VIDA
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseDoce"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">

                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896871139-cronograma-docente-tc.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Concurso selección y contratación docentes tiempo completo</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896903050-cronograma-docente-tp.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Concurso selección y contratación docentes tiempo parcial</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896926848-bases-de-concurso-docentes---tiempo-parcial-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Bases de Concurso Docente a Tiempo Parcial 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896954486-bases-de-concurso-docentes-contratados---tiempo-parcial-2022.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Bases de Concurso Docente Contratado a Tiempo Parcial 2022</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758896978743-bases-de-concurso-docente-investigador-renacyt-2023-02.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Bases de Concurso Docente Investigador RENACYT 2023 - II</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897016091-bases-de-concurso-docentes---tiempo-completo-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Bases de Concurso Docente a Tiempo Completo 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897040151-bases-concurso-docentes---tiempo-completo-2022.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Bases de Concurso Docente a Tiempo Completo 2022</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897586082-bases-de-concurso-docente-investigador-renacyt-2023-01.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Bases de Concurso Docente Investigador RENACYT 2023 - I</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897614175-bases-de-concurso-docentes-ordinarios-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Bases de Concurso Docente Ordinario 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897642732-resolucion-de-ganador-docente-investigador-renacyt-2023-02.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Resolución de Ganador Docente Investigador RENACYT 2023 - II</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897668300-resolucion-de-ganadores-docentes-contratados---tiempo-parcial-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Resolución de Ganador Docente Contratado Tiempo Parcial 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897693977-resolucion-de-ganadores-docentes-ordinarios-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Resolución de Ganador Docente Ordinario 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897739531-resolucion-ganador-docente---tiempo-completo-2023.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Resolución de Ganador Docente a Tiempo Completo 2023</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897759364-resolucion-ganadores-docente-investigador-renacyt-2023-01.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Resolución de Ganador Docente Investigador RENACYT 2023 - I</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897803211-resolucion-ganadores-docentes-contratados---tiempo-completo-2022.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Resolución de Ganador Docente Contratado a Tiempo Completo 2022</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758897827399-resolucion-ganadores-docentes---tiempo-parcial-2022.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Resolución de Ganador Docente Contratado a Tiempo Parcial 2022</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898105452-escala-salarial.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Escala Salarial</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898120869-relacion-docentes-año-3-1.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Relación de Docentes Año 3-1</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898158277-relacion-docentes-año-2-2.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Relación de Docentes Año 2-2</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898183170-relacion-docentes-año-2-1.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Relación de Docentes Año 2-1</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898203662-relacion-docentes-año-1-2.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Relación de Docentes Año 1-2</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898220790-relacion-docentes-año-1-1.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Relación de Docentes Año 1-1</a>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTrece">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTrece">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>POSTULANTES - INGRESANTES POR AÑO Y CARRERA</div>
                                                            <small>
                                                                POSTULANTES - INGRESANTES POR AÑO Y CARRERA
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseTrece"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898527487-ingresantes-2019-02.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Postulantes e ingresantes 2019 - II</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898538879-ingresantes-2019-01.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Postulantes e ingresantes 2019 - I</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898547447-ingresantes-2018-02.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Postulantes e ingresantes 2018 - II</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898556360-ingresantes-2018-01.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Postulantes e ingresantes 2018 - I</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898566764-ingresantes-2017-02.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Postulantes e ingresantes 2017 - II</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758898585659-ingresantes-2017-01.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Postulantes e ingresantes 2017 - I</a>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingCatorce">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseCatorce">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>AMBIENTES - SERVICIOS SOCIALES, DEPORTIVOS O CULTURALES</div>
                                                            <small>
                                                                AMBIENTES - SERVICIOS SOCIALES, DEPORTIVOS O CULTURALES
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseCatorce"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758899115094-servicios-deportivos.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Ambientes destinados a brindar servicios deportivos</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758899130950-servicios-salud.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Ambientes destinados a brindar servicios de salud</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758899140698-servicios-psicopedagogicos.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Ambientes destinados a brindar servicios psicopedagógicos</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758899149374-servicios-culturales.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Ambientes destinados a brindar servicios culturales</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758899158943-servicios-sociales.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Ambientes destinados a brindar servicios sociales</a>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingQuince">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseQuince">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                        </svg>

                                                        <div class="ms-3 text-start">
                                                            <div>TRABAJA CON NOSOTROS - POSTULA A LA UPRIT</div>
                                                            <small>
                                                                TRABAJA CON NOSOTROS - POSTULA A LA UPRIT
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseQuince"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758899389234-cronograma-publicación-enero-2024.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Convocatoria enero 2024</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758899424121-cronograma-docente-tc.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Concurso selección y contratación docentes tiempo completo</a><a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1758899439407-cronograma-docente-tp.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Concurso selección y contratación docentes tiempo parcial</a>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingDieciseis">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseDieciseis">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0M6 5.5l-4.535-.442A.531.531 0 0 1 1.531 4H14.47a.531.531 0 0 1 .066 1.058L10 5.5V9l.452 6.42a.535.535 0 0 1-1.053.174L8.243 9.97c-.064-.252-.422-.252-.486 0l-1.156 5.624a.535.535 0 0 1-1.053-.174L6 9z"></path></svg>

                                                        <div class="ms-3 text-start">
                                                            <div>Defensora universitaria</div>
                                                            <small>
                                                                Defensora universitaria
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseDieciseis"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1759788265722-resolución-rectoral-n°075-2025-uprit.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>Resolución rectoral N° 075-2025-UPRIT</a>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingDiecisiete">
                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseDiecisiete">

                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 384 512" class="icon-trans" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"></path></svg>

                                                        <div class="ms-3 text-start">
                                                            <div>BANNER</div>
                                                            <small>
                                                                UPRIT-2026
                                                            </small>
                                                        </div>

                                                    </button>
                                                </h2>

                                                <div id="collapseDiecisiete"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson espacio-trans">
                                                            <a target="_blank" class="d-flex align-items-center mb-2" href="https://cdn.uprit.edu.pe/documents/1762446619345-uprit.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                    <path d="M10 9H8"></path>
                                                                    <path d="M16 13H8"></path>
                                                                    <path d="M16 17H8"></path>
                                                                </svg>UPRIT-2026</a>


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
        </div>
    </div>
</section>
@include('web.layouts.marquesina')
@endsection