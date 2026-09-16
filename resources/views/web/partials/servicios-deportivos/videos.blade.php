@php
    $videos = config('bienestar.deportes.videos');
    $youtube = config('bienestar.deportes.youtube');
@endphp

<section class="deportes-videos" id="videos">
    <div class="container">
        <header class="deportes-videos__header">
            <h2 class="deportes-section-heading__title">Videos y Entrevistas</h2>
            <a href="{{ $youtube }}" class="deportes-videos__cta" target="_blank" rel="noopener">
                Ver videos y entrevistas
            </a>
        </header>

        <div class="deportes-videos__grid">
            @foreach($videos as $video)
            <a href="{{ $youtube }}" class="deportes-video-card" target="_blank" rel="noopener">
                <span class="deportes-video-card__media">
                    <img
                        src="{{ asset($video['image']) }}"
                        alt="{{ $video['title'] }}"
                        loading="lazy"
                        decoding="async">
                    <span class="deportes-video-card__play" aria-hidden="true">
                        <iconify-icon icon="mdi:play-circle-outline"></iconify-icon>
                    </span>
                </span>
                <span class="deportes-video-card__title">{{ $video['title'] }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>
