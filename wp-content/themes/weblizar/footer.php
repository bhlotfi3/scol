<?php 
 /* The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage weblizar
 */
?>
<footer>
    <div class="footer">
        <div class="container">
            <div class="footer-wrapper">
                <div class="row">
					<?php 
					if(is_active_sidebar( 'footer-widget-area' ))
					{ 
						dynamic_sidebar( 'footer-widget-area' ); 
					} ?>
				</div>			
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
					<div class="col-md-6 col-sm-6">
                        <div class="copyright-text weblizar_footer_customizations">
                        	<?php 
                        	$footer_customizations = get_theme_mod('footer_customizations', '@ ');
			                $developed_by_text = get_theme_mod('developed_by_text', 'Powered By');
			                $developed_by_link = get_theme_mod('developed_by_link', '#');
			                $developed_by_weblizar_text = get_theme_mod('developed_by_weblizar_text', 'WordPress');
			                $footer_section_social_media_enbled = get_theme_mod('footer_section_social_media_enbled', 1);
							if (!empty ($footer_customizations)) {
								echo esc_html(get_theme_mod('footer_customizations', '@ 2020  Theme')); 
							}
							if (!empty ($developed_by_text))  { echo "|" .esc_html(get_theme_mod('developed_by_text', 'Theme Developed By')); } ?>
							<a  rel="nofollow" href="<?php if (!empty ($developed_by_link)) {
			                    echo esc_url(get_theme_mod('developed_by_link', ' '));
			                } ?>" target="_blank">
							<?php if (!empty ($developed_by_weblizar_text)) {
		                        echo esc_html(get_theme_mod('developed_by_weblizar_text', ' '));
		                    } ?>
							</a>
						</div>
                    </div>
                    <div class="weblizar_social_media_enbled">
					<?php if ($footer_section_social_media_enbled == 1) { ?>
	                    <div class="col-md-6 col-sm-6"> 
							<div class="social-icons">
								<ul> 
									<?php 
									$fb_link = get_theme_mod('social_media_facebook_link', '#');
									if (!empty ($fb_link)) { ?>
									<li><a href="<?php echo esc_url(get_theme_mod('social_media_facebook_link', '#')); ?>" title="facebook" target="_blank" class="social-media-icon facebook-icon"><?php esc_html_e('Facebook','weblizar'); ?></a></li>
									<?php }
									$twitter_link = get_theme_mod('social_media_twitter_link', '#');
                        			if (!empty ($twitter_link)) { ?>
									<li><a href="<?php echo esc_url(get_theme_mod('social_media_twitter_link', '#')); ?>" title="twitter" target="_blank" class="social-media-icon twitter-icon"><?php esc_html_e('Twitter','weblizar'); ?></a></li>
									<?php } 
									$linkedin_link = get_theme_mod('social_media_linkedin_link', '#');
                        			if (!empty ($linkedin_link)) {  ?>
									<li class="weblizar_social_media_linkedin_link"><a href="<?php echo esc_url(get_theme_mod('social_media_linkedin_link', '#')); ?>" title="linkedin" target="_blank" class="social-media-icon linkedin-icon"><?php esc_html_e('Linkedin','weblizar'); ?></a></li>
									<?php } ?>
								</ul>
							</div>
	                    </div>
					<?php } ?>
				</div>
                </div>
            </div>
        </div>			 
   	</div>
   	<span id="blog_count">
   		<?php 
   		$blog_count = get_theme_mod('blog_count');
   		global $published_posts; 
   		echo esc_attr($blog_count).' ,'.esc_attr($published_posts); ?>
   	</span> </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>