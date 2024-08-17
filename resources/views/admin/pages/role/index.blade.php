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
                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i>
                        Thêm vai trò
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
                                    <th>#</th>
                                    <th>Tên vai trò</th>
                                    <th>Quyền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td> {{ Str::upper($role->name) }} </td>
                                        <td>
                                            <div class="row">
                                                @foreach ($role->permissions as $item)
                                                    <span
                                                        class="col-3 me-2 mb-2 badge bg-light-primary text-dark-primary">{{ Str::upper($item->name) }}</span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.role.delete', $role->id) }}"
                                                onclick="return confirm('Bạn có chắc muốn xóa quyền này không?')"
                                                class="btn btn-sm  bg-light-danger text-dark-danger"><i
                                                    class="bi bi-trash"></i>
                                            </a>
                                            <a href="{{ route('admin.role.edit', $role->id) }}"
                                                class="btn btn-sm  bg-light-primary text-dark-primary"><i
                                                    class="bi bi-pen"></i>
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
