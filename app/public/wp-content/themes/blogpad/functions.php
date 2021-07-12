<?php
////////////////////////////// SCRIPTS / STYLE / FONTS ///////////////////////
// Add scripts and stylesheets
function blogpad_scripts() {
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
	wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js' );
    wp_enqueue_script( 'blog', get_template_directory_uri() . '/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'blogpad_scripts' );

// Add Google Fonts
function blogpad_google_fonts() {
	wp_register_style('Red Hat Display', 'https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700&display=swap');
	wp_enqueue_style( 'Red Hat Display');
}
add_action('wp_print_styles', 'blogpad_google_fonts');
/////////////////////////////////////////////////////////////////////////////////

////////////////////////////// ENABLE WP FEATURES ///////////////////////
// Add support for WordPress Titles
add_theme_support( 'title-tag' );
// Add support for featured image on posts
add_theme_support( 'post-thumbnails' );
//////////////////////////////////////////////////////////////////////////

//////////////////////////////////// NAVBAR WALKER /////////////////////////////////
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'blogpad' ),
) );

////////////////////////////// CUSTOM SETTINGS PAGE ///////////////////////
// Custom settings
function custom_settings_add_menu() {
	add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
	<div class="wrap">
		<h1>Custom Settings</h1>
		<form method="post" action="options.php">
				<?php
                settings_fields( 'section' );
                do_settings_sections( 'theme-options' );
                submit_button();
				?>
		</form>
	</div>
<?php }

// Create an input field for Twitter
function setting_facebook() { ?>
	<input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
<?php }
// Create an input field for Twitter
function setting_twitter() { ?>
	<input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }
// Create an input field for Instagram
function setting_insta() { ?>
	<input type="text" name="insta" id="insta" value="<?php echo get_option('insta'); ?>" />
<?php }
// Create an input field for LinkedIn
function setting_linkedin() { ?>
	<input type="text" name="linkedin" id="linkedin" value="<?php echo get_option('linkedin'); ?>" />
<?php }
// Show, accept and save the option fields
function custom_settings_page_setup() {
	add_settings_section( 'section', 'All Settings', null, 'theme-options' );
	add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section' );
	add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
    add_settings_field( 'insta', 'Instagram URL', 'setting_insta', 'theme-options', 'section' );
    add_settings_field( 'linkedin', 'Linkedin URL', 'setting_linkedin', 'theme-options', 'section' );

    register_setting('section', 'facebook');
	register_setting('section', 'twitter');
	register_setting('section', 'insta');
    register_setting('section', 'linkedin');
}
add_action( 'admin_init', 'custom_settings_page_setup' );
/////////////////////////////////////////////////////////////////////////

///////////////////////////// Custom Post Type //////////////////////////
function create_my_custom_post() {
	register_post_type( 'my-custom-post',
			array(
			'labels' => array(
	'name' => __( 'My Custom Post' ),
	'singular_name' => __( 'My Custom Post' ),
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
	'title',
	'editor',
	'thumbnail',
	'custom-fields'
			)
	));
}
add_action( 'init', 'create_my_custom_post' );
//////////////////////////////////////////////////////////////////////////

////////////////////////////// POST VIEWS FUNCTION ///////////////////////
// Every time a user visits the post, the custom field will be updated
function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

// Detect post view counts and store it as a custom field for each post
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Retrieve views for the post
function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
/////////////////////////////////////////////////////////////////////////////////


// Retrieve profile picture from URL using authors name
function get_profile_pic($authorName){
    $pictureURL = "https://source.boringavatars.com/beam/120/". $authorName ."?colors=3858f6,d7263d,02182b,68c5db,ffba49";
    return $pictureURL;
}


?>