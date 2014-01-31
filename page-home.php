<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Home
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
       
    <div id="content" class="page col-full">

    	<?php woo_main_before(); ?>
    	
		<div id="main-home" class="col-left"> 			

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
            <div class="meta-cada-post-home">
		        <div class="comments-post">
			        <?php count_comments('%'); ?>
		        </div><!-- .comments-post -->
		        
		        <div class="seta-post">
		        <a href="<?php the_permalink(); ?>"></a>
		        </div><!-- .seta-post -->
            </div><!-- .meta-cada-post-home -->

            </article><!-- .post -->
            
            <div class="excerpt-home contenthover">
                <div class="hover-home-content">
                <span class="dia"><?php the_time('d'); ?></span><span class="mes">/<?php the_date('M'); ?></span>
                <div class="autor">Por <?php the_author_posts_link(); ?></div>
                <div class="clear"></div>
					<div class="excerpt-home-content">
               		 <?php the_excerpt(); ?>
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
</div>


		<?php } } ?> 

		<?php wp_reset_query(); ?>

        
		</div><!-- /#main-home -->
		
		<?php woo_main_after(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>
