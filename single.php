<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Single Post Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a post ('post' post_type).
 * @link http://codex.wordpress.org/Post_Types#Post
 *
 * @package WooFramework
 * @subpackage Template
 */
    get_header('testes');
    global $woo_options;

/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */

    $settings = array(
                    'thumb_single' => 'false',
                    'single_w' => 200,
                    'single_h' => 200,
                    'thumb_single_align' => 'alignright'
                    );

    $settings = woo_get_dynamic_values( $settings );
?>

    <div id="content" class="col-full">

        <?php woo_main_before(); ?>

        <section id="main" class="col-left">

        <?php
            if ( have_posts() ) { $count = 0;
                while ( have_posts() ) { the_post(); $count++;
        ?>
            <article <?php post_class(); ?>>

     			<?php if ( has_post_thumbnail() ) {
		        the_post_thumbnail( 'post-destak' );
		        }?>

				<div class="clear"></div>

                <div class="category-single">
                <?php
                $cada_category = get_the_category();
                if ( $cada_category ) {
                echo '<a href="' . get_category_link( $cada_category[0]->term_id ) . '" title="' . sprintf( __( "Veja todos os Artigos em %s" ), $cada_category[0]->name ) . '" ' . '>' . $cada_category[0]->name.'</a> ';
                }
                ?>
                </div><!-- .categories-post -->

                <?php echo woo_embed( 'width=580' ); ?>
                <?php if ( $settings['thumb_single'] == 'true' && ! woo_embed( '' ) ) { woo_image( 'width=' . $settings['single_w'] . '&height=' . $settings['single_h'] . '&class=thumbnail ' . $settings['thumb_single_align'] ); } ?>

                <header>

                    <h1 class="post-title"><?php the_title(); ?></h1>

				<div class="data-single">
             	    <span class="dia"><?php the_time('d'); ?></span>
					<span class="mes">/<?php the_date('M'); ?></span>
				</div>
                <div class="autor-single">Por <?php the_author_posts_link(); ?>
				</div>
				
				<div class="clear"></div>

                </header>

                <section class="entry fix">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
                </section>

            </article><!-- .post -->
            
<div class="teste"></div>


<div id="slider-single">

    <div class="anexos_carousel">
        <a class="prev" id="prev2" href="#"><span>anterior</span></a>
        <a class="next" id="next2" href="#"><span>seguinte</span></a>
        <ul id="foo2">
            <?php
        $args = array(
                'post_type' => 'attachment',
                'numberposts' => -1,
                'post_status' => null,
                'post_parent' => $post->ID,
                'orderby' => 'rand'
                );
            
            $anexos = get_posts ( $args );
            
            if ( $anexos ) {
                foreach ( $anexos as $anexo ) { ?>
                
			<?php 
                $attachment_id = $anexo->ID;
                $image_attributes = wp_get_attachment_image_src( $attachment_id, 'slider-single' );
                $attachment_page = get_attachment_link( $attachment_id ); 
            ?>
            <li>
            <a class="cada-slide-single" href="<?php echo wp_get_attachment_url( $attachment_id ); ?>" class="thickbox image">
            	<img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" alt="<?php echo apply_filters('the_title', $anexo->post_title); ?>">
            </a>
            </li>
            <?php } } ?>
        </ul>
    
        
        <div class="clearfix"></div>
        
    </div><!-- .anexos_carousel -->

</div><!-- #slider-single -->

                <?php if ( isset( $woo_options['woo_post_author'] ) && $woo_options['woo_post_author'] == 'true' ) { ?>
                
                <aside id="post-author" class="fix">
                <h3 class="title"><?php printf( esc_attr__( 'About the Author', 'woothemes' ), get_the_author() ); ?></h3>
                    <div class="profile-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), '300' ); ?></div>
                    <div class="profile-content">
                    	<span class="name-author"><?php echo get_the_author(); ?></span><br />
                        <?php the_author_meta( 'description' ); ?>
                        <div class="profile-link">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'woothemes' ), get_the_author() ); ?>
                            </a>
                        </div><!-- #profile-link    -->
                    </div><!-- .post-entries -->
                </aside><!-- .post-author-box -->
                
                <?php } ?>

                <?php woo_subscribe_connect(); ?>

            <?php
                // Determine wether or not to display comments here, based on "Theme Options".
                if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'post', 'both' ) ) ) {
                    comments_template();
                }

                } // End WHILE Loop
            } else {
        ?>
            <article <?php post_class(); ?>>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- .post -->
        <?php } ?>

        </section><!-- #main -->

        <?php woo_main_after(); ?>

        <?php get_sidebar('single'); ?>

    </div><!-- #content -->

<?php get_footer('single'); ?>
