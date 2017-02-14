<?php theme_include('header'); ?>

<section class="grid 1of1 content">

	<?php if(has_posts()): ?>
		<ul class="items instaxes">
			<?php posts(); ?>
			<li>
				<article class="latest-article-preview">
					<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>">	
						<?php if ($img = article_custom_field('sidebar_image')): ?>
							<div class="article instax" >
								<img src="..<?php echo $img; ?>" />
								<h1>
									<?php echo article_title(); ?>
								</h1>
								<footer>
									<small>
										Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time>.
									</small>
								</footer>
							</div>
						<?php elseif (is_article()): ?>
							<div class="article" >
								<h1>
									<?php echo article_title(); ?>
								</h1>

								<p class="content">
									<?php echo strip_tags(substr(article_markdown(), 0, 160)); ?> <sup><a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>" class="readmore">&hellip;</a></sup>
								</p>

								<footer>
									<small>
										Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time>.
									</small>
								</footer>
							</div>
						<?php endif; ?>
					</a>
				</article>
			</li>

			<hr />

			<?php $i = 0; while(posts()): ?>
			<li class="grid 1of2 grid-fit">
				<article class="article-preview">
					<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>">
						<?php if ($img = article_custom_field('sidebar_image')): ?>
							<div class="article instax">
								<img src="..<?php echo $img; ?>" />
								<h3 class="remove-bottom">
									<?php echo article_title(); ?>
								</h3>

								<footer>
									<small>
										Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time> by <?php echo article_author('real_name'); ?>.
									</small>
								</footer>
							</div>
						<?php elseif (is_article()): ?>
							<div class="article instax">
								<img src="" />
								<h3 class="remove-bottom">
									<?php echo article_title(); ?>
								</h3>

								<footer>
									<small>
										Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time> by <?php echo article_author('real_name'); ?>.
									</small>
								</footer>
							</div>
						<?php endif; ?>	
					</a>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>

		<?php if(has_pagination()): ?>
		<nav class="pagination">
			<div class="wrap">
				<?php echo posts_prev(); ?>
				<?php echo posts_next(); ?>
			</div>
		</nav>
		<?php endif; ?>

	<?php else: ?>
		<p>Looks like you have some writing to do!</p>
	<?php endif; ?>

</section>

<?php theme_include('footer'); ?>