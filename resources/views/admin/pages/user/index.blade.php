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
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>Thêm thành
                        viên</a>
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
                                    <th>Avatar</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Quyền hạn</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $item)
                                    <tr>
                                        <td style="padding-right: auto !importain;"><img
                                                src="https://ui-avatars.com/api/?name={{ $item->name }}&background=random"
                                                width="40" class="rounded" alt=""></td>
                                        <td> {{ $item->name }} {{ auth()->user()->id == $item->id ? '(Bạn)' : '' }} </td>
                                        <td> {{ $item->email }} </td>
                                        <td> {{ $item->getRoleNames()->first() }} </td>
                                        <td>
                                            @if (auth()->user()->id != $item->id)
                                                <div class="form-check form-switch mb-2">
                                                    <input
                                                        {{ Auth()->user()->getRoleNames()->first() == 'Quản trị viên' || Auth()->user()->getRoleNames()->first() == 'Ban biên tập' ? '' : 'disabled' }}
                                                        onchange="statusChange(this)" class="status_user form-check-input"
                                                        type="checkbox" role="switch" data-table="user"
                                                        data-id="{{ $item->id }}"
                                                        {{ $item->status == 'on' ? 'checked' : '' }}>
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            @if (auth()->user()->getRoleNames()->first() == 'Quản trị viên' ||
                                                    auth()->user()->getRoleNames()->first() == 'Ban biên tập')
                                                <a href="{{ route('admin.user.edit', $item->id) }}"
                                                    class="btn btn-sm bg-light-primary text-dark-primary"><i class="bi bi-pen"></i></a>
                                                @if (auth()->user()->id != $item->id)
                                                    <a href="{{ route('admin.user.delete', $item->id) }}"
                                                        class="btn btn-sm bg-light-danger text-dark-danger"><i class="bi bi-trash"></i></a>
                                                @endif
                                            @endif
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

    <style>
        .dt-container.dt-bootstrap5.dt-empty-footer {
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>

    <script>
        function statusUser(element) {
            const status = element.checked ? 1 : 2;
            const id = element.value;
            console.log(id);
            console.log(status);
            $.get(`/admin/user/status/${id}/${status}`, function(data) {
                if (id == data) {
                    Swal.fire({
                        title: "Good job!",
                        text: "Cập nhật trạng thái thành viên thành công!",
                        icon: "success"
                    });
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                }
            });
        }
    </script>
@endsection
