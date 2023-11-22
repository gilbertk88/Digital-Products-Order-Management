<style>
	.ewm_dpm_product_background_side_slive_r_p{
		width: 100%;
		height: 100%;
		background-color: #33333350;
		position:fixed;
		left: 0px;
		top: 0px;
		padding-left: 20%;
		display:none;
		z-index: 1000;
	}
	.ewm_dpm_product_edit_side_slive_r_p{
		width: 80%;
		background-color: #fff !important;
		float: right;
		position: fixed;
		right: 0px;
		top: 0px;
		padding-top: 30px;
		height: 100%;
		padding-left: 20px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb( 118 118 118 / 10% ) !important;
		overflow: auto;
	}
	.ewm_dpm_close_b_sliv_r_p{
		float:right;
		margin:30px;
		border-radius: 30px;
		background-color:#fff !important;
		border: 1px solid #ccc;
		padding: 5px 15px;
		cursor:pointer;
	}
	.ewm_dpm_product_menu_side_slive_r_p{
		width: 100%;
		overflow: auto;
		margin-top: 5px;
	}
	.ewmdpm_order_creation_stage_r_p{}
	.ewm_dpm_product_main_side_slive_r_p{
		padding-top: 30px;
	}
	.ewm_dpm_product_main_content_r_p{
		width: 100%;
		height: inherit;
		padding-bottom: 30px;
	}
	.ewmdpm_order_creation_stage_sliv_r_p{
		width: 20%;
		font-size: 15px;
		font-weight: 300;
		color: #222;
		border-radius: 3px;
		float: left;
		border: 1px solid #cccccc;
		padding: 5px;
		cursor: pointer;
		margin-right: 3px;
	}
	.ewmdpm_order_creation_stage_active_sliv_r_p{
		background-color: #3c434a;
		color:#fff;
	}
	.ewm_dpm_refund_b_p{		
		width: 45%;
		float: left;
		border: 1px solid #ccc;
		border-radius: 15px;
		background: #fff;
		padding: 10px;
		cursor: pointer;
	}
	.ewm_dpm_payment_s{
		width: 100%;
		padding: 25px;
	}
	.ewm_dpm_refund_s{
		width: 100%;
		padding: 25px;
		display: none;
	}
	.ewm_dpm_product_main_side_slive_pp{
		width: 100%;
	}
	.ewm_dpm_payment_s_active{
		background: #72aee6;
		color: #fff;
	}
	.ewm_dpm_payment_s_ttl{
		padding: 20px 0px;
		font-size: 18px;
		font-weight: bold;
	}
</style>

<div class="ewm_dpm_product_background_side_slive_r_p">

	<div class="ewm_dpm_product_edit_side_slive_r_p">
		<div class="ewm_dpm_product_menu_side_slive_p">
			<input type="button" class="ewm_dpm_close_b_sliv_r_p" value="Close">
		</div>

		<div class="ewm_dpm_product_main_content_r_p">

			<div class="ewm_dpm_product_menu_side_slive_r_p">
			<?php
				$arr_list = [
					[
						'links'=> admin_url('admin.php?page=ewm-dpm-orders'),
						'name' => 'Order'
					],
					[
						'links'=> admin_url('admin.php?page=ewm-dpm-orders&single_order_id='.$_GET['single_order_id'] ),
						'name' => $ord_name
					],
				];
				echo EwmDpm\Hooks\MyUser::bread_crumb( $arr_list );

			?>
			</div>
			<div class="ewm_dpm_product_main_side_slive_r_p ewm_dpm_payment_s_ttl">
				<center>Product: </center>
			</div>
			<div class="ewm_dpm_product_main_side_slive_r_p">
				<input type="submit" value="Payment" class="ewm_dpm_refund_b_p ewm_dpm_payment_s_active" id="ewm_dpm_payment_selection_p">
				<input type="button" value="Refund" class="ewm_dpm_refund_b_p"  id="ewm_dpm_refund_selection_p">
			</div>
			<div class="ewm_dpm_product_main_side_slive_r_p">
				<div class="ewm_dpm_payment_s">
					Pay
				</div>
				<div class="ewm_dpm_refund_s">
					Refund
				</div>
			</div>



		</div>
	</div>
</div>
