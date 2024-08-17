@extends('admin.layouts.layout')

@section('content')
    {{-- <div class="table-responsive-xl mb-6 mb-lg-0"> --}}
        <div class="row flex-wrap pb-3 pb-lg-0">
            <div class="col-lg-4 col-12 mb-6">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <!-- card body -->
                    <div class="card-body p-6">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <div>
                                <h4 class="mb-0 fs-5">Bài viết</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-danger text-dark-danger rounded-circle">
                                <i class="bi bi-newspaper fs-5"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1">
                            <h1 class="mb-2 fw-bold fs-2">1,863</h1>
                            <span>
                                <span class="text-dark me-1">5+</span>
                                Bài viết mới / ngày
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-6">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <!-- card body -->
                    <div class="card-body p-6">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <div>
                                <h4 class="mb-0 fs-5">Lượt xem bài viết</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-warning text-dark-warning rounded-circle">
                                <i class="bi bi-eye fs-5"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1">
                            <h1 class="mb-2 fw-bold fs-2">42,339</h1>
                            <span>
                                <span class="text-dark me-1">3,500+</span>
                                Lượt xem mới / ngày
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-6">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <!-- card body -->
                    <div class="card-body p-6">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <div>
                                <h4 class="mb-0 fs-5">Thành viên</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-info text-dark-info rounded-circle">
                                <i class="bi bi-people fs-5"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1">
                            <h1 class="mb-2 fw-bold fs-2">39,354</h1>
                            <span>
                                <span class="text-dark me-1">30+</span>
                                Thành viên mới / ngày
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection
