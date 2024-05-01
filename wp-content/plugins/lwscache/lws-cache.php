<?php
/**
 * Plugin Name:       LWSCache
 * Plugin URI:        https://www.lws.fr/
 * Description:       Cleans nginx's proxy cache whenever a post is edited/published.
 * Version:           1.0.2
 * Author:            LWS
 * Author URI:        https://www.lws.fr
 * Requires at least: 3.0
 * Tested up to:      5.9.3
 *
 * @link              https://www.lws.fr
 * @since             1.0
 * @package           LWSCache
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Base URL of plugin
 */
if ( ! defined( 'LWS_CACHE_BASEURL' ) ) {
	define( 'LWS_CACHE_BASEURL', plugin_dir_url( __FILE__ ) );
}

/**
 * Base Name of plugin
 */
if ( ! defined( 'LWS_CACHE_BASENAME' ) ) {
	define( 'LWS_CACHE_BASENAME', plugin_basename( __FILE__ ) );
}

/**
 * Base PATH of plugin
 */
if ( ! defined( 'LWS_CACHE_BASEPATH' ) ) {
	define( 'LWS_CACHE_BASEPATH', plugin_dir_path( __FILE__ ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lws-cache-activator.php
 */
function activate_lws_cache() {
	require_once LWS_CACHE_BASEPATH . 'includes/class-lws-cache-activator.php';
	LWSCache_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lws-cache-deactivator.php
 */
function deactivate_lws_cache() {
	require_once LWS_CACHE_BASEPATH . 'includes/class-lws-cache-deactivator.php';
	LWSCache_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lws_cache' );
register_deactivation_hook( __FILE__, 'deactivate_lws_cache' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require LWS_CACHE_BASEPATH . 'includes/class-lws-cache.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0
 */
function run_lws_cache() {

	global $lws_cache;

	$lws_cache = new LWSCache();
	$lws_cache->run();

	// Load WP-CLI command.
	if ( defined( 'WP_CLI' ) && WP_CLI ) {

		require_once LWS_CACHE_BASEPATH . 'class-lws-cache-wp-cli-command.php';
		\WP_CLI::add_command( 'lws-cache', 'LWSCache_WP_CLI_Command' );

	}

}
run_lws_cache();
