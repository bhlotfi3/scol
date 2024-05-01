<!-- service section -->
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="center-title">
				<?php
				$site_intro_title = get_theme_mod('site_intro_title','We are weblizar'); 
				if ( ! empty( $site_intro_title ) ) { ?>
				<div class="heading-title">
					<h2 class="h2-section-title weblizar_site_intro_title"><?php echo esc_html($site_intro_title); ?></h2>
				</div>
				<?php } 
				$site_intro_text = get_theme_mod('site_intro_text','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.');
				if ( ! empty( $site_intro_text ) ) { ?>
					<p class="weblizar_site_intro_text"> <?php echo esc_html($site_intro_text); ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php 
$service_home = get_theme_mod('service_home','on');
if($service_home == 'on') { ?>
	<div class="space-sep60"></div>	
	<div class="container">
		<div class="row">
			<?php 
			$service_1_title = get_theme_mod('service_1_title','Idea');
			$service_2_title = get_theme_mod('service_2_title','Design');
			$service_3_title = get_theme_mod('service_3_title','Management');
			$service_4_title = get_theme_mod('service_4_title','Development');
			$service_1_icons = get_theme_mod('service_1_icons','fas fa-brain');
			$service_2_icons = get_theme_mod('service_2_icons','fab fa-sketch');
			$service_3_icons = get_theme_mod('service_3_icons','fas fa-tasks');
			$service_4_icons = get_theme_mod('service_4_icons','fas fa-laptop-code');
			$service_1_text = get_theme_mod('service_1_text','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.');
			$service_2_text = get_theme_mod('service_2_text','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.');
			$service_3_text = get_theme_mod('service_3_text','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.');
			$service_4_text = get_theme_mod('service_4_text','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.');
			$service_1_link = get_theme_mod('service_1_link','#');
			$service_2_link = get_theme_mod('service_2_link','#');
			$service_3_link = get_theme_mod('service_3_link','#');
			$service_4_link = get_theme_mod('service_4_link','#');
			if(! empty( $service_1_title ) || ! empty( $service_1_icons )) { ?>
				<div class="col-md-3 col-sm-6">
					<div class="content-box content-style2 anim-opacity animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0.2s" style="-webkit-animation: 1s 0.2s;">	
						<?php if(! empty( $service_1_title )) { ?>
						<h4 class="h4-body-title weblizar_service_1_title"><i class="<?php if(! empty( $service_1_icons )) { echo esc_attr($service_1_icons); } ?> weblizar_service_1_icons"></i><?php echo esc_html($service_1_title); ?></h4>
						<?php } ?>
						<div class="content-box-text weblizar_service_1_text">
							<?php if(! empty($service_1_text)) { echo html_entity_decode(get_theme_mod('service_1_text' , $service_1_text)); } ?>
							<div><a href="<?php if(! empty( $service_1_link )) { echo esc_url($service_1_link); } ?>" class="read-more "><span><?php esc_html_e('read more', 'weblizar'); ?></span></a></div>
						</div>
					</div>
				</div>
			<?php } if(! empty( $service_2_title ) || ! empty( $service_2_icons )) { ?>
				<div class="col-md-3 col-sm-6">
					<div class="content-box content-style2 anim-opacity animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0.2s" style="-webkit-animation: 1s 0.2s;">	
						<?php if(! empty( $service_2_title )) { ?>
						<h4 class="h4-body-title weblizar_service_2_title"><i class="<?php if(! empty($service_2_icons)) { echo esc_attr($service_2_icons); } ?> weblizar_service_2_icons"></i><?php echo esc_html($service_2_title);   ?></h4>
						<?php } ?>
						<div class="content-box-text weblizar_service_2_text">
							<?php if(!empty($service_2_text)) { echo html_entity_decode(get_theme_mod('service_2_text' , $service_2_text)); } ?>
							<div><a href="<?php if(!empty($service_2_link)) { echo esc_url($service_2_link); } ?>" class="read-more "><span><?php echo esc_html('read more', 'weblizar'); ?></span></a></div>
						</div>
					</div>
				</div>
			<?php } if(!empty($service_3_title) || !empty($service_3_icons)) { ?>
				<div class="col-md-3 col-sm-6">
					<div class="content-box content-style2 anim-opacity animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0.2s" style="-webkit-animation: 1s 0.2s;">	
						<?php if(!empty($service_3_title)) { ?>
						<h4 class="h4-body-title weblizar_service_3_title"><i class="<?php if(!empty($service_3_icons)) { echo esc_attr($service_3_icons); } ?> weblizar_service_3_icons"></i><?php echo esc_html($service_3_title);   ?></h4>
						<?php } ?>
						<div class="content-box-text weblizar_service_3_text">
							<?php if(!empty($service_3_text)) { echo html_entity_decode(get_theme_mod('service_3_text' , $service_3_text)); } ?>
							<div><a href="<?php if(!empty($service_3_link)) { echo esc_url($service_3_link); } ?>" class="read-more "><span><?php echo esc_html__('read more', 'weblizar'); ?></span></a></div>
						</div>
					</div>
				</div>
			<?php } if(!empty($service_4_title) || !empty($service_4_icons)) { ?>
				<div class="col-md-3 col-sm-6">
					<div class="content-box content-style2 anim-opacity animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0.2s" style="-webkit-animation: 1s 0.2s;">	
						<?php if(!empty($service_4_title)) { ?>
						<h4 class="h4-body-title weblizar_service_4_title"><i class="<?php if(!empty($service_4_icons)) { echo esc_attr($service_4_icons); } ?> weblizar_service_4_icons"></i><?php echo esc_html($service_4_title); ?></h4>
						<?php } ?>
						<div class="content-box-text weblizar_service_4_text">
							<?php if(!empty($service_4_text)) { echo html_entity_decode(get_theme_mod('service_4_text' , $service_4_text)); } ?>
							<div><a href="<?php if(!empty($service_4_link)) { echo esc_url($service_4_link); } ?>" class="read-more "><span><?php echo esc_html__('read more', 'weblizar'); ?></span></a></div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
<div class="space-sep60"></div>