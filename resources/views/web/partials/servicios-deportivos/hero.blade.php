@php
    $deportes = config('bienestar.deportes');
@endphp

<section class="deportes-hero">
    <div class="deportes-hero__media" aria-hidden="true">
        <img
            src="{{ asset('web/imagenes/bienestar/deportes/hero.jpg') }}"
            alt=""
            class="deportes-hero__photo"
            loading="eager"
            decoding="async">
    </div>

    <div class="container deportes-hero__container">
        <div class="deportes-hero__copy">
            <p class="deportes-hero__kicker">{{ $deportes['kicker'] }}</p>
            <h1 class="deportes-hero__title">{{ $deportes['titulo'] }}</h1>
            <p class="deportes-hero__lead">{{ $deportes['subtitulo'] }}</p>
        </div>

        <div class="deportes-hero__seal" aria-hidden="true">
            <svg viewBox="0 0 200 200" class="deportes-hero__seal-svg">
                <circle cx="100" cy="100" r="98" fill="#fff"/>
                <circle cx="100" cy="100" r="76" fill="none" stroke="#6b1221" stroke-width="1.2"/>
                <defs>
                    <path id="deportes-seal-path" d="M100,100 m-64,0 a64,64 0 1,1 128,0 a64,64 0 1,1 -128,0"/>
                </defs>
                <text class="deportes-hero__seal-text">
                    <textPath href="#deportes-seal-path" startOffset="0%">
                        {{ mb_strtoupper($deportes['sello']) }} · {{ mb_strtoupper($deportes['sello']) }} ·
                    </textPath>
                </text>
            </svg>
            <span class="deportes-hero__seal-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path fill="currentColor" d="M6.35 14.11c-.49.67-.76 1.47-.76 2.3c0 .5.1.98.29 1.44c1.07-1.17 2.47-2.07 4.03-2.55c-.36-.7-.64-1.45-.83-2.23c-.96.43-1.85 1.03-2.73 1.04m3.34-3.34c.19.78.47 1.53.83 2.23c1.56.48 2.96 1.38 4.03 2.55c.19-.46.29-.94.29-1.44c0-.83-.27-1.63-.76-2.3c-.88-.01-1.77-.61-2.73-1.04c-.19.78-.47 1.53-.83 2.23M17.65 6.35C16.58 7.52 15.18 8.42 13.62 8.9c.36.7.64 1.45.83 2.23c.96-.43 1.85-1.03 2.73-1.04c.49-.67.76-1.47.76-2.3c0-.5-.1-.98-.29-1.44M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2m0 2c1.9 0 3.63.67 5 1.76c-.5.9-1.53 1.51-2.66 1.51c-.38 0-.74-.08-1.07-.23C12.85 6.37 12.44 6 12 6s-.85.37-1.27 1.04c-.33.15-.69.23-1.07.23c-1.13 0-2.16-.61-2.66-1.51A7.95 7.95 0 0 1 12 4m-8 8c0-1.9.67-3.63 1.76-5c.9.5 1.51 1.53 1.51 2.66c0 .38-.08.74-.23 1.07C7.37 11.15 7 11.56 7 12s.37.85 1.04 1.27c.15.33.23.69.23 1.07c0 1.13-.61 2.16-1.51 2.66A7.95 7.95 0 0 1 4 12m8 8c-1.9 0-3.63-.67-5-1.76c.5-.9 1.53-1.51 2.66-1.51c.38 0 .74.08 1.07.23c.42.67.83 1.04 1.27 1.04s.85-.37 1.27-1.04c.33-.15.69-.23 1.07-.23c1.13 0 2.16.61 2.66 1.51A7.95 7.95 0 0 1 12 20m6.24-3.24c-.9-.5-1.51-1.53-1.51-2.66c0-.38.08-.74.23-1.07C17.63 12.85 18 12.44 18 12s-.37-.85-1.04-1.27c-.15-.33-.23-.69-.23-1.07c0-1.13.61-2.16 1.51-2.66A7.95 7.95 0 0 1 20 12c0 1.9-.67 3.63-1.76 4.76"/>
                </svg>
            </span>
        </div>
    </div>
</section>
