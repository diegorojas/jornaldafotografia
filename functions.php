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
    add_image_size( 'highlight', 665, 665, FALSE ); //665 pixels wide by 665 pixels maximum tall, soft crop mode
    add_image_size( 'highlight-cropped', 665, 300, TRUE ); //665 pixels wide by 665 pixels maximum tall, soft crop mode


function count_comments() {
	global $post;
	$count_comments = wp_count_comments( $post->ID );
	echo $count_comments->approved;
}

	/*wp_enqueue_style( 'tewenty-eleven-style', get_stylesheet_directory_uri() . '/twentyeleven-style.css' );*/


		wp_enqueue_script( 'jquery.contenthover', get_stylesheet_directory_uri() . '/includes/js/jquery.contenthover.js', array( 'jquery' ) );
		wp_enqueue_script( 'custom-contenthover', get_stylesheet_directory_uri() . '/includes/js/custom-contenthover.js', array( 'jquery.contenthover' ) );


/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>