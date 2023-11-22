<?php

namespace EwmDpm\Hooks;

use Illuminate\View\View;
use Themosis\Hook\Hookable;

use function GuzzleHttp\json_encode;

//use Themosis\Support\Facades\User;
//use Themosis\Core\Auth\User as Auth;

class MyUser
{

    public function __construct( $bb = '' ) {
        //$this->$bb = $bb;
    }

    /**
     * Extend WordPress.
     */
    public static function user_signup_form( $request = null )
    {
        // UserUser
        $current_user_id = get_current_user_id();
        if ( $current_user_id == 0 ) {
            include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/login_signup.php';
        }
        else{
            include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/already_logged_in.php';
        }
    }

    public static function user_login_signup_form(){

        $current_user_id = get_current_user_id();

        if ( $current_user_id == 0 ) {

        include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/login_signup.php';

        }
        else{

            include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/already_logged_in.php';

        }

    }

    public static function user_dashboard(){

        // User User
        $current_user_id = get_current_user_id();

        if ( $current_user_id == 0 ) {
            include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/login_signup.php';
        }
        else{
            // add freelance user.
            // add management user.
            include_once THEMOSIS_PUBLIC_DIR . '/views/users/dashboard_client/index.php';
        }

    }

    public static function update_profile_ajax(){

        $user_acc_dat =  [
            'user_login'    => $param['ewmdsm_profile_username'],
            'user_nicename' => $param['ewmdsm_profile_username'],
            'user_email'    => $param['ewmdsm_profile_email'],
            'display_name'  => $param['ewmdsm_profile_display_name']
        ];

        $new_user_id = wp_update_user( $user_acc_dat );

    }

    public static function signup_ajax( $request = null ){

        $new_user = $_POST;

        // Create user
        MyUser::create_new_user( $new_user );

        // Return "error" or redirect url(dashboard) with email confirmation notice
        $view = ['user_id'=>'this is the user'];

        echo json_encode( $view );

        wp_die();

    }

    public static function create_new_user( $param = [] ){

        $user_acc_dat=  [
            'user_login'    => $param['ewmdsm_signup_username'],
            'user_email'    => $param['ewmdsm_signup_email'],
            'user_pass'     => $param['ewmdsm_signup_password'],
            'role'          => 'ewmdsm_client'
        ];

        $new_user_id = wp_insert_user( $user_acc_dat );

    }

    public static function user_login_form( $redirect_url = '' ) {

        $current_user_id = get_current_user_id();

        if ( $current_user_id == 0 ) {
            include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/login_signup.php';
        }
        else{
            include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/already_logged_in.php';
        }

    }

    public static function create_new_ticket_post(){

        $current_user_id = get_current_user_id();

        $ewm_dpm_new_ticket_title = str_replace("-", " ", $_POST['ewm_dpm_new_ticket_title'] );

        $post_data = [
            "post_author"           => $current_user_id,
            "post_date"             => date( 'Y-m-d H:i:s' ),
            "post_date_gmt"         => date( 'Y-m-d H:i:s' ),
            "post_content"          => $_POST['ewm_dpm_new_ticket_details'],
            "post_title"            => $_POST['ewm_dpm_new_ticket_title'],
            "post_excerpt"          => 'Ewm dpm new ticket',
            "post_status"           => "publish",
            "comment_status"        => "open",
            "ping_status"           => "closed",
            "post_password"         => "",
            "post_name"             => 'new',
            "to_ping"               => "",
            "pinged"                => "",
            "post_modified"         => date( 'Y-m-d H:i:s' ),
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
            "post_content_filtered" => "",
            "post_parent"           => $_POST['ewm_dpm_new_order_id'],
            "guid"                  => "",
            "menu_order"            => 0,
            "post_type"             => "ewm_dpm_ticket",
            "post_mime_type"        => "",
            "comment_count"         => "0",
            "filter"                => "raw",
        ];

        global  $wp_error ;

        $post_id = wp_insert_post( $post_data, $wp_error );

        add_post_meta( $post_id, 'ewm_dpm_ticket_status', 'new', true );
        
        return $post_id;

    }

    public static function create_new_ticket_ajax(){

        // Create new post of post type ewm_dpm_tickets
        $post_id = MyUser::create_new_ticket_post();

        echo json_encode( [
            'post_id'       => $post_id,
            'post_details'  => $_POST
        ] );

        wp_die();

    }

    public static function show_frontend_products() {

        include_once THEMOSIS_PUBLIC_DIR . '/views/users/frontend_order_funnel/frontend_new_orders.php';

    }

    public static function my_new_dpm() {

        include_once THEMOSIS_PUBLIC_DIR . '/views/admin/dashboard/index.php';

    }

    public static function ewm_add_feature_post() {

        $current_user_id = get_current_user_id();

        $ewm_dpm_new_feature_title = str_replace("-", " ", $_POST['ewm_dpm_pf_f'] );

        $post_data = [
            "post_author"           => $current_user_id,
            "post_date"             => date( 'Y-m-d H:i:s' ),
            "post_date_gmt"         => date( 'Y-m-d H:i:s' ),
            "post_content"          => $_POST['ewm_dpm_pf_fd'],
            "post_title"            => $_POST['ewm_dpm_pf_f'],
            "post_excerpt"          => '',
            "post_status"           => "active",
            "comment_status"        => "closed",
            "ping_status"           => "closed",
            "post_password"         => "",
            "post_name"             => $ewm_dpm_new_feature_title,
            "to_ping"               => "",
            "pinged"                => "",
            "post_modified"         => date( 'Y-m-d H:i:s' ),
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
            "post_content_filtered" => "",
            "post_parent"           => '',
            "guid"                  => "",
            "menu_order"            => 0,
            "post_type"             => "ewm_feature",
            "post_mime_type"        => "",
            "comment_count"         => "0",
            "filter"                => "raw",
        ];

        global  $wp_error ;

        $post_id = wp_insert_post( $post_data, $wp_error );

        add_post_meta( $post_id, 'ewm_feature_quantity', $_POST['ewm_dpm_pf_q'], true );
        
        return $post_id;

    }

    public static function ajax_pf_add_feature(){

        // Add new post of post type ewm_feature
        $post_id = MyUser::ewm_add_feature_post();

        echo json_encode([
            'post_id'   => $post_id,
            'values'    => $_POST
        ] );

        wp_die();

    }

    public static function ewm_edit_feature_post() {

        $current_user_id = get_current_user_id();

        $ewm_dpm_new_feature_title = str_replace("-", " ", $_POST['ewm_dpm_pf_f'] );

        $post_data = [
            "ID"                    => $_POST['ewm_dpm_pf_p_id'],
            "post_author"           => $current_user_id,
            "post_date"             => date( 'Y-m-d H:i:s' ),
            "post_date_gmt"         => date( 'Y-m-d H:i:s' ),
            "post_content"          => $_POST['ewm_dpm_pf_fd'],
            "post_title"            => $_POST['ewm_dpm_pf_f'],
            "post_excerpt"          => '',
            "post_status"           => "active",
            "comment_status"        => "closed",
            "ping_status"           => "closed",
            "post_password"         => "",
            "post_name"             => $ewm_dpm_new_feature_title,
            "to_ping"               => "",
            "pinged"                => "",
            "post_modified"         => date( 'Y-m-d H:i:s' ),
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
            "post_content_filtered" => "",
            "post_parent"           => '',
            "guid"                  => "",
            "menu_order"            => 0,
            "post_type"             => "ewm_feature",
            "post_mime_type"        => "",
            "comment_count"         => "0",
            "filter"                => "raw",
            'meta_input' => array(
                'ewm_feature_quantity' => $_POST['ewm_dpm_pf_q']
            )
        ];        

        global  $wp_error ;

        $post_id = wp_update_post( $post_data, $wp_error );

        // add_post_meta( $post_id, 'ewm_feature_quantity', $_POST['ewm_dpm_pf_q'], true );
        
        return $post_id;

    }

    public static function ajax_pf_edit_feature(){

        // Add new post of post type ewm_feature
        $post_id = MyUser::ewm_edit_feature_post();

        echo json_encode( [
            'post_id'   => $post_id,
            'values'    => $_POST
        ] );

        wp_die();

    }

    public static function update_ticket_status(){

        $new_ticket_status  = $_POST['ewmdsm_ticket_status'];

        $ticket_id      = $_POST['ewmdsm_ticket_id'];

        $old_ticket_status = get_post_meta( $ticket_id, 'ewm_dpm_ticket_status', true );
     
        $update_meta_data = update_post_meta(
            $ticket_id,
            'ewm_dpm_ticket_status',
            $new_ticket_status,
            $old_ticket_status
        );
        
        echo json_encode([
            'update_status' => $update_meta_data,
            'new_status'    => $new_ticket_status
        ]);

        wp_die();

    }

    public static function tickets(){

        $args = array(
            'numberposts' => 900,
            'post_type'   => 'ewm_dpm_ticket',
        );

        $ewm_dpm_ticket = get_posts($args);

        include_once THEMOSIS_PUBLIC_DIR . '/views/admin/tickets/ticket_list.php';

    }

    public static function arrange_comment_users( $args = [] ){

        $final_comments_arr = [];

        foreach ( $args as $key => $value ){

            $user_data = get_userdata( $value->user_id );

            $s_value = $user_data->data->display_name .' ('.$user_data->data->user_login.')';

            $final_comments_arr[ $value->comment_ID ] = $s_value;

        }

        return $final_comments_arr;
    }

    public static function get_tickets(){

        $single_ticket = get_post(  $_POST[ 'ewmdsm_ticket_id' ] );

        $comments_list = get_comments( [

            'orderby'   => 'comment_date_gmt',
            'order'   	=> 'ASC', //'DESC'.
            'post_id'	=> $_POST[ 'ewmdsm_ticket_id' ]

        ] );

        $user_comments_list = MyUser::arrange_comment_users( $comments_list );

        $ticket_status = get_post_meta(  $_POST[ 'ewmdsm_ticket_id' ], 'ewm_dpm_ticket_status', true );
        echo json_encode( [
            'comment_list'      => $comments_list,
            'single_ticket'     => $single_ticket,
            'ticket_status'     => $ticket_status,
            'user_comments_list'=>  $user_comments_list 
        ] );
        wp_die();
    }

    public static function ajax_pt_connect_feature(){       
        // Update the post meta 
        $pt_tasks = maybe_unserialize(get_post_meta( $_POST['ewm_dpm_post_id'], 'pt_tasks', true ));

        if( is_array(  $pt_tasks ) ){
            // Add the feature.
            $pt_tasks[ $_POST['ewm_dpm_task_id'] ] = $_POST[ 'ewm_dpm_checkbox_value' ];
            $status_d = update_post_meta( $_POST['ewm_dpm_post_id'], 'pt_tasks', $pt_tasks );
            $pt_tasks = maybe_unserialize(get_post_meta(  $_POST['ewm_dpm_post_id'], 'pt_tasks' , true ));
        }
        else{
            // Create feature list.
            $pt_tasks  = [];
            $pt_tasks[ $_POST['ewm_dpm_task_id'] ] = 'ewm_selected';
            add_post_meta( $_POST['ewm_dpm_post_id'], 'pt_tasks', $pt_tasks, true );
        }

        echo json_encode([
            'post_details' => $_POST
        ]);

        wp_die();

    }

    public static function ajax_pt_connect_feature_wo(){
        // Update the post meta 
        $pt_tasks = maybe_unserialize(get_post_meta( $_POST['ewm_dpm_post_id'], 'pt_tasks', true ));

        // var_dump($pt_tasks);

        if(is_array($pt_tasks)){
            // Add the feature.
            $pt_tasks[ $_POST['ewm_dpm_task_id'] ] = $_POST[ 'ewm_dpm_checkbox_value' ];
            $status_d = update_post_meta( $_POST['ewm_dpm_post_id'], 'pt_tasks', $pt_tasks );
            $pt_tasks = maybe_unserialize( get_post_meta(  $_POST['ewm_dpm_post_id'], 'pt_tasks' , true ) );
        }
        else{
            // Create feature list.
            $pt_tasks  = [];
            $pt_tasks[ $_POST['ewm_dpm_task_id'] ] = 'ewm_selected';
            add_post_meta( $_POST['ewm_dpm_post_id'], 'pt_tasks', $pt_tasks, true );
        }
        // var_dump($pt_tasks);

        echo json_encode([
            'post_details' => $_POST
        ]);

        wp_die();

    }

    public static function get_existing_workorder( $args = [] ){

        $post_id = 0;

        $post_workorder_list = get_posts( [
            'post_parent'   => $args['order_id'] ,
            "post_type"     => "shop_workorder",
            "post_status"   => "active",
            'meta_query'    => [
                [
                    'key'       => 'swo_Product_Name',
                    'value'     => $args['product_id'],
                    'compare'   => '='
                ]
            ]
        ] );

        //var_dump( $post_workorder_list );
        //'swo_Order_Name'    => $args['swo_Order_Name'],
        //'swo_Product_Name'  => $args['swo_Product_Name'],

        if( count( $post_workorder_list ) > 0 ){
            $post_id = $post_workorder_list[0]->ID;
        }

        return $post_id;

    }

    public static function ajax_assign_to_work_order_delegation(){

        $args = $_POST;

        $_existing_workorder_id = MyUser::get_existing_workorder([
            'product_id' => $_POST['swo_Product_Name'],
            'order_id'   => $_POST['swo_Order_Name'],
        ]);

        if ($_existing_workorder_id == 0) {

            // Create work order
            $_existing_workorder_id = MyUser::new_workorder_post([
                'swo_Order_Name'    => $args['swo_Order_Name'],
                'swo_Client_Code'   => '',
                'swo_Website'       => '',
                'swo_Due_Date'      => '',
                'swo_Start_Date'    => '',
                'swo_GMB_Services'  => '',
                'swo_Client_Active_Paid_Locations' => '',
                'swo_GMB_Optimizations' => '',
                'swo_Required_Team_Members' => '',
                'swo_Required_Tool' => '',
                'swo_Third_Party_Service' => '',
                'swo_Monthly_Reports'=> '',
                'swo_Third_Party_Service' => '',
                'swo_Product_Name'  => $args['swo_Product_Name'],
                'swo_WO_Manager'    => $args['assignee'],
                'swo_WO_Delegation_Date' => [ 
                    'date'      =>date( 'Y-m-d H:i:s'),
                    'assignee'  =>$args['assignee']
                ]
            ] );
            
        }
       
        // 'swo_WO_Delegation_Date'=>''
        $update_status = update_post_meta( 
            $_existing_workorder_id, 
            'assign',
            $_POST['assignee']
        );

        $update_status = update_post_meta( 
            $_existing_workorder_id, 
            'swo_WO_Manager',
            $_POST['assignee']
        );        

        // and reload on clients
        echo json_encode( [
            'existing_workorder_id'=>$_existing_workorder_id,
            'update_status' => $update_status,
            'post' => $_POST
        ] );

        wp_die();

    }

    public static function ajax_pfs_connect_feature(){

        // Update the post meta 
        $pfs_features = maybe_unserialize( get_post_meta(  $_POST['ewm_dpm_post_id'], 'pfs_features' , true ) ) ;
       
        if( is_array(  $pfs_features ) ){
            // Add the feature.
            $pfs_features[ $_POST['ewm_dpm_feature_id'] ] = $_POST['ewm_dpm_checkbox_value'];

            update_post_meta( $_POST['ewm_dpm_post_id'], 'pfs_features', $pfs_features );

        }
        else{
            // Create feature list.
            $pfs_features  = [];

            $pfs_features[ $_POST['ewm_dpm_feature_id'] ] = 'ewm_selected';

            add_post_meta( $_POST['ewm_dpm_post_id'], 'pfs_features', $pfs_features, true );

        }

    }

    public static function products(){
        $args = array(
            'numberposts' => 900,
            'post_type'   => 'product',
        );
        if ( array_key_exists('single_product_id', $_GET ) ) {
            if ($_GET['single_product_id'] == 0) {
                include_once THEMOSIS_PUBLIC_DIR . '/views/admin/products/single_product_new.php';
            }
            else{
                $single_product_id = (int) $_GET['single_product_id'];
                $ewm_dpm_product = get_post( $single_product_id );
                include_once THEMOSIS_PUBLIC_DIR . '/views/admin/products/single_product_edit.php';
            }
        }
        elseif( array_key_exists( 'product_features', $_GET ) ){
            // echo 'hello ';
            include_once THEMOSIS_PUBLIC_DIR . '/views/admin/products/product_features.php';
        }
        elseif( array_key_exists( 'product_tasks', $_GET )){
            include_once THEMOSIS_PUBLIC_DIR . '/views/admin/product_task_templates/workorder_tasks.php';
        }
        elseif( array_key_exists( 'edit_single_product_id', $_GET ) ){ // manage features per product
            // echo 'hello ';
            include_once THEMOSIS_PUBLIC_DIR . '/views/admin/products/edit_single_product_feature.php';
        }
        elseif( array_key_exists( 'edit_task_single_product_id', $_GET ) ){ // manage features per product
            // echo 'hello ';
            include_once THEMOSIS_PUBLIC_DIR . '/views/admin/product_task_templates/edit_single_workorder_tasks.php';
        }
        else{
            $ewm_dpm_product = get_posts( $args );
            include_once THEMOSIS_PUBLIC_DIR . '/views/admin/products/product_list.php';
        }        
    }

    public static function create_new_order(){

		$_POST['_order_stage'];
		$_POST['_payment_method_title'];

		$_POST['_order_currency'];
		$_POST['_cart_discount'];
		$_POST['_cart_discount_tax'];
		$_POST['_order_tax' ];
		$_POST['_order_total' ];
		$_POST['_prices_include_tax'];
		$_POST['is_vat_exempt']; 
		$_POST['_new_order_email_sent'];

        $current_user_id = get_current_user_id();

        global  $wp_error;

        $args = [
            'status'        => $_POST['_order_stage'],
            'customer_id'   => $current_user_id,
        ];

        $order = wc_create_order( $args );

        $args_product =[
            ''
        ];

        // $order->add_product( get_product('543'), 1 ); // wc_get_product(). // review

        $address = [
            'first_name'    => $_POST['_billing_first_name'],
            'last_name'     => $_POST['_billing_last_name'],
            'company'       => $_POST['_billing_company'], 
            'email'         => $_POST['_billing_email'],
            'phone'         => $_POST['_billing_phone'],
            'address_1'     => $_POST['_billing_address_1'],
            'address_2'     => $_POST['_billing_address_2'],
            'city'          => $_POST['_billing_city'],
            'state'         => $_POST['_billing_state'],
            'postcode'      => $_POST['_billing_postcode'],
            'country'       => $_POST['_billing_country']
        ];

        $order->set_address( $address, 'billing' );

        $order->set_address( $address, 'shipping' );

        $order->calculate_total(); //

        // $order->update_status('Completed', 'Imported order', TRUE );

    }

    public static function ajax_save_new_order_all(){

        $order_id = MyUser::create_new_order();

        echo json_encode( [
            'order_id'  => $order_id,
        ] );
        
    }

    public static function orders(){

        $args = array(
            'numberposts'   => 900,
            'post_type'     => 'shop_order',
            "post_status"   => ['wc-pending', 'wc-processing', 'wc-on-hold', 'wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed'],
        );

        $ewm_dpm_orders = get_posts( $args );

        $order_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/order_list.php';

        if( array_key_exists( 'single_order_id', $_GET ) ) {
            //if( strlen( $_GET['single_order_id'] ) > 0 ){
                //if( $_GET['single_order_id'] == 0 ){
                    $order_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order.php';
                /*}
                else{
                    $order_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/order_single_details.php';
                }*/
            //}
        }

        if( array_key_exists( 'single_order_ordervalues', $_GET ) ) {
            if( strlen( $_GET['single_order_ordervalues'] ) > 0 ){
                $order_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/order_single_ordervalues.php';
            }
        }

        include_once $order_list_url;
        
    }

    public static function create_order_cache_post(){

        $current_user_id = get_current_user_id();

        $_POST['_order_stage'];
        $_POST['_payment_method_title'];
        $_POST['_order_currency'];
        $_POST['_cart_discount'];
        $_POST['_cart_discount_tax'];
        $_POST['_order_tax' ];
        $_POST['_order_total' ];
        $_POST['_prices_include_tax'];
        $_POST['is_vat_exempt']; 
        $_POST['_new_order_email_sent'];

        $current_user_id = get_current_user_id();

        global  $wp_error;

        // if new -> set pending : if old -> 
        
        $args = [
            'status'        => 'wc-pending',
            'customer_id'   => $current_user_id,
        ];

        $order = wc_create_order( $args );

        $args_product = [''];

        $order->add_product( get_product('543') , 1 ); // wc_get_product(). // review

        $address = [
            'first_name'    => '',
            'last_name'     => '',
            'company'       => '', 
            'email'         => '',
            'phone'         => '',
            'address_1'     => '',
            'address_2'     => '',
            'city'          => '',
            'state'         => '',
            'postcode'      => '',
            'country'       => ''
        ];

        $order->calculate_total(); //

/*
        $post_data = [
            "post_author"           => $current_user_id,
            "post_date"             => date( 'Y-m-d H:i:s' ),
            "post_date_gmt"         => date( 'Y-m-d H:i:s' ),
            "post_content"          => $ewmdpm_new_cache_title,
            "post_title"            => $ewmdpm_new_cache_title,
            "post_excerpt"          => '',
            "post_status"           => "active",
            "comment_status"        => "closed",
            "ping_status"           => "closed",
            "post_password"         => "",
            "post_name"             => $ewmdpm_new_cache_title,
            "to_ping"               => "",
            "pinged"                => "",
            "post_modified"         => date( 'Y-m-d H:i:s' ),
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
            "post_content_filtered" => "",
            "post_parent"           => '',
            "guid"                  => "",
            "menu_order"            => 0,
            "post_type"             => "ewm_ocp",
            "post_mime_type"        => "",
            "comment_count"         => "0",
            "filter"                => "raw",
        ];

        global  $wp_error ;

        $post_id = wp_insert_post( $post_data, $wp_error );
*/
        
        return $post_id;

    }

    public static function ajax_client_details_billing(){

		$client_billing_details = [
            [
                'title' => 'Billing First Name',
                'key' => '_billing_first_name',
            ],
            [
                'title' => 'Billing Last Name',
                'key' =>'_billing_last_name',
            ],
            [
                'title' => 'Billing Company',
                'key'=>'_billing_company',
            ],
            [
                'title'=>'Billing Address 1',
                'key'=>'_billing_address_1'
            ],
            [
                'title'=>'Billing Address 2',
                'key'=>'_billing_address_2',
            ],
            [
                'title'=>'Billing City',
                'key'=>'_billing_city'
            ],
            [
                'title'=>'Billing State',
                'key'=>'_billing_state'
            ],
            [
                'title'=>'Billing Postal Code',
                'key'=>'_billing_postcode'
            ],
            [
                'title'=>'Billing Country',
                'key'=>'_billing_country'
            ],
            [
                'title'=>'Billing Email',
                'key'=>'_billing_email'
            ],
            [
                'title'=>'Billing Phone',
                'key'=>'_billing_phone'
            ],
            [
                'title'=>'Cart Discount',
                'key'=>'_cart_discount'
            ], 
            [
                'title'=>'Cart Discount Tax',
                'key'=>'_cart_discount_tax'
            ],
            [
                'title'=>'Order Tax',
                'key'=>'_order_tax'
            ],
            [
                'title'=>'Order Total',
                'key'=>'_order_total'
            ],
            [
                'title'=>'Prices Include tax',
                'key'=>'_prices_include_tax'
            ],
            [
                'title'=>'Vat Exempt',
                'key'=>'is_vat_exempt'
            ]
        ];

        $post_id = $_POST['post_id'];

        foreach( $client_billing_details as $value_v ){

            update_post_meta( $post_id, $value_v['key'] , $_POST[ $value_v['key'] ] , true );
        
        }

    }

    public static function ajax_update_order_cache_post(){

        var_dump( $_POST['product_list'] );
        
        var_dump( json_decode( stripslashes( $_POST['product_list'] ), true ) );

        wp_die();

    }

    public static function ajax_client_details_payment(){


		$client_payment_details = [
            [
                'title' => '',
                'key' => '_order_amount',
            ],
           
            [
                'title' => '',
                'key' => '_order_total' ,
            ],
            [
                'title' => '',
                'key' => '_order_stage',
            ],
            [
                'title' => '',
                'key' => '_payment_method_title',
            ],
            [
                'title' => '',
                'key' => '_order_currency',
            ],
            [
                'title' => '',
                'key' => '_cart_discount',
            ],
            [
                'title' => '',
                'key' => '_cart_discount_tax',
            ],
            [
                'title' => '',
                'key' => '_order_tax',
            ],
            [
                'title' => '',
                'key' => '_order_total',
            ],
            [
                'title' => '',
                'key' => '_prices_include_tax',
            ],
            [
                'title' => '',
                'key' => 'is_vat_exempt',
            ],
            [
                'title' => '',
                'key' => 'ewm_dpm_payment_details' ,
            ],           
        ];

        $post_id = $_POST['post_id'];

        foreach( $client_payment_details as $value_v ){

            update_post_meta( $post_id, $value_v['key'] , $_POST[ $value_v['key'] ] , true );
        
        }

        echo json_encode( $_POST );

        wp_die();
        
    }

    public static function ajax_create_order_cache_post(){

        var_dump( json_decode( stripslashes( $_POST['product_list'] ), true ) );

        // $post_id = MyUser::create_order_cache_post();

        // create post wi
        echo json_encode([
            'post_id'   => $post_id ,
            'post'      =>$_POST 
        ]);

        wp_die();

    }

    public static function add_comment_on_ticket(){

        $c_User_id      = get_current_user_id();

        $ticket_id      = $_POST[ 'ewmdsm_ticket_id' ];

        $ticket_message = $_POST[ 'ewmdsm_ticket_message' ];

        $value_comment_parent = 0;

        $value_comment_author_email = '';

        $comment_data = [
            "comment_post_ID"     => $ticket_id ,
            "comment_author"      => $c_User_id,
            "comment_author_email"=> $value_comment_author_email,
            "comment_content"     => $ticket_message,
            "comment_parent"      => $value_comment_parent,
            "user_id"             => $c_User_id,
        ] ;

        $comment_id = wp_insert_comment( $comment_data );

        $user_data = get_userdata( $c_User_id );

        $s_value = $user_data->data->display_name .' ('.$user_data->data->user_login.')' ;

        echo json_encode([
            'comment_details' => get_comment( $comment_id ),
            'user'  =>  $s_value
        ]);

        wp_die();
        
    }

    public static function admin_menu()
    {

        add_menu_page(
            __( 'Digital Orders' , 'exclusive-web-marketing-dpm' ),
            __( 'Digital Orders' , 'exclusive-web-marketing-dpm' ),
            'manage_options',
            'ewm-dpm',
            'EwmDpm\Hooks\MyUser::my_new_dpm',
            'dashicons-screenoptions',
            3
        );
        add_submenu_page(
            'ewm-dpm',
            'Clients',
            'Clients',
            'manage_options',
            'ewm-dpm-clientmanager',
            'EwmDpm\Hooks\MyUser::client_manager',
            1
        );
        add_submenu_page(
            'ewm-dpm',
            'Orders',
            'Orders',
            'manage_options',
            'ewm-dpm-orders',
            'EwmDpm\Hooks\MyUser::orders',
            2
        );
        add_submenu_page(
            'ewm-dpm-orders',
            'Orders Settings',
            'Orders Settings',
            'manage_options',
            'ewm-dpm-single-order-settings',
            'EwmDpm\Hooks\MyUser::single_order_settings',
            2
        );
        add_submenu_page(
            'ewm-dpm',
            'Job Board',
            'Job Board',
            'manage_options',
            'ewm-dpm-jobs',
            'EwmDpm\Hooks\MyUser::jobs_manager',
            3
        );
        add_submenu_page(
            'ewm-dpm',
            'Work Orders',
            'Work Orders',
            'manage_options',
            'ewm-dpm-workorders',
            'EwmDpm\Hooks\MyUser::work_orders',
            4
        );
        add_submenu_page(
            'ewm-dpm',
            'Delegation',
            'Delegation',
            'manage_options',
            'ewm-dpm-delegation',
            'EwmDpm\Hooks\MyUser::delegation',
            5
        );
        add_submenu_page(
            'ewm-dpm',
            'Products',
            'Products',
            'manage_options',
            'ewm-dpm-products',
            'EwmDpm\Hooks\MyUser::products',
            6
        );
        add_submenu_page(
            'ewm-dpm',
            'Users',
            'Users',
            'manage_options',
            'ewm-dpm-usermanager',
            'EwmDpm\Hooks\MyUser::players_manager',
            7
        );
       
        add_submenu_page(
            'ewm-dpm',
            'Tickets',
            'Tickets',
            'manage_options',
            'ewm-dpm-tickets',
            'EwmDpm\Hooks\MyUser::tickets',
            8
        );
        add_submenu_page(
            'ewm-dpm',
            'Settings',
            'Settings',
            'manage_options',
            'ewm-dpm-setting',
            'EwmDpm\Hooks\MyUser::settings_manager',
            9
        );
    }

    public static function client_manager(){
        $client_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/clients/client_list.php';
        require  $client_list_url;
    }

    public static function delegation(){}

    public static function work_orders(){

        $workorder_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/work_orders/workorder_list.php';
        
        if( array_key_exists( 'single_workorder_edit', $_GET ) ) {

            if( $_GET['single_workorder_edit'] > 0 ){
                $workorder_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/work_orders/workorder_single_details.php';
            }
            else{
                $workorder_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/work_orders/workorder_new_workorder.php';
            }

        }

        include_once $workorder_list_url;

    }


    public static function single_order_settings(){

        $order_settings = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/settings/order_settings.php';
        
        include $order_settings;

    }

    public static function ajax__new_workorder_post() {

        $post_id = MyUser::new_workorder_post( $_POST ) ;

        echo json_encode( [
            'post_id' => $post_id,
            'post' => $_POST,
        ] );
        wp_die();

    }

    public static function ajax_update_single_workspace_meta(){

        $args = $_POST;
        $_existing_workorder_id = MyUser::get_existing_workorder([
            'product_id' => $args['swo_Product_Name'],
            'order_id'   => $args['swo_Order_Name'],
        ]);

        $new_status = '';
        $update_status = '';

        $_workorder_old = get_post_meta( $_existing_workorder_id, $_POST['meta_key'] );
        // var_dump( $_workorder_old );
        if( !is_array( $_workorder_old ) ){
            $new_status = add_post_meta(
                $_existing_workorder_id,
                $_POST['meta_key'],
                $_POST['meta_value']
            );
        }
        else{
            $update_status = update_post_meta(
                $_existing_workorder_id,
                $_POST['meta_key'],
                $_POST['meta_value']
            );
        }

        echo json_encode( [
            'post' => $_POST,
            'update_status' => $update_status,
            'new_status' => $new_status,
            'existing_workorder_id' => $_existing_workorder_id
        ] );

        wp_die();

    }

    public static function new_workorder_post( $args ){

        $current_user_id = get_current_user_id();

        /****** $_POST ***************************
            'swo_Work_Order_Title'
            'swo_Order_Name' // id
            'swo_Client_Code'
            'swo_Website'
            'swo_Due_Date'
            'swo_Start_Date'
            'swo_GMB_Services'
            'swo_Client_Active_Paid_Locations'
            'swo_GMB_Optimizations'
            'swo_Required_Team_Members'
            'swo_Required_Tool'
            'swo_Third_Party_Service'
            'swo_Monthly_Reports'
            'swo_Third_Party_Service'
        ******************************************/

        $workorder_id = MyUser::get_existing_workorder([
            'product_id' => $_POST['swo_Product_Name'],
            'order_id'   => $args['swo_Order_Name'],
        ]);

        if( $workorder_id > 0 ) {
            return $workorder_id;            
        }

        $ewm_new_workorder_name = str_replace("-", " ", $args['swo_Work_Order_Title'] );

        $swo_Work_Order_Title = '' ;

        $post_data = [
            "post_author"           => $current_user_id,
            "post_date"             => date( 'Y-m-d H:i:s'),
            "post_date_gmt"         => date( 'Y-m-d H:i:s'),
            "post_content"          => $args['swo_Work_Order_Title'],
            "post_title"            => $args['swo_Work_Order_Title'],
            "post_excerpt"          => '',
            "post_status"           => "new",
            "comment_status"        => "open",
            "ping_status"           => "closed",
            "post_password"         => "",
            "post_name"             => $ewm_new_workorder_name,
            "to_ping"               => "",
            "pinged"                => "",
            "post_modified"         => date( 'Y-m-d H:i:s' ),
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
            "post_content_filtered" => "",
            "post_parent"           => $args['swo_Order_Name'], // id if associated order
            "guid"                  => "",
            "menu_order"            => 0,
            "post_type"             => "shop_workorder",
            "post_mime_type"        => "" ,
            "comment_count"         => "0" ,
            "filter"                => "raw" ,
        ];

        global  $wp_error ;
        $post_id = wp_insert_post( $post_data, $wp_error );

        $ewm_swo_meta_list = [
            'swo_Order_Name'    => $args['swo_Order_Name'],
            'swo_Client_Code'   => $args['swo_Client_Code'],
            'swo_Website'       => $args['swo_Website'],
            'swo_Due_Date'      => $args['swo_Due_Date'],
            'swo_Start_Date'    => $args['swo_Start_Date'],
            'swo_Delegation_Date' => $args['swo_Delegation_Date'],
            'swo_GMB_Services'  => $args['swo_GMB_Services'],
            'swo_Client_Active_Paid_Locations' => $args['swo_Client_Active_Paid_Locations'],
            'swo_GMB_Optimizations' => $args['swo_GMB_Optimizations'],
            'swo_Required_Team_Members' => explode( ',', $args['swo_Required_Team_Members'] ),
            'swo_Required_Tool' => $args['swo_Required_Tool'],
            'swo_Monthly_Reports'=> $args['swo_Monthly_Reports'],
            'swo_Third_Party_Service' => $args['swo_Third_Party_Service'],
            'swo_Product_Name'  => $args['swo_Product_Name'],
            'assignee'  => $args['assignee'],
		    'swo_Work_Order_Title'  => $args['swo_Work_Order_Title'],
            'swo_WO_Manager' => ''
        ];

        foreach( $ewm_swo_meta_list as $dpm_key => $dpm_value){
            $if_unique = true;
            // if( $dpm_key == 'swo_WO_Delegation_Date'){
                // $if_unique = false;
            // }
            add_post_meta( $post_id, $dpm_key , $dpm_value, $if_unique );
        }

        return $post_id;

    }

    public static function update_global_settings(){
        // 
        update_option('dpm_freelancer_d', $_POST['dpm_freelancer_d'] );

        update_option('dpm_client_d', $_POST['dpm_client_d'] );

    }

    public static function ajax_ewm_dpm_settings(){

        MyUser::update_global_settings();

        echo json_encode([
            $_POST
        ]);

    }

    public static function new_task_post(){

        $current_user_id = get_current_user_id();

        $ewm_new_task_name = str_replace("-", " ", date( 'Y-m-d H:i:s') );

        $post_data = [
            "post_author"           => $current_user_id,
            "post_date"             => date( 'Y-m-d H:i:s'),
            "post_date_gmt"         => date( 'Y-m-d H:i:s'),
            "post_content"          => date( 'Y-m-d H:i:s'),
            "post_title"            => date( 'Y-m-d H:i:s'),
            "post_excerpt"          => '',
            "post_status"           => "active",
            "comment_status"        => "open",
            "ping_status"           => "closed",
            "post_password"         => "",
            "post_name"             => $ewm_new_task_name,
            "to_ping"               => "",
            "pinged"                => "",
            "post_modified"         => date( 'Y-m-d H:i:s' ),
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
            "post_content_filtered" => "",
            "post_parent"           => '', // id if associated order
            "guid"                  => "",
            "menu_order"            => 0,
            "post_type"             => "ewm_tasks",
            "post_mime_type"        => "" ,
            "comment_count"         => "0" ,
            "filter"                => "raw" ,
        ] ;

        global  $wp_error ;

        $post_id = wp_insert_post( $post_data, $wp_error );

        $ewm_pt_meta_list = [
		    'dpm_task_title' => $_POST['dpm_task_title'],
	        'dpm_task_description'=> $_POST['dpm_task_description'],
		    'dpm_task_days_to_deliver'=> $_POST['dpm_task_days_to_deliver']
        ];

        foreach( $ewm_pt_meta_list as $dpm_key => $dpm_value){
            add_post_meta( $post_id, $dpm_key , $dpm_value, true );
        }

        return $post_id;

    }

    public static function ajax_new_task(){

        // Create new post type shop_workorder
        $post_id = MyUser::new_task_post();

        echo json_encode( [
            'post_id'=> $post_id,
            'post_details'=> $_POST
        ] );

        wp_die();

    }

    public static function edit_task_post(){

        global  $wp_error ;

        $post_id = $_POST['ewm_dpm_pt_post_id'];

        $ewm_pt_meta_list = [
		    'dpm_task_title'        => $_POST['dpm_task_title'],
	        'dpm_task_description'  => $_POST['dpm_task_description'],
		    'dpm_task_days_to_deliver'=> $_POST['dpm_task_days_to_deliver']
        ];

        foreach( $ewm_pt_meta_list as $dpm_key => $dpm_value){
            update_post_meta( $post_id, $dpm_key , $dpm_value );
        }

        return $post_id;

    }

    public static function ajax_edit_task(){

        // Create new post type shop_workorder
        $post_id = MyUser::edit_task_post();

        echo json_encode([
            'post_id'=> $post_id,
            'post_details'=> $_POST
        ]);

        wp_die();

    }

    public static function ajax_swo_new_workorder(){

        // Create new post type shop_workorder
        $post_id = MyUser::new_workorder_post( $_POST );

        echo json_encode( [
            'post_id'=> $post_id,
            'post_details'=> $_POST
        ] );

        wp_die();

    }

    public static function players_manager(){

        include_once THEMOSIS_PUBLIC_DIR . '/views/admin/users_manager/userlist_list.php';

    }

    public static function settings_manager(){

        include_once THEMOSIS_PUBLIC_DIR . '/views/admin/settings_manager/main_settings.php';

    }

    public static function jobs_manager(){

        include_once THEMOSIS_PUBLIC_DIR . '/views/admin/jobs_manager/jobs_list.php';

    }

    public static function create_new_product_post(){

        global  $wp_error;

        $current_user_id = get_current_user_id();

        $ewm_dpm_new_product_title = str_replace("-", " ", $_POST['ewm_dpm_name'] );
        /*
            $post_data = [
                "post_author"           => $current_user_id,
                "post_date"             => date( 'Y-m-d H:i:s' ),
                "post_date_gmt"         => date( 'Y-m-d H:i:s' ),
                "post_content"          => $_POST['ewm_dpm_long_description'],
                "post_title"            => $_POST['ewm_dpm_name'],
                "post_excerpt"          => $_POST['ewm_dpm_short_description'],
                "post_status"           => "publish",
                "comment_status"        => "open",
                "ping_status"           => "closed",
                "post_password"         => "",
                "post_name"             => $ewm_dpm_new_product_title ,
                "to_ping"               => "",
                "pinged"                => "",
                "post_modified"         => date( 'Y-m-d H:i:s' ),
                "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
                "post_content_filtered" => "",
                "post_parent"           => '',
                "guid"                  => "",
                "menu_order"            => 0,
                "post_type"             => "product",
                "post_mime_type"        => "",
                "comment_count"         => "0",
                "filter"                => "raw",
            ];
        */
        // that's CRUD object
        $product = new \WC_Product_Simple();

        $product->set_name( $_POST['ewm_dpm_name'] ); // product title

        $product->set_slug( $ewm_dpm_new_product_title );

        $product->set_regular_price(  $_POST['ewm_dpm_retails_price'] ); // in current shop currency

        $product->set_short_description( $_POST['ewm_dpm_short_description'] );
        // you can also add a full product description
        $product->set_description( $_POST['ewm_dpm_long_description'] );

        $product->set_image_id( 90 );

        // let's suppose that our 'Accessories' category has ID = 19 -  create category
        $product->set_category_ids( array( 19 ) );

        // Virtual product : YES
        $product->set_virtual( true );

        // Downloadable product : YES
        $product->set_downloadable( true );
        
        // you can also use $product->set_tag_ids() for tags, brands etc
        $post_id = $product->save();
        
        // =========================================================================================

        // $post_id = wp_insert_post( $post_data, $wp_error );

        $main_metadata = [

            'ewm_dpm_payment_type'  => $_POST['ewm_dpm_payment_type'],        
            'ewm_dpm_retails_price' => $_POST['ewm_dpm_retails_price'],
            'ewm_dpm_form_id'       => $_POST['ewm_dpm_form_id'],
            'ewm_dpm_p_type_data'   => $_POST['ewm_dpm_p_type_data'],

        ];

        foreach ( $main_metadata as $m_key => $m_value ) {
            update_post_meta( $post_id, $m_key, $m_value, true );
        }
        
        return $post_id;

    }

    public static function ajax_create_new_product(){

        // Create new product
        MyUser::create_new_product_post();

        // Respond with positive
        echo json_encode( $_POST );

        wp_die();

    }

    public static function edit_new_product_post(){

        $current_user_id = get_current_user_id();
        $ewm_dpm_new_product_title = str_replace("-", " ", $_POST['ewm_dpm_name'] );
        $post_data = [
            "ID"                    => $_POST['ewm_dpm_product_id'] ,
            "post_author"           => $current_user_id ,
            "post_date"             => date( 'Y-m-d H:i:s' ) ,
            "post_date_gmt"         => date( 'Y-m-d H:i:s' ) ,
            "post_content"          => $_POST['ewm_dpm_long_description'] ,
            "post_title"            => $_POST['ewm_dpm_name'] ,
            "post_excerpt"          => $_POST['ewm_dpm_short_description'] ,
            "post_status"           => "publish" ,
            "comment_status"        => "open" ,
            "ping_status"           => "closed" ,
            "post_password"         => "" ,
            "post_name"             => $ewm_dpm_new_product_title ,
            "to_ping"               => "" ,
            "pinged"                => "" ,
            "post_modified"         => date( 'Y-m-d H:i:s' ) ,
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ) ,
            "post_content_filtered" => "" ,
            "post_parent"           => '' ,
            "guid"                  => "" ,
            "menu_order"            => 0 ,
            "post_type"             => "product" ,
            "post_mime_type"        => "" ,
            "comment_count"         => "0" ,
            "filter"                => "raw" ,
        ];

        global  $wp_error ;
        $post_id = wp_update_post( $post_data, $wp_error );
        $ewm_dpm_product_id = get_post( $_POST['ewm_dpm_product_id'] , true );
        $ewm_dpm_meta_list_arr = [
            "_regular_price"    => $_POST['ewm_dpm_retails_price'] ,
            "total_sales"       => "0" ,
            "_sold_individually"=> "no" ,
            "_virtual"          => "yes" ,
            "_downloadable"     => "yes" ,
            "_download_limit"   => "-1" ,
            "_download_expiry"  => "-1" ,
            "_price"            => $_POST['ewm_dpm_retails_price'] ,
            "ewm_dpm_payment_type" => $_POST['ewm_dpm_payment_type'] ,
            "ewm_dpm_retails_price" => $_POST['ewm_dpm_retails_price'] ,
            "ewm_dpm_form_id"   => $_POST['ewm_dpm_form_id'],
            'ewm_dpm_p_type_data'   => $_POST['ewm_dpm_p_type_data'],
        ];

        foreach( $ewm_dpm_meta_list_arr as $dpm_key => $dpm_value){

            $ewm_dpm_single_meta = get_post_meta( $ewm_dpm_product_id, $dpm_key , true );

            update_post_meta( $post_id, $dpm_key , $dpm_value ,   $ewm_dpm_single_meta , true );

        }

        return $post_id;

    }

    public static function ajax_edit_new_product() {

        // Create new product
        MyUser::edit_new_product_post();
        // Respond with positive
        echo json_encode( $_POST );

        wp_die();

    }

    public static function ajax_add_product_to_cart(){
        
		global $woocommerce;
		$product_id = $_POST['ewm_dpm_product_id'];
		$woocommerce->cart->add_to_cart($product_id) ;
        $wp_cart_url =  wc_get_cart_url();
        // Add a product to woocommerce
        echo json_encode( [
            'data'              => $_POST,
            'product_details'   => $woocommerce_id,
            'wp_cart_url'       => $wp_cart_url
        ]);

        wp_die();

    }

    public static function make_call_request_to_fill_form(){

        // Make a custom post type with the call details
        $current_user_id = get_current_user_id();
        $ewm_dpm_new_phone_call = str_replace("-", " ", $_POST['ewm_dpm_name'] );

        $post_data = [
            "post_author"           => $current_user_id ,
            "post_date"             => date( 'Y-m-d H:i:s' ),
            "post_date_gmt"         => date( 'Y-m-d H:i:s' ),
            "post_content"          => $_POST['ewm_dpm_long_description'],
            "post_title"            => $_POST['ewm_dpm_name'],
            "post_excerpt"          => $_POST['ewm_dpm_short_description'],
            "post_status"           => "uncalled",
            "comment_status"        => "open",
            "ping_status"           => "closed",
            "post_password"         => "",
            "post_name"             => $ewm_dpm_new_phone_call,
            "to_ping"               => "" ,
            "pinged"                => "" ,
            "post_modified"         => date( 'Y-m-d H:i:s' ),
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
            "post_content_filtered" => "",
            "post_parent"           => '',
            "guid"                  => "",
            "menu_order"            => 0,
            "post_type"             => "make_phone_call",
            "post_mime_type"        => "",
            "comment_count"         => "0",
            "filter"                => "raw",
        ];

        global  $wp_error ;
        $post_id = wp_insert_post( $post_data, $wp_error );
        
        return $post_id;

    }

    public static function ajax_make_call_request(){

        $post_id = MyUser::make_call_request_to_fill_form();
        echo json_encode([
            'post_id'   =>$post_id,
            '_post'     =>$_POST
        ]);

        wp_die();

    }

    public static function get_client_dashboard(){

        $dpm_client_d = get_option('dpm_client_d' ) ;
        $dpm_client_post = get_post( $dpm_client_d ); 

        return $dpm_client_post->guid;
    }

    public static function get_someone_to_call_me_friction(){

        echo '<style>
        .ewm_dpm_popup_inner_o{
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background-color: #33333330;
            display: none;
            padding: 10% 15%;
            z-index: 10000;
        }
        .ewm_dpm_popup_inner_c{
            width: 100%;
            height: 58%;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            overflow: auto;
            padding:4%;
        }
        .ewm_dpm_someone_call_message{
            width:100%;
            padding:30px;
        }
        .ewm_dpm_someone_call_option{
            width: 100%;
            padding-left:30px;
            padding-top:10px;
        }
        .ewm_dpm_yes_form_fill{
            background: green;
            color:#333;
            float:left;
            margin-right:5px;
            padding:10px 25px;
            border-radius:10px;
            color:#fff;
            cursor: pointer;
        }
        .ewm_dpm_no_call_me{
            background:#ccc;
            float:left;
            padding:10px 25px;
            border-radius:10px;
            cursor: pointer;
        }

        </style>
        <div class="ewm_dpm_popup_inner_o">
            <div class="ewm_dpm_popup_inner_c">
                <div class="ewm_dpm_someone_call_message">
                    In the past, we have noticed a significant delay in workorders when our customer doesn\'t fill the form right away
                    <br><br>
                    Do you still want to proceed with the call request?
                </div>
                <div class="ewm_dpm_someone_call_option">
                    <span class="ewm_dpm_yes_form_fill">No, I Will Fill the Form Right Now</span>
                    <span class="ewm_dpm_no_call_me">Yes, Proceed with the Call Request</span>
                </div>
            </div>
        </div>';

    
    }

    public static function get_someone_to_call_me(){
        echo '
        <style>
        #ewm_dpm_some_call_me{
            width:100%;
            padding: 20px;
            color:black;
        }
        .ewm_success_dpm{
            background: aliceblue;
        }
        .ewm_having_trouble_filling{
            color:gray;
        }
        .ewm_call_me_now{
            background:#cccccc40;
            padding: 5px 20px;
            border-radius:10px;
            cursor: pointer;
        }
        </style>
        <div id="ewm_dpm_some_call_me">
            <center>
                <h4 class="ewm_success_dpm">Congratulations, The Order Has Been Successfully Created! You Have One Step Remaining</h4>
                To Get The Work Order Started, <br>
                We need information that will guide us on what you are looking to achieve. <br>
                Please direct us by filling the following form<br>
                <span class="ewm_having_trouble_filling">( Having trouble? To get someone to call you and assist in filling the following form please <span class="ewm_call_me_now">click here</span> )</span>
            </center>
        </div>
        ';

        MyUser::get_someone_to_call_me_friction();

    }

    public static function select_gravity_form_scheduler( $args = [] ){
        if( $args['form_id']>0 ){
            MyUser::get_someone_to_call_me();
            echo do_shortcode( '[gravityform id="'. $args['form_id'] .'" title="false" description="false" ajax="false"]' );
        }
        else{
            $get_client_dashboard = MyUser::get_client_dashboard();
            echo 'Project details added successfully, let\'s proceed to the dashboard: <a href="'.$get_client_dashboard.'">Click Here</a>'; // add link to client dashboard with auto redirect
        }
    }

    public static function create_new_form_post( $args = [] ){
        // Create new form post and adds individual forms to schedule (ewm_dpm_form_id_schedule)
        $current_user_id = get_current_user_id();

        $meta_data = [
            'ewm_dpm_product_id'=> $args['product_id'],
            'ewm_dpm_order_id'  => $args['order_id'],
            'ewm_dpm_data_stage'=> 'no_data'
        ];

        $meta_data[ 'ewm_dpm_form_id_schedule' ] = get_post_meta( $args['product_id'] , 'ewm_dpm_form_id' , true );
        $form_data_name = 'form-data-'. time() ;
        // Add order id to custom form
        // Add product id to custom form
        $post_data = [
            "post_author"           => $current_user_id,
            "post_date"             => date( 'Y-m-d H:i:s' ),
            "post_date_gmt"         => date( 'Y-m-d H:i:s' ),
            "post_content"          => date( 'Y-m-d H:i:s' ) . ' Form Data',
            "post_title"            => date( 'Y-m-d H:i:s' ) . ' Form Data',
            "post_excerpt"          => date( 'Y-m-d H:i:s' ) . ' Form Data' ,
            "post_status"           => "active",
            "comment_status"        => "closed",
            "ping_status"           => "closed",
            "post_password"         => "",
            "post_name"             => $form_data_name,
            "to_ping"               => "",
            "pinged"                => "",
            "post_modified"         => date( 'Y-m-d H:i:s' ),
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
            "post_content_filtered" => "",
            "post_parent"           => $args['product_id'],
            "guid"                  => "",
            "menu_order"            => 0,
            "post_type"             => "ewmdpm_f_d_v",
            "post_mime_type"        => "",
            "comment_count"         => "0",
            "filter"                => "raw",
            'meta_input' => array(
                'ewm_dpm_order_id' => $args['order_id']
            )            
        ];

        // Check if the form post exists
        $post_parent_list = get_posts([
            'post_parent'   => $args['product_id'],
            "post_type"     => "ewmdpm_f_d_v",
            "post_status"   => "active",
            'meta_query'    => [
                [
                    'key'       => 'ewm_dpm_order_id',
                    'value'     => $args['order_id'],
                    'compare'   => '='
                ]
            ]
        ] ) ;

        if( count( $post_parent_list ) > 0 ){
            $post_data['ID'] = $post_parent_list[0]->ID;
        }

        $post_id = '';

        global  $wp_error ;

        // If it exists update post and only update 'ewm_dpm_form_id_schedule'
        if ( array_key_exists( 'ID' , $post_data ) ) {
            wp_update_post( $post_data, $wp_error );
            $post_id    = $post_data['ID'];
            $meta_val   = $meta_data[ 'ewm_dpm_form_id_schedule' ];
            add_post_meta( $post_id, 'ewm_dpm_form_id_schedule', $meta_val, false );
        }
        else{
            $post_id = wp_insert_post( $post_data, $wp_error );
            foreach ( $meta_data as $meta_key => $meta_val ){
                $uniqeness_detail = 'ewm_dpm_form_id_schedule' == $meta_key ? false : true ;
                add_post_meta( $post_id, $meta_key, $meta_val, $uniqeness_detail );
            }
        }
        
        // Order option
        return  $post_id;

    }

    public static function check_if_schedule( $args =[] ){

        $post_parent_list = get_posts([
            'post_parent'   => $args['order_id'],
            "post_type"     => "ewmdpm_f_d_v",
            "post_status"   => "publish"
        ]);
        //echo 'number of parent posts';
        //var_dump(count( $post_parent_list ));
        echo '<br>';
        return count( $post_parent_list );

    }

    public static function ajax_assign_to_work_order(){

        // Create work order
        MyUser::new_workorder_post( $_POST );
        // and reload on clients
        echo json_encode( $_POST );
        wp_die();

    }

    // Listeners that removes
    public static function process_single_form_submission( $entry, $form ) {

        $source_url = $entry["source_url"] ; // "http://workshop-1.com/checkout/order-received/569/?key=wc_order_W2I0mW9n7pCwT" ;
        $source_url_k = parse_url( $source_url , PHP_URL_QUERY );
        $source_url_a = explode("=" , $source_url_k );

        $order_id = wc_get_order_id_by_order_key( $source_url_a[1] );

        $list_of_values = [];

        // Add values to form data meta area
        foreach ( $form['fields'] as $field ) {
            $list_of_values[ 'title_'.$entry["form_id"]. '_'.$field->id .'_'. $field->label ] = $entry[ $field->id ];
        }

        // remove form id from the input list
        $post_parent_list = get_posts( [
            'post_parent'   => $order_id,
            "post_type"     => "ewmdpm_f_d_v",
            "post_status"   => "publish"
        ] );
        // add values as meta

        foreach($list_of_values as $key_v => $value_v){
            add_post_meta( $post_parent_list[0]->ID , $key_v, $value_v, TRUE );
        }

        $form_id = 0;

        if( count( $post_parent_list ) > 0 ){
            // Find next form - Find a single
            delete_post_meta( $post_parent_list[0]->ID , 'ewm_dpm_form_id_schedule', $entry["form_id"] );
        }

    }

    public static function process_scheduled_forms( $args = [] ) { 

        $post_parent_list = get_posts([
            'post_parent'   => $args['order_id'],
            "post_type"     => "ewmdpm_f_d_v",
            "post_status"   => "publish"
        ]);

        $form_id = 0;

        if( count( $post_parent_list ) > 0 ){
            // Find next form - Find a single
            // var_dump($post_parent_list[0]->ID);
            // $ewm_dpm_form_id = get_post_meta( $post_parent_list[0]->ID , 'ewm_dpm_product_id', true ); // TODO: check this value - done
            $ewm_dpm_form_id = get_post_meta( $post_parent_list[0]->ID , 'ewm_dpm_form_id_schedule' );
            if ( count($ewm_dpm_form_id) > 0 ) {
                $form_id = $ewm_dpm_form_id[0] ;
            }
        }
        else{
            // TODO create post 
        }
        var_dump( $form_id );
       
        MyUser::select_gravity_form_scheduler([ 'form_id' => $form_id ]);

    }

    public static function add_custom_form_to_cart( $order_id = false ) {

        $order = new \WC_Order( $order_id );
        $order_items = $order->get_items();
        // If scheduled? process form : schedule;
        $check_if_schedule = MyUser::check_if_schedule([ 'order_id'=>$order_id ]);

        if( $check_if_schedule == 0 ){
            // search for schedule
            foreach ( $order_items as $product ) {
                // set schedule
                $product_id = $product->get_product_id();
                // create form post
                $form_values_id = MyUser::create_new_form_post([
                    'product_id' => $product_id,
                    'order_id'   => $order_id
                ]);
                echo 'Form post id';
                var_dump($form_values_id);
                echo '<br>';

                MyUser::select_gravity_form_scheduler([ 'form_id' => $form_values_id ]);
            }
           
        }

        MyUser::process_scheduled_forms([
            'order_id' => $order_id
        ]);

        echo '
        <style type="">
            .woocommerce-notice, .woocommerce-order-overview, .woocommerce-order-details, .woocommerce-customer-details, .woocommerce-order > p{
                display:none;
            }
        </style>
        ';

    }

    public static function ajax_send_form_values(){

        $order_id = $_POST['order_id'];
        $product_id = $_POST['product_id'];
        $list_of_values = json_decode( stripslashes( $_POST['form_list'] ), true );

        // Remove form id from the input list
        $post_parent_list = get_posts( [
            'post_parent'   => $product_id ,
            "post_type"     => "ewmdpm_f_d_v",
            "post_status"   => "publish"
        ] );

        if( count( $post_parent_list ) == 0 ){
            MyUser::create_new_form_post([
                'product_id'    => $product_id,
                'order_id'      => $order_id
            ]);
        }

        // Add values as meta
        foreach ($list_of_values as $key_v => $value_v){
            update_post_meta( $post_parent_list[0]->ID, $value_v['name'], $value_v['data'] );
            // update_post_meta( $post_id:integer, $meta_key:string, $meta_value:mixed, $prev_value:mixed )
        }

        echo json_encode([
            'status'    => 'success',
            'product_id'=> $product_id,
            'order_id'  => $order_id,
            'values'    => $list_of_values,
        ]);

        wp_die();
        
    }

    public static function bread_crumb( $args = [] ){

        $args_links = '';
        
        foreach( $args as $value_args ){
            $css_id = '';
            if( array_key_exists( 'css_id', $value_args ) ){
                $css_id = $value_args['css_id'];
            }
            $args_links .= '
            <div class="ewm_dpm_breadcrumb_single '. $css_id .'">
                <a href="'.$value_args['links'] .'" class="ewm_dpm_bread_a"> >> '.$value_args['name'] .' </a>
            </div>';
        }

        $args_html = '<style>
            .ewm_dpm_breadcrumb{
                width:100%;
                overflow: auto;
            }
            .ewm_dpm_breadcrumb_single{
                float: left;
                padding: 3px 15px 3px 6px;
                border: 0px solid #fff;
                border-radius: 5px !important;
                cursor: pointer;
                border-radius: 0px;
                margin-right: 1px;
            }
            .ewm_dpm_bread_a{
                text-decoration:none;
                color:#333;
            }
        </style>
        <div class="ewm_dpm_breadcrumb">'. 
            $args_links 
        .'</div>';

        return $args_html;

    }

    public static function get_dpm_data_post( $args = [] ){

        $post_id = 0;
        $post_parent_list = get_posts([
            'post_parent'   => $args['product_id'] ,
            "post_type"     => "ewmdpm_f_d_v",
            "post_status"   => "active",
            'meta_query'    => [
                [
                    'key'       => 'ewm_dpm_order_id',
                    'value'     => $args['order_id'],
                    'compare'   => '='
                ]
            ]
        ]);

        if( count( $post_parent_list ) == 0 ){
            $post_id = MyUser::create_new_form_post( $args );
        }
        else{
            $post_id = $post_parent_list[0]->ID;
        }

        return $post_id;

    }

    public static function ajax_product_settings_save(){
        $product_settings_save = [
            //'product_id'                    =>$_POST['product_id'],
            //'order_id'                      =>$_POST['order_id'],
            'swo_settings_subscription_date'        => $_POST['swo_settings_subscription_date'],
            'swo_settings_paid_unpaid'              => $_POST['swo_settings_paid_unpaid'],
            'swo_settings_wo_deadline_date'         => $_POST['swo_settings_wo_deadline_date'],
            'swo_settings_subscription_p_unpaid'    => $_POST['swo_settings_subscription_p_unpaid'],
        ];

        $data_post_id = MyUser::get_dpm_data_post( [
            'product_id'=> $_POST['product_id'],
            'order_id'  =>$_POST['order_id']
        ] );

        foreach( $product_settings_save as $args_k => $args_v ){
            $details_status = update_post_meta( $data_post_id , $args_k, $args_v );
        }
    }

    public static function get_product_price_order(){

        return '$2000';
        
    }

    public static function ajax__create_new_task(){

        // Make a custom post type with the call details
        $current_user_id = get_current_user_id();
        $ewm_dpm_task_draft = str_replace("-", " ", 'task draft');
        $post_data = [
            "post_author"           => $current_user_id ,
            "post_date"             => date( 'Y-m-d H:i:s' ),
            "post_date_gmt"         => date( 'Y-m-d H:i:s' ),
            "post_content"          => 'Draft',
            "post_title"            => 'Draft',
            "post_excerpt"          => 'Draft',
            "post_status"           => "active",
            "comment_status"        => "open",
            "ping_status"           => "closed",
            "post_password"         => "",
            "post_name"             => $ewm_dpm_task_draft,
            "to_ping"               => "" ,
            "pinged"                => "" ,
            "post_modified"         => date( 'Y-m-d H:i:s' ),
            "post_modified_gmt"     => date( 'Y-m-d H:i:s' ),
            "post_content_filtered" => "",
            "post_parent"           => "",
            "guid"                  => "",
            "menu_order"            => 0,
            "post_type"             => "ewm_a_task",
            "post_mime_type"        => "",
            "comment_count"         => "0",
            "filter"                => "raw",
        ];

        global  $wp_error;
        $post_id        = wp_insert_post( $post_data, $wp_error );
        $task_order_id  = add_post_meta( $post_id, 'task_order_id', $_POST['task_order_id'] , true );
        $task_product_id = add_post_meta( $post_id, 'task_product_id', $_POST['task_product_id'] , true );

        echo json_encode( [
            'post_id' => $post_id,
            'post' => $_POST
        ] );

        wp_die();

    }

    public static function ajax__update_single_task_meta_value(){

        /*
            'task_status'
            'task_assignee'
            'task_following_' + $('#ewm_dpm_current_user_id').val() 
            'task_due_date'
        */
        $update_post_meta_status = update_post_meta( $_POST['task_id'], $_POST['meta_key'], $_POST['meta_value'] );
        // $update_post_meta_status

        echo json_encode( [
            'update_post_meta_status' => $update_post_meta_status,
            'post'  => $_POST,
        ] );

        wp_die();

    }

    public static function ajax__update_single_task_main_post_value(){

        $_data_revision = [
            'ID' => $_POST['task_id'],
            $_POST['post_key'] => $_POST['post_value'],
        ];
        $_data_revision_status = wp_update_post( $_data_revision );
        echo json_encode( [
            'data_revision_status'  => $_data_revision_status,
            'post'                  => $_POST,
            'post_status'           => 'published'
        ] );

        wp_die();

    }

    public static function ajax__add_task_comment(){

        $comment_data = [
            "comment_post_ID"     => $_POST['comment_post_ID'],
            "comment_author"      => $_POST['comment_author'],
            "comment_author_email"=> $_POST['comment_author_email'],
            "comment_content"     => $_POST['comment_content'],
            "comment_parent"      => $_POST['comment_parent'],
            "user_id"             => $_POST['user_id'],
        ];

        $comment_id = wp_insert_comment( $comment_data );

        echo json_encode( [
            'comment_id'    => $comment_id,
            'command_data'  => get_comment( $comment_id ),
        ] );

        wp_die();

    }

    public static function ajax__update_task_wo(){

        $current_user_id = get_current_user_id();
        $__post_data = get_post( $_POST['post_id'] );
        $__post_data_meta = get_post_meta( $__post_data->ID );
        // var_dump( $_POST['post_id'] );
        $ewm_dpm_t_title_text = $__post_data->post_title;
        $post_id = $__post_data->ID;
        $ewm_dpm_t_title_describe = $__post_data->post_content;

        $comments_list = get_comments([
            'orderby'   => 'comment_date_gmt',
            'order'   	=> 'ASC', //'DESC'.
            'post_id'	=> $_POST['post_id']
        ]);

        $task_status = $__post_data_meta[ 'task_status' ];
        $task_assignee = $__post_data_meta[ 'task_assignee' ];
        $task_following = $__post_data_meta[ 'task_following_' . $current_user_id ][0];
        $task_due_date = $__post_data_meta[ 'task_due_date' ];

        echo json_encode( [
            "ewm_dpm_t_title_text" => $ewm_dpm_t_title_text, // 'title',
            "post_id" => $post_id,
            "ewm_dpm_t_title_describe" => $ewm_dpm_t_title_describe,
            "ewm_dpm_task_date_input" => $task_due_date,
            "task_following" => $task_following,
            "ewm_dpm_comment_list" => $comments_list,
            "task_status" => $task_status,
            "task_assignee" => $task_assignee,
            // "update_hidden_html" => $update_hidden_html
        ] );

        wp_die();

    }

    public static function ajax__remove_task_from_list(){

        wp_delete_post( $_POST['ewm_post_id'] , true );

        echo json_encode([
            'deleted_post_id' => $_POST['ewm_post_id']
        ]);

        wp_die();

    }

    public static function ajax__client_code_data(){

        $client_code_data = [
            'nickname'              => $_POST["ewm_dpm_client_username"],
            'ewm_dpm_client_code'   => $_POST["ewm_dpm_client_code"],
            'first_name'            => $_POST["ewm_dpm_first_name"],
            'last_name'             => $_POST["ewm_dpm_last_name"],
            'ewm_dpm_company_name'  => $_POST["ewm_dpm_company_name"],
            'ewm_dpm_phone'         => $_POST["ewm_dpm_phone"],
            'ewm_dpm_email'         => $_POST["ewm_dpm_email"],
            'ewm_dpm_number_of_locations'=> $_POST["ewm_dpm_number_of_locations"],
            'ewm_dpm_main_location' => $_POST['ewm_dpm_main_location']
        ];

        $user_id = $_POST['ewm_client_id'];
        $unique = true;

        if( $user_id == 0 ){
            $user_dd = [
                'user_pass'     => 'client_pass22',
                'user_login'    => $_POST["ewm_dpm_client_username"],
                'user_nicename' => $_POST["ewm_dpm_client_username"],
                'user_email'    => $_POST["ewm_dpm_email"],
                'display_name'  => $_POST["ewm_dpm_first_name"] .' '.$_POST["ewm_dpm_last_name"],
                'nickname'      => '',
                'first_name'    => $_POST["ewm_dpm_first_name"],
                'last_name'     => $_POST["ewm_dpm_last_name"],
                'user_registered'=> 'Y-m-d H:i:s',
            ];
            // create a new user.
            // $user_id = wp_create_user( $username, $password, $email );
            $user_id = wp_insert_user( $user_dd );
            // $user_id_role = new \WP_User($user_id);
            /// $user_id_role->set_role('ewmdsm_client');

            $role = ['ewmdsm_client'=>true];
			add_user_meta( $user_id, 'wp_workshop_1_capabilities', $role );

            foreach( $client_code_data as $$meta_key => $meta_value ){
                add_user_meta( $user_id, $meta_key, $meta_value, $unique );
            }
        }
        else{
            $new_user_info = [
                'user_login'    => $_POST["ewm_dpm_client_username"],
                'user_nicename' => $_POST["ewm_dpm_client_username"],
                'user_email'    => $_POST["ewm_dpm_email"],
                'display_name'  => $_POST["ewm_dpm_first_name"].' '.$_POST["ewm_dpm_last_name"],
                'nickname'      => $_POST["ewm_dpm_client_username"],
                'first_name'    => $_POST["ewm_dpm_first_name"],
                'last_name'     => $_POST["ewm_dpm_last_name"],
            ];
            wp_update_user( $new_user_info );
            foreach( $client_code_data as $meta_key => $meta_value ){
                update_user_meta( $user_id, $meta_key, $meta_value, $unique );
            }
        }

        echo json_encode([
            'post_list' => $_POST,
            'user_id' =>  $user_id
        ]);

        wp_die();

    }

    public static function ajax__save_individual_client(){

		$client_billing_details = [
			'ewm_dpm_billing_first_name'    => $_POST['_billing_first_name'],
            'ewm_dpm_billing_last_name'     => $_POST['_billing_last_name'],
			'ewm_dpm_billing_company'       => $_POST['_billing_company'],
			'ewm_dpm_billing_address_1'     => $_POST['_billing_address_1'],
			'ewm_dpm_billing_address_2'     => $_POST['_billing_address_2'],
			'ewm_dpm_billing_city'          => $_POST['_billing_city'],
			'ewm_dpm_billing_state'         => $_POST['_billing_state'],
			'ewm_dpm_billing_postcode'      => $_POST['_billing_postcode'],
			'ewm_dpm_billing_country'       => $_POST['_billing_country'],
			'ewm_dpm_billing_email'         => $_POST['_billing_email'],
			'ewm_dpm_billing_phone'         => $_POST['_billing_phone'],
			'ewm_dpm_cart_discount'         => $_POST['_cart_discount'],
			'ewm_dpm_cart_discount_tax'     => $_POST['_cart_discount_tax'],
			'ewm_dpm_order_tax'             => $_POST['_order_tax'],
			'ewm_dpm_order_total'           => $_POST['_order_total'],
			'ewm_dpm_prices_include_tax'    => $_POST['_prices_include_tax'],
			'ewm_dpm_is_vat_exempt'         => $_POST['is_vat_exempt']
        ];

        foreach( $client_billing_details as $tkey => $tvalue ){
            update_user_meta( $_POST['ewm_client_id'], $tkey, $tvalue );
        }

        echo json_encode([$_POST]);
        wp_die();

    }

    public static function ajax__get_all_client_fields(){

        $user_id = $_POST['ewm_client_id'];

        $get_userdata = get_userdata( $user_id  );

        // var_dump( $get_userdata );
        
        $Client_data = [
            'ewm_dpm_client_username'   =>  $get_userdata->data->user_nicename,
            'ewm_dpm_client_code'       =>  get_user_meta( $user_id, 'ewm_dpm_client_code' , true ),
            'ewm_dpm_first_name'        =>  get_user_meta( $user_id, 'first_name' , true ),
            'ewm_dpm_last_name'         =>  get_user_meta( $user_id, 'last_name' , true ),
            'ewm_dpm_company_name'      =>  get_user_meta( $user_id, 'ewm_dpm_company_name' , true ),
            'ewm_dpm_phone'             =>  get_user_meta( $user_id, 'ewm_dpm_phone' , true ),
            'ewm_dpm_email'             =>  $get_userdata->data->user_email,
            'ewm_dpm_number_of_locations'=> get_user_meta( $user_id, 'ewm_dpm_number_of_locations' , true ),
            'ewm_dpm_main_location'     =>  get_user_meta( $user_id, 'ewm_dpm_main_location' , true ),
            'ewm_dpm_billing_first_name'=>  get_user_meta( $user_id, 'ewm_dpm_billing_first_name' , true ),
            'ewm_dpm_billing_last_name' =>  get_user_meta( $user_id, 'ewm_dpm_billing_last_name' , true ),
            'ewm_dpm_billing_company'   =>  get_user_meta( $user_id, 'ewm_dpm_billing_company' , true ),
            'ewm_dpm_billing_address_1' =>  get_user_meta( $user_id, 'ewm_dpm_billing_address_1' , true ),
            'ewm_dpm_billing_address_2' =>  get_user_meta( $user_id, 'ewm_dpm_billing_address_2' , true ),
            'ewm_dpm_billing_city'      =>  get_user_meta( $user_id, 'ewm_dpm_billing_city' , true ),
            'ewm_dpm_billing_state'     =>  get_user_meta( $user_id, 'ewm_dpm_billing_state' , true ),
            'ewm_dpm_billing_postcode'  =>  get_user_meta( $user_id, 'ewm_dpm_billing_postcode' , true ),
            'ewm_dpm_billing_country'   =>  get_user_meta( $user_id, 'ewm_dpm_billing_country' , true ),
            'ewm_dpm_billing_email'     =>  get_user_meta( $user_id, 'ewm_dpm_billing_email' , true ),
            'ewm_dpm_billing_phone'     =>  get_user_meta( $user_id, 'ewm_dpm_billing_phone' , true ),
            'ewm_dpm_cart_discount'     =>  get_user_meta( $user_id, 'ewm_dpm_cart_discount' , true ),
            'ewm_dpm_cart_discount_tax' =>  get_user_meta( $user_id, 'ewm_dpm_cart_discount_tax' , true ),
            'ewm_dpm_order_tax'         =>  get_user_meta( $user_id, 'ewm_dpm_order_tax' , true ),
            'ewm_dpm_order_total'       =>  get_user_meta( $user_id, 'ewm_dpm_order_total' , true ),
            'ewm_dpm_prices_include_tax'=>  get_user_meta( $user_id, 'ewm_dpm_prices_include_tax' , true ),
            'ewm_dpm_is_vat_exempt'     =>  get_user_meta( $user_id, 'ewm_dpm_is_vat_exempt' , true ),
        ];

        echo json_encode( $Client_data );
        wp_die();

    }

    public static function ajax__get_client_orders(){
        $_order_posts = get_posts([
            'numberposts'	=> -1,
            "post_type"     => "shop_order",
            "post_status"   => ["wc-processing"],
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key'     => '_customer_user',
                    'value'   => $_POST['ewm_client_id'],
                    'compare' => '=',
                ],
            ]
        ]);

        $_order_list = [];
    
        foreach( $_order_posts as $_order_post_k => $_order_post_v ){

                $href_url = admin_url( 'admin.php?page=ewm-dpm-orders&single_order_id='.$_order_post_v->ID );
                $ewm_dpm_stages = [
                    'wc-pending' 	=> 'Pending payment' ,
                    'wc-processing' => 'Active Orders' ,
                    'wc-on-hold' 	=> 'On hold' ,
                    'wc-completed' 	=> 'Completed' ,
                    'wc-cancelled'  => 'Cancelled' ,
                    'wc-refunded' 	=> 'Refunded' ,
                    'wc-failed' 	=> 'Failed' ,
                ];

                $s_arr = [
                    'ID' => $_order_post_v->ID,
                    'post_status'  => $ewm_dpm_stages[$_order_post_v->post_status],
                    'href_url'  => $href_url
                ];
                array_push( $_order_list, $s_arr );

        }

        echo json_encode( $_order_list );
        wp_die();
    
    }

    public static function create_new_order_draft(){
    
        global  $wp_error;
        //$status = $_POST[_order_stage];
        // $customer_id = '' ;
        $args = [
            'status'        => 'wc-pending',
            'customer_id'   => 0,
        ];
        $order = wc_create_order( $args );
        $args_product =[
            ''
        ];

        // $order->add_product( get_product('543'), 1 ); // wc_get_product(). // review

        $address = [
            'first_name'    => $_POST['_billing_first_name'],
            'last_name'     => $_POST['_billing_last_name'],
            'company'       => $_POST['_billing_company'], 
            'email'         => $_POST['_billing_email'],
            'phone'         => $_POST['_billing_phone'],
            'address_1'     => $_POST['_billing_address_1'],
            'address_2'     => $_POST['_billing_address_2'],
            'city'          => $_POST['_billing_city'],
            'state'         => $_POST['_billing_state'],
            'postcode'      => $_POST['_billing_postcode'],
            'country'       => $_POST['_billing_country']
        ];

        $order->set_address( $address, 'billing' );
        $order->set_address( $address, 'shipping' );
        // $order->calculate_total(); //

        // $order->update_status('Completed', 'Imported order', TRUE );
        // TODO replace 611 and return $order->ID
        return $order->get_id();

    }

    public static function change_client_for_billing() {

        $user_id = $_POST["ewm_client_id"];
        // change order billing // change client id

		$client_billing_details = [
            '_billing_first_name'   => get_user_meta( $user_id, 'ewm_dpm_billing_first_name' , true ),
            '_billing_last_name'    => get_user_meta( $user_id, 'ewm_dpm_billing_last_name' , true ),
            '_billing_company'      => get_user_meta( $user_id, 'ewm_dpm_billing_company' , true ),
            '_billing_address_1'    => get_user_meta( $user_id, 'ewm_dpm_billing_address_1' , true ),
            '_billing_address_2'    => get_user_meta( $user_id, 'ewm_dpm_billing_address_2' , true ),
            '_billing_city'         => get_user_meta( $user_id, 'ewm_dpm_billing_city' , true ),
            '_billing_state'        => get_user_meta( $user_id, 'ewm_dpm_billing_state' , true ),
            '_billing_postcode'     => get_user_meta( $user_id, 'ewm_dpm_billing_postcode' , true ),
            '_billing_country'      => get_user_meta( $user_id, 'ewm_dpm_billing_country' , true ),
            '_billing_email'        => get_user_meta( $user_id, 'ewm_dpm_billing_email' , true ),
            '_billing_phone'        => get_user_meta( $user_id, 'ewm_dpm_billing_phone' , true ),
            '_cart_discount'        => get_user_meta( $user_id, 'ewm_dpm_cart_discount' , true ),
            '_cart_discount_tax'    => get_user_meta( $user_id, 'ewm_dpm_cart_discount_tax' , true ),
            '_order_tax'            => get_user_meta( $user_id, 'ewm_dpm_order_tax' , true ),
            '_order_total'          => get_user_meta( $user_id, 'ewm_dpm_order_total' , true ),
            '_prices_include_tax'   => get_user_meta( $user_id, 'ewm_dpm_prices_include_tax' , true ),
            'is_vat_exempt'         => get_user_meta( $user_id, 'ewm_dpm_is_vat_exempt' , true ),
            '_customer_user'        => $_POST["ewm_client_id"],
            'ttt_customer_user'     => $_POST["ewm_client_id"],
        ];

        foreach( $client_billing_details as $key_v => $value_v ){
            $ewm_order_val = get_post_meta( $_POST["ewm_order_id"], $key_v, true );
            // var_dump( $ewm_order_val );
            // var_dump('Update');
            // var_dump( $key_v );
            // var_dump( $value_v );
            $update_post_meta = update_post_meta( $_POST["ewm_order_id"] , $key_v, $value_v );
        }

        return $client_billing_details;
        
    }

    public static function ajax__change_client_on_order(){
        // $_POST["ewm_client_id"];
        // $_POST["ewm_order_id"];
        // Change client id
        // Change billing details
        // Send billing
        $new_new_client_info = MyUser::change_client_for_billing();

        echo json_encode([
            'post_list'     => $_POST,
            'client_info'   => $new_new_client_info
        ]);

        wp_die();

    }

    public static function ajax__do_removed_product_from_order(){

        // $_POST['product_id']
        // $_POST['order_id']
        // TODO remove product form order

    }

    public static function ajax__do_select_product_from_order(){

        // $_POST['product_id']
        // $_POST['order_id']
        // TODO add product from order

    }

}
