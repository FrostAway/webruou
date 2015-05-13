<?php get_header(); ?>

<div class="container" id="content">
    <?php woocommerce_breadcrumb(); ?>
    <div></div>
		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1><?php single_cat_title(); ?></h1>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1>Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1>Danh mục ngày <?php the_time('F jS, Y'); ?></h1>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1>Danh mục tháng <?php the_time('F, Y'); ?></h1>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1>Danh mục năm <?php the_time('Y'); ?></h1>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1>Author Archive</h1>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1>Blog Archives</h1>
			
			<?php } ?>

			<?php include (TEMPLATEPATH . '/include/nav.php' ); ?>

			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div <?php post_class() ?>>
                                    <div class="row">
                                    <div class="col-xs-5  col-md-4 pthumb">
                                        <?php the_post_thumbnail('archive_thumb', array('class'=>'img-responsive')); ?>
                                    </div>
                                    <div class="col-sx-7 col-md-8 pcontent">
					<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					
					<?php include (TEMPLATEPATH . '/include/meta.php' ); ?>

					<div class="entry">
						<?php echo wp_trim_words(get_the_content(), 40, '....'); ?>
					</div>
                                        <a href="<?php the_permalink() ?>" class="btn btn-sm btn-default">Xem Thêm</a>
                                    </div>
                                    </div>
				</div>

			<?php endwhile; ?>

			<?php include (TEMPLATEPATH . '/include/nav.php' ); ?>
                                
                                <?php else: ?>
                                <h3>Không có bài viết nào</h3>
                                <?php endif; ?>
			
	<?php else : ?>

		<h4>Không có mục này</h4>

	<?php endif; ?>

</div>
                
<?php get_footer(); ?>