@php
    $psico = config('bienestar.psicopedagogico');
@endphp

<section class="psico-hero">
    <div class="container">
        <div class="psico-hero__grid">
            <div class="psico-hero__media">
                <img
                    src="{{ asset($psico['foto']) }}"
                    alt="{{ $psico['responsable'] }}"
                    class="psico-hero__photo"
                    loading="eager"
                    decoding="async">
                <div class="psico-hero__badge">
                    <strong>{{ $psico['responsable'] }}</strong>
                    <span>{{ $psico['cargo'] }}</span>
                </div>
            </div>

            <div class="psico-hero__content">
                <h1 class="psico-hero__title">Nuestro Servicio Psicopedagógico</h1>
                <p class="psico-hero__text">
                    En la UPRIT, entendemos que el éxito académico va de la mano con tu bienestar personal. Nuestro Servicio Psicopedagógico es un espacio seguro, cercano y confidencial diseñado para brindarte el apoyo integral que necesitas durante tu vida universitaria.
                </p>
                <p class="psico-hero__text">
                    Te acompañamos de forma personalizada para potenciar tus habilidades de aprendizaje, gestionar de manera saludable el estrés académico y fortalecer tus proyectos profesionales y personales.
                </p>
                <p class="psico-hero__text">
                    Para citas y consultas escríbenos a
                    <a href="mailto:{{ $psico['email'] }}">{{ $psico['email'] }}</a>.
                </p>
            </div>
        </div>
    </div>
</section>
