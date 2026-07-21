<ul class="category-list lista-vist-sec">
    @foreach ($items as $item)
        <li>
            <a href="{{ $item['url'] }}"
                @if ($item['external']) target="_blank" rel="noopener" @endif>{{ $item['label'] }}</a>
        </li>
    @endforeach
</ul>
