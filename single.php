<?php get_header(); ?>
<div class="wrapper">
	<div id="content" role="main" class="inner-page">
		<div class="container">
			<div class="page-content-wrapper">
		<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>
				<div class="post-content">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<div class="date">
							<div class="date-holder">
								<span class="date-day"><?php the_time('d');?></span>
								<span class="date-month"><?php the_time('M');?></span>
							</div>
						</div>
							<div class="entry-wrapper">
							<?php if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'site-530' ); ?>
								<div class="entry-thumb">
									<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>" class="int-page-image">
								</div>
							<?php endif; ?>
								<header><h1 class="h3 post-title"><?php the_title(); ?></h1></header>
									<section class="entry-content">
									<?php the_content(); ?>
										<div class="entry-links"><?php wp_link_pages(); ?></div>
										<div class="social-sharing">
											<?php do_action( 'custom_social_share' ); ?>
										</div>
									</section>
							</div>

					</article>

					<div class="post-pagination">
						<?php next_and_previous_post_navigation()?>
					</div>
					<?php endwhile; ?>
				</div>
					<div class="post-sidebar">
						<?php get_template_part( 'partials/content', 'latest-posts' ); ?>
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
					<?php endif;?>

		</div>
	</div>
</div>
<?php get_footer(); ?>