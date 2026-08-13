@php
    use App\Services\NavMenuService;
    $topbarMobile = $navGroups->where('show_in_topbar', true)->where('visible', true)->sortBy('orden');
    $hasIdiomas = $topbarMobile->contains(fn ($g) => $g->key === 'idiomas');
@endphp
@unless($hasIdiomas)
<li><a href="https://idiomas.uprit.edu.pe" target="_blank" rel="noopener">Idiomas</a></li>
@endunless
@foreach($topbarMobile as $navGroup)
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
        <li><a href="{{ $url }}" @if(NavMenuService::topbarIsExternal($navGroup)) target="_blank" rel="noopener" @endif>{{ $navGroup->label }}</a></li>
        @endif
    @endif
@endforeach
