<?php
/**
 * @package Blog_shortcodes
 * @version 1.0
 */
/*
Plugin Name: Blog shortcodes
Plugin URI: http://wordpress.org/extend/plugins/#
Description: Shortcodes for blogs
Author: Ian Paraventi
Version: 1.0
Author URI: https://venti.codes/
*/

/**
 * Add a hook for a shortcode tag
 */
function blog_shortcodes_init(){
	add_shortcode( 'get_new_posts', 'get_new_posts_cb' );
}
add_action('init', 'get_new_posts_init');

/**
 * Register new post shortcode
 *
 * @param array $atts Array of shortcode attributes
 */
function get_new_posts_cb( $atts ){

	// safely extract custom arguments and set default values
	extract( shortcode_atts(
			array(
				'numberposts'		=> 3,
				'post_type'			=> 'post',
				'year_published'	=> 1900,
				'price_min'			=> 0,
				'price_max'			=> 50
			),
			$atts,
			'get_new_posts'
		) );

	// define the array of query arguments
	$args = array(
		'numberposts'	=> $numberposts,
		'post_type'		=> $post_type,
		'tax_query'		=> array(
			array(
				'taxonomy'	=> 'book_category',
				'field'		=> 'slug',
				'terms'		=> $book_category,
			)
		),
		'meta_query'	=> array(
			'relation'		=> 'AND',
			'year_clause'	=> array(
				'key'		=> 'year_published',
				'value'		=> $year_published,
				'type'		=> 'numeric',
				'compare'	=> '>',
			),
			'price_clause'	=> array(
				'key'		=> 'price',
				'value'		=> array( $price_min, $price_max ),
				'type'		=> 'numeric',
				'compare'	=> 'BETWEEN',
			)
		),
		'orderby' => array( 'price_clause' => 'ASC' )
	);

	$custom_posts = get_posts( $args );

	if( ! empty( $custom_posts ) ){
		$output = '<ul>';
		foreach ( $custom_posts as $p ){

			$output .= '<li><a href="' 
			. get_permalink( $p->ID ) . '">' 
			. $p->post_title . '</a> (' 
			. get_post_meta( $p->ID, 'year_published', true ) 
			. ') - Price: ' . get_post_meta( $p->ID, 'price', true ) . '</li>';
		}

		$output .= '</ul>';
	}

return $output ?? '<strong>Sorry. No posts matching your criteria!</strong>';

?>

