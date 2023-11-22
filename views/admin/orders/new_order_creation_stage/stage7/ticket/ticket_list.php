<style>
	.ewm_dpm_parent_ticket_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_ticket_header{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_ticket_content{}
	.ewm_dpm_ticket_table_list{}
	.ewm_dpm_single_cell_ticket_header{
		padding: 5px 30px;
		background-color:#cccccc30;
		border-radius:5px;
		min-width:100px;
	}
	.ewm_dpm_single_cell_ticket_body{
		padding: 5px 30px;
	}
	.ewm_dpm_view_manage_ticket_button{
		background-color:#646970;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:34px;
	}
</style>

<div class="ewm_dpm_parent_ticket_wrapper">
	<div class="ewm_dpm_top_ticket_header">
		<center>Ticket List</center>
	</div>
	<div class="ewm_dpm_main_ticket_content">
		<table class="ewm_dpm_ticket_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_ticket_header">
					Client
				</td>
				<td class="ewm_dpm_single_cell_ticket_header"> 
					Ticket Number
				</td>
				<td class="ewm_dpm_single_cell_ticket_header"> 
					Order Number (Status)
				</td>
				<td class="ewm_dpm_single_cell_ticket_header">
					Status
				</td>
				<td class="ewm_dpm_single_cell_ticket_header">
					Creation Time
				</td>
			</thead>
			<tbody>
				<?php
				$ewm_dpm_ticket = get_posts([
					'numberposts' => 900,
					"post_status" => "publish",
					"post_parent" => $_GET['single_order_id'],
					"post_type"   => "ewm_dpm_ticket",
				]);

				foreach ( $ewm_dpm_ticket as $row => $data ) {
						
					$user_data = get_userdata( $data->post_author );

					$comment_args = [
						'page'=> $data->ID,
					];

					// $comment_args_data = wp_list_comments( $comment_args );
					/*$comments_list = get_comments([
						'orderby'   => 'comment_date_gmt',
						'order'   	=> 'ASC', //'DESC'.
						'post_id'	=> $data->ID
					]);

					foreach ($comments_list as $key => $comment){

						var_dump( $comment );

						echo "<br><br>=============================<br><br>";

					}

					*/

					$ewm_dpm_ticket_status_final = 'New';

 					$ewm_dpm_ticket_status = get_post_meta( $data->ID, 'ewm_dpm_ticket_status', true );

					if( strlen( $ewm_dpm_ticket_status ) ){
						$ewm_dpm_ticket_status_final = 'New';
					}

					echo '
						<tr>
							<td class="ewm_dpm_single_cell_ticket_body">
								'. $user_data->data->display_name .' ('.$user_data->data->user_login.')
							</td>
							<td class="ewm_dpm_single_cell_ticket_body">
								#'. $data->ID .'
							</td>
							<td class="ewm_dpm_single_cell_ticket_body">
								#'. $data->post_parent .'
							</td>
							<td class="ewm_dpm_single_cell_ticket_body">
								'.$ewm_dpm_ticket_status_final.'
							</td>
							<td class="ewm_dpm_single_cell_ticket_body">
								'. $data->post_date .'
							</td>
							<td class="ewm_dpm_single_cell_ticket_body"> 
								<input type="button" value="Manage" data-ticket-id="'. $data->ID .'" class="ewm_dpm_view_manage_ticket_button">
							</td>
						</tr>';
				
				}
				?>
			</tbody>
		</table>

	</div>

</div>

<?php

	include_once THEMOSIS_PUBLIC_DIR . '/views/admin/tickets/ticket_edit_popup.php';

?>
