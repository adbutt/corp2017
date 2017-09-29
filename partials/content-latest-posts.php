<?php
		$args = array (
		'post_type'             => 'post',
		'post_status'           => 'publish',
		'category_name' 		=>  get_theme_mod('cat_1'), //get the news category from customizer
		'perm'					=> 'readable',
		'posts_per_page'        => '5',
		'ignore_sticky_posts'   => true,
		'order'                 => 'DESC',
		'orderby'               => 'date',
		);

		$news_query = new WP_Query( $args );

		if ($news_query->have_posts()) { ?>
		<aside id="wp-latest-news" class="widget news-sidebar">
			<h3 class="blog-side">Recent News...</h3>
				<ul>
					<?php while ($news_query->have_posts()) : $news_query->the_post();?>
					<li><a href="<?php the_permalink();?>"><?php the_title() ?></a></li>
					<?php endwhile; } ?>
				</ul>
			<div class="view-news"><a href="/news" title="More in News" class="more-link">More in News</a></div>
		</aside>
		<?php wp_reset_query();?>
