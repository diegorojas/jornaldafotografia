<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;

	$settings = array(
				'homepage_enable_promo_message' => 'true'
				);
					
	$settings = woo_get_dynamic_values( $settings );

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

?>

</div><!-- /.wrapper -->

	<div class="sub-footer">

<div class="wrapper">

		<div class="infos">
			<p class="texto">Fotospot, a galeria online de fotografia autoral.<br />Séries limitadas de fotógrafos consagrados.</p>
	   		<a class="conheca" href="http://fotospot.com.br/">Conheça</a>
		</div><!-- infos -->
</div>

	</div><!-- .sub-footer -->

	<div class="bg-footer">

			<?php
			if ( is_home() && 'true' == $settings['homepage_enable_promo_message'] ) {
				get_template_part( 'includes/promo-message' );
			}
			?>

			<?php
			if ( ( woo_active_sidebar( 'footer-1' ) ||
					   woo_active_sidebar( 'footer-2' ) ||
					   woo_active_sidebar( 'footer-3' ) ||
					   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {
			?>




			<div class="wrapper-footer">

				<?php woo_footer_before(); ?>

				<section id="footer-widgets" class="col-full col-<?php echo $total; ?> fix">

					<?php $i = 0; while ( $i < $total ) { $i++; ?>
						<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

					<div class="block footer-widget-<?php echo $i; ?>">
						<?php woo_sidebar( 'footer-' . $i ); ?>
					</div>

						<?php } ?>
					<?php } // End WHILE Loop ?>

				</section><!-- /#footer-widgets  -->
			<?php } // End IF Statement ?>

			</div><!-- /.wrapper-footer -->

	</div><!-- .bg-footer -->

<div class="clear"></div>

<footer id="footer" class="col-full">

	<div class="footer-inner">

		<div id="copyright" class="col-left">
		<?php if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {
				echo stripslashes( $woo_options['woo_footer_left_text'] );
		} else { ?>
			<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
		<?php } ?>
		</div>

		<div id="credit" class="col-right">

	   	<?php woo_display_social_icons (); ?>
		 <?php if( isset( $woo_options['woo_footer_right'] ) && $woo_options['woo_footer_right'] == 'true' )?>
		</div>

	</div><!--/.footer-inner-->

</footer><!-- /#footer  -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-20596351-2', 'jornaldafotografia.com.br');
  ga('send', 'pageview');

</script>
</body>
</html>
