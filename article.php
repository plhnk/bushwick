<?php theme_include('header'); ?>

		<section class="grid 1of1 content" id="article-<?php echo article_id(); ?>">

			<?php if (article_description()): ?>
			<aside class="tldr">
				<h3>
					<?php echo article_description(); ?>
				</h3>
			</aside>
			<?php endif ?>

			<article>
				<?php echo article_markdown(); ?>
			</article>

		</section>

		<?php if(comments_open()): ?>
		<section class=" grid 1of1 content comments">

			<?php if(has_comments()): ?>
			<h3>Comments</h3>
			<ul class="commentlist">
				<?php $i = 0; while(comments()): $i++; ?>
				<li class="comment" id="comment-<?php echo comment_id(); ?>">
					<div class="wrap">
						<h6 class="remove-bottom"><?php echo comment_name(); ?></h6>
						<small class="ralign" style="float: right;"><time><?php echo relative_time(comment_time()); ?></time><br /><?php echo $i; ?></small>

						<div class="content">
							<?php echo comment_text(); ?>
						</div>

						<small class="counter"></small>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>

			<div class="grid 1of1"></div>

			<h3>Leave a Comment</h3>
			<form id="comment" class="commentform wrap" method="post" action="<?php echo comment_form_url(); ?>#comment">
				<?php echo comment_form_notifications(); ?>

				<p class="name">
					<label for="name">Your name:</label>
					<?php echo comment_form_input_name('placeholder="Your name"'); ?>
				</p>

				<p class="email">
					<label for="email">Your email address:</label>
					<?php echo comment_form_input_email('placeholder="Your email won’t be published"'); ?>
				</p>

				<p class="textarea">
					<label for="text">Your comment:</label>
					<?php echo comment_form_input_text('placeholder="If you can&#8217;t say something nice..."'); ?>
				</p>

				<p class="submit">
					<?php echo comment_form_button(); ?>
				</p>
			</form>

		</section>
		<?php endif; ?>

<?php theme_include('footer'); ?>