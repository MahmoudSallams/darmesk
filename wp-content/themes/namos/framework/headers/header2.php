<?php global $namos_option; ?>

<div class="cd-nav-container" id="cd-nav">
    <header>
        <a href="#0" class="cd-close-nav"><?php esc_html_e('Close','namos'); ?></a>
    </header>
    <div class="cd-nav">
        <nav class="menu menu--mohe">
            <?php
                $primary = array(
                    'theme_location'  => 'primary',
                    'menu'            => '',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => '',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker(),
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul>%3$s</ul>',
                    'depth'           => 0,
                );
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( $primary );
                }
            ?> 
        </nav>
    </div>
    <?php if ( namos_get_option('social_switch') != false ){  ?>
    <ul class="nav-social">
        <?php $socials = namos_get_option( 'header_socials', array() ); ?>
        <?php foreach ( $socials as $social ) { ?>                                  
            <li><a target="_blank" class="<?php echo esc_attr($social['social_icon']); ?>" href="<?php echo esc_url($social['social_link']); ?>"><?php echo esc_attr($social['social_name']); ?></a></li>                            
        <?php } ?> 
    </ul>
    <?php } ?>
</div>
<div class="cd-overlay"><!-- shadow layer visible when navigation is visible --></div>
<nav id="menu-wrap" class="menu-back cbp-af-header">
    <div class="container header-con">
        <div class="twelve columns">
            <div class="menu">
                <a href="<?php echo esc_url( home_url('/') ); ?>">
                    <div class="logo">
                        <img src="<?php echo esc_url( namos_get_option( 'logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-1">
                    </div>
                </a>
                <a href="#cd-nav" class="cd-nav-trigger">
                    <?php esc_html_e('Menu','namos'); ?><span><!-- used to create the menu icon --></span>
                </a> <!-- .cd-nav-trigger -->
                <a href="#" id="search-action"><i class="fa fa-search"></i></a>
            </div>
        </div>
    </div>
</nav>
<div id="breadandsearch">
<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs" > ','</p>');
} ?>

    <?php dynamic_sidebar( 'sidebar-1' ); ?>
<div class="clear"></div>
</div>
<script>
jQuery('#search-action').click(function(){
    jQuery("#search-4").slideToggle();
    jQuery('#search').focus();
})
    
</script>
