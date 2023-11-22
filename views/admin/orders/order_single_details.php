<style>
	.ewm_dpm_parent_order_wrapper_single{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_order_header_single{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_order_content_single{

	}
	.ewm_dpm_order_table_list_single{
		margin-bottom:40px;
		margin-top:20px;
	}
	.ewm_dpm_single_cell_order_header_single{
		padding: 10px 25px;
		background-color: #13b184f2;
		border-radius: 4px;
		color: #ffff;
	}
	.ewm_dpm_single_cell_order_body_single{
		padding: 10px 15px;
		background-color:#458e941f;
		min-width:180px;

	}
	.ewm_dpm_single_cell_order_body_single_value{
		padding: 5px 15px;
		font-weight:bold;
		min-width:300px;
		border:1px solid #74af9a24;
	}
	.ewm_dpm_view_manage_order_button_single{
		background-color:#13b97d;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_new_single_order_button_single{
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
	.ewm_dpm_top_menu_area_order_single{
		width: 90%;
		overflow: auto !important;
		padding: 20px 50px;

	}
	.ewm_dpm_single_cell_order_description_single{
		font-size:10px;
	}
	.ewm_button_od{
		float:right;			
		background-color: #007e55 !important;
		padding: 5px 50px;
		font-size: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 5px;
		float: right;
		box-shadow: 0 5px 8px 0 rgb(97 97 97 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_button_wo{
		float:right;
		background-color: #007e55 !important;
		padding: 5px 50px;
		font-size: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 5px;
		float: right;
		box-shadow: 0 5px 8px 0 rgb(97 97 97 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
</style>

<?php
	
	$single_order_p = get_post($_GET['single_order_id']);

	// var_dump( $single_order_p );

	echo '<br><br><br>';
	
?>
<div class="ewm_dpm_parent_order_wrapper_single">

	<div class="ewm_dpm_top_order_header_single">
		<center><?php echo $single_order_p->post_title ; ?></center>
	</div>
	<div class="ewm_dpm_top_menu_area_order_single">
		<a href="<?php echo admin_url('admin.php').'?page=ewm-dpm-orders&single_order_workorders='.$_GET['single_order_id'] ; ?> "><input type="button" class="ewm_button_wo" value="Work Orders"></a>
		<a href="<?php echo admin_url('admin.php').'?page=ewm-dpm-orders&single_order_ordervalues='.$_GET['single_order_id'] ; ?> "><input type="button" class="ewm_button_od" value="Order Details"></a>
	</div>

	<div class="ewm_dpm_main_order_content_single">

	<center>
		<table class="ewm_dpm_order_table_list_single">
			<thead>
				<td class="ewm_dpm_single_cell_order_header_single">
					<center>Title</center>
				</td>
				<td class="ewm_dpm_single_cell_order_header_single">
					<center>Value</center>
				</td>
				
			</thead>
			<tbody>
				<?php

				$ewm_dpm_stages = [
					'wc-pending' 	=> 'Pending payment' ,
					'wc-processing' => 'Active Orders' ,
					'wc-on-hold' 	=> 'On hold' ,
					'wc-completed' 	=> 'Completed' ,
					'wc-cancelled'  => 'Cancelled' ,
					'wc-refunded' 	=> 'Refunded' ,
					'wc-failed' 	=> 'Failed' ,
				];

				echo '<center>Order ID: <b>'.$single_order_p->ID.'</b> | Order Stage: <b>'. $ewm_dpm_stages[ $single_order_p->post_status ].'</b> | Last Modified: <b>' . $single_order_p->post_modified.'</b> </center>';
			
				$single_order_p_meta = get_post_meta( $single_order_p->ID );

				// var_dump( $single_order_p_meta );

				$single_final_ord_arr = [
					[
						'title' => 'Payment Method',
						'value' => get_post_meta( $single_order_p->ID ,'_payment_method_title', true ),
					],
					[
						'title' => 'Billing First Name',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_first_name', true ),
					],
					[
						'title' => 'Billing Last Name',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_last_name', true )
					],
					[
						'title' => 'Billing Company',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_company', true )
					],
					[
						'title' => 'Billing Address 1',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_address_1', true )
					],
					[
						'title' => 'Billing Address 2',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_address_2', true )
					],
					[
						'title' => 'Billing City',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_city', true )
					],
					[
						'title' => 'Billing State',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_state', true )
					],
					[
						'title' => 'Billing Postcode',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_postcode', true )
					],
					[
						'title' => 'Billing Country',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_country', true )
					],
					[
						'title' => 'Billing Email',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_email', true )
					],
					[
						'title' => 'Billing Phone',
						'value' => get_post_meta( $single_order_p->ID ,'_billing_phone', true )
					],
					[
						'title' => 'Order Currency',
						'value' => get_post_meta( $single_order_p->ID ,'_order_currency', true )
					],
					[
						'title' => 'Cart Discount',
						'value' => get_post_meta( $single_order_p->ID ,'_cart_discount', true )
					], 
					[
						'title' => 'Cart Discount Tax',
						'value' => get_post_meta( $single_order_p->ID ,'_cart_discount_tax', true )
					],
					[
						'title' => 'Order Tax',
						'value' => get_post_meta( $single_order_p->ID ,'_order_tax', true )
					],
					[
						'title' => 'Order Total',
						'value' => get_post_meta( $single_order_p->ID ,'_order_total', true )
					],
					[
						'title' => 'Prices Include tax',
						'value' => get_post_meta( $single_order_p->ID ,'_prices_include_tax', true )
					],
					[
						'title' => 'Vat Exempt',
						'value' => get_post_meta( $single_order_p->ID ,'is_vat_exempt', true )
					],
					[
						'title' => 'New Order Email Sent',
						'value' => get_post_meta( $single_order_p->ID ,'_new_order_email_sent', true )
					]
				];

				foreach ( $single_final_ord_arr as $row => $data_order ) {
				
					echo '
						<tr>
							<td class="ewm_dpm_single_cell_order_body_single">
								'. $data_order['title'] .'
							</td>
							<td class="ewm_dpm_single_cell_order_body_single_value">
							'. $data_order['value'] .'
							</td>
						</tr>';
				
				}
				?>
			</tbody>
		</table>
	</center>
	</div>

</div>

