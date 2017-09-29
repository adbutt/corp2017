<?php get_header(); ?>
<div class="wrapper">
  <div id="content" role="main" class="inner-page">
    <div class="container">
      <div class="page-content-wrapper">
        <?php if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>
        <header class="entry-header">
        <h1 class="h2 entry-title"><?php single_cat_title(); ?></h1>
        <?php if ( '' != category_description() ) echo apply_filters('archive_meta', '<div class="archive-meta">' . category_description() . '</div>'); ?>
        </header>
        <?php if ( have_posts() ) { ?>
          <main id="main" class="site-news" role="main">
            <div class="latest-news-content">
              <?php while ( have_posts() ) : the_post(); ?>
              <?php get_template_part( 'partials/entry', 'grid-news' ); ?>
              <?php endwhile; ?>
            </div>
          </main>
          <?php get_pagination($news_query);?>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
