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


	<div id="compartilhe-sidebar" class="widget">
		<h2>Compartilhe</h2>
		<div class="compartilhe-sidebar-facebook">
		<a class="a-compartilhe" href="<?php the_permalink() ?>?share=facebook&nb=1" target="_blank"></a>
		</div><!-- .compartilhe-sidebar-facebook -->
		<div class="compartilhe-sidebar-twitter">
		<a class="a-compartilhe" href="<?php the_permalink() ?>?share=facebook&nb=1" target="_blank"></a>
		</div><!-- .compartilhe-sidebar-twitter -->
		<div class="compartilhe-sidebar-email">
		<a class="a-compartilhe" href="#" target="_blank"></a>
		</div><!-- .compartilhe-sidebar-email -->
	</div><!-- #compartilhe-sidebar -->
	
	<div id="outros-projetos" class="widget">
		
			<h2>Leia outro artigo:</h2>
				
		<div class="outros-slider">
		
			<div class="list_carousel">
				<ul id="foo3">
					<?php
					$esse_id = array(get_the_ID());
					$query = new WP_Query( array( 'post_type' => 'post', 'orderby' => 'ASC', 'post__not_in' => $esse_id ) );

					if ( $query->have_posts() ) : ?>
						   <?php while ( $query->have_posts() ) : $query->the_post(); ?> 				
					<li>
                    <a class="a-outro" href="<?php the_permalink(); ?>">
						<div class="cada-outro-projeto">

							 <div class="thumb-outro-projeto">
								<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'thumb-home' );
								} else { ?>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thumb-home-default.jpg" alt="<?php the_title(); ?>" />
								<?php } ?>
							</div><!-- .thumb-outro-projeto -->
		                    
						</div><!-- .cada-outro-projeto -->
					<div class="titulo-outros-projetos">
					 <?php the_title(); ?><br />
					</div><!-- .titulo-outros-projetos -->
                    </a><!-- .a-outro  -->		
					</li>
				   <?php endwhile; wp_reset_postdata(); ?>
				   <!-- show pagination here -->
					<?php else : ?>
						   <!-- show 404 error here -->
					<?php endif; ?>
				</ul>

			<div class="setas-outros">
			<a id="prev3" href="#">
			<div class="seta-outros-anteriores"><< Anterior </div>
			</a>
			<!-- .seta-outros-anteriores -->
			<a id="next3" href="#">
			<div class="seta-outros-posteriores">Proximo >></div>
			</a><!-- .seta-outros-posteriores -->
			</div><!-- setas-outros -->
				
				<?php wp_reset_query(); // reset query ?>
					
			</div> <!-- .list_carrousel -->

		</div><!-- .outros-slider -->
						
	</div><!-- #outros-projetos -->


	<div id="navegue-no-post" class="widget">
		
			<h2>Navegue neste artigo</h2>

		<ul class="links-nav-post">
			<a href="javascript:scroll_to('#header');"><li>Topo</li></a>
			<a href="javascript:scroll_to('iframe');"><li>Vídeo</li></a>
			<a href="javascript:scroll_to('.gallery');"><li>Galeria de Fotos</li></a>
			<a href="javascript:scroll_to('#post-author');"><li>Sobre o Autor</li></a>
			<a href="javascript:scroll_to('#comments');"><li>Comentários</li></a>
		</ul>
				
	</div>

	<?php woo_sidebar_inside_before(); ?>

	<?php if ( woo_active_sidebar( 'primary' ) ) { ?>
    <div class="primary">
		<?php woo_sidebar( 'primary' ); ?>		           
	</div>        
	<?php } // End IF Statement ?>  
	<?php woo_sidebar_inside_after(); ?> 
	
</aside><!-- /#sidebar -->
<?php } // End IF Statement ?>
	
