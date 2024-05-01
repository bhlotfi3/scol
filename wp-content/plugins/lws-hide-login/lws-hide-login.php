<?php
 
/**
 * Plugin Name:       LWS Hide Login
 * Plugin URI:        https://www.lws.fr/
 * Description:       Secure your access to the admin page with this plugin !
 * Version:           1.1
 * Requires PHP:      7.0
 * Author:            LWS
 * Author URI:        https://www.lws.fr
 * Tested up to:      6.0
 * Domain Path:       /languages
 * 
 * @since             1.0
 * @package           lwshidelogin
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'LWS_HL_URL', plugin_dir_url( __FILE__ ) );
define( 'LWS_HL_DIR', plugin_dir_path( __FILE__ ) );
global $lws_hl_is_login;


/**
 * Load translations
 */
add_action('init', 'lws_ht_traduction');
function lws_ht_traduction(){ 
    load_plugin_textdomain('lws-hide-login', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

register_uninstall_hook(__FILE__, 'lws_ht_on_uninstall' );
function lws_ht_on_uninstall(){
    delete_option('lws_aff_new_login');
    delete_option('lws_aff_new_redirection');
}

add_action( 'admin_notices', 'lws_ht_admin_notice_warn_not_activated' );

function lws_ht_admin_notice_warn_not_activated() {
    if (!get_option('lws_aff_new_login') && get_current_screen()->base != ('toplevel_page_lws-ht-config')){
        echo '<div style="padding:10px" class="notice notice-warning is-dismissible">' .
         esc_html__('The LWS Hide Login plugin is activated on this website but no configuration has been created.', 'lws-hide-login') . esc_html__(' Your login page is not secure.', 'lws-hide-login') .
          '<br>' . esc_html__('Please go in the ', 'lws-hide-login') . '<a href="'. esc_url(admin_url( 'admin.php?page=lws-ht-config' )) . '">' . 
          esc_html__("plugin's settings", 'lws-hide-login') . '</a>' . esc_html__(' to create one.', 'lws-hide-login') . ' </div>'; 
    }
}

if ( is_multisite() && ! function_exists( 'is_plugin_active_for_network' ) || ! function_exists( 'is_plugin_active' ) ) {
	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

}

/**
 * Enqueue any CSS or JS script needed
 */
add_action('admin_enqueue_scripts', 'lws_ht_scripts');
function lws_ht_scripts() {
    wp_enqueue_style( 'lws_ht-css', LWS_HL_URL . "css/lws_ht_css.css");
}

/**
 * Create plugin menu in wp-admin
 */
add_action('admin_menu', 'lws_ht_menu_admin');
function lws_ht_menu_admin(){
    $menu_slug = 'lws-ht-config';
    add_menu_page( __('LWS Hide Login - Settings', 'lws-hide-login'), 'LWS Hide Login', 'read', $menu_slug, 'lws_ht_create_page', LWS_HL_URL . 'images/plugin_lws_hide_login.svg');
}

/**
 * Generate the setting page in admin
 */
function lws_ht_create_page(){
    $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field($_GET[ 'tab' ]) : 'general';
    include __DIR__ . '/view/lws_ht_tabs.php';
    $plugin_active_network = is_plugin_active_for_network( plugin_basename( __FILE__ ));

    if ($active_tab == 'general'){

        if ( isset($_POST['lws_ht_form_change_hide_page']) ){
            $change_redirection = sanitize_text_field( $_POST['input_change_redirection'] );
            empty($change_login = sanitize_text_field( $_POST['input_change_login'])) ? update_option('lws_aff_new_login', "lws-lg-in") : update_option('lws_aff_new_login', $change_login);
            update_option('lws_aff_new_redirection', $change_redirection);
            
            $form_updated = __('The redirections have been successfully updated.', 'lws-hide-login');
        }
    
        include 'view/lws_ht_configpage.php';
    }
    
    else if ($active_tab == 'ourplugins'){
        
        $plugins = array('lws-sms' => 'LWS SMS', 'lwscache' => 'LWSCache', 'lws-affiliation' => 'LWS Affiliation');
        $plugins_activated = array();
        $all_plugins = get_plugins();
        
        if (is_plugin_active('lws-sms/lws-sms.php')){
            $plugins_activated['lws-sms'] = "full";
        }
        else if( array_key_exists( 'lws-sms/lws-sms.php', $all_plugins ) ){
            $plugins_activated['lws-sms'] = "half";
        }
        
        if (is_plugin_active('lwscache/lws-cache.php')){
            $plugins_activated['lwscache'] = "full";
        }
        else if( array_key_exists( 'lwscache/lws-cache.php', $all_plugins ) ){
            $plugins_activated['lwscache'] = "half";
        }
        
        if (is_plugin_active('lws-affiliation/lwsaffiliation.php')){
            $plugins_activated['lws-affiliation'] = "full";
        }
        else if( array_key_exists( 'lws-affiliation/lwsaffiliation.php', $all_plugins ) ){
            $plugins_activated['lws-affiliation'] = "half";
        }
        
        include 'view/lws_ht_ourplugins.php';
    }
}

if ( is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) ) ) {
    add_action('network_admin_menu', 'lws_ht_menu_admin_network');
    function lws_ht_menu_admin_network(){
        $menu_slug = 'lws-ht-config-network';
        add_menu_page( __('LWS Hide Login - Settings', 'lws-hide-login'), 'LWS Hide Login', 'read', $menu_slug, 'lws_ht_create_page_network', LWS_HL_URL . 'images/plugin_lws_hide_login.svg');
    }
}

function lws_ht_create_page_network(){
    $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field($_GET[ 'tab' ]) : 'general';
    include __DIR__ . '/view/lws_ht_tabs_network.php';

    if ($active_tab == 'general'){

        if ( isset($_POST['lws_ht_form_change_hide_page']) ){
            $change_redirection = sanitize_text_field( $_POST['input_change_redirection'] );
            empty($change_login = sanitize_text_field( $_POST['input_change_login'])) ? update_site_option('lws_aff_new_login', "lws-lg-in") : update_site_option('lws_aff_new_login', $change_login);
            update_site_option('lws_aff_new_redirection', $change_redirection);
            
            $form_updated = __('The redirections have been successfully updated.', 'lws-hide-login');
        }
    
        include 'view/lws_ht_configpage_network.php';
    }
    
    else if ($active_tab == 'ourplugins'){
        
        $plugins = array('lws-sms' => 'LWS SMS', 'lwscache' => 'LWSCache', 'lws-affiliation' => 'LWS Affiliation');
        $plugins_activated = array();
        $all_plugins = get_plugins();

        if (is_plugin_active_for_network('lws-sms/lws-sms.php')){
            $plugins_activated['lws-sms'] = "full";
        }
        else if( array_key_exists( 'lws-sms/lws-sms.php', $all_plugins ) ){
            $plugins_activated['lws-sms'] = "half";
        }
        
        if (is_plugin_active_for_network('lwscache/lws-cache.php')){
            $plugins_activated['lwscache'] = "full";
        }
        else if( array_key_exists( 'lwscache/lws-cache.php', $all_plugins ) ){
            $plugins_activated['lwscache'] = "half";
        }
        
        if (is_plugin_active_for_network('lws-affiliation/lwsaffiliation.php')){
            $plugins_activated['lws-affiliation'] = "full";
        }
        else if( array_key_exists( 'lws-affiliation/lwsaffiliation.php', $all_plugins ) ){
            $plugins_activated['lws-affiliation'] = "half";
        }
        
        include 'view/lws_ht_ourplugins_network.php';
    }
}


add_action("wp_ajax_downloadPlugin" , "wp_ajax_install_plugin");

add_action("wp_ajax_activatePlugin" , "lws_ht_activate_plugin");
function lws_ht_activate_plugin(){
    if(isset($_POST['ajax_slug'])){
        switch (sanitize_textarea_field($_POST['ajax_slug'])) {
            case 'lws-sms':
                activate_plugin('lws-sms/lws-sms.php');
                break;
            case 'lwscache':
                activate_plugin('lwscache/lws-cache.php');
                break;
            case 'lws-affiliation':
                activate_plugin('lws-affiliation/lwsaffiliation.php');
                break;
        }
    }
    wp_die();
}

add_action("wp_ajax_activatePlugin_network" , "lws_ht_activate_plugin_network");
function lws_ht_activate_plugin_network(){
    if(isset($_POST['ajax_slug'])){
        switch (sanitize_textarea_field($_POST['ajax_slug'])) {
            case 'lws-sms':
                activate_plugin('lws-sms/lws-sms.php', '', true);
                break;
            case 'lwscache':
                activate_plugin('lwscache/lws-cache.php', '', true);
                break;
            case 'lws-affiliation':
                activate_plugin('lws-affiliation/lwsaffiliation.php', '', true);
                break;
        }
    }
    wp_die();
}

/**
 * Deactivate wp-login and activate the new URL
 */
add_action('plugins_loaded', 'lws_ht_plugin_on_page_loaded');
function lws_ht_plugin_on_page_loaded() {
	global $pagenow, $lws_hl_is_login_network, $lws_hl_is_login;
	$request = parse_url( rawurldecode( $_SERVER['REQUEST_URI'] ) );
    if( get_site_option('lws_aff_new_login') || get_option('lws_aff_new_login')){
        if (is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) )){
            if ( (strpos( rawurldecode( $_SERVER['REQUEST_URI'] ), 'wp-login.php') || $request['path'] == site_url( 'wp-login', 'relative' )) && ! is_admin() ) {
                $lws_hl_is_login_network = true;
                $pagenow = 'index.php';
                }
                
                else if ( (strpos( rawurldecode( $_SERVER['REQUEST_URI'] ), 'wp-register.php' ) || $request['path'] == site_url( 'wp-register', 'relative' )) && ! is_admin() ) {
                    $lws_hl_is_login_network = true;
                    $pagenow = 'index.php';	
                }
            
                else if ( $request['path'] == site_url(get_site_option('lws_aff_new_login'), 'relative') ) {
                    $lws_hl_is_login_network = false;
                    $pagenow = 'wp-login.php';
                }
        }
        else{
            if ( (strpos( rawurldecode( $_SERVER['REQUEST_URI'] ), 'wp-login.php') || $request['path'] == site_url( 'wp-login', 'relative' )) && ! is_admin() ) {
                $lws_hl_is_login = true;
                $pagenow = 'index.php';
            }
            
            else if ( (strpos( rawurldecode( $_SERVER['REQUEST_URI'] ), 'wp-register.php' ) || $request['path'] == site_url( 'wp-register', 'relative' )) && ! is_admin() ) {
                $lws_hl_is_login = true;
                $pagenow = 'index.php';	
            }
        
            else if ( $request['path'] == site_url(get_option('lws_aff_new_login'), 'relative') ) {
                $lws_hl_is_login = false;
                $pagenow = 'wp-login.php';
            }
        }
    }
}

/**
 * Take care of the redirections
 */
add_action('wp_loaded', 'lws_ht_redirect_page', 1);
function lws_ht_redirect_page(){
    global $pagenow, $lws_hl_is_login, $lws_hl_is_login_network;
    $path = basename($_SERVER['REQUEST_URI']);
    
    if( get_site_option('lws_aff_new_login') || get_option('lws_aff_new_login')){
        if (is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) )){
            if ( ! ( isset( $_GET['action'] ) && isset( $_POST['post_password'] ) && $_GET['action'] == 'postpass' ) ) {
                
                if ( $lws_hl_is_login_network ) {
                    if (get_site_option('lws_aff_new_redirection')){
                        wp_safe_redirect(get_site_url() . "/" . get_site_option('lws_aff_new_redirection'));
                    }
                    else{
                        wp_safe_redirect(get_site_url() . "/404");
                    }
                    exit;
                }
            
                else if ( $pagenow == 'wp-login.php' ) {
                
                    $redirect_admin = admin_url();
                    $redirect_url = isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : "";
                
                    if ( is_user_logged_in() && !isset($_REQUEST['action']) ) {
                        wp_safe_redirect(apply_filters( 'lws_ht_redirect_if_connected_login', $redirect_admin, $redirect_url));
                        exit();
                    }
                
                    require_once(ABSPATH . 'wp-login.php');
                    exit;
                }
                
                if ( is_admin() && ! is_user_logged_in() && ! defined( 'WP_CLI' ) && !wp_doing_ajax() && ! defined( 'DOING_CRON' ) && $pagenow !== 'admin-post.php') {
                    if (get_site_option('lws_aff_new_redirection')){
                        wp_safe_redirect(get_site_url() . "/" . get_site_option('lws_aff_new_redirection'));
                    }
                    else{
                        wp_safe_redirect(get_site_url() . "/404");
                    }
                    exit;
                }
            }
        }
        else{
            if ( ! ( isset( $_GET['action'] ) && isset( $_POST['post_password'] ) && $_GET['action'] == 'postpass' ) ) {
                
                if ( $lws_hl_is_login ) {
                    if (get_option('lws_aff_new_redirection')){
                        wp_safe_redirect(get_site_url() . "/" . get_option('lws_aff_new_redirection'));
                    }
                    else{
                        wp_safe_redirect(get_site_url() . "/404");
                    }
                    exit;
                }
            
                else if ( $pagenow == 'wp-login.php' ) {
                
                    $redirect_admin = admin_url();
                    $redirect_url = isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : "";
                
                    if ( is_user_logged_in() && !isset($_REQUEST['action']) ) {
                        wp_safe_redirect(apply_filters( 'lws_ht_redirect_if_connected_login', $redirect_admin, $redirect_url));
                        exit();
                    }
                
                    require_once(ABSPATH . 'wp-login.php');
                    exit;
                }
                
                if ( is_admin() && ! is_user_logged_in() && ! defined( 'WP_CLI' ) && !wp_doing_ajax() && ! defined( 'DOING_CRON' ) && $pagenow !== 'admin-post.php') {
                    if (get_option('lws_aff_new_redirection')){
                        wp_safe_redirect(get_site_url() . "/" . get_option('lws_aff_new_redirection'));
                    }
                    else{
                        wp_safe_redirect(get_site_url() . "/404");
                    }
                    exit;
                }
            }
        }
    }
}

add_filter( 'site_url', 'lws_hl_siteurl');
add_filter( 'wp_redirect', 'lws_hl_redirect');

function lws_hl_siteurl($url){
	return lws_hl_filter_login($url);
}

function lws_hl_redirect($location){
	return lws_hl_filter_login($location);
}

/**
 * If URL sent contains wp-login.php, 
 * recreate an url with the custom link instead
 */
function lws_hl_filter_login($url){
	if( strpos($url, 'wp-login.php') ) {
		$args = explode('?', $url);
        if( get_site_option('lws_aff_new_login') || get_option('lws_aff_new_login')){
            if( isset($args[1]) ) {
                parse_str($args[1], $args);
                if (is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) )){
                    $url = add_query_arg($args, get_site_url() . "/" . get_site_option('lws_aff_new_login'));
                }
                else{
                    $url = add_query_arg($args, get_site_url() . "/" . get_option('lws_aff_new_login'));
                }
            } else {
                if (is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) )){
                    $url = get_site_url() . "/" . get_site_option('lws_aff_new_login');
                }
                else{
                    $url = get_site_url() . "/" . get_option('lws_aff_new_login');
                }
            }
        }
	}

	return $url;
}
