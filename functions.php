<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

    // Create new thumbnail sizes
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thumb-home', 330, 220, TRUE );
	add_image_size( 'post-destak', 750, 500, TRUE );
    add_image_size( 'highlight', 665, 665 ); //665 pixels wide by 665 pixels maximum tall, soft crop mode
    add_image_size( 'highlight-cropped', 665, 300, TRUE ); //665 pixels wide by 665 pixels maximum tall, soft crop mode
    add_image_size( 'slider-single', 700, 400, TRUE ); //665 pixels wide by 665 pixels maximum tall, soft crop mode


function count_comments() {
	global $post;
	$count_comments = wp_count_comments( $post->ID );
	echo $count_comments->approved;
}

	/*wp_enqueue_style( 'tewenty-eleven-style', get_stylesheet_directory_uri() . '/twentyeleven-style.css' );*/


		wp_enqueue_script( 'jquery.contenthover', get_stylesheet_directory_uri() . '/includes/js/jquery.contenthover.js', array( 'jquery' ) );
		wp_enqueue_script( 'custom-contenthover', get_stylesheet_directory_uri() . '/includes/js/custom-contenthover.js', array( 'jquery.contenthover' ) );
    wp_enqueue_script( 'caroufredsel', get_stylesheet_directory_uri() . '/includes/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery') );
    wp_enqueue_script( 'caroufredsel_pre', get_stylesheet_directory_uri() . '/includes/js/caroufredsel_pre.js', array('caroufredsel') );
	wp_enqueue_script( 'jquery.scroll_to', get_stylesheet_directory_uri() . '/includes/js/scroll_to.js', array('jquery') );

/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>
