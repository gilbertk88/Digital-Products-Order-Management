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
	$ewm_dpm_pt = get_posts($args);

	$_single_product = get_post( $_GET['edit_task_single_product_id'] );

?>

<div class="ewm_dpm_parent_pt_wrapper">

	<div class="ewm_dpm_top_pt_header">
		<center>Product: <?php echo $_single_product->post_title .' (#'.$_GET['edit_task_single_product_id'] .') '; ?></center>
	</div>
	<input type="hidden" name="ewm_product_id" id="ewm_product_id" value="<?php echo $_GET['edit_task_single_product_id']; ?>">

	<?php 
		// Update the post meta 
        $pt_tasks = maybe_unserialize( get_post_meta( $_GET['edit_task_single_product_id'] , 'pt_tasks' , true ) );
    ?>
	
	<div class="ewm_dpm_top_menu_area_pt">
	</div>

	<div class="ewm_dpm_main_pt_content">

		<table class="ewm_dpm_pt_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_pt_header">
					<center>Select the Tasks Here </center>
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
					<center>Task Title</center>
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
					<center>Task Description</center>
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
					<center>Duration</center>
				</td>				
			</thead>
			<tbody>
				<?php
				foreach ( $ewm_dpm_pt as $row => $data_pt ) {

					$user_data_pt = get_userdata( $data_pt->post_author );
					$f_pt_q = get_post_meta( $data_pt->ID, 'ewm_tast_quantity', true );

					$dpm_task_title = get_post_meta( $data_pt->ID, 'dpm_task_title' , true );
					$dpm_task_description = get_post_meta( $data_pt->ID, 'dpm_task_description'  , true );
					$dpm_task_days_to_deliver = get_post_meta( $data_pt->ID, 'dpm_task_days_to_deliver'  , true );

					$s_checked = 'false';
					if( is_array( $pt_tasks ) ) {
						if( array_key_exists( $data_pt->ID , $pt_tasks ) ){
							$s_checked =  $pt_tasks[$data_pt->ID] ;
						}
					}
					$s_checked_v = $s_checked == 'true' ? 'checked' : '' ;
					echo '
						<tr>
							<td class="ewm_dpm_single_cell_pt_body">
								<center>
									<input type="checkbox" data-pt-id="'. $data_pt->ID .'" class="ewm_dpm_checklist_pt_input" '. $s_checked_v .'>
								</center>
							</td>
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_f_'. $data_pt->ID .'">
								<center>'.$dpm_task_title .'</center>
							</td>
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_fd_'. $data_pt->ID .'">
								<center>'.$dpm_task_description.'</center>
							</td>
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_q_'. $data_pt->ID .'">
								<center>'.$dpm_task_days_to_deliver.'</center>
							</td>
						</tr>';
				
				}
				?>
			</tbody>
		</table>

	</div>

</div>
