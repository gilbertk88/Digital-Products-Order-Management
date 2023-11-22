<style>
	.ewm_dpm_ano_container{
		width: 100%;
		padding: 20px;
	}
	.ewm_dpm_ano_product_title{	
		font-size: 18px;
		width: 100%;
		padding: 20px;
		font-weight: 500;
	}
	.ewm_dpm_single_product_show_ano{	
		width: 30%;
		float: left;
		padding: 5px;
		background-color: #ebebeb10;
		margin: 10px;
		border: 1px solid #b8b8b89e;
		border-radius: 25px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 5%), 0 6px 10px 0 rgb(118 118 118 / 5%) !important;
	}
	.ewm_dpm_single_product_title_ano {
		font-size: 18px;
		padding: 30px 5px;
		color: #333;
		border-radius: 10px;
	}
	.ewm_dpm_single_product_description_ano{
		font-size:12px;
	}
	.ewm_dpm_single_product_action_button_ano{
		font-size:18px;
	}
	.ewm_dpm_single_product_price_ano{
		font-size:16px;
	}
	.ewm_dpm_ano_product_body{
		width: 100%;
		overflow: auto;
		padding: 35px 5px;
	}
	.ewm_dpm_single_product_description_ano{
		padding: 10px;
	}
	.ewm_dpm_single_product_action_button_ano{
		padding: 10px;
	}
	.ewm_dpm_single_product_price_ano{
		padding: 2px 10px 10px 10px;
	}
	.ewm_dpm_single_product_action_button_click_ano{	
		font-size: 14px;
		border: 0px !important;
		cursor: pointer !important;
		background: #3c434a !important;
		color: #fff !important;
		border-radius: 15px !important;
		padding: 15px !important;
		box-shadow: 0 5px 8px 0 rgb( 151 151 151 / 10% ), 0 6px 10px 0 rgb( 118 118 118 / 17% ) !important;
	}
	.ewm_dpm_single_product_features_ano{
		font-size:14px;
		color:#333333b0  !important;
		padding:0px 0px 30px 25px;
	}
	.ewm_dpm_s_f_li_ano{
		list-style: none ;
	}
	.ewm_dpm_single_product_selected_ano{
		border: 3px solid #ffba00;
	}
	.ewm_dpm_ano_menu{
		width: 100%;
	}
	.ewm_dpm_ano_single_menu{
		width: 46%;
		padding: 5px;
		float: left;
		background: #50575e;
		color: #f1f1f1;
		cursor: pointer;
		margin-right: 1%;
		border-radius: 30px;
		border: 1px solid #3333331f;
	}
</style>

<?php
// $ewm_get_post = get_post( 1062 );				
// var_dump($ewm_get_post);
// $ewm_get_post_meta = get_post_meta( 1062 );

// echo '<br><br>';
// var_dump( $ewm_get_post_meta );

$order_id = $_GET['single_order_id'];

echo '<script type="text/javascript">
ewm_product_script={};
</script>';

if ( $order_id > 0 ) {
    $order = new WC_Order( $order_id );
    $myproduct_list = [];
    foreach ($order->get_items() as $item_id => $item) {
        $myproduct_list[ $item->get_product_id() ] = [
            'name' => $item->get_name(),
            'id'=>$item->get_product_id()
        ];

		echo '<script type="text/javascript">
			ewm_product_script["' . $item->get_product_id() . '"]={
				"name":"'. $item->get_name() .'",
				"id":"'. $item->get_product_id() .'"
			};
		</script>';

    }
}

$args_pp  = array( 'post_type' => 'product', 'posts_per_page' => -1 );
$wc_get_products = get_posts( $args_pp );

// Continuation on individual data types -> Work Order / Forms / Task / Job
$script_myproduct_list = '' ;

$product_count = 0 ;

foreach( $myproduct_list as $product_k => $product_v ) {
	if( $product_count > 0 ){
		$script_myproduct_list .= ',' ;
	}
	$script_myproduct_list .= $product_k ;
	$product_count++;
}

?>

<script type="text/javascript">
	var ewm_dpm_products_selected = [ <?php echo $script_myproduct_list ; ?> ] ;
	console.log( ewm_dpm_products_selected );
</script>

<div>
	<div class="ewm_dpm_ano_product_container">
		<div class="ewm_dpm_ano_product_title">
			<center>Select Product(s)</center>
		</div>
		
		<div class="ewm_dpm_ano_product_body">
			<input type="hidden" class="" id="order_post_id" value="<?php echo $_GET['single_order_id']; ?>" >
			<input type="hidden" class="" id="active_product_data_post_id" value="<?php echo $_data_post_id ; ?>" >
			<input type="hidden" class="" id="active_product_post_id" value="<?php echo $_data_post_id ; ?>" >
		<?php

		$args = array(
			'numberposts' => 900,
			'post_type'   => 'product',
		);

        $ewm_dpm_product_ano = get_posts( $args );

		foreach ( $ewm_dpm_product_ano as $key => $value ) {

			$ewm_dpm_product_id_ano = $value->ID;
			$ewm_dpm_payment_type_ano = get_post_meta( $ewm_dpm_product_id_ano, 'ewm_dpm_payment_type', true);
			$ewm_dpm_retails_price_ano = get_post_meta( $ewm_dpm_product_id_ano, 'ewm_dpm_retails_price', true);
			$_data_post_id = EwmDpm\Hooks\MyUser::get_dpm_data_post([
				'order_id' 	=> $_GET['single_order_id'], //
				'product_id'=> $value->ID,
			]);

			echo "<input type='hidden' id='product_data_post_id_".$value->ID ."' value='".$_data_post_id."' >";
			$swo_settings_paid_unpaid = get_post_meta( $_data_post_id , 'swo_settings_paid_unpaid', true );
			$ewm_dpm_payment_status = 'Unpaid';
			if( $swo_settings_paid_unpaid == 'paid' ){
				$ewm_dpm_payment_status = 'Paid';
			}

			// Update the post meta
			$pfs_features_ano = maybe_unserialize( get_post_meta( $ewm_dpm_product_id_ano, 'pfs_features' , true ) );
			$payment_regularity_ano = 'One Time';
			if( strlen( $ewm_dpm_payment_type_ano ) > 0 ) {
				if( $ewm_dpm_payment_type_ano == 'subscription_monthly' ) {
					$payment_regularity_ano = "/ Month";
				}
			}

			if( strlen( $ewm_dpm_retails_price_ano ) == 0 ) {
				$ewm_dpm_retails_price_ano 	= '--';
				$payment_regularity_ano 	= '';
			}

		?>
			<style type>
				.ewm_dpm_p_o_title{
					font-weight:bold;
					margin-bottom: 8px;
				}
				.ewm_dpm_p_s_title{									
					font-size: small;
					background-color: #f0f0f1;
					color: #333;
					padding: 10px;
					border-radius: 10px;
				}
				.ewm_dpm_single_product_action_button_click_edit_ano{
					display: none;
					background: #dcdcde;
					color: #3c434a;
					border: 0px;
					padding: 4px 10px;
					border-radius: 8px;
					cursor: pointer;
				}
			</style>
				<div class="ewm_dpm_single_product_show_ano ewm_dpm_single_product_select_<?php echo $value->ID; ?>">
					<div class="ewm_dpm_single_product_title_ano">
						<center>
							<?php					
								echo '<div class="ewm_dpm_p_o_title">'.$value->post_title .'</div>';
								// ====================================================================================
								echo '<div class="ewm_dpm_p_s_title">Payment Status: '.$ewm_dpm_payment_status .'</div>';
							?> 
						</center>
					</div>
					<div class="ewm_dpm_single_product_description_ano">
						<center><?php echo $value->post_excerpt; ?></center>
					</div>
					<div class="ewm_dpm_single_product_action_button_ano">
						<center>
							<input type="button" class="ewm_dpm_single_product_action_button_click_ano" value="Open" id="ewm_dpm_single_p_<?php echo $value->ID; ?>" data-product-id="<?php echo $value->ID; ?>">
							<input type="button" class="ewm_dpm_single_product_action_button_click_edit_ano" value="open" id="ewm_dpm_single_edit_p_<?php echo $value->ID; ?>" data-product-id="<?php echo $value->ID; ?>">
						</center>
					</div>
					<div class="ewm_dpm_single_product_price_ano">
						<center><?php echo $ewm_dpm_retails_price_ano.' '.$payment_regularity_ano; ?></center>
					</div>
					<div class="ewm_dpm_single_product_features_ano">
						<ul>
							<?php 
							if( is_string( $pfs_features_ano ) ){
								$pfs_features_ano = [];
							}
							foreach( $pfs_features_ano as $feature_k_ano => $feature_v_ano ) {
								$feature_s_f_ano = get_post( $feature_k_ano );
								$ewm_feature_quantity_ano = get_post_meta( $feature_k_ano, 'ewm_feature_quantity', true );
								echo '<li class="ewm_dpm_s_f_li_ano">
									<b>'.$ewm_feature_quantity_ano.' '.$feature_s_f_ano->post_title.'</b><br>
									'.$feature_s_f_ano->post_content.'
								</li>';
							}
							?>
						</ul>
					</div>
				</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php

	$product_popup_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_edit.php';
	include_once $product_popup_url;

	$product_remove_popup_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_remove.php';
	include_once $product_remove_popup_url;

?>