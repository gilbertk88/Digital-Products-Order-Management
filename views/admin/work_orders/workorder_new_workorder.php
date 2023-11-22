<style>
	.ewm_dpm_parent_newworkorder_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 14px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_newworkorder_header{
		padding: 20px 0px 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_newworkorder_content{}

	.ewm_dpm_newworkorder_table_list{}
	
	.ewm_dpm_single_cell_newworkorder_header{
		padding: 10px 25px;
		background-color:#cccccc30;
		border-radius:5px;
		min-width: 120px;
	}
	.ewm_dpm_single_cell_newworkorder_body{
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_newworkorder_button{
		background-color:#039bb8;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_new_single_newworkorder_button{
		background-color:white;
		padding: 5px 50px;
		font-size: 15px;
		color:white;
		border: 1px #33333340 solid;
		color:#333;
		cursor: pointer;
		border-radius:4px;
		float:right;
		margin:30px 5px;
	}
	.ewm_dpm_top_menu_area_newworkorder{
		width:100%;
		overflow: auto !important;
	}
	.ewm_dpm_single_cell_newworkorder_description{
		font-size:10px;
	}
	.ewm_dpm_new_single_newworkorder_button{
		background-color:#007e55 !important;
		padding: 5px 50px;
		font-size: 15px;
		color:white !important;
		border: 1px #cccccc50 solid;
		cursor: pointer;
		border-radius:5px;
		float:right;
		margin:30px 5px;
		box-shadow: 0 5px 8px 0 rgb(180 178 178 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_container{
		width:100%;
	}
	.ewm_dpm_single_workorder_f{
		min-width: 100%;
	}
	.ewm_swo_title_{
		min-width: 100%;
		min-width: 100%;
    	padding: 10px 10px 5px 10px;
	}
	.ewm_swo_input_{
		min-width: 100%;
		overflow: auto;
	}
	.ewm_dpm_single_input{
		min-width: 98%;
		padding: 10px 15px;
		border-radius: 80px;
		border: 1px solid #ccc;
		margin-bottom: 20px;
	}
	.ewm_dpm_save_new_workorder_button{
		background-color:#ccc;
		padding: 10px 20px;
		border-radius: 100px;
		border: 1px solid #ccc;
		margin-bottom:30px;
		cursor: pointer;
	}
	.ewm_s_team_member{
		padding: 10px;
		float: left;
		border-radius: 10px;
		background-color:#cccccc80;
		color:#333;
		margin-right: 8px;
		cursor: pointer;
	}
	.ewm_s_team_member.selected{
		background-color:#333 !important;
		color:#fff;
	}
</style>

<div class="ewm_dpm_parent_newworkorder_wrapper">
	<div class="ewm_dpm_top_newworkorder_header">
		<center>New Work Order</center>
	</div>
	<div class="ewm_dpm_top_menu_area_newworkorder">
	</div>

	<?php
		
	$args_o = array(
		'numberposts'   => 900,
		'post_type'     => 'shop_order',
		"post_status"   => "wc-processing" 
	);

	?>
	<div class="ewm_dpm_main_newworkorder_content">

	<div class="ewm_dpm_top_menu_area_newworkorder">
		
	</div>
		<?php
			$args = array(
			'numberposts'   => 900,
			'post_type'     => 'shop_work_order',
			"post_status"   => "ewm_active"
		);
				
		// Get associated product from meta
		// If product

		?>
		<div class="ewm_dpm_container">
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Work Order Title
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Work_Order_Title" >
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Related Order
				</div>
				<div class="ewm_swo_input_">
					<select class="ewm_dpm_single_input" id="swo_Order_Name">
						<?php 
						$ewm_dpm_orders = get_posts( $args_o );
						foreach($ewm_dpm_orders  as $order_k => $order_v ) {
							echo '<option value="'.$order_v->ID.'">'. $order_v->post_title .'</option>';					
						}
						?>
					</select>				
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Client Code
				</div>
				<div class="ewm_swo_input_">
					<select class="ewm_dpm_single_input" id="swo_Client Code">
					<?php

					$client_data_list = get_users(array( 'role__in' => array( 'ewmdsm_client' ) ));

					foreach ($client_data_list as $c_key => $c_value) {
						echo '<option value="'.$c_value->ID.'">' . $c_value->display_name.'</option>';
					}
					
					?>
					</select>
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Website
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Website">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Due Date
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Due_Date">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					GMB Services
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_GMB_Services">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Client Active Paid Locations
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Client_Active_Paid_Locations">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					GMB Optimizations
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_GMB_Optimizations">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Required Team Members
				</div>
				<div class="ewm_swo_input_">
					<input type='hidden' class="ewm_dpm_single_input" id="swo_Required_Team_Members">

					<?php

					$client_data_list = get_users( array( 'role__in' => array( 'administrator' , 'ewmdsm_freelancer' ) ) );

					foreach ($client_data_list as $c_key => $c_value) {
						echo '<div data-team-member-id="'.$c_value->ID.'" class="ewm_s_team_member" >' . $c_value->display_name.'</div>';
					}
					
					?>
					</select>
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Required Tool
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Required_Tool">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Third Party Service
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Third_Party_Service">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Monthly Reports
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Monthly_Reports">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Third Party Service
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Third_Party_Service">
				</div>
			</div>
			
			<div class="ewm_dpm_single_cell_order_body">
				<center>
					<input type="button" value="Save" class="ewm_dpm_save_new_workorder_button">
				</center>
			</div>
		</div>

	</div>

</div>
