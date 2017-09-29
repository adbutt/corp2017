<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<div class="wrapper">
	<div id="content" class="contact-page">
		<div class="container">
			<div class="page-content-wrapper">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
					<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'partials/content', 'contact-page' ); ?>

					<?php endwhile; // End of the loop. ?>

					</main><!-- #main -->
					<?php
						$args = array (
							'post_type'             => 'business_units',
							'post_status'           => 'publish',
							'perm'					=> 'readable',
							'posts_per_page'        => '20',
							'ignore_sticky_posts'   => true,
							'no_found_rows'			=> true,
							'order'                 => 'menu_order',
							'orderby'               => 'ASC',
						);
					$business_query = new WP_Query( $args );
					if ($business_query->have_posts()) { ?>
						<aside id="wp-service-contacts" class="contact-sidebar">
							<h3>Service Contacts</h3>
								<div class="serv-contacts">
								<?php while ($business_query->have_posts() ) : $business_query->the_post();
								$busconttel = get_field('bus_contact_no');
								$buscontnam = get_field('bus_manager');
								$buscontweb = get_field('bus_web_address');
								?>
								<div class="serv-contact-content">
			                    	<h4 class="h5">
			                    	<?php if ($buscontweb) { ?>
			                    		<a href="<?php the_field('bus_web_address'); ?>" title="visit <?php the_title();?> website" target="_blank"><?php the_title();?></a>
									<?php } else { ?>
										<?php the_title();?>
									<?php } ?>
			                    	</h4>
			                        <div class="bus-contact-details">
			                        	<div class="bus-contact-no">
										<?php if ($busconttel) { ?>
			                        	<?php echo $busconttel; ?>
										<?php } ?>
			                        	</div>
	                        			<div class="bus-contact-name">
										<?php if ($buscontnam) { ?>
			                        		<?php echo $buscontnam; ?>
										<?php } ?>
	                        			</div>
			                        </div>
		            			</div>
						<?php endwhile; ?>
							</div>
						</aside>
					<?php } ?>
					<?php wp_reset_query();?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>