<?php theme_include('header'); ?>

	<?php if (page_slug() == 'home'): ?>
		<section class="grid 1of1 content">
			<?php echo page_content(); ?>
		</section>

	<?php else: ?>	
		<section class="grid 1of1 content">
			<h1><?php echo page_title(); ?></h1>

			<!--custom Page HTML-->	
			<?php $customPageHTML = page_custom_field('custom_page_html'); ?>
			<?php if(!empty($customPageHTML)): ?>
						<section class="grid 1of1 content remove-padding">
							<?php echo $customPageHTML; ?>
						</section>
			<?php endif; ?>
			<!--end custom HTML-->
			
			<?php echo page_content(); ?>
		</section>

	<?php endif; ?>

<?php theme_include('footer'); ?>