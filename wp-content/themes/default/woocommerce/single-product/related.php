<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class="related woocommerce-tabs products">
            <ul class="tabs">
                <li class="related-product active">
                    <a href="#related-product"><?php _e( 'Related Products', 'woocommerce' ); ?></a>
                </li>
            </ul>
            
            <div id="related-product" class="">

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
                            
                            <div class="col-xs-12 col-sm-6 col-md-3 product">
                                    <a class="product-box" href="<?php the_permalink(); ?>">
                                        <div class="image">
                                            <?php woocommerce_template_loop_product_thumbnail(); ?>
                                        </div>
                                        <h4 class="title"><?php the_title(); ?></h4>
                                        <div class="desc">
                                            <div class="per">750ml/40%</div>
                                            <p><?php echo wp_trim_words(get_the_content(), 15, '.....'); ?></p>
                                        </div>
                                    </a>
                                </div>
                
				<?php //wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>
                <div class="clearfix"></div>
                
            </div>
            
            <div class="clearfix"></div>

	</div>

<?php endif;

wp_reset_postdata();
