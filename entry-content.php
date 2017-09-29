<section class="entry-content clearfix">
<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home-content' ); ?>
					<img src="<?php echo $image[0]; ?>" class="page-feat-image">
					<?php endif; ?>
<div class="page-content"><?php the_content(); ?></div>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>