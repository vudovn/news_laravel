@extends('client.layouts.layout')


@section('seo')
    <title>{{ $title ?? 'Chưa có title' }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Chưa có mô tả SEO' }}">
    <meta name="keywords" content="{{ $meta_keyword ?? 'Chưa có từ khóa SEO' }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header" style="border-bottom: none;">
            <div class="blog-posts-title title-wrap">
                <h2 class="title">{{ $title ?? 'Chưa có title' }}</h2>
            </div>
        </div>
        <div class="card-body row" style="padding-top: 0 !important;">
            @if (isset($data))
                @foreach ($data as $tin)
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
                    <!-- end bài viết -->
                @endforeach
            @endif
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
