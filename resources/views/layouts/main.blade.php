<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>PC IPNU Kota Kraksaan - @yield('title')</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets') }}/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/src/plugins/fancybox/dist/jquery.fancybox.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/styles/style.main.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	@include('sweetalert::alert')

	<div class="header">
        <div class="header-left">
			<div class="brand-logo">
            <a href="/">
				<img src="{{ asset('assets') }}/vendors/images/logo_black.png" alt="" class="light-logo">
			</a>
			</div>
        </div>
		<div class="header-right">	
		<div class="user-notification">
			<div class="dropdown">
				<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
					<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								@foreach(App\Models\Kegiatan::orderBy('id_kegiatan', 'DESC')->get() as $k)
								<li>
									<a href="/kegiatan/{{$k->id_kegiatan}}/komentar">
										<img src="{{ asset('uploads/avatars/'. $k->user->avatar) }}" alt="">
										<h3>{{$k->user->nama}}</h3>
										<p>{{ Str::substr($k->keterangan, 0, 30) }}...</p>
										<i style="font-size: 8pt;">{{$k->created_at->diffForHumans()}}</i>
									</a>
								</li>
								@endforeach
								<li>
									<a href="#">
										<img src="{{ asset('uploads/avatars/default.jpg') }}" alt="">
										<h3>Fikiturrohman</h3>
										<p>Selamat Datang di aplikasi Sistem Informasi Kegiatan PC IPNU Kota Kraksaan...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="user-info-dropdown">
				@if(Auth::check())
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-name">{{Auth::user()->nama}}</span>
						<span class="user-icon" style="size: 5px;">
							<img src="{{ asset('uploads/avatars/'. Auth::user()->avatar) }}" style="width: 50px;height: 50px;" alt="">
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="/dashboard"><i class="icon-copy dw dw-home"></i> Dashboard</a>
						<a class="dropdown-item" href="/profile"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="dw dw-logout"></i> Log out</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
				</div>
				@else
					<a href="/login" class="mt-3 btn btn-sm btn-primary">Login</a>
				@endif
			</div>
			
		</div>
	</div>

	<div class="main-container">
        <div class="pd-ltr-20">
            
            @yield('content')

            <div class="footer-wrap pd-20 mb-20 card-box">
			Sistem Informasi Krgiatan PC IPNU Kraksaan, Kab. Probolinggo
            </div>
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset('assets') }}/vendors/scripts/core.js"></script>
	<script src="{{ asset('assets') }}/vendors/scripts/script.min.js"></script>
	<script src="{{ asset('assets') }}/vendors/scripts/process.js"></script>
	<script src="{{ asset('assets') }}/vendors/scripts/layout-settings.js"></script>
	<script src="{{ asset('assets') }}/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="{{ asset('assets') }}/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{ asset('assets') }}/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ asset('assets') }}/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="{{ asset('assets') }}/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	{{-- <script src="{{ asset('assets') }}/vendors/scripts/dashboard.js"></script> --}}
	{{-- <script src="{{ asset('assets') }}/src/plugins/fancybox/dist/jquery.fancybox.js"></script> --}}
</body>
</html>