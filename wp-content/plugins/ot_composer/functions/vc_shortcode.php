<?php 

// Home Parallax
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Home Parallax", 'otvcp-i10n'),
   "base" => "hparallax",
   "class" => "",
   "category" => 'Namos Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Image Background", 'otvcp-i10n'),
         "param_name" => "imgpara",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Enter the title", 'otvcp-i10n')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Subtitle", 'otvcp-i10n'),
         "param_name" => "stitle",
         "value" => "",
         "description" => __("Enter the sub title", 'otvcp-i10n')
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Image", 'otvcp-i10n'),
         "param_name" => "image",
         "value" => "",
      ),
    )
    ));
}

// Home Slider (namos)
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Home Slider", 'otvcp-i10n'),
   "base" => "hslider",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Namos Element',
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Slider", 'otvcp-i10n'),
          'value' => '',
          'param_name' => 'slide',
          'params' => array(
                array(
                   "type" => "attach_image",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__("Background Image", 'otvcp-i10n'),
                   "param_name" => "image",
                   "value" => "",
                ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => 'Small Title',
                  'param_name' => 'smalltext',
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => 'Bigtext',
                  'param_name' => 'bigtext',
               ),
          )
      ),
    )));
}

// Section Title
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Section Title", 'otvcp-i10n'),
   "base" => "sectiontitle",
   "class" => "",
   "category" => 'Namos Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Enter the title", 'otvcp-i10n')
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Element Tag', 'otvcp-i10n'),
        "param_name" => "tag",
        'dependency'  => array( 'element' => 'style', 'value' => array( 'style2' ) ),
        "value" => array(
                     esc_html__('Select Tag', 'otvcp-i10n') => '',
                     esc_html__('h1', 'otvcp-i10n') => 'h1',
                     esc_html__('h2', 'otvcp-i10n') => 'h2',
                     esc_html__('h3', 'otvcp-i10n') => 'h3',  
                     esc_html__('h4', 'otvcp-i10n') => 'h4',
                     esc_html__('h5', 'otvcp-i10n') => 'h5',
                     esc_html__('h6', 'otvcp-i10n') => 'h6',  
                     esc_html__('p', 'otvcp-i10n')  => 'p',
                     esc_html__('div', 'otvcp-i10n') => 'div',
                    ),
        "description" => esc_html__("Section Element Tag", 'otvcp-i10n'),      
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Subtitle", 'otvcp-i10n'),
         "param_name" => "stitle",
         'dependency'  => array( 'element' => 'style', 'value' => array( 'style1' ) ),
         "value" => "",
         "description" => __("Enter the sub title", 'otvcp-i10n')
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Image", 'otvcp-i10n'),
         "param_name" => "image",
         'dependency'  => array( 'element' => 'style', 'value' => array( 'style1' ) ),
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Content", 'otvcp-i10n'),
         "param_name" => "content",
         'dependency'  => array( 'element' => 'style', 'value' => array( 'style2' ) ),
         "value" => "",
         "description" => __("Enter the content", 'otvcp-i10n')
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Style", 'otvcp-i10n'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style1', 'otvcp-i10n')   => 'style1',
                     esc_html__('Style2', 'otvcp-i10n')   => 'style2',
                  ),
         "description" => __("Select section", 'otvcp-i10n')
      ),
    )
    ));
}

// Section Parallax Image
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Section Parallax Image", 'otvcp-i10n'),
   "base" => "secparallax",
   "class" => "",
   "category" => 'Namos Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Image", 'otvcp-i10n'),
         "param_name" => "image",
         "value" => "",
      ),
    )
    ));
}

// Member Team
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Member Team", 'otvcp-i10n'),
   "base" => "member",
   "class" => "",
   "category" => 'Namos Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Team", 'otvcp-i10n'),
          'value' => '',
          'param_name' => 'team',
          // Note params is mapped inside param-group:
          'params' => array(
                array(
                   "type" => "attach_image",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__("Photo", 'otvcp-i10n'),
                   "param_name" => "photo",
                   "value" => "",
                ),
                array(
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__("Member Name", 'otvcp-i10n'),
                   "param_name" => "name",
                   "value" => "",
                ),
                array(
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__("Member Job", 'otvcp-i10n'),
                   "param_name" => "job",
                   "value" => "",
                ),
          )
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("First Image", 'otvcp-i10n'),
         "param_name" => "place",
         "value" => "",
      ),
    )
    ));
}

// Icon Box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Icon Box", 'otvcp-i10n'),
   "base" => "iconb",
   "class" => "",
   "category" => 'Namos Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'otvcp-i10n'),
         "param_name" => "icon",
         "value" => "",
         "description" => esc_html__("Ex:  icon-mobile. Find here: http://vegatheme.com/html/etlinefont-icons/", 'otvcp-i10n')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Subtitle", 'otvcp-i10n'),
         "param_name" => "stitle",
         "value" => "",
      ),
   )));
}

// Testimonial Slide
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Testimonial Slide", 'otvcp-i10n'),
   "base" => "testimonial",
   "class" => "",
   "category" => 'Namos Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Testimonial", 'otvcp-i10n'),
          'value' => '',
          'param_name' => 'testimonial',
          // Note params is mapped inside param-group:
          'params' => array(
                array(
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__("Name", 'otvcp-i10n'),
                   "param_name" => "name",
                   "value" => "",
                ),
                array(
                   "type" => "textarea",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__("Content", 'otvcp-i10n'),
                   "param_name" => "content",
                   "value" => "",
                ),
          )
      ),
    )
    ));
}

// Clients Logo
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Our Clients Logo", 'otvcp-i10n'),
   "base"      => "clients",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Namos Element',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Logo Client",
         "param_name" => "gallery",
         "value" => "",
         "description" => esc_html__("Use link out for logo client by enter link input caption image, View guide here: http://vegatheme.com/images/add-link-logo.jpg , Recomended Size: 200 x 130. ", 'otvcp-i10n')
      ),       
    )));
}


// Lastest Blog
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Latest Blog", 'otvcp-i10n'),
   "base" => "lastest_blog",
   "class" => "",
   "category" => 'Namos Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Posts", 'otvcp-i10n'),
         "param_name" => "number",
         "value" => "",
      ),
   )));
}

// Portfolio Filter Masonry
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Portfolio Filter Masonry", 'otvcp-i10n'),
   "base" => "portfoliofms",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Namos Element',
   "params" => array( 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Show", 'otvcp-i10n'),
         "param_name" => "num",
         "value" => "12",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Text Show All", 'otvcp-i10n'),
         "param_name" => "all",
         "value" => "All",
      ),
    )));
}

//Google Map
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Google Map", 'otvcp-i10n'),
   "base" => "ggmap",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Namos Element',
   "params" => array(       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Latitude", 'otvcp-i10n'),
         "param_name" => "lat",
         "value" => 25.758935,
         "description" => esc_html__("Please enter http://www.latlong.net/ google map", 'otvcp-i10n')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Longitude", 'otvcp-i10n'),
         "param_name" => "long",
         "value" => -80.203165,
         "description" => esc_html__("Please enter http://www.latlong.net/ google map", 'otvcp-i10n')

      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Zoom Map", 'otvcp-i10n'),
         "param_name" => "zoom",
         "value" => '',
         "description" => esc_html__("Please enter Zoom Map, Ex: 15", 'otvcp-i10n')
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Map marker",
         "param_name" => "icon",
         "value" => "",
         "description" => esc_html__("Icon Map marker, 47 x 68", 'otvcp-i10n')
      ),  
      array(
          "type" => "textarea_raw_html",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__('JavaScript Code', 'otvcp-i10n'),
          "param_name" => "gmap_custom_style",
          "value" => "",
          "description" => __('Enter your JavaScript code, find your custom style gmap here:<a href="https://snazzymaps.com/explore" target="_blank">view more</a>', 'otvcp-i10n'),   
            
        )  
    )));
}

