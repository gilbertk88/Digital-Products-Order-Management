<style>
	.ewm_dpm_parent_product_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_product_header{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_product_content{

	}
	.ewm_dpm_product_table_list{

	}
	.ewm_dpm_single_cell_product_header{
		padding: 5px 25px;
		background-color:#cccccc50;
		border-radius:4px;
		min-width: 125px;
	}
	.ewm_dpm_single_cell_product_body{
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_product_button{
		background-color: #2ea7d3;
		padding: 13px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
		float: left;
		margin-right: 5px;
	}
	.ewm_dpm_edit_feature_product_button{
		background-color:#fff;
		border:1px gray solid;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
		padding: 8px;
		color: #333;
		cursor: pointer;
		border-radius: 10px;
		float:left;
		margin-top:4px;
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
	}
	.ewm_dpm_single_cell_product_description{
		font-size:10px;
	}
</style>

<div class="ewm_dpm_parent_product_wrapper">

	<div class="ewm_dpm_top_product_header">
		<center>Product List</center>
	</div>
	<div class="ewm_dpm_top_menu_area">
		<!--
		<a href="<?php echo admin_url('admin.php').'?page=ewm-dpm-products&product_tasks=0' ; ?> " >
			<input type="button" value="Manage Product Tasks" class="ewm_dpm_new_single_product_button"> 
		</a>
		-->
		<a href="<?php echo admin_url('admin.php').'?page=ewm-dpm-products&product_features=0' ; ?> " >
			<input type="button" value="Manage Product Features" class="ewm_dpm_new_single_product_button"> 
		</a>		
		<a href="<?php echo admin_url('admin.php').'?page=ewm-dpm-products&single_product_id=0' ; ?> " >
			<input type="button" value="New Product" class="ewm_dpm_new_single_product_button"> 
		</a>		
	</div>

	<div class="ewm_dpm_main_product_content">

		<table class="ewm_dpm_product_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_product_header">
					Product Id
				</td>
				<td class="ewm_dpm_single_cell_product_header">
					Product Name
				</td>
				<td class="ewm_dpm_single_cell_product_header">
					Product Type <span class="ewm_dpm_single_cell_product_description"> (One time / Monthly)</span>
				</td>				
				<td class="ewm_dpm_single_cell_product_header">
					Status <span class="ewm_dpm_single_cell_product_description"> (Active/ Inactive) </span>
				</td>
				<td class="ewm_dpm_single_cell_product_header">
					Creation Time
				</td>
			</thead>
			<tbody>
				<?php

				foreach ( $ewm_dpm_product as $row => $data_product ) {
						
					$user_data_product = get_userdata( $data_product->post_author );

					$comment_args_product = [
						'page'=> $data_product->ID ,
					];

					$f_payment_type = 'Not Set' ;

					$ewm_dpm_payment_type = get_post_meta(  $data_product->ID , 'ewm_dpm_payment_type', true );

					if( strlen( $ewm_dpm_payment_type ) > 0 ){
						$f_payment_type = $ewm_dpm_payment_type;
						$ewm_payment_representation = [
							'onetime'				=>'One-time Payment',
							'subscription_monthly'	=>'Monthly Subscription',
						];
						$f_payment_type  = $ewm_payment_representation[ $ewm_dpm_payment_type ];
					}

					$ewm_dpm_active_inactive = $data_product->post_status == 'publish' ? 'Active' : 'Inactive' ;

					// wp_delete_post( $data_product->ID );

					echo '
						<tr>
							<td class="ewm_dpm_single_cell_product_body">
								#'. $data_product->ID .'
							</td>
							<td class="ewm_dpm_single_cell_product_body">
							'. $data_product->post_title .'
							</td>
							<td class="ewm_dpm_single_cell_product_body">
								'.$f_payment_type.'
							</td>
							<td class="ewm_dpm_single_cell_product_body">
								'.$ewm_dpm_active_inactive.'
							</td>							
							<td class="ewm_dpm_single_cell_product_body">
								'. $data_product->post_date .'
							</td>
							<td class="ewm_dpm_single_cell_product_body"> 
								<a href="'. admin_url('admin.php') . '?page=ewm-dpm-products&single_product_id=' . $data_product->ID . '" >
									<input type="button" value="Manage" data-product-id="'. $data_product->ID .'" class="ewm_dpm_view_manage_product_button"> 
								</a>
								<a href="'. admin_url('admin.php') . '?page=ewm-dpm-products&edit_single_product_id=' . $data_product->ID . '" >
									<input type="button" value="Features" data-product-id="'. $data_product->ID .'" class="ewm_dpm_edit_feature_product_button"> 
								</a>
								<!--
								<a href="'. admin_url('admin.php') . '?page=ewm-dpm-products&edit_task_single_product_id=' . $data_product->ID.'" >
									<input type="button" value="Tasks" data-product-id="'. $data_product->ID .'" class="ewm_dpm_edit_feature_product_button"> 
								</a>
								-->
							</td>
						</tr>';
				
				}
				?>
			</tbody>
		</table>

	</div>

</div>
