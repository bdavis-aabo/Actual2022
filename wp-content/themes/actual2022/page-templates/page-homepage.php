<?php /* Template Name: Page - Homepage */ ?>

<?php get_header(); ?>

	<?php if(have_rows('homepage_slides')): ?>
	<section class="homepage-section mobile-slides">
		<div class="swiper mobileSlides">
			<div class="swiper-wrapper">
				<?php while(have_rows('homepage_slides')): the_row(); $_mobileImage = get_sub_field('slide_mobile') ?>
				<div class="swiper-slide">
					<img src="<?php echo $_mobileImage['url'] ?>" alt="" class="img-fluid slide-image">
					<div class="swiper-caption">
						<div class="caption-content">
							<?php if(get_sub_field('slide_caption') != ''): echo get_sub_field('slide_caption'); else: echo '&nbsp;&zwnj;'; endif; ?></div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<div class="swiper-pagination"></div>
		</div>

	</section>

	<!-- desktop slides -->
	<section class="homepage-section homepage-slides">
		<div class="swiper homepageSlides">
			<div class="swiper-wrapper">
				<?php while(have_rows('homepage_slides')): the_row(); $_image = get_sub_field('slide_image'); ?>
				<div class="swiper-slide">
					<img src="<?php echo $_image['url'] ?>" alt="" class="slide-image">
					<div class="swiper-caption"><?php echo get_sub_field('slide_caption') ?></div>
				</div>
				<?php endwhile; ?>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</section>
	<?php endif; ?>

	<section class="homepage-section homepage-content-section">
		<div class="homepage-content-container">
			<article class="homepage-content">
				<?php the_content(); ?>

				<a href="/about" title="About <?php bloginfo('name') ?>" class="btn text-btn">
					<i class="fas fa-chevron-right"></i> about
				</a>
			</article>
		</div>
	</section>

<?php get_footer(); ?>
