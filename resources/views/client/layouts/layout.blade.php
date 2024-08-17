<!DOCTYPE html>
<html lang="vi">

<head>
    @include('client.layouts.components.head')
</head>

<body>

    <!-- header -->
    @include('client.layouts.components.header')
    <!-- end header -->

    <div class="main_all">
        <!-- sidebar -->
        @include('client.layouts.components.sidebar')
        <!-- end sidebar -->
        <!-- content -->
        <div class="App_withSidebarContent__o4VlQ">
            <div class="container-fluid mt-3">
                @include('client.layouts.components.menu')
            @yield('slider')
            <div class="row mb-3">
                <article class="col-12 col-lg-9">
                    @yield('content')
                </article>
                @include('client.layouts.components.aside')
            </div>
        </div>
    </div>
    </div>

    <!-- modal register -->
    @include('client.auth.register')
    <!-- end modal register -->

    <!-- modal login -->
    @include('client.auth.login')
    <!-- end modal login -->


    @include('client.layouts.components.scripts')

    @stack('script')
</body>

</html>
