@extends('admin.layouts.layout')


@section('content')
    <div class="row mb-8">
        <div class="col-md-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h2>{{ $title ?? 'Chưa có title' }}</h2>
                    <!-- breacrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-inherit">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title ?? 'Chưa có title' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center"> {{ $post->name }} </h2>
                <div class="d-flex justify-content-between py-3">
                    <div class="author">
                        <img src="https://ui-avatars.com/api/?name={{ $post->user->name }}&background=random"
                            class="avatar avatar-md rounded-circle" alt="" width="50">
                        <span>{{ $post->user->name }}</span>
                    </div>
                    <div class="create_at">
                        Ngày đăng: {{ $post->created_at }}
                    </div>
                </div>
                <div class="thumbnail mb-2 d-flex justify-content-center">
                    <img src="{{ $post->thumbnail }}" width="50%" class="rounded" alt="{{ $post->name }}">
                </div>
                <div class="content">
                    {!! $post->content !!}
                </div>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-primary me-2"
                    href="{{ route('admin.approve-post.public', ['id' => $post->id]) }}"
                    onclick="return confirm('Chắc không ?')">Duyệt</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                    Từ chối
                </button>
            </div>
        </div>
    </div>

    {{-- từ chối bài viết --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Vui lòng viết lời nhắn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.approve-post.reject', ['id' => $post->id]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="note" class="form-label">Lời nhắn</label>
                            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
