<!DOCTYPE html>
<html class="no-js" lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="meta description">

<!-- Site title -->
<title>@yield('title', 'Aakhet')</title>
<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('public/web/img/favicon.ico') }}" type="image/x-icon" />
<!-- Bootstrap CSS -->
<link href="{{ asset('public/web/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Font-Awesome CSS -->
<link href="{{ asset('public/web/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- IonIcon CSS -->
<link href="{{ asset('public/web/css/ionicons.min.css') }}" rel="stylesheet">
<!-- helper class css -->
<link href="{{ asset('public/web/css/helper.min.css') }}" rel="stylesheet">
<!-- Plugins CSS -->
<link href="{{ asset('public/web/css/plugins.css') }}" rel="stylesheet">
<!-- Main Style CSS -->
<link href="{{ asset('public/web/css/style.css') }}" rel="stylesheet">

@yield('css')
</head>

<body>
    <!-- header area start -->
    @include('layouts.header')
    <!-- header area end -->

    <!-- Start Content-->
    @yield('content')
    <!-- container -->


    <!-- footer area start -->
    @include('layouts.footer')
    <!-- footer area end -->

    <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    <script src="{{ asset('public/web/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- Jquery Min Js -->
    <script src="{{ asset('public/web/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{ asset('public/web/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugins Js-->
    <script src="{{ asset('public/web/js/plugins.js') }}"></script>
    <!-- Ajax Mail Js -->
    <script src="{{ asset('public/web/js/ajax-mail.js') }}"></script>
    <!-- Active Js -->
    <script src="{{ asset('public/web/js/main.js') }}"></script>

    {{-- START : Add to Cart JS --}}
    <script>
        $(document).ready(function() {

            // START : Update cart item
            $('.qtybtn').click(function() {
                var $button = $(this);
                var cartSlug = $(this).closest('.pro-qty').data('slug');
                let eventType = "";
                if ($button.hasClass('inc')) {
                    eventType = 'inc';
                } else {
                    eventType = 'desc';
                }

                $.ajax({
                    url: "{{ route('front-update-cart') }}",
                    type: "POST",
                    data: {
                        slug: cartSlug,
                        event: eventType,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        location.reload();
                    }
                });
            });
            // END : Update cart item

            // START : Add to cart item
            $('.addToCartBtn').click(function() {
                var productSlug = $(this).data('slug');
                $.ajax({
                    url: "{{ route('front-add-to-cart') }}",
                    type: "POST",
                    data: {
                        slug: productSlug,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == 200) {
                            window.location.href = "{{ route('front-cart') }}";
                        } else {
                            window.location.href = "{{ route('front-login') }}";
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("xhr", xhr.responseText);
                    }
                });
            });
            // END : Add to cart item
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
  function ShowNotificator(icon,title) {
    Swal.fire({
      position: 'top-end',
      icon: icon,
      title: title,
      showConfirmButton: false,
      timer: 3000,
      toast: true,
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
    },
    hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
    },
});
}

</script>
@if (session('success'))
    <script>
        ShowNotificator('success', '{{ session('success') }}');
    </script>
@endif
@if (session('error'))
    <script>
        ShowNotificator('error', '{{ session('error') }}');
    </script>
@endif




    {{-- END : Add to Cart JS --}}
    @yield('js')
</body>

</html>
