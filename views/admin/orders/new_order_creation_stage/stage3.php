<style type="text/css">
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
	.ewm_dpm_header_t{
		width:100%;
		overflow:auto;
	}
	select#_order_stage.ewm_dpm_single_input_f{
		width: 90%;
		border: 1px solid #cccccc;
		border-radius: 5px;
		padding: 2px 25px;
	}
	.ewm_dpm_single_input_f{
		width: 90%;
		border: 1px solid #cccccc;
		border-radius: 5px;
		padding: 8px 25px;
	}
	.ewm_dpm_s_list{
		width:100%;
		border-radius:50px;
	}
	.ewm_dpm_wrapper_details{
		width:100%;
		padding:0px;
	}
	.ewm_dpm_amount{
		padding:50px;
		background-color:#cccccc50;
		color:#333333d1;
		border-radius:5px;
		width:60%;
		font-size:30px;
	}
	.ewm_dpm_stage3_fields{
		float:left;
		width:33%;
		overflow:auto;
	}
	.ewm_dpm_single_cell_no_body_single_value_stage3{}

	.ewm_dpm_single_cell_no_body_single{
		padding: 10px 10px 3px 15px;
		background-color: #fff;
		min-width: 180px;
	}
	.ewm_dpm_single_cell_no_body_single_value_stage3_b{
		width:96.8%;
		padding-top:20px;
	}
	.ewm_dpm_stage3_fields_full{
		width: 30%;
		padding:10px;
		border:0px #ffba00 solid;
		overflow: auto;
		color:#333;
		border-radius:30px;
		float:left;
	}
	.ewm_dpm_single_cell_no_body_single_full{
		width:90%;
		min-width:100px;
	}
	.ewm_dpm_single_cell_no_body_single_value_stage3_full{
		width:100%;
		float:left;
		min-width:150px;
	}
	.ewm_dpm_main_fileds_sec{
		width: 95%;
		/* border: 1px solid #cccccc5e; */
		padding: 40px 20px;
		/* box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important; */
		margin-top: 36px;
		margin-bottom: 18px;
		border-radius: 10px;
		overflow: auto;
	}
	#ewm_dpm_submit_new_order_stage3{
		width: 100%;
		background-color: #50575e !important;
		padding: 5px 50px;
		font-size: 15px;
		font-weight: 400;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 50px;
		float: right;
		box-shadow: 0 5px 8px 0 rgb(97 97 97 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	#_order_stage{
		padding:2px 25px;
	}
	.ewm_dpm_stage3_fields_full_sub{
		width:100%;
	}
	.ewm_dpm_payment_detailsub{
		width: 95%;
		padding: 10px 20px;
		margin-top: 50px;
		border-radius: 10px;
		overflow: auto;
	}
	#_payment_method_title{
		border-radius:5px;
		padding:2px 25px;
	}
	.ewm_ord_price{		
		font-size: 15px;
		padding: 8px 12px;
		background: #72aee6;
		border-radius: 6px;
		box-shadow: 0 5px 8px 0 #3c434a4f, 0 6px 10px 0 rgb(164 100 151 / 13%) !important;
		border: 0px solid #383838;
		color: #fff;
		width: 98%;
		float: left;
		opacity: .9;
		margin-bottom: 20px;
	}
	.ewm_dpm_single_v_pay{
		float: left;
		padding: 3px;
	}
	#ewm_dpm_payment_details{
		width: 100%;
		border-radius: 5px;
		padding:2px 25px;
	}
	.ewm_dpm_single_v_pay_v{
		padding:3px;
		float: left;
	}
	.ewm_dpm_single_m_p_b{
		background-color: var(--woocommerce);
		color: #fff;
		padding: 5px 25px;
		border: 1px solid #fff;
		border-radius: 30px;
		cursor: pointer;
		margin: 3px;
	}
	.ewm_dpm_main_sections_details{
		display: none;
	}
	.ewm_dpm_toggle_more_det{
		padding: 5px 20px;
		background: #000;
		border-radius: 6px;
		border: 0px;
		color: #fff;
		float: right;
		margin: 20px;
		cursor:pointer;
	}
	.ewm_dpm_paymant_table{
		width: 100%;
	}
	.ewm_dpm_title_product_payments{
		background-color: #515151;
    	border-radius: 0px;
    	margin: 1px;
    	color: #fff;
    	padding: 10px;
	}
	.ewm_dpm_title_product_payments_data{
		padding: 10px;
	}
	.ewm_dpm_manage_single_pp{
		background-color: #fff;
		border: 1px gray solid;
		border-radius: 15px;
		padding: 10px;
		cursor: pointer;
	}
	.ewm_dpm_top_ticket_header {
		padding: 20px 0px;
		font-size: 18px;
		font-weight: bold;
	}
	.more_detail_dashicons{
		margin-right: 4px;
	}
	.ewm_ord_price_tab{
		float: left;
		padding: 5px 20px;
		width: 23%;
	}
	#wpfooter{
		position: relative;
	}
</style>

	<input type="hidden" class="" id="ewm_dpm_cache_post" value="<?php echo $_GET['single_order_id']; ?>" >
	
	<div class="ewm_dpm_no_table_list_single">
		<center>
		<div class="ewm_dpm_wrapper_details">
			
			<div class="ewm_dpm_amount_">
				<?php

				$_order_amount 			= '0.00';
				$_order_stage			= '';
				$_payment_method_title	= '';
				$_order_currency 		= '';
				$_cart_discount 		= '';
				$_cart_discount_tax		= '';
				$_order_tax				= '';
				$_order_total			= '';
				$_prices_include_tax	= '';
				$is_vat_exempt			= '';
				$ewm_dpm_payment_details= '';

				if( array_key_exists( 'single_order_id', $_GET ) ) {
					$_order_amount 		= get_post_meta( $_GET['single_order_id'] , '_order_total' , true );
					$_order_stage		= get_post_meta( $_GET['single_order_id'] , '_order_stage' , true );
					$_payment_method_title = get_post_meta( $_GET['single_order_id'] , '_payment_method_title' , true );
					$_order_currency 	= get_post_meta( $_GET['single_order_id'] , '_order_currency' , true );
					$_cart_discount 	= get_post_meta( $_GET['single_order_id'] , '_cart_discount' , true );
					$_cart_discount_tax	= get_post_meta( $_GET['single_order_id'] , '_cart_discount_tax' , true );
					$_order_tax			= get_post_meta( $_GET['single_order_id'] , '_order_tax' , true );
					$_order_total		= get_post_meta( $_GET['single_order_id'] , '_order_total' , true );
					$_prices_include_tax= get_post_meta( $_GET['single_order_id'] , '_prices_include_tax' , true );
					$is_vat_exempt		= get_post_meta( $_GET['single_order_id'] , 'is_vat_exempt' , true );
					$ewm_dpm_payment_details=get_post_meta( $_GET['single_order_id'] , 'ewm_dpm_payment_details' , true );
				}
				
				?>
			</div>
		</div>
		</center>
		<div>
			<div class="ewm_dpm_top_ticket_header">
				<center>Active Product List</center>
			</div>

		<div class="ewm_ord_price">
				<div class="ewm_ord_price_tab">
					<div class="ewm_dpm_single_v_pay">
						Total Bill:
					</div>
					<div class="ewm_dpm_single_v_pay_v">
						<b><?php echo wc_price( $_order_amount ); ?></b>
					</div>
				</div>
				<div class="ewm_ord_price_tab">
					<div class="ewm_dpm_single_v_pay">
						Total Paid:
					</div>
					<div class="ewm_dpm_single_v_pay_v">
						<b><?php echo ' 0 ' ; ?></b>
					</div>
				</div>
				<div class="ewm_ord_price_tab">
					<div class="ewm_dpm_single_v_pay">
						Total Outstanding:
					</div>
					<div class="ewm_dpm_single_v_pay_v">
						<b><?php echo wc_price( $_order_amount ) ; ?></b>
					</div>
				</div>
				
			</div>
		</div>

			<div>
			<?php

			$order_id = $_GET['single_order_id'];
			$myproduct_list = [];

			if ( $order_id > 0 ) {
				$order = new WC_Order($order_id);

				foreach ($order->get_items() as $item_id => $item) {
					$finale_s_p_price = EwmDpm\Hooks\MyUser::get_product_price_order([
						'product_id' => $item->get_product_id(),
						'order_id'	 => $_GET['single_order_id']
					]);
					$myproduct_list[ $item->get_product_id() ] = [
						'name' 	=> 	$item->get_name(),
						'id'	=>	$item->get_product_id(),
						'price'	=>	$finale_s_p_price,
					];
				}
			} ?>
			<table class="ewm_dpm_paymant_table">
				<tr>
					<td class="ewm_dpm_title_product_payments">Product Name</td>
					<td class="ewm_dpm_title_product_payments">Payment Status</td>
					<td class="ewm_dpm_title_product_payments">Payment Price</td>
					<td class="ewm_dpm_title_product_payments"></td>
				</tr>

				<?php
				
				foreach( $myproduct_list as $k_pay_product => $v_pay_product ){ ?>
				<tr>
					<td class="ewm_dpm_title_product_payments_data"><?php echo $v_pay_product['name'] ; ?></td>
					<td class="ewm_dpm_title_product_payments_data">Transaction completed</td>
					<td class="ewm_dpm_title_product_payments_data"><?php echo $v_pay_product['price'] ; ?></td>
					<td class="ewm_dpm_title_product_payments_data"><center><input type="button" value="Manage" class="ewm_dpm_manage_single_pp"></center></td>
				</tr>

				<?php } ?>
			</table>
				
			</div>
		</div>
		
		</div>

		<?php 

			$product_payment_popup_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage3/product_payments.php';

			include_once $product_payment_popup_url ;

		?>