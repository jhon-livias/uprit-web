@php
    use App\Services\NavMenuService;
    $tabs = NavMenuService::serviciosTabDefinitions($navGroup);
@endphp
<li class="has-droupdown">
    <a href="#">{{ $navGroup->label }}</a>
    <ul class="submenu">
        @foreach($tabs as $tab)
        <li class="has-droupdown">
            <a href="#">{{ $tab['label'] }}</a>
            <ul class="submenu">
                @foreach(NavMenuService::serviciosTabItems($tab['key'], 'mobile') as $item)
                <li>
                    <a href="{{ $item['url'] }}"
                        @if($item['external']) target="_blank" rel="noopener" @endif>{{ $item['label'] }}</a>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</li>
