@extends('admin.layouts.layout')

@section('content')
    <div class="row mb-8">

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

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
        <div class="col-12">
            <form action="{{ route('admin.post.store') }}" method="POST" class="row g-6 needs-validation" novalidate="">
                @csrf
                <div class="col-lg-8 col-12">
                    <div class="card card-lg">
                        <div class="card-body p-6 d-flex flex-column gap-3">
                            <div class="col-12">
                                <!-- input -->
                                <label for="blognewTitle" class="form-label">Tiêu đề</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" id="blognewTitle"
                                    placeholder="Tiêu đề bài viết">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="short_content" class="form-label">Mô tả ngắn</label>
                                <textarea class="form-control" name="short_content" id="short_content" row="5" placeholder="Mô tả nắng bài viết">{{ old('short_content') }}</textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nội dung</label>
                                @include('admin.pages.components.editor')
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="card card-lg">
                        <div class="card-body p-6 d-flex flex-column gap-3">
                            <div class="col-12">
                                <div class="d-flex flex-column gap-3 mb-3">
                                    <div class="d-flex flex-column">
                                        <label for="thumbnail">Ảnh bìa (16:9)</label>
                                        <input value="{{ old('thumbnail') }}" type="hidden" name="thumbnail"
                                            data-type="Images" class="form-control value_post_thumbnail">
                                        <img src="/userfiles/image/sytem/no_photo.jpg" class="img_demo upload-image rounded"
                                            width="100%">
                                    </div>
                                    <div>
                                        <label for="id_category" class="form-label">Danh mục ( <a href="{{ route('admin.category.create') }}">Tạo danh mục</a> )</label> <br>
                                        <select class="form-select select2_vd" name="category_id[]" multiple
                                            id="category_id">
                                            <option disabled value="">[ Chọn danh mục ]</option>
                                            @foreach ($categories->where('parent_id', null) as $key => $category)
                                                @include('admin.pages.post.components.option-categories', [
                                                    'category' => $category ,
                                                    'char' => '',
                                                    'key' => $key
                                                    ])
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column gap-2">
                                    @include('admin.pages.components.seo')
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch ps-0">
                                    <label class="form-check-label" for="comment">Bình luận</label>
                                    <input class="form-check-input ms-auto" name="comment" type="checkbox" role="switch"
                                        id="comment">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch ps-0">
                                    <label class="form-check-label" for="rank">Bài nổi bật</label>
                                    <input class="form-check-input ms-auto" name="rank" value="1" type="checkbox" role="switch"
                                        id="rank">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-row gap-2">
                                    <button class="btn btn-primary w-100" type="submit">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



    {{-- <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div>
                    <label for="thumbnail">Ảnh bìa</label>
                    <input type="hidden" name="thumbnail" data-type="Images" class="form-control value_post_thumbnail">
                    <img src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg"
                        class="img_demo upload-image" width="100px">
                </div>
                <div class="mb-3">
                    <label for="name">Tên bài viết</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="name">Danh mục</label>
                    <select type="text" name="name" value="{{ old('name') }}" id="name"
                        class="form-control">
                        <option value="">[ Chọn danh mục ]</option>
                        @foreach ($category as $key => $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select type="text" name="status" value="{{ old('status') }}" id="status"
                        class="form-control">
                        <option value="">[ Chọn Trạng thái ]</option>
                        <option value="1">Công khai</option>
                        <option value="2">Không Công khai</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="conent">Nội dung bài viết</label>
                    @include('admin.pages.components.editor')
                </div>
                @include('admin.pages.components.seo')

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.post') }}" class="btn btn-warning"> Quay về </a>
                    <button type="submit" class="btn btn-primary"> Lưu </button>
                </div>
            </form>
        </div>
    </div> --}}
@endsection
