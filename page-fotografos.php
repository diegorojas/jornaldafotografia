<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
Template Name: Fot&oacute;grafos
*/
	get_header();
?>
       
    <div id="content" class="page col-full">
    
    	<?php woo_main_before(); ?>
    	
		<section id="main" class="col-left nocachedynamic"> 			

        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                  
                
                <?php
                // BEGIN - CLB - 2013/08/08 - Conditional content by referrer
                    $referer_parse = parse_url($_SERVER['HTTP_REFERER']); 
                    if(strpos($referer_parse['host'], 'list-manage.')!==false)  
                    { ?>                         
            <article <?php post_class(); ?>>
				
				<header>
			    	<h1><?php the_title(); ?></h1>
				</header>
				
                <section class="entry">
                    
                	<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
               	</section><!-- /.entry -->

				<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
                
            </article><!-- /.post -->
            
            <?php
            	// Determine wether or not to display comments here, based on "Theme Options".
            	if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) ) {
            		comments_template();
            	};
                    }
                    else { ?>                      
            <article <?php post_class(); ?>>
                
                <header>
                    <h1>Esta p&aacute;gina &eacute; reservada</h1>
                </header>
                
                <section class="entry">
                    
                    <p>O conte&uacute;do desta p&aacute;gina s&oacute; pode ser acessado por quem recebeu o link via e-mail.</p>
                    <p>Se voc&ecirc; chegou aqui atrav&eacute;s de algum e-mail nosso e tem certeza que clicou no link correto, por favor, entre em contato pelo e-mail info@fotospot.com.br</p>
                </section><!-- /.entry -->

                <?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
                
            </article><!-- /.post -->
                        
                        
                        
                    <?php }; // END - CLB - 2013/08/08 - Conditional content by referrer

				} // End WHILE Loop
			} else {
		?>
			<article <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
        <?php } // End IF Statement ?>  
        
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>