
<div class="woocommerce-tabs">
    <ul class="tabs">
        <li class="active"><a href="#facebook-comment">Bình luận Facebook</a></li>
    </ul>
    <div id="facebook-comment" class="panel entry-content">
        <div class="fb-comments" data-width="100%" data-href="<?php the_permalink(); ?>" data-numposts="5" data-colorscheme="light"></div>
    </div>
</div>

<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');

if (post_password_required()) {
    ?>
    This post is password protected. Enter the password to view comments.
    <?php
    return;
}
?>

<?php if (have_comments()) : ?>

    <h2 id="comments"><?php comments_number('Không có bình luận nào', '1 Bình luần', '% Bình luận'); ?></h2>

    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link() ?></div>
        <div class="prev-posts"><?php next_comments_link() ?></div>
    </div>

    <ol class="commentlist">
        <?php wp_list_comments(); ?>
    </ol>

    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link() ?></div>
        <div class="prev-posts"><?php next_comments_link() ?></div>
    </div>

<?php else : // this is displayed if there are no comments so far ?>

    <?php if (comments_open()) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
        <p>Bình luận bị đóng</p>

    <?php endif; ?>

<?php endif; ?>

<?php if (comments_open()) : ?>

    <div id="respond">
        <div class="woocommerce-tabs" style="padding-top: 0;">
            <ul class="tabs">
                <li class="active"><a href="#comment-tab"><?php comment_form_title('Bình luận', 'Leave a Reply to %s'); ?></a></li>
            </ul>

            <div id="comment-tab" class="panel entry-content">
                <div class="cancel-comment-reply">
                    <?php cancel_comment_reply_link(); ?>
                </div>

                <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                    <p>You must be <a href="<?php echo wp_login_url(get_permalink()); ?>">logged in</a> to post a comment.</p>
                <?php else : ?>

                    <form class="form-horizontal" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                        <?php if (is_user_logged_in()) : ?>

                            <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

                        <?php else : ?>

                            <div class="form-group">
                                
                                <label class="col-sm-2" for="author">Tên <?php if ($req) echo "(*)"; ?></label>
                                <div class="col-sm-10"><input type="text" name="author" id="author" class="form-control" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></div>

                            </div>

                            <div class="form-group">
                                
                                <label class="col-sm-2" for="email">Email <?php if ($req) echo "(*)"; ?></label>
                                <div class="col-sm-10"><input type="text" name="email" id="email" class="form-control" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></div>

                            </div>

                        <?php endif; ?>

                        <!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

                        <div>
                            <textarea name="comment" class="form-control" id="comment" cols="58" rows="10" tabindex="4"></textarea>
                        </div>

                        <div>
                            <input name="submit" type="submit" id="submit" class="btn btn-success" tabindex="5" value="Gửi bình luận" />
                            <?php comment_id_fields(); ?>
                        </div>

                        <?php do_action('comment_form', $post->ID); ?>

                    </form>

                <?php endif; // If registration required and not logged in ?>
            </div>
        </div>


    </div>

<?php endif; ?>
