@extends('admin.layouts.layout')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
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
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>Thêm thành
                        viên</a>
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
                        <h3 class="mb-0 h6">Thông tin thành viên</h3>
                        <form action="{{ route('admin.user.store') }}" method="POST" class="row g-3 needs-validation"
                            novalidate="">
                            @csrf
                            <div class="col-lg-6 col-12">
                                <div>
                                    <!-- input -->
                                    <label for="name" class="form-label">
                                        Họ và tên
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input name="name" type="text" value="{{ old('name') }}"
                                        class="form-control  @error('name') is-invalid @enderror" id="name"
                                        placeholder="Họ và tên thành viên">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div>
                                    <!-- input -->
                                    <label for="email" class="form-label">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input name="email" type="text" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Địa chỉ email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div>
                                    <!-- input -->
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input name="password" type="text"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder="Mật khẩu của thành viên">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <label class="form-label" for="creatCustomerDate">Mật khẩu xác nhận</label>
                                <input name="password_c" type="text"
                                    class="form-control @error('password_c') is-invalid @enderror" id="creatCustomerDate"
                                    placeholder="Nhập lại mật khẩu">
                                @error('password_c')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 mt-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status"
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option value=""> [ CHỌN TRẠNG THÁI ] </option>
                                    <option value="on"> Ok </option>
                                    <option value="off"> Chặn </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 mt-3">
                                <label for="role">Quyền hạn</label>
                                <select name="role" id="role"
                                    class="form-select select2 @error('role') is-invalid @enderror">
                                    <option value=""> [ CHỌN QUYỀN HẠNG ] </option>

                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"> {{ $role->name }} </option>
                                    @endforeach

                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <div class="col-12 mt-3">
                                    <div class="d-flex flex-column flex-md-row gap-2">
                                        <a href="{{ route('admin.user') }}" class="btn btn-secondary">Hủy</a>
                                        <button class="btn btn-primary" type="submit">Tạo thành viên</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .select2-selection.select2-selection--single {
            border-radius: .5rem;
            font-size: .890;
            font-weight: 500;
            line-height: 1.6;
            padding: .55rem 3rem 1.9rem 1rem;
        }

        .form-select:focus {
            border-color: #85d685;
            box-shadow: 0 0 0 .25rem rgba(10, 173, 10, .25);
            outline: 0;
        }
    </style>

    <script>
        var name_vd = document.getElementById('name');
        var avatar_vd = document.getElementById('avatar_vd');

        name_vd.addEventListener('input', function(e) {
            avatar_vd.setAttribute('src', `https://ui-avatars.com/api/?name=${e.target.value}&background=random`);
        });
    </script>
@endsection
