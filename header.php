<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?></title>

		<meta name="description" content="<?php echo site_description(); ?>">

		<link rel="stylesheet" href="<?php echo theme_url('/css/melody.css'); ?>">
		<link rel="stylesheet" href="<?php echo theme_url('/css/style.css'); ?>">

		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
		<link rel="shortcut icon" href="<?php echo theme_url('img/favicon.png'); ?>">

		<link href='http://fonts.googleapis.com/css?family=Alegreya:400,400i,900,900i|Work+Sans:400,900' rel='stylesheet' type='text/css'>



		<script>var base = '<?php echo theme_url(); ?>';</script>

	    <meta name="viewport" content="width=device-width">
	    <meta name="generator" content="Anchor CMS">

	    <meta property="og:title" content="<?php echo site_name(); ?>">
	    <meta property="og:type" content="website">
	    <meta property="og:url" content="<?php echo current_url(); ?>">
	    <meta property="og:image" content="<?php echo theme_url('img/og_image.gif'); ?>">
	    <meta property="og:site_name" content="<?php echo site_name(); ?>">
	    <meta property="og:description" content="<?php echo site_description(); ?>">

		<?php if(customised()): ?>
		    <!-- Custom CSS -->
    		<style><?php echo article_css(); ?></style>

    		<!--  Custom Javascript -->
    		<script><?php echo article_js(); ?></script>
		<?php endif; ?>

		<style>
			.sidebar {
				background: url("<?php echo theme_url('img/sidebar-bg2.jpg'); ?>") center no-repeat;
				background-size: cover;
				color: white;
				text-shadow: 0px 1px 5px rgba(0,0,0,0.3);
			}
				.sidebar a {
					color: white;
				}
				.sidebar a.current {
					color: #F7F2CB;
				}
		</style>
		<?php if (($img = article_custom_field('sidebar_image')) || ($img = page_custom_field('sidebar_image'))): ?>
			<style>
				.sidebar {
					background: url("<?php echo $img; ?>") center no-repeat;
					background-size: cover;
					color: white;
					text-shadow: 0px 1px 5px rgba(0,0,0,0.3);
				}
				.sidebar a {
					color: white;
				}
				.sidebar a.current {
					color: #F7F2CB;
				}
			</style>
		<?php elseif(is_article()): ?>
			<style>
				.sidebar {
					background: rgba(51,71,61,0.05);
					color: rgb(51,71,61);
					text-shadow: 0px 0px 0px transparent;
				}
				.sidebar a, .sidebar h1, .sidebar h4 {
					color: #774553;
				}
				.sidebar a.current {
					color: #C38596;
				}
			</style>
		<?php elseif (page_slug() == 'search'): ?>
			<style>
				.sidebar {
					background: url("<?php echo theme_url('img/search-bg.jpg'); ?>") center no-repeat;
					background-size: cover;
					color: white;
					text-shadow: 0px 1px 5px rgba(0,0,0,0.3);
				}
				.sidebar a:hover {
					color: #F7F2CB;
				}
			</style>
		<?php elseif (!page_title()): ?>
			<style>
				.sidebar {
					background: url("<?php echo theme_url('img/404-bg.jpg'); ?>") center no-repeat;
					background-size: cover;
					color: white;
					text-shadow: 0px 1px 5px rgba(0,0,0,0.3);
				}
				.sidebar a:hover {
					color: #F7F2CB;
				}
			</style>
		<?php else: ?>
			<style>
				.sidebar a:hover {
					color: #F7F2CB;
				}
			</style>
			<?php
				/*$i = 1;
				while(file_exists($_SERVER['DOCUMENT_ROOT'] . base_url() . 'content/sidebar-images/bg' . $i . '.jpg')) {
					$i++;
				}
			?>
			<style>
				.sidebar {
					background: url("<?php echo base_url(); ?>content/sidebar-images/bg<?php echo rand(1,($i-1)); ?>.jpg") center no-repeat;
					background-size: cover;
					color: white;
					text-shadow: 0px 1px 5px rgba(0,0,0,0.3);
				}
				.sidebar a {
					color: white;
				}
				.sidebar a.current {
					color: #F7F2CB;
				}
			</style>
		<?php */endif; ?>

		<?php
			$latestPostURL = base_url() . Registry::get('posts_page')->slug . '/' . latest_post()->data['slug'];
			$latestPostLink = '<a
				href="' . $latestPostURL . '"
				class="latest-post ' . ($latestPostURL == $_SERVER['REQUEST_URI'] ? 'current' : '') . '"
				title="' . latest_post()->data['title'] . '"
				>Latest Post</a>';
		?>
	</head>

	<body>

		<div class="sidebar">
			<nav class="grid 1of1 sidebar-nav">
				<a href="#menu" class="menu">Menu</a>
			</nav>

			<div class="container">
				<div class="grid 1of1 sidebar-content force-grid">
					<?php if(article_title()): ?>
						<h1><?php echo article_title(); ?></h1>
						<h5 class="grid 3of4 stick-to-grid remove-padding">
							<?php echo article_author('real_name'); ?><br />
							<?php echo article_date(); ?>
						</h5>
						<p class="grid 1of4 stick-to-grid remove-padding ralign article-links">
							<a<?php echo (article_previous_url() ? ' href="' . article_previous_url() . '"' : ''); ?>>&larr;</a>
							<a<?php echo (article_next_url() ? ' href="' . article_next_url() . '"' : ''); ?>>&rarr;</a>
						</p>
					<?php else: ?>
						<h1><?php echo site_name(); ?></h1>
						<p><?php echo site_description(); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="main">

			<div class="slidey">
				<div class="container">
					<nav class="grid 5of6 top-nav">
					    <?php echo $latestPostLink; ?>

						<?php if(has_menu_items()): ?>
							<?php while(menu_items()): ?>
								<a href="<?php echo menu_url(); ?>" class="<?php echo (menu_active() ? 'current' : '') ?>" title="<?php echo menu_title(); ?>"><?php echo menu_name(); ?></a>
							<?php endwhile; ?>
						<?php endif; ?>
					</nav>

					<div class="grid 1of6 ralign">
						<a href="#menu" class="menu">Menu</a>
					</div>

				</div>
			</div>
			<!--<div class="tray">
				<div class="container">
					<div class="grid 1of2 search"></div>

					<div class="grid 1of2 categories"></div>
				</div>
			</div>-->

			<header id="top">
				<div class="container">
					<nav class="grid 1of1 top-nav">
						<a href="#menu" class="menu">Menu</a>
					</nav>
				</div>
			</header>

			<div class="container">
