<style>
	.ewm_dpm_parent_order_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_order_header{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_order_content{}
	.ewm_dpm_order_table_list{}	
	.ewm_dpm_single_cell_order_header{
		padding: 10px 25px;
		background-color:#cccccc30;
		border-radius:5px;
		min-width: 140px;
	}
	.ewm_dpm_single_cell_order_body{
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_order_button{
		background-color: #2ea7d3;
		padding: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
		float: right;
		margin: 1px;
	}
	.ewm_dpm_new_single_order_button{
		background-color: #2ea7d3;
		padding: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
		float:right;
		margin:30px 5px;
		box-shadow: 0 5px 8px 0 rgb(180 178 178 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_menu_area_order{
		width:100%;
		overflow: auto !important;
	}
	.ewm_dpm_single_cell_order_description{
		font-size:10px;
	}	
	.ewm_single_prod_list{		
		padding: 12px;
		background-color: #cac8c852;
		color: #333;
		border-radius: 15px;
	}
	
</style>

<div class="ewm_dpm_parent_order_wrapper">

	<div class="ewm_dpm_top_order_header">
		<center>Order List</center>
	</div>
	<div class="ewm_dpm_top_menu_area_order">
		<a href="<?php echo admin_url('admin.php').'?page=ewm-dpm-orders&single_order_id=0' ; ?> " >
			<input type="button" value="New Order" class="ewm_dpm_new_single_order_button"> 
		</a>
	</div>
	<div class="ewm_dpm_main_order_content">
		<table class="ewm_dpm_order_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_order_header">
					Order Name
				</td>
				<td class="ewm_dpm_single_cell_order_header">
					Order Date
				</td>
				<td class="ewm_dpm_single_cell_order_header">
					Product
				</td>
				<td class="ewm_dpm_single_cell_order_header">
					Status
				</td>
				<td class="ewm_dpm_single_cell_order_header">
					Deadline / Due date
				</td>
				<td class="ewm_dpm_single_cell_order_header">			
				</td>
			</thead>
			<tbody>
				<?php
				
				$ewm_dpm_orders = array_reverse( $ewm_dpm_orders );

				foreach ( $ewm_dpm_orders as $row => $data_order ) {

					$user_data_order = get_userdata( $data_order->post_author );
					$comment_args_product = [
						'page'=> $data_order->ID,
					];

					$f_payment_type = 'Not Set';
					$ewm_dpm_active_inactive = $data_order->post_status == 'publish' ? 'Active' : 'Inactive' ;
					$ewm_Order_Date 		= $data_order->post_date ;
					$order_id 				= $data_order->ID;
					$ewm_Product_Names 		= '';

					if ( $order_id > 0 ) {
						$order = new WC_Order( $order_id );
						$myproduct_list = [];
						foreach ( $order->get_items() as $item_id => $item ) {
							$ewm_Product_Names .= '<span class="ewm_single_prod_list" data-pr-id="'.$item->get_product_id().'">' . $item->get_name() .'</span>';
						}
					}

					$wc_get_order_statuses = wc_get_order_statuses();
					$ewm_Status = $wc_get_order_statuses[ $data_order->post_status ];
					$ewm_Deadline_Due_Date 	= 'Unset';
					$or_id = $data_order->ID;
					$order_swo_Due_Date = get_post_meta( $or_id, 'swo_Due_Date', true );

					if( strlen( $order_swo_Due_Date ) > 0 ) {
						$ewm_Deadline_Due_Date= $order_swo_Due_Date;
					}
					
					echo '
						<tr>
							<td class="ewm_dpm_single_cell_order_body">
								#'. $data_order->ID .'
							</td>
							<td class="ewm_dpm_single_cell_order_body">
								'.$ewm_Order_Date.'
							</td>
							<td class="ewm_dpm_single_cell_order_body">
								'.$ewm_Product_Names.'
							</td>
							<td class="ewm_dpm_single_cell_order_body">
								'.$ewm_Status.'
							</td>							
							<td class="ewm_dpm_single_cell_order_body">
								'.$ewm_Deadline_Due_Date.'
							</td>
							<td class="ewm_dpm_single_cell_order_body">
								<a href="'. admin_url('admin.php') . '?page=ewm-dpm-orders&single_order_id=' . $data_order->ID . '" >
									<input type="button" value="Open" data-order-id="'. $data_order->ID .'" class="ewm_dpm_view_manage_order_button">
								</a>
							</td>
						</tr>';
				
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<?php 
	// var_dump( wc_get_order( 1642 ) );
?>
