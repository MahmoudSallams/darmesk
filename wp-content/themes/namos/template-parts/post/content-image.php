
<div class="twelve columns remove-top remove-bottom">
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
                </div>
            </div>
        </div>
    </div>
</div>