<div class="modal fade" id="modal_login" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 20px;">
        <div class="modal-body pb-10">
            <div class="text-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="form_header">
                <a href="/" class="text-center d-flex justify-content-center">
                    <img src="./client_asset/images/logo/logo_vd.ico" width="50" alt="">
                </a>
                <h2 class="text-center">Đăng nhập tài khoản</h2>
            </div>
            <main class="ps-8 me-8 form_main">
                <form autocomplete="off" class="mb-4" name="login">
                    <div class="mb-3">
                        <label for="" class="label">Email của bạn</label>
                        <input name="name" placeholder="Địa chỉ email" class="form-control i_log mb-1"
                            type="text">
                        <!-- <span class="message_error">Trường này không được để trống</span> -->
                    </div>
                    <div>
                        <!-- <label for="" class="label">Tên của bạn?</label> -->
                        <input name="name" type="password" placeholder="Mật khẩu"
                            class="form-control i_log mb-1" type="text">
                        <!-- <span class="message_error mb-1">Trường này không được để trống</span> -->
                    </div>

                    <div class="mt-5 d-block">
                        <button class="btn btn-login-vd w-100">Đăng nhập</button>
                    </div>
                </form>
                <div class="mb-3">
                    <a href="#" class="btn-login-social mb-3">
                        <img class="icon_social" width="25"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/800px-Google_%22G%22_logo.svg.png"
                            alt="">
                        <span>Đăng nhập với Google</span>
                    </a>
                    <a href="#" class="btn-login-social">
                        <img class="icon_social" width="25"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/800px-Facebook_Logo_%282019%29.png"
                            alt="">
                        <span>Đăng nhập với Facebook</span>
                    </a>
                </div>
                <div class="text-center text-inherit">
                    <p>Bạn chưa có tài khoản? <a data-bs-toggle="modal" data-bs-target="#modal_sign"
                            data-bs-dismiss="modal" class="text-vd cursor-pointer">Đăng ký</a></p>
                    <p><a data-bs-dismiss="modal" class="text-vd cursor-pointer">Quên mật khẩu?</a></p>
                </div>
            </main>
        </div>
    </div>
</div>
</div>