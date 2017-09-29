<?php

    $image 			= get_sub_field('background_image');

    $classes    = 'card';

    $styles      = (get_sub_field('background_color')) ? 'background-color: ' . get_sub_field('background_color') . ';' : '';
    $styles     .= (get_sub_field('background_image')) ? ' background-image: url(' . $image['url'] . ');' : '';
    $indexno    = get_row_index();
?>
<li class="gridder-list" data-griddercontent="#gridder-content-<?php echo $indexno;?>">
	<div class="card-background">
		<div class="card-inner">
            <div class="gridder-image">
		              <?php cfb_template('blocks/parts/block-media', get_row_layout()); ?>
            </div>
            <div class="gridder-title">
                <?php the_sub_field('title'); ?><span class="grid-more">more info</span>
            </div>
			<!-- <article>
				<div class="card-content">
					<?php the_sub_field('content'); ?>
				</div>
            			<?php cfb_template('blocks/parts/block-cta', get_row_layout()); ?>
			</article> -->
		</div>
	</div>
</li>
