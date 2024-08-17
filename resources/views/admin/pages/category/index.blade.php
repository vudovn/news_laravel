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
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>Thêm
                        danh mục</a>
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
                        <table id=""
                            class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                            <thead class="bg-light">
                                <tr>
                                    <th>Tên danh mục</th>
                                    <th>Đường dẫn</th>
                                    <th>Số bài viết</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    @include('admin.pages.category.components.category-row', [
                                        'category' => $category,
                                        'char' => '',
                                    ])
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

    @push('style')
        <style>
            .dt-container.dt-bootstrap5.dt-empty-footer {
                padding-left: 10px;
                padding-right: 10px;
            }
        </style>
    @endpush
@endsection
