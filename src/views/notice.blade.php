@if (session()->has('flash_notification.notice'))

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "preventDuplicates": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "{{session('flash_notification.timeout')}}",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr.{{ session('flash_notification.level') }}('{{session('flash_notification.message')}}','{{session()->get('flash_notification.title')}}');
    </script>

@endif

@if (session()->has('flash_notification.sweet'))

    <script>
        @php
                $title = ( !session()->has('flash_notification.title') ? 'Parabens' : session()->get('flash_notification.title') );
        @endphp
        swal({
            title: "{{$title}}",
            text: "{{session('flash_notification.message')}}",
            type: "{{session('flash_notification.level')}}",
            timer: "{{session('flash_notification.timeout')}}",
            showConfirmButton: false
        });

    </script>

@endif