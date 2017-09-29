<?php
/*
Template Name: Our Business
*/
?>
<?php get_header(); ?>
<div class="wrapper">
	<div id="content" class="business-page">
		<div class="container">
			<div class="bus-intro-wrapper">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'partials/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
			</div>
		</div>
	</div>
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
	$count = 0;
	if ($business_query->have_posts()) { ?>
	<div id="intro-our-business">
		<div class="grid-display-wrapper">
			<div class="gridder-content-wrapper">
		<ul class="gridder">
		<?php while ($business_query->have_posts()) : $business_query->the_post();
		$count++;
		?>
			<li class="gridder-list" data-griddercontent="#gridder-content-<?php echo $count;?>">
				<?php if (has_post_thumbnail( $post->ID ) ) { ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'site-thumbs' ); ?>
		<div class="gridder-image"><img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>"></div>
		<?php } else { ?>
				<div class="gridder-image"><img src="http://placehold.it/300x225&text=Item <?php echo $count;?>" class="img-responsive" /></div>
			<?php } ?>
				<div class="gridder-title"><?php the_title();?><span class="grid-more">more info</span></div>
			</li>
		<?php endwhile; ?>
		</ul>
		</div>
		<?php rewind_posts(); ?>
		<?php $count = 0;?>
		<?php while ($business_query->have_posts() ) : $business_query->the_post();
		$count++;
		$strapline = get_field('bus_strapline');
		$busconttel = get_field('bus_contact_no');
		$buscontnam = get_field('bus_manager');
		$buscontweb = get_field('bus_web_address');
        $buscontent = get_the_content();
		?>
			<div id="gridder-content-<?php echo $count;?>" class="gridder-content">
	                <div class="gridder-intro">
	                	<h3><?php the_title();?></h3>
	                	<?php if ($strapline) {?>
	                    <h4><?php echo $strapline; ?></h4>
	                    <?php } ?>
	                    <?php the_content();?>
	                </div>
	                <div class="gridder-details">
	                	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'site-450' ); ?>
	                	<div class="bus-main-image">
	                    	<img src="<?php bloginfo('template_directory');?>/assets/images/preload.gif" alt="<?php the_title();?>" data-lazy-src="<?php echo $image[0]; ?>">
	                    </div>
	                    <div class="bus-contact-details">
	                    	<h4>Contact Details:</h4>
	                    		<div class="bus-details">
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
	                    		<div class="bus-website">
	                    			<?php if ($buscontweb) { ?>
	                    				<a href="<?php echo $buscontweb; ?>" title="visit <?php the_title();?> website" class="bus-web-link" target="_blank">Visit Website</a>
	                    			<?php } ?>
	                    		</div>
	                    </div>

	                </div>
			</div>
		<?php endwhile; ?>
		</div>
	</div>
	<?php } ?>
	<?php wp_reset_query();?>


</div>

<?php get_footer(); ?>
