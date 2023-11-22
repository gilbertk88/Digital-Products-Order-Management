<style>
	.ewm_dpm_parent_pfs_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_pfs_header{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_pfs_content{

	}
	.ewm_dpm_pfs_table_list{

	}
	.ewm_dpm_single_cell_pfs_header{
		padding: 8px 15px;
		background-color: #3c434a;
		border-radius: 4px;
		min-width: 250px;
		color: #fff;
	}
	.ewm_dpm_single_cell_pfs_body{
		padding: 10px 15px;
	}
	.ewm_dpm_view_manage_pfs_button{
		background-color:#039bb8;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_new_single_pfs_button{
		background-color:#007e55 !important;
		padding: 5px 50px;
		font-size: 15px;
		color:white !important;
		border: 1px #cccccc50 solid;
		cursor: pointer;
		border-radius:5px;
		float:right;
		margin:30px 5px;
		box-shadow: 0 5px 8px 0 rgb(180 178 178 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_menu_area_pfs{
		width:100%;
		overflow: auto !important;
	}
	.ewm_dpm_single_cell_pfs_description{
		font-size:10px;
	}
</style>
<?php

	$args = array(
        'numberposts' => 900,
        'post_type'   => 'ewm_feature',
		'post_status' => 'active',
    );

	// Replace feature post type
	$ewm_dpm_pfs = get_posts($args);

	$_single_product = get_post( $_GET['edit_single_product_id'] );

?>

<div class="ewm_dpm_parent_pfs_wrapper">

	<div class="ewm_dpm_top_pfs_header">
		<center>Product: <?php echo $_single_product->post_title .' (#'.$_GET['edit_single_product_id'] .') '; ?></center>
	</div>
	<input type="hidden" name="ewm_product_id" id="ewm_product_id" value="<?php echo $_GET['edit_single_product_id']; ?>">

	<?php 
		// Update the post meta 
        $pfs_features = maybe_unserialize( get_post_meta( $_GET['edit_single_product_id'] , 'pfs_features' , true ) );
    ?>
	
	<div class="ewm_dpm_top_menu_area_pfs">
	</div>

	<div class="ewm_dpm_main_pfs_content">

		<table class="ewm_dpm_pfs_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_pfs_header">
					<center>Select the Feature Here </center>
				</td>
				<td class="ewm_dpm_single_cell_pfs_header">
					<center>Feature</center>
				</td>
				<td class="ewm_dpm_single_cell_pfs_header">
					<center>Feature Description</center>
				</td>
				<td class="ewm_dpm_single_cell_pfs_header">
					<center>Quantity</center>
				</td>				
			</thead>
			<tbody>
				<?php
				foreach ( $ewm_dpm_pfs as $row => $data_pfs ) {	
					$user_data_pf = get_userdata( $data_pfs->post_author );
					$f_pfs_q = get_post_meta( $data_pfs->ID, 'ewm_feature_quantity', true);
					$s_checked = 'false';
					if( is_array( $pfs_features ) ) {
						if( array_key_exists( $data_pfs->ID , $pfs_features ) ){
							$s_checked =  $pfs_features[$data_pfs->ID] ;
						}
					}
					$s_checked_v = $s_checked == 'true' ? 'checked' : '' ;
					echo '
						<tr>
							<td class="ewm_dpm_single_cell_pfs_body">
								<center>
									<input type="checkbox" data-pfs-id="'. $data_pfs->ID .'" class="ewm_dpm_checklist_pfs_input" '. $s_checked_v .'>
								</center>
							</td>
							<td class="ewm_dpm_single_cell_pfs_body" id="ewm_dpm_pfs_f_'. $data_pfs->ID .'">
								<center>'.$data_pfs->post_title.'</center>
							</td>
							<td class="ewm_dpm_single_cell_pfs_body" id="ewm_dpm_pfs_fd_'. $data_pfs->ID .'">
								<center>'.$data_pfs->post_content.'</center>
							</td>
							<td class="ewm_dpm_single_cell_pfs_body" id="ewm_dpm_pfs_q_'. $data_pfs->ID .'">
								<center>'.$f_pfs_q.'</center>
							</td>
						</tr>';
				
				}
				?>
			</tbody>
		</table>

	</div>

</div>
