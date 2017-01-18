<?php theme_include('header'); ?>

	<?php if (page_slug() == 'home'): ?>
		<section class="grid 1of1 content">
			<?php echo page_content(); ?>
		</section>

	<?php else: ?>	
		<section class="grid 1of1 content">
			<h1><?php echo page_title(); ?></h1>

			<?php echo page_content(); ?>
		</section>

	<?php endif; ?>

<?php theme_include('footer'); ?>