		<div class="news-article">
			<article class="news-snippet" role="article">
				<div class="article-image">
					<?php if (has_post_thumbnail( $post->ID ) ) { ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'site-thumbs' ); ?>
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>">
					<?php } ?>
				</div>
				<div class="article-content">
					<div class="article-content-inner">
					<h4><?php the_title_shorten(50,'...'); ?></h4>
					</div>
					<a href="<?php the_permalink();?>" class="article-link-more">read more</a>
				</div>
				<a href="<?php the_permalink();?>" class="article-link">read more</a>
			</article>
		</div>