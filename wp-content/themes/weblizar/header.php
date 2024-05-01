<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
	<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta charset="<?php bloginfo('charset'); ?>" />	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<?php wp_body_open(); ?>
	<div id="menu_wrapper">
		<a class="skip-link screen-reader-text" href="#content">
		<?php echo esc_html__( 'Skip to content', 'weblizar' ); ?></a>
		<div class="top_wrapper">
			<header id="header"  >
				<div class="row">
					<nav class="navbar navbar-default hd_cover" role="navigation">
						<div class="container-fluid">
							<div class="container fix-menu">	
								<div class="row">	
									<?php 
									$web_mail = get_theme_mod('web_mail','info@gmail.com');
									if (!empty ($web_mail)) { ?>					
										<div class="col-md-4 col-sm-6 col-xs-6 web-email">
											<i class="fa fa-envelope"></i> <?php echo esc_html($web_mail); ?>	
										</div>
									<?php } 
									$web_phone = get_theme_mod('web_phone','1234567890');
									if (!empty ($web_phone))  { ?>						
										<div class="col-md-4 col-sm-6 col-xs-6 web-email">
											<i class="fa fa-phone"></i> <?php echo esc_html($web_phone); ?>	
										</div>
									<?php } 
									$search_form =get_theme_mod('search_form',' ');
									if (!empty ($search_form))   { ?>
										<div class="col-md-4 col-sm-12 col-xs-12 top-search-form">
											<?php echo get_search_form(); ?>	
										</div>	
									<?php } ?>	
								</div>
								<div class="row">								
									<div class="col-md-4 col-sm-12 col-xs-12">
										<div class="navbar-header" id="navbar-header">				<div class="logo pull-left">							
											<a title="Weblizar" href="<?php echo esc_url(home_url( '/' )); ?>">
											<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
											$image = wp_get_attachment_image_src( $custom_logo_id,'full' ); 
											if(has_custom_logo()) { ?>
											<span class="site-custom_logo"></span>
											<img  src="<?php echo esc_attr($image[0]); ?>"/>
											<?php } else { if (display_header_text()==true){ echo '<span class="site-title">'.esc_html(get_bloginfo()).'</span>'; }} ?>
											</a>
											<?php if (display_header_text()==true){ ?>
												<p class="site-description"><?php bloginfo( 'description' ); ?></p>
										  	<?php } ?>
										  </div>
										  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
											<span class="sr-only"><?php echo esc_html__('Toggle navigation','weblizar'); ?></span>
											<span class="fas fa-bars"></span>
										  </button> 
										</div>
									</div>
									<div class="col-md-8 col-sm-12 col-xs-12 header-right">
										<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										  <?php wp_nav_menu( array(
											'theme_location'    => 'primary',               
											'container'         => 'nav-collapse collapse navbar-inverse-collapse',							
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'weblizar_fallback_page_menu',
											'walker'            => new weblizar_bootstrap_navwalker())
											);  ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</nav>		
				</div>
			</header>
		</div>
	</div>