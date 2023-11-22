<style>
	.ewm_dpm_product_background_side_slive{
		width: 100%;
		height: 100%;
		background-color: #33333350;
		position:fixed;
		left: 0px;
		top: 0px;
		padding-left: 20%;
		display:none;
		z-index: 1000000;
	}
	.ewm_dpm_product_edit_side_slive{
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
	.ewm_dpm_close_b_sliv{
		float: right;
		background: #dededec2;
		border: 0px;
		margin: 5px 20px 15px 5px;
		padding: 15px;
		border-radius: 15px;
		cursor: pointer;
	}
	.ewm_dpm_product_menu_side_slive{
		width: 100%;
		overflow: auto;
		margin-top: 5px;
	}
	.ewmdpm_order_creation_stage{}
	.ewm_dpm_product_main_side_slive{
		padding-top: 30px;
	}
	.ewm_dpm_product_main_content{
		width: 100%;
		height: inherit;
		padding-bottom: 30px;
	}
	.ewmdpm_order_creation_stage_sliv{
		width: 25%;
		font-size: 15px;
		font-weight: 300;
		color: #333;
		border-radius: 10px;
		float: left;
		border: 1px solid #cccccc;
		padding: 6px;
		cursor: pointer;
		margin-right: 3px;
	}
	.ewmdpm_order_creation_stage_active_sliv{
		background-color: var(--wc-secondary);
    	color: var(--wc-secondary-text);
	}
</style>
<div class="ewm_dpm_product_background_side_slive">
	<div class="ewm_dpm_product_edit_side_slive">
		<div class="ewm_dpm_product_menu_side_slive">
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
			<input type="button" class="ewm_dpm_close_b_sliv" value="Close">
		</div>
		<div class="ewm_dpm_product_main_content">
			<div class="ewm_dpm_product_menu_side_slive">			
			</div>
			<div class="ewm_dpm_product_menu_side_slive">
				<div class='ewmdpm_order_creation_stage_sliv ewm_dpm_menu_product_single' data-f-s-p='' data-creation-stage="ewm_acivate_sliv_form" id="ewm_form" ><center>Forms >></center></div>
				<div class='ewmdpm_order_creation_stage_sliv' data-creation-stage="ewm_acivate_sliv_workorder" id="ewm_workorder" ><center>Work Orders >></center></div>
				<div class='ewmdpm_order_creation_stage_sliv' data-creation-stage="ewm_acivate_sliv_settings" id="ewm_setting" ><center>Settings</center></div>
			</div>
			<div class="ewm_dpm_product_main_side_slive">
			<?php
				$product_popup_workorder = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_side_slive/workorder.php';
				include_once $product_popup_workorder ;	
			?>
		</div>
		</div>
	</div>
</div>
