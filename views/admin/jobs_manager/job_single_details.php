<style>
	.ewm_dpm_parent_user_wrapper_single{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
	}
	.ewm_dpm_top_user_header_single{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_user_content_single{

	}
	.ewm_dpm_user_table_list_single{
		margin-bottom:40px;
		margin-top:20px;
	}
	.ewm_dpm_single_cell_user_header_single{
		padding: 10px 25px;
		background-color: #13b184f2;
		border-radius: 4px;
		color: #ffff;
	}
	.ewm_dpm_single_cell_user_body_single{
		padding: 10px 15px;
		background-color:#458e941f;
		min-width:180px;
	}
	.ewm_dpm_single_cell_user_body_single_value{
		padding: 5px 15px;
		font-weight:bold;
		min-width:300px;
		border:1px solid #74af9a24;
	}
	.ewm_dpm_view_manage_user_button_single{
		background-color:#13b97d;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_new_single_user_button_single{
		background-color:white;
		padding: 5px 50px;
		font-size: 15px;
		color:white;
		border: 1px #33333340 solid;
		color:#333;
		cursor: pointer;
		border-radius:4px;
		float:right;
		margin:30px 5px;
	}
	.ewm_dpm_top_menu_area_user_single{
		width:100%;
		overflow: auto !important;
	}
	.ewm_dpm_single_cell_user_description_single{
		font-size:10px;
	}
</style>

<style>

.ewm_dpm_single_user_wrapper{
	margin: 20px;
	box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
}

</style>

<div class="ewm_dpm_single_user_wrapper">
	
	<?php

		$get_userdata = get_userdata(
			$_GET['single_user_id'] 
		);
		
	?>

	<?php
		$single_user_list = [
			'User ID' => '#'.$get_userdata->data->ID ,
			'Full Name' => $get_userdata->data->display_name .' ('. $get_userdata->data->user_login .') ' ,
			'Email' =>  $get_userdata->data->user_email, 
			'User URL' => $get_userdata->data->user_url, 
			'Registration Date' => $get_userdata->data->user_registered, 					
		];
			
		foreach( $single_user_list as $su_key => $su_value ){ 
			echo $su_key . ' | ';
		} 
		$user_additional_data = [
			"switch_themes" => ['title'=>"Switch Themes"],
			"edit_themes" => ['title'=>"Edit Themes"],
			"activate_plugins" => ['title'=>"Activate Plugins"],
			"edit_plugins" => ['title'=>"Edit Plugins"],
			"edit_users" => ['title'=>"Edit Users"],
			"edit_files" => ['title'=>"Edit Files"],
			"manage_options" => ['title'=>"Manage Options"], 
			"moderate_comments"=> ['title'=>"Moderate Comments"],
			"manage_categories" => ['title'=>"Manage Categories"],
			"manage_links"=> ['title'=>"Manage Links"],
			"upload_files"=> ['title'=>"Upload Files"],
			"import" =>  ['title'=>"Import"],
			"unfiltered_html" => ['title'=>"Unfiltered HTML"],
			"edit_posts" => ['title'=>"Edit Posts"],
			"edit_others_posts" => ['title'=>"Edit Others Posts"], 
			"edit_published_posts" => ['title'=>"Edit Published Posts"],
			"publish_posts" => ['title'=>"Publish Posts"],
			"edit_pages" => ['title'=>"Edit Pages"],
			"read" => ['title'=>"Read"],
			"edit_others_pages" => ['title'=>"Edit Others Pages"],
			"edit_published_pages"=> ['title'=>"Edit Published Pages"],
			"publish_pages" => ['title'=>"Publish Pages"],
			"delete_pages" => ['title'=>"Delete Pages"],
			"delete_others_pages" => ['title'=>"Delete Others Pages"],
			"delete_published_pages" => ['title'=>"Delete Published Pages"],
			"delete_posts" => ['title'=>"Delete Posts"],
			"delete_others_posts" => ['title'=>"Delete Others Posts"],
			"delete_published_posts" => ['title'=>"Delete Published Posts"],
			"delete_private_posts"=> ['title'=>"Delete Private Posts"],
			"edit_private_posts"=> ['title'=>"Edit Private Posts"],
			"read_private_posts"=> ['title'=>"Read Private Posts"],
			"delete_private_pages" => ['title'=>"Delete Private Pages"],
			"edit_private_pages" => ['title'=>"Edit Private Pages"],
			"read_private_pages" => ['title'=>"Read Private Pages"],
			"delete_users"=> ['title'=>"Delete Users"],
			"create_users"=> ['title'=>"Create Users"],
			"unfiltered_upload"=> ['title'=>"Unfiltered Upload"],
			"edit_dashboard"=> ['title'=>"Edit Dashboard"],
			"update_plugins"=> ['title'=>"Update Plugins"],
			"delete_plugins"=> ['title'=>"Delete Plugins"],
			"install_plugins" => ['title'=>"Install Plugins"],
			"update_themes" => ['title'=>"Update Themes"],
			"install_themes"=> ['title'=>"Install Themes"],
			"update_core"=> ['title'=>"Update Core"],
			"list_users"=> ['title'=>"List Users"],
			"remove_users"=> ['title'=>"Remove Users"],
			"promote_users" => ['title'=>"Promote Users"],
			"edit_theme_options"=> ['title'=>"Edit Theme Options"],
			"delete_themes" => ['title'=>"Delete Themes"],
			"export"=> ['title'=>"Export"],
			"manage_woocommerce" => ['title'=>"Manage Woocommerce"],
			"view_woocommerce_reports"=> ['title'=>"View Woocommerce Reports"],
			"edit_product"=> ['title'=>"Edit Product"],
			"read_product" => ['title'=>"Read Product"],
			"delete_product"=> ['title'=>"Delete Product"],
			"edit_products"=> ['title'=>"Edit Products"],
			"edit_others_products"=> ['title'=>"Edit Others Products"],
			"publish_products"=> ['title'=>"Publish Products"],
			"read_private_products"=> ['title'=>"Read Private Products"],
			"delete_products"=> ['title'=>"Delete Products"],
			"delete_private_products"=> ['title'=>"Delete Private Products"],
			"delete_published_products"=> ['title'=>"Delete Published Products"],
			"delete_others_products"=> ['title'=>"Delete Others Products"],
			"edit_private_products"=> ['title'=>"Edit Private Products"],
			"edit_published_products"=> ['title'=>"Edit Published Products"],
			"manage_product_terms" => ['title'=>"Manage Product Terms"],
			"edit_product_terms" => ['title'=>"Edit Product Terms"],
			"delete_product_terms"=> ['title'=>"Delete Product Terms"],
			"assign_product_terms" => ['title'=>"Assign Product Terms"],
			"edit_shop_order"=> ['title'=>"Edit Shop Order"],
			"read_shop_order" => ['title'=>"Read Shop Order"],
			"delete_shop_order"=> ['title'=>"Delete Shop Order"],
			"edit_shop_orders"=> ['title'=>"Edit Shop Orders"],
			"edit_others_shop_orders"=> ['title'=>"Edit Others Shop Orders"],
			"publish_shop_orders"=> ['title'=>"Publish Shop Orders"],
			"read_private_shop_orders"=> ['title'=>"Read Private Shop Orders"],
			"delete_shop_orders"=> ['title'=>"Delete Shop Orders"],
			"delete_private_shop_orders"=> ['title'=>"Delete Private Shop Orders"],
			"delete_published_shop_orders"=> ['title'=>"Delete Published Shop Orders"],
			"delete_others_shop_orders"=>  ['title'=>"Delete Others Shop Orders"],
			"edit_private_shop_orders"=>  ['title'=>"Edit Private Shop Orders"],
			"edit_published_shop_orders" =>  ['title'=>"Edit Published Shop Orders"],
			"manage_shop_order_terms"=>  ['title'=>"Manage Shop Order Terms"],
			"edit_shop_order_terms"=>  ['title'=>"Edit Shop Order Terms"],
			"delete_shop_order_terms"=>  ['title'=>"Delete Shop Order Terms"],
			"assign_shop_order_terms"=>  ['title'=>"Assign Shop Order Terms"],
			"edit_shop_coupon"=> ['title'=>"Edit Shop Coupon"],
			"read_shop_coupon"=> ['title'=>"Read Shop Coupon"],
			"delete_shop_coupon"=> ['title'=>"Delete Shop Coupon"],
			"edit_shop_coupons"=> ['title'=>"Edit Shop Coupons"],
			"edit_others_shop_coupons"=> ['title'=>"Edit_others_shop_coupons"],
			"publish_shop_coupons"=> ['title'=>"Publish Shop Coupons"],
			"read_private_shop_coupons" => ['title'=>"Read Private Shop Coupons"],
			"delete_shop_coupons" => ['title'=>"Delete Shop Coupons"],
			"delete_private_shop_coupons" => ['title'=>"Delete Private Shop Coupons"],
			"delete_published_shop_coupons" => ['title'=>"Delete Published Shop Coupons"],
			"delete_others_shop_coupons" => ['title'=>"Delete Others Shop Coupons"],
			"edit_private_shop_coupons"=> ['title'=>"Edit Private Shop Coupons"],
			"edit_published_shop_coupons"=> ['title'=>"Edit Published Shop Coupons"],
			"manage_shop_coupon_terms"=> ['title'=>"Manage Shop Coupon Terms"],
			"edit_shop_coupon_terms"=> ['title'=>"Edit Shop Coupon Terms"],
			"delete_shop_coupon_terms"=> ['title'=>"Delete Shop Coupon Terms"],
			"assign_shop_coupon_terms"=> ['title'=>"Assign Shop Coupon Terms"],
			"mailpoet_access_plugin_admin"=> ['title'=>"Mailpoet Access Plugin Admin"],
			"mailpoet_manage_settings"=> ['title'=>"Mailpoet Manage Settings"],
			"mailpoet_manage_features" => ['title'=>"Mailpoet Manage Features"],
			"mailpoet_manage_emails" => ['title'=>"Mailpoet Manage Emails"],
			"mailpoet_manage_subscribers" => ['title'=>"Mailpoet Manage Subscribers"],
			"mailpoet_manage_forms"=> ['title'=>"Mailpoet Manage Forms"],
			"mailpoet_manage_segments"=> ['title'=>"Mailpoet Manage Segments"],
			"mailpoet_manage_automations" => ['title'=>"Mailpoet Manage Automations"],
			"administrator"=> ['title'=>"Administrator"],
		];
	
		$user_order_p = get_post($_GET['single_user_id']);

	?>

<div class="ewm_dpm_parent_user_wrapper_single">

	<div class="ewm_dpm_top_user_header_single">
		<center><?php echo $single_order_p->post_title ; ?></center>
	</div>
	<div class="ewm_dpm_top_menu_area_user_single">
		
	</div>

	<div class="ewm_dpm_main_user_content_single">

	<center>
		<table class="ewm_dpm_user_table_list_single">
			<thead>
				<td class="ewm_dpm_single_cell_user_header_single">
					<center>Title</center>
				</td>
				<td class="ewm_dpm_single_cell_user_header_single">
					<center>Value</center>
				</td>
				
			</thead>
			<tbody>
				<?php

				$single_user_p_meta = get_post_meta( $single_user_p->ID );
				// TODO: do a var dump here and connect to the for each
				
					foreach( $user_additional_data as $um_key => $um_value ) {
				
						$get_userdata_allcaps = $get_userdata->allcaps;
				
						$_userdata_allcaps_v = array_key_exists( $um_key , $get_userdata_allcaps ) ? $get_userdata_allcaps[ $um_key ] : '' ;
				
						if( is_bool( $_userdata_allcaps_v ) ){
				
						}
					
						echo '
							<tr>
								<td class="ewm_dpm_single_cell_order_body_single">' . 
									$um_value["title"] . '
								</td>
								<td class="ewm_dpm_single_cell_order_body_single_value">' 
									. $_userdata_allcaps_v . '
								</td>
								<td><input type="button" value="edit"></td>
							</tr>';
					
					}
				
					?>
				
					</table>
				</div>
			</tbody>
		</table>
	</center>
	</div>

</div>

