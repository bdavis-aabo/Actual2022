<?php get_header(); ?>

	<section class="page-section page-heroimage">
		<picture>
			<source media="(max-width: 520px)" srcset="/wp-content/uploads/2022/06/portfolio-mobile-1.png">
			<img src="/wp-content/uploads/2022/06/portfolio-hero.jpg" alt="portfolio heroimage" class="heroimage-img img-fluid" />
		</picture>
	</section>

	<?php if(have_posts()): while(have_posts()): the_post(); $_image = get_field('project_thumbnail'); ?>
	<section class="page-section project-detail-section">
		<article class="project">
			<div class="project-top left-angle-bg">
				<div class="project-titlebar">
					<h3 class="project-type"><?php echo get_field('project_type') ?></h3>
					<h2 class="project-name"><?php the_title(); ?></h2>
				</div>
				<figure>
					<img src="<?php echo $_image['url'] ?>" alt="<?php the_title() ?>" class="img-fluid aligncenter" />
				</figure>
			</div>
			<div class="project-bottom right-angle-bg">
				<div class="project-information">
					<h1 class="project-title"><?php the_title(); ?></h1>
					<div class="project-details"><?php echo get_field('project_details') ?></div>
					<?php the_content(); ?>
				</div>
			</div>
		</article>
	</section>

	<section class="page-section development-section blue-bg">
		<div class="development-container">
			<div class="development-left">
				<h3 class="gray-txt">Development Team</h3>
			</div>
			<div class="development-right">
				<?php echo get_field('project_team') ?>
			</div>
		</div>
	</section>

	<p class="page-links">
		<a href="/portfolio" class="btn blue-btn">
			<i class="fas fa-chevron-left"></i> Back to Portfolio
		</a>
	</p>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>
