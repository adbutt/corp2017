<?php $teamcat = get_field('team_category');
	if (!empty($teamcat)) {
		$args = array (
		'post_type'             => 'team',
		'post_status'           => 'publish',
		'team_member_team_categories' 	=> $teamcat->slug,
		'perm'					=> 'readable',
		'ignore_sticky_posts'   => true,
		'order'                 => 'ASC',
		'orderby'               => 'menu_order',
		);
		$team_query = new WP_Query( $args );}
		if ($team_query->have_posts()) { ?>

			<div id="ourpeople" class="our-people">
					<?php while ($team_query->have_posts()) : $team_query->the_post();?>
					<div class="bio">
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'profile-image' ); ?>
						<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>" class="page-bio-image">
						<?php endif; ?>
						<div class="bio-text">
							<div class="person-title"><?php echo the_title();?> <?php echo "- ".get_field('team_member_details');?></div>
							<?php the_content();?>
						</div>
					</div>
					<?php endwhile; ?>
			</div>
		<?php };?>
<?php wp_reset_query();?>