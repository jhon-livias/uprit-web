@php
    $tabs = $navGroup->links->where('visible', true)->where('visible_desktop', true)->sortBy('orden');
    $firstActiveTab = $tabs->first(fn($t) => $t->children->where('visible', true)->count() > 0);
    $firstActiveTabId = $firstActiveTab ? $firstActiveTab->id : null;
@endphp
<li class="has-droupdown mega-{{ $navGroup->key }}">
    <a href="#">{{ $navGroup->label }}</a>
    <div class="mega-{{ $navGroup->key }}-wrapper mega-tabs-wrapper">
        <div class="mega-categorias" role="tablist" aria-label="{{ $navGroup->label }}">
            @foreach($tabs as $index => $tab)
            @if($tab->children->where('visible', true)->count() > 0)
            <button type="button" class="cat-btn {{ $firstActiveTabId === $tab->id ? 'active' : '' }}"
                data-target="servicios-{{ $tab->id }}"
                role="tab"
                aria-selected="{{ $firstActiveTabId === $tab->id ? 'true' : 'false' }}"
                aria-controls="servicios-{{ $tab->id }}">
                {{ $tab->label }}
                @if(strtolower(trim($tab->label)) === 'pregrado puede')
                <small class="cat-btn-hint d-block">Para personas que trabajan</small>
                @endif
            </button>
            @else
            <a href="{{ $tab->route_name ? route($tab->route_name) : $tab->url }}" 
               class="cat-btn d-flex align-items-center" 
               @if($tab->external) target="_blank" rel="noopener" @endif
               style="text-decoration:none;">
                {{ $tab->label }}
                <iconify-icon icon="mdi:arrow-right" class="ms-auto ml-auto" style="margin-left:auto"></iconify-icon>
            </a>
            @endif
            @endforeach
        </div>
        <div class="mega-contenido">
            @foreach($tabs as $index => $tab)
            @php 
                $items = $tab->children->where('visible', true)->where('visible_desktop', true)->sortBy('orden');
            @endphp
            <div class="mega-box {{ $firstActiveTabId === $tab->id ? 'active' : '' }}" id="servicios-{{ $tab->id }}" role="tabpanel">
                @if($items->first() && $items->first()->children->count() > 0)
                    {{-- 3rd Level exists: Render multiple columns --}}
                    @foreach($items as $colGroup)
                    <div class="mega-col">
                        <h6 class="menu-title">
                            @if($colGroup->route_name || $colGroup->url)
                            <a href="{{ $colGroup->route_name ? route($colGroup->route_name) : $colGroup->url }}" @if($colGroup->external) target="_blank" rel="noopener" @endif>
                                {{ $colGroup->label }}
                            </a>
                            @else
                                {{ $colGroup->label }}
                            @endif
                        </h6>
                        <ul class="content-lista">
                            @foreach($colGroup->children->where('visible', true)->where('visible_desktop', true)->sortBy('orden') as $gc)
                            <li>
                                <a href="{{ $gc->route_name ? route($gc->route_name) : $gc->url }}"
                                    @if($gc->external) target="_blank" rel="noopener" @endif>{{ $gc->label }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                @else
                    {{-- Only 2 levels exist: Render a single column --}}
                    <div class="mega-col">
                        @if($tab->route_name || $tab->url)
                        <h6 class="menu-title">
                            <a href="{{ $tab->route_name ? route($tab->route_name) : $tab->url }}"
                               @if($tab->external) target="_blank" rel="noopener" @endif>
                                {{ $tab->label }}
                            </a>
                        </h6>
                        @endif
                        <ul class="content-lista">
                            @foreach($items as $item)
                            <li>
                                <a href="{{ $item->route_name ? route($item->route_name) : $item->url }}"
                                    @if($item->external) target="_blank" rel="noopener" @endif>{{ $item->label }}</a>
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
