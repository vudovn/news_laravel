<li class="dropdown-submenu dropend">
    <a class="dropdown-item dropdown-list-group-item dropdown-toggle text-link" href="{{ route('loaitin',$category->slug) }}">
        {{ $category->name }}
    </a>
    @if ($category->allChildren->isNotEmpty())
        <ul class="dropdown-menu text-link">
            @foreach ($category->allChildren as $childCategory)
                @include('client.layouts.components.partials.menu-item', ['category' => $childCategory])
            @endforeach
        </ul>
    @endif
</li>
