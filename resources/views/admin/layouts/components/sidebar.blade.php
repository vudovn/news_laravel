
<nav class="navbar-vertical-nav d-none d-xl-block">
    <div class="navbar-vertical">
        <div class="px-4 py-5 text-center">
            <a href="/" class="navbar-brand">
                {{-- <img src="/client_asset/images/logo/logo_vd.svg" alt="" /> --}}
            </a>
        </div>
        <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
            <ul class="navbar-nav flex-column" id="sideNavbar">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                            <span class="nav-link-text">Dashboard</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item mt-6 mb-3">
                    <span class="nav-label">Quản lý</span>
                </li>

                @if(Auth()->user()->hasRole(['Ban biên tập','Quản trị viên']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.approve-post') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-list"></i></span>
                                <span class="nav-link-text">Duyệt bài viết</span>
                            </div>
                        </a>
                    </li>
                @endif

                @foreach (config('app.sidebar') as $key_sidebar => $item_sidebar)
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#navCategoriesOrders{{ $key_sidebar }}" aria-expanded="false"
                        aria-controls="navCategoriesOrders{{ $key_sidebar }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">{!! $item_sidebar['icon'] ?? 'chưa có icon' !!}</span>
                            <span class="nav-link-text">{{ $item_sidebar['title'] ?? 'chưa có title' }}</span>
                        </div>
                    </a>
                    <div id="navCategoriesOrders{{ $key_sidebar }}" class="collapse" data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            @foreach ($item_sidebar['menu'] as $menu)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route($menu['route']) }}">{{ $menu['title'] ?? 'Chưa có menu title' }}</a>
                                </li>
                            @endforeach
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.user') }}">Tất cả thành viên</a>
                            </li>
                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.user.create') }}">Thêm thành viên</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                @endforeach

                {{-- <a href="{{ route('admin.category') }}">QL Danh mục</a> --}}

            </ul>
        </div>
    </div>
</nav>

<nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1"
    id="offcanvasExample">
    <div class="navbar-vertical">
        <div class="px-4 py-5 d-flex justify-content-between align-items-center">
            <a href="../index.html" class="navbar-brand">
                <img src="/admin_asset/images/logo/freshcart-logo.svg" alt="" />
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item mt-6 mb-3">
                    <span class="nav-label">Quản lý</span>
                </li>

                                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#navCategoriesOrders" aria-expanded="false"
                        aria-controls="navCategoriesOrders">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-person"></i></span>
                            <span class="nav-link-text">QL Thành Viên</span>
                        </div>
                    </a>
                    <div id="navCategoriesOrders" class="collapse" data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.user') }}">Tất cả thành viên</a>
                            </li>
                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.user.create') }}">Thêm thành viên</a>
                            </li>
                        </ul>
                    </div>
                </li>
 
            </ul>
        </div>
    </div>
</nav>
