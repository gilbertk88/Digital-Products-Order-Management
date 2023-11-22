<style>
	.ewm_dpm_parent_pf_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_pf_header{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_pf_content{

	}
	.ewm_dpm_pf_table_list{

	}
	.ewm_dpm_single_cell_pf_header{
		padding: 5px 25px;
		background-color:#cccccc50;
		border-radius:4px;
		min-width: 250px;
	}
	.ewm_dpm_single_cell_pf_body{
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_pf_button{
		background-color:#039bb8;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_new_single_pf_button{
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
	.ewm_dpm_top_menu_area_pf{
		width:100%;
		overflow: auto !important;
	}
	.ewm_dpm_single_cell_pf_description{
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
	$ewm_dpm_pf = get_posts($args);

?>

<div class="ewm_dpm_parent_pf_wrapper">

	<div class="ewm_dpm_top_pf_header">
		<center>Product Features</center>
	</div>
	<div class="ewm_dpm_top_menu_area_pf">
		<a href="#" >
			<input type="button" value="New Feature" class="ewm_dpm_new_single_pf_button">
		</a>
	</div>

	<div class="ewm_dpm_main_pf_content">

		<table class="ewm_dpm_pf_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_pf_header">
					Feature
				</td>
				<td class="ewm_dpm_single_cell_pf_header">
					Feature Description
				</td>
				<td class="ewm_dpm_single_cell_pf_header">
					Quantity
				</td>
				<td class="ewm_dpm_single_cell_pf_header">
				</td>
			</thead>
			<tbody>
				<?php

				foreach ( $ewm_dpm_pf as $row => $data_pf ) {
						
					$user_data_pf = get_userdata( $data_pf->post_author );

					$f_pf_q = get_post_meta( $data_pf->ID, 'ewm_feature_quantity', true);

					echo '
						<tr>
							<td class="ewm_dpm_single_cell_pf_body" id="ewm_dpm_pf_f_'. $data_pf->ID .'">
								'.$data_pf->post_title.'
							</td>
							<td class="ewm_dpm_single_cell_pf_body" id="ewm_dpm_pf_fd_'. $data_pf->ID .'">
								'.$data_pf->post_content.'
							</td>
							<td class="ewm_dpm_single_cell_pf_body" id="ewm_dpm_pf_q_'. $data_pf->ID .'">
								'.$f_pf_q.'
							</td>
							<td class="ewm_dpm_single_cell_pf_body"> 
								<center><input type="button" value="Manage" data-pf-id="'. $data_pf->ID .'" class="ewm_dpm_view_manage_pf_button"></center>
							</td>
						</tr>';
				
				}
				?>
			</tbody>
		</table>

	</div>

</div>

<?php

	include_once THEMOSIS_PUBLIC_DIR . '/views/admin/products/product_feature_popup.php';

?>