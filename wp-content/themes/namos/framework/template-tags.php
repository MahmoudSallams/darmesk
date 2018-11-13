<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage namos
 * @since 1.0
 */


if ( ! function_exists( 'namos_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function namos_entry_meta() {

$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><!--<time class="updated" datetime="%3$s">%4$s</time>-->';
  }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date() )
  );

  $posted_on = sprintf(
    esc_html_x( '%s', 'post date', 'namos' ),
    //'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        $time_string . ''
  );

    echo '' . $posted_on . ''; // WPCS: XSS OK.

}
endif;

//pagination
if ( ! function_exists( 'namos_pagination' ) ) :
function namos_pagination($prev = '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>', $next = '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text' => $prev,
        'next_text' => $next,		
        'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
    );
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", "<ul class='blog-pagination'>", $return );
}
endif;

if ( ! function_exists( 'namos_custom_wp_admin_style' ) ) :
function namos_custom_wp_admin_style() {

        wp_register_style( 'namos_custom_wp_admin_css', get_template_directory_uri() . '/assets/admin/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'namos_custom_wp_admin_css' );

        wp_enqueue_script( 'namos-backend-js', get_template_directory_uri()."/assets/admin/admin-script.js", array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'namos-backend-js' );
}
add_action( 'admin_enqueue_scripts', 'namos_custom_wp_admin_style' );
endif;

if ( ! function_exists( 'namos_search_form' ) ) :
/* Custom form search */
function namos_search_form( $form ) {
    $form = '<form role="search" method="get" action="' . esc_url(home_url( '/' )) . '" >  
        <input type="search" id="search" class="search-query form-control" value="' . get_search_query() . '" name="s" placeholder="'.__('Darmesk...', 'namos').'" />
        
        <button type="search" data-lang="en"><span class="fa fa-search"></span></button>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'namos_search_form' );
endif;

/* Custom comment List: */
function namos_theme_comment($comment, $args, $depth) {    
   $GLOBALS['comment'] = $comment;
?>
   <div class="comment">
   		<?php echo get_avatar($comment,$size='60',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536' ); ?>
			<div class="time"><?php comment_date('d M, Y'); ?> </div>
      <h6 ><?php printf('%s', get_comment_author()) ?></h6>
    		<?php if ($comment->comment_approved == '0'){ ?>
    			 <p><em><?php esc_html_e('Your comment is awaiting moderation.','namos') ?></em></p>
    		<?php }else{ ?>
            <?php comment_text() ?>
         <?php } ?>		
	     <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       
    </div> 
<?php
}

if ( ! function_exists( 'namos_excerpt' ) ) :
/** Excerpt Section Blog Post **/
function namos_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
endif;

if ( ! function_exists( 'namos_tag_cloud_widget' ) ) :
/**custom function tag widgets**/
function namos_tag_cloud_widget($args) {
    $args['number'] = 0; //adding a 0 will display all tags
    $args['largest'] = 13; //largest tag
    $args['smallest'] = 13; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    $args['format'] = 'list'; //ul with a class of wp-tag-cloud
    $args['exclude'] = ''; //exclude tags by ID
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'namos_tag_cloud_widget' );
endif;


//if(class_exists('WPBakeryVisualComposerSetup')){
function namos_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    if($tag=='vc_column' || $tag=='vc_column_inner') {
        $class_string = preg_replace('/vc_col-sm-1/', 'one columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-2/', 'two columns', $class_string);        
        $class_string = preg_replace('/vc_col-sm-3/', 'three columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-4/', 'four columns', $class_string);       
        $class_string = preg_replace('/vc_col-sm-5/', 'five columns ', $class_string);
        $class_string = preg_replace('/vc_col-sm-6/', 'six columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-7/', 'seven columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-8/', 'eight columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-9/', 'nine columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-10/', 'ten columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-11/', 'eleven columns', $class_string);    
        $class_string = preg_replace('/vc_col-sm-12/', 'twelve columns', $class_string); 
        $class_string = preg_replace('/vc_col-lg-offset-1/', 'offset-by-one', $class_string);
        $class_string = preg_replace('/vc_col-lg-offset-2/', 'offset-by-two ', $class_string);        
        $class_string = preg_replace('/vc_col-lg-offset-3/', 'offset-by-three', $class_string);
        $class_string = preg_replace('/vc_col-lg-offset-4/', 'offset-by-four', $class_string);       
        $class_string = preg_replace('/vc_col-lg-offset-5/', 'offset-by-five ', $class_string);
        $class_string = preg_replace('/vc_col-lg-offset-6/', 'offset-by-six', $class_string);
        $class_string = preg_replace('/vc_col-lg-offset-7/', 'offset-by-seven', $class_string);
        $class_string = preg_replace('/vc_col-lg-offset-8/', 'offset-by-eight', $class_string);
        $class_string = preg_replace('/vc_col-lg-offset-9/', 'offset-by-nine', $class_string);
        $class_string = preg_replace('/vc_col-lg-offset-10/', 'offset-by-ten', $class_string);
        $class_string = preg_replace('/vc_col-lg-offset-11/', 'offset-by-eleven', $class_string);     
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'namos_custom_css_classes_for_vc_row_and_vc_column', 10, 2); 