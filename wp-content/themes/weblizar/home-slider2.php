<div class="guardian_options_slider">
	<div class="swiper-container top_slider">
		<div class="swiper-wrapper ">
			<?php 
			$ImageUrl1 = get_template_directory_uri() ."/images/slide-1.jpg";
			$ImageUrl2 = get_template_directory_uri() ."/images/slide-2.jpg";
			$ImageUrl3 = get_template_directory_uri() ."/images/slide-3.jpg"; 
			$slide_image = get_theme_mod('slide_image',$ImageUrl1);
			if(!empty($slide_image)) { ?>			
				<div class="swiper-slide">
					<img src="<?php echo esc_url($slide_image); ?>" alt="<?php  the_title(); ?>" class="home_slider img-responsive" />
					<div class="overlay"></div>
					<div class="carousel-caption">	
						<?php 
						$slide_title = get_theme_mod('slide_title','Welcome To Weblizar Slider 1');
    					if(!empty($slide_title)) {  ?> <p class="guardian_slide_title animation animated-item-1"><strong><?php echo  esc_attr($slide_title); ?></strong></p>	<?php } 
						$slide_desc = get_theme_mod('slide_desc','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','weblizar');
		 				if(!empty($slide_desc)) { ?>
							<p class="guardian_slide_desc animation animated-item-2"><?php echo  html_entity_decode(get_theme_mod('slide_desc' , $slide_desc)); ?></p>
						<?php } 
						$slide_btn_text = get_theme_mod('slide_btn_text','Read More');
     					$slide_btn_link = get_theme_mod('slide_btn_link','#');
						if(!empty($slide_btn_text)) { ?>
							<p class="slider-btn"><a class="btn btn-lg btn-primary animation animated-item-3" target="_blank" href="<?php if(!empty($slide_btn_link)) { echo esc_url($slide_btn_link); }  ?>" role="button"><?php echo esc_attr($slide_btn_text); ?></a></p>
						<?php } ?>
					</div>
				</div> 
			<?php } 
			$slide_image_1 = get_theme_mod('slide_image_1',$ImageUrl2);
    		if(!empty($slide_image_1)) { ?>			
				<div class="swiper-slide">
					<img src="<?php echo esc_url($slide_image_1); ?>" alt="<?php  the_title(); ?>" class="home_slider img-responsive" />
					<div class="overlay"></div>
					<div class="container">
						<div class="carousel-caption">	
							<?php $slide_title_1 = get_theme_mod('slide_title_1','Welcome To Weblizar Slider 2');
	    					if(!empty($slide_title_1)) {  ?> 
	    						<p class="guardian_slide_title animation animated-item-1"><strong><?php echo  esc_attr($slide_title_1); ?></strong></p>	
	    					<?php } 
							$slide_desc_1 = get_theme_mod('slide_desc_1','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','weblizar');
	     					if(!empty($slide_desc_1)) {  ?>
								<p class="animation animated-item-2 guardian_slide_desc "><?php echo  html_entity_decode(get_theme_mod('slide_desc_1' , $slide_desc_1)); ?></p>
							<?php }   
							$slide_btn_text_1 = get_theme_mod('slide_btn_text_1','Read More');
	     					$slide_btn_link_1 = get_theme_mod('slide_btn_link_1','#');
	      					if(!empty($slide_btn_text_1)) { ?>
								<p class="slider-btn"><a class="btn btn-lg btn-primary animation animated-item-3" target="_blank" href="<?php if(!empty($slide_btn_link_1)) { echo esc_url($slide_btn_link_1); }  ?>" role="button"><?php echo esc_attr($slide_btn_text_1); ?></a></p>
							<?php } ?>
						</div>
					</div>
				</div> 
				<?php } 
				$slide_image_2 = get_theme_mod('slide_image_2',$ImageUrl3);
    			if(!empty($slide_image_2)) { ?>		
					<div class="swiper-slide">
						<img src="<?php echo esc_url($slide_image_2); ?>" alt="<?php  the_title(); ?>" class="home_slider img-responsive" />
						<div class="overlay"></div>
						<div class="container">
							<div class="carousel-caption">	
							<?php 
							$slide_title_2 = get_theme_mod('slide_title_2','Welcome To Weblizar Slider 3');
    						if(!empty($slide_title_2)) { ?> 
    							<p class="guardian_slide_title animation animated-item-1"><strong><?php echo  esc_attr($slide_title_2); ?></strong></p>	
    						<?php }
							$slide_desc_2 = get_theme_mod('slide_desc_2','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','weblizar');
     						if(!empty($slide_desc_2)) {  ?>
								<p class="guardian_slide_desc animation animated-item-2"><?php echo  html_entity_decode(get_theme_mod('slide_desc_2' , $slide_desc_2)); ?></p>
							<?php }
							$slide_btn_text_2 = get_theme_mod('slide_btn_text_2','Read More');
     						$slide_btn_link_2 = get_theme_mod('slide_btn_link_2','#');
      						if(!empty($slide_btn_text_2)) { ?>
								<p class="slider-btn"><a class="btn btn-lg btn-primary animation animated-item-3" target="_blank" href="<?php if(!empty($slide_btn_link_2)) { echo esc_url($slide_btn_link_2); }  ?>" role="button"><?php echo esc_attr($slide_btn_text_2); ?></a></p>
							<?php } ?>
							</div>
						</div>
					</div> 
				<?php } ?>
			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-prev swiper-button-prev5 swiper-button-white"></div>
			<div class="swiper-button-next swiper-button-next5 swiper-button-white"></div>
		</div>	
	</div>