        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: "{{ $message }}",
                    icon: "success"
                });
            </script>
        @endif

        @if ($message = Session::get('error'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "{{ $message }}",
                });
            </script>
        @endif
