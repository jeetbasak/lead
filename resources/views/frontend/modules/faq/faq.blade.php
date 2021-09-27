<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<meta property="og:image" content="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg" />

		<title>TaskAffix</title>
		<!-- Favicon-->
		<link rel="icon" type="image/x-icon" href="{{url('/')}}/public/admin/assets/favicon.ico" />
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{url('/')}}/public/admin/assets/css/font-awesome.min.css">
		<!-- Core theme CSS (Bootstrap CSS)-->
		<link href="{{url('/')}}/public/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
		<!-- Custome CSS -->
		<link href="{{url('/')}}/public/admin/assets/css/styles.css" rel="stylesheet" />
		<!-- Font Link -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="d-flex" id="wrapper">
			<!-- Sidebar-->
			
			<!-- Page content wrapper-->
			<div id="page-content-wrapper">
				<!-- Top navigation-->
				<nav class="navbar navbar-expand-lg navbar-light bg-shadow border-bottom">
					<div class="container">
						<div class="flx-row p-3 p-l-r-0">
							<div class="head-left">
								<h2 class="logo"><a href="{{route('hm')}}"><img src="{{url('/')}}/public/admin/assets/images/TaskAffix.png" style="width: 110px;padding: 0px 0px;"></a></h2>
								<button class="navbar-toggler lnd-menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
								<div class="collapse navbar-collapse lnd-drop" id="navbarSupportedContent">
									<ul class="navbar-nav mt-lg-0 login-menu">
										<li><a href="{{route('faq')}}">Faq</a></li>
										<li><a href="{{route('tc')}}">Terms & conditions</a></li>
										
									</ul>
								</div>
							</div>
							<div class="head-right">
								<ul class="login-menu">
									{{--  <li><a href="#">Login</a></li> --}}
									@if (Route::has('login'))
									
									@auth
									<li>  <a href="{{ url('/home') }}">Home</a> </li>
									@else
									<li> <a href="{{ route('login') }}">Login</a> </li>
									@if (Route::has('register'))
									{{-- <li>    <a href="{{ route('register') }}">Register</a></li> --}}
									<li class="get-btn"><a href="{{ route('register') }}">Get Started <span> > </span></a></li>
									@endif
									@endauth
								</div>
								@endif
								
							</ul>
						</div>
						
						
					</div>
				</nav>
				<!-- Page content-->
				<div class="container">
					<div class="body-main">
						<div class="top-row">
							<h2 class="my-4">FAQ's</h2>
							<div class="flx-row">
								
								
								<div class="flx-col-2">
									@foreach($faq as $key=> $val)
									@if($key==0)
									<div class="accordion accordion-flush" id="faqlist">
										<div class="accordion-item">
											<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{$val->id}}">
											{{@$val->question}}
											</button>
											</h2>
											<div id="faq-content-{{$val->id}}" class="accordion-collapse collapse show" data-bs-parent="#faqlist">
												<div class="accordion-body">
													{{@$val->answer}}
												</div>
											</div>
										</div>
										
										
									</div>
									@else
									<div class="accordion accordion-flush" id="faqlist">
										<div class="accordion-item">
											<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{$val->id}}">
											{{@$val->question}}
											</button>
											</h2>
											<div id="faq-content-{{$val->id}}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
												<div class="accordion-body">
													{{@$val->answer}}
												</div>
											</div>
										</div>
										
										
									</div>
									@endif
									@endforeach
									
								</div>
								

							</div>
						</div>
						
						
						
						
						
						
						
						
					</div>
				</div>
			</div>
			
		</div>
		<div class="footer">
				<p>Copyright © taskaffix.com. All Rights Reserved</p>
			</div>
		<!-- JS Start here -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
		<!-- Bootstrap core JS-->
		<script src="{{url('/')}}/public/admin/assets/js/bootstrap.min.js"></script>
		<!-- Core theme JS-->
		<script src="{{url('/')}}/public/admin/assets/js/scripts.js"></script>
		<script>
		$('.menuclose').click(function () {
		$('body').removeClass('sb-sidenav-toggled');
		
		});
		</script>
	</body>
</html>