{{-- <x-guest-layout> --}}
<!-- Session Status -->
{{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
{{-- <form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus
            autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Mật khẩu')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
            autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Nhớ tôi') }}</span>
        </label>
    </div>
    <div class="text-center">
        <x-primary-button class="ms-3">
            {{ __('Đăng nhập') }}
        </x-primary-button>
    </div>
    <div class="flex items-center justify-between mt-4 gap-3">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Quên mật khẩu?') }}
            </a>
        @endif

        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('register') }}">
            {{ __('Chưa có tài khoản?') }}
        </a>

    </div>
</form> --}}
{{-- </x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/client_asset/css/my_cus.css" rel="stylesheet">
    <link href="/client_asset/images/logo/logo_vd.svg" type="image/x-icon" rel="shortcut icon">
    <!-- Libs CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <link href="/client_asset/fonts/feather/feather.css" rel="stylesheet">
    <link href="/client_asset/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="/client_asset/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="/client_asset/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/client_asset/css/theme.min.css">

    <link rel="stylesheet" href="/client_asset/custom/style.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="container py-4">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card w-100" style="max-width:50%">
                <div class="card-body">
                    <div class="form_header">
                        <a href="/" class="text-center d-flex justify-content-center">
                            <img src="./client_asset/images/logo/logo_vd.ico" width="50" alt="">
                        </a>
                        <h2 class="text-center">Đăng nhập tài khoản</h2>
                    </div>
                    <main class="ps-8 me-8 form_main">
                        <form method="POST" action="{{ route('login') }}" class="mb-4" name="login">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="label">Email của bạn</label>
                                <input name="email" value="{{ old('email') }}" placeholder="Địa chỉ email" class="form-control i_log mb-1"
                                    type="text" >
                                    @error('email')
                                        <span class="message_error"> {{ $message }} </span>
                                    @enderror
                            </div>
                            <div>
                                <!-- <label for="" class="label">Tên của bạn?</label> -->
                                <input name="password" type="password" placeholder="Mật khẩu"
                                    class="form-control i_log mb-1" type="text">
                                    @error('password')
                                        <span class="message_error"> {{ $message }} </span>
                                    @enderror
                            </div>

                            <div class="mt-5 d-block">
                                <button class="btn btn-login-vd w-100">Đăng nhập</button>
                            </div>
                        </form>
                        <div class="mb-3">
                            <a href="{{ route('google.login') }}" class="btn-login-social mb-3">
                                <img class="icon_social" width="25"
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/800px-Google_%22G%22_logo.svg.png"
                                    alt="">
                                <span>Đăng nhập với Google</span>
                            </a>
                            {{-- <a href="#" class="btn-login-social">
                                <img class="icon_social" width="25"
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/800px-Facebook_Logo_%282019%29.png"
                                    alt="">
                                <span>Đăng nhập với Facebook</span>
                            </a> --}}
                        </div>
                        <div class="text-center text-inherit">
                            <p>Bạn chưa có tài khoản? <a class="text-vd" href="{{ route('register') }}" >Đăng ký</a></p>
                            <p><a href="{{ route('password.request') }}" class="text-vd" >Quên mật khẩu?</a></p>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
