@php
    use App\Services\NavMenuService;
@endphp
@foreach($navGroups->where('show_in_topbar', true)->where('visible', true)->sortBy('orden') as $navGroup)
    @continue(!$navGroup->visible_mobile)
    @if($navGroup->tipo === 'platform')
    <li class="has-droupdown">
        <a href="#">{{ $navGroup->label }}</a>
        <ul class="submenu">
            @foreach(NavMenuService::linksForGroupKey($navGroup->key, 'mobile') as $item)
            <li><a href="{{ $item['url'] }}" @if($item['external']) target="_blank" rel="noopener" @endif>{{ $item['label'] }}</a></li>
            @endforeach
        </ul>
    </li>
    @else
        @php $url = NavMenuService::topbarUrl($navGroup); @endphp
        @if($url)
        <li><a href="{{ $url }}">{{ $navGroup->label }}</a></li>
        @endif
    @endif
@endforeach
