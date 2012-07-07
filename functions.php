<?php

// remove links/menus from the admin bar
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('my-account');
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

//Adds thumbnail support
add_theme_support( 'post-thumbnails' ); 

//title of site's function
function pagetitle() {
	if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' | '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
}


//meta description for comics
function story_description() {
  $termDiscription = term_description( '', get_query_var( 'taxonomy' ) );
  if($termDiscription != '') : 
  $termDiscription = strip_tags($termDiscription); 
  echo $termDiscription;
  endif;
}

//Delete image attributes
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
// Genesis framework only
add_filter( 'genesis_get_image', 'remove_thumbnail_dimensions', 10 );
// Removes attached image sizes as well
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

//Image for Open Graph
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	if(empty($first_img)){
			//Defines a default image
			$first_img = bloginfo('stylesheet_directory')."/images/avatar.png";
		}
	return $first_img;
}

//Add comics post type
add_action('init', 'comics_init');
function comics_init() {
	
	//Labels for dashboard
	$comic_labels = array(
	'name' => _x('Comics', 'post type general name'),
	'singular_name' => _x('Comic', 'post type singular name'),
	'all_items' => __('All comics pages'),
	'add_new' => _x('Add new comics page', 'comics'),
	'add_new_item' => __('Add new comics page'),
	'edit_item' => __('Edit comics page'),
	'view_item' => __('View comics page'),
	'search_items' => __('Search in comics pages'),
	'not_found' => __('No comics pages found'),
	'not_found_in_trash' => __('No comics pages found in trash'),
	'parent_item_colon' => ''
	);
	
	//Comics on dashboard
	$args = array(
	'description' => __( 'The comics site of Harry Pujols.' ),
	'labels' => $comic_labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'query_var' => true,
	'exclude_from_search' => false,
	'capability_type' => 'post',
	'hierarchical' => true,
	'menu_position' => 20,
	'menu_icon' => get_stylesheet_directory_uri() . '/images/comics-icon.png',
	'rewrite' => true,
	'supports' => array('title', 'editor', 'thumbnail')
	);
	register_post_type('pages', $args);
}

	//Comics folders
add_action('init', 'comics_stories', 0);

function comics_stories() {
	
	//labels for comics category
	$story_labels = array(
	'name' => _x('Comics', 'taxonomy general name'),
	'singular_name' => _x('Comic', 'taxonomy singular name'),
	'search_items' => __('Search in comics'),
	'all_items' => __('All comics'),
	'most_used_items' => null,
	'parent_item' => null,
	'parent_item_colon' => null,
	'edit_item' => __('Edit comic'),
	'update_item' => __('Update comic'),
	'add_new_item' => _('Add a new comic'),
	'new_item_name' => __('New comic'),
	'menu_name' => __('Comics')
	);
	
	//Custom comics category
	register_taxonomy('comics', 'pages', array(
	'hierarchical' => true,
	'labels' => $story_labels,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => true,
	));
}
//register sidebar widgets
if ( function_exists('register_sidebars') )
  register_sidebars(array( 
	'name' => 'Sidebar Widgets' 
	)
  );
	
?>