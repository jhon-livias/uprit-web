@php
    $finderId = $finderId ?? 'career-finder';
    $finderContext = $finderContext ?? 'dialog';
    $finderTitle = $finderTitle ?? 'Buscar carrera';
    $finderTitleId = $finderId . '-title';
@endphp
<div
    class="career-finder"
    id="{{ $finderId }}"
    data-career-finder
    data-career-catalog="{{ route('web.buscador.carreras') }}"
    data-context="{{ $finderContext }}">
    <div class="career-finder__head">
        <h2 class="career-finder__title" id="{{ $finderTitleId }}">{{ $finderTitle }}</h2>
        <p class="career-finder__lead">Pregrado, Puede y Posgrado. El resultado aparece mientras escribes.</p>
    </div>

    <label class="career-finder__search">
        <iconify-icon icon="mdi:magnify" aria-hidden="true"></iconify-icon>
        <input
            type="search"
            class="career-finder__input"
            placeholder="Ej. enfermería, sistemas, leyes, maestría…"
            autocomplete="off"
            enterkeyhint="search"
            aria-label="Buscar carrera por nombre o tema">
        <button type="button" class="career-finder__clear" hidden>Limpiar</button>
    </label>

    <div class="career-finder__chips" role="group" aria-label="Nivel académico"></div>

    <div class="career-finder__filters">
        <label>
            <span>Facultad</span>
            <select data-filter="facultad">
                <option value="">Todas</option>
            </select>
        </label>
        <label>
            <span>Modalidad</span>
            <select data-filter="modalidad">
                <option value="">Todas</option>
            </select>
        </label>
        <label>
            <span>Duración</span>
            <select data-filter="duracion">
                <option value="">Todas</option>
            </select>
        </label>
    </div>

    <p class="career-finder__hint" hidden></p>
    <p class="career-finder__count" aria-live="polite"></p>
    <div class="career-finder__results"></div>
</div>
