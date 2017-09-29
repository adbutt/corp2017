<?php get_header(); ?>
<div class="wrapper">
	<div id="content" class="inner-page">
		<div class="container">
			<div class="page-content-wrapper">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
				<div class="page-content">
					<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'partials/content', 'page' ); ?>

					<?php endwhile; // End of the loop. ?>

					</main><!-- #main -->
				</div>
				<div class="page-sidebar">
				<?php if ( function_exists('wpb_list_child_pages') ) {
	  			echo wpb_list_child_pages();
	  			}
	  			?>
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>