<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrapper">
			<div class="contact-details-wrapper">
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'site-530' ); ?>
			<div class="entry-thumb">
				<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>" class="int-page-image">
			</div>
			<?php endif; ?>
				<div class="contact-details">
					<div class="contact-address">
						<div itemscope itemtype="http://schema.org/Corporation">
							<a itemprop="url" href="<?php bloginfo('url');?>"><div itemprop="name"><strong><?php bloginfo('title');?></strong></div>
							</a>
							<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							<?php if( get_theme_mod( 'wpc_street_address') != "" ){ ?>
								<span class="streetAddress" itemprop="streetAddress"><?php echo get_theme_mod( 'wpc_street_address'); ?></span>,
							<?php } ?>
							<?php if( get_theme_mod( 'wpc_locality') != "" ){ ?>
								<span class="addressLocality" itemprop="addressLocality"><?php echo get_theme_mod( 'wpc_locality'); ?></span><br>
							<?php } ?>
							<?php if( get_theme_mod( 'wpc_region') != "" ){ ?>
								<span class="addressRegion" itemprop="addressRegion"><?php echo get_theme_mod( 'wpc_region'); ?>. </span>
							<?php } ?>
							<?php if( get_theme_mod( 'wpc_post_code') != "" ){ ?>
								<span class="postalCode" itemprop="postalCode"><?php echo get_theme_mod( 'wpc_post_code'); ?></span><br>
							<?php } ?>
							<?php if( get_theme_mod( 'wpc_country') != "" ){ ?>
								<span class="addressCountry" itemprop="addressCountry"><?php echo get_theme_mod( 'wpc_country'); ?></span><br>
							<?php } ?>
							</div>
						</div>
					</div>
					<div class="contact-quick">
					<?php if( get_theme_mod( 'wpc_contact_tel') != "" ){ ?>
					<div class="tel-contact">Tel: <span><?php echo get_theme_mod( 'wpc_contact_tel'); ?></span><br/></div><?php } ?>
					<?php if( get_theme_mod( 'wpc_contact_email') != "" ){ ?>
					<div class="email-contact">Email: <a href="mailto:<?php echo get_theme_mod( 'wpc_contact_email'); ?>"><span><?php echo get_theme_mod( 'wpc_contact_email'); ?></span></a></div>
					<?php } ?>
					</div>

				</div>
			</div>

			<div class="contact-content">
				<header class="entry-header">
					<?php the_title( '<h1 class="h2 entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
				<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div>

		<footer class="entry-footer">
			<?php edit_post_link( esc_html__( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->