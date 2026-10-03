@php
    $tabs = $navGroup->links->where('visible', true)->where('visible_mobile', true)->sortBy('orden');
@endphp
<li class="has-droupdown">
    <a href="#">{{ $navGroup->label }}</a>
    <ul class="submenu">
        @foreach($tabs as $tab)
        @if($tab->children->where('visible', true)->where('visible_mobile', true)->count() > 0)
        <li class="has-droupdown">
            <a href="#">{{ $tab->label }}</a>
            <ul class="submenu">
                @foreach($tab->children->where('visible', true)->where('visible_mobile', true)->sortBy('orden') as $item)
                @if($item->children->count() > 0)
                <li class="has-droupdown">
                    <a href="#">{{ $item->label }}</a>
                    <ul class="submenu">
                        @foreach($item->children->where('visible', true)->where('visible_mobile', true)->sortBy('orden') as $gc)
                        <li>
                            <a href="{{ $gc->route_name ? route($gc->route_name) : $gc->url }}"
                                @if($gc->external) target="_blank" rel="noopener" @endif>{{ $gc->label }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @else
                <li>
                    <a href="{{ $item->route_name ? route($item->route_name) : $item->url }}"
                        @if($item->external) target="_blank" rel="noopener" @endif>{{ $item->label }}</a>
                </li>
                @endif
                @endforeach
            </ul>
        </li>
        @else
        <li>
            <a href="{{ $tab->route_name ? route($tab->route_name) : $tab->url }}"
               @if($tab->external) target="_blank" rel="noopener" @endif>
               {{ $tab->label }}
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</li>
