<?php
	// check if the form is filled
	// check if manager is selected
	$product_id = $value_t['id'];

	// form data
	$post_parent_list = get_posts( [
		'post_parent'   => $product_id,
		"post_type"     => "ewmdpm_f_d_v",
		"post_status"   => "publish"
	] );
	
	if( count( $post_parent_list ) == 0 ){

		// create data form for product $value_t['id'] $value_t['id'] 
		EwmDpm\Hooks\MyUser::create_new_form_post([
			'product_id'=> $product_id,
			'order_id'  => $_GET['single_order_id']
		]);
		$post_parent_list = get_posts([
			'post_parent'   => $product_id,
			"post_type"     => "ewmdpm_f_d_v",
			"post_status"   => "publish"
		]);

	}
	if ( count( $post_parent_list ) > 0 ) {
		$post_parent_list_meta  = get_post_meta( $post_parent_list[0]->ID );
	}

	$form_id = get_post_meta( $value_t['id'] , 'ewm_dpm_form_id' , true );
	$ewm_get_post_meta = [];
	$form_shows = FALSE;

	if( $form_id ) {
		$ewm_get_post_meta = get_all_form_fields( $form_id );
		$form_shows = TRUE ;
	}

	$form_for_product_is_set[$product_id] = FALSE;

	foreach( $ewm_get_post_meta as $key_r => $value_r ){
		$ewm_dpm__title_d = 'title_'.$form_id. '_'.$value_r[0] .'_'. $value_r[1];
		$ewm_dpm_val_d = get_post_meta( $post_parent_list[0]->ID , $ewm_dpm__title_d , true );
		// echo  '<div class="ewm_dpm_s_title">' .$value_r[1]. '</div><input type="text" class="form_f_'. $value_t['id'] .' form_f_css_stage4" data-field-name="name" data-code-details = "'.$ewm_dpm__title_d.'" id="'. $value_r[1] .'" value="'.$ewm_dpm_val_d.'">';
		if( strlen( $ewm_dpm_val_d ) > 0 ){
			$form_for_product_is_set[$product_id] = TRUE;
		}
	}
	
?>

<?php

	$manager_is_set_for_workorder = [];

	$manager_is_set_for_workorder[$product_id] = FALSE;

	// Check that the manager is set
	$workorder_filter = [
		"post_parent" => $order_id, // id if associated order
        "post_type"   => "shop_workorder",
		"meta_query"  => [
			'relation'=>'OR',
			[
				'key' 	 => 'swo_Product_Name',
				'value'  => $product_id,
				'compare'=> '=='
			]
		],
		"post_status" => "active"
	];
	$workorder_posts_for_product = [];

	$workorder_posts_for_product[$product_id] = get_posts( $workorder_filter );

	$workorder_post_id = 0;
	// echo count( $workorder_posts_for_product[$product_id] );

	if( count( $workorder_posts_for_product[$product_id] ) > 0 ) {
		$workorder_post_id = $workorder_posts_for_product[$product_id][0]->ID;
	}
	else{
		$workorder_post_id = EwmDpm\Hooks\MyUser::new_workorder_post( [
			'swo_Work_Order_Title'=> 'Work Order: ' . date( 'Y-m-d H:i:s') ,
			'swo_Order_Name'    => $order_id,
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
			'swo_Product_Name'  => $product_id,
			'swo_WO_Manager'    => ''
		] );
	}
	// var_dump( get_post( $workorder_post_id ) );

	$swo_WO_Manager = [];

	$swo_WO_Manager[$product_id] = get_post_meta( $workorder_post_id , 'swo_WO_Manager', true );

	if( strlen( $swo_WO_Manager[$product_id] ) > 0 ){
		$manager_is_set_for_workorder[$product_id] = TRUE ;
	}

	$ewm_dpm_p_details = [];
?>
