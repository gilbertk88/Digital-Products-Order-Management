<style>
.ewm_dpm_new_order_container{
	width: 100%;
	padding: 20px;
}
.ewm_dpm_new_product_title{
	font-size:22px;
	width:100%;
	padding:25px;
}
.ewm_dpm_single_product_show{
	width: 30%;
	float:left;
	padding:5px;
	background-color: #ebebeb10;
	margin:10px;
	border-radius: 5px;
	border:1px solid #cccccca1;
	box-shadow: 0 5px 8px 0 rgb(151 151 151 / 5%), 0 6px 10px 0 rgb(118 118 118 / 5%) !important;
}
.ewm_dpm_single_product_title {
    font-size: 18px;
    padding: 30px 5px;
    color: #333;
    border-radius: 10px;
}
.ewm_dpm_single_product_description{
	font-size:12px;
}
.ewm_dpm_single_product_action_button{
	font-size:18px;
}
.ewm_dpm_single_product_price{
	font-size:16px;
}
.ewm_dpm_new_product_body{
	width:100%;
	overflow:auto;
}
.ewm_dpm_single_product_description{
	padding: 10px;
}
.ewm_dpm_single_product_action_button{
	padding: 10px;
}
.ewm_dpm_single_product_price{
	padding: 2px 10px 10px 10px;
}
.ewm_dpm_single_product_action_button_click{
	font-size:14px;
	border:0px !important;
	cursor:pointer !important;
	background: cornflowerblue !important;
    color: #fff !important;
    border-radius: 5px !important;
    padding: 5px 20px !important;
	box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 17%) !important;
}
.ewm_dpm_single_product_features{
	font-size:14px;
	color:#333333b0  !important;
	padding:0px 0px 30px 25px;
}
.ewm_dpm_s_f_li{
	list-style: none ;
}
</style>
<div>
	<div class="ewm_dpm_new_product_container">

		<div class="ewm_dpm_new_product_title"><center>Please Select a Product</center></div>
		
		<div class="ewm_dpm_new_product_body">

		<?php

			// $product = new WC_Product_Simple();

			// var_dump( $product );

			$args = array(
				'numberposts' => 900,
				'post_type'   => 'product',
			);
			
            $ewm_dpm_product = get_posts( $args );

			foreach ( $ewm_dpm_product as $key => $value ) {

				$ewm_dpm_product_id = $value->ID;

				$ewm_dpm_payment_type = get_post_meta( $ewm_dpm_product_id, 'ewm_dpm_payment_type', true);

				$ewm_dpm_retails_price = get_post_meta( $ewm_dpm_product_id, 'ewm_dpm_retails_price', true);

				// Update the post meta 
				$pfs_features = maybe_unserialize( get_post_meta( $ewm_dpm_product_id, 'pfs_features' , true ) ) ;

				$payment_regularity = 'One Time';

				if( strlen( $ewm_dpm_payment_type ) > 0 ) {
					if( $ewm_dpm_payment_type == 'subscription_monthly' ) {

						$payment_regularity = "/ Month";

					}
				}

				if( strlen( $ewm_dpm_retails_price ) == 0 ) {

					$ewm_dpm_retails_price 	= '--';

					$payment_regularity 	= '';

				}

			?>
				<div class="ewm_dpm_single_product_show">
					<div class="ewm_dpm_single_product_title">
						<center> <?php echo $value->post_title; ?> </center>
					</div>
					<div class="ewm_dpm_single_product_description">
						<center><?php echo $value->post_excerpt; ?></center>
					</div>
					<div class="ewm_dpm_single_product_action_button">
						<center><input type="button" class="ewm_dpm_single_product_action_button_click" value="Select" data-product-id="<?php echo $value->ID; ?>"></center>
					</div>
					<div class="ewm_dpm_single_product_price">
						<center><?php echo $ewm_dpm_retails_price.' '.$payment_regularity; ?></center>
					</div>
					<div class="ewm_dpm_single_product_features">
						<ul>
							<?php 

							if( is_string( $pfs_features ) ){

								$pfs_features = [];

							}

							foreach( $pfs_features as $feature_k => $feature_v ) {

								$feature_s_f = get_post( $feature_k );

								$ewm_feature_quantity = get_post_meta( $feature_k, 'ewm_feature_quantity', true );

								echo '<li class="ewm_dpm_s_f_li">
										<b>'.$ewm_feature_quantity.' '.$feature_s_f->post_title.'</b><br>
										'.$feature_s_f->post_content.'
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

// include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/login_signup.php';

?>
