<?php

class AzaleaEltdfImageSliderWidget extends AzaleaEltdfWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_image_slider_widget',
            esc_html__('Elated Image Slider Widget', 'azaleawp'),
            array( 'description' => esc_html__( 'Add image slider element to widget areas', 'azaleawp'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'name' => 'extra_class',
                'title' => esc_html__('Custom CSS Class', 'azaleawp')
            ),
            array(
                'type' => 'textfield',
                'name' => 'widget_title',
                'title' => esc_html__('Widget Title', 'azaleawp')
            ),
            array(
                'type'        => 'textfield',
                'name'        => 'images',
                'title'       => esc_html__('Image ID\'s', 'azaleawp'),
	            'description' => esc_html__('Add images id for your image slider widget, separate id\'s with comma', 'azaleawp')
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        extract($args);

        $extra_class = '';
        if (!empty($instance['extra_class']) && $instance['extra_class'] !== '') {
            $extra_class = $instance['extra_class'];
        }
	
	    $image_slider_html = '';
        
	    $image_ids = array();
	
	    if ($instance['images'] !== '') {
		    $image_ids = explode(',', $instance['images']);
	    }
	
	    foreach ($image_ids as $id) {
		    $image_original = wp_get_attachment_image_src($id, 'full');
		    $image_url = $image_original[0];
		    $image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
		
		    $image_slider_html .= '<img itemprop="image" class="eltdf-is-widget-image" src="'.esc_url($image_url).'" alt="'.esc_attr($image_alt).'" />';
	    }
	
	    $slider_data = array();
	    $slider_data['data-enable-navigation'] = 'no';
	    $slider_data['data-enable-pagination'] = 'yes';
        ?>

        <div class="widget eltdf-image-slider-widget <?php echo esc_html($extra_class); ?>">
            <?php
                if (!empty($instance['widget_title']) && $instance['widget_title'] !== '') {
                    print $args['before_title'].$instance['widget_title'].$args['after_title'];
                }
                if (!empty($image_slider_html)) {
                	print '<div class="eltdf-is-widget-inner eltdf-owl-slider" '.azalea_eltdf_get_inline_attrs($slider_data).'>';
                        print $image_slider_html;
	                print '</div>';
                }
            ?>
        </div>
    <?php 
    }
}