            </div>

            <footer id="bottom">
            	<div class="flex container">
	                <div class="grid 2of3">
	                	<small>
	                		<p>
		                		&copy; <?php echo date('Y'); ?> <?php echo site_name(); ?>. All rights reserved.
	                		</p>
	                	</small>
	                </div>
	                <div class="grid 1of3 ralign">
						<small>
							<p>
		                		Powered by <a href="http://anchorcms.com" target="_blank">Anchor CMS</a>
	                		</p>
			            </small>
	        		</div>
	        	</div>
            </footer>
        </div>

	    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	    <script>
	    	jQuery(document).ready(function($) {
	    		if($('nav .latest-post').hasClass('current')) {
	    			$('nav .latest-post').siblings('a').removeClass('current');
	    		}

	    		$('a[href="#menu"]').click(function() {
	    			$('a[href="#menu"]').toggleClass('current');
	    			$('.slidey').slideToggle(300);
	    		});

	    		$('section.content ol').not('.items').children('li').wrapInner('<p>');

				$('section.content img').each(function(){
					var act = $(this);
					var src = act.attr('src');
					var caption = act.attr('alt');
					var figureClass = act.attr('title');

					if (!figureClass) {
						figureClass = ' ';
					}

					act.wrap('<figure class="image-wrapper ' + figureClass + '" />');

					if (caption) {
						act.after('<figcaption>' + caption + '</figcaption>');
						act.attr('alt', 'Image');
					} else {
						act.removeAttr('alt');
					}

					if (figureClass) {
						act.removeAttr('title');
					}

					if (!src.substring(0,4).match('http') && !src.substring(0,5).match('https') && !src.substring(0,2).match('//')) {
						act.attr('src', '<?php echo base_url(); ?>content/' + src);
					}
				});
	    	});
	    </script>

		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script>
				jQuery(document).ready(function($) {
					$('body').addClass('ie');
				});
			</script>
		<![endif]-->
    </body>
</html>
