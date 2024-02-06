<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Perpustakaan</title>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Home | Perpustakaan</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset ('assets/images/favicon.png') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.css') }}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset ('assets/css/magnific-popup.min.css') }}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('assets/css/font-awesome.css') }}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ asset ('assets/css/jquery.fancybox.min.css') }}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset ('assets/css/themify-icons.css') }}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/niceselect.css') }}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/animate.css') }}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/flex-slider.min.css') }}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset ('assets/css/owl-carousel.css') }}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset ('assets/css/slicknav.min.css') }}">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ asset ('assets/css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset ('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/responsive.css') }}">
    @yield('css')
</head>
<body class="js">
    <!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								@if (Auth::user())
									@if (Auth::user()->role_id == 2)
										<li>Hai {{ Auth()->user()->name}}</li>
										<li><i class="ti-power-off"></i><a href="logout">Logout</a></li>
									@else
									@endif
								@else
									<li>Hai Selamat Datang</li>
									<li><i class="ti-power-off"></i><a href="login">Login</a></li>
								@endif
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="/"><img src="{{ asset ('assets/images/logo.png') }}" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<form method="GET" action="">
							<div class="search-bar-top">
								<div class="search-bar">
									<select name="category" id="category">
										<option selected="selected">All Category</option>
										@foreach ($categories as $item)
											<option value="{{ $item->slug }}">{{ $item->name }}</option>
										@endforeach
									</select>
										<input name="title" placeholder="Search Products Here....." type="text">
										<button class="btnn" type="submit"><i class="ti-search"></i></button>
									</div>
								</div>
						</form>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>2 Items</span>
										<a href="#">View Cart</a>
									</div>
									<ul class="shopping-list">
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
											<h4><a href="#">Woman Ring</a></h4>
											<p class="quantity">1x - <span class="amount">$99.00</span></p>
										</li>
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
											<h4><a href="#">Woman Necklace</a></h4>
											<p class="quantity">1x - <span class="amount">$35.00</span></p>
										</li>
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount">$134.00</span>
										</div>
										<a href="checkout.html" class="btn animate">Checkout</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
							<div class="sinlge-bar">
								<ul class="list-main">
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li class=" {{ request()->is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
													<li class=" {{ request()->is('list-books') ? 'active' : '' }}"><a href="/list-books">Product</a></li>												
													<li><a href="#">Service</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="shop-grid.html">Shop Grid</a></li>
															<li><a href="cart.html">Cart</a></li>
															<li><a href="checkout.html">Checkout</a></li>
														</ul>
													</li>
													<li><a href="#">Pages</a></li>									
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
													<li><a href="contact.html">Contact Us</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
@yield('content')
    <!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="{{ asset ('assets/images/logo2.png') }}" alt="#"></a>
							</div>
							<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:+62834567890">+628 3456 7890</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="">About Us</a></li>
								<li><a href="">Faq</a></li>
								<li><a href="">Terms & Conditions</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							{{-- <h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul> --}}
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>NO. 342 - Institut Teknologi</li>
									<li>Medan</li>
									<li>info@medan.com</li>
									<li>+628 3456 7890</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href=""><i class="ti-facebook"></i></a></li>
								<li><a href=""><i class="ti-twitter"></i></a></li>
								<li><a href=""><i class="ti-flickr"></i></a></li>
								<li><a href=""><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
	</footer>
</body>

<script src="{{ asset ('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset ('assets/js/jquery-migrate-3.0.0.js') }}"></script>
	<script src="{{ asset ('assets/js/jquery-ui.min.js') }}"></script>
	<!-- Popper JS -->
	<script src="{{ asset ('assets/js/popper.min.js') }}"></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset ('assets/js/bootstrap.min.js') }}"></script>
	<!-- Color JS -->
	<script src="{{ asset ('assets/js/colors.js') }}"></script>
	<!-- Slicknav JS -->
	<script src="{{ asset ('assets/js/slicknav.min.js') }}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{ asset ('assets/js/owl-carousel.js') }}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{ asset ('assets/js/magnific-popup.js') }}"></script>
	<!-- Waypoints JS -->
	<script src="{{ asset ('assets/js/waypoints.min.js') }}"></script>
	<!-- Countdown JS -->
	<script src="{{ asset ('assets/js/finalcountdown.min.js') }}"></script>
	<!-- Nice Select JS -->
	<script src="{{ asset ('assets/js/nicesellect.js') }}"></script>
	<!-- Flex Slider JS -->
	<script src="{{ asset ('assets/js/flex-slider.js') }}"></script>
	<!-- ScrollUp JS -->
	<script src="{{ asset ('assets/js/scrollup.js') }}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{ asset ('assets/js/onepage-nav.min.js') }}"></script>
	<!-- Easing JS -->
	<script src="{{ asset ('assets/js/easing.js') }}"></script>
	<!-- Active JS -->
	<script src="{{ asset ('assets/js/active.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
</html>