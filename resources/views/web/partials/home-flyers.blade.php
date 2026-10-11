@if ($homeFlyers->isNotEmpty())
<div class="home-bulletin" id="home-bulletin" hidden>
    <div class="home-bulletin__backdrop" data-home-bulletin-close></div>
    <section class="home-bulletin__dialog" role="dialog" aria-modal="true" aria-labelledby="home-bulletin-title">
        <div class="home-bulletin__header">
            <h2 id="home-bulletin-title">Boletín UPRIT</h2>
            <button type="button" class="home-bulletin__close" data-home-bulletin-close aria-label="Cerrar boletín">
                <iconify-icon icon="mdi:close" aria-hidden="true"></iconify-icon>
            </button>
        </div>
        <div class="swiper home-bulletin__swiper">
            <div class="swiper-wrapper">
                @foreach ($homeFlyers as $flyer)
                <div class="swiper-slide">
                    @if ($flyer->enlace)
                    <a class="home-bulletin__slide" href="{{ $flyer->enlace }}" @if($flyer->nueva_pestana) target="_blank" rel="noopener noreferrer" @endif>
                        <img src="{{ asset($flyer->imagen) }}" alt="{{ $flyer->titulo ?: 'Boletín informativo UPRIT' }}" decoding="async">
                        @if ($flyer->titulo)<span>{{ $flyer->titulo }} <i class="icon-4" aria-hidden="true"></i></span>@endif
                    </a>
                    @else
                    <div class="home-bulletin__slide">
                        <img src="{{ asset($flyer->imagen) }}" alt="{{ $flyer->titulo ?: 'Boletín informativo UPRIT' }}" decoding="async">
                        @if ($flyer->titulo)<span>{{ $flyer->titulo }}</span>@endif
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @if ($homeFlyers->count() > 1)
            <button type="button" class="home-bulletin__prev" aria-label="Boletín anterior"><i class="icon-west"></i></button>
            <button type="button" class="home-bulletin__next" aria-label="Siguiente boletín"><i class="icon-east"></i></button>
            <div class="home-bulletin__pagination"></div>
            @endif
        </div>
    </section>
</div>

@push('scripts')
<script>
    (function () {
        var bulletin = document.getElementById('home-bulletin');
        if (!bulletin) return;

        var close = function () {
            bulletin.hidden = true;
            document.body.classList.remove('home-bulletin-open');
        };

        bulletin.querySelectorAll('[data-home-bulletin-close]').forEach(function (button) {
            button.addEventListener('click', close);
        });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !bulletin.hidden) close();
        });

        var initialize = function () {
            var element = bulletin.querySelector('.home-bulletin__swiper');
            if (!element || typeof Swiper === 'undefined' || element.swiper) return;

            // Swiper debe medir un contenedor visible; de lo contrario conserva
            // una altura de pantalla aunque el flyer sea más pequeño.
            bulletin.hidden = false;
            document.body.classList.add('home-bulletin-open');

            var swiper = new Swiper(element, {
                slidesPerView: 1,
                spaceBetween: 16,
                autoHeight: true,
                loop: {{ $homeFlyers->count() > 1 ? 'true' : 'false' }},
                autoplay: {{ $homeFlyers->count() > 1 ? "{ delay: 6000, disableOnInteraction: false }" : 'false' }},
                navigation: { nextEl: '.home-bulletin__next', prevEl: '.home-bulletin__prev' },
                pagination: { el: '.home-bulletin__pagination', clickable: true },
                on: {
                    slideChangeTransitionEnd: function () {
                        this.updateAutoHeight(0);
                    },
                },
            });

            element.querySelectorAll('img').forEach(function (image) {
                image.addEventListener('load', function () {
                    swiper.updateAutoHeight(0);
                });
            });
            swiper.updateAutoHeight(0);
        };

        if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initialize);
        else initialize();
    })();
</script>
@endpush
@endif
