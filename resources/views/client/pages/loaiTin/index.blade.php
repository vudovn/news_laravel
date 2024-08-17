@extends('client.layouts.layout')


@section('seo')
    <title>{{ $category->meta_title }}</title>
    <meta name="description" content="{{ $category->meta_description }}">
    <meta name="keywords"
        content="@if ($category->meta_keyword != null || $category->meta_keyword != '') @foreach (json_decode($category->meta_keyword) as $key){{ $key->value }},@endforeach @endif">

    <!-- META FOR FACEBOOK -->
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('loaitin', $category->slug) }}">
    <meta property="og:title" content="{{ $category->meta_title }}">
    <meta property="og:description"content="{{ $category->meta_description }}">
    <!-- END META FOR FACEBOOK -->
    {{-- <meta property="og:image" itemprop="thumbnailUrl" content="{{ $category->thumbnail }}"/>
    <meta property="og:image:width" content="800"/>
    <meta property="og:image:height" content="354"/> --}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header" style="border-bottom: none;">
            <div class="blog-posts-title title-wrap">
                <h2 class="title">{{ $category->name }}</h2>
            </div>
        </div>
        <div class="card-body row" style="padding-top: 0 !important;">

            @foreach ($posts as $tin)
                {{-- @php
                    if ($tin->status != 'public') {
                        continue;
                    }
                @endphp --}}
                <!-- bài viết -->
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
                        <a href="{{ route('loaitin', $category->slug) }}" class="text-loaiTin">
                            {{ $category->name }}
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
                <!-- end bài viết -->
            @endforeach

        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
