<?php

	$post_data = [
		"post_status"           => "active",
		"post_parent"           => $_GET['single_order_id'], // id if associated order
		"post_type"             => "shop_workorder",
		'meta_query' => [
			/*'relation' => 'AND',
			[
				'key'     => 'swo_Order_Name',
				'value'   => $_GET['single_order_id'],
				'compare' => '=',
			], */
			[
				'key'     => 'swo_Product_Name',
				'value'   => $value_t['id'],
				'compare' => '=',
			],
		]
	];

	/*
		$new_wo_id = EwmDpm\Hooks\MyUser::get_existing_workorder([
			'product_id' => $value_t['id'],
			'order_id'   => $_GET['single_order_id'],
		]);

		$shop_workorder = get_posts( $post_data );
	*/
	// TODO add meta fields filters
	$args_wo_list = $shop_workorder;

	$_existing_workorder_id = EwmDpm\Hooks\MyUser::get_existing_workorder( [
		'order_id' => $_GET['single_order_id'],
		'product_id' => $value_t['id']
	] );

	$swo_WO_Manager = '';
	$assignee = '';
	$swo_Due_Date_d = '';
	$swo_Start_Date = '';
	$swo_Delegation_Date = '';
	$swo_Required_Tool = '';
	$swo_Third_Party_Service = '';
	$swo_Monthly_Reports = '';

	if ( is_array( $args_wo_list ) ) {
		// Get work order manager
		if (count($args_wo_list) > 0) {
			$swo_WO_Manager = get_post_meta($_existing_workorder_id, 'swo_WO_Manager', true);

			/*
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
			'swo_Third_Party_Service' => $args['swo_Third_Party_Service'],
			'swo_Monthly_Reports'=> $args['swo_Monthly_Reports'],
			'swo_Third_Party_Service' => $args['swo_Third_Party_Service'],
			'swo_Product_Name'  => $args['swo_Product_Name'],
			'swo_WO_Manager'
			echo 'wo id: ';
			var_dump( $args_wo_list[0]->ID );
			echo '<br>';

			*/

			/*
			echo 'assignee: ';
			var_dump( $assignee );

			echo '<br>swo_Due_Date_d: ';
			var_dump( $swo_Due_Date_d );

			echo '<br>swo_Start_Date: ';
			var_dump( $swo_Start_Date );

			echo '<br>swo_Start_Date: ';
			var_dump( $swo_Start_Date );


			echo '<br>swo_Delegation_Date: ';
			var_dump( $swo_Delegation_Date );

			echo '<br>swo_Required_Tool: ';
			var_dump( $swo_Required_Tool );

			echo '<br>swo_Third_Party_Service: ';
			var_dump( $swo_Third_Party_Service );

			*/
		}
	}
	// var_dump( $manager_is_set_for_workorder );
	$ewm_dpm_p_details[ $product_id ] = [
		'Manager_is_set:' => $manager_is_set_for_workorder[ $product_id ],
		'Form_is_set:' 	  => $form_for_product_is_set[ $product_id ],
	];
	
?>

<style>
	.ewm_dpm_form_not_filled_message_<?php echo  $value_t['id'] ; ?> {
		/* Form not filled */
		<?php

			if( $form_for_product_is_set[ $value_t['id'] ] == true ){
				echo 'display: none;';
			}
			
		?>
	}
	.ewm_ewm_message_<?php echo $value_t['id'] ; ?> {
		/* Manager not filled && form filled */
		<?php
			if( $form_for_product_is_set[ $value_t['id'] ] == true && $manager_is_set_for_workorder[ $product_id ] == false ) {
				echo 'display: block ;';
			}
			else{
				echo 'display: none ;';
			}
		?>
	}
	.ewm_dpm_single_field_input_outer_ass_<?php echo $value_t['id'] ; ?> {
		/*form filled */
		<?php
		if( $form_for_product_is_set[ $value_t['id'] ] == true && $manager_is_set_for_workorder[ $product_id ] == false ) {
			echo 'display: block ;';
		}
		elseif( $form_for_product_is_set[ $value_t['id'] ] == true && $manager_is_set_for_workorder[ $product_id ] == true ){
			echo 'display: block ;';
		}
		else{
			echo 'display: none ;';
		}
		?>
	}
	.ewm_dpm_assignee_drop_<?php echo $value_t['id'] ; ?>{
		/* form filled && manager filled*/
	<?php
		if( $form_for_product_is_set[ $value_t['id'] ] && $manager_is_set_for_workorder[$product_id] ) {
			echo 'display: block ;';
		}
		else{
			echo 'display: none ;';
		}
	?>
	}
	.ewm_dpm_single_wo_<?php echo $value_t['id'] ; ?> {

		<?php
		if( $manager_is_set_for_workorder[ $product_id ] == true ) {
			echo 'display: block ;';
		}
		else{
			echo 'display: none ;';
		}
		?>

	}
	.ewm_dpm_wo_m_<?php echo $value_t['id'] ; ?> {

		<?php
		if( $manager_is_set_for_workorder[ $product_id ] == true ) {
			echo 'display: block ;';
		}
		else{
			echo 'display: none ;';
		}
		?>

	}

	.ewm_dpm_main_menu_top{
		width: 100%;
		padding: 10px;
		overflow: auto;
	}
	.ewm_dpm_wo_tab{
		width: 31%;
		float: left;
		color: #333;
		background: #fff;
		padding: 8px;
		border-radius: 15px;
		border: 0px solid #ddd;
		cursor: pointer;
	}
	#ewm_dpm_wo_tj{
		margin-right: 5px;
		border:1px solid antiquewhite;
	}
	.ewm_dpm_wo_tab_active{
		background: antiquewhite;
	}
	.ewm_dpm_wo_setting_right{
		border:1px solid antiquewhite;
	}
	.ewm_dpm_title_bold{
		font-size:20px;
		font-weight: bold;
	}
	.ewm_dpm_drop_down_input{
		padding: 6px 18px !important;
    	border-radius: 13px !important;
	}
	.ewm_dpm_submit_workorder_{
		display:none;
	}
</style>

<div class="ewm_dpm_select_assignee  form-group_all workorder-group_<?php echo $value_t['id']; ?> ">
	<div class="ewm_dpm_main_menu_top">
		<div class="ewm_dpm_wo_tab ewm_dpm_wo_tab_active" id="ewm_dpm_wo_tj" data-ewm-workorder-tab-selection="tasks" >
			<center>Tasks</center>
		</div>
		<div class="ewm_dpm_wo_tab" id="ewm_dpm_wo_tj" data-ewm-workorder-tab-selection="jobs" >
			<center>Jobs</center>
		</div>
		<div class="ewm_dpm_wo_tab ewm_dpm_wo_setting_right" data-ewm-workorder-tab-selection="workorder_settings">
			<center>Work Order Settings</center>
		</div>
	</div>

<div class="tasks_section">
<?php
	// Add tasks
	$task_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_side_slive/tasks/edit_single_product_task.php';
	include $task_list_url;
?>
</div>

<div class="job_section">
	<?php
		// Add tasks
		$task_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_side_slive/jobs/jobs_list.php';
		include $task_list_url;
	?>
</div>

<div class="workorder_settings_section">
	<div class="ewm_dpm_title_bold">
		<center>
			<?php
				echo 'Order:' . get_post_meta( $_existing_workorder_id, 'swo_Order_Name', true ) .' | Product:'. get_post_meta( $_existing_workorder_id, 'swo_Product_Name', true ) .'<br><br>';
			?>
		</center>
	</div>
	<div class="ewm_dpm_single_field_input_outer ewm_dpm_single_wo_<?php echo $value_t['id']; ?> ">
		<center>
			<div class='ewm_dpm_team_member_d'>
				<div class="ewm_dpm_tt" >Team Member Watching Work Order</div>
				<div class="ewm_dpm_f_a_class">
					<input type="hidden" name="" id='swo_Required_Team_Members_<?php echo $value_t['id']; ?>' class="ewm_dpm_f_a ewm_dpm_input_wo">
					<?php
						$client_data_list = get_users(array( 'role__in' => array( 'administrator' , 'ewmdsm_freelancer' ) ));
						foreach ( $client_data_list as $c_key => $c_value ) {
							echo '<div data-ap-id="'.$value_t['id'].'" data-team-member-id="'.$c_value->ID.'" class="ewm_s_team_member_s" >' . $c_value->display_name.'</div>';
						}
					?>
				</div>
			</div>
		</center>
	</div>

	<div class="ewm_dpm_form_not_filled_message ewm_dpm_form_not_filled_message_<?php echo $value_t['id']; ?> ewm_dpm_form_filled_message_<?php echo $value_t['id']; ?>">
		<center>
			<span class="ewm_dpm_fill_in_form_message">Before we Proceed, Please Fill in the Form.</span><br><br>
			<input type="button" class="ewm_dpm_fill_in_form_before_workorder" value="Fill in Form">
		</center>
	</div>
	
	<div class="ewm_ewm_message ewm_ewm_message_<?php echo $value_t['id']; ?> ewm_ewm_message_show_<?php echo $value_t['id']; ?> ewm_ewm_message_show_top_<?php echo $value_t['id']; ?>">
		<center>
			To Activate Work Order, Please Select a Manager to Activate.
		</center>
	</div>
	<?php //var_dump( get_post_meta( $value_t['id'] ) ); ?>

	<div class="ewm_dpm_single_field_input_outer_ass ewm_dpm_single_field_input_outer_ass_<?php echo $value_t['id']; ?> ewm_ewm_message_show_<?php echo $value_t['id']; ?>">
		<center>
			<div  class='ewm_dpm_single_field_input_ass'>
				<div class="ewm_dpm_tt" >Select Manager</div>
				<div class="ewm_dpm_f_a_class">
					<?php
						$ewm_dpm_data_list = get_users( array( 'role__in'=> array( 'administrator' ) ) );

						/*						
						var_dump( $_existing_workorder_id );
						echo '<br><br>';
						var_dump( get_post( $_existing_workorder_id ) );
						echo '<br><br>';
						var_dump( get_post_meta( $_existing_workorder_id ) );
						echo '<br><br>';
						*/

						// $assignee 				= get_post_meta( $_existing_workorder_id , 'swo_WO_Manager', true );
						$swo_Due_Date_d 		= get_post_meta( $_existing_workorder_id  , 'swo_Due_Date', true );
						$swo_Start_Date 		= get_post_meta( $_existing_workorder_id  , 'swo_Start_Date', true );
						$swo_Delegation_Date 	= get_post_meta( $_existing_workorder_id  , 'swo_Delegation_Date', true );
						$swo_Required_Tool 		= get_post_meta( $_existing_workorder_id  , 'swo_Required_Tool', true );
						$swo_Third_Party_Service= get_post_meta( $_existing_workorder_id  , 'swo_Third_Party_Service', true );
						$swo_Monthly_Reports 	= get_post_meta( $_existing_workorder_id  , 'swo_Monthly_Reports', true );
						$assignee = get_post_meta( $_existing_workorder_id , 'swo_WO_Manager', true );

						/*
						echo '<br><br> Form Value';
						var_dump( $form_for_product_is_set[ $value_t['id'] ] );
						echo '<br><br>';
						echo '<br><br> Form compare';
						var_dump( ( $form_for_product_is_set[ $value_t['id'] ] == true ) );
						echo '<br><br>';
						echo '<br><br> Workorder compare';
						var_dump( ( $manager_is_set_for_workorder[ $product_id ] == true ) );
						echo '<br><br>';
						*/

					?>
					<select id="assignee_<?php echo $value_t['id']; ?>" class="ewm_dpm_drop_down_input ewm_dpm_f_a" data-ewm_dpm_p_id = '<?php echo $value_t['id']; ?>' >
					<?php
						$option_html = '<option value="no_select">Select Manager</value>';			
						foreach ($ewm_dpm_data_list as $ewm_dpm_key_d => $ewm_dpm_value_d) {

							$ewm_dpm_assignee_d_ID = $ewm_dpm_value_d->data->ID;
							$assigee_is_selected = '';

							if( $ewm_dpm_assignee_d_ID == $assignee ){
								$assigee_is_selected = 'selected';
							}

							$option_html .= '<option value="'. $ewm_dpm_assignee_d_ID .'" '.$assigee_is_selected.'>'.$ewm_dpm_value_d->data->display_name.'</option>';
						}

						echo $option_html;
						//user_login
						//user_email

					?>
					</select>
				</div>
			</div>
		</center>
	</div>
	
	<div class="ewm_dpm_assignee_drop ewm_dpm_wo_m_<?php echo $value_t['id']; ?> ewm_dpm_assignee_drop_<?php echo $value_t['id']; ?>">
		<div class="ewm_dpm_single_field_input_outer ewm_dpm_single_wo_<?php echo $value_t['id']; ?> ">
			<?php $Wo_name = 'Work Order( Order '.$_GET['single_order_id'] .' | Product:'. $value_v['id'].')'; ?>
			<center>
				<div  class='ewm_dpm_single_field_input_date'>
					<div class="ewm_dpm_tt" >Workorder Due Date</div>
					<div class="ewm_dpm_f_a_class">
						<input type="date" name="" id='swo_Due_Date_d_<?php echo $value_t['id']; ?>' value="<?php echo $swo_Due_Date_d; ?>" class="ewm_dpm_f_a ewm_dpm_input_wo swo_Due_Date_d">
					</div>
				</div>
				<div  class='ewm_dpm_single_field_input_date'>
					<div class="ewm_dpm_tt" >Workorder Start Date</div>
					<div class="ewm_dpm_f_a_class">
						<input type="date" name="" id='swo_Start_Date_<?php echo $value_t['id']; ?>' class="ewm_dpm_f_a ewm_dpm_input_wo swo_Start_Date" value="<?php echo $swo_Start_Date; ?>">
					</div>
				</div>
				<div  class='ewm_dpm_single_field_input_date'>
					<div class="ewm_dpm_tt" >
						Work Order Delegation Date
					</div>
					<div class="ewm_dpm_f_a_class">
						<input type="date" name="" id='swo_Delegation_Date_<?php echo $value_t['id']; ?>' class="ewm_dpm_f_a ewm_dpm_input_wo swo_Delegation_Date" value="<?php echo $swo_Delegation_Date ; ?>">
					</div>
				</div>
			</center>
		</div>		
		<div class="ewm_dpm_single_field_input_outer ewm_dpm_single_wo_<?php echo $value_t['id']; ?> ">
			<div  class='ewm_dpm_single_field_input'>
				<div class="ewm_dpm_tt" >Required Tools( Link to excel sheet )</div>
				<div class="ewm_dpm_f_p">
					<input type="text" name="" id='swo_Required_Tool_<?php echo $value_t['id']; ?>' class="ewm_dpm_f_a ewm_dpm_input_wo swo_Required_Tool" value="<?php echo $swo_Required_Tool ; ?>">
				</div>
			</div>
			<div  class='ewm_dpm_single_field_input'>
				<div class="ewm_dpm_tt" >Third Party Service( Link to excel sheet )</div>
				<div class="ewm_dpm_f_p">
					<input type="text" name="" id='swo_Third_Party_Service_<?php echo $value_t['id']; ?>' class="ewm_dpm_f_a ewm_dpm_input_wo swo_Third_Party_Service" value="<?php echo $swo_Third_Party_Service; ?>">
				</div>
			</div>
			<div  class='ewm_dpm_single_field_input'>
				<div class="ewm_dpm_tt" >Monthly Report( Link to excel sheet )</div>
				<div class="ewm_dpm_f_p">
					<input type="text" name="" id='swo_Monthly_Reports_<?php echo $value_t['id']; ?>' class="ewm_dpm_f_a ewm_dpm_input_wo swo_Monthly_Reports" value="<?php echo $swo_Monthly_Reports ; ?>">
				</div>
			</div>
		</div>
		<div class="ewm_dpm_single_field_input_outer ewm_dpm_single_wo_<?php echo $value_t['id']; ?> ">
			<input type="hidden" name="" id='swo_Work_Order_Title_<?php echo $value_t['id']; ?>' value="<?php echo $Wo_name ; ?>">
			<input type="hidden" name="" id='swo_Order_Name_<?php echo $value_t['id']; ?>' value="<?php echo $_GET['single_order_id']; ?>">
			<input type="hidden" name="" id='swo_Product_Name_<?php echo $value_t['id']; ?>' value="<?php echo $value_v['id']; ?>">
			<input type="hidden" name="" id='swo_Client_Code_<?php echo $value_t['id']; ?>' value="<?php echo $order->get_user_id(); ?>">
			<input type="hidden" name="" id='swo_GMB_Services_<?php echo $value_t['id']; ?>' value="<?php echo $value_v['id']; ?>">
		</div>

		<div class="ewm_dpm_single_field_input_outer ewm_dpm_single_wo_<?php echo $value_t['id']; ?> ">
			<center>
				<input type="button" name="" class="ewm_dpm_submit_workorder_" value="Save Work Order Settings" data-wo-p-id="<?php echo $value_t['id']; ?>">
			</center>
		</div>

		<!--
        	<input type="text" name="" id='swo_Client_Active_Paid_Locations' >
        	<input type="text" name="" id='swo_GMB_Optimizations' >
		-->

		<input type="hidden" id="ewm_dpm_new_task_draft">
		<?php $current_user_id = get_current_user_id(); ?>
		<input type="hidden" id="ewm_dpm_current_user_id" value="<?php echo $current_user_id ; ?>">
	</div>
</div>
</div>

<?php
/*
	$post_data = [
		"post_status"           => "active",
		"post_parent"           => $_GET['single_order_id'], // id if associated order
		"post_type"             => "shop_workorder",
		'meta_query' => [
			[
				'key'     => 'swo_Product_Name',
				'value'   => $value_t['id'],
				'compare' => '=',
			],
		]
	];
*/

	$c_workorder = 0 ;
	if ( is_array( $args_wo_list ) ) {
		if (count($args_wo_list) > 0) {
			if (is_object($args_wo_list[0])) {
				$c_workorder = $args_wo_list[0]->ID ;
			}
		}
	}

?>

<input type="hidden" id="ewm_dpm_wo_id_<?php echo $_GET['single_order_id']; ?>_<?php echo $value_t['id']; ?>" value="<?php echo $c_workorder; ?>" >
