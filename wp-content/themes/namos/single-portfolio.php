<?php
/**
 * The template for displaying all single porfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage namos
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

	<?php if (have_posts()){ ?>
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php }else {
		_e('Page Canvas For Page Builder', 'namos'); 
	}?>

<div class="section padding-bottom background-black">					
	<div class="container">
		<div class="twelve columns pagination-full">	
			<div class="project-nav-wrap">
				<div class="six columns right-align"><?php echo previous_post_link('%link', __('<div class="left-nav">prev<div class="text-on-hover">%title</div></div>', 'namos'), $post->max_num_pages); ?></div>
				<div class="six columns left-align"><?php echo next_post_link('%link', __('<div class="right-nav">next<div class="text-on-hover">%title</div></div>', 'namos'), $post->max_num_pages); ?></div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>	
