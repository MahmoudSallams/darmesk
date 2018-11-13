<?php 

// Home Parallax (namos)
add_shortcode('hparallax','hparallax_func');
function hparallax_func($atts, $content = null){
  extract(shortcode_atts(array(
    'title'   =>  '',
    'stitle'  =>  '',
    'image'   =>  '',
    'imgpara'   =>  '',
  ), $atts));
    $img   = wp_get_attachment_image_src($image,'full');
    $img   = $img[0];
    $img1   = wp_get_attachment_image_src($imgpara,'full');
    $img1   = $img1[0];
  ob_start(); 
?>  
<div class="section big-height background-black">
  <div class="parallax-home fade-elements" style="background-image: url('<?php echo esc_url($img1); ?>')"></div>
  <div class="dark-over-2"></div>
  <div class="home-text-wrap fade-elements">
    <div class="container">
      <div class="twelve columns">
        <div class="home-text-freelance">
          <h1><?php echo esc_attr($title); ?><br><span <?php if($img != ''){ ?> style="background-image: url(<?php echo esc_url($img); ?>)" <?php } ?> class="image2"><?php echo esc_attr($stitle); ?></span></h1>
        </div>  
      </div>
    </div>
  </div>
</div>
<?php
    return ob_get_clean();
}

// Home Slider (namos)
add_shortcode('hslider','hslider_func');
function hslider_func($atts, $content = null){
  extract(shortcode_atts(array(
    'slide'   =>  '',
  ), $atts));
  $slider = (array) vc_param_group_parse_atts( $slide );
  ob_start(); 
?>  
<div class="section big-height background-black">
    
    <div class="home-carousel-wrap fade-elements">  
      <div id="sync1" class="owl-carousel">
        <?php foreach ( $slider as $hslider ) { 
          $img   = wp_get_attachment_image_src($hslider['image'],'full');
          $img   = $img[0];
        ?>          
        <div class="item" style="background-image:url(<?php echo esc_url($img) ?>)">
          <div class="dark-over-2"></div>
          <div class="home-text-wrap">
            <div class="container">
              <div class="twelve columns">
                <div class="home-text-freelance">
                  <h1><?php echo esc_attr($hslider['smalltext']); ?><br><span><?php echo esc_attr($hslider['bigtext']); ?></span></h1>
                </div>  
              </div>
            </div>
          </div>
        </div>
      <?php } ?> 
      </div>
        
      <div id="sync2" class="owl-carousel fade-elements">
        <?php foreach ( $slider as $hslider ) { ?>
        <div class="item">
        </div>
        <?php } ?> 
      </div>             
    </div>
    
</div>
<?php
    return ob_get_clean();
}

// Section Title (namos)
add_shortcode('sectiontitle','sectiontitle_func');
function sectiontitle_func($atts, $content = null){
  extract(shortcode_atts(array(
    'title'   =>  '',
    'stitle'  =>  '',
    'tag'     =>  '',
    'image'   =>  '',
    'style'   =>  'style1',
  ), $atts));
    $img   = wp_get_attachment_image_src($image,'full');
    $img   = $img[0];
  ob_start(); 
?>  
<?php if($style=='style1'){ ?>
  <div class="section padding-top-from-nav background-black">
    <div class="container">
      <div class="twelve columns">
        <div class="home-text-freelance fade-elements">
          <h1><?php echo esc_attr($title); ?><br><span <?php if($img != ''){ ?> style="background-image: url(<?php echo esc_url($img); ?>)" <?php } ?>><?php echo esc_attr($stitle); ?></span></h1>
        </div>  
      </div>
    </div>
  </div>
<?php }else{ ?>
  <div class="title">
      <?php echo htmlspecialchars_decode('<'. $tag .'> '. $title .'</'.$tag.'>'); ?> 
      <?php echo wpb_js_remove_wpautop($content, true); ?>
  </div>
<?php } ?>

<?php
    return ob_get_clean();
}

// Section Image Parallax (namos)
add_shortcode('secparallax','secparallax_func');
function secparallax_func($atts, $content = null){
  extract(shortcode_atts(array(
    'image'   =>  '',
  ), $atts));
    $img   = wp_get_attachment_image_src($image,'full');
    $img   = $img[0];
  ob_start(); 
?>  
<div class="section big-height">
    <div class="parallax" style="background-image: url('<?php echo esc_url($img); ?>')"></div>
</div>
<?php
    return ob_get_clean();
}

// Team Slide
add_shortcode('member','member_func');
function member_func($atts, $content = null){
	extract(shortcode_atts(array(
    'place'   =>  '',
		'team'	  =>	'',
	), $atts));
      $img1   = wp_get_attachment_image_src($place,'full');
      $img1   = $img1[0]; 
		$teams = (array) vc_param_group_parse_atts( $team );
	ob_start(); 
?>	
  <div class="content-team">
    <div class="slideshow-team">
      <?php 
      $i=0;
      foreach ( $teams as $teamsl ) : if($teamsl) : 
      $img   = wp_get_attachment_image_src($teamsl['photo'],'full');
      $img   = $img[0]; 
      $i++;
      ?>
      <div id="slide-<?php echo esc_attr($i); ?>" class="slide-team" style="background-image: url(<?php echo esc_url($img); ?>)"></div>
      <?php endif; endforeach; ?>
      <div class="pieces" style="background-image: url(<?php echo esc_url($img1); ?>)"></div>
    </div>
    <nav class="menu-team">
      <?php
      $i= 0; 
      $j=0;
      foreach ( $teams as $teamsl ) : if($teamsl) :  
      $img   = wp_get_attachment_image_src($teamsl['photo'],'full');
      $img   = $img[0]; 
      $i++;
      $j++;
      ?>
      <a class="menu__item-team <?php if($j==1){echo 'menu__item--current-team';} ?>" href="#slide-<?php echo esc_attr($i); ?>" data-image="<?php echo esc_url($img); ?>"><?php echo esc_attr($teamsl['name']); ?><br><span><?php echo esc_attr($teamsl['job']); ?></span></a>      
      <?php endif; endforeach; ?>
    </nav>
  </div>
<script type="text/javascript">
(function($) { "use strict";
    $(document).ready(function() {
  /**
 * pieces.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2017, Codrops
 * http://www.codrops.com
 */
{
  // Helper vars and functions.
  const is3DBuggy = navigator.userAgent.indexOf('Firefox') > 0;

  // From https://davidwalsh.name/javascript-debounce-function.
  function debounce(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  };

  // from http://www.quirksmode.org/js/events_properties.html#position
  const getMousePos = (e) => {
    let posx = 0;
    let posy = 0;
    if (!e) {let e = window.event};
    if (e.pageX || e.pageY)   {
      posx = e.pageX;
      posy = e.pageY;
    }
    else if (e.clientX || e.clientY)  {
      posx = e.clientX + document.body.scrollLeft
        + document.documentElement.scrollLeft;
      posy = e.clientY + document.body.scrollTop
        + document.documentElement.scrollTop;
    }
    return {
      x : posx,
      y : posy
    };
  }

  class Pieces {
    constructor(el, options) {
      this.DOM = {};
      this.DOM.el = el;
      this.options = {
        // Number of pieces / Layout (rows x cols).
        pieces: {rows: 12, columns: 10},
        hasTilt: false,
        // Main image tilt: max and min angles.
        tilt: {maxRotationX: -2, maxRotationY: 2, maxTranslationX: 4, maxTranslationY: -2},
        delay: 0, // Number || Array(random number from [min,max], e.g. [0,300] would set a random delay per piece from 0 to 300)
        // background image src.
        bgimage: 'none',
        // default animations:
        animationDefaults: {
          duration: 600,
          easing: [0.2,1,0.3,1],
          delay: (t,i) => {
            return i*parseInt(t.dataset.delay);
          },
          translateX: (t,i) => { 
            return t.dataset.column < this.getTotalColumns()/2 ? anime.random(50,100)+'px' : anime.random(-100,-50)+'px';
          },
          translateY: (t,i) => { 
            return anime.random(-1000,-800)+'px';
          },
          opacity: {
            value: 0,
            duration: 600,
            easing: 'linear'
          }
        }
      };
      Object.assign(this.options, options);
      this.init();
    }
    init() {
      // Window sizes.
      this.win = {width: window.innerWidth, height: window.innerHeight};
      // Container sizes.
      this.dimensions = {width: this.DOM.el.offsetWidth, height: this.DOM.el.offsetHeight};
      // Render all the pieces defined in the options.
      this.layout();
      // Init tilt.
      if ( this.options.hasTilt ) {
        this.initTilt();
      }
      // Init/Bind events
      this.initEvents();
    }
    layout() {
      // The source of the main image.
      this.imgsrc = this.DOM.el.style.backgroundImage.replace('url(','').replace(')','').replace(/\"/gi, "");
      // The background image.
      this.DOM.el.style.backgroundImage = this.options.bgimage !== 'none' ? `url(${this.options.bgimage})` : 'none';
      // Create the pieces and add them to the DOM (append it to the main element).
      this.pieces = [];
      for (let r = 0; r < this.options.pieces.rows; r++) {
        for (let c = 0; c < this.options.pieces.columns; c++) {
          const piece = this.createPiece(r,c);  
          piece.style.backgroundPosition = `${-1*c*100}% ${-1*100*r}%`;
          this.pieces.push(piece);
        }
      }
    }
    createPiece(row, column) {
      const w = Math.round(this.dimensions.width/this.options.pieces.columns);
      const h = Math.round(this.dimensions.height/this.options.pieces.rows);
      const piece = document.createElement('div');

      piece.style.backgroundImage = `url(${this.imgsrc})`;
      piece.className = 'piece';
      piece.style.width = `${w}px`;
      piece.style.height = `${h}px`;
      piece.style.backgroundSize = `${w*this.options.pieces.columns+4}px auto`;
      piece.dataset.row = row;
      piece.dataset.column = column;
      piece.dataset.delay = this.options.delay instanceof Array ? anime.random(this.options.delay[0],this.options.delay[1]) : this.options.delay;
      this.DOM.el.appendChild(piece);
      this.DOM.el.style.width = `${w*this.options.pieces.columns}px`;
      this.DOM.el.style.height = `${h*this.options.pieces.rows}px`;

      return piece;
    }
    // Set the pieces background image.
    setImage(imgsrc) {
      this.imgsrc = imgsrc;
      for(const piece of this.pieces) {
        piece.style.backgroundImage = `url(${this.imgsrc})`;
      }
    }
    initTilt() {
      if ( is3DBuggy ) return;
      this.DOM.el.style.transition = 'transform 0.2s ease-out';
      this.tilt = true;
    }
    removeTilt() {
      if ( is3DBuggy ) return;
      this.tilt = false;
    }
    initEvents() {
      // Mousemove event / Tilt functionality.
      const onMouseMoveFn = (ev) => {
        requestAnimationFrame(() => {
          if ( !this.tilt ) {
            if ( is3DBuggy ) {
              this.DOM.el.style.transform = 'none';
            }
            return false;
          }
          const mousepos = getMousePos(ev);
          const docScrolls = {left : document.body.scrollLeft + document.documentElement.scrollLeft, top : document.body.scrollTop + document.documentElement.scrollTop};
          const mouseposScroll = { x : mousepos.x - docScrolls.left, y : mousepos.y - docScrolls.top };
          const rotX = 2*this.options.tilt.maxRotationX/this.win.height*mouseposScroll.y - this.options.tilt.maxRotationX;
          const rotY = 2*this.options.tilt.maxRotationY/this.win.width*mouseposScroll.x - this.options.tilt.maxRotationY;
          const transX = 2*this.options.tilt.maxTranslationX/this.win.width*mouseposScroll.x - this.options.tilt.maxTranslationX;
          const transY = 2*this.options.tilt.maxTranslationY/this.win.height*mouseposScroll.y - this.options.tilt.maxTranslationY;

          this.DOM.el.style.transform = `perspective(1000px) translate3d(${transX}px, ${transY}px,0) rotate3d(1,0,0,${rotX}deg) rotate3d(0,1,0,${rotY}deg)`;
        });
      };

      // Window resize.
      const onResizeFn = debounce(() => {
        this.win = {width: window.innerWidth, height: window.innerHeight};
        this.DOM.el.style.width = this.DOM.el.style.height = '';
        const elBounds = this.DOM.el.getBoundingClientRect();
        this.dimensions = {width: elBounds.width, height: elBounds.height};
        for (let i = 0, len = this.pieces.length; i < len; i++) {
          const w = Math.round(this.dimensions.width/this.options.pieces.columns);
          const h = Math.round(this.dimensions.height/this.options.pieces.rows);
          const piece = this.pieces[i];
          
          piece.style.width = `${w}px`;
          piece.style.height = `${h}px`;
          piece.style.backgroundSize = `${w*this.options.pieces.columns+4}px auto`;
          this.DOM.el.style.width = `${w*this.options.pieces.columns}px`;
          this.DOM.el.style.height = `${h*this.options.pieces.rows}px`;
        }
      }, 20);

      document.addEventListener('mousemove', onMouseMoveFn);
      window.addEventListener('resize', (ev) => onResizeFn());
    }
    getTotalRows() {
      return this.options.pieces.rows;
    }
    getTotalColumns() {
      return this.options.pieces.columns;
    }
    animate(animeopts) {
      animeopts = animeopts || this.options.animationDefaults;
      let opts = {
        targets: this.pieces
      };
      Object.assign(opts, animeopts);
      anime.remove(this.pieces);
      anime(opts);
    }
  };
  window.Pieces = Pieces;
};

    {
      
      const menuItems = Array.from(document.querySelectorAll('.menu-team > .menu__item-team'));
      
      const piecesObj = new Pieces(document.querySelector('.slideshow-team > .pieces'), {
        pieces: {rows: 14, columns: 12},
        delay: [0,40],
        hasTilt: true,
        tilt: {
          maxRotationX: -1, 
          maxRotationY: -1, 
          maxTranslationX: -5, 
          maxTranslationY: -2
        }
      });
      
      let isAnimating = false;
      let current = 0;

      const openImage = (ev, item, pos) => {
        ev.preventDefault();
        if ( isAnimating || current === pos ) {
          return false;
        }
        isAnimating = true;
        menuItems[current].classList.remove('menu__item--current-team');
        current = pos;
        menuItems[current].classList.add('menu__item--current-team');
        const imgsrc = item.dataset.image;

        piecesObj.animate({
          duration: 200,
          easing: 'easeOutQuad',
          delay: (t,i,l) => {
            return parseInt(t.dataset.row) * parseInt(t.dataset.delay);
          },
          translateX: (t,i) => {
            return anime.random(-50,50)+'px';
          },
          translateY: (t,i) => { 
            return anime.random(-800,-200)+'px';
          },
          rotateZ: (t,i) => { 
            return anime.random(-45,45)+'deg';
          },
          opacity: 0,
          complete: () => {
            piecesObj.setImage(imgsrc);

            piecesObj.animate({
              duration: 500,
              easing: [0.3,1,0.3,1],
              delay: (t,i,l) => {
                return parseInt(t.dataset.row) * parseInt(t.dataset.delay);
              },
              translateX: 0,
              translateY: () => {
                return [anime.random(200,800)+'px','0px'];
              },
              rotateZ: 0,
              opacity: {
                value: 1,
                duration: 500,
                easing: 'linear'
              },
              complete: () => {
                isAnimating = false;
              }
            });
          }
        });
      };

      menuItems.forEach((item,pos) => item.addEventListener('click', (ev) => openImage(ev,item,pos)));
    } 
});
})(jQuery);

</script>
<?php
    return ob_get_clean();
}

// Icon Box
add_shortcode('iconb','iconb_func');
function iconb_func($atts, $content = null){
  extract(shortcode_atts(array(
    'icon'   =>  '',
    'title'    =>  '',
    'stitle'    =>  '',
  ), $atts));
  ob_start(); 
?>  
  <div class="about-wrap">
    <div class="about-icon">
      <i class="<?php echo esc_attr($icon); ?>"></i>
    </div>
    <h6><?php echo esc_attr($title); ?></h6>
    <p><?php echo esc_attr($stitle); ?></p>
  </div>

<?php
    return ob_get_clean();
}

// Testimonial Slide (namos)
add_shortcode('testimonial','testimonial_func');
function testimonial_func($atts, $content = null){
  extract(shortcode_atts(array(
    'place'   =>  '',
    'testimonial'    =>  '',
  ), $atts));
    $testimonials = (array) vc_param_group_parse_atts( $testimonial );
  ob_start(); 
?>  
  <div id="owl-sep-1" class="owl-carousel owl-theme z-index-bigger">
      <?php 
      foreach ( $testimonials as $testi ) : if($testi) : ?>
      <div class="item">                              
        <div class="container"> 
          <div class="twelve columns">  
            <div class="quote-sep"> 
              <h4><?php echo esc_attr($testi['content']); ?></h4>
              <h6><?php echo esc_attr($testi['name']); ?></h6>
            </div>  
          </div>  
        </div>                      
      </div>
      <?php endif; endforeach; ?>
  </div>
  <script type="text/javascript">
  (function($) { "use strict";
    $(document).ready(function() {
    $("#owl-sep-1").owlCarousel({
      navigation: false,
      pagination : true,
      transitionStyle : "fade",
      slideSpeed : 500,
      paginationSpeed : 500,
      singleItem:true,
      autoPlay: 5000
    });
  });
  })(jQuery);
  </script>
<?php
    return ob_get_clean();
}

// Logo Clients (namos)
add_shortcode('clients','clients_func');
function clients_func($atts, $content = null){
    extract(shortcode_atts(array(
        'gallery'           =>  '',
    ), $atts));
        $i = rand(0,9999999);
    ob_start(); ?>
            
        <div id="owl-logos-<?php echo esc_attr($i); ?>" class="owl-logos owl-carousel owl-theme">
            <?php 
                $img_ids = explode(",",$gallery);
                foreach( $img_ids AS $img_id ){
                $meta = wp_prepare_attachment_for_js($img_id);
                $caption = $meta['caption'];
                $title = $meta['title'];    
                $description = $meta['description'];
                $image_src = wp_get_attachment_image_src($img_id,''); 
            ?>
                <div class="item"><?php if($caption){ ?><a href="<?php echo esc_url($caption); ?>" target="_blank" ><?php } ?><img src="<?php echo esc_url( $image_src[0] ); ?>" alt=""><?php if($caption){ ?></a><?php } ?></div>
            <?php } ?>
        </div>

        <script>
            (function($) { "use strict";
                $(document).ready(function() {
                    $("#owl-logos-<?php echo esc_attr($i); ?>").owlCarousel({
                      items : 5,
                      itemsDesktop : [1000,4], 
                      itemsDesktopSmall : [900,3],
                      itemsTablet: [600,2], 
                      itemsMobile : false, 
                      navigation: false,
                      pagination : false,
                      autoPlay : 3000,
                      slideSpeed : 300
                    });
                }); 
            })(jQuery); 
        </script>

<?php
    return ob_get_clean();  
}


// Lastest Blog (use)
add_shortcode('lastest_blog','lastest_blog_func');
function lastest_blog_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>	'3',
	), $atts));

	ob_start(); 
?>
	<?php		
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $number,
		);
		$blogpost = new WP_Query($args);
		if($blogpost->have_posts()) : while($blogpost->have_posts()) : $blogpost->the_post();
		$format = get_post_format();
		$image = wp_get_attachment_url(get_post_thumbnail_id());
	?>
  <div class="twelve columns remove-bottom margin-0">
    <div class="blog-page-wrapper">
      <div class="date-time-blog-page"><?php namos_entry_meta(); ?></div>
      <div class="tooltip tooltip--indis" data-type="indis">
        <div class="tooltip__trigger" role="tooltip">
          <a href="<?php the_permalink(); ?>" ><span class="tooltip__trigger-text"><?php the_title(); ?></span></a>
        </div>
        <div class="tooltip__base">
          <svg class="tooltip__shape" width="100%" height="100%" viewBox="0 0 400 300">
            <path d="M 44.5,24 C 138,4.47 246,-6.47 356,24 367,26.9 376,32.9 376,44 L 376,256 C 376,267 367,279 356,276 231,240 168,241 44.5,276 33.8,279 24.5,267 24.5,256 L 24.5,44 C 24.5,32.9 33.6,26.3 44.5,24 Z"/>
          </svg>
          <div class="tooltip__content">
              <?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true); ?>
              <?php if ( 'audio' == get_post_format() ) { ?>
                    <iframe style="width:100%;border:none;" height="150" scrolling="no" src="<?php echo esc_url( $link_audio ); ?>"></iframe>
                 
              <?php }elseif ( 'gallery' == get_post_format() ) { ?>
                <div id="owl-blog-slider" class="owl-carousel owl-theme">
                    <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                      <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
                      <?php if($images){ ?>                  
                          <?php foreach ( $images as $image ) { ?>
                            <?php $img = $image['full_url']; ?>
                            <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div> 
                          <?php } ?>                                     
                      <?php } ?>
                    <?php } ?>
                </div>                        
                <?php }elseif ( 'video' == get_post_format() ) { ?>
                
                    <?php echo rwmb_meta( '_cmb_link_video', 'type=oembed' ); // if you want get url: $url = get_post_meta( get_the_ID(), '_cmb_link_video', true ); echo $url; ?>        
                
              <?php }elseif ( 'image' == get_post_format() ) { ?>
                
                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                    <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                    <?php if($images != ''){ ?>              
                        <?php  foreach ( $images as $image ) {  ?>
                            <?php $img = $image['full_url']; ?>
                            <img src="<?php echo esc_url($img); ?>" alt="">
                        <?php } ?>                
                    <?php }else{ ?>
                        <?php 
                            if( has_post_thumbnail() ){               
                                 the_post_thumbnail( 'full' ); 
                            } 
                        ?>
                    <?php } ?>
                <?php } ?>
                  
              <?php }else{ ?>               
                                       
                  <?php 
                      if( has_post_thumbnail() ){               
                           the_post_thumbnail( 'full' ); 
                      } 
                  ?>
                
              <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

	<?php endwhile; wp_reset_postdata(); endif; ?>


<?php
    return ob_get_clean();
}

// Portfolio Filter Masonry (namos)
add_shortcode('portfoliofms', 'portfoliofms_func');
function portfoliofms_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'ALL',
		'num'		=> 	'12',
	), $atts));
	ob_start(); ?>
        <div id="portfolio-filter" class="portfolio-filter">
          <ul id="filter">
            <?php 
$tags = get_terms( array(
    'taxonomy' => 'tags',
    'hide_empty' => false,
) );


 ?>



            <li><a href="#" class="current" data-filter="*" title=""><?php echo esc_html($all); ?></a></li>
            <?php 
                $categories = get_terms('categories');
                
                foreach( (array)$categories as $categorie){
                  $cat_name = $categorie->name;
                  $cat_slug = $categorie->slug;
            ?>
            <li class="tipped" data-title="" data-tipper-options='{"direction":"top","follow":"true"}'>
              <a href="#" data-filter=".<?php echo esc_attr( $cat_slug ); ?>"><?php echo esc_attr($cat_name); ?></a>

            </li>
            <?php } ?>
	<!-- Tags start -->
            <li class="tipped sub-tags" data-title="" data-tipper-options='{"direction":"top","follow":"true"}'>
		<a href="#">
<?php
if(ICL_LANGUAGE_CODE == 'en'){
?>
Locations
<?php } elseif(ICL_LANGUAGE_CODE == 'ar'){
?>
مواقعنا
<?php } ?></a>
		<ul>
			

            <?php 

                
                foreach( (array)$tags as $tag){
                  $tag_name = $tag->name;
                  $tag_slug = $tag->slug;
            ?>
		<li class="">
			
              <a href="#"  data-filter=".<?php echo esc_attr( $tag_slug ); ?>"><?php echo esc_attr($tag_name); ?></a>
		</li>
            <?php } ?>
		</ul>
            </li>
<script>
 (function($) { "use strict";
$(function(){
	$('.sub-tags ul a').click(function(){

		$('#portfolio-filter a').removeClass('current');
		
	})
})
	
})(jQuery); 
</script>
	<!-- Tags End -->
          </ul>
        </div>
    <div id="projects-grid" class="in-container have-space">

        <?php 
      			$args = array(   
        			'post_type' => 'portfolio',   
        			'posts_per_page' => $num,	            
      			);  
      			$wp_query = new WP_Query($args);
      			while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
      			$cates = get_the_terms(get_the_ID(),'categories');
            $tags = get_the_terms(get_the_ID(),'tags');
            
      			$cate_name ='';
      			$cate_slug = '';
          		foreach((array)$cates as $cate){
          			if(count($cates)>0){
            			$cate_name .= $cate->name.'';
            			$cate_slug .= $cate->slug .'';     
          			} 
      			}
            $tag_name ='';
            $tag_slug = '';
            foreach((array)$tags as $tag){
                if(count($tag)>0){

                  $tag_name .= $tag->name.'';
                  $tag_slug .= $tag->slug .'';     
                } 
            }
      			$image = wp_get_attachment_url(get_post_thumbnail_id());
		    ?>
        <a href="<?php the_permalink(); ?>" >
          <div class="portfolio-box-1 half-width have-space <?php echo esc_attr($cate_slug); ?> <?php echo esc_attr($tag_slug); ?>">
            <h2><?php the_title(); ?> <?php esc_attr($cate_name); ?></h2>

            <img src="<?php echo esc_url($image); ?>" alt="">
          </div>
        </a>
        <?php endwhile; ?>
    </div>
<?php
    return ob_get_clean();
}
// new portfolio st


// Portfolio Filter Masonry (namos)
add_shortcode('portfoliofmsn', 'portfoliofms_funcn');
function portfoliofms_funcn($atts, $content = null){
  extract(shortcode_atts(array(
    'all'   =>  'ALL',
    'num'   =>  '-1',
  ), $atts));
  ob_start(); ?>
        
    <div id="projects-grid" class="in-container have-space">

        <?php 
            $args = array(   
              'post_type' => 'portfolio',   
              'posts_per_page' => $num,             
              'tax_query' => array(
                   array(
                       'taxonomy' => 'categories',
                       'field' => 'term_id',
                       'terms' => get_queried_object_id(),
                   )
               )
            );  
            $wp_query = new WP_Query($args);
            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
            $image = wp_get_attachment_url(get_post_thumbnail_id());
        ?>
        <a href="<?php the_permalink(); ?>" >
          <div class="portfolio-box-1 half-width have-space ">
            <h2><?php the_title(); ?> </h2>

            <img src="<?php echo esc_url($image); ?>" alt="">
          </div>
        </a>
        <?php endwhile; ?>
    </div>
<?php
    return ob_get_clean();
}



// Google Map 
add_shortcode('ggmap','ggmap_func');
function ggmap_func($atts, $content = null){
    extract( shortcode_atts( array(      
      'lat'      => '',
      'long'     => '',
      'zoom'     => '',
      'icon'     => '',
      'gmap_custom_style' => '',
  ), $atts ) );

  $gmap_custom_style = rawurldecode( base64_decode( strip_tags( $gmap_custom_style ) ) );
  $icon1 = wp_get_attachment_image_src($icon,'full');
  $icon1 = $icon1[0];

  $id = uniqid( 'gmap-' );

  $zoom1 = (!empty($zoom) ? $zoom : 15);

  ob_start(); ?>

    <div id="cd-google-map">
      <div id="google-container"></div>
      <div id="cd-zoom-in"></div>
      <div id="cd-zoom-out"></div>
    </div>

    <script type="text/javascript">
        (function($) { "use strict";
    
    //set your google maps parameters

    $(document).ready(function(){
        var latitude = <?php echo esc_attr($lat); ?>,
      longitude = <?php echo esc_attr($long); ?>,
      map_zoom = <?php echo esc_attr($zoom1); ?>;

    //google map custom marker icon - .png fallback for IE11
    var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
    var marker_url = ( is_internetExplorer11 ) ? '<?php echo esc_url($icon1); ?>' : '<?php echo get_template_directory_uri() ?>/assets/images/cd-icon-location.svg';
      
    //define the basic color of your map, plus a value for saturation and brightness
    var main_color = '#e67e22',
      saturation_value= -50,
      brightness_value= 14;

    //we define here the style of the map
    
      
    //set google map options
    var map_options = {
      center: new google.maps.LatLng(latitude, longitude),
      zoom: map_zoom,
      panControl: false,
      zoomControl: false,
      mapTypeControl: false,
      streetViewControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scrollwheel: false,
      styles: <?php echo $gmap_custom_style; ?>,
    }
    //inizialize the map
    var map = new google.maps.Map(document.getElementById('google-container'), map_options);
    //add a custom marker to the map        
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(latitude, longitude),
      map: map,
      visible: true,
      icon: marker_url,
    });

    //add custom buttons for the zoom-in/zoom-out on the map
    function CustomZoomControl(controlDiv, map) {
      //grap the zoom elements from the DOM and insert them in the map 
      var controlUIzoomIn= document.getElementById('cd-zoom-in'),
        controlUIzoomOut= document.getElementById('cd-zoom-out');
      controlDiv.appendChild(controlUIzoomIn);
      controlDiv.appendChild(controlUIzoomOut);

      // Setup the click event listeners and zoom-in or out according to the clicked element
      google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
        map.setZoom(map.getZoom()+1)
      });
      google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
        map.setZoom(map.getZoom()-1)
      });
    }

    var zoomControlDiv = document.createElement('div');
    var zoomControl = new CustomZoomControl(zoomControlDiv, map);

    //insert the zoom div on the top left of the map
    map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);  
  
        
    });
	
})(jQuery); 

    </script>

<?php
    return ob_get_clean();
}

