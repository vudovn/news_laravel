@extends('client.layouts.layout')

@section('seo')
    <title>Trang chủ</title>
    <meta name="description" content="Trang chủ">
    <meta name="keywords" content="Trang chủ">
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ request()->url() }}" />
    <meta property="og:title" content="Trang chủ" />
    <meta property="og:description" content="Trang chủ" />
    <meta property="og:site_name" content="Trang chủ" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:image" content="{{ asset('images/logo.png') }}" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Trang chủ" />
    <meta name="twitter:description" content="Trang chủ" />
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}" />
    <meta name="twitter:image:alt" content="Trang chủ" />
@endsection
@section('slider')
    <!-- banner -->
    <div class="row mb-5">
        <div class="col-12 col-lg-8" style="">
            <div id="carouselExampleDark" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    @foreach ($tinxemnhieu as $key => $tin)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="3000">
                            <div class="shadow_new_banner">
                                <img src="{{ $tin->thumbnail }}" class="d-block w-100" alt="{{ $tin->name }}">
                            </div>
                            <div class="carousel-caption text-start">
                                @if ($tin->categories != null)
                                    @foreach ($tin->categories as $loai)
                                        <a href="{{ route('loaitin', $loai->slug) }}"
                                            class="badge bg-danger animate__animated animate__fadeInUp">{{ $loai->name }}</a>
                                    @endforeach
                                @endif
                                <a href="{{ route('tinchitiet', $tin->slug) }}">
                                    <h1 class="animate__animated animate__fadeInUp title_new_banner">
                                        {{ $tin->name }}
                                    </h1>
                                </a>
                                <p class="animate__animated animate__fadeInUp">
                                    <span class="icon_news me-2" data-bs-toggle="tooltip" data-placement="bottom"
                                        title="Tác giả">
                                        <i class="fe fe-user"></i>
                                        {{ $tin->user->name }}
                                    </span>
                                    <span class="icon_news me-2" data-bs-toggle="tooltip" data-placement="bottom"
                                        title="Ngày đăng">
                                        <i class="fe fe-calendar"></i>
                                        {{ $tin->created_at->format('d/m/Y') }}
                                    </span>
                                    <span class="icon_news me-2" data-bs-toggle="tooltip" data-placement="bottom"
                                        title="Thời gian đọc">
                                        <i class="fe fe-clock"></i>
                                        8 phút
                                    </span>
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-lg-4 d-none d-lg-block" style="padding-left: 0%;">
            @foreach ($tinmoinhat->take(2) as $key => $tin)
                <div class="" style="position: relative; ">
                    <div class="shadow_new_banner"
                        style="{{ $key == 0 ? 'border-bottom-left-radius:0 !important; border-bottom-right-radius:0 !important;'
                        : 'border-top-left-radius:0 !important; border-top-right-radius:0 !important;' }}">
                        <img src="{{ $tin->thumbnail }}" class="d-block w-100 " alt="{{ $tin->name }}">
                    </div>
                    <a href="#" class="carousel-caption_vd d-md-block text-start">
                        <span class="badge bg-danger">Quân
                            sự</span>
                        <h1 class="animate__animated animate__fadeInUp title_new_banner">
                            {{ $tin->name }}
                        </h1>
                        <p class="animate__animated animate__fadeInUp">
                            <p class="animate__animated animate__fadeInUp">
                                <span class="icon_news me-2" data-bs-toggle="tooltip" data-placement="bottom"
                                    title="Tác giả">
                                    <i class="fe fe-user"></i>
                                    {{ $tin->user->name }}
                                </span>
                                <span class="icon_news me-2" data-bs-toggle="tooltip" data-placement="bottom"
                                    title="Ngày đăng">
                                    <i class="fe fe-calendar"></i>
                                    {{ $tin->created_at->format('d/m/Y') }}
                                </span>
                                <span class="icon_news me-2" data-bs-toggle="tooltip" data-placement="bottom"
                                    title="Thời gian đọc">
                                    <i class="fe fe-clock"></i>
                                    8 phút
                                </span>
                            </p>
                    </a>
                </div>
            @endforeach


        </div>
    </div>
    <!-- end banner -->
@endsection

@section('content')
    <!-- content -->
    <!-- bài viết -->
    <div class="card mb-3">
        <div class="card-header" style="border-bottom: none;">
            <div class="blog-posts-title title-wrap">
                <h2 class="title">Tin mới nhất</h2><a class="more" href="#">Xem thêm</a>
            </div>
        </div>
        <div class="card-body row" style="padding-top: 0 !important;">

            {{-- bài viết --}}
            @foreach ($tinmoinhat as $tin)
                <div class="col-12 col-md-3 col-lg-4 mb-10">
                    <div class="mb-3">
                        <a href="{{ route('tinchitiet', $tin->slug) }}">
                            <!-- img -->
                            <div class="img-zoom">
                                <img src="{{ $tin->thumbnail }}" alt="" class="img-fluid w-100">
                            </div>
                        </a>
                    </div>
                    <!-- text -->
                    <div class="mb-2">
                        <a href="{{ route('loaitin', $tin->categories->first()->slug) }}" class="text-loaiTin">
                            {{ $tin->categories->first()->name }}
                        </a>
                    </div>
                    <!-- text -->
                    <div>
                        <h2 class="h5">
                            <a href="{{ route('tinchitiet', $tin->slug) }}" class="text-inherit title_news">
                                {{ $tin->name }}
                            </a>
                        </h2>
                        <p>
                            {{ $tin->short_content }}
                        </p>
                        <div class="d-flex justify-content-between text-muted mt-4">
                            <span> <span class="icon_news" data-bs-toggle="tooltip" data-placement="bottom"
                                    title="Ngày đăng"><i class="fe fe-calendar"></i>
                                    {{ $tin->created_at->format('d/m/Y') }}
                                </span>
                            </span>
                            <span>
                                <small>
                                    Thời gian đọc:
                                    <span class="text-dark fw-bold">12 phút</span>
                                </small>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header" style="border-bottom: none;">
            <div class="blog-posts-title title-wrap">
                <h2 class="title">Tin xem nhiều</h2><a class="more" href="">Xem thêm</a>
            </div>
        </div>
        <div class="card-body row" style="padding-top: 0 !important;">
            @foreach ($tinxemnhieu as $tin)
                <!-- bài viết -->
                <div class="col-12 col-md-6 col-lg-4 mb-5">
                    <div class="mb-3">
                        <a href="{{ route('tinchitiet', $tin->slug) }}">
                            <!-- img -->
                            <div class="img-zoom">
                                <img src="{{ $tin->thumbnail }}" alt="{{ $tin->name }}" class="img-fluid w-100">
                            </div>
                        </a>
                    </div>
                    <!-- text -->
                    <div class="mb-2">
                        <a href="/the-loai/{{ $tin->categories->first()->slug }}" class="text-loaiTin">
                            {{ $tin->categories->first()->name }}
                        </a>
                    </div>
                    <!-- text -->
                    <div>
                        <h2 class="h5">
                            <a href="{{ route('tinchitiet', $tin->slug) }}" class="text-inherit title_news">
                                {{ $tin->name }}
                            </a>
                        </h2>
                        <p>
                            {{ $tin->short_content }}
                        </p>
                        <div class="d-flex justify-content-between text-muted mt-4">
                            <span> <span class="icon_news" data-bs-toggle="tooltip" data-placement="bottom"
                                    title="Ngày đăng"><i class="fe fe-calendar"></i>
                                    {{ $tin->created_at->format('d/m/Y') }}</span>
                            </span>
                            <span>
                                <small>
                                    Thời gian đọc:
                                    <span class="text-dark fw-bold">12 phút</span>
                                </small>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end bài viết -->
            @endforeach
        </div>
    </div>
    <!-- end content -->
@endsection
