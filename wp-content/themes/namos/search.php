<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
        <div class="six columns fade-elements">
            <div class="title">
                <?php if ( have_posts() ) : ?>
                    <h3><?php printf( esc_html__( 'Search Results for: %s', 'namos' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
                <?php else : ?>
                    <h3><?php esc_html_e( 'Nothing Found', 'namos' ); ?></h3>
                <?php endif; ?>
                <?php echo htmlspecialchars_decode($sub); ?>
            </div>
        </div>
    </div>
</div>
<!-- subheader close -->

<div class="clearfix"></div>

<!-- content begin -->
<div class="section padding-top-bottom background-black <?php echo esc_attr( namos_get_option('blog_layout') ); ?>">
    <div class="container">
    
        <?php if(namos_get_option('blog_layout')!= 'no-bar'){ ?>
            <div class="four columns">   
                <div class="sidebar">                
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php } ?>

       	<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile; // End of the loop.

			else : ?>

				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'namos' ); ?></p>
				
				<?php get_search_form(); ?>

		<?php endif; ?>  

        <div class="twelve columns padding-top-small" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
            <?php namos_pagination(); ?>
        </div>

    </div>
</div>
<!-- content close -->

<?php get_footer();
