<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Moschino | Minimalist Free HTML Portfolio by WowThemes.net</title>
<link rel='stylesheet' href="{{asset('frontend/css/woocommerce-layout.css')}}" type='text/css' media='all'/>
<link rel='stylesheet' href="{{asset('frontend/css/woocommerce-smallscreen.css')}}" type='text/css' media='only screen and (max-width: 768px)'/>
<link rel='stylesheet' href='{{asset('frontend/css/woocommerce.css')}}' type='text/css' media='all'/>
<link rel='stylesheet' href="{{asset('frontend/css/font-awesome.min.css')}}" type='text/css' media='all'/>
<link rel='stylesheet' href="{{asset('frontend/css/style.css')}}" type='text/css' media='all'/>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500,700%7CHerr+Von+Muellerhoff:400,500,700%7CQuattrocento+Sans:400,500,700' type='text/css' media='all'/>
<link rel='stylesheet' href="{{asset('frontend/css/easy-responsive-shortcodes.css')}}" type='text/css' media='all'/>
</head>
<body class="home page page-template page-template-template-portfolio page-template-template-portfolio-php">
<div id="page">
	<div class="container">
		<header id="masthead" class="site-header">
		<div class="site-branding">
			<h1 class="site-title"><a href="index.html" rel="home">Moschino</a></h1>
			<h2 class="site-description">Minimalist Portfolio HTML Template</h2>
		</div>
		@include('frontend.layouts.nav')
		</header>
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main">
					@yield('content')
				
				<!-- .grid -->
				
					<nav class="pagination">
					<span class="page-numbers current">1</span>
					<a class="page-numbers" href="#">2</a>
					<a class="next page-numbers" href="#">Next »</a>
					</nav>
					<br/>
				
				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
		</div>
		<!-- #content -->
	</div>
	<!-- .container -->
	<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="site-info">
			<h1 style="font-family: 'Herr Von Muellerhoff';color: #ccc;font-weight:300;text-align: center;margin-bottom:0;margin-top:0;line-height:1.4;font-size: 46px;">Moschino</h1>
			 <a target="blank" href="https://www.wowthemes.net/">&copy; Moschino - Free HTML Template by WowThemes.net</a>
		</div>
	</div>	
	</footer>
	<a href="#top" class="smoothup" title="Back to top"><span class="genericon genericon-collapse"></span></a>
</div>
<!-- #page -->
<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src='{{asset('frontend/js/plugins.js')}}'></script>
<script src="{{asset('frontend/js/scripts.js')}}"></script>
<script src="{{asset('frontend/js/masonry.pkgd.min.js')}}"></script>
</body>
</html>