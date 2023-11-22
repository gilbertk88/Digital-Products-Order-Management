<style>
	.ewm_dpm_wrapper_slive{
		width: 100%;
		height: 100%;
		background-color: #33333350;
		position: fixed;
		left: 0px;
		top: 0px;
		padding-left: 20%;
		display: none;
		z-index: 1000000;
	}
	.ewm_dpm_client_edit_side_slive{
		width: 80%;
		background-color: #fff !important;
		float: right;
		position: fixed;
		right: 0px;
		top: 0px;
		padding-top: 30px;
		height: 100%;
		padding-left: 20px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
		overflow: auto;
	}
	.ewm_dpm_close_client_pop{
		float: right;
		background: #dededec2;
		border: 0px;
		margin: 5px 20px 15px 5px;
		padding: 15px;
		border-radius: 15px;
		cursor: pointer;
	}
	.ewm_dpm_top_menu{
		overflow: auto;
	}
	.ewm_dpm_nav_menu_sec{
		width: 95%;	
		overflow: auto;	
	}
	.ewm_dpm_client_menu_item{
		float: left;
		overflow: auto;
		width: 46.8%;
		margin-right: 3px;
		cursor: pointer;
		padding: 10px;
		color: #333;
		border: 1px solid #2ea2cc;
		border-radius: 15px;
	}
	.ewm_dpm_nav_body_sec{
		width: 98%;
		overflow: auto;
		padding: 15px;
	}
	.ewm_dpm_client_details_billing{
		display:;
	}
	.ewm_dpm_client_order_payment{
		display: none;
	}
	.ewm_dpm_client_menu_item_active{
		background: #2ea2cc;
		color: #fff;
	}
	.ewm_dpm_sub_menu_sec{
		width: 80%;
		margin-top: 0px;
		overflow: auto;
	}
	.ewm_dpm_sub_client_details, .ewm_dpm_sub_billing_address{
		float: left;
		width: 40%;
		border: 1px solid gray;
		overflow: auto;
		padding: 2px;
		margin-right: 4px;
		border-radius: 5px;
		cursor: pointer;
	}
	.ewm_dpm_sub_client_menu_o{
		float: left;
		width: 40%;
		border: 1px solid gray;
		overflow: auto;
		padding: 6px;
		margin-right: 4px;
		border-radius: 15px;
		cursor: pointer;
	}
	.ewm_dpm_sub_active_m_i{
		background:#515151;
		color:#fff;
	}
	.ewm_dpm_client_subsection{
		display: none;
	}
</style>
<div class="ewm_dpm_wrapper_slive">
	<div class="ewm_dpm_client_edit_side_slive">
		<div class="ewm_dpm_top_menu">
			<input type="button" value="close" class="ewm_dpm_close_client_pop">
		</div>
		<div class="ewm_dpm_main_content">
			<div class="ewm_dpm_nav_menu_sec">
				<div class="ewm_dpm_client_menu_item ewm_dpm_client_menu_item_active" data-selected-client-tab="ewm_dpm_client_details_billing">
					<center>Client Contact</center>
				</div>
				<div class="ewm_dpm_client_menu_item" data-selected-client-tab="ewm_dpm_client_order_payment">
					<center>Order</center>
				</div>				
			</div>
			<div class="ewm_dpm_nav_body_sec">
				<div class="ewm_dpm_submenu_options_details ewm_dpm_client_subsection">
					<center>
						<div class="ewm_dpm_sub_menu_sec ">
							<div class="ewm_dpm_sub_client_details ewm_dpm_sub_client_menu_o ewm_dpm_sub_active_m_i" data-subsection-f="ewm_dpm_client_code_section">
								<center>Client Details</center>
							</div>
							<div class="ewm_dpm_sub_billing_address ewm_dpm_sub_client_menu_o" data-subsection-f="ewm_dpm_client_details_billing">
								<center>Billing address</center>
							</div>
						</div>
					</center>
				</div>
				<div class="ewm_dpm_submenu_options_orders ewm_dpm_client_subsection">
					<center>
						<div class="ewm_dpm_sub_menu_sec">
							<div class="ewm_dpm_sub_client_order ewm_dpm_sub_client_menu_o ewm_dpm_sub_active_m_i" data-subsection-f="ewm_dpm_client_order_list">
								<center>Orders</center>
							</div>
							<div class="ewm_dpm_sub_client_payment ewm_dpm_sub_client_menu_o" data-subsection-f="ewm_dpm_client_payment_list">
								<center>Payments</center>
							</div>
						</div>
					</center>
				</div>

				<div class="ewm_dpm_client_code_section ewm_dpm_client_subsection ewm_dpm_client_subsection_f">
					<?php
						$client_code_details = THEMOSIS_PUBLIC_DIR . '/views/admin/clients/sections/client_code.php';
						require  $client_code_details;
					?>
				</div>
				<div class="ewm_dpm_client_details_billing ewm_dpm_client_subsection ewm_dpm_client_subsection_f" >
					<?php
						$client_billing_details = THEMOSIS_PUBLIC_DIR . '/views/admin/clients/sections/billing_details.php';
						require  $client_billing_details;
					?>
				</div>			
				
				<div class="ewm_dpm_client_order_list ewm_dpm_client_subsection ewm_dpm_client_subsection_f">
					<?php
						$order_list_details = THEMOSIS_PUBLIC_DIR . '/views/admin/clients/sections/order_list.php';
						require  $order_list_details;
					?>
				</div>
				<div class="ewm_dpm_client_payment_list ewm_dpm_client_subsection ewm_dpm_client_subsection_f">
					<?php
						$payment_list_details = THEMOSIS_PUBLIC_DIR . '/views/admin/clients/sections/payment_list.php';
						require  $payment_list_details;
					?>
				</div>

			</div>
		</div>
	</div>
</div>

<input id="ewm_client_id" type="hidden" value="0">
