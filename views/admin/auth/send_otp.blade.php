<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="EMI LOCKER">
    <meta name="keywords"
        content="EMI LOCKER">
    <meta name="author" content="EMI LOCKER">
    <meta name="robots" content="index, follow">

    <!-- Title -->
    <title>Login | EMI LOCKER</title>

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">

    <!-- Favicon -->
    {{-- <link rel="icon" href="{{ asset('assets/img/global_logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/global_logo.png') }}"> --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="account-content">
            <div class="d-flex flex-wrap w-100 vh-100 overflow-hidden account-bg-03">
                <div
                    class="d-flex align-items-center justify-content-center flex-wrap vh-100 overflow-auto p-4 w-50 bg-backdrop">
                    <form action="{{route('admin_send_otp')}}" id="formSubmitsendotp" method="post" autocomplete="off" class="flex-fill">
                        @csrf
                        <div class="mx-auto mw-450">
                            <div class="text-center mb-4">
                                {{-- <img src="{{ asset('assets/img/global_logo.png') }}" class="img-fluid" alt="Logo"> --}}
                            </div>
                            <div class="mb-4">
                                <h4 class="mb-2 fs-20">Forgot Password?</h4>
                                <p>If you forgot your password, well, then we’ll email you instructions to reset your
                                    password.</p>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Email Address</label>
                                <div class="position-relative">
                                    <span class="input-icon-addon"><i class="ti ti-mail"></i></span>
                                    <input type="email" name="email" class="form-control" >
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100 loderButton"><span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Submit</button>
                            </div>
                            <div class="mb-3 text-center">
                                <h6>Return to <a href="{{ route('admin_login') }}" class="text-purple link-hover "> Login</a></h6>
                            </div>

                            <div class="text-center">
                                <p class="fw-medium text-gray">Copyright &copy; {{ now()->year }} - EMI LOCKER</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/js/feather.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
     $(document).on('submit', 'form#formSubmitsendotp', function(e) {

		e.preventDefault();
		var data = new FormData(this);
		$('.loderIcon').show();
		$('.loderButton').prop("disabled", true);
		$.ajax({
			cache: false,
			contentType: false,
			processData: false,
			url: $(this).attr("action"),
			method: $(this).attr("method"),
			dataType: "json",
			data: data,
			beforeSend: function(){
				$('.preloader').show();
			},
			complete: function(){
				$('.preloader').hide();
			},
			success: function(response)
			{
				$('.loderIcon').hide();
				$('.loderButton').prop("disabled", false);
				if (response.responseCode == 200) {
					toastr.success(response.responseMessage);
					if(response.responseUrl)
					{
                      location.href = response.responseUrl;
					}else{
					  location.reload();
					}

				} else {
					toastr.error(response.responseMessage);
				}
			}
		});
});
    </script>
</body>

</html>
