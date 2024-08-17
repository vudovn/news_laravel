<!DOCTYPE html>
<html lang="vi">
@include('admin.layouts.components.head')

<body>
    <div>
        @include('admin.layouts.components.header')
        <div class="main-wrapper">
            @include('admin.layouts.components.sidebar')
            <main class="main-content-wrapper">
                <section class="container">
                    @include('admin.layouts.components.noti')
                    {{-- Phần giao diện trang web thay đổi --}}
                    @yield('content')
                    {{-- end --}}
                </section>
            </main>
        </div>
    </div>
    @include('admin.layouts.components.scripts')


    <style>
        .dt-container.dt-bootstrap5.dt-empty-footer {
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>

    <script>
        function statusChange(data) {
            const table = data.getAttribute('data-table')
            const id = data.getAttribute('data-id')
            const status = data.checked ? 'on' : 'off'
            $.ajax({
                type: "POST",
                url: "/api/v1/statusChange",
                data: JSON.stringify({
                    id: id,
                    table: table,
                    status: status
                }),
                contentType: "application/json; charset=utf-8",
                crossDomain: true,
                dataType: "json",
                success: function(data, status, jqXHR) {
                    if (id == data.id) {
                        Swal.fire({
                            title: "Good job!",
                            text: data.message,
                            icon: "success"
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                },
                error: function(jqXHR, status) {
                    console.log(jqXHR);
                    alert('Bị lỗi khi cập nhật trạng thái' + status.code);
                }
            });
        }
    </script>


</body>

</html>
