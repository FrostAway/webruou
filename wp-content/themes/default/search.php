<?php get_header(); ?>
<div id="main-content" class="container">
    <h1>Kết quả tìm kiếm</h1>    
    <div class="post">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-3 pthumb">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('archive_thumb', array('class' => 'img-responsive')); ?></a>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-9 pcontent">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php the_excerpt(); ?>
                        <?php include (TEMPLATEPATH . '/include/meta.php' ); ?>
                    </div>
                </div>
                <?php
            endwhile;
        else :
            ?>
            <h3>Không có kết quả nào!</h3>
        <?php endif; ?>
    </div>
</div><!--end post-->
<?php get_footer(); ?>



