@extends('web.layouts.principal')
@section('body_class', 'page-autoridades')
@section('content')
@include('web.partials.breadcrumb')

<section class="autoridades-page">
    <div class="container">
        <p class="autoridades-page__intro">{{ $autoridades['intro'] }}</p>
        <p class="autoridades-page__galeria"><a href="{{ route('galeria-autoridades') }}">Ver galería de autoridades</a></p>

        <div data-autoridades>
            <div class="autoridades-tabs__bar" role="tablist" aria-label="Autoridades">
                @foreach($autoridades['tabs'] as $tab)
                    <button
                        type="button"
                        role="tab"
                        id="autoridades-tab-{{ $tab['id'] }}"
                        class="{{ $loop->first ? 'is-active' : '' }}"
                        data-autoridades-tab="{{ $tab['id'] }}"
                        aria-controls="autoridades-panel-{{ $tab['id'] }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $tab['label'] }}
                    </button>
                @endforeach
            </div>

            <div
                class="autoridades-panel is-active"
                id="autoridades-panel-consejo"
                role="tabpanel"
                aria-labelledby="autoridades-tab-consejo"
                data-autoridades-panel="consejo">
                <article class="autoridades-president">
                    <div class="autoridades-president__foto">
                        @if(!empty($autoridades['presidente']['foto']))
                            <img src="{{ asset($autoridades['presidente']['foto']) }}" alt="{{ $autoridades['presidente']['nombre'] }}">
                        @else
                            <span class="autoridades-iniciales" aria-hidden="true">{{ $autoridades['presidente']['iniciales'] }}</span>
                        @endif
                    </div>
                    <div>
                        <p class="autoridades-kicker">Consejo Directivo</p>
                        <h2>{{ $autoridades['presidente']['nombre'] }}</h2>
                        <p class="autoridades-president__cargo">{{ $autoridades['presidente']['cargo'] }}</p>
                        @if(!empty($autoridades['presidente']['credenciales']))
                            <ul class="autoridades-chips">
                                @foreach($autoridades['presidente']['credenciales'] as $credencial)
                                    <li>{{ $credencial }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </article>

                <div class="autoridades-directorio">
                    <h3>Integrantes</h3>
                    <div class="autoridades-directorio__grid">
                        @foreach($autoridades['directores'] as $director)
                            <article class="autoridades-director">
                                <div class="autoridades-director__foto">
                                    @if(!empty($director['foto']))
                                        <img src="{{ asset($director['foto']) }}" alt="{{ $director['nombre'] }}">
                                    @else
                                        <span class="autoridades-iniciales" aria-hidden="true">{{ $director['iniciales'] }}</span>
                                    @endif
                                </div>
                                <h4>{{ $director['nombre'] }}</h4>
                                <p>{{ $director['rol'] }}</p>
                                @if(!empty($director['credenciales']))
                                    <ul class="autoridades-chips">
                                        @foreach($director['credenciales'] as $credencial)
                                            <li>{{ $credencial }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>

            @foreach($autoridades['cargos'] as $cargo)
                <div
                    class="autoridades-panel"
                    id="autoridades-panel-{{ $cargo['id'] }}"
                    role="tabpanel"
                    aria-labelledby="autoridades-tab-{{ $cargo['id'] }}"
                    data-autoridades-panel="{{ $cargo['id'] }}"
                    hidden>
                    <p class="autoridades-panel__intro">{{ $cargo['intro'] }}</p>
                    @include('web.partials.autoridades.cargo', [
                        'persona' => $cargo['actual'],
                        'antecesores' => $cargo['antecesores'],
                    ])
                </div>
            @endforeach

            <div
                class="autoridades-panel"
                id="autoridades-panel-decanatos"
                role="tabpanel"
                aria-labelledby="autoridades-tab-decanatos"
                data-autoridades-panel="decanatos"
                hidden>
                <p class="autoridades-panel__intro">{{ $autoridades['decanatos']['intro'] }}</p>
                <div data-facultad-group>
                    <div class="autoridades-facultades" role="tablist" aria-label="Facultades">
                        @foreach($autoridades['decanatos']['facultades'] as $facultad)
                            <button
                                type="button"
                                role="tab"
                                class="{{ $loop->first ? 'is-active' : '' }}"
                                data-facultad="{{ $facultad['id'] }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                {{ $facultad['nombre'] }}
                            </button>
                        @endforeach
                    </div>
                    @foreach($autoridades['decanatos']['facultades'] as $facultad)
                        <div data-facultad-panel="{{ $facultad['id'] }}" @if(!$loop->first) hidden @endif>
                            @include('web.partials.autoridades.cargo', [
                                'persona' => $facultad['actual'],
                                'antecesores' => $facultad['antecesores'],
                            ])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layouts.marquesina')
@endsection

@push('scripts')
<script>
(function () {
    var root = document.querySelector('[data-autoridades]');
    if (!root) return;

    var tabs = root.querySelectorAll('[data-autoridades-tab]');
    var panels = root.querySelectorAll('[data-autoridades-panel]');

    function activate(id) {
        tabs.forEach(function (tab) {
            var on = tab.getAttribute('data-autoridades-tab') === id;
            tab.classList.toggle('is-active', on);
            tab.setAttribute('aria-selected', on ? 'true' : 'false');
        });
        panels.forEach(function (panel) {
            var on = panel.getAttribute('data-autoridades-panel') === id;
            panel.hidden = !on;
            panel.classList.toggle('is-active', on);
        });
    }

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            activate(tab.getAttribute('data-autoridades-tab'));
        });
    });

    root.querySelectorAll('[data-facultad-group]').forEach(function (group) {
        var buttons = group.querySelectorAll('[data-facultad]');
        var panes = group.querySelectorAll('[data-facultad-panel]');

        function show(id) {
            buttons.forEach(function (button) {
                var on = button.getAttribute('data-facultad') === id;
                button.classList.toggle('is-active', on);
                button.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            panes.forEach(function (pane) {
                pane.hidden = pane.getAttribute('data-facultad-panel') !== id;
            });
        }

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                show(button.getAttribute('data-facultad'));
            });
        });
    });
})();
</script>
@endpush
