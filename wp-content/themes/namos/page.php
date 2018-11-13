<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage namos
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

<?php $sub = namos_get_option('subtitle_blog') ? namos_get_option('subtitle_blog') : ''; ?>
<!-- subheader begin -->
<div class="section padding-top-from-nav background-black">
    <div class="container">
        <!-- <div class="six columns fade-elements">
            <div class="title">
                <h3><?php //the_title(); ?></h3>
                <?php //echo htmlspecialchars_decode($sub); ?>
            </div>
        </div> -->
    </div>
</div>
<!-- subheader close -->

<div class="clearfix"></div>

<!-- content begin -->
<div class="section padding-top-bottom background-black">
    <div class="container">
        <div class="eight columns">
            <div class="blog-list full-width no-hover">
            	<?php while ( have_posts() ) : the_post(); ?>
            		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>							
						<div class="entry-content">
							<?php
								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'namos' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
						
					
				<?php endwhile; // End of the loop. ?>                	                                        
            </div>
        </div>

        <div class="four columns">   
            <div class="sidebar">                
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>
</div>
<!-- content close -->

<?php get_footer();
