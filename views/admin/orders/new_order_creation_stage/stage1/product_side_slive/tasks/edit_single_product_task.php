<?php
	// Replace feature post type
	$ewm_dpm_pt = get_posts( $args );
	$_single_product = get_post( $value_t['id'] );
?>
<div class="form-group_all task-group_<?php echo $value_t['id']; ?> ">
<div class="ewm_dpm_parent_pt_wrapper">
	<div class="ewm_dpm_top_pt_header">
		<center>Tasks for: Product <?php echo $_single_product->post_title .' (#'.$value_t['id'] .') '; ?></center>
	</div>
	<input type="hidden" name="ewm_product_id" id="ewm_product_id" value="<?php echo $value_t['id']; ?>">
	<?php
		$work_order_data_id = EwmDpm\Hooks\MyUser::get_dpm_data_post([
			'product_id'=> $value_t['id'],
			'order_id'  => $_GET['single_order_id']
		] );

		// Update the post meta 
        $pt_tasks = maybe_unserialize( get_post_meta( $work_order_data_id , 'pt_tasks' , true ) );
		if( !is_array($pt_tasks) ){
			$pt_tasks=[];
		}		

		$ewm_a_task = get_posts( [
			'post_type'=>'ewm_a_task',
			'post_status'=>'active',
			'meta_query' => [
                'relation' => 'AND',
                [
                    'key'     => 'task_order_id',
                    'value'   => $_GET['single_order_id'],
                    'compare' => '=',
                ],
				[
                    'key'     => 'task_product_id',
                    'value'   => $value_t['id'],
                    'compare' => '=',
                ],
            ]
		] );

		$meta_query_args  = [
			'relation' => 'AND',
			[
				'key'     => 'task_order_id',
				'value'   => $_GET['single_order_id'],
				'compare' => 'LIKE',
			],
			[
				'key'     => 'task_product_id',
				'value'   => $value_t['id'],
				'compare' => 'LIKE',
			]
		];

		$ewm_a_task = get_posts( [
			'post_type'		=>'ewm_a_task',
			'post_status'	=>'active',
			'meta_query' 	=> $meta_query_args
		] );
		
	/*
		foreach( $ewm_a_task as $k_t => $k_v ){		
			var_dump( get_post_meta( $k_v->ID ) );
			echo '<br><br>';
		}
	*/
		// $meta_query_t = new WP_Meta_Query( $meta_query_args );
		// var_dump( $meta_query_t );
		// var_dump( $_GET['single_order_id'] );
		// var_dump( $ewm_a_task );
		// echo '<br><br>';
		// var_dump( $ewm_a_task[0]->ID );
		// echo '<br><br>';
		// var_dump( $value_t );
		// echo '<br><br>';
		// var_dump( get_post_meta( $ewm_a_task[0]->ID ) );

    ?>
	<div class="ewm_dpm_top_menu_area_pt">
		<input type="button" value="Create Task" class="ewm_dpm_create_task_b">
	</div>
	<div class="ewm_dpm_main_pt_content">
		<table class="ewm_dpm_pt_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_pt_header">
					<center>Task Title</center>
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
					<center>Task Description</center>
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
					<center>Status</center>
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
					<center>Due date</center>
				</td>
				<td class="ewm_dpm_single_cell_pt_header">
				</td>
			</thead>
			<tbody>

				<?php
				$dpm_task_status_arr = [
					"new_task" 				=>'New Task',
					"assigned_inprogress"	=>'Assigned(In Progress)',
					"complete"				=>'Completed'
				];
				
				foreach ( $ewm_a_task as $task_id => $data_pt ) {

					// $pt_tasks
					$post_task  = get_post( $task_id );
					$dpm_task_title = $data_pt->post_title  ;//$post_task->post_title ;
					$dpm_task_description = $data_pt->post_content ;//$post_task->post_content ;
					$dpm_task_due_date = get_post_meta( $data_pt->ID , 'task_due_date' , true );
					$dpm_task_status = get_post_meta( $data_pt->ID , 'task_status' , true );
					$task_id = $data_pt->ID;
					$status_ewm = 'Unset';
					
					if( isset( $dpm_task_status ) ){
						if (strlen($dpm_task_status) > 0) {
							$status_ewm = $dpm_task_status_arr[ $dpm_task_status ];
						}
					}

					echo '
						<tr class="ewm_dpm_delete_task_'. $task_id .'" >
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_t_'. $task_id .'">
								<center>'. $dpm_task_title .'</center>
							</td>
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_c_'. $task_id .'">
								<center>'. $dpm_task_description .'</center>
							</td>
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_s_'. $task_id .'">
								<center>'.$status_ewm.'</center>
							</td>
							<td class="ewm_dpm_single_cell_pt_body" id="ewm_dpm_pt_dd_'. $task_id .'">
								<center>'. $dpm_task_due_date .'</center>
							</td>
							<td class="ewm_dpm_single_cell_pt_body">
								<center>
									<input type="button" value="Open" data-pt-id="'. $task_id.'" data-data_post_id="'. $task_id .'" class="ewm_dpm_checklist_pt_input_wo" >
									<input type="button" value="Delete" data-pt-id="'. $task_id.'" data-data_post_id="'. $task_id .'" class="ewm_dpm_checklist_pt_delete_wo" >
								</center>
							</td>
						</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</div>
