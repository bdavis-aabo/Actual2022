
	<footer class="footer dkgreen-bg">
		<section class="footer-top">
			<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/actual-white_logo.svg') ?>
		</section>
		<section class="footer-bottom">
			<p class="small">&copy; <?php echo date('Y') ?>&nbsp;&zwnj;&nbsp;<?php bloginfo('name') ?></p>
		</section>
	</footer>

	<?php wp_footer() ?>
</body>
</html>
