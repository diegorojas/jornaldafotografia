<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options, $woocommerce;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'woothemes' ), max( $paged, $page ) );

	?></title>
<?php woo_meta(); ?>
<!-- <link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'> -->
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
<?php
wp_head();
woo_head();
?>
<script type="text/javascript">
  (function() {
    var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
    po.src = "https://apis.google.com/js/plusone.js?publisherid=101664924913134585833";
    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</head>
<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div class="wrapper">

    <?php woo_header_before(); ?>

	<header id="header" class="col-full">
		<?php woo_header_inside(); ?>

	    <div class="hgroup">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                
			<span class="nav-toggle"><a href="#navigation"><span><?php _e( 'Navigation', 'woothemes' ); ?></span></a></span>
		</div>

		<div class="header-direita">		
				<nav class="cart" id="logo-header">
                    <a href="http://www.fotospot.com.br"><img src="<?php bloginfo( 'stylesheet_directory' ); echo '/images/logo-fotospot-75px-transparent.png'; ?>" title="Fotospot - Fotografia Autoral" alt="Fotospot - Fotografia Autoral"></a>
                </nav>
		</div>

        <?php woo_nav_before(); ?>

	</header><!-- /#header -->

</div><!--/.wrapper-->

<nav id="navigation" class="col-full" role="navigation">

	<div class="main-nav-inner">

		<?php
		if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
			wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) );
		} else {
		?>
	    <ul id="main-nav" class="nav">
			<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
			<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
			<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
		</ul><!-- /#nav -->
	    <?php } ?>

	    <?php woo_nav_after(); ?>

	</div><!--/.main-nav-inner-->

</nav><!-- /#navigation -->

<?php woo_content_before(); ?>

<div class="wrapper">
