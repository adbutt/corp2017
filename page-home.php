<?php get_header(); ?>
<div class="wrapper">
	<div class="adam"></div>
		<div class="bgie">&nbsp;</div>
		<div class="container">
			<div class="int-backgrounds">
        		<div class="int-columnmenu"></div>
       			<div class="int-columnlft"></div>
        		<div class="int-columnrgt"></div>    	
    		</div>
        		<div class="int-columnmenu"><?php wp_nav_menu( array( 'theme_location' => 'side-menu' ) ); ?></div>
    				<div class="int-columnlft">
    					<div class="tagline-intro">
							<div id="slidecaption"></div>
						</div>
					</div>    
    			<div class="clearfix"></div>
 		</div>
					<div class="content-container">
 						<section id="socials" class="section">	
							<div class="grad-top">
								<div class="container clearfix">
									<div class="group">
										<div class="span4 rline">
											<?php $latestposts;
											if (empty($data['lnews_category'])) {
											echo "please select a category to display posts"; } else {
											$latestposts = ($data['lnews_category']);
											$my_query = new WP_Query('category_name='.$latestposts.'&showposts=1&orderby=date&order=DESC');
											if ($my_query->have_posts()) { ?>
											<div class="feature-box clearfix">
											<?php while ($my_query->have_posts()) : $my_query->the_post();?>
												<div class="clearfix">
												<div class="latest-date"><em class="icon-calendar"></em>  <?php the_date();?></div>
												</div>
												<div class="latest-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
												<div class="latest-news"><?php the_excerpt();?></div>
											<?php endwhile;?>
											</div>
											<?php } } wp_reset_query();?>
										</div>
											<div class="span4 rline">
												<div class="feature-box clearfix">
													<div class="latest-title"><?php echo ($data['news_title_id']);?></div>
														<div class="latest-news"><?php echo ($data['news_blurb']);?></div>
														<?php if (!empty($data['news_form_id'])) { 
                              							$formid=$data['news_form_id'];
      													echo do_shortcode('[gravityform id='.$formid.' title=false description=false ajax=true]');}?>
												</div>
											</div>
											<div class="span4">
												<div class="intro-box">
													<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
													<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
														<section class="entry-content">
														<div class="latest-news"><?php the_content(); ?></div>
														</section>
													</article>
													<?php endwhile; endif; ?>	
												</div>
											</div>
									</div>
								</div>
							</div>
						</section>
							<?php $toplevelposts;
							if (empty($data['section_category'])) {
							echo "please select a category to display posts"; } else {
							$toplevelposts = ($data['section_category']);
							$my_query = new WP_Query('category_name='.$toplevelposts.'&showposts=-1&orderby=menu_order&order=ASC');
							if ($my_query->have_posts())
							while ($my_query->have_posts()) : $my_query->the_post();?>	
							<section <?php if (rwmb_meta('workypsect-id')) { echo 'id="'.rwmb_meta('workypsect-id').'"';};?> class="grad-top section">
								<div class="container clearfix">
									<?php if (has_post_thumbnail( $post->ID ) ): ?>
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home-content' ); ?>
									<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>" class="page-feat-image">
									<?php endif; ?>
									<?php if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post', 'secondary-image')) { 
									 	$image1 = 0;
									 	$image1 = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image');?>
										<img src="<?php echo $image1;?>" alt="<?php the_title();?>" class="page-feat-image1"><?php } ?>
										<div class="page-content">
										<h3 class="page-title"><?php the_title();?></h3>
										<?php the_content();?>
										</div>
								</div>
							</section>
							<?php endwhile; } ?>
							<?php wp_reset_query();?>

								<?php $execcat;
								if (empty($data['exec_category'])) {
								echo "please select the category to display posts"; } else {
								$execcat = ($data['exec_category']);$my_query = new WP_Query('post_type=team&team_member_team_categories='.$execcat.'&showposts=-1&orderby=menu_order&order=ASC');
								if ($my_query->have_posts())?>
								<section id="ourpeople" class="grad-top section">
									<div class="container clearfix">
										<h3 class="page-title">Our People</h3>
										<?php while ($my_query->have_posts()) : $my_query->the_post();?>			
										<div class="bio clearfix">
											<?php if (has_post_thumbnail( $post->ID ) ): ?>
											<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'profile-image' ); ?>
											<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>" class="page-bio-image">
											<?php endif; ?>
											<div class="bio-text">
												<div class="person-title"><?php the_title();?> <?php echo "- ".rwmb_meta('workyptrole');?></div>
												<?php the_content();?>
											</div>
										</div>
										<?php endwhile; ?>
									</div>
								</section>
								<?php };?>
								<?php wp_reset_query();?>
									<?php $boardcat;
									if (empty($data['board_category'])) {
									echo "please select the category to display posts"; } else {
									$boardcat = ($data['board_category']);$my_query = new WP_Query('post_type=team&team_member_team_categories='.$boardcat.'&showposts=-1&orderby=menu_order&order=ASC');
									if ($my_query->have_posts())?>
									<section id="ourboard" class="grad-top section">
										<div class="container clearfix">
											<h3 class="page-title">Our Board</h3>
											<?php while ($my_query->have_posts()) : $my_query->the_post();?>			
											<div class="bio clearfix">
												<?php if (has_post_thumbnail( $post->ID ) ): ?>
												<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'profile-image' ); ?>
												<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>" class="page-bio-image">
												<?php endif; ?>
												<div class="bio-text">
													<div class="person-title"><?php the_title();?> <?php echo "- ".rwmb_meta('workyptrole');?></div>
													<?php the_content();?>
												</div>
											</div>
											<?php endwhile; ?>
										</div>
									</section>
									<?php };?>
									<?php wp_reset_query();?>
										<section id="mobile-contact" class="grad-top section">
											<div class="container clearfix">
												<div class="page-content">
												<h3 class="page-title">Contact Us</h3>
												<?php if (!empty($data['company_contact'])) {echo '<h4>'.$data['company_contact'].'</h4>'; }?>
												<?php if (!empty($data['contact_number'])) {echo '<h4>'.$data['contact_number'].'</h4>'; }?>
												<?php if (!empty($data['contact_address'])) {echo '<p>'.$data['contact_address'].'</p><br/>'; }?>
												<?php if (!empty($data['contact_map'])) { ?>
												<a href="<?php echo $data['contact_map'];?>" target="_blank">Find us on Google Maps</a>
												<?php } ?>
												</div>
											</div>
										</section>
										<section id="website-attrib" class="section">
	<div class="footer-wrapper">
<div class="web-attrib"><span>website by:</span><a href="http://workpowerperthwebdesign.com.au/" target="_blank"><img class="image-attrib" src="<?php echo bloginfo('template_directory');?>/css/assets/workpowerperthwebsites.png" alt="website by workpower perth"></a></div>
	</div>
</section>
					</div>
</div>
<?php get_footer(); ?>