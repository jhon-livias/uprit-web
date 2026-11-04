@php
    $misionVision = config('direccion_investigacion.mision_vision');
@endphp

<div class="text-block direccion-mv">
    <article class="posgrado-mvv-card posgrado-mvv-card--mision">
        <div class="posgrado-mvv-card__head">
            <span class="posgrado-mvv-card__icon" aria-hidden="true">
                <iconify-icon icon="mdi:target"></iconify-icon>
            </span>
            <h3 class="posgrado-mvv-card__title">{{ $misionVision['mision']['titulo'] }}</h3>
        </div>
        <div class="posgrado-mvv-card__body">
            <p>{{ $misionVision['mision']['texto'] }}</p>
        </div>
    </article>

    <article class="posgrado-mvv-card posgrado-mvv-card--vision">
        <div class="posgrado-mvv-card__head">
            <span class="posgrado-mvv-card__icon" aria-hidden="true">
                <iconify-icon icon="mdi:eye-outline"></iconify-icon>
            </span>
            <h3 class="posgrado-mvv-card__title">{{ $misionVision['vision']['titulo'] }}</h3>
        </div>
        <div class="posgrado-mvv-card__body">
            <p>{{ $misionVision['vision']['texto'] }}</p>
        </div>
    </article>

    <figure class="direccion-mv__organigrama">
        <h3 class="title">{{ $misionVision['organigrama']['titulo'] }}</h3>
        <img
            src="{{ asset($misionVision['organigrama']['imagen']) }}"
            alt="{{ $misionVision['organigrama']['titulo'] }}">
    </figure>
</div>
