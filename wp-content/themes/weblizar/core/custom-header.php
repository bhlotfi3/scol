<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package eDS_Opener
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses weblizar_header_style()
 */
function weblizar_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'weblizar_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'weblizar_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'weblizar_custom_header_setup' );

if ( ! function_exists( 'weblizar_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see wp_news_custom_header_setup().
	*/
	function weblizar_header_style() {
		$header_text_color = get_header_textcolor();
		$header_image      = get_header_image();
		
		$custom_css = "";
		// If we get this far, we have custom styles. Let's do this.

		if ( ! display_header_text() ) {
	    	$custom_css .= "
	            .logo a {
					color: rgba(241, 241, 241, 0);
					clip: rect(1px 1px 1px 1px);
				}
				.logo p {
					color: rgba(241, 241, 241, 0);
					position:absolute;
					clip: rect(1px 1px 1px 1px);
				}";
	    } else {
	    	$custom_css .= ".logo a, .logo p {
				color: #".esc_attr( $header_text_color ).";
			}";
	    }

	    if ( has_header_image() ) { 
	    	$custom_css .= ".navbar.navbar-default {
	    		background-image: url(".$header_image.");
	    		background-size:cover;
			}";
	    } 

	    wp_enqueue_style(
		    'weblizar-custom-header-style1',
		    get_template_directory_uri() . '/css/custom-header-style.css'
		);
	    wp_add_inline_style( 'weblizar-custom-header-style1', $custom_css );
		?>
	
	<?php } 
endif;