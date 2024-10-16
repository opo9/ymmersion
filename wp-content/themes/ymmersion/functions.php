<?php
include_once(get_template_directory() . '/init/init-cpt-ui.php');
include_once(get_template_directory() . '/init/init-acf-blocks-categories.php');
include_once(get_template_directory() . '/init/init-acf-blocks.php');

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('copse-font', 'https://fonts.googleapis.com/css2?family=Copse&display=swap');
    wp_enqueue_style( 'tailwind', get_template_directory_uri() . '/src/output.css', array() );
    wp_enqueue_style('style-global', get_template_directory_uri() . '/assets/css/global.min.css', [], '1.0.5');
    wp_enqueue_script('script-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0.5');
});

add_filter('use_block_editor_for_post_type', function () {
    return false;
}, 10, 2);

add_filter('use_block_editor_for_post', function () {
    return false;
}, 10, 2);

function add_fontawesome_cdn() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'add_fontawesome_cdn');

add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'menu1' => "Menu1",
        'menu2' => "Menu2",
        'options' => "Options",
    ));
}, 0);

function remove_menu_items() {
    global $menu;

    // Specify the menu items to remove
    $remove_items = array('edit.php', 'edit-comments.php');

    foreach ($menu as $key => $item) {
        if (in_array($item[2], $remove_items)) {
            unset($menu[$key]);
        }
    }
}

add_action('admin_menu', 'remove_menu_items');

function supprimer_tailles_images_par_defaut() {
    remove_image_size('thumbnail');
    remove_image_size('medium');
    remove_image_size('medium_large');
    remove_image_size('large');
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');
}

add_action('init', 'supprimer_tailles_images_par_defaut');

function add_custom_meta_tags_to_admin()
{
    echo '<meta name="robots" content="noindex, nofollow">';
}

add_action('admin_head', 'add_custom_meta_tags_to_admin');
