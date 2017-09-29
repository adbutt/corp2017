<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>

	<?php
		$hero = get_field('background_hero_image');
		$size = 'site-hero';
		$herolink = wp_get_attachment_image_src( $hero, $size);
		if (is_front_page() && ( !empty($herolink) ) ) { ?>
 	<div class="parallax-background dark">
 		<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $herolink[0];?>" data-position-y="0px" data-bleed="50">
 		</div>
 			<?php
 				$tagline = get_field('hero_tagline');
 				if ($tagline) { ?>
			<div class="hero-tagline">
				<?php echo $tagline;?>
			</div>
			<?php } ?>
	</div>
	<?php } ?>

<div class="wrapper">
	<div id="content" class="workpower-intro">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/entry', 'home' ); ?>
			<?php endwhile; // End of the loop. ?>
		</div>
	</div>

	<div id="latest-news">
		<div class="latest-news-wrapper">
			<div class="latest-news-header">
				<div class="left"><h3>Latest News</h3></div>
				<div class="right"><a href="/news" class="more-news-link" title="more news">More News</a></div>
			</div>
				<?php // WP_Query arguments
					$args = array (
						'post_type'             => 'post',
						'post_status'           => 'publish',
						'category_name'         =>  get_theme_mod('cat_1'), //get the news category from customizer
						'perm'					=> 'readable',
						'posts_per_page'        => '4',
						'ignore_sticky_posts'   => true,
						'no_found_rows'			=> true,
						'order'                 => 'DESC',
						'orderby'               => 'date',
					);
				$news_query = new WP_Query( $args );
				if ($news_query->have_posts()) { ?>
					<div class="latest-news-content">
							<?php while ($news_query->have_posts()) : $news_query->the_post();?>
								<?php get_template_part('partials/entry','grid-news'); ?>
							<?php endwhile; ?>
					</div>
				<?php } ?>
				<?php wp_reset_query();?>
		</div>
	</div>
 </div>

<?php get_footer(); ?>