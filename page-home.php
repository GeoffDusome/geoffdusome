<?php get_header(); ?>

	<main class="page-wrap">

		<section class="header-image-wrap">
			<div class="video">
				<video poster="<?php echo get_template_directory_uri().'/dist/video/hero.jpg'; ?>" autoplay loop muted data-object-fit="cover">
					<source src="<?php echo get_template_directory_uri().'/dist/video/hero.m4v'; ?>" type="video/mp4">
					<source src="<?php echo get_template_directory_uri().'/dist/video/hero.webm'; ?>" type="video/webm">
					<source src="<?php echo get_template_directory_uri().'/dist/video/hero.ogv'; ?>" type="video/ogg">
					<source src="<?php echo get_template_directory_uri().'/dist/video/hero.mp4'; ?>">
				</video>
			</div>
			<div class="info">
				<div class="inner-content-wrap">
					<h2 class="headline large white">Geoff Dusome</h2>
					<h3 class="headline sub white no-m">WordPress Developer - Grand Rapids, MI</h3>
					<div class="connect">
						<h4>Let's Connect</h4>
						<ul class="social white">
							<li><a href="https://github.com/GeoffDusome/" target="_blank" title="GitHub" class="github"></a></li>
							<li><a href="https://www.linkedin.com/in/geoffrey-dusome/" target="_blank" title="LinkedIn" class="linkedin"></a></li>
							<li><a href="https://twitter.com/GeoffDusome/" target="_blank" title="Twitter" class="twitter"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<section class="main-content">
					<div class="inner-wrap">
						<div class="copy">
							<?php the_content(); ?>
						</div>
					</div>
				</section>

			<?php endwhile; ?>
		<?php endif; ?>

	</main>

<?php get_footer(); ?>