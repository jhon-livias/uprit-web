@php
    use App\Services\NavMenuService;
    $topbar = $navGroups->where('show_in_topbar', true)->where('visible', true)->sortBy('orden');
@endphp
@foreach($topbar as $navGroup)
    @continue(!$navGroup->visible_desktop)
    @if($navGroup->tipo === 'platform')
    <li class="submenu-platform menu-plataforma">
        <a href="#" class="hov-sup">{{ $navGroup->label }}</a>
        <ul class="platform-dropdown">
            @foreach(NavMenuService::linksForGroupKey($navGroup->key, 'desktop') as $item)
            <li style="padding-bottom: 0px; padding-top: 5px;">
                <a href="{{ $item['url'] }}" @if($item['external']) target="_blank" rel="noopener" @endif>{{ $item['label'] }}</a>
            </li>
            @endforeach
        </ul>
    </li>
    @else
        @php $url = NavMenuService::topbarUrl($navGroup); @endphp
        @if($url)
        <li class="raya"><a href="{{ $url }}" class="hov-sup">{{ $navGroup->label }}</a></li>
        @endif
    @endif
@endforeach
