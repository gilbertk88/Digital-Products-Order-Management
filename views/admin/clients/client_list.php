<style>
	.ewm_dpm_users_main_wrapper{
		width: 95%;
		margin: 20px;
		background: #fff;
		border-radius: 5px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
		padding: 40px 0px;
	}
	.ewm_dpm_top_menu_list{
		width:80%;
		overflow: auto;
		margin-bottom: 30px;
	}
	.ewm_dpm_filter_single_user_item{
		float: left;
		margin-right: 1px;
		border: #cccccc4a 1px solid;
		padding: 5px 25px;
		border-radius: 0px;
		min-width: 200px;
	}
	.ewm_dpm_single_cell_user_header {
		padding: 5px 15px;
		background-color: #cccccc30;
		border-radius: 5px;
		min-width: 230px;
	}
	.ewm_dpm_single_cell_user_body {
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_user_button {
		background-color: #2ea7d3;
		padding: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
	}
	.ewm_dpm_top_user_header {
		padding: 20px 0px;
		font-size: 18px;
		font-weight: bold;
	}
	.ewm_dpm_top_body_list{
		padding: 0px 100px;
	}
	.ewm_dpm_user_active{
		background-color: #039bb8;
		color: white;
		cursor: pointer;
	}
	.ewm_dpm_user_inactive{
		background: #dcdcdc1c;
		cursor: pointer;
	}
	.ewm_dpm_add_new_client{
		background-color: #2ea7d3;
		padding: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
		float: right;
	}
	.table-client-list{
		width: 100%;
	}
</style>
<div class="ewm_dpm_users_main_wrapper">
	<div class="ewm_dpm_top_user_header">
		<center>Clients</center>
	</div>
	<?php
		$_user_selection = 'ewmdsm_client';
		$ewmdsm_all_class 		= 'ewmdsm_all' == $_user_selection ? 'ewm_dpm_user_active':'ewm_dpm_user_inactive';
		$administrator_class 	= 'administrator' == $_user_selection ? 'ewm_dpm_user_active':'ewm_dpm_user_inactive';
		$ewmdsm_client_class 	= 'ewmdsm_client' == $_user_selection ? 'ewm_dpm_user_active':'ewm_dpm_user_inactive';
		$ewmdsm_freelancer_class = 'ewmdsm_freelancer' == $_user_selection ? 'ewm_dpm_user_active':'ewm_dpm_user_inactive';
	?>

	<center>
		<div class="ewm_dpm_top_menu_list">
			<input type="button" value="Create Client" class="ewm_dpm_add_new_client">
		</div>
	</center>

	<div class="ewm_dpm_top_body_list">
		<?php
			$data_list = get_users(array(  
				'number' => '5000' ,
				'role__in' => array( 'ewmdsm_client' ) 
			));			
		?>
		<table class="table-client-list table-striped table-hover">
			<thead>
				<tr>
					<td class="ewm_dpm_single_cell_user_header"> <center> Username </center> </td>
					<td class="ewm_dpm_single_cell_user_header"> <center> Email </center> </td>
					<td class="ewm_dpm_single_cell_user_header"> <center></center> </td>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data_list as $u_key => $u_value){
					$wp_workshop_1_capabilities = get_user_meta( $u_value->data->ID , 'wp_workshop_1_capabilities' );
					$ewmdpm_userrole = [];
					
					$ewm_dpm_r_list = [
						'client' => false,
						'admin' => false,
						'freelancer' => false,
					];
					
					if( array_key_exists( "ewmdsm_client", $wp_workshop_1_capabilities[0] ) ) {

						if($wp_workshop_1_capabilities[0]['ewmdsm_client']){
							array_push( $ewmdpm_userrole , 'Client' );
							$ewm_dpm_r_list['client'] = true;
						}
					}

					if( array_key_exists( "administrator", $wp_workshop_1_capabilities[0] ) ) {
						if($wp_workshop_1_capabilities[0]['administrator']){
							array_push( $ewmdpm_userrole , 'Admin' );
							$ewm_dpm_r_list['admin'] = true;
						}
					}

					if( array_key_exists( "ewmdsm_freelancer", $wp_workshop_1_capabilities[0] ) ) {
						if($wp_workshop_1_capabilities[0]['ewmdsm_freelancer']){
							array_push( $ewmdpm_userrole , 'Freelancers' );
							$ewm_dpm_r_list['freelancer'] = true;							
						}
					}

					if( array_key_exists('ewm_user_type', $_GET )){
						// filter out
					}
					
				?>
				<tr>
					<td class="ewm_dpm_single_cell_user_body"><?php echo '#'.$u_value->data->ID .': '. $u_value->data->display_name .' ('. $u_value->data->user_login.')' ; ?></td>
					<td class="ewm_dpm_single_cell_user_body"><?php echo $u_value->data->user_email ; ?></td>
					<td class="ewm_dpm_single_cell_user_body">
						<center>
							<input type="button" class="ewm_dpm_view_manage_user_button" value="Open" data-ewm-client-id="<?php echo $u_value->data->ID ; ?>">
						</center>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>

</div>

<?php
 	$client_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/clients/client_popup.php';
 	require  $client_list_url;
?>
