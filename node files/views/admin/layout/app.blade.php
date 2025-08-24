<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EMI LOCKER">
    <meta name="keywords" content="EMI LOCKER">
    <meta name="author" content="EMI LOCKER">
	<meta name="robots" content="index, follow">

	<!-- Title -->
    {{-- <title>Dashboard | EMI LOCKER</title> --}}

    <title>
        Admin | @yield('title')
    </title>
	<!-- Themescript JS -->
	<script type="text/javascript">
		var imagePath1 = "{{ asset('assets/img/theme/theme-01.svg') }}";
		var imagePath2 = "{{ asset('assets/img/theme/theme-02.svg') }}";
		var imagePath3 = "{{ asset('assets/img/theme/theme-03.svg') }}";
		var imagePath4 = "{{ asset('assets/img/theme/theme-04.svg') }}";
		var imagePath5 = "{{ asset('assets/img/theme/theme-05.svg') }}";
		var imagePath6 = "{{ asset('assets/img/theme/theme-06.svg') }}";
		var imagePath7 = "{{ asset('assets/img/theme/theme-07.svg') }}";
		var imagePath8 = "{{ asset('assets/img/theme/theme-08.svg') }}";
		var imagePath9 = "{{ asset('assets/img/theme/theme-09.svg') }}";
		var imagePath10 = "{{ asset('assets/img/theme/theme-10.svg') }}";

	</script>
	<script src="{{ asset('assets/js/theme-script.js') }}"></script>
	@include("admin.layout.css")
    @yield('css')

</head>
<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		 @if (Route::is(['admin_dashboard']))
            <div class="preloader">
                <span class="loader"></span>
            </div>
         @endif
         @include("admin.layout.header")
         @include("admin.layout.sidebar")
         @yield('content')

	</div>
	<!-- /Main Wrapper -->
	@include('admin.layout.modal_popup')
    @include("admin.layout.footer")
	@include("admin.layout.js")

</body>
</html>
