<style>
	.ewm_dpm_product_background_side_slive_r{
		width: 100%;
		height: 100%;
		background-color: #33333350;
		position:fixed;
		left: 0px;
		top: 0px;
		padding-left: 20%;
		display:none;
	}
	.ewm_dpm_product_edit_side_slive_r{
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
	.ewm_dpm_close_b_sliv_r{
		float:right;
		margin:30px;
		border-radius: 30px;
		background-color:#fff !important;
		border: 1px solid #ccc;
		padding: 5px 15px;
		cursor:pointer;
	}
	.ewm_dpm_product_menu_side_slive_r{
		width: 100%;
		overflow: auto;
		margin-top: 5px;
	}
	.ewmdpm_order_creation_stage_r{}
	.ewm_dpm_product_main_side_slive_r{
		padding-top: 30px;
	}
	.ewm_dpm_product_main_content_r{
		width: 100%;
		height: inherit;
		padding-bottom: 30px;
	}
	.ewmdpm_order_creation_stage_sliv_r{
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
	.ewmdpm_order_creation_stage_active_sliv_r{
		background-color: #3c434a;
		color:#fff;
	}
	.ewm_dpm_refund_b{
		width: 45%;
		float: left;
		border: 1px solid #ccc;
		border-radius: 5px;
		background:#fff;
		padding:5px;
		cursor: pointer;
	}
</style>

<div class="ewm_dpm_product_background_side_slive_r">

	<div class="ewm_dpm_product_edit_side_slive_r">
		<div class="ewm_dpm_product_menu_side_slive_r">
			<input type="button" class="ewm_dpm_close_b_sliv_r" value="Close">
		</div>

		<div class="ewm_dpm_product_main_content_r">

			<div class="ewm_dpm_product_menu_side_slive_r">
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

			<div class="ewm_dpm_product_main_side_slive_r">
				<center>Would you like to do a refund?</center>
			</div>
			<div class="ewm_dpm_product_main_side_slive_r">
				<input type="submit" value="Refund" class="ewm_dpm_refund_b" data-refund-product="yes">
				<input type="button" value="Don't Refund" class="ewm_dpm_refund_b"  data-refund-product="no">
			</div>

		</div>
	</div>
</div>
