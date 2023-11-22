<style>
	.ewm_dpm_parent_workorder_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_workorder_header{
		padding: 20px 0px 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_workorder_content{}

	.ewm_dpm_workorder_table_list{}
	
	.ewm_dpm_single_cell_workorder_header{
		padding: 10px 25px;
		background-color:#cccccc30;
		border-radius:5px;
		min-width: 120px;
	}
	.ewm_dpm_single_cell_workorder_body{
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_workorder_button{
		background-color:#039bb8;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_top_menu_area_workorder{
		width:100%;
		overflow: auto !important;
	}
	.ewm_dpm_single_cell_workorder_description{
		font-size:10px;
	}
	.ewm_dpm_new_single_workorder_button{
		background-color: #2ea7d3;
		padding: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
		float: right;
		margin: 30px 5px;
		box-shadow: 0 5px 8px 0 rgb(180 178 178 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_manage_swok_button{		
		background-color: #2ea7d3;
		padding: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
		float: right;
		margin: 5px;
	}
</style>

<div class="ewm_dpm_parent_workorder_wrapper">
	<div class="ewm_dpm_top_workorder_header">
		<center>Work Order</center>
	</div>
	<div class="ewm_dpm_top_menu_area_workorder">		
	</div>

	<div class="ewm_dpm_main_workorder_content">

	<div class="ewm_dpm_top_menu_area">
		<a href="<?php echo admin_url('admin.php').'?page=ewm-dpm-workorders&single_workorder_edit=0' ; ?> ">
			<input type="button" value="New Work Order" class="ewm_dpm_new_single_workorder_button">
		</a>
	</div>
		<table class="ewm_dpm_workorder_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_workorder_header">
					<center>Work Order Title</center>
				</td>
				<td class="ewm_dpm_single_cell_workorder_header">
					<center>Order ID</center>
				</td>
				<td class="ewm_dpm_single_cell_workorder_header">
					<center>Product</center>
				</td>				
				<td class="ewm_dpm_single_cell_workorder_header">
					<center>Status</center>
				</td>
				<td class="ewm_dpm_single_cell_workorder_header">
					<center>Creation Date</center>
				</td>
				<td class="ewm_dpm_single_cell_workorder_header">
					<center>Deadline</center>
				</td>
				<td class="ewm_dpm_single_cell_workorder_header">
				</td>
			</thead>
			<tbody>
				<?php
				$args = array(
					'numberposts'   => 900,
					'post_type'     => 'shop_workorder',
					"post_status"   => "active"
				);

				$ewm_dpm_workorders = get_posts( $args );

				$ewm_dpm_workorders = array_reverse( $ewm_dpm_workorders );

				foreach( $ewm_dpm_workorders as $row => $data_workorder ) {
						
					$user_data_workorder = get_userdata( $data_workorder->post_author );

					$swo_ID = $data_workorder->ID;

					// Get associated product from meta
					// If product
					$swo_Work_Order_Title = $data_workorder->post_title;
					$swo_Order_ID = $data_workorder->post_parent;
					$swo_Product = get_post_meta( $data_workorder->ID , 'swo_Product', true );
					$swo_Status =  $data_workorder->post_status;
					$swo_Creation_Date = $data_workorder->post_date;
					$swo_Deadline = get_post_meta( $data_workorder->ID , 'swo_Due_Date', true );
					//$swo_Order_Name = get_post_meta( $data_workorder->ID , 'swo_Order_Name', true );
					$swo_Client_Code = get_post_meta( $data_workorder->ID, 'swo_Client_Code' );
					// $swo_Website = get_post_meta( $data_workorder->ID, 'swo_Website', true );
					// $swo_Due_Date = get_post_meta( $data_workorder->ID, 'swo_Due_Date', true );
					// $swo_Start_Date = get_post_meta( $data_workorder->ID, 'swo_Start_Date', true );
					// $swo_GMB_Services = get_post_meta( $data_workorder->ID,'swo_GMB_Services', true );
					// $swo_Client_Active_Paid_Locations = get_post_meta( $data_workorder->ID,'swo_Client_Active_Paid_Locations',true );
					// $swo_GMB_Optimizations= get_post_meta( $data_workorder->ID,'swo_GMB_Optimizations', true );
					// $swo_Required_Team_Members = get_post_meta( $data_workorder->ID,'swo_Required_Team_Members', true );
					// $swo_Required_Tool = get_post_meta( $data_workorder->ID,'swo_Required_Tool', true );
					// $swo_Third_Party_Service = get_post_meta( $data_workorder->ID,'swo_Third_Party_Service', true );
					// $swo_Monthly_Reports =get_post_meta( $data_workorder->ID,'swo_Monthly_Reports', true );
					$swo_Order_Name 	= get_post_meta( $swo_ID , 'swo_Order_Name' , true );

					$swo_Product_Name 	= get_post_meta( $swo_ID , 'swo_Product_Name' , true );

					echo '
						<tr>
							<td class="ewm_dpm_single_cell_order_body">
								<center><b>'.$swo_Work_Order_Title.'</b></center>
							</td>
							<td class="ewm_dpm_single_cell_order_body">
								<center>'.$swo_Order_ID.'</center>
							</td>
							<td class="ewm_dpm_single_cell_order_body">
								<center>'.$swo_Product.'</center>
							</td>
							<td class="ewm_dpm_single_cell_order_body">
								<center>'.$swo_Status.'</center>
							</td>							
							<td class="ewm_dpm_single_cell_order_body">
								<center>'.$swo_Creation_Date.'</center>
							</td>
							<td class="ewm_dpm_single_cell_order_body">
								<center>'.$swo_Deadline.'</center>
							</td>
							<td class="ewm_dpm_single_cell_order_body">
								<center>
									<a href="'. admin_url('admin.php') . '?page=ewm-dpm-orders&single_order_id='.$swo_Order_Name.'&open_workorder=yes&wo_p_id='.$swo_Product_Name.'&ewm_c_stage=stage1" target="blank">
										<center><input type="button" value="Manage" data-order-id="'.$swo_ID.'" class="ewm_manage_swok_button"></center>
									</a>
								</center>
							</td>
						</tr>';					
						// $swo_ID;
				
				}
				?>
			</tbody>
		</table>

	</div>

</div>
