<?php /* Template Name: Page - About */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): while(have_posts()): the_post(); $_lgImage = get_field('large_image'); $_mobImage = get_field('mobile_image'); ?>
	<section class="page-section page-heroimage">
		<picture>
      <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
      <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
    </picture>
	</section>

	<section class="page-section page-content-section">
		<div class="page-content-container">
			<h3 class="subtitle"><?php the_title() ?></h3>
			<?php the_content(); ?>
		</div>
	</section>

	<?php if(get_field('guiding_principals') != ''): ?>
	<section class="page-section principles-section blue-bg">
		<div class="left-column"><h2 class="gray-txt">Actual Guiding Principles</h2></div>
		<div class="right-column">
			<?php echo get_field('guiding_principals') ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if(have_rows('leadership')): ?>
	<section class="page-section leadership-section">
		<div class="leadership-container">
			<?php while(have_rows('leadership')): the_row(); $_photo = get_sub_field('photo'); ?>
			<article class="leadership">
				<figure class="photo">
					<img src="<?php echo $_photo['url'] ?>" alt="<?php echo get_sub_field('name') . ' photo' ?>" class="img-fluid" />
				</figure>
				<div class="leadership-bio">
					<h3 class="title"><?php echo get_sub_field('title') ?></h3>
					<h2 class="name"><?php echo get_sub_field('name') ?></h2>
					<?php echo get_sub_field('bio') ?>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
