<?php
/**
 * Template Name: Blog
 */
get_header(); ?>
<?php $sub = namos_get_option('subtitle_blog') ? namos_get_option('subtitle_blog') : ''; ?>
<!-- subheader begin -->
<div class="section padding-top-from-nav background-black">
    <div class="container">
        <div class="six columns fade-elements">
            <div class="title">
                <h3><?php the_title(); ?></h3>
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

        <?php if(have_posts()) : ?>  
            <?php 
                $args = array(    
                  'paged' => $paged,
                  'post_type' => 'post',
                );
                $wp_query = new WP_Query($args);
                while ($wp_query -> have_posts()): $wp_query -> the_post();                         
                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/post/content', get_post_format() );
            ?> 
        <?php endwhile;?>         
        <?php else: ?>
            <h1><?php esc_html_e('Nothing Found Here!', 'namos'); ?></h1>
        <?php endif; ?>        

        <div class="twelve columns padding-top-small" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
            <?php namos_pagination(); ?>
        </div>

    </div>
</div>
<!-- content close -->

<?php get_footer(); ?>