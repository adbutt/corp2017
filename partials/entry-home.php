<div class="home-content-wrapper">
	<div class="home-content">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h2 class="no-show"><?php bloginfo('description');?></h2>
				</header>
				<div class="entry-content">
					<?php the_content();?>
				</div>
				<footer class="entry-footer">
				<?php edit_post_link( esc_html__( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-footer -->
			</article>
		</main>
	</div>
	<div class="promotion-wrapper">
		<?php
		$image1 = get_field('promotion_1_image');
		$size = 'site-300';
		$url1 = get_field('promotion_1_link');
		$videolink1 = get_field('video_link1');
		$promocopy1 = get_field('promotion_1_copy');
		if( $image1 ) { ?>
			<div class="promo-area">
				<div class="promo-image"><?php echo wp_get_attachment_image( $image1, $size );?></div>

				<?php if ($promocopy1) { ?>
				<div class="promo-copy">
					<?php the_field('promotion_1_copy'); ?>
				</div>
				<?php } ?>
				<?php if ( $url1) {
					if ($videolink1) {
					?>
					<a href="<?php echo $url1;?>" title="<?php the_field('promotion_1_copy'); ?>" class="video fancybox.iframe promo-link">Read More</a>
					<?php } else { ?>
					<a href="<?php echo $url1;?>" title="<?php the_field('promotion_1_copy'); ?>" class="promo-link">Read More</a>
					<?php } ?>
				<?php } ?>
			</div>
		<?php } else { ?>
		<img src="http://placehold.it/300x300" class="img-responsive" />
		<?php } ?>

		<?php
		$image2 = get_field('promotion_2_image');
		$size = 'site-300';
		$url2 = get_field('promotion_2_link');
		$videolink2 = get_field('video_link2');
		$promocopy2 = get_field('promotion_2_copy');

		if( $image2 ) { ?>
			<div class="promo-area">
				<div class="promo-image"><?php echo wp_get_attachment_image( $image2, $size );?></div>
				<?php if ($promocopy2) { ?>
				<div class="promo-copy">
					<?php the_field('promotion_2_copy'); ?>
				</div>
				<?php } ?>
				<?php if ( $url2) {
					if ($videolink2) {
					?>
					<a href="<?php echo $url2;?>" title="<?php the_field('promotion_2_copy'); ?>" class="video fancybox.iframe promo-link">Read More</a>
					<?php } else { ?>
					<a href="<?php echo $url2;?>" title="<?php the_field('promotion_2_copy'); ?>" class="promo-link">Read More</a>
					<?php } ?>
				<?php } ?>
			</div>
		<?php } else { ?>
		<img src="http://placehold.it/300x300" class="img-responsive" />
		<?php } ?>
	</div>
</div>