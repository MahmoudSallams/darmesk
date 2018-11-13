<?php
/**
 * Hooks for importer
 *
 * @package Namos
 */


/**
 * Importer the demo content
 *
 * @since  1.0
 *
 */
function namos_importer() {
    return array(
        array(
            'name'       => 'Multi-Page: Image Text',
            'preview'    => get_template_directory_uri().'/framework/data_demo/1.jpg',
            'content'    => get_template_directory_uri().'/framework/data_demo/demo-content.xml',
            'customizer' => get_template_directory_uri().'/framework/data_demo/multi-page/customizer.dat',
            'pages'      => array(
                'front_page' => 'Work',
                'blog'       => 'Blog',
            ),
            'menus'      => array(
                'primary'      => 'main-menu',
                'onepage'      => 'one-page-menu',
            )
        ),
        array(
            'name'       => 'Multi-Page: Parallax',
            'preview'    => get_template_directory_uri().'/framework/data_demo/2.jpg',
            'content'    => get_template_directory_uri().'/framework/data_demo/demo-content.xml',
            'customizer' => get_template_directory_uri().'/framework/data_demo/multi-page/customizer.dat',
            'pages'      => array(
                'front_page' => 'Home Parallax',
                'blog'       => 'Blog',
            ),
            'menus'      => array(
                'primary'      => 'main-menu',
                'onepage'      => 'one-page-menu',
            )
        ),
        array(
            'name'       => 'Multi-Page: Slider',
            'preview'    => get_template_directory_uri().'/framework/data_demo/3.jpg',
            'content'    => get_template_directory_uri().'/framework/data_demo/demo-content.xml',
            'customizer' => get_template_directory_uri().'/framework/data_demo/multi-page/customizer.dat',
            'pages'      => array(
                'front_page' => 'Home Slider',
                'blog'       => 'Blog',
            ),
            'menus'      => array(
                'primary'      => 'main-menu',
                'onepage'      => 'one-page-menu',
            )
        ),
        array(
            'name'       => 'One-Page: Image Text',
            'preview'    => get_template_directory_uri().'/framework/data_demo/4.jpg',
            'content'    => get_template_directory_uri().'/framework/data_demo/demo-content.xml',
            'customizer' => get_template_directory_uri().'/framework/data_demo/onepage/customizer.dat',
            'pages'      => array(
                'front_page' => 'Onepage',
                'blog'       => 'Blog',
            ),
            'menus'      => array(
                'primary'      => 'main-menu',
                'onepage'      => 'one-page-menu',
            )
        ),
        array(
            'name'       => 'One-Page: Parallax',
            'preview'    => get_template_directory_uri().'/framework/data_demo/5.jpg',
            'content'    => get_template_directory_uri().'/framework/data_demo/demo-content.xml',
            'customizer' => get_template_directory_uri().'/framework/data_demo/onepage/customizer.dat',
            'pages'      => array(
                'front_page' => 'Onepage Parallax',
                'blog'       => 'Blog',
            ),
            'menus'      => array(
                'primary'      => 'main-menu',
                'onepage'      => 'one-page-menu',
            )
        ),
        array(
            'name'       => 'One-Page: Slider',
            'preview'    => get_template_directory_uri().'/framework/data_demo/6.jpg',
            'content'    => get_template_directory_uri().'/framework/data_demo/demo-content.xml',
            'customizer' => get_template_directory_uri().'/framework/data_demo/onepage/customizer.dat',
            'pages'      => array(
                'front_page' => 'Onepage Slider',
                'blog'       => 'Blog',
            ),
            'menus'      => array(
                'primary'      => 'main-menu',
                'onepage'      => 'one-page-menu',
            )
        ),
    );
}

add_filter( 'soo_demo_packages', 'namos_importer', 30 );