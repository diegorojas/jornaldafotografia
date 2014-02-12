<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Home Flip
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header('testes');
	global $woo_options;
?>
       
    	<?php woo_main_before(); ?>
    	
		<div id="main-home" class="col-full"> 			

        <?php

		$query_args = array(
			'post_type' => 'post', 
			'posts_per_page' => 9, 
			'paged' => $paged,
			);

		query_posts( $query_args );
		
		if ( have_posts() ) {
			$count = 0;
			while ( have_posts() ) { the_post(); $count++; ?>


<div class="cada-post-home">

		<div id="post_card" class="shadow">
		 
		 <div class="card">
				<article <?php post_class('content-cada-post-home'); ?>>
		        
		        <div class="thumb">
		        <?php if ( has_post_thumbnail() ) {
		        the_post_thumbnail( 'thumb-home' );
		        } else { ?>
		        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thumb-home-default.jpg" alt="<?php the_title(); ?>" />
		        <?php } ?>
		        </div><!-- .thumb -->
		        
		        <header>
		        <h3><?php the_title(); ?></h3>
		        </header>
				<div class="clear"></div>

		        <div class="meta-cada-post-home">
				    <div class="comments-post">
					    <?php count_comments('%'); ?>
				    </div><!-- .comments-post -->
				    
				    <div class="seta-post">
				    <a href="<?php the_permalink(); ?>"></a>
				    </div><!-- .seta-post -->
		        </div><!-- .meta-cada-post-home -->

		        </article><!-- .post -->
		 </div> <!-- front face -->
	  	
		 <div class="fundo card">
            <div class="excerpt-home contenthover">
                <div class="hover-home-content">
                <a href="<?php the_permalink(); ?>"><span class="dia"><?php the_time('d'); ?></span><span class="mes">/<?php the_date('M'); ?></span></a>
                <div class="autor">Por <?php the_author_posts_link(); ?></div>
                <div class="clear"></div>
					<div class="excerpt-home-content">
					<a href="<?php the_permalink(); ?>">
               		 <?php the_excerpt(); ?>
					</a>
					</div>
                <div class="categories-post">
                <?php
                $cada_category = get_the_category();
                if ( $cada_category ) {
                echo '<a href="' . get_category_link( $cada_category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $cada_category[0]->name ) . '" ' . '>' . $cada_category[0]->name.'</a> ';
                }
                ?>
                </div><!-- .categories-post -->
                <div class="mais">
                <a href="<?php the_permalink(); ?>"></a>
                </div><!-- .mais -->
				</div><!-- .hover-home-content -->
                
            </div><!-- /.excerpt-home -->

	  </div> <!-- back face center -->

	 </div><!-- post_card --> 

</div><!-- /cada-post-home -->


		<?php } } ?> 

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php global $wp_query;  
		$total_pages = $wp_query->max_num_pages;  
		if ($total_pages > 1){  
		  $current_page = max(1, get_query_var('paged'));  
		  echo '<div class="page-nav-brasa">';  
		  echo paginate_links(array(  
			  'base' => get_pagenum_link(1) . '%_%',  
			  'format' => 'page/%#%',  
			  'current' => $current_page,  
			  'total' => $total_pages,  
			  'prev_text' => '<< Anteriores',  
			  'next_text' => 'Pr&oacute;ximos >>'  
			));  
		  echo '</div>';  
		} 
		?>

		<?php wp_reset_query(); ?>

<!-- TESTE DO FLIP PARA CHROME -->

	<div id="sidebarcontent">

		<div id="fixedscrollbox">

			Sidebar fixed content
		</div>

	</div>

	<div id="right">

		This is the text of the main part of the page.

	</div>



<!--  <div id="f1_container">
<div id="f1_card" class="shadow">
  <div class="front face">
  </div>
  <div class="back face center">
    <p>Construções, chaminés, crianças brincando em meio às linhas retas de uma cidade que já dava sinais de que seria uma das maiores metrópoles do mundo. Esta São Paulo moderna, que nascia com a industrialização e a ocupação dos espaços por edifícios altos, pontes e viadutos, passou pelas lentes de fotógrafos que, no mesmo passo, também modernizavam sua estética.</p>
  </div>
</div>
</div>

<p></p>

<p align="center"> Para visualizar o Demo de onde tiramos o código <a href="http://css3.bradshawenterprises.com/flip/" target="_blank">acesse aqui</a></p>

FIM DO TESTE DO FLIP PARA CHROME -->

       
		</div><!-- /#main-home -->

		<?php woo_main_after(); ?>

		
<?php get_footer(); ?>
