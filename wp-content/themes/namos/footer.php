<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage namos
 * @since 1.0
 * @version 1.2
 */

?>
	<div class="section padding-top-bottom background-black">

		<div class="container">
			<div class="six columns footer" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
				<p><?php //echo htmlspecialchars_decode(namos_get_option('copyright')) ?> </p>

<?php
if(ICL_LANGUAGE_CODE == 'en'){
?>
		<p><?php echo htmlspecialchars_decode(namos_get_option('copyright')) ?> </p>
<?php } elseif(ICL_LANGUAGE_CODE == 'ar'){
?>
<p>
	أتصل بنا على  <a class="footer-number" href="#">+971-4-551-9653 
</a><br>أو راسلنا على البريد الكترونى <a href="mailto:info@darmesk.com">info@darmesk.com</a>
</p>

<?php } ?>

			</div>
			<?php if ( namos_get_option('socialfooter_switch') != false ){  ?>
			<div class="six columns" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" style="">
			<ul class="footer-social">
								                                          
			            <li><a target="_blank" class="facebook" href="https://twitter.com/dar_mesk"><i class="fa fa-twitter-square"></i>

</a></li>                            
			                                          
			            <li><a target="_blank" class="facebook" href="https://www.facebook.com/darmesk/"><i class="fa fa-facebook-square"></i>

</a></li>                            
			                                          
			            <li><a target="_blank" class="facebook" href="https://www.instagram.com/darmesk/"><i class="fa fa-instagram"></i>

</a></li>                            
			                                          
			            <li><a target="_blank" class="facebook" href="https://www.linkedin.com/company/darmesk-architects/"><i class="fa fa-linkedin"></i>

</a></li>                     

                                    
			            <li><a target="_blank" class="facebook" href="https://www.pinterest.com/zeidow/darmesk-architects/"><i class="fa fa-pinterest"></i>

</a></li>                     
                                    
			            <li><a target="_blank" class="facebook" href="https://plus.google.com/108888557173295111018"><i class="fa fa-google-plus"></i>

</a></li>                            
			         
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>

	<div class="scroll-to-top tipped" data-title="<em>top</em>"  data-tipper-options='{"direction":"bottom","follow":"true","margin":20}'></div>
	
    <!-- footer close -->

<?php wp_footer(); ?>

</body>
</html>
