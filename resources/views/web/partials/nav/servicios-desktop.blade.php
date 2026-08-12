@php
    use App\Services\NavMenuService;
    $tabs = NavMenuService::serviciosTabDefinitions($navGroup);
@endphp
<li class="has-droupdown mega-servicios">
    <a href="#">{{ $navGroup->label }}</a>
    <div class="mega-servicios-wrapper mega-tabs-wrapper">
        <div class="mega-categorias" role="tablist" aria-label="{{ $navGroup->label }}">
            @foreach($tabs as $index => $tab)
            <button type="button" class="cat-btn {{ $index === 0 ? 'active' : '' }}"
                data-target="servicios-{{ $tab['key'] }}"
                role="tab"
                aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                aria-controls="servicios-{{ $tab['key'] }}">
                {{ $tab['label'] }}
            </button>
            @endforeach
        </div>
        <div class="mega-contenido">
            @foreach($tabs as $index => $tab)
            @php $items = NavMenuService::serviciosTabItems($tab['key'], 'desktop'); @endphp
            <div class="mega-box {{ $index === 0 ? 'active' : '' }}{{ $tab['stacked'] ? ' mega-box-list' : '' }}" id="servicios-{{ $tab['key'] }}" role="tabpanel">
                @if($tab['stacked'])
                    <div class="mega-col mega-col-list">
                        <ul class="content-lista">
                            @foreach($items as $item)
                            <li>
                                <a href="{{ $item['url'] }}"
                                    @if($item['external']) target="_blank" rel="noopener" @endif>{{ $item['label'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="mega-col">
                        @if($tab['column_title'])
                        <h6 class="menu-title">
                            @if(!empty($tab['column_url']))
                            <a href="{{ $tab['column_url'] }}">{{ $tab['column_title'] }}</a>
                            @else
                            {{ $tab['column_title'] }}
                            @endif
                        </h6>
                        @endif
                        <ul class="content-lista">
                            @foreach($items as $item)
                            <li>
                                <a href="{{ $item['url'] }}"
                                    @if($item['external']) target="_blank" rel="noopener" @endif>{{ $item['label'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</li>
