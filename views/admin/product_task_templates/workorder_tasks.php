<style>
	.ewm_dpm_parent_pt_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_pt_header{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_pt_content{

	}
	.ewm_dpm_pt_table_list{

	}
	.ewm_dpm_single_cell_pt_header{
		padding: 5px 25px;
		background-color:#cccccc50;
		border-radius:4px;
		min-width: 250px;
	}
	.ewm_dpm_single_cell_pt_body{
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_pt_button{
		background-color:#039bb8;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_new_single_pt_button{
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
	.ewm_dpm_top_menu_area_pt{
		width:100%;
		overflow: auto !important;
	}
	.ewm_dpm_single_cell_pt_description{
		font-size:10px;
	}
</style>
<?php

	$args = array(
        'numberposts' => 900,
        'post_type'   => 'ewm_tasks',
		'post_status' => 'active',
    );

	// Replace feature post type
	$ewm_dpm_pt = get_posts( $args );

?>

<div class="ewm_dpm_parent_pt_wrapper">

	<div class="ewm_dpm_top_pt_header">
		<center>Product Tasks</center>
	</div>
	<div class="ewm_dpm_top_menu_area_pt">
		<a href="#" >
			<input type="button" value="New Task" class="ewm_dpm_new_single_pt_button">
		</a>
	</div>

	<div class="ewm_dpm_main_pt_content">
		<table class="ewm_dpm_pt_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_pt_header">
					Task
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
					Task Description
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
					Deadline Period in Days
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
				</td>
			</thead>
			<tbody>
				<?php

				foreach ( $ewm_dpm_pt as $row => $data_pt ) {
						
					$user_data_pt = get_userdata( $data_pt->post_author );

					$dpm_task_title = get_post_meta( $data_pt->ID, 'dpm_task_title', true);
					$dpm_task_description = get_post_meta( $data_pt->ID, 'dpm_task_description', true);
					$dpm_task_days_to_deliver = get_post_meta( $data_pt->ID, 'dpm_task_days_to_deliver', true);
    
					echo '
						<tr>
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_t_'. $data_pt->ID .'">
								'.$dpm_task_title .'
							</td>
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_td_'. $data_pt->ID .'">
								'.$dpm_task_description.'
							</td>
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_d_'. $data_pt->ID .'">
								'.$dpm_task_days_to_deliver.'
							</td>
							<td class="ewm_dpm_single_cell_pt_body"> 
								<center>
									<input type="button" value="Edit" data-pt-id="'. $data_pt->ID .'" class="ewm_dpm_view_manage_pt_button">
								</center>
							</td>
						</tr>';
				
				}
				?>
			</tbody>
		</table>

	</div>

</div>

<?php

	include_once THEMOSIS_PUBLIC_DIR . '/views/admin/product_task_templates/workorder_tasks_popup.php';

?>