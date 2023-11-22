<style>
.ewm_dpm_ticket_summary_sub{
	border:1px solid #cccccc70;
	border-radius: 5px;
	box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
}
.ewm_dpm_ticket_title{
	font-size:22px;
	width:100%;
	padding:25px;
}
.ewm_dpm_single_tkt_view{
	border:0px !important;
	cursor:pointer !important;
	background: cornflowerblue !important;
    color: #fff !important;
    border-radius: 5px !important;
    padding: 3px 30px !important;
}
.ewm_dpm_f_numb_item_tkt{
    padding-left: 30px;
}
</style>

<?php

$args = array(
	'numberposts'   => 900,
	'post_type'     => 'ewm_dpm_ticket',
	"post_status"   => "publish" 
);

$ewm_dpm_tickets = get_posts( $args );

?>

<div class="ewm_dpm_ticket_summary_sub">

	<div class="ewm_dpm_ticket_title"><center> Active Tickets</center></div>

	<table>
		<thead>
			<td>Ticket Id</td>
			<td>Ticket Date</td>
			<td>Ticket Status</td>
			<td></td>
		</th>
		<tbody>
		<?php

			$ewm_dpm_tickets  = array_reverse( $ewm_dpm_tickets, true );

			$tkt_tech_count = 0;

			foreach( $ewm_dpm_tickets as $key_ticket => $value_ticket ) {

				if( $tkt_tech_count > 4 ){

					continue;
					
				}

				$order_statuses_l = [
					'new'    	=> 'New',
					'progress' 	=> 'In Progress',
					'resolved'	=> 'Resolved',
				];

				$ewm_dpm_ticket_status = get_post_meta( $value_order->ID, 'ewm_dpm_ticket_status', true );

				if( strlen( $ewm_dpm_ticket_status ) == 0 ){
					$active_ticket_status = 'new';
				}
				else{
					$active_ticket_status = $ewm_dpm_ticket_status;
				}

				echo '<tr>
					<td class="ewm_dpm_f_numb_item_tkt" > #'. $value_ticket->ID .' </td>
					<td> '. $value_ticket->post_date .' </td>
					<td> '. $order_statuses_l[$active_ticket_status] .' </td>
					<td> <input type="button" class="ewm_dpm_single_tkt_view" value="View" data-single-tkt="'. $value_ticket->ID .'"> </td>
				</tr>';

				$tkt_tech_count++;
			}

		?>
		</tbody>
	</table>
</div>
