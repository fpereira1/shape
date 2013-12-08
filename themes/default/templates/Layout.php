<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<base href="<?php echo get_config('base_url'); ?>" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<?php PagesController::css(); ?>
	</head>
	<body class="<?php echo $bodyClass; ?>">
		
		<?php if(Auth::check()): ?>
		<div class="navbar">
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="<?php echo create_link("pages/welcome"); ?>">Welcome</a></li>
					<li><a href="<?php echo create_link("pages/news"); ?>">News</a></li>
					<li><a href="<?php echo create_link("pages/photos"); ?>">Photo Gallery</a></li>
					<li><a href="<?php echo create_link("guestbook"); ?>">Guestbook</a></li>  
					<li><a href="<?php echo create_link("pages/yourphotos"); ?>">Your photos</a></li>
					<li><a href="<?php echo create_link("pages/contactus"); ?>">Contact Us</a></li>
				</ul>
			</div>
		</div>
		<?php endif; ?>

			<!--[if lt IE 7]>
					<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
			<![endif]-->

			<div class="container">
				<div class="row header">
					<div class="span12">
						<h1>The Marriage of<br />Miss Lara Dawn Dorothy Hone<br />and<br />Sr Filype Falcão de Melo Pereira</h1>
						<br />

						<div class="photos-wed">
							<img src="assets/lara.png" />
							<img src="assets/filype.png" />
						</div>
					</div>
				</div>

					<?php if(Flash::flag()): ?>
							<div class="row-fuild text-success content text-center">
									<?php echo Flash::flush(); ?>
							</div>
							<br />
					<?php endif; ?>

		<div class="row-fuild">
			<?php echo $content; ?>
		</div>
	</div>
			
			<br />

			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', 'UA-39537837-1', 'peartree.me');
				ga('send', 'pageview');

			</script>
	</body>
</html>