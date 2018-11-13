<?php
/**
 * namos theme customizer
 *
 * @package namos
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Namos_Customize {
	/**
	 * Customize settings
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	 * The class constructor
	 *
	 * @param array $config
	 */
	public function __construct( $config ) {
		$this->config = $config;

		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}

		$this->register();
	}

	/**
	 * Register settings
	 */
	public function register() {
		/**
		 * Add the theme configuration
		 */
		if ( ! empty( $this->config['theme'] ) ) {
			Kirki::add_config(
				$this->config['theme'], array(
					'capability'  => 'edit_theme_options',
					'option_type' => 'theme_mod',
				)
			);
		}

		/**
		 * Add panels
		 */
		if ( ! empty( $this->config['panels'] ) ) {
			foreach ( $this->config['panels'] as $panel => $settings ) {
				Kirki::add_panel( $panel, $settings );
			}
		}

		/**
		 * Add sections
		 */
		if ( ! empty( $this->config['sections'] ) ) {
			foreach ( $this->config['sections'] as $section => $settings ) {
				Kirki::add_section( $section, $settings );
			}
		}

		/**
		 * Add fields
		 */
		if ( ! empty( $this->config['theme'] ) && ! empty( $this->config['fields'] ) ) {
			foreach ( $this->config['fields'] as $name => $settings ) {
				if ( ! isset( $settings['settings'] ) ) {
					$settings['settings'] = $name;
				}

				Kirki::add_field( $this->config['theme'], $settings );
			}
		}
	}

	/**
	 * Get config ID
	 *
	 * @return string
	 */
	public function get_theme() {
		return $this->config['theme'];
	}

	/**
	 * Get customize setting value
	 *
	 * @param string $name
	 *
	 * @return bool|string
	 */
	public function get_option( $name ) {
		if ( ! isset( $this->config['fields'][$name] ) ) {
			return false;
		}

		$default = isset( $this->config['fields'][$name]['default'] ) ? $this->config['fields'][$name]['default'] : false;

		return get_theme_mod( $name, $default );
	}
}

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function namos_get_option( $name ) {
	global $namos_customize;

	if ( empty( $namos_customize ) ) {
		return false;
	}

	if ( class_exists( 'Kirki' ) ) {
		$value = Kirki::get_option( $namos_customize->get_theme(), $name );
	} else {
		$value = $namos_customize->get_option( $name );
	}

	return apply_filters( 'namos_get_option', $value, $name );
}

/**
 * Move some default sections to `general` panel that registered by theme
 *
 * @param object $wp_customize
 */
function namos_customize_modify( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->panel     = 'general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'general';
}
add_action( 'customize_register', 'namos_customize_modify' );

/**
 * Customizer configuration
 */
$namos_customize = new Namos_Customize(
	array(
		'theme'    => 'namos',

		'panels'   => array(
			'general' => array(
				'priority' => 10,
				'title'    => esc_attr__( 'General', 'namos' ),
			),	
			'header_panel' => array(
				'priority' => 15,
				'title'    => esc_attr__( 'Header', 'namos' ),
			),			
		),

		'sections' => array(

			'header_logo_section' => array(
			    'title'          => esc_attr__( 'Logo', 'namos' ),
			    'description' => '',
			    'panel'          => 'header_panel', // Not typically needed.
			    'priority'       => 50,
			    'capability'     => 'edit_theme_options',
			),

			'header_social_section' => array(
				'title'    => esc_attr__( 'Socials', 'namos' ),
				'description' => '',
				'panel'          => 'header_panel', // Not typically needed.
				'priority'    => 60,
				'capability'  => 'edit_theme_options',
			),		

			'header_styling_section' => array(
				'title'    => esc_attr__( 'Styling', 'namos' ),
				'description' => '',
				'panel'          => 'header_panel', // Not typically needed.
				'priority'    => 61,
				'capability'  => 'edit_theme_options',
			),

			// Section Blog
			'blog_section'     => array(
				'title'       => esc_attr__( 'Blog', 'namos' ),
				'description' => '',
				'priority'    => 170,
				'capability'  => 'edit_theme_options',
			),

			// Section Footer
			'footer_section'     => array(
				'title'       => esc_attr__( 'Footer', 'namos' ),
				'description' => '',
				'priority'    => 180,
				'capability'  => 'edit_theme_options',
			),

			// Section Styling
			'styling_section'     => array(
				'title'       => esc_attr__( 'Styling', 'namos' ),
				'description' => '',
				'priority'    => 190,
				'capability'  => 'edit_theme_options',
			),
			
			'preload_section'     => array(
				'title'       => esc_attr__( 'Preload', 'namos' ),
				'description' => '',
				'priority'    => 195,
				'capability'  => 'edit_theme_options',
			),

			'miscellaneous_section'     => array(
				'title'       => esc_attr__( 'Miscellaneous', 'namos' ),
				'description' => '',
				'priority'    => 196,
				'capability'  => 'edit_theme_options',
			),			
		),

		'fields'   => array(

			// Preload
			'preload'     => array(
				'type'        => 'toggle',
				'label'       => esc_attr__( 'Preloader', 'namos' ),
				'section'     => 'preload_section',
				'default'     => '1',
				'priority'    => 10,
			),
			'preload_text_color'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color', 'namos' ),
				'section'  => 'preload_section',
				'default'  => '#21d365',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'preload_bgcolor'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Color', 'namos' ),
				'section'  => 'preload_section',
				'default'  => '#161616',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),

			// Header Logo
			'logo'         => array(
				'type'     => 'image',
				'label'    => esc_attr__( 'Logo Static', 'namos' ),
				'description' => esc_attr__( 'Upload your logo static here', 'namos' ),
				'section'  => 'header_logo_section',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'assets/images/logo.png',
				'priority' => 51,
			),		
				
			// Header Social
			'social_switch'     => array(
				'type'        => 'toggle',
				'label'       => esc_attr__( 'Social On/Off?', 'namos' ),
				'section'     => 'header_social_section',
				'default'     => '1',
				'priority'    => 9,
			),
			'header_socials'     => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Socials Network', 'namos' ),
				'section'  => 'header_social_section',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'social_switch',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'row_label' => array(
					'type' => 'field',
					'value' => esc_attr__('social', 'namos' ),
					'field' => 'social_name',
				),
				'default'  => array(),
				'fields'   => array(
					'social_name' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Social network name', 'namos' ),
						'description' => esc_html__( 'This will be the social network name', 'namos' ),
						'default'     => '',
					),
					'social_icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon class name', 'namos' ),
						'description' => esc_html__( 'This will be the social icon: http://fontawesome.io/icons/', 'namos' ),
						'default'     => '',
					),
					'social_link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link url', 'namos' ),
						'description' => esc_html__( 'This will be the social link', 'namos' ),
						'default'     => '',
					),
				),
			),
			
			// Header Styling
			'header_layout'  => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Header Layout', 'namos' ),
				'section'  => 'header_styling_section',
				'default'  => '1',
				'priority' => 10,
				'choices'  => array(
					'1' 	=> esc_html__( 'Header Layout 1', 'namos' ),
					'2' 	=> esc_html__( 'Header Layout 2', 'namos' ),
				),
			),
			'header_text_color'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Static Menu Item Color', 'namos' ),
				'description' => esc_attr__( 'Set your header text color.', 'namos' ),
				'section'     => 'header_styling_section',
				'default'     => '#ffffff',
				'priority'    => 10,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => '.menu--mohe .menu__item-name, .menu-onepage > ul > li a, .nav-social li a',
						'property' => 'color',
					),
				),
			),
			'header_scroll_text_color'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Scroll Menu Item Color', 'namos' ),
				'description' => esc_attr__( 'Set your header text color.', 'namos' ),
				'section'  => 'header_styling_section',
				'default'     => '#ffffff',
				'priority'    => 11,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => '.cbp-af-header.cbp-af-header-shrink .menu-onepage > ul > li a',
						'property' => 'color',
					),
				),
			),
			'header_active_hover_text_color'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Active and Hover Menu Item Color', 'namos' ),
				'description' => esc_attr__( 'Set your header active and hover text color.', 'namos' ),
				'section'     => 'header_styling_section',
				'default'     => '#21d365',
				'priority'    => 12,
				'choices'     => array(
					'alpha' => true,
				),
			),
			'header_bg'         => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Static Background Color', 'namos' ),
				'description' => esc_attr__( 'Set your header background color.', 'namos' ),
				'section'  => 'header_styling_section',
				'default'     => 'rgba(0,0,0,0)',
				'priority'    => 13,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => '.menu-back',
						'property' => 'background-color',
					),
				),
			),
			'header_scroll_bg' => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Scroll Background Color', 'namos' ),
				'description' => esc_attr__( 'Set your header background color.', 'namos' ),
				'section'  => 'header_styling_section',
				'default'     => 'rgba(0,0,0,.93)',
				'priority'    => 14,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => '.cbp-af-header.cbp-af-header-shrink',
						'property' => 'background-color',
					),
				),
			),
			
			'blog_layout'     => array(
				'type'        => 'radio-image',				
				'label'       => esc_html__( 'Select Blog Layout', 'namos' ),
				'section'     => 'blog_section',
				'default'     => 'right-bar',
				'priority'    => 10,
				'choices'     => array(
					'no-bar'  => get_template_directory_uri() . '/assets/images/theme-options/1c.png',
					'left-bar'   => get_template_directory_uri() . '/assets/images/theme-options/2cl.png',
					'right-bar' => get_template_directory_uri() . '/assets/images/theme-options/2cr.png',					
				),
			),
			'single_layout'     => array(
				'type'        => 'radio-image',				
				'label'       => esc_html__( 'Select Blog Layout', 'namos' ),
				'section'     => 'blog_section',
				'default'     => 'right-bar',
				'priority'    => 10,
				'choices'     => array(
					'no-bar'  => get_template_directory_uri() . '/assets/images/theme-options/1c.png',
					'left-bar'   => get_template_directory_uri() . '/assets/images/theme-options/2cl.png',
					'right-bar' => get_template_directory_uri() . '/assets/images/theme-options/2cr.png',					
				),
			),
			'subtitle_blog' => array(
				'type'    => 'editor',
				'label'   => esc_html__( 'Subtitle Blog', 'namos' ),
				'section' => 'blog_section',
				'default' => '',
			),
			
			// Footer
			'copyright'       => array(
				'type'        => 'textarea',
				'label'       => esc_html__( 'Text Left Footer Bottom', 'namos' ),
				'section'     => 'footer_section',
				'default'     => '© Copyright 2018 - Namos by OceanThemes',
				'priority'    => 10,				
			),
			'socialfooter_switch'     => array(
				'type'        => 'toggle',
				'label'       => esc_attr__( 'Social On/Off?', 'namos' ),
				'section'     => 'footer_section',
				'default'     => '1',
				'priority'    => 9,
			),
			'footer_socials'     => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Socials Network', 'namos' ),
				'section'  => 'footer_section',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'social_switch',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'row_label' => array(
					'type' => 'field',
					'value' => esc_attr__('social', 'namos' ),
					'field' => 'social_name',
				),
				'default'  => array(),
				'fields'   => array(
					'social_name' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Social network name', 'namos' ),
						'description' => esc_html__( 'This will be the social network name', 'namos' ),
						'default'     => '',
					),
					'social_icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon class name', 'namos' ),
						'description' => esc_html__( 'This will be the social icon: http://fontawesome.io/icons/', 'namos' ),
						'default'     => '',
					),
					'social_link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link url', 'namos' ),
						'description' => esc_html__( 'This will be the social link', 'namos' ),
						'default'     => '',
					),
				),
			),

			//Styling Settings	
			'main_color'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Primary Color', 'namos' ),
				'section'  => 'styling_section',
				'default'  => '#21d365',
				'priority' => 10,
			),			

			'body_typo' => array(
				'type'        => 'typography',
				'label'       => esc_attr__( 'Body Font', 'namos' ),
				'section'     => 'styling_section',
				'default'     => array(
					'font-family'    => 'Open Sans',
					'variant'        => 'regular',
					'font-size'      => '13px',
					'line-height'    => '1.7em',
					'letter-spacing' => '0',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#888888',
					'text-transform' => 'none',
					'text-align'     => 'left'
				),
				'priority'    => 10,
				'output'      => array(
					array(
						'element' => 'body',
					),
				),
			),

			//miscellaneous
			'mapapikey'     => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Add Your Google Map API Key', 'namos' ),
				'section'     => 'miscellaneous_section',
				'default'     => 'AIzaSyAvpnlHRidMIU374bKM5-sx8ruc01OvDjI',
				'priority'    => 10,	
				'description' => 'Get an API Key here: https://developers.google.com/maps/documentation/javascript/get-api-key',			
			),
		),
	)
);

/**
 * Add color styling from theme
 */
function namos_custom_styles_method() {
	$color = namos_get_option('main_color'); //E.g. #FF0000
	$menu_hover_color = namos_get_option('header_active_hover_text_color');
	$preloadbg = namos_get_option('preload_bgcolor');
	$preloadcolor = namos_get_option('preload_text_color');
    $custom_css = "
    	::selection {
			color: #fff;
			background:  {$color};
		}
		::-moz-selection {
			color: #fff;
			background:  {$color};
		}

		/* default color: #8ec92f */
		/* Color */
		a:hover, a:focus{color: {$color};}
		
		.menu--mohe .menu__item-name.curent-nav,
		.menu--mohe .menu__item:hover .menu__item-label,
		.menu--mohe .menu__item:focus .menu__item-label,
		.project-nav-wrap .left-nav .text-on-hover:before,
		.project-nav-wrap .right-nav .text-on-hover:after,
		.menu__item-team:hover,
		.menu__item-team.menu__item--current-team,
		.menu__item-team.menu__item--current-team:hover,
		.menu__item-team.menu__item--current-team:focus,
		.menu-onepage > ul > li a:hover,
		.title h6 span,
		.title h6 strong,
		.about-wrap .about-icon,
		.blog-pagination li p:hover,
		.arrow-icons:hover,
		.num-of-com span,
		.comm-link,.home-text-wrap .home-text-freelance h1,
		.widget_recent_entries li a:hover, .widget_categories li a:hover, .widget_archive li a:hover,
		.comment a,  .menu-onepage > ul > li a.mPS2id-highlight-first, .widget ul li a:hover
		{color: {$color};}

		.menu--mohe .menu__item:hover .menu__item-label, .cbp-af-header.cbp-af-header-shrink .menu-onepage > ul > li a.mPS2id-highlight-first, .menu--mohe li.current_page_item .menu__item-name 
		{color: {$menu_hover_color};}


		/* Background Color */
		#filter li a:before,
		.footer a:before,
		.title .list li:before,
		.cd-close-nav:hover::after, .cd-close-nav:hover::before,
		#owl-sep-1.owl-theme .owl-controls .owl-page span:hover,
		#owl-sep-1.owl-theme .owl-controls .owl-page.active span,
		#owl-blog-slider.owl-theme .owl-controls .owl-page.active span,
		#owl-blog-slider.owl-theme .owl-controls .owl-page span:hover,
		.widget_search button,
		.tagcloud li a:hover,
		#ajax-form input.send_message:hover, .contact-form input.send_message:hover, 
		#cd-zoom-in, #cd-zoom-out,#sync2 .synced .item
		{background-color:  {$color};}

		figure.vimeo:hover a:after, figure.youtube:hover a:after {
			background-color:  {$color};
		}

		/* Border Color */
		.widget_recent_entries li:before, .widget_categories li:before, .widget_archive li:before, .tagcloud li a:hover, .widget_meta li:before
		{border-color:  {$color};}	

		figure.vimeo a:before, figure.youtube a:before, .post-wrapper blockquote, .post-wrapper blockquote p{
			border-left-color: {$color};
		}

		.widget_search input:active,
		.widget_search input:focus,
		#ajax-form textarea:focus, .contact-form textarea:focus,
		#ajax-form input:focus, .contact-form input:focus,
		#ajax-form textarea:active, .contact-form textarea:active,
		#ajax-form input:active, .contact-form input:active {	
			border-bottom-color: {$color};
		}
		
		#royal_preloader.royal_preloader_progress .royal_preloader_meter {background-color: {$preloadcolor};}	
		body.royal_preloader{background-color: {$preloadbg};}	

		";

    wp_add_inline_style( 'namos-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'namos_custom_styles_method' );

