	<div class="slide-wrapper">
		<a href="<?php the_permalink();?>">
		<div class="slide-image">
			<?php if (has_post_thumbnail( $post->ID ) ) { ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home-content' ); ?>
				<img src="<?php echo $image[0]; ?>">
			<?php } ?>
		</div>
		<div class="slide-content">
			<h4><?php the_title();?></h4>
		</div>
		</a>
	</div>
