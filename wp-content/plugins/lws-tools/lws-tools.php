<?php
 
/**
 * Plugin Name:       LWS Tools
 * Plugin URI:        https://www.lws.fr/
 * Description:       Optimize and modify your website's parameters
 * Version:           1.0.1
 * Author:            LWS
 * Author URI:        https://www.lws.fr
 * Tested up to:      6.0
 * Domain Path:       /languages
 * Requires PHP :     7.3
 * 

 * @since             1.0
 * @package           lwstools
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'LWS_TK_URL', plugin_dir_url( __FILE__ ) );
define( 'LWS_TK_DIR', plugin_dir_path( __FILE__ ) );
require_once( ABSPATH . '/wp-admin/includes/class-wp-upgrader.php');
require_once( ABSPATH . '/wp-admin/includes/class-core-upgrader.php');
require_once( ABSPATH . '/wp-admin/includes/class-theme-upgrader.php' );
require_once( ABSPATH . '/wp-admin/includes/class-plugin-upgrader.php' );
require_once( ABSPATH . '/wp-admin/includes/class-language-pack-upgrader.php' );

if( ! function_exists('get_plugin_data') ){
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

/**
 * Load translations
 */
add_action('init', 'lws_tk_traduction');
function lws_tk_traduction(){ 
    load_plugin_textdomain('lws-tools', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

register_uninstall_hook(__FILE__, 'lws_tk_uninstalling_plugin');
function lws_tk_uninstalling_plugin(){
    $optimisation_list = array('err_co' => __('Hide connexion errors on wp-login', 'lws-tools'), 'sanitize_media' => __('Provide a new way of sanitizing uploaded media', 'lws-tools'), 
        'hide_gen' => __('Hide WordPress Version meta on pages', 'lws-tools'), 'delete_live_writer' => __('Delete Windows Live Writer manifest', 'lws-tools'),
        'less_revision' => __('Reduce the amount of available revisions to ', 'lws-tools'), 'no_h1_mce' => __('Remove Heading 1 from TinyMCE', 'lws-tools'), 'no_emote_wp' => __('Use visitor\'s emotes instead of WordPress' , 'lws-tools'),
        'no_apirest' => __('Deactivate REST API', 'lws-tools'), 'medium_large' => __('Add back hidden \'Medium Large\' image size ', 'lws-tools'), 'page_author_link' => __('Remove author\'s pages and their links', 'lws-tools'),
        'no_rss' => __('Remove RSS feeds', 'lws-tools'), 'remove_feeds_links' => __('Remove RSS feeds links', 'lws-tools'), 'no_comment_rss' => __('Remove comments RSS feeds', 'lws-tools'),
        'no_user_sitemap' => __('Hide users pages from WordPress sitemap', 'lws-tools'), 'no_user_ep_rest' => __('Hide users endpoints from REST API', 'lws-tools'),
         'remove_password_strength_meter' => __('Remove the Password Strength Meter in Accounts', 'lws-tools'), 'no_self_ping' => __('Prevent WordPress from self-pinging your in your articles', 'lws-tools'), 
         'remove_shortlink' => __('Remove shortlinks from the page', 'lws-tools'));
    foreach ($optimisation_list as $key => $list){
        delete_option('lws_tk_' . $key);
    }
    delete_option('lws_tk_keep_data_on_delete');
    delete_option('lws_tk_reduce_revisions_number');
}

/**
 * Enqueue any CSS or JS script needed
 */
add_action('admin_enqueue_scripts', 'lws_tk_scripts');
function lws_tk_scripts() {
    wp_enqueue_style( 'lws_tk-css', LWS_TK_URL . "css/lws_tk_style.css");
}

/**
 * Create plugin menu in wp-admin
 */
add_action('admin_menu', 'lws_tk_menu_admin');
function lws_tk_menu_admin(){
    $menu_slug = 'lws-tk-config';
    add_menu_page( __('LWS Tools - Overview', 'lws-tools'), 'LWS Tools', 'read', $menu_slug, 'lws_tk_create_page', LWS_TK_URL . 'images/plugin_lws_tools.svg');
}

/**
 * Generate the setting page in admin
 */
function lws_tk_create_page(){
    
    $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field($_GET[ 'tab' ]) : 'notification';
    include __DIR__ . '/view/lws_tk_tabs.php';


    if ($active_tab == 'notification'){
        global $wpdb;
        
        $plugins_update = array();
        $themes_update = array();
        $unused_plugins = array();
        $unused_themes = array();
        
        $actual_version = get_bloginfo( 'version' );
        $up_to_date = true;
        $translations_ready = false;
        $cert_invalid = false;
        
        $all_plugins = get_plugins();
        $all_themes = wp_get_themes();
        $my_theme = wp_get_theme();
        
        //Number of themes/plugins
        $count_themes = count($all_themes);
        $count_inactive_themes = $count_themes - 1;
        $count_plugins = count($all_plugins);
    
        //SSL Expiration & Issuer @sameer|Reading SSL certificates in PHP
        if (!$lws_tk_ssl_cert = get_transient('lws_tk_ssl_cert')){
            $errno = 0;
            $errstr = '';
            $timeout = 30;
            $ssl_info = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE)));
        
            $stream = stream_socket_client("ssl://" . parse_url( site_url(), PHP_URL_HOST ) . ":443", $errno, $errstr, $timeout, STREAM_CLIENT_CONNECT, $ssl_info);
        
            if ($stream) {
                $cert_resource = stream_context_get_params($stream);
                $certificate = $cert_resource['options']['ssl']['peer_certificate'];
                $certinfo = openssl_x509_parse($certificate);
                fclose($stream);
                $lws_tk_ssl_cert = $certinfo;
                set_transient('lws_tk_ssl_cert', $certinfo, 24 * HOUR_IN_SECONDS);
            }
        }
        
        $expiration_ssl = date("F j, Y", $lws_tk_ssl_cert['validTo_time_t']);
        if ($lws_tk_ssl_cert['validTo_time_t'] - time() < 0){
            $cert_invalid = true;
        }
        $issued_by = $lws_tk_ssl_cert['issuer']['CN'];
        $up_to_date = (wp_get_update_data()['counts']['wordpress']);
        
        
        if (!empty(wp_get_translation_updates())){
            $translations_ready = true;
        }

        if (isset($_POST['lws_tk_update_prefix'])){
            $config = ABSPATH . 'wp-config.php';
            $lines = file($config);//file in to an array
            $config_file = '';
            $new_prefix = 'wp';
            
            //Create new prefix
            $characters = array_merge(range('a','z'), range('0','9'));
            $length = rand( 2, 4 );
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, count($characters)-1);
                $new_prefix .= $characters[$rand];
            }
            $new_prefix .='_';

            //Modify wp-config to change said prefix
            foreach ($lines as $line){
                if (strpos( $line, '$table_prefix') === 0) {
                    $line = '$table_prefix = ' . '"' . $new_prefix . '";\n';
                }
                $config_file .= $line;
            }

            //Update each table to reflect new prefix
            foreach ($wpdb->get_results( "SHOW TABLES LIKE '" . $wpdb->prefix . "%'", ARRAY_N ) as $table){
                $new_name = substr_replace($table[0], $new_prefix, 0, strlen( $wpdb->prefix ));
                $wpdb->query( "RENAME TABLE `{$table[0]}` TO `{$new_name}`" );
            }

            //Update specific options with new prefix
            $wpdb->query( "UPDATE {$new_prefix}options SET option_name='{$new_prefix}user_roles' WHERE option_name='{$wpdb->prefix}user_roles';" );

            $wpdb->query( "UPDATE {$new_prefix}usermeta SET meta_key = 
            CONCAT(
                REPLACE(LEFT(meta_key, " . strlen( $wpdb->prefix ) . "), '{$wpdb->prefix}', '{$new_prefix}'),
                SUBSTR(meta_key, " . ( strlen( $wpdb->prefix ) + 1 ) . ")
            )  WHERE
             meta_key in (
                 '{$wpdb->prefix}capabilities', '{$wpdb->prefix}user_level',
                 '{$wpdb->prefix}user-settings', '{$wpdb->prefix}user-settings-time',
                 '{$wpdb->prefix}dashboard_quick_press_last_post_id'
                 )");

            //Save the new wp-config
            if ( ! empty( $config_file ) ) {
                file_put_contents( $config, $config_file );
            }
        }

        //Check if DB prefix is different from default
        $db_prefix = $wpdb->prefix == "wp_" ? true /* Default */ : false /* Not Default */ ;

        //Get every plugins in need of an update
        foreach(get_site_transient('update_plugins')->response as $plugin){
            $plugin_data = get_plugin_data( $dir = plugin_dir_path( __DIR__ ). "/" . $plugin->plugin );
            $plugins_update[] = array('name' => $plugin_data['Name'], 'version' => $plugin_data['Version'], 'new_version' => $plugin->new_version, 'package' => $plugin->plugin, 'slug' => $plugin->slug);
        }
        
        //Get every themes in need of an update
        foreach(get_site_transient('update_themes')->response as $theme){
            $theme_data = wp_get_theme($theme['theme']);
            $themes_update[] = array('name' => $theme_data['Name'], 'version' => $theme_data['Version'], 'new_version' => $theme['new_version'], 'package' => $theme['package'], 'slug' => $theme['theme']);
        }
        
        //Get every unused plugins and the number of used plugins
        $active_plugins = 0;
        $inactive_plugins = 0;
        foreach($all_plugins as $slug => $plugin){
            if (!is_plugin_active($slug) && !is_plugin_active_for_network($slug)){
                $unused_plugins[] = array('name' => $plugin['Name'], 'author' => $plugin['AuthorName'], 'version' => $plugin['Version'], 'slug' => $plugin['TextDomain'], 'package' => $slug);
                $inactive_plugins += 1;
            }
            else{
                $active_plugins += 1;
            }
        }
        
        //Get every unused themes
        foreach($all_themes as $slug => $theme){
            if ($theme['Name'] != $my_theme->name){
                $unused_themes[] = array('name' => $theme['Name'], 'author' => $theme['Author'], 'version' => $theme['Version'], 'slug' => $slug);
            }
        }
        
        include 'view/lws_tk_notifpage.php';
    }
    
    elseif ($active_tab == 'server'){
        function convert($size)
        {
            $unit=array('b','K','M','G','T','P');
            return @round($size/pow(1024,($i=floor(log($size,1024)))),2).''.$unit[$i];
        }
        
        $environment = sanitize_text_field($_SERVER['SERVER_SOFTWARE']);
        $user_ip = sanitize_text_field($_SERVER['HTTP_X_REAL_IP']);
        $server_port =sanitize_text_field($_SERVER['SERVER_PORT']);
        
        if (sanitize_text_field($_SERVER['HTTPS']) == 'on'){
            $is_https = __('Yes', 'lws-tools');
        }
        else{
            $is_https = __('No', 'lws-tools');
        }
        
        $server_name = sanitize_text_field($_SERVER['SERVER_NAME']);
        $server_ip = sanitize_text_field($_SERVER['SERVER_ADDR']);
        $server_protocol = sanitize_text_field($_SERVER['SERVER_PROTOCOL']);

        $php_ver = phpversion();
        $is_debug = WP_DEBUG;
        if ($is_debug){
            $is_debug = __('Yes', 'lws-tools');
        }
        else{
            $is_debug = __('No', 'lws-tools');
        }
        
        $fopen = ini_get("allow_url_fopen");
        if ($fopen){
            $fopen = __('Yes', 'lws-tools');
        }
        else{
            $fopen = __('No', 'lws-tools');
        }
        
        $timezone = ini_get("date.timezone");
        $charset = ini_get("default_charset");
        $can_file_upload = ini_get("file_uploads");
        
        if ($can_file_upload){
            $can_file_upload = __('Yes', 'lws-tools');
        }
        else{
            $can_file_upload = __('No', 'lws-tools');
        }
        
        $max_exec_time = ini_get("max_execution_time");
        $max_file_upload = ini_get("max_file_uploads");
        $max_input_vars = ini_get("max_input_vars");
        $memory_limit = ini_get("memory_limit");
        $post_max_size = ini_get("post_max_size");
        $upload_max_filesize = ini_get("upload_max_filesize");
        $php_memory_usage = convert(memory_get_usage());
        
        include 'view/lws_tk_serverpage.php';
    }
    
    elseif ($active_tab == 'optimisation'){
        $optimisation_list = array('err_co' => __('Hide connexion errors on wp-login', 'lws-tools'), 'sanitize_media' => __('Provide a new way of sanitizing uploaded media name', 'lws-tools'), 
        'hide_gen' => __('Hide WordPress Version meta on pages', 'lws-tools'), 'delete_live_writer' => __('Delete Windows Live Writer manifest', 'lws-tools'),
        'less_revision' => __('Reduce the amount of available revisions to ', 'lws-tools'), 'no_h1_mce' => __('Remove Heading 1 from TinyMCE', 'lws-tools'), 'no_emote_wp' => __('Use visitor\'s emotes instead of WordPress' , 'lws-tools'),
        'no_apirest' => __('Deactivate REST API', 'lws-tools'), 'medium_large' => __('Add back hidden \'Medium Large\' image size ', 'lws-tools'), 'page_author_link' => __('Remove author\'s pages and their links', 'lws-tools'),
        'no_rss' => __('Remove RSS feeds', 'lws-tools'), 'remove_feeds_links' => __('Remove RSS feeds links', 'lws-tools'), 'no_comment_rss' => __('Remove comments RSS feeds', 'lws-tools'),
        'no_user_sitemap' => __('Hide users pages from WordPress sitemap', 'lws-tools'), 'no_user_ep_rest' => __('Hide users endpoints from REST API', 'lws-tools'),
         'remove_password_strength_meter' => __('Remove the Password Strength Meter in Accounts', 'lws-tools'), 'no_self_ping' => __('Prevent WordPress from self-pinging your in your articles', 'lws-tools'), 
         'remove_shortlink' => __('Remove shortlinks from the page', 'lws-tools'));
        
        if (isset($_POST['lws_tk_optimisations'])){
            //Sanitize array
            $checkboxes = isset( $_POST['lws_tk_optimisation_list'] ) ? (array) $_POST['lws_tk_optimisation_list'] : array();
            $checkboxes = array_map( 'sanitize_text_field', $checkboxes );
            //Update checkboxes
            foreach($optimisation_list as $key => $list){
                if (in_array($key, $checkboxes)){
                    update_option('lws_tk_' . $key, 'yes');
                    if ($key == 'less_revision'){
                        $value = sanitize_text_field($_POST['less_revision_revision_number']);
                        update_option('lws_tk_reduce_revisions_number', $value);
                    }
                }
                else{
                    delete_option('lws_tk_' . $key);
                    if ($key == 'less_revision'){
                        delete_option('lws_tk_reduce_revisions_number');
                    }
                }
            }       
        }
        include 'view/lws_tk_optipage.php';
    }
    
    elseif ($active_tab == 'mysql'){
        function convert($size)
        {
            $unit=array('b','K','M','G','T','P');
            return @round($size/pow(1024,($i=floor(log($size,1024)))),2).''.$unit[$i];
        }
        
        global $wpdb;
        $results = $wpdb->get_results("SHOW TABLE STATUS");
        $db_size = 0;
        $list_tables = array();
        foreach ($results as $size){
            $db_size += $size->Data_length + $size->Index_length;
            $list_tables[] = array('name' => $size->Name, 'size' => convert($size->Data_length + $size->Index_length), 'charset' => $size->Collation, 'created' => $size->Create_time, 'engine' => $size->Engine);
        }

        $table_number = count($list_tables);
        $db_size = (convert($db_size));
        include 'view/lws_tk_mysqlpage.php';
    }
    
    elseif ($active_tab == 'tools'){
        $optimisation_list = array('err_co' => __('Hide connexion errors on wp-login', 'lws-tools'), 'sanitize_media' => __('Provide a new way of sanitizing uploaded media name', 'lws-tools'), 
        'hide_gen' => __('Hide WordPress Version meta on pages', 'lws-tools'), 'delete_live_writer' => __('Delete Windows Live Writer manifest', 'lws-tools'),
        'less_revision' => __('Reduce the amount of available revisions to ', 'lws-tools'), 'no_h1_mce' => __('Remove Heading 1 from TinyMCE', 'lws-tools'), 'no_emote_wp' => __('Use visitor\'s emotes instead of WordPress' , 'lws-tools'),
        'no_apirest' => __('Deactivate REST API', 'lws-tools'), 'medium_large' => __('Add back hidden \'Medium Large\' image size ', 'lws-tools'), 'page_author_link' => __('Remove author\'s pages and their links', 'lws-tools'),
        'no_rss' => __('Remove RSS feeds', 'lws-tools'), 'remove_feeds_links' => __('Remove RSS feeds links', 'lws-tools'), 'no_comment_rss' => __('Remove comments RSS feeds', 'lws-tools'),
        'no_user_sitemap' => __('Hide users pages from WordPress sitemap', 'lws-tools'), 'no_user_ep_rest' => __('Hide users endpoints from REST API', 'lws-tools'),
         'remove_password_strength_meter' => __('Remove the Password Strength Meter in Accounts', 'lws-tools'), 'no_self_ping' => __('Prevent WordPress from self-pinging your in your articles', 'lws-tools'), 
         'remove_shortlink' => __('Remove shortlinks from the page', 'lws-tools'));

        global $wpdb; 
        $revisions_amount = $wpdb->get_results("SELECT * FROM `" . $wpdb->prefix . "posts` WHERE post_type='revision'");
        $revisions_amount = count($revisions_amount);
        
        $trashed_comments = count($wpdb->get_results("SELECT * FROM `" . $wpdb->prefix . "comments` WHERE comment_approved='trash'"));
        $spam_comments = count($wpdb->get_results("SELECT * FROM `" . $wpdb->prefix . "comments` WHERE comment_approved='spam'"));

        if (isset($_POST['lws_tk_reset_plugin'])){
            foreach ($optimisation_list as $key => $list){
                delete_option('lws_tk_' . $key);
            }
        }
        
        include 'view/lws_tk_toolspage.php';
    }
    
    elseif ($active_tab == 'ourplugins'){
        
        $plugins = array('lwshidelogin' => 'LWS Hide Login', 'lws-sms' => 'LWS SMS', 'lwscache' => 'LWSCache', 'lwsaffiliation' => 'LWS Affiliation');
        $plugins_activated = array();
        $all_plugins = get_plugins();
        
        
        if (is_plugin_active('lws-hide-login/lws-hide-login.php')){
            $plugins_activated['lwshidelogin'] = "full";
        }
        else if( array_key_exists( 'lws-hide-login/lws-hide-login.php', $all_plugins ) ){
            $plugins_activated['lwshidelogin'] = "half";
        }
        
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
            $plugins_activated['lwsaffiliation'] = "full";
        }
        else if( array_key_exists( 'lws-affiliation/lwsaffiliation.php', $all_plugins ) ){
            $plugins_activated['lwsaffiliation'] = "half";
        }
        
        include 'view/lws_tk_pluginspage.php';
    }
}

///OPTIMISATIONS///

add_action('init', 'lws_tk_optimisations');
function lws_tk_optimisations(){
    /**
     * Sanitize more the name of media uploaded
     */
    if (get_option('lws_tk_sanitize_media')){
        add_filter( 'sanitize_file_name', 'lws_tk_sanitize_file_name');
    }
    
    /**
     * Deactivate Windows Live Writer Manifest Link
     */
    if(get_option('lws_tk_delete_live_writer')){
    	remove_action( 'wp_head', 'wlwmanifest_link' );
    }
    
    /**
     * Remove any errors shown in the login page
     */
    if (get_option('lws_tk_err_co')){
        add_filter( 'login_errors', function( $error ) {
            return $error = esc_html__('Failed to connect', 'lws-tools');
        });
    }
    
    /**
     * Remove the element indicating the use of WordPress
     */
    if (get_option('lws_tk_hide_gen')){ 
        remove_action( 'wp_head', 'wp_generator' );
    }

    /**
     * Reduce number of revisions [Based on option _number - 1]
     */
    if (get_option('lws_tk_less_revision')){
        add_filter( 'wp_revisions_to_keep', 'lws_tk_reduce_revisions', 10, 2 );
        function lws_tk_reduce_revisions( $num, $post ) {
            return $num = get_option('lws_tk_reduce_revisions_number');
        }
    }
    
    /**
     * Remove heading1 for TMCE
     */
    if (get_option('lws_tk_no_h1_mce')){
        add_filter( 'tiny_mce_before_init', 'lws_tk_remove_h1_tmce');
        function lws_tk_remove_h1_tmce($block){
            $block['block_formats'] = "Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre";
            return $block;
        }
    }
    
    /**
     * Disable the emoji's
     */
    if (get_option('lws_tk_no_emote_wp')){
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        add_filter( 'tiny_mce_plugins', 'lws_tk_disable_emojis_tinymce' );
        add_filter( 'wp_resource_hints', 'lws_tk_disable_emojis_remove_dns_prefetch', 10, 2 );
    }
    
    /**
     * Remove Author Page and its link
     */
	if (get_option('lws_tk_page_author_link')){
		add_action( 'template_redirect', function(){if ( is_author() ) {global $wp_query; $wp_query->set_404(); status_header( 404 );}} );
		add_filter( 'author_link', function(){ return get_option( 'home' );});
	}
    
    /**
     * Add one more size type for images
     */
    if (get_option('lws_tk_medium_large')){
        add_filter( 'image_size_names_choose', function( $size_names ) {
            $new_sizes = array(
                'medium_large' => esc_html__( 'Medium-Large', 'lws-tools' ),
            );
            return array_merge( $size_names, $new_sizes );
        });
    }
    
    /**
     * Disable REST API in its entirety
     */
    if (get_option('lws_tk_no_apirest')){
        add_filter( 'rest_authentication_errors', function($access){
            return new WP_Error( 'rest_disabled',
            esc_html__( 'The WordPress REST API has been disabled.', 'lws-tools' ), 
            array( 'status' => rest_authorization_required_code() ) );  
        });
    }

    /**
     * Disable only the endpoints for users and users/id when disconnected
     */
    if (get_option('lws_tk_no_user_ep_rest')){
        if (!is_user_logged_in()){
            add_filter( 'rest_endpoints', 'lws_tk_disable_custom_rest_endpoints');
        }
    }
    
    /**
     * Disable all RSS Feeds
     */
    if(get_option('lws_tk_no_rss')){
        add_action('do_feed', function(){wp_die( esc_html__( 'No feed available', 'lws-tools'));}, 1);
        add_action('do_feed_rdf', function(){wp_die( esc_html__( 'No feed available', 'lws-tools'));}, 1);
        add_action('do_feed_rss', function(){wp_die( esc_html__( 'No feed available', 'lws-tools'));}, 1);
        add_action('do_feed_rss2', function(){wp_die( esc_html__( 'No feed available', 'lws-tools'));}, 1);
        add_action('do_feed_atom', function(){wp_die( esc_html__( 'No feed available', 'lws-tools'));}, 1);
        add_action('do_feed_rss2_comments', function(){wp_die( esc_html__( 'No feed available', 'lws-tools'));}, 1);
        add_action('do_feed_atom_comments', function(){wp_die( esc_html__( 'No feed available', 'lws-tools'));}, 1);
    }
        
    /**
     * Disable only Comments RSS Feed
     */
    if(get_option('lws_tk_no_comment_rss')){
        add_action('do_feed', function( $comments ) {if( $comments ) { wp_die( esc_html__( 'No feed available', 'lws-tools'));}}, 1);
        add_action('do_feed_rdf', function( $comments ) {if( $comments ) {wp_die( esc_html__( 'No feed available', 'lws-tools'));}}, 1);
        add_action('do_feed_rss', function( $comments ) {if( $comments ) {wp_die( esc_html__( 'No feed available', 'lws-tools'));}}, 1);
        add_action('do_feed_rss2', function( $comments ) {if( $comments ) {wp_die( esc_html__( 'No feed available', 'lws-tools'));}}, 1);
        add_action('do_feed_atom', function( $comments ) {if( $comments ) {wp_die( esc_html__( 'No feed available', 'lws-tools'));}}, 1);
        add_action('do_feed_rss2_comments', function( $comments ) {if( $comments ) {wp_die( esc_html__( 'No feed available', 'lws-tools'));}}, 1);
        add_action('do_feed_atom_comments', function( $comments ) {if( $comments ) {wp_die( esc_html__( 'No feed available', 'lws-tools'));}}, 1);
    }
}

/**
 * Remove links to users in the sitemap
 */
if (get_option('lws_tk_no_user_sitemap')){
add_filter( 'wp_sitemaps_add_provider', function ($provider, $name) {
    return ( $name == 'users' ) ? false : $provider;}, 10, 2);
}

/**
 * Remove password strength check.
 */
if (get_option('lws_tk_remove_password_strength_meter')){
    add_action( 'admin_enqueue_scripts', 'lws_tk_remove_password_strength_meter');
}
function lws_tk_remove_password_strength_meter($hook) {
    if ($hook != "user-new.php"){
        return;
    }
    wp_dequeue_script( 'wc-password-strength-meter' );
    wp_dequeue_script('user-profile');
    wp_dequeue_script('password-strength-meter');
    wp_deregister_script('user-profile');
    $suffix = SCRIPT_DEBUG ? '' : '.min';
    $admin = explode('/', admin_url( '', 'relative' ));
    end($admin);
    $admin = prev($admin);
    wp_enqueue_script( 'user-profile', '/' . $admin . "/js/user-profile$suffix.js", array( 'jquery', 'wp-util' ), false, 1 );
}

/**
 * Remove self-pingbacks in articles
 */
if (get_option('kws_tk_no_self_ping')){
    add_action( 'pre_ping', 'lws_tk_no_self_ping' );
}
function lws_tk_no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}

/**
 * Remove shorlink from head
 */
if (get_option('lws_tk_remove_shortlink')){
    add_filter('after_setup_theme', 'lws_tk_remove_shortlink');
}
function lws_tk_remove_shortlink() {
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    remove_action( 'template_redirect', 'wp_shortlink_header', 11);
} 

if (get_option('lws_tk_remove_feeds_links')){
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'feed_links', 2 );
}


/**
 * Produces cleaner filenames for uploads
 * @wpartisan
 */
function lws_tk_sanitize_file_name( $filename ) {
    $sanitized_filename = remove_accents( $filename );
 
    // Standard replacements
    $invalid = array(
        ' '   => '-',
        '%20' => '-',
        '_'   => '-',
    );
    
    //Replace invalid characters defined above in the name by '-'
    $sanitized_filename = str_replace( array_keys( $invalid ), array_values( $invalid ), $sanitized_filename );
 
    $sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except '.'
    $sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last '.'
    $sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
    $sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
    $sanitized_filename = strtolower( $sanitized_filename ); // Lowercase
 
    return $sanitized_filename;
}

/**
 * Filter function used to remove the tinymce emoji plugin.
 */
function lws_tk_disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 */
function lws_tk_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}

/**
 * Disable access to the users and users/id endpoints of RESTAPI
 */
function lws_tk_disable_custom_rest_endpoints( $endpoints ) {
    $routes = array( '/wp/v2/users', '/wp/v2/users/(?P<id>[\d]+)' );
    foreach ($routes as $route){
        if ( !empty( $endpoints[ $route ] ) ) {
            foreach ( $endpoints[ $route ] as $i => $handlers ) {
                if ( is_array( $handlers ) && isset( $handlers['methods'] ) &&
                    'GET' === $handlers['methods'] ) {
                    unset( $endpoints[ $route ][ $i ] );
                }
            }
        }
    }

    return $endpoints;
}

///END OPTIMISATIONS///

////AJAX////

//AJAX Plugins//
add_action("wp_ajax_lwstools_updateAllPlugin", "lws_tk_update_all_plugin");
function lws_tk_update_all_plugin(){
    $pu = new Plugin_Upgrader();
    $update_all = array();
    foreach(get_site_transient('update_plugins')->response as $plugin){
        $update_all[] = $plugin->plugin;
    }
    $pu->bulk_upgrade($update_all);
    wp_die();
}

add_action("wp_ajax_lwstools_updatePlugin", "lws_tk_update_plugin");
function lws_tk_update_plugin(){
    $pu = new Plugin_Upgrader();
    $plugin_package = sanitize_text_field($_POST['lws_tk_update_plugin_specific']);
    $pu->upgrade($plugin_package);
    $pu->plugin_info();
    wp_die();
}
//

//AJAX Themes//
add_action("wp_ajax_lwstools_updateAllTheme", "lws_tk_update_all_theme");
function lws_tk_update_all_theme(){
    $tu = new Theme_Upgrader();
    $update_all = array();
    foreach(get_site_transient('update_themes')->response as $theme){
        $update_all[] = $theme['theme'];
    }
    $tu->bulk_upgrade($update_all);
    wp_die();
}

add_action("wp_ajax_lwstools_updateTheme", "lws_tk_update_theme");
function lws_tk_update_theme(){
    $tu = new Theme_Upgrader();
    $theme_package = sanitize_text_field($_POST['lws_tk_update_theme_specific']);
    $tu->upgrade($theme_package);
    wp_die();
}
//

//AJAX Unused Plugins//
add_action("wp_ajax_lwstools_deleteAllPlugin", "lws_tk_delete_all_plugin");
function lws_tk_delete_all_plugin(){
    $to_delete = array();
    foreach(get_plugins() as $slug => $plugin){
        if (!is_plugin_active($slug) && !is_plugin_active_for_network($slug)){
            $to_delete[] = $slug;
        }
    }
    delete_plugins($to_delete);
    wp_die();
}

add_action("wp_ajax_lwstools_deletePlugin", "lws_tk_delete_plugin");
function lws_tk_delete_plugin(){
    $plugin_package = sanitize_text_field($_POST['lws_tk_delete_plugin_specific']);
    delete_plugins([$plugin_package]);
    wp_die();
}
//

//AJAX Unused Themes//
add_action("wp_ajax_lwstools_deleteAllTheme", "lws_tk_delete_all_theme");
function lws_tk_delete_all_theme(){
    foreach(wp_get_themes() as $slug => $theme){
        if ($theme['Name'] != wp_get_theme()->name){
            delete_theme($slug);
        }
    }
    wp_die();
}

add_action("wp_ajax_lwstools_deleteTheme", "lws_tk_delete_theme");
function lws_tk_delete_theme(){
    $theme_package = sanitize_text_field($_POST['lws_tk_delete_theme_specific']);
    delete_theme($theme_package);
    wp_die();
}
//

//AJAX DL Plugin//
add_action("wp_ajax_lwstools_downloadPlugin" , "wp_ajax_install_plugin");
//

//AJAX Activate Plugin//
add_action("wp_ajax_lwstools_activatePlugin" , "lws_tk_activate_plugin");
function lws_tk_activate_plugin(){
    if(isset($_POST['ajax_slug'])){
        switch (sanitize_textarea_field($_POST['ajax_slug'])) {
            case 'lwshidelogin':
                activate_plugin('lws-hide-login/lws-hide-login.php');
                break;
            case 'lws-sms':
                activate_plugin('lws-sms/lws-sms.php');
                break;
            case 'lwscache':
                activate_plugin('lwscache/lws-cache.php');
                break;
            case 'lwsaffiliation':
                activate_plugin('lws-affiliation/lwsaffiliation.php');
                break;
        }
    }
    wp_die();
}
//

//AJAX Update Trads//
add_action("wp_ajax_lwstools_updateTrads" , "lws_tk_update_trads");
function lws_tk_update_trads(){
    $lp = new Language_Pack_Upgrader();
    $lp->bulk_upgrade();    
    wp_die();
}
//

//AJAX Repair DB//
add_action("wp_ajax_lwstools_repairdb" , "lws_tk_repairdb");
function lws_tk_repairdb(){
        @exec ("wp config set WP_ALLOW_REPAIR true --raw");
        echo esc_url(get_site_url() . "/wp-admin/maint/repair.php?repair=1");
    wp_die();
}
//

//AJAX Opti DB//
add_action("wp_ajax_lwstools_optidb" , "lws_tk_optidb");
function lws_tk_optidb(){
        @exec ("wp config set WP_ALLOW_REPAIR true --raw");
        echo esc_url(get_site_url() . "/wp-admin/maint/repair.php?repair=2");
    wp_die();
}
//

//AJAX Deactivate Repair DB//
add_action("wp_ajax_lwstools_deactivate_repair" , "lws_tk_deactivate_repairdb");
function lws_tk_deactivate_repairdb(){
        @exec ("wp config delete WP_ALLOW_REPAIR");
    wp_die();
}
//

//AJAX Disconnect everyone but user//
add_action("wp_ajax_lwstools_disconnectall", "lws_tk_disconnect_all");
function lws_tk_disconnect_all(){
    foreach( get_users(array( 'fields' => array( 'ID' ))) as $user){
        if ($user->ID == get_current_user_id()){
            $sessions = WP_Session_Tokens::get_instance( get_current_user_id() );
            $sessions->destroy_others(  wp_get_session_token() );
        }
        else{
            $sessions = WP_Session_Tokens::get_instance( $user->ID);
            $sessions->destroy_all(); 
        }
    }
    wp_die();
}
//

//AJAX Delete revisions older than $days//
add_action("wp_ajax_lwstools_delete_revisions", "lws_tk_delete_revision");
function lws_tk_delete_revision(){
    global $wpdb;
    $days = sanitize_text_field($_POST['lws_tk_days_revisions']);
    $wpdb->get_results("DELETE FROM `" . $wpdb->prefix . "posts` WHERE post_type='revision' AND post_modified < '" . date("Y-m-d H:i:s", time() - (24*60*60*$days)) . "';");
    wp_die();
}
//

//AJAX Delete Trashed comments//
add_action("wp_ajax_lwstools_delete_trash_comments", "lws_tk_delete_trash_comments");
function lws_tk_delete_trash_comments(){
    global $wpdb;
    $wpdb->get_results("DELETE FROM `" . $wpdb->prefix . "comments` WHERE comment_approved='trash'");
    wp_die();
}
//

//AJAX Delete Trashed comments//
add_action("wp_ajax_lwstools_delete_spam_comments", "lws_tk_delete_spam_comments");
function lws_tk_delete_spam_comments(){
    global $wpdb;
    $wpdb->get_results("DELETE FROM `" . $wpdb->prefix . "comments` WHERE comment_approved='spam'");
    wp_die();
}
//

//AJAX Delete old transients//
add_action("wp_ajax_lwstools_delete_transients", "lws_tk_delete_old_transients");
function lws_tk_delete_old_transients(){
    delete_expired_transients();
    wp_die();
}
//

//AJAX Keep Config even after delete//
add_action("wp_ajax_lwstools_keep_changes", "lws_tk_keep_changes");
function lws_tk_keep_changes(){
    $is_checked = sanitize_text_field($_POST['state']);
    $is_checked == 'true' ? update_option('lws_tk_keep_data_on_delete', true) : delete_option('lws_tk_keep_data_on_delete');
    wp_die();
}
//

///END AJAX///
