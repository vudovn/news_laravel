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
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>Thêm danh mục</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-body d-flex flex-column gap-8 p-7">
                    <div class="d-flex flex-column flex-md-row align-items-center mb-4 file-input-wrapper gap-2">
                        <div>
                            <img id="avatar_vd" class="image avatar avatar-lg rounded-3"
                                src="https://freshcart.codescandy.com/assets/images/docs/placeholder-img.jpg"
                                alt="Image">
                        </div>

                        {{-- <div class="file-upload btn btn-light ms-md-4">
                            <input type="file" class="file-input opacity-0">
                            Tải ảnh lên
                        </div>
                        <span class="ms-2">JPG, GIF or PNG. 1MB Max.</span> --}}
                    </div>
                    <div class="d-flex flex-column gap-4">
                        <h3 class="mb-0 h6">Thông tin danh mục</h3>
                        <form action="{{ route('admin.category.update',$data->id) }}" method="POST" class="row g-3 needs-validation"
                            novalidate="">
                            @csrf
                            <div class="col-lg-6 col-12">
                                <div>
                                    <!-- input -->
                                    <label for="name" class="form-label">
                                        Tên danh mục
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input name="name" type="text" value="{{ $data->name ?? old('name') }}"
                                        class="form-control  @error('name') is-invalid @enderror" id="name"
                                        placeholder="Tên danh mục">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <!-- input -->
                                <label for="name" class="form-label">
                                    Danh mục cha
                                </label>
                                <select name="parent_id" id="parent_id" class="form-select @error('parent_id') is-invalid @enderror">
                                    <option value="">[ Không có danh mục cha ]</option>
                                    @foreach ($categories as $category)
                                        @if ($category->id != $data->id)
                                            @include('admin.pages.category.components.category-edit', ['category' => $category, 'char' => '', 'data' => $data])
                                        @endif
                                    @endforeach
                                </select>
                                
                                
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('admin.pages.components.seo')

                            <div>
                                <div class="col-12 mt-3">
                                    <div class="d-flex flex-column flex-md-row gap-2">
                                        <a href="{{ route('admin.category') }}" class="btn btn-secondary">Hủy</a>
                                        <button class="btn btn-primary" type="submit">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var name_vd = document.getElementById('name');
        var avatar_vd = document.getElementById('avatar_vd');

        name_vd.addEventListener('input', function(e) {
            avatar_vd.setAttribute('src', `https://ui-avatars.com/api/?name=${e.target.value}&background=random`);
        });
    </script>
@endsection
