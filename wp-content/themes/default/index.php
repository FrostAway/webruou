<?php get_header(); // This fxn gets the header.php file and renders it              ?>
<section id="slider">
    <div class="slides">
        <!--<img class="img-responsive" src="<?php //echo get_template_directory_uri() ?>/images/slide1.jpg" />-->
        <?= do_shortcode('[rev_slider slider1]'); ?>
    </div>
</section>

<!--<pre><?php // print_r(wp_get_nav_menu_items(get_nav_menu_locations()['ver-menu']))    ?></pre>-->
<ul>
    <?php
//$menus = wp_get_nav_menu_items(get_nav_menu_locations()['ver-menu']);
    ?>
</ul>

<section id="main-body">
    <div class="container">
        <div class="featured">
            <h3 class="box-title">Sản phẩm nổi bật</h3>
            <div class="line-title"></div>
            <div class="">
                <div class="col-xs-12 col-md-12 col-lg-8 no-padding">
                    <?php
                    query_posts(array('post_type' => 'product', 'show_posts' => 3, 'meta_key' => '_featured', 'meta_value' => 'yes'));
                    ?>
                    <ul class="featured-product products">
                        <?php if (have_posts()):while (have_posts()):the_post(); ?>
                                <li class="col-xs-12 col-md-4 col-lg-4 product">
                                    <a class="product-box" href="<?php the_permalink(); ?>">
                                        <div class="image">
                                            <?php woocommerce_template_loop_product_thumbnail(); ?>
                                        </div>
                                        <h4 class="title"><?php the_title(); ?></h4>
                                        <div class="desc"><?php $cm = get_post_meta(get_the_ID(), '_cmml', true); if($cm) echo $cm; else echo 'ml'; ?></div>
                                    </a>
                                </li>
                                <?php
                            endwhile;
                            wp_reset_query();
                        endif;
                        ?>
                    </ul>
                </div>
                <div class="col-xs-12 col-lg-4 hidden-md banner no-padding">
                    <img class="" src="<?= get_template_directory_uri() ?>/images/featured-bn.jpg"  />
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="banner banner-1">
            <img src="<?= get_template_directory_uri() ?>/images/banner-1.jpg" />
        </div>

        <?php
        $home_cats = ot_get_option('home_product_cats');
        if (is_array($home_cats)) {
            foreach ($home_cats as $cat) {
                ?>
                <div class="product-part">
                    <div class="col-xs-12 col-md-3 col-lg-5 no-padding">
                        <div class="media tab-menu">
                            <div class="media-left hidden-xs hidden-md box-banner">
                                <?php
                                $thumbnail_id = get_woocommerce_term_meta($cat, 'thumbnail_id', true);
                                $image = wp_get_attachment_url($thumbnail_id);
                                if ($image) {
                                    echo '<img src="' . $image . '" alt="" />';
                                }
                                ?>
                            </div>
                            <div class="media-body product-tab">
                                <a href="<?php echo get_term_link(get_term($cat, 'product_cat')); ?>"><h3 class="media-heading title"><?php echo get_term($cat, 'product_cat')->name; ?></h3></a>
                                <ul class="nav nav-tabs tabs-left product-tabs list-unstyled">
                                    <?php
                                    $term_childs = get_term_children($cat, 'product_cat');
                                    foreach ($term_childs as $child_id) {
                                        $child = get_term($child_id, 'product_cat');
                                        ?>
                                        <li><a href="#tabterm-<?= $child->term_id; ?>" data-term="<?php echo $child->term_id ?>" data-toggle="tab"><?php echo $child->name; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-9 col-lg-7 no-padding tab-content">
                        <?php
                        foreach ($term_childs as $child_id) {
                            $child = get_term($child_id, 'product_cat');
                            ?>
                            <div class="tab-pane products" id="tabterm-<?= $child->term_id ?>">
                                <?php
                                query_posts(array('post_type' => 'product', 'posts_per_page' => 3, 'tax_query' => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'terms' => $child_id,
                                            'field' => 'term_id'
                                        )
                                )));
                                if (have_posts()):while (have_posts()):the_post();
                                        ?>
                                        <div class="col-xs-12 col-sm-4 product">
                                            <a class="product-box" href="<?php the_permalink(); ?>">
                                                <div class="image">
                                                    <?php woocommerce_template_loop_product_thumbnail(); ?>
                                                </div>
                                                <h4 class="title"><?php the_title(); ?></h4>
                                                <div class="desc">
                                                    <div class="per"><?php $cm = get_post_meta(get_the_ID(), '_cmml', true); if($cm) echo $cm; else echo 'ml'; ?></div>
                                                    <p><?php echo wp_trim_words(get_the_content(), 15, '.....'); ?></p>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    wp_reset_query();
                                endif;
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
            }
        }
        ?>


        <?php
        $home_catss = ot_get_option('home_cats');
        if (is_array($home_catss)) {
            foreach ($home_catss as $cat) {
                ?>
                <div class="product-part">
                    <div class="col-xs-12 col-md-3 col-lg-5 no-padding">
                        <div class="media tab-menu">
                            <div class="media-left hidden-xs hidden-md box-banner">
                                <?php
                                z_taxonomy_image($cat);
                                ?>
                            </div>
                            <div class="media-body product-tab">
                                <a href="<?php echo get_category_link($cat); ?>"><h3 class="media-heading title"><?php echo get_cat_name($cat); ?></h3></a>
                                <ul class="nav nav-tabs tabs-left product-tabs list-unstyled">
                                    <?php
                                    $term_childs = get_categories('child_of=' . $cat . '&hide_empty=0&order=DESC');
                                    foreach ($term_childs as $child) {
                                        ?>
                                        <li><a href="#tabterm-<?= $child->term_id; ?>" data-term="<?php echo $child->term_id ?>" data-toggle="tab"><?php echo $child->name; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-9 col-lg-7 no-padding tab-content">
                        <?php foreach ($term_childs as $child) { ?>
                            <div class="tab-pane products" id="tabterm-<?= $child->term_id ?>">
                                <?php
                                query_posts(array('posts_per_page' => 3, 'cat' => $child->term_id));
                                if (have_posts()):while (have_posts()):the_post();
                                        ?>
                                        <div class="col-xs-12 col-sm-4 product">
                                            <a class="product-box" href="<?php the_permalink(); ?>">
                                                <div class="image">
                                                    <?php the_post_thumbnail('shop_catalog'); ?>
                                                </div>
                                                <h4 class="title"><?php the_title(); ?></h4>
                                                <div class="desc">
                                                    <p><?php echo wp_trim_words(get_the_content(), 10, '.....'); ?></p>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    wp_reset_query();
                                endif;
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <div class="separator s-content">
        <div class="line-1"></div>
        <div class="line-2"></div>
    </div>

    <div class="container">
        <div class="home-news">
            <div class="row">
                <div class="col-xs-12 col-md-4 news">
                    <?php $cat1 = get_category(6); ?>
                    <a href="<?php echo get_category_link($cat1); ?>"><h3 class="title"><?php echo $cat1->name ?></h3></a>
                    <div class="posts">
                        <?php
                        query_posts(array('posts_per_page' => 3, 'cat' => 6));
                        if (have_posts()):while (have_posts()):the_post();
                                ?>
                                <div class="media post">
                                    <div class="media-left">
                                        <?php the_post_thumbnail('new_thumb'); ?>
                                    </div>
                                    <div class="media-body">
                                        <a href="<?php the_permalink(); ?>"><h4 class="media-heading"><?php the_title(); ?></h4></a>
                                        <a class="btn btn-primary btn-sm read-more" href="<?php the_permalink(); ?>">Xem thêm</a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                            wp_reset_query();
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 news">
                    <?php $cat2 = get_category(1); ?>
                    <a href="<?php echo get_category_link($cat2); ?>"><h3 class="title"><?php echo $cat2->name ?></h3></a>
                    <div class="posts">
                        <?php
                        query_posts(array('posts_per_page' => 3, 'cat' => 1));
                        if (have_posts()):while (have_posts()):the_post();
                                ?>
                                <div class="media post">
                                    <div class="media-left">
                                        <?php the_post_thumbnail('new_thumb'); ?>
                                    </div>
                                    <div class="media-body">
                                        <a href="<?php the_permalink(); ?>"><h4 class="media-heading"><?php the_title(); ?></h4></a>
                                        <a class="btn btn-primary btn-sm read-more" href="<?php the_permalink(); ?>">Xem thêm</a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                            wp_reset_query();
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 news">
                    <h3 class="title">KHÁCH HÀNG NÓI VỀ CHÚNG TÔI</h3>
                    <div class="panel says">
                        <?php
                        query_posts(array('post_type' => 'iz_review', 'showposts' => -1));
                        if (have_posts()): while (have_posts()): the_post();
                                ?>
                                <div class="say">
                                    <?php the_excerpt(); ?>
                                    <div class="media">
                                        <div class="media-left">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php the_title(); ?></h4>
                                            <i class="desc"><?= get_post_meta(get_the_ID(), 'review_addr', true); ?></i>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_query();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="partners">
            <!--            <div class="row">
            <?php // for ($i = 0; $i < 6; $i++) { ?>
                                <div class="col-xs-2">
                                    <img src="<?php //echo get_template_directory_uri()  ?>/images/partner.jpg" style="max-width: 100%;" />
                                </div>
            <?php // }   ?>
                        </div>-->
            <?php kw_sc_logo_carousel('default'); ?>
        </div>

    </div>
</section>
<?php get_footer(); ?>