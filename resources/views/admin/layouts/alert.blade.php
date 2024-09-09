
<script>
    @if ($message = Session::get('success'))
        toastr.options.timeOut = 15000;
        toastr.success("{{ $message }}");
        // var audio = new Audio('audio.mp3');
        // audio.play();
    @endif

    @if ($message = Session::get('error'))
        toastr.options.timeOut = 15000;
        toastr.error("{{ $message }}");
        // var audio = new Audio('audio.mp3');
        // audio.play();
    @endif

    @if ($message = Session::get('warning'))
        toastr.options.timeOut = 15000;
        toastr.warning("{{ $message }}");
        // var audio = new Audio('audio.mp3');
        // audio.play();
    @endif

    @if ($message = Session::get('info'))
        toastr.options.timeOut = 15000;
        toastr.info("{{ $message }}");
        // var audio = new Audio('audio.mp3');
        // audio.play();
    @endif

    @if ($errors->any())
        toastr.options.timeOut = 15000;
        toastr.info("Please check the form below for errors");
        // var audio = new Audio('audio.mp3');
        audio.play();
    @endif
</script>
