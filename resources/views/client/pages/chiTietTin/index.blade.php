@extends('client.layouts.layout')


@section('seo')
    <title>{{ $post->meta_title }}</title>
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords"
        content="@if ($post->meta_keyword != null || $post->meta_keyword != '') @foreach (json_decode($post->meta_keyword) as $key){{ $key->value }},@endforeach @endif">
    <meta property="og:site_name" content="vudevweb.com" />
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('tinchitiet', $post->slug) }}">
    <meta property="og:title" content="{{ $post->meta_title }}">
    <meta property="og:description"content="{{ $post->meta_description }}">
    <meta property="og:image" itemprop="thumbnailUrl" content="{{ $post->thumbnail }}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="354" />
@endsection

@section('tinlienquan')
    <div class="card mb-4">
        <div class="card-header" style="border-bottom: none; padding-bottom: 0 !important;">
            <div class="blog-posts-title title-wrap">
                <h2 class="title">Tin liên quan</h2>
            </div>
        </div>
        <div class="card-body" style="padding-top: 0 !important;">
            <div class="row">
                @foreach ($tinlienquan->posts as $tin)
                    <div class="col-12 py-2 row">
                        <div class="col-4 d-flex align-items-center">
                            <img width="100%" src="{{ $tin->thumbnail }}" class="rounded" alt="">
                        </div>
                        <div class="col-8">
                            <h5 class="card-title">
                                <a href="{{ route('tinchitiet', $tin->slug) }}" class="text-link">
                                    {{ $tin->name }}
                                </a>
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header" style="border-bottom: none;">
            <div class="blog-posts-title title-wrap">
                <h2 class="title title_news">
                    @if ($post->categories != null)
                        @foreach ($post->categories as $loai)
                            <a href="{{ route('loaitin', $loai->slug) }}"
                                class="badge bg-danger animate__animated animate__fadeInUp">{{ $loai->name }}</a>
                        @endforeach
                    @endif
                </h2>
            </div>
        </div>
        <div class="card-body" style="padding-top: 0 !important;">
            <div class="mb-2">
                <!-- title -->
                <div class="">
                    <h1 class="display-3 fw-bold mb-4 title_news">
                        {{ $post->name }}
                    </h1>
                </div>
                <!-- info -->
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div class="d-flex align-items-center">
                        <img src="https://ui-avatars.com/api/?name={{ $post->user->name }}&background=random"
                            alt="avatar" class="rounded-circle avatar-md">
                        <div class="ms-2 lh-1">
                            <h5 class="mb-1 title_news">{{ $post->user->name }}</h5>
                            <span class="d-flex-center gap-2">
                                <span class="icon_news" data-bs-toggle="tooltip" data-placement="bottom"
                                    data-bs-original-title="Ngày đăng"><i class="fe fe-calendar "></i>
                                    {{ $post->created_at->format('d/m/Y') }}
                                </span>
                                <div class="vr"></div>
                                <span class="icon_news" data-bs-toggle="tooltip" data-placement="bottom"
                                    data-bs-original-title="Lượt xem"><i class="fe fe-eye "></i>
                                    {{ number_format($post->views) }}</span>
                            </span>
                        </div>
                    </div>
                    <div>
                        <span class="ms-2 text-muted title_news">Share</span>
                        <a href="#" class="ms-2 text-muted title_news"><i
                                class="mdi mdi-facebook fs-4 icon_news"></i></a>
                        <a href="#" class="ms-2 text-muted title_news"><i
                                class="mdi mdi-twitter fs-4 icon_news"></i></a>
                        <a href="#" class="ms-2 text-muted title_news"><i
                                class="mdi mdi-linkedin fs-4 icon_news"></i></a>
                    </div>
                </div>
            </div>
            <audio id="audio_vd" controls class="w-100"></audio>
            <div class="text" id="content">
                <h4 class="title">{{ $post->short_content }}</h4>
                <div class="d-flex-center mb-3">
                    <img width="50%" src="{{ $post->thumbnail }}" alt="{{ $post->name }}">
                </div>
                {!! $post->content !!}
            </div>
        </div>
    </div>

    <!-- bình luận -->
    <div class="card mb-4">
        <div class="card-header" style="border-bottom: 0 !important;">
            <div class="blog-posts-title title-wrap">
                <h2 class="title">Bình luận</h2>
            </div>
        </div>
        <div class="card-body" style="padding-top: 0 !important;"> <!-- Card Body -->
            <!-- Form -->

            @auth
                <form action="{{ route('comment') }}" method="POST" class="row mb-4">
                    @csrf
                    <input type="hidden" name="user_id" value=" {{ Auth()->user()->id }} ">
                    <input type="hidden" name="post_id" value=" {{ $post->id }} ">
                    <div class="mb-3">
                        <textarea class="form-control" value="{{ old('content') }}" name="content" id="" rows="3"
                            placeholder="Nhập bình luận của bạn"></textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger"><i class="fe fe-send"></i></button>
                    </div>
                </form>
            @endauth

            @if (!auth()->check())
                <div class="alert alert-danger">
                    Vui lòng đăng nhập để bình luận
                    <a href="{{ route('login') }}" class="alert-link "><u>Đăng nhập ngay</u></a>
                </div>
            @endif

            <!-- List cmt -->
            <div class="list-group list-group-flush border-top">
                <!-- cmt Item -->
                @foreach ($post->comments->where('parent_id', null) as $key => $comment)
                    @include('client.pages.chiTietTin.components.comment', [
                        'comment' => $comment,
                        'post' => $post,
                        'name' => null,
                    ])
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .cmt_reply {
            padding-left: 60px !important;
        }

        .cmt_reply .avatar_vd {
            height: 2.5rem;
            width: 2.5rem;
        }
    </style>

    @push('script')
        <script>
            var contentElement = document.getElementById('content');
            var audio_vd = document.getElementById('audio_vd');
            var textContent = contentElement.innerText || contentElement.textContent;
            var textContent = textContent.trim();
            getAudio(textContent)

            async function getAudio(content) {
                const url = "https://api.fpt.ai/hmi/tts/v5";
                const res = await fetch(url, {
                    method: "POST",
                    headers: {
                        "api-key": 'XXaGe0iGMahlPQPkz5QWZLTxd7T2o0eH',
                        voice: 'banmai'
                    },
                    body: content
                })
                const data = await res.json()
                console.log(data.async);
                setTimeout(() => {
                    audio_vd.src = data.async;
                    console.log('lấy audio thành công!');
                }, 5000);
            }
        </script>
        <script src="/client_asset/custom/scroll.js"></script>
    @endpush
@endsection
