<?php
// Template Name: Home Page
get_header(); 
$weblizar_slider = get_theme_mod('weblizar_slider','1');
if($weblizar_slider=='1'){
	get_template_part('home','slider1');
} else {
	get_template_part('home','slider2');
} ?>
<div class="content-wrapper">    
	<div class="body-wrapper">
	<?php 
	if($sections = json_decode(get_theme_mod('home_reorder'),true)) {
		  foreach ($sections as $section) {
			$data =$section.'_home';
			if(get_theme_mod($data,'on')=="on") {
				get_template_part('home', $section);
			}
		}
	} else {
		if (get_theme_mod('services_home', 'on') == 'on') {
			get_template_part('home','service'); 
		}
		if (get_theme_mod('blog_home', 'on') == 'on') {
			get_template_part('home','blog');
		}
	} ?>			
	</div>
</div><!--.content-wrapper end -->
<?php  get_footer(); ?>