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
                <div>
                    <a href="{{ route('admin.post.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i>
                        Thêm bài viết
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-12 mb-5">
            <div class="card h-100 card-lg">
                <div class="p-2">
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="dataTable"
                            class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                            <thead class="bg-light">
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tiêu đề</th>
                                    <th>Tác giả</th>
                                    <th>Danh mục</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <img src="{{ $post->thumbnail }}" class="rounded" width="100px" alt="">
                                        </td>
                                        <td> <a href="/{{ $post->slug }}.html">{{ $post->name }}</a> </td>
                                        <td> {{ $post->user->name }} </td>
                                        <td>
                                            @foreach ($post->categories as $item)
                                                - {{ $item->name }} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <button class="btn btn-sm bg-light-danger text-dark-danger">
                                                {{ $post->status == 'pending' ? 'Đang chờ duyệt' : '' }}
                                            </button>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.approve-post.view', $post->slug) }}"
                                                class="btn btn-sm btn-primary bg-light-primary text-dark-primary"><i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="p-2">
                </div>
            </div>
        </div>
    </div>
@endsection
