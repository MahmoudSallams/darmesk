<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage namos
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>


<?php
if(ICL_LANGUAGE_CODE == 'ar'){
?>
<script>
jQuery(function(){

jQuery('a .right-nav:contains("next")').text('التالى');
jQuery('a .left-nav:contains("prev")').text('السابق');

});
</script>

<?php } ?>

</head>
<body <?php body_class(); ?>>

<?php 
    if(namos_get_option('header_layout') =='2' ){
        get_template_part('framework/headers/header2');
    }else{      
?>
    <nav id="menu-wrap" class="menu-back cbp-af-header">
        <div class="container header-con">
            <div class="twelve columns">
                <div class="menu menu-onepage">
                    <a href="<?php echo esc_url( home_url('/') ); ?>">
                        <div class="logo">
                            <img src="<?php echo esc_url( namos_get_option( 'logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-1">
                        </div>
                    </a>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb'    => false, 'container' => '', 'menu_id' => 'mainmenu' ) ); ?>
                </div>
            </div>
        </div>
    </nav>
<?php } ?>
	