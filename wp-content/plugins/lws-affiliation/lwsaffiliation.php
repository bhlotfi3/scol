<?php
/*
* Plugin Name: LWS Affiliation
* Plugin URI: https://affiliation.lws-hosting.com
* Description: Integrate our banners and widgets on your site with our affiliate program !
* Version: 2.0
* Author: LWS
* Author URI: https://www.lws.fr
* Tags: lws, hosting, affiliate program, affiliation
* Requires at least: 5.0
* Tested up to: 6.0
* Stable tag: 2.0
* License: GPLv2 or later
*
* @package    lws-affiliation
*/

// À l'activation du plugin
register_activation_hook(__FILE__, 'lws_aff_install');
function lws_aff_install(){
    // do not generate any output here
    if (is_writable(__DIR__ . '/data')) {
        file_put_contents(__DIR__ . '/data/config', serialize(array()));
    } else {
        deactivate_plugins(basename(__FILE__));
        wp_die('<p>' . esc_html__('The folder is not writeable</p>', 'lws-affiliation'), esc_html__('Plugin Activation Error', 'lws-affiliation'),  array('response' => 200, 'back_link' => TRUE));
    }
}

// Chargement du fichier de langue
add_action('init', 'lws_aff_add_language_block');
function lws_aff_add_language_block(){
    load_plugin_textdomain('lws-affiliation', false, basename(__DIR__) . '/languages');
}

//Chargement plugin TinyMCE pour l'admin
$configLWS = unserialize(file_get_contents(__DIR__ . '/data/config'));
if (isset($configLWS['apikey']) && !empty($configLWS['apikey'])) {
    add_filter('mce_buttons', 'lws_aff_register_buttons');
    add_filter('mce_external_plugins', 'lws_aff_register_tinymce_javascript');
}

function lws_aff_register_buttons($buttons){
    array_push($buttons, 'example');
    return $buttons;
}

function lws_aff_register_tinymce_javascript($plugin_array){

    // On récupere le listing des bannières et des widgets
    if (!file_exists(__DIR__ . '/data/banners') || filemtime(__DIR__ . '/data/banners') > strtotime("-24 hour")) {
        $configLWS = unserialize(file_get_contents(__DIR__ . '/data/config'));

        $urlAuth = 'https://affiliation.lws-hosting.com/api/listBanners2/' . $configLWS['apikey'];
        $return = json_decode(wp_remote_post($urlAuth)['body'], true);
        file_put_contents(__DIR__ . '/data/banners', serialize($return));
    }

    $plugin_array['example'] = plugins_url('/js/admin/tinymce-plugin.js', __FILE__);
    $plugin_array['noneditable'] = plugins_url('/js/admin/noneditable/plugin.min.js', __FILE__);
    return $plugin_array;
}


// Ajoute le Widget
add_filter('the_content', 'lws_aff_add_widget', 20);
function lws_aff_add_widget($content){
    $matches = array();
    preg_match("'<div id=\"divWidgetDomainAffiliationLWS\" class=\"mceNonEditable\" style=\"(.*?)\">'si", $content, $matches);
    if (isset($matches[1]))
        $content = str_replace($matches[1], '', $content);

    $matches = array();
    preg_match("'<div id=\"divWidgetTableAffiliationLWS\" class=\"mceNonEditable\" style=\"(.*?)\">'si", $content, $matches);
    if (isset($matches[1]))
        $content = str_replace($matches[1], '', $content);

    $content = str_replace(esc_html__('Widget Domaine Affiliation LWS', 'lws-affiliation'), '', $content);
    $content = str_replace(esc_html__('Widget Tableau Affiliation LWS', 'lws-affiliation'), '', $content);
    $content = str_replace('<p></p>', '', $content);

    return $content;
}

// Ajoute la feuille de style pour l'admin
add_action('admin_enqueue_scripts', 'lws_aff_add_admin_style');
function lws_aff_add_admin_style(){
        wp_enqueue_style('lwsaffiliationAdminStyle', plugins_url('./css/admin/style.css', __FILE__), false, '1.0.0');
        wp_enqueue_style( 'dt_css', plugins_url('css/admin/jquery.dataTables.min.css', __FILE__));
        wp_enqueue_style( 'dt_resp_css', plugins_url('css/admin/responsive.dataTables.min.css', __FILE__));
        wp_enqueue_script( 'dt_js', plugins_url('js/jquery.dataTables.min.js', __FILE__));
        wp_enqueue_script( 'dt_resp_js', plugins_url('js/dataTables.responsive.min.js', __FILE__));
}

add_action('wp_enqueue_scripts', 'lws_aff_add_front_style');

function lws_aff_add_front_style(){
    wp_enqueue_style('lwsaffiliation_Widget', plugins_url('./css/widget/widget.css', __FILE__));
}

// Ajoute une balise script permettant de définir l'URL du plugin Wordpress
add_action('admin_print_scripts', 'lws_aff_script_admin');
function lws_aff_script_admin(){
    echo "<script type='text/javascript'>\n";
    echo 'var affiliationConfigWidgetImage = "' . esc_url(plugins_url('/images/lws_Icone.svg', __FILE__)) . '";';
    echo 'var affiliationConfigWidget = "' . esc_url(plugins_url('/view/admin/configWidgetMCE.php', __FILE__)) . '";';
    echo "\n</script>";
}

// Ajoute une page d'option du plugin
add_action('admin_menu', 'lws_aff_menu');
function lws_aff_menu(){
    add_menu_page(esc_html__('LWS Affiliation Settings', 'lws-affiliation'), 'LWS Affiliation', 'read', 'lws-affiliation-settings', 'lws_aff_setup', plugins_url('/images/plugin_lws_affiliation.svg', __FILE__));
}

//setup
function lws_aff_setup(){
    // Suppression de la config actuelle
    if (isset($_POST['del_config'])) {
        file_put_contents(__DIR__ . '/data/config', '');
        echo "<script>window.location.href = '" . esc_url(get_admin_url()."admin.php?page=lws-affiliation-settings'") . "</script>";
    }
    
    if (isset($_POST['validate-config-aff-lws'])) {
        if (!empty(sanitize_text_field($_POST['username-aff-lws'])) && !empty(sanitize_text_field($_POST['password-aff-lws']))) {
            if (is_numeric(sanitize_text_field($_POST['username-aff-lws']))) {

                $urlAuth = 'https://affiliation.lws-hosting.com/api/auth/%d/%s';
                $retourApi = json_decode(file_get_contents(sprintf($urlAuth, sanitize_text_field($_POST['username-aff-lws']), sanitize_text_field($_POST['password-aff-lws']))));

                if (property_exists($retourApi, 'error')) {
                    $formError = esc_html__('Please verify your login parameters.', 'lws-affiliation');
                } elseif (property_exists($retourApi, 'apikey')) {
                    $configLWS['apikey'] = $retourApi->apikey;
                    file_put_contents(__DIR__ . '/data/config', serialize($configLWS));
                    $formSuccess = true;
                } else {
                    $formError = esc_html__('An error occured, please try to login again later.', 'lws-affiliation');
                }
            } else {
                $formError = esc_html__('Your affiliate ID must only contain numbers.', 'lws-affiliation');
            }
        } elseif (empty(sanitize_text_field($_POST['username-aff-lws']))) {
            $formError = esc_html__('Please enter your affiliate ID.', 'lws-affiliation');
        } elseif (empty(sanitize_text_field($_POST['password-aff-lws']))) {
            $formError = esc_html__('Please enter you affiliate password.', 'lws-affiliation');
        }
    }

    $configLWS = unserialize(file_get_contents(__DIR__ . '/data/config'));
    $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field($_GET[ 'tab' ]) : 'welcome';
    
    include __DIR__ . '/view/admin/tabs.php';

    if ($active_tab == 'welcome'){
        include __DIR__ . '/view/admin/setup.php';
    }
    
    else if ($active_tab == 'stats'){
        $data_global = lws_aff_apiStats();
        include __DIR__ . '/view/admin/stats.php';
    }
    
    else if ($active_tab ==  'history'){
        $last_sales = lws_aff_apiLastSales();
        include __DIR__ . '/view/admin/history.php';
    }
}

// Ajout d'une alerte lorsqu'aucun identifiant affilié n'a été renseigné
add_action('admin_notices', 'lws_aff_check_username');
function lws_aff_check_username(){
    if (!strstr($_SERVER['QUERY_STRING'], 'page=lws-affiliation-settings')) {
        $configLWS = unserialize(file_get_contents(__DIR__ . '/data/config'));
        if (!isset($configLWS['apikey']) || empty($configLWS['apikey'])) {
            echo '<div class="error ithemes"><strong>' . esc_html('LWS Affiliation') . '</strong>:' . esc_html__("You have not filled in your LWS identifiers. You can do so directly from this page:", 'lws-affiliation') . ' <a href="plugins.php?page=lws-affiliation-settings">' . esc_html__("Enter your username LWS", 'lws-affiliation') . '</a></div>';
        }
    }
}

// Ajout d'une alerte lorsque allow_url_fopen est désactivé
add_action('admin_notices', 'lws_aff_check_functions');
function lws_aff_check_functions(){
    //ini_set('allow_url_fopen', 0);
    if (!ini_get('allow_url_fopen')) {
        echo '<div class="update-nag"><p><strong>' . esc_html('LWS Affiliation') . '</strong>:' . esc_html__("Please activate the 'allow_url_fopen' variable in your PHP.ini file, otherwise the plugin will not work correctly.", 'lws-affiliation') . '</p></div>';
    }
}

//API CALL//
function lws_aff_apiStats(){
    $configLWS = unserialize(file_get_contents(__DIR__ . '/data/config'));
    $urlAuth = 'https://affiliation.lws-hosting.com/api/getStatsPlugin/%s';
    $retourApi = json_decode(file_get_contents(sprintf($urlAuth, $configLWS['apikey'])), true);
    return $retourApi;
}

function lws_aff_apiLastSales(){
    $configLWS = unserialize(file_get_contents(__DIR__ . '/data/config'));
    $urlAuth = 'https://affiliation.lws-hosting.com/api/getListingVentePlugin/%s';
    $retourApi = json_decode(file_get_contents(sprintf($urlAuth, $configLWS['apikey'])), true);
    return $retourApi['last_vente'];
}
