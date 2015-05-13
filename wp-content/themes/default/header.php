<?php
/* ----------------------------------------------------------------------------------- */
/* This template will be called by all other template files to begin 
  /* rendering the page and display the header/nav
  /*----------------------------------------------------------------------------------- */
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?php bloginfo('name'); // show the blog name, from settings ?> | 
        <?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
    </title>

    <link rel="profile" href="http://iziweb.vn" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php ?>

    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/my_bootstrap/css/bootstrap.min.css"  />
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/my_bootstrap/css/font-awesome.min.css"  />
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/my_bootstrap/vertical-tabs/bootstrap.vertical-tabs.min.css"  />
<!--    <link rel="stylesheet" href="<?php //echo get_template_directory_uri() ?>/css/prettyPhoto.css"  />-->
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/main.css" />


    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=1395390994084918";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 logo">
                    <a href="<?php echo home_url(); ?>">
                        <h1>RƯỢU DÂN TỘC</h1>
                        <div class="desc text-center"><i>Tinh túy từ thiên nhiên</i></div>
                    </a>
                </div>
                <div class="col-xs-6 col-xs-offset-2">
                    <div class="row social-head text-right">
                        <div class="col-xs-6 col-xs-offset-6">
                            <a href="#"><i class="fa fa-facebook-official"></i></a>
                            <a href="#"><i class="fa fa-google-plus-square"></i></a>
                            <a href="#"><i class="fa fa-rss-square"></i></a>
                            <span class="hotline">
                                <a href="#" class="hotline-text"><strong>HOTLINE: </strong></a>
                                <a href="#" class="hotline-num"><strong>0912345678</strong></a>
                            </span>
                        </div>
                    </div>

                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>

        <div id="top-menu" class="navbar navbar-static-top bs-docs-nav">
            <div class="container">
                <div class="navbar-header">
                    <button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand visible-xs" href="">Menu</a>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse">
                    <ul class="nav navbar-nav ver-menu">
                        <li><a href="#">DANH MỤC SẢN PHẨM <span class="fa fa-angle-right"></span></a>                                                
                            <?php wp_nav_menu(array(
                        'menu' => 'ver-menu',
                        'theme_location' => 'ver-menu',
                        'depth' => 2,
                        'container' => '',
                        'menu_class' => 'nav navbar-nav sub-ver-1',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker_2()
                    )); ?>
                            <div id="load-bgmenu">
                                
                            </div>
                        </li>
                    </ul>
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'hor-menu',
                        'theme_location' => 'hor-menu',
                        'depth' => 2,
                        'container' => '',
                        'menu_class' => 'nav navbar-nav hor-menu',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker()
                    ));
                    ?>
                </nav>
            </div>
        </div>

    </header>

