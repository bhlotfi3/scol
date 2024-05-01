<?php
/**
 * Plugin Name: Icon List Block
 * Description: Show your icon list in web.
 * Version: 1.0.7
 * Author: bPlugins LLC
 * Author URI: http://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: icon-list
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'ILB_PLUGIN_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.0.7' );
define( 'ILB_ASSETS_DIR', plugin_dir_url( __FILE__ ) . 'assets/' );

// Icon List
class ILBIconList{
	function __construct(){
		add_action( 'enqueue_block_assets', [$this, 'enqueueBlockAssets'] );
		add_action( 'init', [$this, 'onInit'] );
	}

	function enqueueBlockAssets(){
		wp_enqueue_style( 'fontAwesome', ILB_ASSETS_DIR . 'css/fontAwesome.min.css', [], '5.15.4' );
	}

	function onInit() {
		wp_register_style( 'ilb-icon-list-editor-style', plugins_url( 'dist/editor.css', __FILE__ ), [ 'ilb-icon-list-style' ], ILB_PLUGIN_VERSION ); // Backend Style
		wp_register_style( 'ilb-icon-list-style', plugins_url( 'dist/style.css', __FILE__ ), [], ILB_PLUGIN_VERSION ); // Style

		register_block_type( __DIR__, [
			'editor_style'		=> 'ilb-icon-list-editor-style',
			'style'				=> 'ilb-icon-list-style',
			'render_callback'	=> [$this, 'render']
		] ); // Register Block

		wp_set_script_translations( 'ilb-icon-list-editor-script', 'icon-list', plugin_dir_path( __FILE__ ) . 'languages' ); // Translate
	}

	function render( $attributes ){
		extract( $attributes );

		$className = $className ?? '';
		$blockClassName = 'wp-block-ilb-icon-list ' . $className . ' align' . $align;

		ob_start(); ?>
		<div class='<?php echo esc_attr( $blockClassName ); ?>' id='ilbIconList-<?php echo esc_attr( $cId ) ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'></div>

		<?php return ob_get_clean();
	} // Render
}
new ILBIconList();