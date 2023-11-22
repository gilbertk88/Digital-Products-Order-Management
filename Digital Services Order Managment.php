<?php

/**
 * Plugin Name: Digital Services / Products Order Management
 * Plugin URI: http://www.exclusivewebmarketing.com/Digital-Products-Order-Management/
 * Plugin Prefix: ewm_dsom
 * Plugin ID: Digital-Services-Products-Order-Management
 * Description: Digital Services / Products Order Management -  Wordpress Plugin.
 * Version: 1.0.9
 * Author: Exclusive Web Marketing
 * Author URI: https://exclusivewebmarketing.com/
 * Text Domain: plugin-Digital-Services-Products-Order-Management
 * Domain Path: languages
 * Domain Var: PLUGIN_TD
 * License: GPL-2.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


if ( ! function_exists( 'dpm_fs' ) ) {
    // Create a helper function for easy SDK access.
    function dpm_fs() {
        global $dpm_fs;

        if ( ! isset( $dpm_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $dpm_fs = fs_dynamic_init( array(
                'id'                  => '11551',
                'slug'                => 'Digital-Products-Order-Management',
                'type'                => 'plugin',
                'public_key'          => 'pk_cd9a8fd8cee60fb3bfa917677c3e3',
                'is_premium'          => true,
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'is_org_compliant'    => false,
                'menu'                => array(
                    'slug'           => 'ewm-dpm',
                    'support'        => false,
                ),
                // Set the SDK to work in a sandbox mode (for development & testing).
                // IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
                'secret_key'          => 'sk_N)nt+cZ4VRM_uv:a4N@9sgD&IQw}C',
            ) );
        }

        return $dpm_fs;
    }

    // Init Freemius.
    dpm_fs();
    // Signal that SDK was initiated.
    do_action( 'dpm_fs_loaded' );
}

include_once dirname(__FILE__) . '/vendor/autoload.php';
require_once( plugin_dir_path( __FILE__ ) . '/libraries/action-scheduler/action-scheduler.php' );
// include_once dirname(__FILE__) . '/app/__autoload.php';

use Themosis\Core\Application;

use \Illuminate\Container\Container as Container;
use \Illuminate\Support\Facades\Facade as Facade;

/**
* Setup a new app instance container
* 
* @var Illuminate\Container\Container
*/
$app = new Container();
//$app->singleton('app', 'Illuminate\Container\Container');

//----------------------------------------------------------------------------------------------------------

define('THEMOSIS_ROOT', dirname(__FILE__));

/*----------------------------------------------------*/
// Application paths
/*----------------------------------------------------*/
define('THEMOSIS_PUBLIC_DIR', dirname(__FILE__));

// define('THEMOSIS_PUBLIC_DIR', 'htdocs');
// define('CONTENT_DIR', 'content');
// define('WP_CONTENT_DIR', THEMOSIS_ROOT.'/../../../');

// $app = new Application( THEMOSIS_ROOT );

//$app = new Container();
$app->singleton('app', 'Illuminate\Container\Container');

/*----------------------------------------------------*/
// Bind interfaces
/*----------------------------------------------------*/
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

//return $app;

/**
* Set $app as FacadeApplication handler
*/
Facade::setFacadeApplication($app);
/*
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();

$kernel->init(
    Illuminate\Http\Request::capture()
);
*/
/*
|--------------------------------------------------------------------------
| Bootstrap Plugin
|--------------------------------------------------------------------------
|
| We bootstrap the plugin. The following code is loading your plugin
| configuration and resources.
*/
$plugin = ( Application::getInstance())->loadPlugin(__FILE__, 'config' ) ;

/*
|--------------------------------------------------------------------------
| Plugin i18n | l10n
|--------------------------------------------------------------------------
|
| Registers the "languages" directory for storing the plugin translations.
| The plugin text domain constant name is the plugin "Domain Var" header
| and its value the "Text Domain" header.
*/

load_themosis_plugin_textdomain(

    $plugin->getHeader('text_domain'),
    $plugin->getPath($plugin->getHeader('domain_path'))

);

/*
|--------------------------------------------------------------------------
| Plugin Assets Locations
|--------------------------------------------------------------------------
|
| You can define your plugin assets paths and URLs. You can add as many
| locations as you want. The key is your asset directory path and
| the value is its public URL.
*/
$plugin->assets([
    $plugin->getPath('dist') => $plugin->getUrl('dist')
]);

/*
|--------------------------------------------------------------------------
| Plugin Views
|--------------------------------------------------------------------------
|
| Register the plugin "views" directory. You can configure the list of
| view directories from the "config/prefix_plugin.php" configuration file.
*/
$plugin->views($plugin->config('plugin.views', []));

/*
|--------------------------------------------------------------------------
| Plugin Service Providers
|--------------------------------------------------------------------------
|
| Register the plugin "views" directory. You can configure the list of
| view directories from the "config/prefix_plugin.php" configuration file.
*/
$plugin->providers($plugin->config('plugin.providers', []));

/*
|--------------------------------------------------------------------------
| Plugin Includes
|--------------------------------------------------------------------------
|
| Auto includes files by providing one or more paths. By default, we setup
| an "inc" directory within the plugin. Use that "inc" directory to extend
| your WordPress application. Nested files are also included.
*/
$plugin->includes([
    $plugin->getPath('inc')
]);

add_shortcode( 'user_signup_ewm_dsp', 'EwmDpm\Hooks\MyUser::user_signup_form' );

add_shortcode( 'user_login_ewm_dsp', 'EwmDpm\Hooks\MyUser::user_login_form' );

add_shortcode( 'user_login_signup_ewm_dsp', 'EwmDpm\Hooks\MyUser::user_login_signup_form' );

add_shortcode( 'dashboard_ewm_dpm', 'EwmDpm\Hooks\MyUser::user_dashboard' );

add_shortcode( 'show_frontend_products_ewm_dpm', 'EwmDpm\Hooks\MyUser::show_frontend_products' );

// Load scripts
add_action('admin_enqueue_scripts', 'ewm_dpm_load_admin_resources');

function ewm_dpm_load_admin_resources($options)
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('ewm-dpm-main-lib-uploader-js', plugins_url(basename(dirname(__FILE__)) . '/assets/js/admin-script.js', 'jquery'));
    wp_localize_script('ewm-dpm-main-lib-uploader-js', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php'),));
    wp_enqueue_style('ewm-dpm-_style_public', plugins_url(basename(dirname(__FILE__)) . '/assets/css/admin-style.css'));
    // Load the datepicker script (pre-registered in WordPress).
    wp_enqueue_script( 'jquery-ui-datepicker' );

    // You need styling for the datepicker. For simplicity I've linked to the jQuery UI CSS on a CDN.
    wp_register_style( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );
}

add_action('wp_enqueue_scripts', 'ewm_dpm_load_public_resources');

function ewm_dpm_load_public_resources($options)
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('ewm-dpm-public-main-lib-uploader-js', plugins_url(basename(dirname(__FILE__)) . '/assets/js/public-script.js', 'jquery'));
    wp_localize_script('ewm-dpm-public-main-lib-uploader-js', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php'),));
    wp_enqueue_style('ewm-dpm-style_public', plugins_url(basename(dirname(__FILE__)) . '/assets/css/public-style.css'));
}

// Checking and validating when products are added to cart

// ====================================================================================================================

add_action("wp_ajax_ewm_dpm_submit_signup_form", 'EwmDpm\Hooks\MyUser::signup_ajax');

//=====================================================================================================================

// add_action("wp_ajax_nopriv_ewm_dpm_submit_profile_form", 'EwmDpm\Hooks\MyUser::update_profile_ajax');

add_action("wp_ajax_ewm_dpm_submit_profile_form", 'EwmDpm\Hooks\MyUser::update_profile_ajax');

//=====================================================================================================================

// add_action("wp_ajax_nopriv_ewm_dpm_get_single_ticket", 'EwmDpm\Hooks\MyUser::get_tickets');

add_action("wp_ajax_ewm_dpm_get_single_ticket", 'EwmDpm\Hooks\MyUser::get_tickets');

//=====================================================================================================================

// add_action("wp_ajax_nopriv_ewm_dpm_update_ticket_status", 'EwmDpm\Hooks\MyUser::update_ticket_status');

add_action("wp_ajax_ewm_dpm_update_ticket_status", 'EwmDpm\Hooks\MyUser::update_ticket_status');

// ====================================================================================================================
// add_action("wp_ajax_nopriv_ewm_dpm_new_ticket_form", 'EwmDpm\Hooks\MyUser::create_new_ticket_ajax');

add_action("wp_ajax_ewm_dpm_new_ticket_form", 'EwmDpm\Hooks\MyUser::create_new_ticket_ajax');

add_action("admin_menu", 'EwmDpm\Hooks\MyUser::admin_menu');

//=====================================================================================================================

// add_action("wp_ajax_nopriv_ewm_dpm_add_comment_on_ticket", 'EwmDpm\Hooks\MyUser::add_comment_on_ticket');

add_action("wp_ajax_ewm_dpm_add_comment_on_ticket", 'EwmDpm\Hooks\MyUser::add_comment_on_ticket');

//=====================================================================================================================

// add_action( "wp_ajax_nopriv_ewm_dpm_create_new_product", 'EwmDpm\Hooks\MyUser::ajax_create_new_product' );

add_action( "wp_ajax_ewm_dpm_create_new_product", 'EwmDpm\Hooks\MyUser::ajax_create_new_product' );

//=====================================================================================================================

// add_action( "wp_ajax_nopriv_ewm_dpm_edit_new_product", 'EwmDpm\Hooks\MyUser::ajax_edit_new_product' );

add_action( "wp_ajax_ewm_dpm_edit_new_product", 'EwmDpm\Hooks\MyUser::ajax_edit_new_product' );

//=====================================================================================================================

// add_action( "wp_ajax_nopriv_ewm_dpm_add_p_to_cart", 'EwmDpm\Hooks\MyUser::ajax_add_product_to_cart' );

add_action( "wp_ajax_ewm_dpm_add_p_to_cart", 'EwmDpm\Hooks\MyUser::ajax_add_product_to_cart' );

//=====================================================================================================================

// add_action( "wp_ajax_nopriv_ewm_dpm_pf_add_feature", 'EwmDpm\Hooks\MyUser::ajax_pf_add_feature' );

add_action( "wp_ajax_ewm_dpm_pf_add_feature", 'EwmDpm\Hooks\MyUser::ajax_pf_add_feature' );

//=====================================================================================================================
// add_action( "wp_ajax_nopriv_ewm_dpm_pf_edit_feature", 'EwmDpm\Hooks\MyUser::ajax_pf_edit_feature' );

add_action( "wp_ajax_ewm_dpm_pf_edit_feature", 'EwmDpm\Hooks\MyUser::ajax_pf_edit_feature' );

//=====================================================================================================================
// add_action( "wp_ajax_nopriv_ewm_dpm_pfs_connect_feature", 'EwmDpm\Hooks\MyUser::ajax_pfs_connect_feature' );

add_action( "wp_ajax_ewm_dpm_pfs_connect_feature", 'EwmDpm\Hooks\MyUser::ajax_pfs_connect_feature' );

//=====================================================================================================================
// add_action( "wp_ajax_nopriv_ewm_dpm_pt_connect_feature", 'EwmDpm\Hooks\MyUser::ajax_pt_connect_feature' );

add_action( "wp_ajax_ewm_dpm_pt_connect_feature", 'EwmDpm\Hooks\MyUser::ajax_pt_connect_feature' );


add_action( "wp_ajax_ewm_dpm_pt_connect_feature_wo", 'EwmDpm\Hooks\MyUser::ajax_pt_connect_feature_wo' );

//=====================================================================================================================

// add_action( "wp_ajax_nopriv_ewm_swo_new_workorder", 'EwmDpm\Hooks\MyUser::ajax_swo_new_workorder' );

add_action( "wp_ajax_ewm_swo_new_workorder", 'EwmDpm\Hooks\MyUser::ajax_swo_new_workorder' );

//=====================================================================================================================

// add_action( "wp_ajax_nopriv_ewm_dpm_settings", 'EwmDpm\Hooks\MyUser::ajax_ewm_dpm_settings' );

add_action( "wp_ajax_ewm_dpm_settings", 'EwmDpm\Hooks\MyUser::ajax_ewm_dpm_settings' );

//=====================================================================================================================

add_filter( 'woocommerce_thankyou', 'EwmDpm\Hooks\MyUser::add_custom_form_to_cart' );

add_action( 'gform_after_submission', 'EwmDpm\Hooks\MyUser::process_single_form_submission', 10, 2 );

//=====================================================================================================================

// add_action( "wp_ajax_nopriv_ewm_dpm_make_call_request", 'EwmDpm\Hooks\MyUser::ajax_make_call_request' );

add_action( "wp_ajax_ewm_dpm_make_call_request", 'EwmDpm\Hooks\MyUser::ajax_make_call_request' );

//=====================================================================================================================

// add_action( "wp_ajax_nopriv_ewm_dpm_new_task", 'EwmDpm\Hooks\MyUser::ajax_new_task' );

add_action( "wp_ajax_ewm_dpm_new_task", 'EwmDpm\Hooks\MyUser::ajax_new_task' );

//=====================================================================================================================
// add_action( "wp_ajax_nopriv_ewm_dpm_edit_task", 'EwmDpm\Hooks\MyUser::ajax_edit_task' );

add_action( "wp_ajax_ewm_dpm_edit_task", 'EwmDpm\Hooks\MyUser::ajax_edit_task' );

// ewm_save_new_order_all
// add_action( "wp_ajax_nopriv_ewm_save_new_order_all", 'EwmDpm\Hooks\MyUser::ajax_save_new_order_all' );

add_action( "wp_ajax_ewm_save_new_order_all", 'EwmDpm\Hooks\MyUser::ajax_save_new_order_all' );

add_action( "wp_ajax_ewm_dpm_assign_to_work_order", 'EwmDpm\Hooks\MyUser::ajax_assign_to_work_order' );

add_action( "wp_ajax_ewm_dpm_assign_to_work_order_delegation", 'EwmDpm\Hooks\MyUser::ajax_assign_to_work_order_delegation' );

add_action( "wp_ajax_ewm_dpm_update_single_workspace_meta", 'EwmDpm\Hooks\MyUser::ajax_update_single_workspace_meta' );

// ewm_dpm_assign_to_work_order
// ewm_save_new_order_all
// add_action( "wp_ajax_nopriv_ewm_dpm_create_order_cache_post", 'EwmDpm\Hooks\MyUser::ajax_save_new_order_all' );

add_action( "wp_ajax_ewm_dpm_create_order_cache_post", 'EwmDpm\Hooks\MyUser::ajax_create_order_cache_post' );

add_action( "wp_ajax_ewm_dpm_client_details_billing", 'EwmDpm\Hooks\MyUser::ajax_client_details_billing' );

//==============================================================================================================

add_action( "wp_ajax_ewm_dpm_client_details_payment", 'EwmDpm\Hooks\MyUser::ajax_client_details_payment' );

//==============================================================================================================

add_action( "wp_ajax_ewm_dpm_update_order_cache_post", 'EwmDpm\Hooks\MyUser::ajax_update_order_cache_post' );

add_action( "wp_ajax_ewm_dpm_send_form_values", 'EwmDpm\Hooks\MyUser::ajax_send_form_values' );

//==============================================================================================================

add_action( "wp_ajax_ewm_dpm_product_settings_save", 'EwmDpm\Hooks\MyUser::ajax_product_settings_save' );

add_action( "wp_ajax_ewm_dpm_product_settings_save", 'EwmDpm\Hooks\MyUser::ajax_product_settings_save' );

//================================================================

add_action( "wp_ajax_ewm_dpm_create_new_task", 'EwmDpm\Hooks\MyUser::ajax__create_new_task' );

add_action( 'wp_ajax_ewm_dpm_update_single_task_meta_value', 'EwmDpm\Hooks\MyUser::ajax__update_single_task_meta_value' );

add_action( 'wp_ajax_ewm_dpm_update_single_task_main_post_value', 'EwmDpm\Hooks\MyUser::ajax__update_single_task_main_post_value' );

add_action( 'wp_ajax_ewm_dpm_update_task_wo', 'EwmDpm\Hooks\MyUser::ajax__update_task_wo' );

add_action( 'wp_ajax_ewm_dpm_remove_task_from_list', 'EwmDpm\Hooks\MyUser::ajax__remove_task_from_list' );

add_action( 'wp_ajax_ewm_dpm_add_task_comment', 'EwmDpm\Hooks\MyUser::ajax__add_task_comment' );

add_action( 'wp_ajax_ewm_dpm_client_code_data', 'EwmDpm\Hooks\MyUser::ajax__client_code_data' );

add_action('wp_ajax_ewm_dpm_get_all_client_fields', 'EwmDpm\Hooks\MyUser::ajax__get_all_client_fields' );

add_action('wp_ajax_ewm_dpm_save_individual_client' , 'EwmDpm\Hooks\MyUser::ajax__save_individual_client' );

add_action( 'wp_ajax_ewm_dpm_ewm_dpm_get_order_list', 'EwmDpm\Hooks\MyUser::ajax__get_client_orders' );

add_action( 'wp_ajax_ewm_dpm_change_client_on_order', 'EwmDpm\Hooks\MyUser::ajax__change_client_on_order' );

add_action('wp_ajax_ewm_dpm_do_removed_product_from_order', 'EwmDpm\Hooks\MyUser::ajax__do_removed_product_from_order' );

add_action('wp_ajax_ewm_dpm_do_select_product_from_order', 'EwmDpm\Hooks\MyUser::ajax__do_select_product_from_order' );

add_action('wp_ajax_ewm_dpm_create_workorder_template', 'EwmDpm\Hooks\MyUser::ajax__new_workorder_post' );

