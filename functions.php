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
    add_image_size( 'highlight', 665, 665, FALSE ); //665 pixels wide by 665 pixels maximum tall, soft crop mode
    add_image_size( 'highlight-cropped', 665, 300, TRUE ); //665 pixels wide by 665 pixels maximum tall, soft crop mode

/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>