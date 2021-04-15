<?php

/* ==========================================================================
   IMAGE CONTROL
   ========================================================================== */
// Enable theme support for post thumbnails
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
       // set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
}

if ( function_exists( 'add_image_size' ) ) {
	// Examples:
	// 	1. add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	// 	2. add_image_size( 'homepage-thumb', 220, 180, true ); //(cropped)
	add_image_size( 'post-full', 940, 310 );
	add_image_size( 'post-full-medium', 645, 213 );
	add_image_size( 'post-full-mobile', 414, 137 );
	add_image_size( 'post-floated', 500, 375 );
	add_image_size( 'post-floated-mobile', 325, 244 );
	add_image_size( 'project-thumb', 405, 340, true );
}

add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );
function custom_image_sizes_choose( $sizes ) {
	$custom_sizes = array(
		'project-thumb' => 'Project Thumb',
		'post-full' => 'Post Full',
		'post-full-medium' => 'Post Full Medium',
		'post-full-mobile' => 'Post Full Mobile',
		'post-floated' => 'Post Floated',
		'post-mobile' => 'Post Mobile'
	);
	return array_merge( $sizes, $custom_sizes );
}



// Remove Width and Height Attributes From Inserted Images
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );




/* ==========================================================================
   ACTIONS
   ========================================================================== */
// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');




/* ==========================================================================
   FILTERS
   ========================================================================== */
// Enables additional visual-editor buttons (when enabled)
function additional_editor_buttons($buttons) {
  $buttons[] = 'hr';
  $buttons[] = 'sub';
  $buttons[] = 'sup';
  $buttons[] = 'fontselect';
  $buttons[] = 'fontsizeselect';
  $buttons[] = 'cleanup';
  $buttons[] = 'styleselect';
  return $buttons;
}
add_filter("mce_buttons_3", "additional_editor_buttons");

// Disable auto formatting paragraphs in editor
remove_filter('the_content','wpautop');

// If visual editor is enabled, HTML editor will still be default
// add_filter('wp_default_editor', create_function('', 'return "html";'));




/* ==========================================================================
   Widgets
   ========================================================================== */
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar Widgets',
		'id'   => 'sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));

	register_sidebar(array(
		'name' => 'Footer One',
		'id'   => 'footer-one',
		'description'   => 'These are widgets for the first footer section.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Footer Two',
		'id'   => 'footer-two',
		'description'   => 'These are widgets for the middle footer section.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Footer Three',
		'id'   => 'footer-three',
		'description'   => 'These are widgets for the last footer section.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
}




/* ==========================================================================
   SHORTCODES
   ========================================================================== */
// Adds Base URL dynamically in editor
function show_base_url() {
	return get_bloginfo('url');
}
add_shortcode('base_url', 'show_base_url');




/* ==========================================================================
   FEEDBURNER REDIRECTS
   ========================================================================== */
function custom_feed_link($output, $feed) {
		$feed_url = 'http://feeds.feedburner.com/CupOfVoodoo';
		$feed_array = array(
		'rss' => $feed_url,
		'rss2' => $feed_url,
		'atom' => $feed_url,
		'rdf' => $feed_url,
		'comments_rss2' => ''
	);
	$feed_array[$feed] = $feed_url;
	$output = $feed_array[$feed];
	return $output;
}
add_filter('feed_link','custom_feed_link', 1, 2);




/* ==========================================================================
   MISC FUNCTIONS
   ========================================================================== */
// Add RSS links to <head> section
add_theme_support( 'automatic-feed-links' );

?>