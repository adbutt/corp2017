<section class="entry-content clearfix">
	<div class="group">
		<div class="span3 news-image">
			<?php if (has_post_thumbnail( $post->ID ) ) { ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home-content' ); ?>
				<img src="<?php echo $image[0]; ?>">
			<?php } ?>
		</div>
		<div class="span9 news-content">
			<h4><?php the_title();?></h4>
			<p><?php the_excerpt();?></p>
		</div>
	</div>
</section>