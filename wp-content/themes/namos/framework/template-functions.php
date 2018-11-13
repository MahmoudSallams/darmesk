<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage namos
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Namos 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function namos_body_classes( $classes ) {

	// Add a class if there is a custom header.

	if ( namos_get_option('preload') != false ){
		$classes[] = 'royal_preloader';
	}
	
	return $classes;
}
add_filter( 'body_class', 'namos_body_classes' );


//Code Visual Composer.
// Add new Param in Row
if(function_exists('vc_add_param')){
	vc_add_param(
		'vc_row',
		array(
			"type" => "dropdown",
			"heading" => esc_html__('Setup Full width For Row', 'namos'),
			"param_name" => "fullwidth",
			"value" => array(   
			                esc_html__('No', 'namos') => 'no',  
			                esc_html__('Yes', 'namos') => 'yes',                                                                                
			              ),
			"description" => esc_html__("Select Full width for row : yes or not, Default: No fullwidth", 'namos'),      
        )
    );    
	vc_add_param('vc_row',array(
	                              "type" => "checkbox",
	                              "heading" => esc_html__('Use Background Image Parallax', 'namos'),
	                              "param_name" => "parallax_bg",
	                              "value" => '',
	                              "description" => esc_html__("If checked columns will use background parallax.", "namos"),      
	                            ) 
	    );
	vc_add_param('vc_row',array(
	                              'type' => 'attach_image',
	                              'heading' => esc_html__( 'Image', 'namos' ),
	                              'param_name' => 'parallax_bg_image',
	                              'value' => '',
	                              'description' => esc_html__( 'Select image from media library.', 'namos' ),
	                              'dependency' => array(
	                                  'element' => 'parallax_bg',
	                                  'not_empty' => true,
	                                ),     
	                            ) 
	    );
	vc_add_param('vc_row',array(
	                              "type" => "colorpicker",
	                              "heading" => esc_html__('Use Background Color Overlay', 'namos'),
	                              "param_name" => "parallax_bg_overlay",
	                              "value" => '',
	                              "description" => esc_html__("Select color.", "namos"),  
	                              'dependency' => array(
	                                  'element' => 'parallax_bg',
	                                  'not_empty' => true,
	                                ),     
	                            ) 
	    );

	// Add new Param in Column	
	vc_add_param('vc_column',array(
		  "type" => "dropdown",
		  "heading" => esc_html__('Animate Column', 'namos'),
		  "param_name" => "animate",
		  "value" => array(   
							esc_html__('None', 'namos') => 'none', 
							esc_html__('Fade', 'namos') => 'fade',
							esc_html__('Move Top', 'namos') => 'topmove',
							esc_html__('Move Bottom', 'namos') => 'bottommove', 
							esc_html__('Move Left', 'namos') => 'leftmove', 
							esc_html__('Move Right', 'namos') => 'rightmove',  
						  ),
		  "description" => esc_html__("Select Animate , Default: None", 'namos'),      
		) 
    );
	vc_add_param('vc_column',array(
		  "type" => "textfield",
		  "heading" => esc_html__('Animation Distance', 'namos'),
		  "param_name" => "distance",
		  "value" => "",
		  "description" => esc_html__("Input distance show column. Example: 50, 60, etc", 'namos'), 
		  "dependency"  => array( 'element' => 'animate', 'value' => array( 'topmove', 'bottommove', 'leftmove', 'rightmove' ) ),     
		) 
    );
    vc_add_param('vc_column',array(
		  "type" => "textfield",
		  "heading" => esc_html__('Animation Time', 'namos'),
		  "param_name" => "time",
		  "value" => "",
		  "description" => esc_html__("Input time show column. Example: 0.8, 0.9, ...", 'namos'),   
		  "dependency"  => array( 'element' => 'animate', 'value' => array('topmove', 'bottommove', 'leftmove', 'rightmove' ) ),   
		) 
    );  
    vc_add_param('vc_column',array(
		  "type" => "textfield",
		  "heading" => esc_html__('Animation Time After.', 'namos'),
		  "param_name" => "after",
		  "value" => "",
		  "description" => esc_html__("Input time show column. Example: 0.1, 0.2 ...", 'namos'),   
		  "dependency"  => array( 'element' => 'animate', 'value' => array('topmove', 'bottommove', 'leftmove', 'rightmove' ) ),   
		) 
    );  
}

if(function_exists('vc_remove_param')){
	vc_remove_param( "vc_row", "full_width" );
    vc_remove_param( "vc_row", "content_placement" ); 
    vc_remove_param( "vc_row", "equal_height" );
    vc_remove_param( "vc_row", "full_height" );
    vc_remove_param( "vc_row", "columns_placement" );
    vc_remove_param( "vc_row", "parallax" );
    vc_remove_param( "vc_row", "parallax_image" );
    vc_remove_param( "vc_row", "video_bg" );
    vc_remove_param( "vc_row", "video_bg_url" );
    vc_remove_param( "vc_row", "video_bg_parallax" );
    vc_remove_param( "vc_row", "parallax_speed_bg" );
    vc_remove_param( "vc_row", "parallax_speed_video" );
    vc_remove_param( "vc_row", "gap" );
    vc_remove_param( "vc_column", "css_animation" ); 
    vc_remove_param( "vc_column", "video_bg" ); 
    vc_remove_param( "vc_column", "video_bg_url" ); 
    vc_remove_param( "vc_column", "parallax" ); 
    vc_remove_param( "vc_column", "video_bg_parallax" ); 
    vc_remove_param( "vc_column", "parallax_image" ); 
    vc_remove_param( "vc_column", "parallax_speed_bg" ); 
    vc_remove_param( "vc_column", "parallax_speed_video" ); 
}	

if(!function_exists('namos_custom_frontend_scripts')){
    function namos_custom_frontend_scripts(){
    ?>  
      <?php if ( namos_get_option('preload') != false ){ ?>
        <script type="text/javascript">
            window.jQuery = window.$ = jQuery;  
            (function($) { "use strict";
            	//Preloader
				Royal_Preloader.config({
					mode           : 'progress',
					background     : '<?php namos_get_option('preload_bgcolor'); ?>',
					showProgress   : true,
					showPercentage : false
				});
            })(jQuery);
        </script>
    <?php } ?>          
<?php        
    }
}
add_action('wp_footer', 'namos_custom_frontend_scripts');