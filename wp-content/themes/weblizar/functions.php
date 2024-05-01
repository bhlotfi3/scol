<?php
/*	*Theme Name	: Weblizar
	*Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	require( get_template_directory() . '/core/menu/weblizar_bootstrap_navwalker.php' ); // for Default Menus
	require( get_template_directory() . '/core/menu/default_menu_walker.php' ); // for Default Menus
	require( get_template_directory() . '/core/comment-box/comment-function.php' ); //for comments
	require(get_template_directory()  . '/customizer.php');
	require(get_template_directory()  . '/core/custom-header.php');	
	
	define('WEBLIZAR_THEME_URL', 'https://weblizar.com/themes/weblizar-premium-theme/');
	define('WEBLIZAR_THEME_REVIEW_URL', 'https://wordpress.org/support/theme/weblizar/reviews/?filter=5');

	add_action( 'after_setup_theme', 'wl_setup' ); 	
	function wl_setup()
	{	
		add_theme_support( 'title-tag' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
	    add_theme_support( 'wc-product-gallery-lightbox' );
	    add_theme_support( 'wc-product-gallery-slider' );
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 720; //px
	
		// Load text domain for translation-ready
		load_theme_textdomain( 'weblizar', get_template_directory() . '/lang' );	
		
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'weblizar' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );

		/* Gutenberg */
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );

		/* Add editor style. */
		add_theme_support( 'editor-styles' );
		add_theme_support( 'dark-editor-style' );

		/* Allow shortcodes in widgets. */
		add_filter( 'widget_text', 'do_shortcode' );
		
		// Logo
		add_theme_support( 'custom-logo', array(
			'width'       => 250,
			'height'      => 250,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		));
		// theme support 	
		$args = array('default-color' => '000000',);
		add_theme_support( 'custom-background', $args); 
		add_theme_support( 'automatic-feed-links');
		add_theme_support( 'html5');
		add_editor_style();
	}
	
	
	function weblizar_scripts()	{	
		wp_enqueue_style( 'weblizar-style', get_stylesheet_uri() );
		//** font-awesome-4.7.0 **//
		//wp_enqueue_style('font-awesome-min-css', WL_TEMPLATE_DIR_URI. '/css/font-awesome-4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('weblizar-font-awesome-latest', get_template_directory_uri(). '/css/font-awesome-5.11.2/css/all.css');
		
		wp_enqueue_style('weblizar-bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style('weblizar-responsive', get_template_directory_uri() . '/css/responsive.css');
		wp_enqueue_style('weblizar-flat-blue', get_template_directory_uri() . '/css/skins/flat-blue.css');	
		wp_enqueue_style('weblizar-theme-menu', get_template_directory_uri() . '/css/theme-menu.css');
		wp_enqueue_style('weblizar-carousel', get_template_directory_uri() . '/css/carousel.css');
		wp_enqueue_style('weblizar-swiper-css', get_template_directory_uri() . '/css/swiper.css');
		
		// Js
		wp_enqueue_script('weblizar-menu', get_template_directory_uri() .'/js/menu/menu.js', array( 'jquery' ), true, true);	
		wp_enqueue_script('weblizar-bootstrap', get_template_directory_uri() .'/js/bootstrap.js', array( 'jquery' ), true, true);
		wp_enqueue_script('menu', get_template_directory_uri() .'/js/menu.js', array('jquery'), true, true );		
		wp_enqueue_script('weblizar-swiper', get_template_directory_uri() .'/js/swiper.js', array( 'jquery' ), true, true);	

		$count_posts = wp_count_posts();
		$published_posts = $count_posts->publish;
		$blog_count = get_theme_mod('blog_count');
		$slider_image_speed = get_theme_mod('slider_image_speed','2000');
		$sticky_header = get_theme_mod('sticky_header','on');
		wp_enqueue_script('weblizar-more-posts', get_template_directory_uri() .'/js/more-posts.js', array( 'jquery' ), true, true);	
		wp_localize_script('weblizar-more-posts', 'load_more_posts_var', array(
				'counts' => $published_posts,
				'blog_count' => $blog_count
			)
		);

		$ajax_data = array(
            'image_speed'     => $slider_image_speed,
            'sticky_header'   => $sticky_header,
        );

        wp_enqueue_script( 'weblizar-ajax-front', get_template_directory_uri() . '/js/weblizar-ajax-front.js', array( 'jquery' ), true, true );
        wp_localize_script( 'weblizar-ajax-front', 'ajax_admin', array(
                'ajax_url'    => admin_url( 'admin-ajax.php' ),
                'admin_nonce' => wp_create_nonce( 'admin_ajax_nonce' ),
                'ajax_data'   => $ajax_data,
        ) );
	}
	add_action('wp_enqueue_scripts', 'weblizar_scripts'); 
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 

	// Read more tag to formatting in blog page 
	function weblizar_content_more($more)
	{  global $post;							
	   return '<div class="blog-post-details-item blog-read-more"><a href="'.esc_url(get_permalink(),'weblizar').'">Read More...</a></div>';
	}   
	add_filter( 'the_content_more_link', 'weblizar_content_more' );
	
	/*
	* Weblizar widget area
	*/
	add_action( 'widgets_init', 'weblizar_widgets_init');
	function weblizar_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'weblizar' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'weblizar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-block %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="h3-sidebar-title sidebar-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'weblizar' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'weblizar' ),
			'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-3 footer-col %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="footer-title">',
			'after_title' => '</div>',
		) );             
	}
	
	/*
	* Image resize and crop
	*/
	if ( ( 'add_image_size' ) ) 
	{ 
		add_image_size('wl_media_sidebar_img',54,54,true);
		add_image_size('wl_media_blog_img',800,400,true);
		add_image_size('wl_blog_img',350,150,true);
	}

if (is_admin()) {
	require_once('core/admin/admin-themes.php');
}


function weblizar_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    add_editor_style( $font_url );
}
add_action( 'after_setup_theme', 'weblizar_add_editor_styles' );

add_action( 'wp_enqueue_scripts', 'weblizar_custom_css' );
function weblizar_custom_css() {
    $output = '';
	$output .= 'ul.post-footer {
				text-align: center;
				list-style: none;
				margin-top: 50px;
			}';
	$output .= '.item {
			  margin-bottom: 30px;
			}';
	$output .= 'a.append-button.btn.btn-color{
				background-color: #3498db;
				border: 1px solid transparent;
				color: #fff;
				font-size: 21px;
				border-radius: 6px;
				line-height: 1.4;
			}';
	$output .= 'a.append-button.btn.btn-color:hover {
			  opacity: 0.9;
			  color: #fff;
			}';

	$output .= '.logo a img {
			  height: '. get_theme_mod('logo_height') .'px;
			  width: '. get_theme_mod('logo_width') .'px;
			}';

	//custom css
	$custom_css = get_theme_mod('custom_css') ; 
	if (!empty ($custom_css)) {
        $output .= get_theme_mod('custom_css') . "\n";
    }

    wp_register_style( 'weblizar-custom-header-style', false );
    wp_enqueue_style( 'weblizar-custom-header-style', get_template_directory_uri() . '/css/custom-header-style.css' );
    wp_add_inline_style('weblizar-custom-header-style', $output );
}

/**
 * display notice
 **/
global $pagenow;
if ( $pagenow == 'themes.php' && is_admin() ) :
    if ( get_option( 'weblizar_notice_dismiss_notice' ) != true ) {
        add_action( 'admin_notices', 'weblizar_activation_notice' );
        add_action( 'admin_enqueue_scripts', 'weblizar_admin_notice_assets' );
    }
endif;

function weblizar_admin_notice_assets() {
    wp_enqueue_style( 'weblizar_admin_notice', get_template_directory_uri() . '/css/admin-notice.css' );
}

function weblizar_activation_notice() {
    $my_theme = wp_get_theme();
    ?>
    <div class="weblizar-notice updated notice notice-success updated my-dismiss-notice is-dismissible">
        <div class="hello-elementor-notice-inner">
            <div class="hello-elementor-notice-content">
                <h3> <?php esc_html_e( 'Thank you for installing', 'weblizar' ); ?> <?php echo $my_theme->get( 'Name' ); ?></h3>
                <?php
                $msg = sprintf( '<p> %1$s %2$s <span style="color:#f8aa30">&#9733;</span><span style="color:#f8aa30">&#9733;</span><span style="color:#f8aa30">&#9733;</span><span style="color:#f8aa30">&#9733;</span><span style="color:#f8aa30">&#9733;</span> %3$s <span style="color:red">&hearts;</span>  %4$s <br><a href=%5$s target="_blank"  style="text-decoration: none; margin-left:10px;" class="button button-primary"> %6$s </a>
                    <a href=%7$s target="_blank"  style="text-decoration: none; margin-left:10px;" class="button button-primary">%8$s</a>
                    <a href=%9$s style="text-decoration: none; margin-left:10px;" class="button button-primary">%10$s</a>
                    </p>',
                    esc_html__( ' If you like this ', 'weblizar' ),
                    esc_html__( ' theme, please leave us a ', 'weblizar' ),
                    esc_html__( ' Rating ', 'weblizar' ),
                    esc_html__( ' Big thanks in advance. ', 'weblizar' ),
                    esc_url( WEBLIZAR_THEME_REVIEW_URL ),
                    esc_html__( 'Rate', 'weblizar' ),
                    esc_url( WEBLIZAR_THEME_URL ),
                    esc_html__( 'Go Pro Version', 'weblizar' ),
                    esc_url( admin_url( '/themes.php?page=weblizar' ) ),
                    esc_html__( 'About Theme', 'weblizar' ) );
                echo wp_kses_post( $msg );
                ?>
            </div>
            <div class="restore-notice border-two">
                <p>
                    <b><?php esc_html_e( 'Recentely we update our theme Code ( according to WordPress guidelines ).', 'weblizar' ); ?></b>
                </p>
                <p><?php esc_html_e( 'By this your data will be reset for homepage, but you can restore it and get back your homepage same as previous.', 'weblizar' ); ?></p>
                <p><?php esc_html_e( 'Just Go to [ About Weblizar Tab ] ', 'weblizar' ) . ' ' . wp_kses_post( '<a href="' . admin_url( 'admin.php?page=weblizar#home' ) . '">here</a> ' ) . '' . esc_html_e( 'and follow the steps.!!.', 'weblizar' ); ?></p>
            </div>
        </div>
        <button type="button" class="notice-dismiss">
            <span class="screen-reader-text"><?php echo esc_html__('Dismiss this notice.','weblizar');?></span>
        </button>
    </div>
<?php }

add_action( 'admin_enqueue_scripts', 'weblizar_notice_add_script' );
function weblizar_notice_add_script() {
    wp_register_script( 'notice-update', get_template_directory_uri() . '/js/update-notice.js', '', '1.0', false );
    wp_localize_script( 'notice-update', 'notice_params', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
    ) );
    wp_enqueue_script( 'notice-update' );
}

add_action( 'wp_ajax_weblizar_dismiss_notice', 'weblizar_notice_dismiss_notice' );
function weblizar_notice_dismiss_notice() {
    update_option( 'weblizar_notice_dismiss_notice', true );
}
?>