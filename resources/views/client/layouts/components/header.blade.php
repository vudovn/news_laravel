<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNAVBAR" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mb-2">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Docs</a>
            </li>

        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</div>
<nav class="navbar navbar-expand-lg NavBar_wrapper__4m3K5">
    <!-- Button -->
    <div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNAVBAR"
            aria-controls="offcanvasNAVBAR">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="NavBar_logo__Rgo-5">
        <a class="navbar-brand" href="/"><img src="/client_asset/images/logo/logo_vd.svg" alt=""
                class="rounded" width=38></a>
        <span>VuDevWeb</span>
    </div>
    <div class="NavBar_body__4Yhth d-flex-center">
        <div class="search_form">
            <div class="Search_wrapper__Bwvae d-flex-center" aria-expanded="false">
                <div class="Search_searchIcon__-23JY">
                </div>
                <input class="Search_input__GnMba" id="search_on" spellcheck="false"
                    placeholder="Tìm kiếm bài viết, video, danh mục ..." value="">
                <div class="Search_closeIcon" id="search_close">
                </div>
            </div>
            <div class="search_out card card-body p-0" id="search_out">
                <div class="search_header" id="search_header">
                    <!-- render status từ api -->
                </div>
                <div class="search_heading" id="search_heading">
                    <!--  -->
                </div>
                <div class="search_result" id="search_result">
                    <!-- render bài viết từ api -->
                </div>
            </div>
        </div>
    </div>

    <div class="NavBar_actions__nSNzo">
        <div class="ms-auto d-flex align-items-center order-lg-3">
            <ul class="navbar-nav navbar-right-wrap mx-2 flex-row">
                {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#modal_sign"
                    class="btn me-2 btn-sign-vd">Đăng ký</button>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal_login"
                    class="btn btn-login-vd">Đăng nhập</button> --}}
                @if (!Auth::check())
                    <a href="{{ route('register') }}" class="btn me-2 btn-sign-vd">Đăng ký</a>
                    <a href="{{ route('login') }}" class="btn btn-login-vd">Đăng nhập</a>
                @else
                    <!-- thông báo -->
                    <!-- <li class="dropdown d-inline-block stopevent position-static">
                          <a class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
                               href="#" role="button" id="dropdownNotificationSecond" data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                               <i class="fe fe-bell"> </i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg position-absolute mx-3 my-5"
                               aria-labelledby="dropdownNotificationSecond">
                               <div>
                                    <div
                                         class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                                         <span class="h5 mb-0">Thông báo</span>
                                         <a href="# " class="text-muted"><span class="align-middle"><i
                                                        class="fe fe-settings me-1"></i></span></a>
                                    </div>


                                    <ul class="list-group list-group-flush  " style="height: 300px;" data-simplebar>
                                         <li class="list-group-item bg-light">
                                              <div class="row">
                                                   <div class="col">
                                                        <a class="text-body" href="#">
                                                             <div class="d-flex">
                                                                  <img src="/client_asset/images/avatar/avatar-1.jpg"
                                                                       alt="" class="avatar-md rounded-circle">
                                                                  <div class="ms-3">
                                                                       <h5 class="fw-bold mb-1">Vudevweb</h5>
                                                                       <p class="mb-3 text-body">
                                                                            adu hacker!
                                                                       </p>
                                                                       <span class="fs-6 text-muted">
                                                                            <span>
                                                                                 <span class="fe fe-thumbs-up text-success me-1"></span>
                                                                                 2 giờ trước,
                                                                            </span>
                                                                            <span class="ms-1">2:19 PM</span>
                                                                       </span>
                                                                  </div>
                                                             </div>
                                                        </a>
                                                   </div>

                                                   <div class="col-auto text-center me-2">

                                                        <a href="#" class="badge-dot bg-info" class="icon_news"
                                                             data-bs-toggle="tooltip" data-bs-placement="top"
                                                             title="Mark as read">
                                                        </a>
                                                        <div>
                                                             <a href="#" class="bg-transparent" class="icon_news"
                                                                  data-bs-toggle="tooltip" data-bs-placement="top"
                                                                  title="Remove">
                                                                  <i class="fe fe-x text-muted"></i>
                                                             </a>
                                                        </div>
                                                   </div>
                                              </div>
                                         </li>
                                         <li class="list-group-item">
                                              <div class="row">
                                                   <div class="col">
                                                        <a class="text-body" href="#">
                                                             <div class="d-flex">
                                                                  <img src="/client_asset/images/avatar/avatar-2.jpg"
                                                                       alt="" class="avatar-md rounded-circle">
                                                                  <div class="ms-3">
                                                                       <h5 class="fw-bold mb-1">
                                                                            Trịnh Công Sơn
                                                                       </h5>
                                                                       <p class="mb-3 text-body">
                                                                            Adu hacker!
                                                                       </p>
                                                                       <span class="fs-6 text-muted">
                                                                            <span>
                                                                                 <span  class="fe fe-thumbs-up text-success me-1"></span>
                                                                                 5 tháng 3,
                                                                            </span>
                                                                            <span class="ms-1">1:20 PM</span>
                                                                       </span>
                                                                  </div>
                                                             </div>
                                                        </a>
                                                   </div>
                                                   <div class="col-auto text-center me-2">
                                                        <a href="#" class="badge-dot bg-secondary" class="icon_news"
                                                             data-bs-toggle="tooltip" data-bs-placement="top"
                                                             title="Mark as unread">
                                                        </a>
                                                   </div>
                                              </div>
                                         </li>
                                    </ul>
                                    <div class="border-top px-3 pt-3 pb-0">
                                         <a href="#"
                                              class="text-link fw-semibold">Xem thêm</a>
                                    </div>
                               </div>
                          </div>
                     </li> -->

                    <!-- tài khoản -->

                    <li class="dropdown ms-2 d-inline-block position-static">
                        <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static"
                            aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar"
                                    src="https://ui-avatars.com/api/?name={{ Auth()->user()->name }}&background=random"
                                    class="rounded-circle">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
                            <div class="dropdown-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img alt="avatar"
                                            src="	https://ui-avatars.com/api/?name={{ Auth()->user()->name }}&background=random"
                                            class="rounded-circle">
                                    </div>
                                    <div class="ms-3 lh-1">
                                        <h5 class="mb-1">{{ Auth()->user()->name }}</h5>
                                        <p class="mb-0 text-muted">{{ Auth()->user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item text-link" href="#">
                                        <i class="fe fe-user me-2"></i>Tài khoản
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-link" href="#">
                                        <i class="fe fe-settings me-2"></i>Cài đặt
                                    </a>
                                </li>
                                @if (Auth::user()->role == 1)
                                    <li>
                                        <a class="dropdown-item text-link" href="{{ route('admin.dashboard') }}">
                                            <i class="fe fe-settings me-2"></i>Quản trị
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item text-link" href="{{ route('logout') }}">
                                        <i class="fe fe-power me-2"></i>Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>

</nav>
