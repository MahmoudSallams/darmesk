<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage namos
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<!-- subheader begin -->
<div class="section padding-top-from-nav background-black">
    <div class="container">
        <div class="six columns fade-elements">
            <div class="title">
                <h3 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'namos' ); ?></h3>
            </div>
        </div>
    </div>
</div>
<!-- subheader close -->

<div class="clearfix"></div>

<!-- content begin -->
<div class="section padding-top-bottom background-black">
    <div class="container">      	
        <div class="eight columns">
            <div class="post-wrapper">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'namos' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
        </div>       
    </div>
</div>
<!-- content close -->

<?php get_footer();
