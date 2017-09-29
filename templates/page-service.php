<?php
/*
Template Name: New Service Page
*/
?>
<?php get_header(); ?>

	<?php
		$hero = get_field('background_hero_image');
		$size = 'site-hero';
		$herolink = wp_get_attachment_image_src( $hero, $size);
		if ( !empty($herolink) )  { ?>
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

<div class="service-wrapper">
	<div id="content">
            <div class="page-content-wrapper">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content();?>
			<?php endwhile; // End of the loop. ?>
            </div>
	</div>

 </div>

<?php get_footer(); ?>
