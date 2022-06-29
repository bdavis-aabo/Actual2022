<?php /* Template Name: Page - Capabilities */ ?>

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

		<?php if(have_rows('capabilities')):  while(have_rows('capabilities')): the_row();
			$_image = get_sub_field('image');
			$_color;
			if(get_sub_field('title') == 'Planning and Design'):
				$_color = 'blue-bg';
			elseif (get_sub_field('title') == 'Sustainable'):
				$_color = 'ltgreen-bg';
			else:
				$_color = 'white-bg';
			endif;
		?>
		<section class="page-section capability-section <?php echo $_color; ?>">
			<div class="capability-container">
				<div class="cap-left">
					<figure>
						<img src="<?php echo $_image['url'] ?>" alt="<?php echo get_sub_field('title') ?>" class="img-fluid" />
					</figure>
					<h3><?php echo get_sub_field('title') ?></h3>
				</div>
				<div class="cap-right">
					<?php echo get_sub_field('content') ?>
				</div>
			</div>
		</section>
		<?php endwhile; endif; ?>

	<?php endwhile; endif; // end loop ?>

<?php get_footer(); ?>
