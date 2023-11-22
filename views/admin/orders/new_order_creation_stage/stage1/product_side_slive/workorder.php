<style>
	.ewm_dpm_ano_menu{
		width: 100%;
		overflow: auto;
	}
	.ewm_dpm_ano_single_menu{
		width:48%;
		padding:5px;
		float:left;
		background:#50575e;
		color:#fff;
		cursor:pointer;
		margin-right:1%;
		border-radius:60px;
	}
	.ewm_dpm_header_d{
		width: 100%;
		overflow: auto;
		height:20px;
	}
	.ewm_dpm_menu_product_list{
		width:90%;
		overflow:auto;
		overflow:auto;
	}
	.ewm_dpm_menu_product_single{
		float: left;
		border-radius: 10px;
		padding: 8px;
		margin-right: 3px;
		cursor: pointer;
		border: 0px #cccccc solid;
	}
	.form_f_css_stage4{
		width:100%;
		margin-bottom:30px;
	}	
	.form-group_title{
		width:100%;
		margin-bottom:23px;
		font-size:22px;
	}
	.ewm_form_f_s_b{
		width: 30%;
		color: #fff;
		background-color: #3582c4;
		border: 1px solid rgb(79 148 212 / 80%);
		padding: 10px;
		border-radius: 15px;
		margin: 20px 0px;
	}
	.ewm_dpm_menu_product_select_stage4{
		font-size:16px;
		margin-top:30px;
		margin-bottom:30px;
	}
	.ewm_dpm_select_assignee{
		/*padding:10px;*/
		border-radius: 4px;
		/*border: 1px solid #cccccc50; */
		/*box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;*/
		width: 94%;
	}
	.ewm_ewm_message{
		color:#333;
	}
	.ewm_dpm_assignee_drop{
		width:95%;
		padding:20px;
	}
	.ewm_dpm_drop_down_input{		
		padding: 2px 15px;
    	border-radius: 10px;
		margin: 0px !important;
	}
	.ewm_dpm_f_a{
		font-size: 14px;
		line-height: 2;
		color: #2c3338;
		border-color: #8c8f94;
		border-radius: 10px !important;
		padding: 0 24px 0 8px;
		min-height: 30px;
		width: 95%;
		padding: 5px !important;
		border: 1px solid #cccccc80 !important;
	}
	.ewm_dpm_single_field_input_outer_ass{
		width: 98%;
		overflow: auto;
		padding:5px 20px;
	}
	.ewm_dpm_single_field_input_ass{
		float: left;
		width: 100%;
		overflow: auto;
	}
	.ewm_dpm_single_field_input_outer{		
		width:;
		overflow: auto;
	}
	.ewm_dpm_single_field_input{
		float: left;
		width: 33.3%;
		overflow: auto;
	}
	.ewm_dpm_f_a_class{
		width: 95%;
		padding: 5px;
	}
	.ewm_dpm_single_field_input_date{
		width: 33%;
		float: left;
	}
	.ewm_s_team_member_s{
		padding: 15px;
		float: left;
		border-radius: 15px;
		background-color: #ffffff;
		color: #333;
		margin-right: 8px;
		cursor: pointer;
	}
	.ewm_dpm_team_member_d{
		padding: 15px;
		border: 0px solid #9d9c9c40;
		margin: 20px 0px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
		overflow: auto;
		border-radius: 20px;
		background: antiquewhite;
		margin: 20px;
	}
	.ewm_dpm_tt{
		padding:5px;
	}
	.ewm_dpm_f_p{
		width:100%;
		padding-bottom: 2px;
	}
	.ewm_dpm_drop_down_input{	
		padding: 2px 18px !important;
		border-radius: 30px !important;
	}
	.ewm_dpm_single_field_input_outer{
	<?php
		if( strlen( $swo_WO_Manager ) == 0 ){
			echo 'display: none;';
		}
	?>
	}
	.ewm_dpm_submit_workorder_ {
		color: #fff;
		background-color: #2ea7d3;
		border: 1px solid #2ea7d3;
		padding: 15px;
		border-radius: 15px;
		margin-top: 30px;
		cursor: pointer;
	}
	.selected{
		background-color: #333 !important;
		color: #fff !important;
	}
	.form-group_all{
		display:none;
		padding: 0px 20px;
	}
	.ewm_dpm_fill_in_form_before_workorder{
		background-color: #50575e !important;
		color: #fff !important;
		border-radius:4px;
		border-color: #50575e;
		padding: 5px 15px;
		cursor: pointer;
	}
	.ewm_dpm_fill_in_form_message{
		font-size: 18px;
	}
	.ewm_dpm_form_not_filled_message{
		padding: 20px;
		margin: 50px 0px;
	}
</style>

<style>
	.ewm_dpm_s_sub_sec{
		width:95%;
		padding: 5px;
		overflow: auto;
	}
	.ewm_dpm_s_sub_sec_f{
		width: 30%;
		float: left;
	}
	.ewm_dpm_s_sub_sec_s{
		width: 68%;
		float: left;
		overflow: auto;

	}
	.ewm_dpm_pt_table_list{
		padding: 0px;
    	width: 100%;
	}
	.ewm_dpm_settings_input_f{
		width: 40% !important;
		border-radius: 20px !important;
		padding: 1px 20px !important;
		border: 1px solid #ccc !important;
	}
	.ewm_dpm_checklist_pt_input_wo{
		background:#f2a503;
		color:white;
		border-radius:5px;
		border: 1px solid #f2a503;
		cursor: pointer;
	}
	.ewm_dpm_create_task_b{
		background: #2ea7d3;
		color: #fff;
		float: right;
		border-radius: 12px;
		border: 0px;
		padding: 8px;
		cursor: pointer;
	}
	.ewm_dpm_checklist_pt_delete_wo{
		cursor: pointer;
		border-radius:5px;
		border:0px;
	}
</style>

	<input type="hidden" name="" id="ewm_dpm_active_product_id" value="">


	<?php $ord_id = $_GET['single_order_id']; ?>
		<input type="hidden" id="ewm_dpm_product_id" value="<?php echo $ord_id; ?>" >
		<input type="hidden" id="ewm_dpm_ord_id" value="<?php echo $ord_id; ?>" >
	<?php

	$order_id = $_GET['single_order_id'];

	$order = new WC_Order( $order_id );
	$myproduct_list = [];
	foreach( $order->get_items() as $item_id => $item ){
		array_push( $myproduct_list, [
			'name' => $item->get_name(),
			'id' => $item->get_product_id(),
		]);
	}
	function get_all_form_fields( $form_id ){
		$form = RGFormsModel::get_form_meta($form_id);
		$fields = array();

		if(is_array($form["fields"])){
			foreach($form["fields"] as $field){
				if(isset($field["inputs"]) && is_array($field["inputs"])){

					foreach($field["inputs"] as $input)
						$fields[] =  array($input["id"], GFCommon::get_label($field, $input["id"]));
				}
				else if(!rgar($field, 'displayOnly')){
					$fields[] =  array($field["id"], GFCommon::get_label($field));
				}
			}
		}
		return $fields;
	}

	?>

	<?php

		// var_dump( $wc_get_products );
		// ewm_dpm_drop_down_input
		// Add work orders
		foreach ( $wc_get_products as $key_v => $item_v ) {

			$value_t = $value_v = [
				'id' => $item_v->ID,
				'name' => $item_v->post_title
			];

			$workorder_checks_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_side_slive/workorder/workorder_checks.php';
			include $workorder_checks_url;

			$order_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_side_slive/workorder/please_assign.php';
			include $order_list_url;

		}
		
		// Add forms
		foreach ( $wc_get_products as $key_v => $item_v ) {
			$value_t = [
				'id' => $item_v->ID,
				'name' => $item_v->post_title
			];
			//echo 'id:'. $item_v->ID .'name:'. $item_v->post_title;
			$order_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_side_slive/forms/form_list.php';
			include $order_list_url;
		}
		?>

		<style>
			.ewm_dpm_ano_menu{
				width: 100%;
				overflow: auto;
			}			
			.ewm_dpm_ano_single_menu{
				width:48%;
				padding:5px;
				float:left;
				background:#50575e;
				color:#fff;
				cursor:pointer;
				margin-right:3px;
				border-radius:60px;
			}
			
			.form_f_css_stage4{				
				width: 100%;
				margin-bottom: 10px;
				border-radius: 15px !important;
				padding: 3px 20px !important;
				border: 1px solid #c3c4c7 !important;
			}
			.form-group_title{
				width:100%;
				margin-bottom:23px;
				font-size:22px;
			}
			.ewm_form_f_s_b{
				/* width: 98%; */
				color: #fff;
				background-color: #2ea7d3;
				border: 0px solid #3d3f3f;
				padding: 15px;
				border-radius: 15px;
				margin: 20px 0px;
			}
			.ewm_dpm_menu_product_select_stage4{
				font-size:20px;
				margin-top:30px;
				margin-bottom:30px;
			}
			.ewm_dpm_s_title{
				padding:5px 10px;
			}
			.ewm_dpm_menu_product_single_t{
				width: 100%;
				font-weight: 600;
				font-size: 18px;
			}
			.ewm_dm_form_wrap_top_d{
				border-radius:5px;
				float:right;
				width: 92%;
				float: left;
				/*box-shadow: 0 5px 8px 0 rgb(180 178 178 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;*/
			}
			.ewm_dpm_parent_pt_wrapper{
				border: 0px solid #ccc;
				background-color: #fff;
			}
			.ewm_dpm_top_pt_header{
				padding: 20px 0px;
				font-size:18px;
				font-weight:bold;
			}
			.ewm_dpm_main_pt_content{}
			.ewm_dpm_single_cell_pt_header{
				background-color:#cccccc50;
				border-radius:5px;
				padding: 5px;
			}
			.ewm_dpm_single_cell_pt_body{
				padding: 6px 15px;
				border-bottom: #ccc solid 1px;
			}
			.ewm_dpm_view_manage_pt_button{
				background-color:#039bb8;
				color:white;
				border: 0px;
				cursor: pointer;
				border-radius:4px;
			}
			.ewm_dpm_new_single_pt_button{
				background-color:#007e55 !important;
				font-size: 15px;
				color:white !important;
				border: 1px #cccccc50 solid;
				cursor: pointer;
				border-radius:5px;
				float:right;
				margin:30px 5px;
				box-shadow: 0 5px 8px 0 rgb(180 178 178 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
			}
			.ewm_dpm_top_menu_area_pt{
				width:100%;
				overflow: auto !important;
			}
			.ewm_dpm_single_cell_pt_description{
				font-size:10px;
			}
		</style>
		
		<?php
			// Add forms
			foreach ( $wc_get_products as $key_v => $item_v ) {
				$value_t = [
					'id' => $item_v->ID,
					'name' => $item_v->post_title
				];
				$task_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_side_slive/settings/edit_single_product_setting.php';
				include $task_list_url;
			}
		?>
	<div>
</div>

<?php

foreach ($wc_get_products as $key_v => $item_v) {

    $value_t = [
        'id' => $item_v->ID,
        'name' => $item_v->post_title
    ];

    $product_popup_task = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_side_slive/tasks/single_task_edit.php';
    include_once $product_popup_task ;

}

// var_dump( get_post_meta( 1059 ) );

?>

<input type="hidden" name="" id="ewm_dpm_args_product_id">
<input type="hidden" name="" id="ewm_dpm_single_product_id">
