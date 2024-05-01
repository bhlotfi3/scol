<?php

function simplify_customize_register($wp_customize){

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //    
    $wp_customize->add_section('simplify_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('SIMPLIFY OPTIONS', 'simplify'),
		'description'   => ' <div class="infohead">' . __('We appreciate an','simplify') . ' <a href="http://wordpress.org/support/view/theme-reviews/simplify" target="_blank">' . __('Honest Review','simplify') . '</a> ' . __('of this Theme if you Love our Work','simplify') . '<br /> <br />

' . __('Need More Features and Options including Exciting Slide and 100+ Advanced Features? Try ','simplify') . '<a href="' . esc_url('https://d5creation.com/theme/simplify/') .'
" target="_blank"><strong>' . __('SIMPLIFY Extend','simplify') . '</strong></a><br /> <br /> 
        
        
' . __('You can Visit the SIMPLIFY Extend ','simplify') . ' <a href="' . esc_url('http://demo.d5creation.com/themes/?theme=Simplify') .'" target="_blank"><strong>' . __('Demo Here','simplify') . '</strong></a> 
        </div>		
		'
    ));	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('simplify_heading', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Heading', 'simplify'),
        'description'   => ''
    ));
	
	
// Front Page Heading
    $wp_customize->add_setting('simplify[heading_text]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_html',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_heading_text' , array(
        'label'      => __('Front Page Heading', 'simplify'),
        'section'    => 'simplify_heading',
        'settings'   => 'simplify[heading_text]'
    ));
	
// Front Page Heading Description
    $wp_customize->add_setting('simplify[heading_des]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_html',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_heading_des' , array(
        'label'      => __('Front Page Heading Description', 'simplify'),
        'section'    => 'simplify_heading',
        'settings'   => 'simplify[heading_des]',
		'type' 		 => 'textarea'
    ));



// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('simplify_slide', array(
        'priority' 		=> 12,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Slide', 'simplify'),
        'description'   => ''
    ));
  
 	  
//  Banner Image/ Slide Image 01
    $wp_customize->add_setting('simplify[banner-image]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'banner-image', array(
        'label'    			=> __('Banner Image/ Slide Image 01', 'simplify'),
        'section'  			=> 'simplify_slide',
        'settings' 			=> 'simplify[banner-image]',
		'description'   	=> __('Upload an image for the Front Page Banner. 930px X 350px image is recommended. In Extended version, the Size is Flexible','simplify')
    )));
	
//  Banner Image/ Slide Image 02
    $wp_customize->add_setting('simplify[slide-image]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image', array(
        'label'    			=> __('Banner Image/ Slide Image 02', 'simplify'),
        'section'  			=> 'simplify_slide',
        'settings' 			=> 'simplify[slide-image]',
		'description'   	=> __('Upload an image for the Front Page Banner. 930px X 350px image is recommended','simplify')
    )));
	
//  Banner Image/ Slide Image 03
    $wp_customize->add_setting('simplify[extra-image]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'extra-image', array(
        'label'    			=> __('Banner Image/ Slide Image 03', 'simplify'),
        'section'  			=> 'simplify_slide',
        'settings' 			=> 'simplify[extra-image]',
		'description'   	=> __('Upload an image for the Front Page Banner. 930px X 350px image is recommended','simplify')
    )));
	
	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('simplify_quote', array(
        'priority' 		=> 13,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Quote', 'simplify'),
        'description'   => ''
    ));
	
//  Quote Text
    $wp_customize->add_setting('simplify[bottom-quotation]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_bottom-quotation', array(
        'label'      => __('Quote Text', 'simplify'),
        'section'    => 'simplify_quote',
        'settings'   => 'simplify[bottom-quotation]',
		'type' 		 => 'textarea'
    ));
	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('simplify_frfb', array(
        'priority' 		=> 14,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - First Row Featured Boxes', 'simplify'),
        'description'   => ''
    ));
	
//  First Row Subject
    $wp_customize->add_setting('simplify[featuredr-title]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featuredr-title', array(
        'label'      => __('First Row Subject', 'simplify'),
        'section'    => 'simplify_frfb',
        'settings'   => 'simplify[featuredr-title]',
		'description' => __('Input your Row Title Here','simplify')
    ));

//  First Row Description
    $wp_customize->add_setting('simplify[featuredr-description]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'wp_kses_post',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featuredr-description', array(
        'label'      => __('First Row Description', 'simplify'),
        'section'    => 'simplify_frfb',
        'settings'   => 'simplify[featuredr-description]',
		'description' => __('Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive','simplify'),
		'type' 		 => 'textarea'
    ));
	

  	$fbsin=array('1','2','3');
	foreach ($fbsin as $fbsinumber) {
	  
//  Featured Image
    $wp_customize->add_setting('simplify[featured-image'. $fbsinumber .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured-image'. $fbsinumber, array(
        'label'    			=> __('First Row Featured Image', 'simplify') . '-' . $fbsinumber,
        'section'  			=> 'simplify_frfb',
        'settings' 			=> 'simplify[featured-image'. $fbsinumber .']',
		'description'   	=> __('Upload an image for the Featured Box. 200px X 100px image is recommended','simplify')
    )));
  
// Featured Image Title
    $wp_customize->add_setting('simplify[featured-title' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_html',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featured-title' . $fbsinumber, array(
        'label'      => __('Title', 'simplify'). '-' . $fbsinumber,
        'section'    => 'simplify_frfb',
        'settings'   => 'simplify[featured-title' . $fbsinumber .']'
    ));


// Featured Image Description
    $wp_customize->add_setting('simplify[featured-description' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featured-description' . $fbsinumber  , array(
        'label'      => __('Description', 'simplify') . '-' . $fbsinumber,
        'section'    => 'simplify_frfb',
        'settings'   => 'simplify[featured-description' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
// Featured Image Link
    $wp_customize->add_setting('simplify[featured-link' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featured-link' . $fbsinumber, array(
        'label'      => __('Link URL', 'simplify'). '-' . $fbsinumber,
        'section'    => 'simplify_frfb',
        'settings'   => 'simplify[featured-link' . $fbsinumber .']'
    ));

	
  }
  
  
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('simplify_srfb', array(
        'priority' 		=> 15,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Second Row Featured Boxes', 'simplify'),
        'description'   => ''
    ));
  
//  Show Second Row Featured Boxs
    $wp_customize->add_setting('simplify[srfbox]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_srfbox', array(
        'label'      => __('Show Second Row Featured Boxs', 'simplify'),
        'section'    => 'simplify_srfb',
        'settings'   => 'simplify[srfbox]',
		'description' => __('Uncheck this if you do not want to show the Second Row Featured Boxs','simplify'),
		'type' 		 => 'checkbox'
    ));
  
  
//  Second Row Subject
    $wp_customize->add_setting('simplify[featuredr2-title]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featuredr2-title', array(
        'label'      => __('Second Row Subject', 'simplify'),
        'section'    => 'simplify_srfb',
        'settings'   => 'simplify[featuredr2-title]',
		'description' => __('Input your Row Title Here','simplify')
    ));

//  Second Row Description
    $wp_customize->add_setting('simplify[featuredr2-description]', array(
        'default'        	=>'',
    	'sanitize_callback' => 'wp_kses_post',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featuredr2-description', array(
        'label'      => __('Second Row Description', 'simplify'),
        'section'    => 'simplify_srfb',
        'settings'   => 'simplify[featuredr2-description]',
		'description' => __('Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive','simplify'),
		'type' 		 => 'textarea'
    ));
  
  
  
  	foreach (range(1, 3) as $fbsinumber) {
	  
//  Featured Image
    $wp_customize->add_setting('simplify[featured-image2'. $fbsinumber .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured-image2'. $fbsinumber, array(
        'label'    			=> __('Second Row Featured Image', 'simplify') . '-' . $fbsinumber,
        'section'  			=> 'simplify_srfb',
        'settings' 			=> 'simplify[featured-image2'. $fbsinumber .']',
		'description'   	=> __('Upload an image for the Featured Box. 50px X 50px image is recommended','simplify')
    )));
  
// Featured Image Title
    $wp_customize->add_setting('simplify[featured-title2' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_html',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featured-title2' . $fbsinumber, array(
        'label'      => __('Title', 'simplify'). '-' . $fbsinumber,
        'section'    => 'simplify_srfb',
        'settings'   => 'simplify[featured-title2' . $fbsinumber .']'
    ));


// Featured Image Description
    $wp_customize->add_setting('simplify[featured-description2' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featured-description2' . $fbsinumber  , array(
        'label'      => __('Description', 'simplify') . '-' . $fbsinumber,
        'section'    => 'simplify_srfb',
        'settings'   => 'simplify[featured-description2' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
// Featured Image Link
    $wp_customize->add_setting('simplify[featured-link2' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_featured-link2' . $fbsinumber, array(
        'label'      => __('Link URL', 'simplify'). '-' . $fbsinumber,
        'section'    => 'simplify_srfb',
        'settings'   => 'simplify[featured-link2' . $fbsinumber .']'
    ));
	
  }
  
  
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
/*
 $wp_customize->add_section('simplify_pr', array(
        'priority' 		=> 16,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Post and Responsive', 'simplify'),
        'description'   => ''
    ));
*/

//  Front Page Post
    $wp_customize->add_setting('simplify[fpost]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_fpost', array(
        'label'      => __('Do not show any Posts or Page in the Front Page', 'simplify'),
        'section'    => 'simplify_options',
        'settings'   => 'simplify[fpost]',
		'description' => __('Check the Box if you do not want to show any Posts or Page in the Front Page','simplify'),
		'type' 		 => 'checkbox'
    ));

//  Responsive Layout
    $wp_customize->add_setting('simplify[responsive]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_responsive', array(
        'label'      => __('Use Responsive Layout', 'simplify'),
        'section'    => 'simplify_options',
        'settings'   => 'simplify[responsive]',
		'description' => __('Check the Box if you want the Responsive Layout of your Website','simplify'),
		'type' 		 => 'checkbox'
    ));


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('simplify_sl', array(
        'priority' 		=> 17,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Social Links', 'simplify'),
        'description'   => ''
    ));
	
//  Facebook Link
    $wp_customize->add_setting('simplify[facebook-link]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_facebook-link', array(
        'label'      => __('Facebook Link', 'simplify'),
        'section'    => 'simplify_sl',
        'settings'   => 'simplify[facebook-link]'
    ));
	
//  Twitter Link
    $wp_customize->add_setting('simplify[twitter-link]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_twitter-link', array(
        'label'      => __('Twitter Link', 'simplify'),
        'section'    => 'simplify_sl',
        'settings'   => 'simplify[twitter-link]'
    ));
 
//  You Tube Channel Link
    $wp_customize->add_setting('simplify[youtube-link]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_youtube-link', array(
        'label'      => __('You Tube Channel Link', 'simplify'),
        'section'    => 'simplify_sl',
        'settings'   => 'simplify[youtube-link]'
    ));
	
//  Linked In Link
    $wp_customize->add_setting('simplify[li-link]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_li-link', array(
        'label'      => __('Linked In Link', 'simplify'),
        'section'    => 'simplify_sl',
        'settings'   => 'simplify[li-link]'
    ));

//  Feed or Blog Link
    $wp_customize->add_setting('simplify[feed-link]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('simplify_feed-link', array(
        'label'      => __('Feed or Blog Link', 'simplify'),
        'section'    => 'simplify_sl',
        'settings'   => 'simplify[feed-link]'
    ));
	
	
}


add_action('customize_register', 'simplify_customize_register');


	if ( ! function_exists( 'simplify_get_option' ) ) :
	function simplify_get_option( $simplify_name, $simplify_default = false ) {
	$simplify_config = get_option( 'simplify' );

	if ( ! isset( $simplify_config ) ) : return $simplify_default; else: $simplify_options = $simplify_config; endif;
	if ( isset( $simplify_options[$simplify_name] ) ):  return $simplify_options[$simplify_name]; else: return $simplify_default; endif;
	}
	endif;