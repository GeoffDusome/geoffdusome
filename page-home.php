<?php get_header(); ?>

	<main class="page-wrap">

		<section class="header-image-wrap">
			<video poster="<?php echo get_template_directory_uri().'/dist/video/hero.jpg'; ?>" autoplay loop muted data-object-fit="cover">
				<source src="<?php echo get_template_directory_uri().'/dist/video/hero.m4v'; ?>" type="video/mp4">
				<source src="<?php echo get_template_directory_uri().'/dist/video/hero.webm'; ?>" type="video/webm">
				<source src="<?php echo get_template_directory_uri().'/dist/video/hero.ogv'; ?>" type="video/ogg">
				<source src="<?php echo get_template_directory_uri().'/dist/video/hero.mp4'; ?>">
			</video>
			<div class="vertical-center">
				<div class="cell">
					<div class="inner-content-wrap">
						<h2 class="headline large white">Geoff Dusome</h2>
						<h3 class="headline sub white no-m">WordPress Developer - Grand Rapids, MI</h3>
						<div class="connect">
							<p>Let's connect</p>
							<ul class="social white">
								<li><a href="https://github.com/GeoffDusome/" target="_blank" title="GitHub"></a></li>
								<li><a href="https://twitter.com/GeoffDusome" target="_blank" title="Twitter"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>