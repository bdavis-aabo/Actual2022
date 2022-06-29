<?php /* Template Name: Page - Contact */ ?>

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

<?php endwhile; endif; ?>

<?php get_footer(); ?>
