            </div>

            <footer id="bottom">
            	<div class="flex container">
	                <div class="grid 1of2">
	                	<small>
	                		<p>
		                		&copy; <?php echo date('Y'); ?> <?php echo site_name(); ?>. All&nbsp;rights&nbsp;reserved.
	                		</p>
	                	</small>
	                </div>
	                <div class="grid 1of2 ralign">
						<small>
							<p>
		                		Powered by <s><a href="http://liferay.com" target="_blank">Liferay DXP</a></s> <a href="http://anchorcms.com" target="_blank">Anchor CMS</a>
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
			var pause = "M10,8.5 L20,14.26 20,25.74 10,31.5 M20,14.26 L30,20 30,20 20,25.74",
				play = "M 10 10 L 18 10 L 18 30 L 10 30 M 22 10 L 30 10 L 30 30 L 22 30",
				$animation = $('#animation');
			$pronounciation = $('#pronounciation');

			var getaudio = $('#pronounciation')[0];
			/* Get the audio from the player (using the player's ID), the [0] is necessary */

			var audiostatus = 'off';
			/* Global variable for the audio's status (off or on). It's a bit crude but it works for determining the status. */

			$(document).on('click touchend', '.play-button', function() {
				/* Touchend is necessary for mobile devices, click alone won't work */
					if (audiostatus == 'off') {
						$animation.attr({
								"from": pause,
								"to": play
							})
							.get(0).beginElement();
						getaudio.load();
						getaudio.play();
						audiostatus = 'on';
						return false;
					if (audiostatus == 'on') {
						$animation.attr({
								"from": play,
								"to": pause
							})
							.get(0).beginElement();
						getaudio.play();
					}
				}
			});

			$('#pronounciation').on('ended', function() {
				$animation.attr({
						"from": play,
						"to": pause
					})
					.get(0).beginElement();
				/*When the audio has finished playing, change the button*/
				audiostatus = 'off';
				/*Set the status back to off*/
			});

			$(".convert-emoji").each(function() {
            var original = $(this).html();
            // use .shortnameToImage if only converting shortnames (for slightly better performance)
            var converted = emojione.toImage(original);
            $(this).html(converted);
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
