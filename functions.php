<?php
/**
 * ZenPaper functions and definitions
 *
 * @package ZenPaper
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function zenpaper_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    
    // Add editor style
    add_editor_style('style.css');
    
    // Load text domain
    load_theme_textdomain('zenpaper', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'zenpaper_setup');

/**
 * Enqueue scripts and styles
 */
function zenpaper_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'zenpaper-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400;700&display=swap',
        array(),
        null
    );
    
    // Theme stylesheet
    wp_enqueue_style('zenpaper-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Theme JavaScript
    wp_enqueue_script(
        'zenpaper-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'zenpaper_scripts');

/**
 * Disable comments completely
 */
// Close comments
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comment support from post types
add_action('init', function () {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Remove comments menu from admin
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments from admin bar
add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
});

// Disable comment feeds
add_action('template_redirect', function () {
    if (is_comment_feed()) {
        wp_redirect(home_url(), 302);
        exit;
    }
});

/**
 * Disable feeds
 */
add_action('do_feed', 'zenpaper_disable_feed', 1);
add_action('do_feed_rdf', 'zenpaper_disable_feed', 1);
add_action('do_feed_rss', 'zenpaper_disable_feed', 1);
add_action('do_feed_rss2', 'zenpaper_disable_feed', 1);
add_action('do_feed_atom', 'zenpaper_disable_feed', 1);

function zenpaper_disable_feed() {
    wp_redirect(home_url(), 302);
    exit;
}

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

/**
 * Disable author archives
 */
add_action('template_redirect', function () {
    if (is_author()) {
        wp_redirect(home_url(), 302);
        exit;
    }
});

/**
 * Disable search
 */
add_action('parse_query', function ($query) {
    if (is_search() && !is_admin()) {
        wp_redirect(home_url(), 302);
        exit;
    }
});

/**
 * Clean up wp_head()
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

/**
 * Disable emojis
 */
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
});

/**
 * Disable embeds
 */
add_action('init', function () {
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
}, 999);

/**
 * Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Custom excerpt length
 */
add_filter('excerpt_length', function ($length) {
    return 30;
}, 999);

/**
 * Custom excerpt more
 */
add_filter('excerpt_more', function ($more) {
    return '...';
});

/**
 * Remove meta boxes from post editor
 */
add_action('add_meta_boxes', function () {
    remove_meta_box('categorydiv', 'post', 'side');
    remove_meta_box('tagsdiv-post_tag', 'post', 'side');
    remove_meta_box('authordiv', 'post', 'normal');
    remove_meta_box('commentstatusdiv', 'post', 'normal');
    remove_meta_box('trackbacksdiv', 'post', 'normal');
    remove_meta_box('revisionsdiv', 'post', 'normal');
    remove_meta_box('slugdiv', 'post', 'normal');
    remove_meta_box('postcustom', 'post', 'normal');
}, 100);

/**
 * Disable autosave
 */
add_action('wp_print_scripts', function () {
    wp_deregister_script('autosave');
});

/**
 * Disable post revisions
 */
add_filter('wp_revisions_to_keep', '__return_zero');

/**
 * Simplify admin menu
 */
add_action('admin_menu', function () {
    remove_menu_page('tools.php');
}, 999);

/**
 * Hide unnecessary admin elements
 */
add_action('admin_head', function () {
    echo '<style>
        #post-preview,
        .misc-pub-section:not(.misc-pub-section.curtime),
        #screen-options-link-wrap,
        #contextual-help-link-wrap,
        #wp-admin-bar-comments,
        #dashboard_right_now .comment-count,
        #dashboard_right_now .comment-mod-count {
            display: none !important;
        }
    </style>';
});

/**
 * Custom login styles
 */
add_action('login_enqueue_scripts', function () {
    ?>
    <style>
        body.login {
            background: #fafaf9;
        }
        .login h1 a {
            display: none;
        }
        .login form {
            background: #fff;
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border-radius: 8px;
        }
        .wp-core-ui .button-primary {
            background: #1c1917;
            border-color: #1c1917;
            border-radius: 4px;
        }
        .wp-core-ui .button-primary:hover {
            background: #44403c;
            border-color: #44403c;
        }
        .login label {
            color: #57534e;
        }
        .login input[type="text"],
        .login input[type="password"] {
            border: 1px solid #e7e5e4;
            border-radius: 4px;
        }
        .login input[type="text"]:focus,
        .login input[type="password"]:focus {
            border-color: #1c1917;
            box-shadow: 0 0 0 1px #1c1917;
        }
    </style>
    <?php
});

/**
 * Remove admin footer text
 */
add_filter('admin_footer_text', '__return_empty_string');
add_filter('update_footer', '__return_empty_string', 11);

/**
 * Custom dashboard widgets
 */
add_action('wp_dashboard_setup', function () {
    // Remove all default widgets
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    
    // Add custom welcome widget
    wp_add_dashboard_widget(
        'zenpaper_welcome',
        '欢迎使用 ZenPaper',
        function () {
            echo '<p style="font-size: 14px; line-height: 1.6; color: #57534e;">';
            echo '这是一个极致极简的主题，专注于纯粹的写作与阅读。<br><br>';
            echo '• 直接写文章，无需设置分类或标签<br>';
            echo '• 前台自动展示，无需复杂配置<br>';
            echo '• 阅读体验优化，支持移动端<br>';
            echo '</p>';
        }
    );
});

/**
 * Redirect to homepage after login
 */
add_filter('login_redirect', function ($redirect_to, $request, $user) {
    return home_url();
}, 10, 3);

/**
 * Remove "Howdy" from admin bar
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
    $my_account = $wp_admin_bar->get_node('my-account');
    if ($my_account) {
        $new_title = str_replace('您好，', '', $my_account->title);
        $wp_admin_bar->add_node(array(
            'id' => 'my-account',
            'title' => $new_title,
        ));
    }
}, 25);

/**
 * Disable block editor patterns and styles
 */
add_action('init', function () {
    remove_theme_support('core-block-patterns');
});

/**
 * Clean up body classes
 */
add_filter('body_class', function ($classes) {
    $remove = array('single-format-standard', 'post-template-default');
    return array_diff($classes, $remove);
});