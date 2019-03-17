<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="x-ua-compatible" content="IE=Edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet"> 
	</head>
	<body <?php echo body_class(); ?>>
		<div class="viewport">

			<header class="header-wrap">
				<div class="header">
					<?php if ( is_front_page() ) echo '<h1>'; ?>
						<a href="<?php echo home_url(); ?>" title="Geoff Dusome - Grand Rapids WordPress Development" class="logo">GD</a>
					<?php if ( is_front_page() ) echo '</h1>'; ?>
					<div class="connect">
						<h2>Social</h2>
						<ul class="social block">
							<li><a href="https://github.com/GeoffDusome/" target="_blank" title="GitHub" class="github"></a></li>
							<li><a href="https://www.linkedin.com/in/geoffrey-dusome/" target="_blank" title="LinkedIn" class="linkedin"></a></li>
							<li><a href="https://twitter.com/GeoffDusome/" target="_blank" title="Twitter" class="twitter"></a></li>
						</ul>
					</div>
				</div>
			</header>
