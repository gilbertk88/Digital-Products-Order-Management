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
		width: 33%;
		border:0px #ffba00 solid;
		color:#333;
		border-radius:30px;
		float:left;
		margin-right:0px;
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
		margin-bottom: 18px;
		border-radius: 10px;
		overflow: auto;
	}
	#ewm_dpm_submit_new_order_stage3{
		background-color: #4f94d4 !important;
		padding: 10px;
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
		border-radius: 10px;
		overflow: auto;
	}
	#_payment_method_title{
		width: 90%;
		border: 1px solid #cccccc;
		border-radius: 5px;
		padding: 2px 25px;
	}
	#ewm_dpm_payment_details{
		width: 90%;
		border: 1px solid #cccccc;
		border-radius: 5px;
		padding: 2px 25px;
	}
	.ewm_ord_price{
		font-size: 15px;
		padding: 8px 12px;
		background: var(--woocommerce);
		border-radius: 6px;
		box-shadow: 0 5px 8px 0 #a464975e, 0 6px 10px 0 rgb(164 100 151 / 13%) !important;
		border: 0px solid #383838;
		color: #fff;
		width: 98%;
		float: left;
		opacity: .9;
	}
	.ewm_dpm_single_v_pay{
		float: left;
		padding: 3px;
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
		/*display: none;*/
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
		background-color: var(--wc-secondary-text);
    	border-radius: 3px;
    	margin: 1px;
    	color: #fff;
    	padding: 5px 20px;
	}
	.ewm_dpm_title_product_payments_data{
		padding: 10px;
	}
	.ewm_dpm_manage_single_pp{
		background-color:#fff;
		border: 1px gray solid;
		border-radius: 30px;
		padding: 5px 20px;
		cursor:pointer;
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
	.ewm_dpm_wrapper_white{		
		background-color: white;
		margin: 20px;
		border-radius: 20px;
		overflow: auto;
		padding: 20px;
	}
</style>

<input type="hidden" class="" id="ewm_dpm_cache_post" value="<?php echo $_GET['single_order_id']; ?>" >
<div class="ewm_dpm_wrapper_white">
	
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
	<div>	
		<div class="ewm_dpm_main_sections_details">
			<?php
				$t_t = '<select class="ewm_dpm_s_list" id="_payment_method_title">';
				$t_t .= '<option value="not_selected">Select Payment Method</option>';
				foreach( WC()->payment_gateways()->payment_gateways() as $key_v => $value_v) {
					$p_payment_m = '';
					if( $value_v->title == $_payment_method_title){
						$p_payment_m = 'selected';
					}
					$t_t .= '<option value="'.$value_v->title.'" '.$p_payment_m.'>'.$value_v->title . '</option>';
				}
				$t_t .= '</select>';

				// echo get_woocommerce_currency_symbol();
				$ewm_dpm_stages = [
					'wc-pending' 	=> 'Pending payment(Not Paid)' ,
					'wc-processing' => 'Active Orders(Paid)' ,
					'wc-on-hold' 	=> 'On hold(Paid but Paused)' ,
					'wc-completed' 	=> 'Completed' ,
					'wc-cancelled'  => 'Cancelled' ,
					'wc-refunded' 	=> 'Refunded' ,
					'wc-failed' 	=> 'Failed' ,
				];

				// $single_no_p_meta = get_post_meta( $single_no_p->ID );
				$single_final_no_arr = [
					'_order_stage'=>[
						'title'	=> 'Order Stage',
						'value' => $_order_stage,
						'key' 	=> '_order_stage'
					],
					'_payment_method_title'=>[
						'title' => 'Payment Method',
						'value' => $_payment_method_title,
						'key' 	=> '_payment_method_title'
					],
					'_order_currency'=>[
						'title' => 'Order Currency',
						'value' => $_order_currency,
						'key' 	=> '_order_currency'
					],
					'_cart_discount'=>[
						'title' => 'Cart Discount',
						'value' => $_cart_discount,
						'key' 	=> '_cart_discount'
					], 
					'_cart_discount_tax'=>[
						'title' => 'Cart Discount Tax',
						'value' => $_cart_discount_tax,
						'key' 	=> '_cart_discount_tax'
					],
					'_order_tax'=>[
						'title' => 'Order Tax',
						'value' => $_order_tax,
						'key' 	=> '_order_tax'
					],
					'_order_total'=>[
						'title' => 'Order Total',
						'value' => $_order_total,
						'key' 	=> '_order_total'
					],
					'_prices_include_tax'=>[
						'title' => 'Prices Include tax',
						'value' => $_prices_include_tax,
						'key' 	=> '_prices_include_tax'
					],
					'is_vat_exempt'=>[
						'title' => 'Vat Exempt',
						'value' => $is_vat_exempt,
						'key' 	=> 'is_vat_exempt'
					],
				
				];

				$post_type = 'new';

				if( array_key_exists( 'single_order_id', $_GET ) ){
					$post_type = 'old';
					foreach( $single_final_no_arr as $key_v => $value_v ){
						$value_details [ $value_v['key'] ] = get_post_meta( $_GET['single_order_id'] , $value_v['key'] , true ) ;
					}
				}
			?>
			<center>
			<?php
				$ewm_dpm_stages = [
					'not-selected' => 'Select a Stage',
					'wc-pending' 	=> 'Pending payment',
					'wc-processing' => 'Active Orders',
					'wc-completed' 	=> 'Completed',
				];

				$_inp_html = '<select class="ewm_dpm_single_input_f" id="_order_stage">';

				foreach( $ewm_dpm_stages  as $k_sv => $v_sv ){

					$_stage_selected = '';

					if( $_order_stage == $k_sv ){
						$_stage_selected = 'selected';
					}
					$_inp_html .= '<option value="'.$k_sv.'" '.$_stage_selected.'>'.$v_sv.'</option>';
				}

				$_inp_html .= '</select>';

			?>

			<div class="ewm_dpm_payment_detailsub">
				<div class="ewm_dpm_stage3_fields_full">
					<div class="ewm_dpm_single_cell_no_body_single">
						Order Stage
					</div>
					<div class="ewm_dpm_single_cell_no_body_single_value_stage3_full">
					<?php echo $_inp_html; ?>
					</div>
				</div>
				<div class="ewm_dpm_stage3_fields_full">
					<div class="ewm_dpm_single_cell_no_body_single">
						Payment Method
					</div>
					<div class="ewm_dpm_single_cell_no_body_single_value_stage3">
						<?php echo $t_t; ?>
					</div>
				</div>
				<div class="ewm_dpm_stage3_fields_full">
					<div class="ewm_dpm_single_cell_no_body_single">
						Payment Details
					</div>
					<div class="ewm_dpm_single_cell_no_body_single_value_stage3">
						<input type="text" class="" id="ewm_dpm_payment_details" value="<?php echo $ewm_dpm_payment_details; ?>">
					</div>
				</div>
			</div>

			<div class="ewm_dpm_main_fileds_sec">		
				<div class="ewm_dpm_stage3_fields">
					<div class="ewm_dpm_single_cell_no_body_single">
						Order Currency
					</div>
					<div class="ewm_dpm_single_cell_no_body_single_value_stage3">
						<input value="<?php echo $single_final_no_arr['_order_currency']['value']; ?>" class="ewm_dpm_single_input_f" id="_order_currency">
					</div>
				</div>
				<div class="ewm_dpm_stage3_fields">
					<div class="ewm_dpm_single_cell_no_body_single">
						Cart Discount
					</div>
					<div class="ewm_dpm_single_cell_no_body_single_value_stage3">
						<input value="<?php echo $single_final_no_arr['_cart_discount']['value']; ?>" class="ewm_dpm_single_input_f" id="_cart_discount">
					</div>
				</div>
				<div class="ewm_dpm_stage3_fields">
					<div class="ewm_dpm_single_cell_no_body_single">
						Cart Discount Tax
					</div>
					<div class="ewm_dpm_single_cell_no_body_single_value_stage3">
						<input value="<?php echo $single_final_no_arr['_cart_discount_tax']['value']; ?>" class="ewm_dpm_single_input_f" id="_cart_discount_tax">
					</div>
				</div>
				<div class="ewm_dpm_stage3_fields">
					<div class="ewm_dpm_single_cell_no_body_single">
						Order Tax
					</div>
					<div class="ewm_dpm_single_cell_no_body_single_value_stage3">
						<input value="<?php echo $single_final_no_arr['_order_tax']['value']; ?>" class="ewm_dpm_single_input_f" id="_order_tax">
					</div>
				</div>
				<div class="ewm_dpm_stage3_fields">
					<div class="ewm_dpm_single_cell_no_body_single">
						Prices Include tax
					</div>
					<div class="ewm_dpm_single_cell_no_body_single_value_stage3">
						<input value="<?php echo $single_final_no_arr['_prices_include_tax']['value']; ?>" class="ewm_dpm_single_input_f" id="_prices_include_tax">
					</div>
				</div>
				<div class="ewm_dpm_stage3_fields">
					<div class="ewm_dpm_single_cell_no_body_single">
						Vat Exempt
					</div>
					<div class="ewm_dpm_single_cell_no_body_single_value_stage3">
						<input value="<?php echo $single_final_no_arr['is_vat_exempt']['value']; ?>" class="ewm_dpm_single_input_f" id="is_vat_exempt">
					</div>
				</div>
				<div>
					<div class="ewm_dpm_single_cell_no_body_single">
					</div>							
				</div>			
			</div>
			<div class="ewm_dpm_single_cell_no_body_single_value_stage3_b">
				<center>
					<input type="button" class="" id="ewm_dpm_submit_new_order_stage3" value="Save Payments Records">
				</center>
			</div>
			</center>
			<div>
				<div class="ewm_dpm_single_cell_no_body_single">
			</div>
		</div>
	</div>
</div>