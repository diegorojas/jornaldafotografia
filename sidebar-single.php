<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * Sidebar Single Template
 *
 * Display in the single sidebar.
 *
 * @package WooFramework
 * @subpackage JornaldaFotografia
 */
	global $woo_options;
	
	if ( isset( $woo_options['woo_layout'] ) && ( $woo_options['woo_layout'] != 'layout-full' ) ) {
?>	
<aside id="sidebar" class="col-right">

	<div class="compartilhe-sidebar">
	<h2 class="fonte-roxa">compartilhe!</h2>
	<div class="compartilhe-sidebar-facebook">
	<a class="a-compartilhe" href="<?php the_permalink() ?>?share=facebook&nb=1" target="_blank"></a>
	</div><!-- .compartilhe-sidebar-facebook -->
	<div class="compartilhe-sidebar-email">
	<a class="a-compartilhe" href="mailto:<?php echo get_option( 'mo_email' ); ?>" target="_blank"></a>
	</div><!-- .compartilhe-sidebar-email -->
	<div class="">
	</div><!--  -->
	</div><!-- .compartilhe-sidebar -->
	
	<div class="outros-projetos">
		
			<h2 class="fonte-roxa">outros projetos:</h2>
			<div class="setas-outros">
			<a id="prev3" href="#"><div class="seta-outros-anteriores">
			</div></a>
			<!-- .seta-outros-anteriores -->
			<a id="next3" href="#"><div class="seta-outros-posteriores">
			</div></a><!-- .seta-outros-posteriores -->
			</div><!-- setas-outros -->
		
		<div class="outros-slider">
		
			<div class="list_carousel">
				<ul id="foo3">
					<?php
					$esse_id = array(get_the_ID());
					$query = new WP_Query( array( 'post_type' => 'posts', 'orderby' => 'rand', 'post__not_in' => $esse_id ) );

					if ( $query->have_posts() ) : ?>
						   <?php while ( $query->have_posts() ) : $query->the_post(); ?> 				
					<li>
                    <a class="a-outro" href="<?php the_permalink(); ?>">
					<div class="cada-outro-projeto">

					 <div class="thumb">
						<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'thumb-home' );
						} else { ?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thumb-home-default.jpg" alt="<?php the_title(); ?>" />
						<?php } ?>
					</div><!-- .thumb -->
                        
					</div><!-- .cada-outro-projeto -->
					<div class="titulo-outros-projetos">
					 <?php the_title(); ?><br />
								<?php
								// Pega os dados e salva em variáveis
								$metaportfolio_2alinhatitulo = get_post_meta($post->ID,'metaportfolio_2alinhatitulo',TRUE);
								?>
								<?php if (empty($metaportfolio_2alinhatitulo)) {
								} else { ?>
									  <?php echo $metaportfolio_2alinhatitulo; ?>
								<?php }	?>
					<span class="data-cada-outro-projeto"><?php the_time( 'Y' ); ?></span>
					</div><!-- .titulo-outros-projetos -->
                    </a><!-- .a-outro  -->		
					</li>
				   <?php endwhile; wp_reset_postdata(); ?>
				   <!-- show pagination here -->
					<?php else : ?>
						   <!-- show 404 error here -->
					<?php endif; ?>
				</ul>
				
				<?php wp_reset_query(); // reset query ?>
				<div class="clearfix"></div>
					
			</div> <!-- .list_carrousel -->
					

		</div><!-- .outros-slider -->
		
	</div><!-- .outros-projetos -->

	<?php woo_sidebar_inside_before(); ?>

	<?php if ( woo_active_sidebar( 'primary' ) ) { ?>
    <div class="primary">
		<?php woo_sidebar( 'primary' ); ?>		           
	</div>        
	<?php } // End IF Statement ?>  
	<?php woo_sidebar_inside_after(); ?> 
	
</aside><!-- /#sidebar -->
<?php } // End IF Statement ?>
	
