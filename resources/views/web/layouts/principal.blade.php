<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UPRIT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('web/imagenes/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/magnifypopup.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/animation.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/jqueru-ui-min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/vendor/tipped.min.css')}}">

    <link rel="stylesheet" href="{{asset('web/assets/css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/opendyslexic@1.0.3/opendyslexic.min.css">
    @yield('styles')
</head>

<body class="sticky-header">


    <div id="edublink-preloader">
        <div class="loading-logo">
            <img
                class="logo-light"
                src="{{ asset('web/imagenes/logo_uprit_light.svg') }}"
                alt="Corporate Logo">
        </div>
    </div>

    <div id="main-wrapper" class="main-wrapper">

        @include('web.layouts.header')

        @yield('content')

        @include('web.layouts.footer')

    </div>

    <div class="rn-progress-parent">
        <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewbox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('web/assets/js/vendor/modernizr.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/jquery.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/sal.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/jquery.waypoints.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/backtotop.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/magnifypopup.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/jQuery.rProgressbar.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/easypie.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/odometer.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/isotop.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/imageloaded.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/lightbox.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/paralax.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/paralax-scroll.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/svg-inject.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/vivus.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/tipped.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/smooth-scroll.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/isInViewport.jquery.min.js')}}"></script>
    @yield('scripts')
    <script src="{{asset('web/assets/js/app.js')}}"></script>
    <script defer="" src="beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516" integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg==" data-cf-beacon='{"version":"2024.11.0","token":"a20ec01fca4642afae77adbf9c39fb58","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".brandSwiper", {
            slidesPerView: 7,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                },
                576: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 7,
                }
            }
        });
    </script>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header-mainmenu');

            if (window.scrollY > 50) {
                header.classList.add('sticky-active');
            } else {
                header.classList.remove('sticky-active');
            }
        });

        let lastScrollTop = 0;

        window.addEventListener("scroll", function() {
            let st = window.pageYOffset || document.documentElement.scrollTop;

            if (st > lastScrollTop) {
                document.body.classList.remove("scroll-up");
                document.body.classList.add("scroll-down");
            } else {
                document.body.classList.remove("scroll-down");
                document.body.classList.add("scroll-up");
            }

            lastScrollTop = st <= 0 ? 0 : st;
        });
    </script>
    <script>
        const buttons = document.querySelectorAll('.cat-btn');

        buttons.forEach(btn => {

            btn.addEventListener('mouseenter', () => {

                document
                    .querySelectorAll('.cat-btn')
                    .forEach(b => b.classList.remove('active'));

                document
                    .querySelectorAll('.mega-box')
                    .forEach(box => box.classList.remove('active'));

                btn.classList.add('active');

                document
                    .getElementById(btn.dataset.target)
                    .classList.add('active');

            });

        });
    </script>
    <script>
        const accordions = document.querySelectorAll('.footer-accordion');

        accordions.forEach(item => {

            const button = item.querySelector('.footer-accordion-btn');

            button.addEventListener('click', () => {

                item.classList.toggle('active');

            });

        });
    </script>
    <!-- Modo oscuro -->
    <script>
        document.addEventListener("click", function(e) {

            const button = e.target.closest("#darkModeToggle");

            if (!button) return;

            e.preventDefault();
            e.stopPropagation();

            const darkModeIcon =
                document.getElementById("darkModeIcon");

            document.body.classList.toggle("dark-mode");

            if (document.body.classList.contains("dark-mode")) {

                darkModeIcon.setAttribute(
                    "icon",
                    "mdi:white-balance-sunny"
                );

            } else {

                darkModeIcon.setAttribute(
                    "icon",
                    "mdi:moon-waning-crescent"
                );
            }

        });
    </script>
    <script>
        new Swiper(".swiper-ciclos", {
            slidesPerView: 1,
            spaceBetween: 25,

            loop: false,

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {

                768: {
                    slidesPerView: 2,
                },

                1200: {
                    slidesPerView: 2,
                }

            }
        });

        const accessibilityBtn = document.getElementById("accessibilityBtn");
        const accessibilityMenu = document.getElementById("accessibilityMenu");
        const closeAccessibility = document.getElementById("closeAccessibility");

        accessibilityBtn.addEventListener("click", () => {
            accessibilityMenu.classList.add("active");
        });

        closeAccessibility.addEventListener("click", () => {
            accessibilityMenu.classList.remove("active");
        });
    </script>
    <!-- Contraste -->
    <script>
        const contrastBtn = document.getElementById("contrastBtn");
        const contrastText = document.getElementById("contrastText");
        const contrastIcon = document.getElementById("contrastIcon");

        const contrastModes = [{
                text: "Contraste Normal",
                icon: "mdi:brightness-6",
                className: "contrast-normal"
            },
            {
                text: "Contraste Alto",
                icon: "mdi:contrast-circle",
                className: "contrast-high"
            },
            {
                text: "Contraste Oscuro",
                icon: "mdi:weather-night",
                className: "contrast-dark"
            },
            {
                text: "Contraste de Luz",
                icon: "mdi:white-balance-sunny",
                className: "contrast-light"
            }
        ];

        let contrastIndex = 0;

        contrastBtn.addEventListener("click", () => {
            document.body.classList.remove(...contrastModes.map(m => m.className));

            contrastIndex = (contrastIndex + 1) % contrastModes.length;
            const currentMode = contrastModes[contrastIndex];

            contrastText.textContent = currentMode.text;
            contrastIcon.setAttribute("icon", currentMode.icon);
            document.body.classList.add(currentMode.className);
        });
    </script>
    <!-- Tamaño Letra -->
    <script>
        const fontSizeRange = document.getElementById("fontSizeRange");


        fontSizeRange.addEventListener("input", function() {

            const scale = this.value / 16;

            document.body.style.zoom = scale;

        });
    </script>
    <!-- Altura Línea -->
    <script>
        const lineHeightBtn = document.getElementById("lineHeightBtn");
        const lineHeightText = document.getElementById("lineHeightText");


        const lineHeights = [
            1,
            1.4,
            1.8,
            2.2,
            2.6,
            3,
            3.2
        ];

        let lineHeightIndex = 0;


        lineHeightBtn.addEventListener("click", (e) => {

            e.preventDefault();
            e.stopPropagation();

            lineHeightIndex++;


            if (lineHeightIndex >= lineHeights.length) {
                lineHeightIndex = 0;
            }

            const currentLineHeight = lineHeights[lineHeightIndex];



            document.body.style.lineHeight = currentLineHeight;



            lineHeightText.textContent =
                `Altura de línea: ${currentLineHeight}`;

        });
    </script>
    <!-- Ocultar Imágenes -->
    <script>
        const hideImagesBtn = document.getElementById("hideImagesBtn");
        const hideImagesText = document.getElementById("hideImagesText");
        const hideImagesIcon = document.getElementById("hideImagesIcon");

        let imagesHidden = false;

        hideImagesBtn.addEventListener("click", (e) => {

            e.preventDefault();
            e.stopPropagation();

            imagesHidden = !imagesHidden;

            document.body.classList.toggle(
                "hide-all-images",
                imagesHidden
            );

            hideImagesText.textContent = imagesHidden ?
                "Mostrar imágenes" :
                "Ocultar imágenes";

            hideImagesIcon.setAttribute(
                "icon",
                imagesHidden ?
                "mdi:image-outline" :
                "mdi:image-off-outline"
            );

        });
    </script>
    <!-- Cursor -->
    <script>
        const cursorBtn = document.getElementById("cursorBtn");
        const cursorText = document.getElementById("cursorText");
        const cursorIcon = document.getElementById("cursorIcon");
        const bigCursor = document.getElementById("bigCursor");

        const readingGuide = document.getElementById("readingGuide");
        const readingMask = document.getElementById("readingMask");


        const cursorModes = [{
                text: "Cursor: Normal",
                icon: "mdi:cursor-default-outline",
                className: "cursor-normal"
            },
            {
                text: "Cursor: Más Grande",
                icon: "mdi:cursor-default-click-outline",
                className: "cursor-large"
            },
            {
                text: "Cursor: Guía de Lectura",
                icon: "mdi:format-line-spacing",
                className: "cursor-reading-guide"
            },
            {
                text: "Cursor: Máscara de Lectura",
                icon: "mdi:book-open-page-variant-outline",
                className: "cursor-reading-mask"
            }
        ];

        let cursorIndex = 0;


        cursorBtn.addEventListener("click", (e) => {

            e.preventDefault();
            e.stopPropagation();

            cursorIndex++;

            if (cursorIndex >= cursorModes.length) {
                cursorIndex = 0;
            }

            const currentMode = cursorModes[cursorIndex];


            cursorText.textContent = currentMode.text;


            cursorIcon.setAttribute(
                "icon",
                currentMode.icon
            );


            document.body.classList.remove(
                "cursor-normal",
                "cursor-large",
                "cursor-reading-guide",
                "cursor-reading-mask"
            );


            document.body.classList.add(currentMode.className);

        });


        document.addEventListener("mousemove", (e) => {

            bigCursor.style.left = e.clientX + "px";
            bigCursor.style.top = e.clientY + "px";


            readingGuide.style.top = e.clientY + "px";


            if (
                document.body.classList.contains(
                    "cursor-reading-mask"
                )
            ) {

                readingMask.style.setProperty(
                    "--mask-position",
                    `${e.clientY}px`
                );

            }


        });
    </script>
    <!-- Dislexia -->
    <script>
        const dyslexiaBtn = document.getElementById("dyslexiaBtn");
        const dyslexiaText = document.getElementById("dyslexiaText");
        const dyslexiaIcon = document.getElementById("dyslexiaIcon");

        let dyslexiaEnabled = false;

        dyslexiaBtn.addEventListener("click", (e) => {

            e.preventDefault();
            e.stopPropagation();

            dyslexiaEnabled = !dyslexiaEnabled;

            document.body.classList.toggle(
                "dyslexia-mode",
                dyslexiaEnabled
            );

            dyslexiaText.textContent = dyslexiaEnabled ?
                "Dislexia: Activado" :
                "Apto para dislexia";


            dyslexiaIcon.setAttribute(
                "icon",
                dyslexiaEnabled ?
                "mdi:alphabetical-off" :
                "mdi:alphabetical-variant"
            );

        });
    </script>
    <!-- Resaltar enlaces -->
    <script>
        const highlightLinksBtn =
            document.getElementById("highlightLinksBtn");

        const highlightLinksText =
            document.getElementById("highlightLinksText");

        const highlightLinksIcon =
            document.getElementById("highlightLinksIcon");

        let linksHighlighted = false;

        highlightLinksBtn.addEventListener("click", (e) => {

            e.preventDefault();
            e.stopPropagation();

            linksHighlighted = !linksHighlighted;

            document.body.classList.toggle(
                "highlight-links",
                linksHighlighted
            );


            highlightLinksText.textContent =
                linksHighlighted ?
                "Resaltar enlaces: Activado" :
                "Resaltar enlaces";


            highlightLinksIcon.setAttribute(
                "icon",
                linksHighlighted ?
                "mdi:link" :
                "mdi:link-variant"
            );

        });
    </script>
    <!-- Detener animaciones -->
    <script>
        const stopAnimationsBtn =
            document.getElementById("stopAnimationsBtn");

        const stopAnimationsText =
            document.getElementById("stopAnimationsText");

        const stopAnimationsIcon =
            document.getElementById("stopAnimationsIcon");

        let animationsStopped = false;


        const heroSwiper = document.querySelector(
            ".university-activator"
        )?.swiper;


        function toggleVideosPause(shouldPause) {

            document.querySelectorAll("video")
                .forEach(video => {

                    if (shouldPause) {

                        video.pause();

                    } else {

                        video.play().catch(() => {});

                    }

                });

        }


        stopAnimationsBtn.addEventListener("click", (e) => {

            e.preventDefault();
            e.stopPropagation();

            animationsStopped = !animationsStopped;


            document.body.classList.toggle(
                "stop-animations",
                animationsStopped
            );


            if (heroSwiper) {

                if (animationsStopped) {

                    heroSwiper.autoplay.stop();

                } else {

                    heroSwiper.autoplay.start();

                    heroSwiper.update();

                }

            }


            toggleVideosPause(animationsStopped);


            stopAnimationsText.textContent =
                animationsStopped ?
                "Activar animaciones" :
                "Detener animaciones";


            stopAnimationsIcon.setAttribute(
                "icon",
                animationsStopped ?
                "mdi:play-circle-outline" :
                "mdi:pause-circle-outline"
            );

        });
    </script>
    <!-- Detener todo -->
    <script>
        const resetAccessibility =
            document.getElementById("resetAccessibility");

        /* RESET */

        resetAccessibility.addEventListener("click", (e) => {

            e.preventDefault();
            e.stopPropagation();


            contrastIndex = 0;

            contrastText.textContent =
                "Contraste Normal";

            contrastIcon.setAttribute(
                "icon",
                "mdi:brightness-6"
            );

            document.body.classList.remove(
                "contrast-normal",
                "contrast-high",
                "contrast-dark",
                "contrast-light"
            );

            document.body.classList.add(
                "contrast-normal"
            );


            fontSizeRange.value = 16;

            document.documentElement.style.fontSize =
                "16px";

            lineHeightIndex = 0;

            document.body.style.lineHeight = "1";

            lineHeightText.textContent =
                "Altura de línea: 1";


            imagesHidden = false;

            document.body.classList.remove(
                "hide-all-images"
            );

            hideImagesText.textContent =
                "Ocultar imágenes";

            hideImagesIcon.setAttribute(
                "icon",
                "mdi:image-off-outline"
            );


            cursorIndex = 0;

            document.body.classList.remove(
                "cursor-normal",
                "cursor-large",
                "cursor-reading-guide",
                "cursor-reading-mask"
            );

            document.body.classList.add(
                "cursor-normal"
            );

            cursorText.textContent =
                "Cursor: Normal";

            cursorIcon.setAttribute(
                "icon",
                "mdi:cursor-default-outline"
            );


            dyslexiaEnabled = false;

            document.body.classList.remove(
                "dyslexia-mode"
            );

            dyslexiaText.textContent =
                "Apto para dislexia";

            dyslexiaIcon.setAttribute(
                "icon",
                "mdi:alphabetical-variant"
            );


            linksHighlighted = false;

            document.body.classList.remove(
                "highlight-links"
            );

            highlightLinksText.textContent =
                "Resaltar enlaces";

            highlightLinksIcon.setAttribute(
                "icon",
                "mdi:link-variant"
            );


            animationsStopped = false;

            document.body.classList.remove(
                "stop-animations"
            );

            stopAnimationsText.textContent =
                "Detener animaciones";

            stopAnimationsIcon.setAttribute(
                "icon",
                "mdi:pause-circle-outline"
            );


            document.querySelectorAll("video")
                .forEach(video => {

                    video.play().catch(() => {});

                });


            if (typeof heroSwiper !== "undefined" &&
                heroSwiper) {

                heroSwiper.autoplay.start();

                heroSwiper.update();
            }

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const left = document.querySelector('.blog-left');
            const right = document.querySelector('.blog-right');
            const section = document.querySelector('.edu-blog-area');

            const observer = new IntersectionObserver((entries) => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        left.classList.add('active');
                        right.classList.add('active');

                    } else {

                        left.classList.remove('active');
                        right.classList.remove('active');

                    }

                });

            }, {
                threshold: 0.25
            });

            observer.observe(section);

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const modal = document.getElementById("chatbotModal");
            const closeBtn = document.getElementById("closeChatbot");
            const contactoBtn = document.getElementById("contactoBtn");
            console.log(contactoBtn);
            const chatResponse = document.getElementById("chatResponse");
            let historial = [];
            let carreraSeleccionada = "";
            let categoriaSeleccionada = null;
            const nivelesAcademicos = @json($nivelAcademico);
            const pregradoCategorias = @json($pregradoCategorias);
            const pregradoPuedeCategorias = @json($pregradoPuedeCategorias);
            const posgradoCategorias = @json($posgradoCategorias);

            const menu = {

                principal: nivelesAcademicos.map(
                    nivel => ({
                        id: nivel.id,
                        nombre: nivel.nombre
                    })
                ),

                pregrado: pregradoCategorias.map(
                    categoria => ({
                        id: categoria.id,
                        nombre: categoria.nombre
                    })
                ),

                pregradoPE: pregradoPuedeCategorias.map(
                    categoria => ({
                        id: categoria.id,
                        nombre: categoria.nombre
                    })
                ),

                posgrado: posgradoCategorias.map(
                    categoria => ({
                        id: categoria.id,
                        nombre: categoria.nombre
                    })
                )
            };

            const menusPorNivel = {
                "Pregrado": menu.pregrado,
                "Pregrado Puede": menu.pregradoPE,
                "Posgrado": menu.posgrado
            };

            const categoriasPosgrado = {};
            const carreras = {};

            pregradoCategorias.forEach(categoria => {
                carreras[categoria.id] = categoria.carreras;
            });

            pregradoPuedeCategorias.forEach(categoria => {
                carreras[categoria.id] = categoria.carreras;
            });

            posgradoCategorias.forEach(categoria => {

                categoriasPosgrado[categoria.nombre] =
                    categoria.hijos.map(hijo => ({
                        id: hijo.id,
                        nombre: hijo.nombre
                    }));

                categoria.hijos.forEach(hijo => {

                    carreras[hijo.id] = hijo.carreras ?? [];

                });

            });
            const opcionesCarrera = [
                "Información General",
                "Descripción",
                "Malla Curricular",
                "Nuestros Docentes",
            ];

            function mostrarDetalleCiclo(ciclo, carrera) {

                const cursos = ciclo.cursos ?? [];

                const cursosHTML = cursos
                    .map(curso => `
        <div class="bot-bubble-derecha">
            ✦ ${curso}
        </div>
    `)
                    .join('');

                chatResponse.innerHTML = `

        <div class="bot-bubble-izquierda bot-title">
            🧐 ${ciclo.ciclo}
        </div>

        ${
            ciclo.descripcion
            ? `
                <div class="bot-bubble-derecha">

                    ${ciclo.descripcion}

                </div>
            `
            : ''
        }

        ${
            cursos.length
            ? `
                <div class="bot-bubble-izquierda">
                🎓 Cursos del ciclo
                </div>

                ${cursosHTML}
            `
            : ''
        }

        ${infoExtraCarrera(carrera)}

        <div class="chat-actions">

            <button
                class="chat-back"
                id="volverMalla">

                <iconify-icon
                    icon="mdi:arrow-left">
                </iconify-icon>

                Volver

            </button>

            <button
                class="chat-finish"
                id="finalizarChat">

                Finalizar

            </button>

        </div>
    `;

                document
                    .getElementById('volverMalla')
                    .addEventListener('click', () => {

                        mostrarRespuesta(
                            'Malla Curricular',
                            carrera
                        );

                    });

                document
                    .getElementById('finalizarChat')
                    .addEventListener('click', () => {

                        historial = [];
                        carreraSeleccionada = null;

                        renderMenu(menu.principal);

                    });

            }

            function mostrarPregunta(pregunta, carrera) {

                chatResponse.innerHTML = `

                    <div class="bot-bubble-izquierda">

                        <img src="{{asset('web/imagenes/pensar.gif')}}" alt="" width="20"> ${pregunta.pregunta}

                    </div>

                    <div class="bot-bubble-derecha">

                        ✅ ${pregunta.respuesta}

                    </div>

                    ${infoExtraCarrera(carrera)}

                    <div class="chat-actions">

                        <button
                            class="chat-back"
                            id="volverPreguntas">

                            <iconify-icon
                                icon="mdi:arrow-left">
                            </iconify-icon>

                            Volver

                        </button>

                        <button
                            class="chat-finish"
                            id="finalizarChat">

                            Finalizar

                        </button>

                    </div>

                `;

                document
                    .getElementById('volverPreguntas')
                    .addEventListener('click', () => {

                        mostrarRespuesta(
                            'Preguntas Frecuentes',
                            carrera
                        );

                    });

                document
                    .getElementById('finalizarChat')
                    .addEventListener('click', () => {

                        historial = [];
                        carreraSeleccionada = null;

                        renderMenu(menu.principal);

                    });

            }

            function infoExtraCarrera(carrera) {

                return `

                    <div class="bot-bubble-izquierda">

                        <img src="{{asset('web/imagenes/sonri.gif')}}" alt="" width="20">📱 ¿Deseas comunicarte con un asesor?

                        <div class="chat-links">

                            <a
                                href="https://wa.me/51999999999"
                                target="_blank"
                                class="mini-action whatsapp">

                                <iconify-icon
                                    icon="mdi:whatsapp">
                                </iconify-icon>

                                WhatsApp

                            </a>

                        </div>

                    </div>

                    <div class="bot-bubble-derecha">

                        <img src="{{asset('web/imagenes/gino.gif')}}" alt="" width="20"> También puedes revisar toda la información de la carrera.

                        <div class="chat-links">

                            <a
                                href="/detalle-carrera/${carrera.id}"
                                target="_blank"
                                class="mini-action info">

                                <iconify-icon
                                    icon="mdi:open-in-new">
                                </iconify-icon>

                                Ver carrera

                            </a>

                        </div>

                    </div>

                `;
            }

            function mostrarRespuesta(opcion, carrera) {

                let contenido = '';

                switch (opcion) {

                    case "Información General":

                        contenido = `

                        <div class="bot-bubble-izquierda bot-title">
                            <img src="{{asset('web/imagenes/lentes.gif')}}" alt="" width="20"> ${carrera.nombre}
                        </div>

                        <div class="bot-bubble-derecha">
                            📅 La fecha de admisión es:
                            <strong>${carrera.admision ?? '-'}</strong>
                        </div>

                        <div class="bot-bubble-izquierda">
                            ⌛ La duración de la carrera es:
                            <strong>${carrera.duracion ?? '-'}</strong>
                        </div>

                        <div class="bot-bubble-derecha">
                            🎓 El grado obtenido es:
                            <strong>${carrera.grado_obtenido ?? '-'}</strong>
                        </div>

                        <div class="bot-bubble-izquierda">
                            📜 La titulación otorgada es:
                            <strong>${carrera.titulacion ?? '-'}</strong>
                        </div>

                        <div class="bot-bubble-derecha">
                            💡 La modalidad es:
                            <strong>${carrera.modalidades ?? '-'}</strong>
                        </div>

                        ${infoExtraCarrera(carrera)}
                        `;

                        break;

                    case "Descripción":
                        const oportunidades =
                            carrera.detalle_descripcion?.oportunidades ?? [];

                        const oportunidadesHTML = oportunidades
                            .map(item => `
                                <li>${item}</li>
                            `)
                            .join('');
                        contenido = `

                        <div class="bot-bubble-izquierda bot-title">
                            📖 Descripción de la carrera
                        </div>

                        <div class="bot-bubble-derecha">

                            ${carrera.detalle_descripcion?.descripcion ??
                            'Información no disponible.'}

                        </div>

                        ${
                            carrera.detalle_descripcion?.oportunidades
                            ? `
                                <div class="bot-bubble-izquierda">

                                    💼 Oportunidades profesionales

                                    <strong>
                                        Con esta carrera podrás desempeñarte en:
                                    </strong>

                                    <ul class="career-list">
                                        ${oportunidadesHTML}
                                    </ul>

                                </div>
                            `
                            : ''
                        }

                        ${infoExtraCarrera(carrera)}
                    `;

                        break;

                    case "Perfil de Egresado":

                        contenido = `

                        <div class="bot-bubble-izquierda">
                            Me preguntaste por el perfil de egresado 👨‍🎓
                        </div>

                        <div class="bot-bubble-derecha">

                            ${
                                carrera.perfil_egresado?.descripcion
                                ?? 'Información no disponible.'
                            }

                        </div>

                        <div class="bot-bubble-izquierda">

                            💡 Este perfil describe las competencias,
                            conocimientos y habilidades que desarrollarás
                            al culminar tu formación profesional.

                        </div>

                        ${infoExtraCarrera(carrera)}
                    `;

                        break;

                    case "Nuestros Docentes":

                        contenido = `
    <div class="bot-bubble-izquierda bot-title">
        👨‍🏫 Nuestros Docentes
    </div>
`;

                        carrera.docentes.forEach(docente => {

                            contenido += `

        <div class="bot-bubble-derecha docente-bubble">

            <strong>
                ${docente.nombre}
            </strong>

            ${
                docente.tags
                ? `
                    <div class="docente-item">
                        🏷️ ${docente.tags}
                    </div>
                `
                : ''
            }

            ${
                docente.correo
                ? `
                    <div class="docente-item">
                        📧 ${docente.correo}
                    </div>
                `
                : ''
            }

            ${
                docente.departamento
                ? `
                    <div class="docente-item">
                        🏢 ${docente.departamento}
                    </div>
                `
                : ''
            }

        </div>
    `;
                        });

                        contenido += infoExtraCarrera(carrera);

                        break;

                    case "Malla Curricular":

                        let htmlMalla = `
                <div class="chat-options">
            `;

                        carrera.malla.forEach((ciclo, index) => {

                            htmlMalla += `
                    <button
                        class="chat-card ciclo-btn"
                        data-index="${index}">

                        ${ciclo.ciclo}

                    </button>
                `;

                        });

                        htmlMalla += `
                </div>

                <button
                    class="chat-back"
                    id="volverOpciones">

                    <iconify-icon
                        icon="mdi:arrow-left">
                    </iconify-icon>

                    Volver

                </button>
            `;

                        chatResponse.innerHTML = htmlMalla;

                        document
                            .querySelectorAll('.ciclo-btn')
                            .forEach(btn => {

                                btn.addEventListener('click', () => {

                                    const ciclo =
                                        carrera.malla[
                                            btn.dataset.index
                                        ];

                                    mostrarDetalleCiclo(
                                        ciclo,
                                        carrera
                                    );

                                });

                            });

                        document
                            .getElementById('volverOpciones')
                            .addEventListener('click', () => {

                                mostrarOpcionesCarrera(
                                    carrera
                                );

                            });

                        return;

                    case "Preguntas Frecuentes":

                        let htmlPreguntas = `
                <div class="chat-options">
            `;

                        carrera.preguntas.forEach((pregunta, index) => {

                            htmlPreguntas += `
                    <button
                        class="chat-card pregunta-btn"
                        data-index="${index}">

                        ${pregunta.pregunta}

                    </button>
                `;

                        });

                        htmlPreguntas += `
                </div>

                <button
                    class="chat-back"
                    id="volverOpciones">

                    <iconify-icon
                        icon="mdi:arrow-left">
                    </iconify-icon>

                    Volver

                </button>
            `;

                        chatResponse.innerHTML = htmlPreguntas;

                        document
                            .querySelectorAll('.pregunta-btn')
                            .forEach(btn => {

                                btn.addEventListener('click', () => {

                                    const pregunta =
                                        carrera.preguntas[
                                            btn.dataset.index
                                        ];

                                    mostrarPregunta(
                                        pregunta,
                                        carrera
                                    );

                                });

                            });

                        document
                            .getElementById('volverOpciones')
                            .addEventListener('click', () => {

                                mostrarOpcionesCarrera(
                                    carrera
                                );

                            });

                        return;
                }

                chatResponse.innerHTML = `
                    <div class="chat-message">

                        ${contenido}

                        <div class="chat-actions">

                            <button
                                class="chat-back"
                                id="volverOpciones">

                                <iconify-icon
                                    icon="mdi:arrow-left">
                                </iconify-icon>

                                Volver

                            </button>

                            <button
                                class="chat-finish"
                                id="finalizarChat">

                                Finalizar

                            </button>

                        </div>

                    </div>
                `;

                document
                    .getElementById('volverOpciones')
                    .addEventListener('click', () => {

                        mostrarOpcionesCarrera(
                            carrera
                        );

                    });

                document
                    .getElementById('finalizarChat')
                    .addEventListener('click', () => {

                        historial = [];
                        carreraSeleccionada = null;

                        renderMenu(menu.principal);

                    });

            }

            function renderMenu(opciones, volver = false) {

                let html = `<div class="chat-options">`;

                opciones.forEach(opcion => {

                    html += `
        <button
            class="chat-card"
            data-id="${opcion.id}"
            data-opcion="${opcion.nombre}">

            ${opcion.nombre}

        </button>
    `;
                });

                html += `</div>`;

                if (volver) {
                    html += `
            <button class="chat-back" id="volverMenu">
                <iconify-icon icon="mdi:arrow-left"></iconify-icon>
                            Volver
            </button>
        `;
                }

                chatResponse.innerHTML = html;

                asignarEventos();
            }

            function asignarEventos() {

                document.querySelectorAll(".chat-card").forEach(btn => {

                    btn.addEventListener("click", () => {

                        const opcion = btn.dataset.opcion;
                        const categoriaId = btn.dataset.id;
                        if (menusPorNivel[opcion]) {

                            historial.push(menu.principal);

                            renderMenu(
                                menusPorNivel[opcion],
                                true
                            );

                            return;
                        }
                        if (categoriasPosgrado[opcion]) {

                            historial.push(menu.posgrado);

                            renderMenu(
                                categoriasPosgrado[opcion],
                                true
                            );

                            return;
                        }
                        switch (opcion) {

                            default:

                                if (carreras[categoriaId]) {

                                    categoriaSeleccionada = categoriaId;

                                    mostrarBuscador(categoriaId);

                                    return;
                                }


                        }

                    });

                });

                const volver = document.getElementById("volverMenu");

                if (volver) {

                    volver.addEventListener("click", () => {

                        if (historial.length > 0) {

                            const menuAnterior = historial.pop();

                            renderMenu(
                                menuAnterior,
                                historial.length > 0
                            );

                        } else {

                            renderMenu(menu.principal, false);

                        }

                    });

                }

            }

            function mostrarBuscador(categoriaId) {
                categoriaSeleccionada = categoriaId;
                const carrerasFacultad =
                    carreras[categoriaId] || [];
                historial.push(menu.principal);

                chatResponse.innerHTML = `
                <div class="buscador-container">

                    <input
                        type="text"
                        id="busquedaCarrera"
                        class="chat-search"
                        placeholder="Buscar carrera..."
                    >

                    <div id="resultadoCarreras"></div>

                    <div class="chat-toolbar">

                        <button id="buscarCarrera" class="chat-back">
                            Buscar
                        </button>

                        <button class="chat-back chat-secondary" id="volverMenu">
                            <iconify-icon icon="mdi:arrow-left"></iconify-icon>
                            Volver
                        </button>

                    </div>

                </div>
            `;

                document
                    .getElementById("buscarCarrera")
                    .addEventListener("click", () => {

                        const texto = document
                            .getElementById("busquedaCarrera")
                            .value
                            .toLowerCase();

                        const coincidencias = carrerasFacultad
                            .filter(carrera =>
                                carrera.nombre
                                .toLowerCase()
                                .includes(texto)
                            );
                        if (coincidencias.length === 0) {

                            document
                                .getElementById("resultadoCarreras")
                                .innerHTML = `
                                <div class="chat-warning">

                                    <div class="warning-icon">
                                        <iconify-icon icon="mdi:alert-circle"></iconify-icon>
                                    </div>

                                    <div class="warning-content">
                                        <strong>No encontramos resultados</strong>

                                        <p>
                                            La carrera que buscas no se encuentra o no pertenece a la facultad seleccionada.
                                        </p>

                                        <span>
                                            Por favor, intenta realizar una nueva búsqueda.
                                        </span>
                                    </div>

                                </div>
                            `;

                            return;
                        }
                        let html = '<div class="chat-options">';

                        coincidencias.forEach(carrera => {

                            html += `
                    <button
                        class="chat-card carrera-btn"
                        data-id="${carrera.id}">
                        ${carrera.nombre}
                    </button>
                `;

                        });

                        html += '</div>';

                        document
                            .getElementById("resultadoCarreras")
                            .innerHTML = html;

                        document
                            .querySelectorAll(".carrera-btn")
                            .forEach(btn => {

                                btn.addEventListener("click", () => {
                                    const idCarrera = btn.dataset.id;

                                    carreraSeleccionada =
                                        coincidencias.find(
                                            carrera => carrera.id == idCarrera
                                        );
                                    mostrarOpcionesCarrera(
                                        carreraSeleccionada
                                    );

                                });

                            });

                    });

                document
                    .getElementById("volverMenu")
                    .addEventListener("click", () => {

                        const menuAnterior = historial.pop();

                        renderMenu(
                            menuAnterior,
                            historial.length > 0
                        );

                    });

            }

            function mostrarOpcionesCarrera(carrera) {

                let html = `

                <div class="bot-bubble-izquierda">

                    <img src="{{asset('web/imagenes/estrella.gif')}}" alt="" width="20"> He encontrado la siguiente carrera:

                </div>

                <div class="bot-bubble-derecha bot-title">

                    🎓 ${carrera.nombre}

                </div>

                <div class="bot-bubble-izquierda">

                    <img src="{{asset('web/imagenes/pensar.gif')}}" alt="" width="20"> ¿Qué información deseas consultar?

                </div>

                <div class="chat-options">
            `;

                opcionesCarrera.forEach(opcion => {

                    html += `
                        <button
                            class="chat-card"
                            data-opcion-final="${opcion}">
                            ${opcion}
                        </button>
                    `;

                });



                html += `
                    </div>

                    <button class="chat-back" id="volverCarreras">
                        <iconify-icon icon="mdi:arrow-left"></iconify-icon>
                            Volver
                    </button>
                `;

                chatResponse.innerHTML = html;

                document
                    .querySelectorAll("[data-opcion-final]")
                    .forEach(btn => {

                        btn.addEventListener("click", () => {

                            const opcion = btn.dataset.opcionFinal;

                            mostrarRespuesta(
                                opcion,
                                carreraSeleccionada
                            );

                        });

                    });
                const volverCarreras =
                    document.getElementById('volverCarreras');

                if (volverCarreras) {

                    volverCarreras.addEventListener('click', () => {

                        mostrarBuscador(
                            categoriaSeleccionada
                        );

                    });

                }
            }



            contactoBtn.addEventListener("click", (e) => {
                console.log("click chatbot");
                e.preventDefault();
                historial = [];
                modal.style.display = "flex";
                renderMenu(menu.principal);
            });

            closeBtn.addEventListener("click", () => {
                modal.style.display = "none";
            });



        });
    </script>
</body>

</html>