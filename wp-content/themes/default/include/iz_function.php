<?php

function iz_create_post_type() {
    register_post_type('iz_review', array(
        'labels' => array(
            'name' => 'Khách hàng',
            'singular_name' => 'Khách hàng'
        ),
        'description' => 'Đánh giá của khách hàng',
        'supports' => array(
            'title', 'excerpt', 'thumbnail'
        ),
        'hierarchical' => true,
        'has_archive' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-phone',
        'capability_type' => 'post'
    ));
}

add_action('init', 'iz_create_post_type');

function iz_add_review_fields() {
    add_meta_box('show-contact-field', 'Thông tin khách hàng', 'iz_show_review_fields', 'iz_review', 'normal', 'low', array());
}

add_action('add_meta_boxes', 'iz_add_review_fields');

function iz_show_review_fields($post) {
    $address = get_post_meta($post->ID, 'review_addr', true);
    ?>
    <div id="review_addr">
        <label>Địa chỉ</label>
        <input type="text" name="review_addr" class="large-text" value="<?php if ($address) echo $address; ?>" />
    </div>
    <?php
}

function fl_review_save($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'iz_review' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }
    // Make sure that it is set.
    if (isset($_POST['review_addr'])) {
        update_post_meta($post_id, 'review_addr', $_POST['review_addr']);
    }
}

add_action('save_post', 'fl_review_save');

function SearchFilter($query) {
    if (isset($_GET['s']) && isset($_GET['product_cat_sl']) && $query->is_main_query()) {
        $tax_query = array(
            array(
                'taxonomy' => 'product_cat',
                'terms' => $_GET['product_cat_sl'],
                'field' => 'term_id'
            )
        );
    }
    return $query;
}

add_filter('pre_get_posts', 'SearchFilter');
