<?php
/**
 * silverless_ecom functions and definitions
 *
 * @package silverless_ecom
 */

/****************************************************/
/*                       Hooks                       /
/****************************************************/

/* Enqueue scripts and styles */
add_action('wp_enqueue_scripts', 'silverless_ecom_scripts');

/* Add Menus */
add_action('init', 'silverless_ecom_custom_menu');

/* Dashboard Config */
add_action('wp_dashboard_setup', 'silverless_ecom_dashboard_widget');

/* Dashboard Style */
add_action('admin_head', 'silverless_ecom_custom_fonts');

/* Remove Default Menu Items */
add_action('admin_menu', 'silverless_ecom_remove_menus');

/* Change Posts Columns */
add_filter('manage_posts_columns', 'silverless_ecom_manage_columns');

/* Reorder Admin Menu */
add_filter('custom_menu_order', 'silverless_ecom_reorder_menu');
add_filter('menu_order', 'silverless_ecom_reorder_menu');

/* Remove Comments Link */
add_action('wp_before_admin_bar_render', 'silverless_ecom_manage_admin_bar');

add_action(
  'after_setup_theme',
  function () {
    add_theme_support('html5', ['script', 'style']);
  }
);


/****************************************************/
/*                     Functions                     /
/****************************************************/

function silverless_ecom_scripts()
{
  wp_enqueue_style('silverless_ecom-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);
  wp_enqueue_script('silverless_ecom-core-js', get_template_directory_uri() . '/inc/js/compiled.js', array('jquery'), filemtime(get_stylesheet_directory() . '/inc/js/compiled.js'), true);
}

add_filter('script_loader_tag', function ($tag, $handle) {

  if ('silverless_ecom-intersection-js' !== $handle)
    return $tag;

  return str_replace(' src', ' defer="defer" src', $tag);
}, 10, 2);

function silverless_ecom_custom_menu()
{
  register_nav_menus(
    array(
      'main-menu' => __('Main Menu')
    )
  );

  register_nav_menus(
    array(
      'mobile-menu' => __('Mobile Menu')
    )
  );

  register_nav_menus(
    array(
      'footer-menu' => __('Footer Menu')
    )
  );
}

function silverless_ecom_dashboard_widget()
{
  global $wp_meta_boxes;
  wp_add_dashboard_widget('custom_help_widget', 'silverless_ecom Support', 'silverless_ecom_dashboard_help');
}

function silverless_ecom_dashboard_help()
{
  echo file_get_contents(__DIR__ . "/admin-settings/dashboard.html");
}

function silverless_ecom_custom_fonts()
{
  echo '<style type="text/css">' . file_get_contents(__DIR__ . "/admin-settings/style-admin.css") . '</style>';
}

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(
    array(
      'page_title' => 'Theme Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'site-general-settings',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
}

function silverless_ecom_remove_menus()
{
  remove_menu_page('edit-comments.php'); //Comments
}

function silverless_ecom_manage_columns($columns)
{
  unset($columns["comments"]);
  return $columns;
}

function silverless_ecom_reorder_menu()
{
  return array(
    'index.php',
    // Dashboard
    'separator1',
    // --Space--
    'edit.php',
    // Posts
    'edit.php?post_type=page',
    // Pages
    'upload.php',
    // Media
    'separator2',
    // --Space--
    'themes.php',
    // Appearance
    'plugins.php',
    // Plugins
    'users.php',
    // Users
    'tools.php',
    // Tools
    'options-general.php',
    // Settings
    'wpcf7', // Contact Form 7
  );
}

function silverless_ecom_manage_admin_bar()
{
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}

/**= Pagination =**/
require_once('pagination.php');

/** = WOOCOMMERCE FUNCTIONS = **/
require_once('woocommerce-functions.php');

/* ADD CUSTOM RESPONSIVE IMAGE SIZES
================================================== */

function aw_custom_responsive_image_sizes($sizes, $size)
{
  $width = $size[0];
  // blog posts
  if (is_singular('post')) {
    // half width images - medium size
    if ($width === 600) {
      return '(min-width: 768px) 322px, (min-width: 576px) 255px, calc( (100vw - 30px) / 2)';
    }
    // full width images - large size
    if ($width === 1024) {
      return '(min-width: 768px) 642px, (min-width: 576px) 510px, calc(100vw - 30px)';
    }
    // default to return if condition is not met
    return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
  }
  // default to return if condition is not met
  return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
}
add_filter('wp_calculate_image_sizes', 'aw_custom_responsive_image_sizes', 10, 2);

function manage_my_category_columns($columns)
{
  // only edit the columns on the current taxonomy
  if (!isset($_GET['taxonomy']) || $_GET['taxonomy'] != 'category')
    return $columns;

  // unset the description columns
  if ($posts = $columns['description']) {
    unset($columns['description']);
  }

  return $columns;
}
add_filter('manage_edit-category_columns', 'manage_my_category_columns');

show_admin_bar(false);


function my_acf_google_map_api($api)
{
  $api['key'] = 'AIzaSyClrCRpYppmoqOu5RPPM-Aj71LsNq6lMHY';
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function excerpt($limit)
{
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt) >= $limit) {
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt) . '...';
  } else {
    $excerpt = implode(" ", $excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
  return $excerpt;
}

//List archives by year, then month
function wp_custom_archive($args = '')
{
  global $wpdb, $wp_locale;

  $defaults = array(
    'limit' => '',
    'format' => 'html',
    'before' => '',
    'after' => '',
    'show_post_count' => false,
    'echo' => 1
  );

  $r = wp_parse_args($args, $defaults);
  extract($r, EXTR_SKIP);

  if ('' != $limit) {
    $limit = absint($limit);
    $limit = ' LIMIT ' . $limit;
  }

  // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
  $archive_date_format_over_ride = 0;

  // options for daily archive (only if you over-ride the general date format)
  $archive_day_date_format = 'Y/m/d';

  // options for weekly archive (only if you over-ride the general date format)
  $archive_week_start_date_format = 'Y/m/d';
  $archive_week_end_date_format = 'Y/m/d';

  if (!$archive_date_format_over_ride) {
    $archive_day_date_format = get_option('date_format');
    $archive_week_start_date_format = get_option('date_format');
    $archive_week_end_date_format = get_option('date_format');
  }

  //filters
  $where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r);
  $join = apply_filters('customarchives_join', "", $r);

  $output = '<ul>';

  $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
  $key = md5($query);
  $cache = wp_cache_get('wp_custom_archive', 'general');
  if (!isset($cache[$key])) {
    $arcresults = $wpdb->get_results($query);
    $cache[$key] = $arcresults;
    wp_cache_set('wp_custom_archive', $cache, 'general');
  } else {
    $arcresults = $cache[$key];
  }
  if ($arcresults) {
    $afterafter = $after;
    foreach ((array) $arcresults as $arcresult) {
      $url = get_month_link($arcresult->year, $arcresult->month);
      $year_url = get_year_link($arcresult->year);
      /* translators: 1: month name, 2: 4-digit year */
      $text = sprintf(__('%s'), $wp_locale->get_month($arcresult->month));
      $year_text = sprintf('%d', $arcresult->year);
      if ($show_post_count)
        $after = '&nbsp;(' . $arcresult->posts . ')' . $afterafter;
      $year_output = get_archives_link($year_url, $year_text, $format, $before, $after);
      $output .= ($arcresult->year != $temp_year) ? $year_output : '';
      $output .= get_archives_link($url, $text, $format, $before, $after);

      $temp_year = $arcresult->year;
    }
  }

  $output .= '</ul>';

  if ($echo)
    echo $output;
  else
    return $output;
}
// This theme uses post thumbnails
add_theme_support('post-thumbnails');

if (function_exists('add_theme_support')) {
  add_theme_support('category-thumbnails');
}





/*	
 * Getting script tags
 * Thanks http://wordpress.stackexchange.com/questions/54064/how-do-i-get-the-handle-for-all-enqueued-scripts
 */

// add_action( 'wp_print_scripts', 'wsds_detect_enqueued_scripts' );
// function wsds_detect_enqueued_scripts() {
// 	global $wp_scripts;
// 	foreach( $wp_scripts->queue as $handle ) :
// 		echo $handle . ' | ';
// 	endforeach;
// }

// add_filter( 'script_loader_tag', 'wsds_defer_scripts', 10, 3 );
// function wsds_defer_scripts( $tag, $handle, $src ) {

// 	// The handles of the enqueued scripts we want to defer
// 	$defer_scripts = array( 
//     '',
//     'silverless_ecom-core-js',
// 	);

//     if ( in_array( $handle, $defer_scripts ) ) {
//         return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
//     }

//     return $tag;
// } 

function add_menu_link_class($atts, $item, $args)
{
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

function add_menu_list_item_class($classes, $item, $args)
{
  if (property_exists($args, 'list_item_class')) {
    $classes[] = $args->list_item_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css()
{
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);

/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
function get_breadcrumb()
{
  echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
  if (is_category() || is_single()) {
    echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
    the_category(' &bull; ');
    if (is_single()) {
      echo " &nbsp;&nbsp;|&nbsp;&nbsp; ";
      the_title();
    }
  } elseif (is_page()) {
    echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
    echo the_title();
  } elseif (is_search()) {
    echo "&nbsp;&nbsp;|&nbsp;&nbsp;Search Results for... ";
    echo '"<em>';
    echo the_search_query();
    echo '</em>"';
  }
}

function taxonomy_hierarchy()
{
  global $post;
  $taxonomy = 'destination'; //Put your custom taxonomy term here
  $terms = wp_get_post_terms($post->ID, $taxonomy);
  foreach ($terms as $term) {
    if ($term->parent == 0) // this gets the parent of the current post taxonomy
    {
      $myparent = $term;
    }
  }
  echo '' . $myparent->name . '';
  // Right, the parent is set, now let's get the children
  foreach ($terms as $term) {
    if ($term->parent != 0) // this ignores the parent of the current post taxonomy
    {
      $child_term = $term; // this gets the children of the current post taxonomy
      echo ' <span class="sep"> | </span> ' . $child_term->name . '';
    }
  }
}
add_action('after_setup_theme', 'silver_hero_image');
function silver_hero_image()
{
  add_image_size('hero-image', 1920); // 1920 pixels wide (and unlimited height)
}

/**
 * Add Response code to video embeds in WordPress
 *
 * @refer  http://alxmedia.se/code/2013/10/make-wordpress-default-video-embeds-responsive/
 */
function abl1035_alx_embed_html($html)
{

  return '<div class="video-container">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'abl1035_alx_embed_html', 10, 3);
add_filter('video_embed_html', 'abl1035_alx_embed_html'); // Jetpack

function collectiveray_enable_threaded_comments()
{

  if (!is_admin()) {

    if (is_singular() and comments_open() and (get_option('thread_comments') == 1))

      wp_enqueue_script('comment-reply');

  }

}

add_action('get_header', 'collectiveray_enable_threaded_comments');

function wp1482371_custom_post_type_args($args, $post_type)
{
  if ($post_type == "properties") {
    $args['rewrite'] = array(
      'slug' => 'accommodation'
    );
  }

  return $args;
}
add_filter('register_post_type_args', 'wp1482371_custom_post_type_args', 20, 2);

/** Create slug from ACF field */
function acf_title($value, $post_id, $field)
{
  if (get_post_type($post_id) === 'itineraries') {

    $new_title = get_field('unique_id', $post_id);
    $new_slug = sanitize_title($new_title);

    wp_update_post(
      array(
        'ID' => $post_id,
        'post_name' => $new_slug,
      )
    );
  }
  return $value;
}
add_filter('acf/update_value', 'acf_title', 10, 3);

remove_all_filters('posts_orderby');

add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );

// Remove all Woo Styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );

// Add the cart link to menu
function wpex_add_menu_cart_item_to_menus( $items, $args ) {

	// Make sure your change 'wpex_main' to your Menu location !!!!
	if ( $args->theme_location === 'wpex_main' ) {

		$css_class = 'menu-item menu-item-type-cart menu-item-type-woocommerce-cart';
		
		if ( is_cart() ) {
			$css_class .= ' current-menu-item';
		}

		$items .= '<li class="' . esc_attr( $css_class ) . '">';

			$items .= wpex_menu_cart_item();

		$items .= '</li>';

	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'wpex_add_menu_cart_item_to_menus', 10, 2 );

// Function returns the main menu cart link
function wpex_menu_cart_item() {

	$output = '';

	$cart_count = WC()->cart->cart_contents_count;

	$css_class = 'wpex-menu-cart-total wpex-cart-total-'. intval( $cart_count );

	if ( $cart_count ) {
		$url  = WC()->cart->get_cart_url();
	} else {
		$url  = wc_get_page_permalink( 'shop' );
	}

	$html = $cart_extra = WC()->cart->get_cart_total();
	$html = str_replace( 'amount', '', $html );

	$output .= '<a href="'. esc_url( $url ) .'" class="' . esc_attr( $css_class ) . '">';

		$output .= '<span class="fa fa-shopping-bag"></span>';

		$output .= wp_kses_post( $html );

	$output .= '</a>';

	return $output;
}


// Update cart link with AJAX
function wpex_main_menu_cart_link_fragments( $fragments ) {
	$fragments['.wpex-menu-cart-total'] = wpex_menu_cart_item();
	return $fragments;
}
add_filter( 'add_to_cart_fragments', 'wpex_main_menu_cart_link_fragments' );

add_action( 'wp', 'my_remove_sidebar_product_pages' );
 
function my_remove_sidebar_product_pages() {
 
  if ( is_product() ) {
 
    remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar', 10 );
 
  }
 
}

add_filter( 'woocommerce_breadcrumb_defaults', 'wps_breadcrumb_delimiter' );
function wps_breadcrumb_delimiter( $defaults ) {
  $defaults['delimiter'] = ' &#129170; ';
  return $defaults;
}

remove_theme_support( 'wc-product-gallery-zoom' );