<nav class="navbar navbar-expand-lg mb-3" style="border-radius: 10px">
    <div class="container px-0">
        <div class="d-flex align-items-center order-lg-3 ms-lg-3">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-default5" aria-controls="navbar-default5" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar top-bar mt-0"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
        <!-- Button -->
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default5">
            <ul class="navbar-nav">
                @foreach ($categories->where('parent_id', null) as $category)
                    <li class="nav-item dropdown text-link">
                        {{-- <a class="nav-link dropdown-toggle" href="{{ route('loaitin',$category->slug) }}" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-display="static">
                                {{ $category->name }}
                            </a> --}}
                        <a class="nav-link dropdown-toggle text-link" href="{{ route('loaitin', $category->slug) }}"
                            id="navbarDropdown">
                            {{ $category->name }}
                        </a>
                        @if ($category->allChildren->isNotEmpty())
                            <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarDropdown">
                                @foreach ($category->allChildren as $childCategory)
                                    @include('client.layouts.components.partials.menu-item', [
                                        'category' => $childCategory,
                                    ])
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
