<?php if (!function_exists('weblizar_info_page')) {
	function weblizar_info_page() {
	$page1=add_theme_page(__('Welcome to Weblizar', 'weblizar'), __('About Weblizar <i class="fa fa-star theme-icon"></i>', 'weblizar'), 'edit_theme_options', 'weblizar', 'weblizar_display_theme_info_page');
	
	add_action('admin_print_styles-'.$page1, 'weblizar_admin_info');
	}	
}
add_action('admin_menu', 'weblizar_info_page');

function weblizar_admin_info(){
	// CSS
	wp_enqueue_style('weblizar-bootstrap',  get_template_directory_uri() .'/core/admin/bootstrap/css/bootstrap.css');
	wp_enqueue_style('weblizar-admin',  get_template_directory_uri() .'/core/admin/admin-themes.css');
	wp_enqueue_style('weblizar-font-awesome',  get_template_directory_uri() .'/css/font-awesome-5.11.2/css/all.css');
	//JS
	wp_enqueue_script('jquery');
	wp_enqueue_script('weblizar-bootstrap',get_template_directory_uri() .'/core/admin/bootstrap/js/bootstrap.js');
} 
if (!function_exists('weblizar_display_theme_info_page')) {
	function weblizar_display_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
		<div class="wrap elw-page-welcome about-wrap seting-page">

    	<div class="col-md-12 settings">
	        <div class=" col-md-9">
	            <div class="col-md-12" style="padding:0">
					<?php $wl_th_info = wp_get_theme(); ?>
					<h2><span class="elw_shortcode_heading"><?php esc_html_e('Welcome to Weblizar - Version ','weblizar'); echo esc_html( $wl_th_info->get('Version') ); ?> </span></h2>
					<p style="font-size:19px;color: #555d66;"><?php esc_html_e('Weblizar is a powerful and versatile WordPress theme with pixel perfect design and outstanding functionality. It is by far the most advanced free WordPress theme available today with loads of unmatched customization options.  Weblizar offers a fullscreen featured image slideshow built using cutting-edge technology, lightweight assets, and offers featured image support. You can use weblizar theme for your business, blogging, hotel, doctors, freelancer resume, restaurant or any type of large or small business website. It has 4 page layouts, 2 page templates, It has five widgets available (one sidebar, four footers), and using the sidebar widget also enables you to make a two-column design.weblizar has custom menus support to choose the menu in Primary Location that is in Header area of the site.In the footer section ,theme offers Social Media Links to add your Social Links here.','weblizar')?></p>
	            </div>
			</div>
       
	        <div class="col-md-3">
				<div class="update_pro">
					<h3><?php esc_html_e('Upgrade Pro','weblizar')?> </h3>
					<a class="demo" href="<?php echo esc_url( __( 'http://demo.weblizar.com/weblizar-premium/', 'weblizar' ) ); ?>"><?php echo esc_html__('Get Pro In $29','weblizar');?></a>
				</div>
			</div>
		</div>

        <!-- Themes & Plugin -->
        <div class="col-md-12  product-main-cont">
            <ul class="nav nav-tabs product-tbs">
			    <li class="active"><a data-toggle="tab" href="#start"> <?php esc_html_e('Getting Started','weblizar');?> </a></li>
                <li><a data-toggle="tab" href="#themesd"><?php esc_html_e('Weblizar premium ','weblizar');?> </a></li>
				<li><a data-toggle="tab" href="#freepro"><?php esc_html_e('Free Vs Pro','weblizar');?></a></li>
            </ul>

            <div class="tab-content">
				<div id="start" class="tab-pane fade in active">
                    <div class="space  theme active">
						<div class=" p_head theme">
                            <!--<h1 class="section-title">WordPress Themes</h1>-->
                        </div>							

                        <div class="row p_plugin blog_gallery">
                            <div class="col-xs-12 col-sm-7 col-md-7 p_plugin_pic">
                                <h4><?php echo esc_html__('Step 1: Create a Homepage','weblizar');?></h4>
								<ol>
								<li> <?php esc_html_e( 'Create new page from Pages->Add New, Give it a name ( Home )', 'weblizar' ); ?> </li>
									<li> <?php esc_html_e( 'Then through \'Page Attributes\' options select \'Template\' as \'Home Template\' and publish it. ', 'weblizar' ); ?> </li>
									<li> <?php esc_html_e( 'Then go to Settings->Reading->Your homepage displays, Click on  \'A static page (select below)\' then select \'Home\' as \'Homepage\'.', 'weblizar' ); ?> </li>
									<li> <?php esc_html_e( 'For Blog Page go to Settings->Reading->Your homepage displays, Click on  \'A static page (select below)\' then select your \'Blog page\' as \'Posts page\'. ( Optional Step )', 'weblizar' ); ?> </li>
									<li> <?php esc_html_e( 'Then save it. Its Done.!!', 'weblizar' ); ?> </li>
								</ol>
								<a class="add_page" target="_blank" href="<?php echo esc_url(admin_url('/post-new.php?post_type=page'),'weblizar') ?>"><?php esc_html_e('Add New Page ','weblizar');?></a>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                <div class="row p-box">
                                     <div class="img-thumbnail">
									<img src="<?php echo esc_attr(get_template_directory_uri(),'weblizar'); ?>/screenshot.jpg" class="img-responsive" alt="img"/>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p_plugin blog_gallery child">
							
		                        <div class="col-xs-12 col-sm-7 col-md-9 p_plugin_pic">
		                            <h4> <?php echo esc_html__( 'How to Recover Homepage previous data ', 'weblizar' ).' '.wp_kses_post( '<a target="_blank" href=" https://youtu.be/bxDM_Zsu4Ok ">watch video is here </a>(Same process as Enigma)' ); ?></h4>
									
									<ol>
									<li> <?php esc_html_e( 'First you need to setup homepage, Follow above instructions.', 'weblizar' ); ?> </li>
									<li> <?php esc_html_e( 'Then you need to install our plugin \'Weblizar Companion\' its required to recover your data.','weblizar' ); ?> </li>
									<li> <?php esc_html_e( 'After installing our plugin \'Weblizar Companion\', you can see a new tab option in Appearance tab. ', 'weblizar' ); ?> </li>
									<li> <?php esc_html_e( 'Then go to Appearance->Import/Export, from here you can restore your previous home template data ( If exist in Database )', 'weblizar'); ?> </li>
									<li> <?php esc_html_e( 'Jsut Click the Import button and its done.!!','weblizar' ); ?> </li>
									<li> <?php esc_html_e( 'It will show you a success message means your data is restored successfully.!!','weblizar' ); ?> </li>
									</ol>
									 
		                        </div>
		                        <div class="col-xs-12 col-sm-5 col-md-3 p_plugin_desc">
		                            <div class="row p-box">
		                                 <div class="img-thumbnail">
										<img src="<?php echo esc_url(get_template_directory_uri(),'weblizar'); ?>/images/recover.jpg" class="img-responsive" alt="img"/>
		                            </div>
		                            </div>
		                        </div>
		                    </div>
						<div class="row p_plugin blog_gallery">
                            <div class="col-xs-12 col-sm-4 col-md-12 p_plugin_pic">
                                <h4><?php echo esc_html__(' Step 2: Customizer Options Panel ','weblizar');?> </h4>
								<ol>
								<li><?php echo esc_html__(' Go to Appearance -> Customize > Theme Options ','weblizar');?> </li>
								<li><?php echo esc_html__(' Theme General Options - Theme General Options use for logo width and height, sticky header on/off and add custom css.','weblizar');?>  </li>
								<li><?php echo esc_html__(' Theme Slider Options - It is use to select slider 1 or 2, add slider image, title, description and enable/disable slider on homepage.','weblizar');?> </li>
								<li><?php echo esc_html__(' Home Blog Options - Use to add blog title, description, blog excerpt length and enable/disable blog section on homepage and select category.','weblizar');?> </li>
								<li><?php echo esc_html__(' Service Options - It is use to add service icon, title, description and enable/disable service on homepage.','weblizar');?> </li>
								<li><?php echo esc_html__(' Excerpt Options - It is use to select Excerpt length only for home blog section.','weblizar');?> </li>
								<li><?php echo esc_html__(' Header Options - It is use to add email, phone no and search form enable/disable for header.','weblizar');?></li>
								<li><?php echo esc_html__(' Footer Options - Use to add Customization text, developed by text and developed by link.','weblizar');?> </li>
								<li><?php echo esc_html__(' Social Options - enable/disable social option on footer , add social links.','weblizar');?> </li>
								<li><?php echo esc_html__(' Home Page Layout Option - use for front page section order.','weblizar');?> </li>
								</ol>
								<a class="add_page" target="_blank" href="<?php echo esc_url(admin_url('customize.php'),'weblizar'); ?>"><?php esc_html_e('Go to Customizer','weblizar');?></a>
                            </div>
                        </div>
						
						
						<div class="row p_plugin blog_gallery visit_pro">
                            <p><?php esc_html_e('Visit Our Latest Pro Themes & See Demos','weblizar');?></p>
							<p style="font-size: 17px !important;"><?php esc_html_e('We have put in a lot of effort in all our themes, free and premium both. Each of our Premium themes has a corresponding free version so that you can try out the theme before you decide to purchase it.','weblizar');?></p>
							<a href="<?php echo esc_url( __( 'https://weblizar.com/themes/', 'weblizar' ) ); ?>"><?php esc_html_e('Visit Themes','weblizar');?></a>
                        </div>	
                    </div>
                </div>
				
				<!-- end 1st tab -->
				<div id="themesd" class="tab-pane fade">
                    <div class="space theme">
						<div class=" p_head theme">
                            <!--<h1 class="section-title">WordPress Themes</h1>-->
                        </div>								
                        <div class="row p_plugin blog_gallery">
                            <div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
                                <div class="img-thumbnail">
									<img src="<?php echo esc_attr(get_template_directory_uri(),'weblizar');?>/images/weblizar-pro.png" class="img-responsive" alt="img"/>
                                </div>
							</div>
                            <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                <div class="row p-box">
                                    <div>
                                        <p><strong><?php echo esc_html__('Description:','weblizar');?></strong><?php esc_html_e('Weblizar Premium theme is a super professional one page WordPress theme for modern businesses. It is cross-browser compatible, fully responsive, and retina ready. This professional online store is designed by qualified developers in accordance with modern standards. It combines a compelling look with a great functionality and smooth navigation that ensure a first rate buying experience to the customers.','weblizar');?></p>
                                    </div>
									<p><strong><?php echo esc_html__('Tags:','weblizar');?> </strong><?php esc_html_e('custom-background, custom-menu, featured-image-header, featured-images, flexible-header, four-columns, right-sidebar, sticky-post, theme-options, threaded-comments, three-columns, two-columns, full-width-template, grid-layout, editor-style','weblizar');?></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
                                <div class="price1">
                                    <span class="currency"><?php esc_html_e('USD','weblizar');?></span>
                                    <span class="price-number"><?php echo esc_html__('$','weblizar');?><span><?php esc_html_e('29','weblizar');?></span></span>
                                </div>
                                <div class="btn-group-vertical">
                                    <a class="btn btn-primary btn-lg" href="<?php echo esc_url( __( 'https://weblizar.com/themes/weblizar-premium-theme/', 'weblizar' ) ); ?>"><?php esc_html_e('Detail','weblizar');?></a>
                                </div>
                            </div>
                        </div>
						
						
						<div class="row p_plugin blog_gallery">
                            <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                <div class="img-thumbnail pro_theme">
									<img src="<?php echo esc_attr(get_template_directory_uri(),'weblizar');?>/images/nineteen-pro.png" class="img-responsive" alt="img"/>
									<div class="btn-vertical">
									<h4 class="pro_thm">
                                    <a href="<?php echo esc_url( __( 'https://weblizar.com/themes/nineteen-premium-theme-for-business/', 'weblizar' ) ); ?>"><?php esc_html_e('Nineteen Premium','weblizar');?></a></h4>
									</div>
                                </div>
								
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                <div class="img-thumbnail pro_theme">
									<img src="<?php echo esc_attr(get_template_directory_uri(),'weblizar');?>/images/Responsive-Beauty.png" class="img-responsive" alt="img"/>
									<div class="btn-vertical">
									<h4 class="pro_thm">
                                    <a href="<?php echo esc_url( __( 'https://weblizar.com/themes/beautyspa-premium/', 'weblizar' ) ); ?>"><?php esc_html_e('Beautyspa Premium','weblizar');?></a></h4>
									</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                <div class="img-thumbnail pro_theme">
									<img src="<?php echo esc_attr(get_template_directory_uri(),'weblizar');?>/images/explora.png" class="img-responsive" alt="img"/>
									<div class="btn-vertical">
									<h4 class="pro_thm">
                                    <a href="<?php echo esc_url( __( 'https://weblizar.com/themes/explora-premium/', 'weblizar' ) ); ?>"><?php esc_html_e('Explora Premium','weblizar');?></a></h4>
									</div>
                                </div>
                            </div>
                        </div>
						<div class="row p_plugin blog_gallery visit_pro">
                            <p><?php esc_html_e('Visit Our Latest Pro Themes & See Demos','weblizar');?></p>
							<p style="font-size: 17px !important;"><?php esc_html_e('We have put in a lot of effort in all our themes, free and premium both. Each of our Premium themes has a corresponding free version so that you can try out the theme before you decide to purchase it.','weblizar');?></p>
							<a href="https://weblizar.com/themes/"><?php esc_html_e('Visit Themes','weblizar');?></a>
                        </div>	
                    </div>
                </div>
					
				<div id="freepro" class="tab-pane fade">
					<div class=" p_head theme">
                        <!--<h1 class="section-title">Weblizar Offers</h1>-->
                    </div>
					<div class="row p_plugin blog_gallery">		
						<div class="columns">
						  <ul class="price">
							<li class="header" style="background:#31A3DD"><?php esc_html_e('Weblizar','weblizar');?></li>
							<li class="grey"><?php esc_html_e('Features','weblizar');?></li>
							<li><?php esc_html_e('Front Page','weblizar');?></li>
							<li><?php esc_html_e('Box Layout','weblizar');?></li>
							<li><?php esc_html_e('Theme Option Panel','weblizar');?></li>
							<li><?php esc_html_e('Unlimited Color Skins','weblizar');?></li>
							<li><?php esc_html_e('Multilingual','weblizar');?></li>
							<li><?php esc_html_e('3 Service Page Layout','weblizar');?></li>
							<li><?php esc_html_e('Contact Page Template','weblizar');?></li>
							<li><?php esc_html_e('Blog Template','weblizar');?></li>
							<li><?php esc_html_e('Custom Shortcodes','weblizar');?></li>
						  </ul>
						</div>
					
						<div class="columns">
						    <ul class="price">
								<li class="header"><?php esc_html_e('Free','weblizar');?></li>
								<li class="grey"><?php esc_html_e('$ 00','weblizar');?></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-close"></i></li>
								<li><i class="fa fa-close"></i></li>
								<li><i class="fa fa-close"></i></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-close"></i></li>
								<li><i class="fa fa-close"></i></li>
								<li><i class="fa fa-close"></i></li>
								<li><i class="fa fa-close"></i></li>
						    </ul>
						</div>

						<div class="columns">
						    <ul class="price">
								<li class="header" style="background-color:#31A3DD"><?php esc_html_e('Weblizar Pro','weblizar');?></li>
								<li class="grey"><?php esc_html_e('$ 29','weblizar');?></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-check"></i></li>
								<li><i class="fa fa-check"></i></li>
								<li class="grey"><a href="<?php echo esc_url( __( 'http://demo.weblizar.com/weblizar-premium/', 'weblizar' ) ); ?>" class="pro_btn"><?php esc_html_e('Visit Demo','weblizar');?></a></li>
						    </ul>
						</div>
					</div>
				</div>
            </div>
        </div>            
	<?php
	}
}
?>