<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage namos
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

<!-- subheader begin -->
<div class="section padding-top-from-nav background-black">
	<div class="container">
		<div class="six columns fade-elements">
			<div class="title">
				<h3><?php the_title(); ?></h3>
				<?php 
					/* Start the Loop */
					while ( have_posts() ) : the_post(); 
				?>
					<ul class="list">
						<li><strong><?php esc_html_e('by ','namos'); ?> <?php the_author(); ?> </strong></li>
						<li><strong><?php namos_entry_meta(); ?></strong></li>
					</ul>
				<?php endwhile; // End of the loop. ?>      
			</div>
		</div>
	</div>
</div>
<!-- subheader close -->

<div class="clearfix"></div>

<!-- content begin -->
<div class="section padding-top-bottom background-black <?php echo esc_attr( namos_get_option('single_layout') ); ?>">
	<div class="container">
        <?php if(namos_get_option('single_layout')!= 'no-bar'){ ?>
	        <div class="four columns">   
	            <div class="sidebar">                
	                <?php get_sidebar(); ?>
	            </div>
	        </div>
        <?php } ?>
	    <div class="eight columns">
	    	<div class="post-wrapper">
				<?php 
					/* Start the Loop */
					while ( have_posts() ) : the_post(); 
				?>
		                <div class="preview">	    
		                	<?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true); ?>
		                    <?php if ( 'audio' == get_post_format() ) { ?>
		                    	<div class="post-audio">
						            <iframe style="width:100%;border:none;" height="150" scrolling="no" src="<?php echo esc_url( $link_audio ); ?>"></iframe>
						        </div> 
		                    <?php }elseif ( 'gallery' == get_post_format() ) { ?>
		                    	<div id="owl-blog-slider" class="owl-carousel owl-theme">
						            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
						              <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
						              <?php if($images){ ?>                  
						                  <?php foreach ( $images as $image ) { ?>
						                    <?php $img = $image['full_url']; ?>
						                    <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div> 
						                  <?php } ?>                                     
						              <?php } ?>
						            <?php } ?>
						        </div>		                    
		                    <?php }elseif ( 'video' == get_post_format() ) { ?>
		                    	<div class="post-video">
						            <?php echo rwmb_meta( '_cmb_link_video', 'type=oembed' ); ?>        
						        </div>
		                    <?php }elseif ( 'image' == get_post_format() ) { ?>
		                    	<div class="post-image">
						            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
						                <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
						                <?php if($images != ''){ ?>              
						                    <?php  foreach ( $images as $image ) {  ?>
						                        <?php $img = $image['full_url']; ?>
						                        <img src="<?php echo esc_url($img); ?>" alt="">
						                    <?php } ?>                
						                <?php }else{ ?>
						                    <?php 
						                        if( has_post_thumbnail() ){               
						                             the_post_thumbnail( 'full' ); 
						                        } 
						                    ?>
						                <?php } ?>
						            <?php } ?>
						        </div>   
		                    <?php }else{ ?>              	
		                    	<div class="post-image">						            
				                    <?php 
				                        if( has_post_thumbnail() ){               
				                             the_post_thumbnail( 'full' ); 
				                        } 
				                    ?>
						        </div> 
		                    <?php } ?>

		                    <?php the_content(); ?>

		                </div>
		       	<?php endwhile; // End of the loop. ?>     
	       	</div>
			<?php 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
	    </div>       	   	
	</div>
</div>
<!-- content close -->

<?php get_footer();
