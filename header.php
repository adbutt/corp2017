<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if IE 9]> <html class="lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1.0,width=device-width">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/assets/icons/favicon.ico" type="image/x-icon" />
<link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/icons/images/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/assets/icons/appleicon.png"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url');?>" />

<?php wp_head();?>
<!--SEO -->
<meta name="google-site-verification" content="mE6vPTzLGNNdt8IUZwXYLIT_LLA4JjXHKEu_YgO9g9I" />
<meta name="revisit-after" content="7 days" />
<meta name="author" content="Workpower Web Design Perth" />
<meta name="copyright" content="Copyright Workpower Web Design Perth 2015. All rights reserved." />
<meta name="distribution" content="global" />
<meta name="language" content="English" />
<meta name="google-site-verification" content="R1YiaaCu2xvpVVcVutEW88Qo9FlQUrCoBbuigiuKwIM" />
</head>

<body id="page-top" <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<!--Screen Reeder Skip to content -->
<!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>
 -->    <!--Mobile Navigation -->
        <nav id="mobile" role="navigation" aria-label="Mobile Navigation">
                <div class="mlogo-holder">
                    <a href="<?php bloginfo('url');?>" class="logo"><div class="logo-contain"><?php bloginfo('description'); ?></div></a>
                </div>
                <div class="tg-surround ">
                    <!-- <span class="mtoggle navtxt">MENU</span> -->
                    <span class="fa fa-navicon mtoggle navicon"></span>
                </div>
        <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu' ) ); ?>
        </nav>
    <!--End Mobile Navigation -->
    <!--Start Header-->
    <header id="header" role="banner">
        <!--Top Navigation-->
        <div class="top-navigation">
            <div class="container">
                <div class="resize-txt">
                    <ul class="resizer">
                    <li class="access-fs">Font Size: </li>
                    <li class="small"><a href="#">A</a></li>
                    <li class="medium"><a href="#">A</a></li>
                    <li class="large"><a href="#">A</a></li>
                    </ul>
                    <ul class="contrast">
                    <li class="access-fs">Contrast: </li>
                    <li class="low-contrast"><a href="#">Normal</a></li>
                    <li class="high-contrast"><a href="#">High</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--End Top Navigation-->
        <!--Start Branding-->
        <div class="branding">
                <div class="logo-wrapper">
                    <a href="<?php bloginfo('url');?>" class="logo">
                    <?php if ( is_front_page() ) { ?>
                        <h1 class="logo-contain"><?php bloginfo('description'); ?></h1>
                    <?php } else { ?>
                        <div class="logo-contain"><?php bloginfo('description'); ?></div>
                    <?php }?>
                    </a>
                </div>
                 <?php if( get_theme_mod( 'wpc_header_tel') != "" ): ?>
                <div class="contact-now"> <?php echo get_theme_mod( 'wpc_header_tel'); ?></div>
                <?php endif; ?>
        </div>
        <!--End Branding-->
        <!--Start Main Navigation-->
        <div class="main-navigation">
            <nav id="nav" role="navigation" aria-label="Primary Navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </nav>
        </div>
        <!--End Main Navigation-->
    </header><!-- Start Contact Us Dropdown -->
