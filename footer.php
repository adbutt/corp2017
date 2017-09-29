<footer class="site-footer" id="footer">
		<div class="footer-wrapper">
			<div class="footer-connect-wrapper">
					<div class="footer-logo">
						<a href="<?php bloginfo('url');?>" class="logo-footer"><div class="logo-contain"><?php bloginfo('description'); ?></div></a>
					</div>
					<div class="footer-newsletter">
						<div class="social-connect news-up">
							<div class="newl-copy">Get the latest news and updates from Workpower.</div>
							<?php if( get_theme_mod( 'wpc_social_mailchimp') != "" ){ ?>
							<a href="<?php echo get_theme_mod( 'wpc_social_mailchimp');?>" class="video fancybox.iframe sign-up-button"><em class="fa fa-envelope-o"></em> Sign Up</a>
							<?php } ?>
						</div>
					</div>
					<div class="footer-connect">
						<div class="social-connect">connect with us<br/>
							<?php if( get_theme_mod( 'wpc_social_facebook') != "" ){ ?>
							<a href="<?php echo get_theme_mod( 'wpc_social_facebook');?>" target="_blank" class="soc-facebook"><em class="fa fa-facebook-f"></em></a>
						<?php } ?>
						<?php if( get_theme_mod( 'wpc_social_linkedin') != "" ){ ?>
							<a href="<?php echo get_theme_mod( 'wpc_social_linkedin');?>" target="_blank" class="soc-linkedin"><em class="fa fa-linkedin"></em></a>
						<?php } ?>
						<?php if( get_theme_mod( 'wpc_social_youtube') != "" ){ ?>
							<a href="<?php echo get_theme_mod( 'wpc_social_youtube');?>" target="_blank" class="soc-youtube"><em class="fa fa-youtube"></em></a>
						<?php } ?>
						<?php if( get_theme_mod( 'wpc_social_google') != "" ){ ?>
							<a href="<?php echo get_theme_mod( 'wpc_social_google');?>" target="_blank" class="soc-google"><em class="fa fa-google-plus"></em></a>
						<?php } ?>
						<?php if( get_theme_mod( 'wpc_social_twitter') != "" ){ ?>
							<a href="<?php echo get_theme_mod( 'wpc_social_twitter');?>" target="_blank" class="soc-twitter"><em class="fa fa-twitter"></em></a>
						<?php } ?>
						</div>
					</div>
			</div>
			<div class="footer-links">
					<div class="fw-wrapper">
						 <!-- Footer widget area 1 -->
			              <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 1') ) : else : ?>
			              	  <div class="widget">
							  	<h4 class="widgettitle">Widget Area 1</h4>
							  	<p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
							  </div>
					     <?php endif; ?>

					</div>
					<div class="fw-wrapper">
						 <!-- Footer widget area 1 -->
			              <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 2') ) : else : ?>
			              	  <div class="widget">
							  	<h4 class="widgettitle">Widget Area 2</h4>
							  	<p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
							  </div>
					     <?php endif; ?>

					</div><!--/span_3-->
					<div class="fw-wrapper">
						 <!-- Footer widget area 1 -->
			              <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 3') ) : else : ?>
			              	  <div class="widget">
							  	<h4 class="widgettitle">Widget Area 3</h4>
							  	<p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
							  </div>
					     <?php endif; ?>

					</div><!--/span_3-->

			</div> <!--/end footer links-->
			<div class="footer-copy">&copy; <?php echo date('Y') . ' ' . get_bloginfo('name'); ?></div>
		</div><!--/end footer wrapper-->
	</footer>
	<a id="scroll-top" class="s-top" href="#page-top">Top</a>
<?php wp_footer(); ?>
</body>
</html>