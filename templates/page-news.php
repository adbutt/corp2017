<?php
/*
Template Name: News Listing
*/
?>
<?php get_header(); ?>
<div class="wrapper">
	<div id="content" class="inner-page">
		<div class="container">
			<div class="page-content-wrapper">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
				<header class="entry-header">
					<h1 class="h2 entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				<?php
				$paged = ($paged) ? $paged : get_query_var('page');
				if ($paged < 1) {
					$paged = 1;
				}?>
					<?php // WP_Query arguments
						$args = array (
							'post_type'             => 'post',
							'post_status'           => 'publish',
							'category_name'         => get_theme_mod('cat_1'), //get the news category from customizer
							'perm'					=> 'readable',
							'posts_per_page'        => '12',
							'ignore_sticky_posts'   => true,
							'order'                 => 'DESC',
							'orderby'               => 'date',
							'paged'					=> $paged
						);
					$news_query = new WP_Query( $args );
					if ($news_query->have_posts()) { ?>
					<main id="main" class="site-news" role="main">
							<div class="latest-news-content">
								<?php while ($news_query->have_posts()) : $news_query->the_post();?>
									<?php get_template_part('partials/entry','grid-news'); ?>
								<?php endwhile; ?>
							</div>
					</main>
						 <?php get_pagination($news_query);?>
					<?php } ?>
					<?php wp_reset_query();?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>