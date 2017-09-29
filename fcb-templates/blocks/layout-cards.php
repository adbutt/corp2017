<?php cfb_template('blocks/parts/block-content', get_row_layout()); ?>

<?php if( have_rows('cards') ): ?>
	<div class="block-addon cards-wrap">
		<ul class="gridder cards">
		    <?php while ( have_rows('cards') ) : the_row(); ?>

		        <?php cfb_template('blocks/parts/block-card', get_row_layout()); ?>

			<?php endwhile; ?>
		</ul>
	</div>
         <?php while ( have_rows('cards') ) : the_row(); ?>
                <?php cfb_template('blocks/parts/block-card-full', get_row_layout()); ?>
        <?php endwhile; ?>
<?php endif; ?>
