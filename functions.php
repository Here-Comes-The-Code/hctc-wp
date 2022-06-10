<?php

// dark mode cookie check
function checkDarkMode($classes)
{

	if (wp_is_mobile() && $_COOKIE['theme'] == 'dark') {
		$classes[] = 'night-mode-active';
	}

	if ($_COOKIE['theme'] == 'dark') {
		$classes[] = 'night-mode-active';
	}
	return $classes;
}

add_filter('body_class', 'checkDarkMode');

// load async scripts  - universal check
function add_async_forscript($url)
{
	if (strpos($url, '#asyncload') === false)
		return $url;
	else if (is_admin())
		return str_replace('#asyncload', '', $url);
	else
		return str_replace('#asyncload', '', $url) . "' async='async";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);

add_action('wp_enqueue_scripts', 'basel_child_enqueue_styles', 1000);

function basel_child_enqueue_styles()
{
	$version = basel_get_theme_info('Version');

	if (basel_get_opt('minified_css')) {
		wp_enqueue_style('basel-style', get_template_directory_uri() . '/style.min.css', array('bootstrap'), $version);
	} else {
		wp_enqueue_style('basel-style', get_template_directory_uri() . '/style.css', array('bootstrap'), $version);
	}

	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/dist/style.css', array('bootstrap'), filemtime(get_stylesheet_directory() . '/dist/style.css'));
}


if (!function_exists('basel_post_date')) {
	function basel_post_date()
	{
		$has_title = get_the_title() != '';
		$attr = '';
		if (!$has_title && !is_single()) {
			$url = get_the_permalink();
			$attr = 'window.location=\'' . $url . '\';';
		}
?>
		<div class="post-date" onclick="<?php echo esc_attr($attr); ?>">
			<span class="custom-post-date-day">
				<?php echo get_the_time('d.m.Y') ?>
			</span>
		</div>
	<?php
	}
}

/**
 * Display the custom text field in admin menu
 */
function cfwc_create_custom_field()
{
	$args = array(
		'id' => 'review_url',
		'label' => __('Our review (url)', 'review'),
		'class' => 'cfwc-our-review',
		'desc_tip' => true,
		'description' => __('Please enter url to the review', 'review'),
	);
	woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_field');

/**
 * Save the custom text field in database
 */
function cfwc_save_custom_field($post_id)
{
	$product = wc_get_product($post_id);
	$title = isset($_POST['review_url']) ? $_POST['review_url'] : '';
	$product->update_meta_data('review_url', sanitize_text_field($title));
	$product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field');

/**
 * Inject google analytics script
 */
function inject_google_analytics()
{
	if (defined('GOOGLE_API_KEY')) {
		echo "<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src=\"https://www.googletagmanager.com/gtag/js?id=" . GOOGLE_API_KEY . "\"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', '" . GOOGLE_API_KEY . "');
		</script>
		";
	}
}

// Add hook for front-end <head></head>
add_action('wp_head', 'inject_google_analytics');

/**
 * Favicon
 */
function add_favicon()
{
	?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="160x160" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/favicon-160x160.png">
	<link rel="icon" type="image/png" sizes="196x196" href="<?php echo get_stylesheet_directory_uri(); ?>/fav/favicon-196x196.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/fav/mstile-144x144.png">
<?php
}

add_action('wp_head', 'add_favicon');


/**
 * Load translations for basel theme
 */
function basel_theme_translation()
{
	load_theme_textdomain('basel', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'basel_theme_translation');

function add_cors_http_header()
{
	header('Access-Control-Allow-Origin: *');
}
add_action('init', 'add_cors_http_header');

/**
 * Open read more link in new window
 */
if (!function_exists('basel_read_more_tag')) {
	function basel_read_more_tag()
	{
		return '<a target="_blank" class="btn btn-style-link btn-read-more more-link" href="' . get_permalink() . '">' . esc_html__('Read more', 'basel') . '</a>';
	}
}

/**
 * Linki afiliacyjne
 */
function links_posts()
{
	$labels = array(
		'name'               => _x('Linki afiliacyjne', 'post type general name'),
		'singular_name'      => _x('Link afiliacyjny', 'post type singular name'),
		'add_new'            => _x('Dodaj nowy', 'Link afiliacyjny'),
		'add_new_item'       => __('Dodaj link afiliacyjny'),
		'edit_item'          => __('Edytuj link'),
		'new_item'           => __('Nowy link'),
		'all_items'          => __('Wszystkie linki'),
		'view_item'          => __('Podejrzyj link'),
		'search_items'       => __('Szukaj linku'),
		'not_found'          => __('Brak linków'),
		'not_found_in_trash' => __('Brak linków w koszu'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Linki afiliacyjne'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Linki afiliacyjne',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array('title', 'editor', 'themes', 'thumbnail', 'page-attributes', 'comments', 'custom-fields'),
		'has_archive'   => true,
		'register_meta_box_cb' => 'add_links_metaboxes',
		'show_in_rest' => true,
	);
	register_post_type('affiliatelinks', $args);
}
add_action('init', 'links_posts');



function links_taxonomies()
{
	$labels = array(
		'name'              => _x('Kategorie linków', 'taxonomy general name'),
		'singular_name'     => _x('Kategoria linku', 'taxonomy singular name'),
		'search_items'      => __('Wyszukaj kategorii linku'),
		'all_items'         => __('Wszystkie kategorie linków'),
		'parent_item'       => __('Rodzic kategorii linków'),
		'parent_item_colon' => __('Rodzic kategorii linków:'),
		'edit_item'         => __('Edytuj kategorię linków'),
		'update_item'       => __('Zaaktualizuj kategorię linków'),
		'add_new_item'      => __('Dodaj nową kategorię linków'),
		'new_item_name'     => __('Nowa kategoria linków'),
		'menu_name'         => __('Kategorie linków'),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy('links', 'affiliatelinks', $args);
}
add_action('init', 'links_taxonomies', 0);

/**
 * Adds a metabox to the right side of the screen under the publish box
 */
function add_links_metaboxes()
{
	add_meta_box(
		'links_product_comment',
		'Komentarz do promocji',
		'links_product_comment',
		'affiliatelinks',
		'normal',
		'default'
	);
	add_meta_box(
		'links_old_price',
		'Stara cena',
		'links_old_price',
		'affiliatelinks',
		'normal',
		'default'
	);

	add_meta_box(
		'links_new_price',
		'Nowa cena',
		'links_new_price',
		'affiliatelinks',
		'normal',
		'default'
	);

	add_meta_box(
		'link_to_buy_product',
		'Link do produktu',
		'link_to_buy_product',
		'affiliatelinks',
		'normal',
		'default'
	);

	add_meta_box(
		'links_product_review',
		'Recenzja produktu',
		'links_product_review',
		'affiliatelinks',
		'normal',
		'default'
	);

	add_meta_box(
		'links_coupon',
		'Kupon',
		'links_coupon',
		'affiliatelinks',
		'normal',
		'default'
	);
}



/**
 * Output the HTML for the metabox.
 */
function links_product_comment()
{
	global $post;
	// Nonce field to validate form request came from current site
	wp_nonce_field(basename(__FILE__), 'event_fields');
	// Get the product comment data if it's already been entered
	$product_comment = get_post_meta($post->ID, 'product_comment', true);
	// Output the field
	echo '<input type="text" name="product_comment" value="' . esc_textarea($product_comment)  . '" class="widefat">';
}
function links_old_price()
{
	global $post;
	// Nonce field to validate form request came from current site
	wp_nonce_field(basename(__FILE__), 'event_fields');
	// Get the old_price data if it's already been entered
	$old_price = get_post_meta($post->ID, 'old_price', true);
	// Output the field
	echo '<input type="text" name="old_price" value="' . esc_textarea($old_price)  . '" class="widefat">';
}

function links_new_price()
{
	global $post;
	wp_nonce_field(basename(__FILE__), 'event_fields');
	$new_price = get_post_meta($post->ID, 'new_price', true);
	echo '<input type="text" name="new_price" value="' . esc_textarea($new_price)  . '" class="widefat">';
}

function link_to_buy_product()
{
	global $post;
	wp_nonce_field(basename(__FILE__), 'event_fields');
	$link_to_buy = get_post_meta($post->ID, 'link_to_buy', true);
	echo '<input type="text" name="link_to_buy" value="' . esc_textarea($link_to_buy)  . '" class="widefat">';
}

function links_product_review()
{
	global $post;
	wp_nonce_field(basename(__FILE__), 'event_fields');
	$product_review = get_post_meta($post->ID, 'product_review', true);
	echo '<input type="text" name="product_review" value="' . esc_textarea($product_review)  . '" class="widefat">';
}

function links_coupon()
{
	global $post;
	wp_nonce_field(basename(__FILE__), 'event_fields');
	$link_coupon = get_post_meta($post->ID, 'link_coupon', true);
	echo '<input type="text" name="link_coupon" value="' . esc_textarea($link_coupon)  . '" class="widefat">';
}

/**
 * Save the metabox data
 */
function save_links_meta($post_id, $post)
{
	// Return if the user doesn't have edit permissions.
	if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times.
	if (!isset($_POST['product_comment']) || !isset($_POST['old_price']) || !isset($_POST['new_price']) || !isset($_POST['link_to_buy']) || !isset($_POST['product_review']) || !isset($_POST['link_coupon']) || !wp_verify_nonce($_POST['event_fields'], basename(__FILE__))) {
		return $post_id;
	}

	// Now that we're authenticated, time to save the data.
	// This sanitizes the data from the field and saves it into an array $events_meta.
	$events_meta['product_comment'] = esc_textarea($_POST['product_comment']);
	$events_meta['old_price'] = esc_textarea($_POST['old_price']);
	$events_meta['new_price'] = esc_textarea($_POST['new_price']);
	$events_meta['link_to_buy'] = esc_textarea($_POST['link_to_buy']);
	$events_meta['product_review'] = esc_textarea($_POST['product_review']);
	$events_meta['link_coupon'] = esc_textarea($_POST['link_coupon']);

	// Cycle through the $events_meta array.
	// Note, in this example we just have one item, but this is helpful if you have multiple.
	foreach ($events_meta as $key => $value) :

		// Don't store custom data twice
		if ('revision' === $post->post_type) {
			return;
		}

		if (get_post_meta($post_id, $key, false)) {
			// If the custom field already has a value, update it.
			update_post_meta($post_id, $key, $value);
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta($post_id, $key, $value);
		}

		if (!$value) {
			// Delete the meta key if there's no value
			delete_post_meta($post_id, $key);
		}

	endforeach;
}

add_action('save_post', 'save_links_meta', 1, 2);


/**
 * Add Patronite & Night Mode
 */
function basel_header_block_search()
{
	$header_search = basel_get_opt('header_search');
	if ($header_search == 'disable') return;
?>


	<!-- <a rel="nofollow" href="https://patronite.pl/index.php/smartme" target="_blank" class="icon-patronite">
		<img alt="patronite logo" class="patronite-logo-desktop" src="/wp-content/uploads/2020/02/patronite-logos-2.png">
		<img alt="patronite logo" class="patronite-logo-mobile" src="/wp-content/uploads/2020/02/patronite-logos-2-min.png">
	</a> -->

	<span class=' c_slider__container '>
		<div class='c_slider__pane js-dark-mode'>
			<img class='c_slider--dark' src=<?php echo get_stylesheet_directory_uri() . '/assets/dark.svg' ?>>
			<img class='c_slider--bright' src=<?php echo get_stylesheet_directory_uri() . '/assets/light.svg' ?>>
		</div>
	</span>


	<div class="search-button basel-search-<?php echo esc_attr($header_search); ?>">
		<a href="#">
			<i class="fa fa-search"></i>
		</a>
		<div class="basel-search-wrapper">
			<div class="basel-search-inner">
				<span class="basel-close-search"><?php esc_html_e('close', 'basel'); ?></span>
				<?php basel_header_block_search_extended(false, true, array('thumbnail' => 1, 'price' => 1, 'count' => 4), false); ?>
			</div>
		</div>
	</div>
	<!-- load dark mode if has preferences -->
<?php
}


function change_b_to_strong($content)
{
	$content = str_replace('strong>', 'b>', $content);
	return $content;
}

add_filter('the_content', 'change_b_to_strong');
add_filter('the_editor', 'change_b_to_strong');

// remove comments feed
add_filter('feed_links_show_comments_feed', '__return_false');

// remove posts feed
add_filter('feed_links_show_posts_feed', '__return_false');

// add feed links manually
add_action('wp_head', function () {
	echo '<link rel="alternate" type="application/rss+xml" title="SmartMe Feed" href="' . get_bloginfo('rss2_url') . '" />';
}, 0);

/* Add fb-like script to the header */

function add_fb_like_btn()
{

	echo '
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v6.0&appId=282589479112&autoLogAppEvents=1"></script>
	';
}

// Add hook for front-end <head></head>
add_action('wp_head', 'add_fb_like_btn');

// Ads configuration
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Strona główna',
		'menu_title' => 'Strona główna',
		'menu_slug' => 'smartme-options-main',
		'capability' => 'edit_posts',
		'redirect' => true,
		'icon_url' => '
	dashicons-nametag',
		'position' => 1,
	));
}

// Add child theme shortcodes
// Shortcodes
function add_template_part($atts)
{

	$a = shortcode_atts(
		array(
			'base' => 'ads',
			'descr' => 'banner',
		),
		$atts
	);

	ob_start();
	$template = get_template_part("template-parts/{$a['base']}", "{$a['descr']}");

	$templatestring = ob_get_clean();
	return $templatestring;
}

add_shortcode('template', 'add_template_part');

// add custom scripts

function smartme__custom__scripts()
{

	// vendors
	wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/41a8bb154d.js', array(), null, true);
	// custom 
	wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . "/dist/script.js", array(), filemtime(get_stylesheet_directory() . "/dist/script.js"), true);
	// optads
	// added manually in head, as per request



}

add_action('wp_enqueue_scripts', 'smartme__custom__scripts');

// display tidio on particular pages

function restrictTidio($classes)
{
	// ids
	// Doradztwo 18321, Współpraca 1198, Kontakt 45
	$tidio_enabled_pages = ['18321', '1198', '45'];
	foreach ($tidio_enabled_pages as $page) {
		if (is_page($page)) {
			$classes[] = 'tidio-active';
		}
	}
	return $classes;
}

add_filter('body_class', 'restrictTidio');


// register metafields to api
function register_affiliatelinks_meta_fields()
{

	register_meta('post', 'product_comment', array(
		'object_subtype' => 'affiliatelinks',
		'show_in_rest' => true
	));
	register_meta('post', 'old_price', array(
		'object_subtype' => 'affiliatelinks',
		'show_in_rest' => true
	));
	register_meta('post', 'new_price', array(
		'object_subtype' => 'affiliatelinks',
		'show_in_rest' => true
	));
	register_meta('post', 'link_to_buy', array(
		'object_subtype' => 'affiliatelinks',
		'show_in_rest' => true
	));
	register_meta('post', 'product_review', array(
		'object_subtype' => 'affiliatelinks',
		'show_in_rest' => true
	));
	register_meta('post', 'link_coupon', array(
		'object_subtype' => 'affiliatelinks',
		'show_in_rest' => true
	));
}
add_action('rest_api_init', 'register_affiliatelinks_meta_fields');

// register promotions img to rest api
add_action('rest_api_init', 'register_rest_images');
function register_rest_images()
{
	register_rest_field(
		array('affiliatelinks'),
		'fimg_url',
		array(
			'get_callback'    => 'get_rest_featured_image',
			'update_callback' => null,
			'schema'          => null,
		)
	);
}
function get_rest_featured_image($object, $field_name, $request)
{
	if ($object['featured_media']) {
		$img = wp_get_attachment_image_src($object['featured_media'], 'app-thumb');
		return $img[0];
	}
	return false;
}

// buy now list
function prepopulate_shoplist($field)
{
	if ($field['value'] === false) {
		$field['value'] = array(
			array(
				'field_60a8fe41ccca7' => 'Geekbuying',
				'field_60a8fe2bccca6' => '80368',
			),
			array(
				'field_60a8fe41ccca7' => 'x-kom',
				'field_60a8fe2bccca6' => '80462'
			),
			array(
				'field_60a8fe41ccca7' => 'Allegro',
				'field_60a8fe2bccca6' => '80473'
			),
			array(
				'field_60a8fe41ccca7' => 'Aliexpress',
				'field_60a8fe2bccca6' => '80469'
			),
			array(
				'field_60a8fe41ccca7' => 'Amazon',
				'field_60a8fe2bccca6' => '80477'
			),
			array(
				'field_60a8fe41ccca7' => 'Inteligentny Dom',
				'field_60a8fe2bccca6' => '80476'
			),
			array(
				'field_60a8fe41ccca7' => 'Inne',
				'field_60a8fe2bccca6' => '80479',
				'field_60aadc51546e7' => 'Kup teraz'
			),
		);
	}

	return $field;
}
add_filter('acf/prepare_field/name=shoplist', 'prepopulate_shoplist');

/** * Adds a class to all links created by Link Whisper. * @param string $classes The class string that will be added to the links. * @param bool $is_external Is the link that is being inserted pointing to a page on the current site, or is it going to an external site? * @param string $location The Link Whisper system that's inserting the link. Will be 'suggestions' if from the suggestion panels, and 'keyword' if from the Auto Linking. * @return string $classes The updated class list **/ add_filter('wpil_link_classes', 'link_whisper_link_classes', 10, 3);
function link_whisper_link_classes($classes = '', $is_external = false, $location = '')
{
	$classes .= ' bold-lw-link';
	return $classes;
}

// attach styles to admin
function admin_style()
{
	wp_enqueue_style('admin-styles', get_stylesheet_directory_uri() . '/dist/style.css',null, filemtime(get_stylesheet_directory() . '/dist/style.css'));
}
add_action('admin_enqueue_scripts', 'admin_style');
