<style>
	.ewm_dpm_parent_ticket_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin: 30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_ticket_header{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_ticket_content{

	}
	.ewm_dpm_ticket_table_list{

	}
	.ewm_dpm_single_cell_ticket_header{
		padding: 15px;
		background-color:#cccccc30;
		border-radius:5px;
		min-width:140px;
	}
	.ewm_dpm_single_cell_ticket_body{
		padding: 5px 30px;
	}
	.ewm_dpm_view_manage_ticket_button{		
		background-color: #2ea7d3 !important;
		padding: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
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
				<td class="ewm_dpm_single_cell_ticket_header">
				</td>
			</thead>
			<tbody>
				<?php

				foreach ( $ewm_dpm_ticket as $row => $data ) {						
					$user_data = get_userdata( $data->post_author );
					$comment_args = [
						'page'=> $data->ID ,
					];
					$ewm_dpm_ticket_status_final = 'New';
 					$ewm_dpm_ticket_status = get_post_meta( $data->ID, 'ewm_dpm_ticket_status', true );

					if( strlen( $ewm_dpm_ticket_status ) > 0 ){
						$ewm_dpm_ticket_status_final = $ewm_dpm_ticket_status ;
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
								'. ucfirst($ewm_dpm_ticket_status_final) .'
							</td>
							<td class="ewm_dpm_single_cell_ticket_body">
								'. $data->post_date .'
							</td>
							<td class="ewm_dpm_single_cell_ticket_body"> 
								<input type="button" value="Open" data-ticket-id="'. $data->ID .'" class="ewm_dpm_view_manage_ticket_button">
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
