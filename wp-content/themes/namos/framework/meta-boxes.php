<?php

/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */
if ( is_admin() ) {
	function namos_register_meta_boxes( $meta_boxes ) {

		$prefix = '_cmb_';

		$meta_boxes[] = array(
			'id'       => 'format_detail',
			'title'    => __( 'Format Details', 'namos' ),
			'pages'    => array( 'post' ),
			'context'  => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields'   => array(
				array(
					'name'             => __( 'Image', 'namos' ),
					'id'               => $prefix . 'image',
					'type'             => 'image_advanced',
					'class'            => 'image',
					'max_file_uploads' => 1,
				),
				array(
					'name'  => __( 'Gallery', 'namos' ),
					'id'    => $prefix . 'images',
					'type'  => 'image_advanced',
					'class' => 'gallery',
				),			
				array(				
					'name'  => __( 'Audio', 'namos' ),
					'id'    => $prefix . 'link_audio', // How to display on front end: https://metabox.io/docs/get-meta-value/
					'type'  => 'oembed',
					// Allow to clone? Default is false
					'clone' => false,
					// Input size
					'size'  => 30,
					'class' => 'audio',
					'desc' => 'Example: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',
				),
				array(
					'name'  => __( 'Video', 'namos' ),
					'id'    => $prefix . 'link_video', // How to display on front end: https://metabox.io/docs/get-meta-value/
					'type'  => 'oembed',
					// Allow to clone? Default is false
					'clone' => false,
					// Input size
					'size'  => 30,
					'class' => 'video',
					'desc' => 'Example: <b>http://www.youtube.com/embed/0ecv0bT9DEo</b> or <b>http://player.vimeo.com/video/47355798</b>',
				),		
			),
		);

		return $meta_boxes;
	}
	add_filter( 'rwmb_meta_boxes', 'namos_register_meta_boxes' );
}