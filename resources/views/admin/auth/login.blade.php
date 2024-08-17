<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://freshcart.codescandy.com/assets/css/theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
        integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Libs CSS -->
    <title>Đăng nhập admin</title>
    <style>
        .or_login {
            align-items: center;
            gap: 10px;
        }
        .or_login div {
            height: 1px;
            background: rgba(193, 193, 193, 0.811);
            width: 30px ;
        }
    </style>
</head>

<body class="mt-5 d-flex justify-content-center">

    <section class="my-lg-14 my-8">
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                    <!-- img -->
                    <img src="https://freshcart.codescandy.com/assets/images/svg-graphics/signin-g.svg" alt=""
                        class="img-fluid">
                </div>
                <!-- col -->
                <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                    <div class="mb-lg-9 mb-5">
                        <h1 class="mb-1 h2 fw-bold">Đăng nhập vào trang quản trị</h1>
                        {{-- <p>Welcome back to VUDEVWEB! Enter your email to get started.</p> --}}
                    </div>

                    <form action="{{ route('admin.login.doLogin') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <!-- row -->
                            <div class="col-12">
                                <!-- input -->
                                <label for="email" class="form-label">Địa chỉ Email</label>
                                <input name="email" value="{{ old('email') }}" type="text" id="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email của bạn">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <!-- input -->
                                <div class="password-field position-relative">
                                    <label for="password" class="form-label visually-hidden">Password</label>
                                    <div class="password-field position-relative">
                                        <input name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror fakePassword"
                                            id="password" placeholder="*****">
                                        <span><i class="bi bi-eye-slash passwordToggler"></i></span>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- form check -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <!-- label -->
                                    <label class="form-check-label" for="flexCheckDefault">Nhớ tôi</label>
                                </div>
                                <div>
                                    Bạn quên mật khẩu?
                                    <a href="">Đặt lại</a>
                                </div>
                            </div>
                            <!-- btn -->
                            <div class="col-12 d-grid"><button type="submit" class="btn btn-primary">Đăng nhập</button>
                            </div>

                            <div class="or_login col-12 d-flex justify-content-center">
                                <div class=""></div>
                                <span>Hoặc</span>
                                <div class=""></div>
                            </div>
                            <div class="google_login d-grid">
                                
                                <a href="/admin/auth/google" class="d-flex align-item-center justify-content-center gap-2 btn btn-outline-primary"> 
                                    <img width="25" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/225px-Google_%22G%22_logo.svg.png" alt="">
                                     <span>Đăng nhập bằng Google</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- alert --}}
    {{-- @if (Session::has('message'))
        <script>
            alert('đúng mk')
        </script>
    @endif --}}

    <script src="https://freshcart.codescandy.com/assets/js/vendors/password.js"></script>
</body>

</html>
