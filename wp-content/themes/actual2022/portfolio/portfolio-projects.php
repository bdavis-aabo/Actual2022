<?php
$_projects = new WP_Query();
$_args = array(
  'post_type' 			=> 'projects',
  'post_status' 		=> 'publish',
  'posts_per_page' 	=> -1,
  'order' 					=> 'DESC',
  'orderby' 				=> 'date'
);
$_projects->query($_args);
?>

<?php if($_projects->have_posts()): ?>
	<section class="page-section project-section">
		<div class="project-container">
			<?php while($_projects->have_posts()): $_projects->the_post(); $_thumbnail = get_field('project_thumbnail'); ?>
			<article class="project">
				<figure>
					<img src="<?php echo $_thumbnail['url'] ?>" class="project-thumbnail img-fluid" />
				</figure>
				<div class="project-intro">
					<h2 class="project-name"><?php the_title(); ?></h2>
					<p class="project-location"><?php echo get_field('project_type') ?></p>

					<?php echo get_field('project_description') ?>

					<a href="<?php the_permalink() ?>" class="btn blue-btn text-btn">
						<i class="fas fa-chevron-right"></i> learn more
					</a>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</section>
<?php endif; wp_reset_query(); ?>
