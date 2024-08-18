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
                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>Thêm
                        mới</a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column gap-4">
        <h3 class="mb-0 h6">Thông tin vai trò</h3>
        <form action="{{ route('admin.role.store') }}" method="POST" class="row g-3 needs-validation" novalidate="">
            @csrf
            <div class="col-lg-12 col-12">
                <label for="name">Tên vai trò</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-12 col-12">
                <label for="" class="form-label">Quyền</label> <br>
                <input onchange="checkAllPermission()" type="checkbox" class="form-check-input check_all_permission"
                    id="checkAll">
                <label for="checkAll" class="form-check-label">Chọn tất cả</label> <br> <br>

                <div class="row">
                    @foreach ($formattedPermissionsGroup as $key => $item)
                        <div class="col-3 mb-5">
                            <h3>{{ strtoupper($item['acc']) }}</h3>
                            @foreach ($item['permissions'] as $permission)
                                <input type="checkbox" name="permissions[]" class="form-check-input checked_permissions"
                                    value="{{ $permission->name }}" id="{{ $permission->name }}">
                                <label for="{{ $permission->name }}">
                                    {{ $permission->description != null ? $permission->description : $permission->name }}
                                </label> <br>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <div class="col-12 mt-3">
                    <div class="d-flex flex-column flex-md-row gap-2">
                        <a href="{{ route('admin.user') }}" class="btn btn-secondary">Hủy</a>
                        <button class="btn btn-primary" type="submit">Tạo</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
