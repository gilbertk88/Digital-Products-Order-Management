<?php

// Text orders ===============================

	$ewm_dpm_single_post = get_post( $_GET['single_product_id'] );

	// var_dump( $ewm_dpm_single_post );

	$single_meta_d = get_post_meta( $ewm_dpm_single_post->ID );

	// echo "<br><br>==================================================================================<br><br>";

	// var_dump( $single_meta_d );

	$ewm_dpm_payment_type = get_post_meta( $ewm_dpm_product->ID , 'ewm_dpm_payment_type', true );

	$ewm_dpm_retails_price = get_post_meta( $ewm_dpm_product->ID , 'ewm_dpm_retails_price', true );

	$ewm_dpm_form_id = get_post_meta( $ewm_dpm_product->ID , 'ewm_dpm_form_id', true );

	$ewm_dpm_p_type_data = get_post_meta( $ewm_dpm_product->ID , 'ewm_dpm_p_type_data', true );

	// var_dump( $ewm_dpm_p_type_data );

	$onetime = $ewm_dpm_payment_type == 'onetime' ? 'ewm_dpm_payment_type_active' : 'ewm_dpm_payment_type_inactive' ;

	$subscription_monthly = $ewm_dpm_payment_type == 'subscription_monthly' ? 'ewm_dpm_payment_type_active' : 'ewm_dpm_payment_type_inactive' ;

	$ewm_dpm_p_type_data_html_software = $ewm_dpm_p_type_data == "Software" ? 'ewm_dpm_type_active' : '' ;
	
	$ewm_dpm_p_type_data_html_service = $ewm_dpm_p_type_data == 'Service' ? 'ewm_dpm_type_active' : '' ;

?>

<style type="text/css">
	.ewm_dpm_main_wrapper_single_product {
		width: 90%;
		border-radius: 4px;
		border: 1px solid #fff;
		padding: 40px;
		margin: 20px;
		background-color: #fff;
		padding-top: 30px;
	}
	.ewm_dpm_single_product_fields {		
		width: 80% !important;
		border-radius: 5px !important;
		border: 1px solid #c3c4c7 !important;
		padding: 5px 15px !important;
		margin-bottom: 20px;
		border-radius: 15px !important;
	}
	.ewm_dpm_single_product_edit_submit {
		background-color: #cccccc50;
		border: 0px;
		border: 1px solid #cccccc50;
		color: #000000;
		/* width: 98%; */
		padding: 10px 15px !important;
		border-radius: 40px !important;
		cursor: pointer;
	}
	.ewm_dpm_title_single_product {
		font-size: 18px;
		color: gray;
		padding-bottom: 40px;
	}
	.ewm_dpm_single_product_label {
		width: 90%;
		color: gray;
		overflow: auto;
		padding-left: 13px;
	}
	.pro_dark{
		color: #333 !important;
	}
	.ewm_dpm_single_product_field_wrapper {
		width: 95%;
		overflow: auto;
		padding: 3px;
	}
	.ewm_dpm_new_single_product_button{
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
	.ewm_dpm_top_menu_area{
		width:100%;
		overflow: auto !important;
		min-height: 55px;
	}
	.payment_type_area{
		width:92%;
		overflow: auto ;
		border-radius:14px;
		padding:15px;
		margin-bottom:30px;
		border:1px solid #cccccc;
	}
	.ewm_dpm_payment_type_active{
		float: left;
		width: 40%;
		margin-right: 5px;
		background-color: #2ea7d3;
		padding: 10px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
		box-shadow: 0 5px 8px 0 rgb(180 178 178 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;

	}
	.ewm_dpm_payment_type_inactive{
		float: left;
		border-radius: 15px;
		padding: 8px;
		border: 1px solid #cccccc;
		width: 40%;
		margin-right: 5px;
		cursor: pointer;
		color: #333;
	}
	.ewm_dpm_product_select_payment_type{
		padding: 20px;
		overflow: auto;
	}
	#ewm_dpm_form_id{
		width: 100% !important;
	}
	.ewm_dpm_p_type_half{
		padding: 20px;
	}
	.ewm_dpm_p_type_half{
		width: 40% !important;
		float: left;
		padding: 10px;
		border: 1px solid #ccc;
		margin-right: 5px;
		border-radius: 15px;
		cursor: pointer;
	}
	.ewm_dpm_p_type__wrapper{
		padding: 5px 5px 20px 5px;
	}
	.ewm_dpm_type_active{
		background-color: #2ea7d3;
		color: #fff;
	}
</style>
<div class="ewm_dpm_main_wrapper_single_product">

	<div class="ewm_dpm_title_single_product">
		<center>Edit Product <b>#<?php echo $_GET['single_product_id']; ?></b></center>
	</div>

	<div class="ewm_dpm_fields_single_product">
		
		<div class="ewm_dpm_top_menu_area">
			<a href="<?php echo admin_url('admin.php').'?page=ewm-dpm-products&single_product_id=0' ; ?> " >
				<input type="button" value="New Product" class="ewm_dpm_new_single_product_button"> 
			</a>
		</div>
		<div>
			<div class="ewm_dpm_single_product_label"> Product Name </div>
			<div class="ewm_dpm_single_product_field_wrapper">
				<input type="text" placeholder class="ewm_dpm_single_product_fields" id="ewm_dpm_name" name="ewm_dpm_name" value="<?php echo $ewm_dpm_product->post_title; ?>" >
			</div>
			<div class="ewm_dpm_single_product_label"> Product Short Description</div>
			<div class="ewm_dpm_single_product_field_wrapper">
				<textarea type="text" placeholder class="ewm_dpm_single_product_fields" id="ewm_dpm_short_description" name="ewm_dpm_short_description"><?php echo $ewm_dpm_product->post_excerpt; ?></textarea>
			</div>
			<div class="ewm_dpm_single_product_label"> Product Long Description</div>
			<div class="ewm_dpm_single_product_field_wrapper">
				<textarea type="text" placeholder class="ewm_dpm_single_product_fields" id="ewm_dpm_long_description" name="ewm_dpm_long_description"><?php echo $ewm_dpm_product->post_content; ?></textarea>
			</div>

			<div class="ewm_dpm_single_product_label"> Select a Form </div>
			<div class="ewm_dpm_single_product_field_wrapper">
				<?php
					$forms = GFAPI::get_forms();
					$gform_arr = [];
					foreach( $forms as $form_key => $form_value ) {
						$gform_arr[$form_value['id']] = $form_value['title'];
					}

				?>
				<select placeholder class="ewm_dpm_single_product_fields" id="ewm_dpm_form_id" name="ewm_dpm_form_id">
					<option value="0"></option>
					<?php						
						foreach( $gform_arr as $key => $value ){
							$is_selected = $ewm_dpm_form_id == $key? 'selected' : '' ;
							echo '<option value="'.$key.'" '.$is_selected.'>'. $value .'</option>';
						}
					?>
				</select>
			</div>

			<div class="ewm_dpm_single_product_label">
				Product Type
			</div>
			<div class="ewm_dpm_single_product_field_wrapper ewm_dpm_p_type__wrapper">
				<div class="ewm_dpm_p_type_half <?php echo $ewm_dpm_p_type_data_html_software; ?>" data-product-type="Software">
					<center>Software</center>
				</div>
				<div class="ewm_dpm_p_type_half <?php echo $ewm_dpm_p_type_data_html_service; ?>" data-product-type="Service">
					<center>Service</center>
				</div>
				<input type="hidden" class="ewm_dpm_p_type_data" id="ewm_dpm_p_type_data" value="<?php echo $ewm_dpm_p_type_data; ?>">
			</div>

			<div class="ewm_dpm_single_product_label">Payment Frequency</div>
			<div class="ewm_dpm_single_product_field_wrapper payment_type_area">
				<div class="ewm_dpm_product_select_payment_type">
					<div id="ewm_dpm_onetime_select" class="<?php echo $onetime; ?> ">
						<center>
							One Time Payment
						</center>
					</div>
					<div id="ewm_dpm_subscription_monthly_select" class="<?php echo $subscription_monthly; ?>">
						<center>
							Subscription( Monthly )
						</center>
					</div>
				</div>
					<input type="hidden" class="ewm_dpm_single_product_fields" id="ewm_dpm_payment_type" name="ewm_dpm_payment_type" value="<?php echo $ewm_dpm_payment_type; ?>">
				<div class="ewm_dpm_single_product_label"> Product Price</div>
				
					<div class="ewm_dpm_single_product_field_wrapper">
						<input type="text" placeholder class="ewm_dpm_single_product_fields" id="ewm_dpm_retails_price" name="ewm_dpm_retails_price" value="<?php echo $ewm_dpm_retails_price; ?>">
					</div>
					
				</div>
			<div class="ewm_dpm_single_product_field_wrapper">
				<center><input type="Submit" data-product-id="<?php echo $ewm_dpm_product->ID; ?>" class="ewm_dpm_single_product_edit_submit" id="ewm_dpm_single_product_edit_submit" name="ewm_dpm_single_product_submit_submit" value="Save"></center>
			</div>
		</div>
	</div>
</div>

<?php
 	include_once THEMOSIS_PUBLIC_DIR . '/views/admin/products/product_feature_popup.php';
?>
