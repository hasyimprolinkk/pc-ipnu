<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>PC IPNU - Sistem Informasi Kegiatan PC IPNU</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets')}}/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets')}}/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets')}}/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{asset('assets')}}/vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login PC IPNU Kota Kraksaan</h2>
						</div>
						@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						@if (session('msg'))
							<div class="alert alert-danger">
								<ul>
									<li>{{ session('msg') }}</li>
								</ul>
							</div>
						@endif
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="input-group custom">
								<input type="text" name="username" class="form-control form-control-lg" value="{{old('username')}}" placeholder="Username">
							</div>
							<div class="input-group custom">
								<input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
										<label class="custom-control-label" for="remember">Ingat Saya</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="#" data-toggle="modal" data-target="#Medium-modal">Lupa Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Login') }}</button>
										<a href="{{ url('/') }}" class="btn btn-info btn-lg btn-block">Masuk tanpa login</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Medium modal -->
	<div class="col-md-4 col-sm-12 mb-30">
		<div class="pd-20 card-box height-100-p">
			<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Lupa Password</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<ul class="list-group list-group-flush">
								<li class="list-group-item pt-20 pb-20">
									<h6 class="weight-400 d-flex">
										<i class="icon-copy dw dw-checked mr-2" data-color="#1b00ff"></i> Jika anda melupakan password, mohon untuk menghubungi administrator untuk mereset password dibawah ini :
									</h6>
								</li>
								<li class="list-group-item pt-20 pb-20">
									<h6 class="justify-content-between">
										<i class="icon-copy ion-social-whatsapp-outline mr-2" data-color="#1b00ff"></i><a href="https://wa.me/6281368821694">Whatsapp</a>
									</h6>
								</li>
							</ul>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{asset('assets')}}/vendors/scripts/core.js"></script>
	<script src="{{asset('assets')}}/vendors/scripts/script.min.js"></script>
	<script src="{{asset('assets')}}/vendors/scripts/process.js"></script>
	<script src="{{asset('assets')}}/vendors/scripts/layout-settings.js"></script>
</body>
</html>