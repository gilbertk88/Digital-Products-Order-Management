<style>
.ewm_dpm_ticket_summary_sub{
	border:1px solid #80808026;
	border-radius:5px;
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

</style>
<?php

$post_author = get_current_user_id();

$args = array(
	'numberposts' 	=> 900,
	'post_type'   	=> 'ewm_dpm_ticket',
	'post_author'	=> $post_author
);

$ewm_dpm_ticket = get_posts( $args );

$ewm_dpm_ticket = array_reverse( $ewm_dpm_ticket );

?>
<div class="ewm_dpm_ticket_summary_sub">

	<div class="ewm_dpm_ticket_title"><center>Tickets</center></div>

	<table>
		<thead>
			<td>Ticket Id</td>
			<td>Ticket Date</td>
			<td>Ticket Status</td>
			<td></td>
		</th>
		<tbody>

		<?php 

			foreach( $ewm_dpm_ticket  as $key => $value ){

				$ewm_dpm_ticket_status = get_post_meta( $value->ID, 'ewm_dpm_ticket_status', true );

				$T_status_front = [
					"new" 		=> 'Submitted',
					"progress" 	=> 'We are working on it',
					"resolved" 	=> 'Resolved',
				];

				$status_details = 'Submitted';

				if( strlen( $ewm_dpm_ticket_status ) > 0 ){

					$status_details = $T_status_front[ $ewm_dpm_ticket_status ];

				}
				
				echo '<tr>
					<td> #'.$value->ID.' </td>
					<td> '.$value->post_modified_gmt.' </td>
					<td> '. $status_details .' </td>
					<td> <input type="button" class="ewm_dpm_single_tkt_view" value="View" data-single-tkt="'.$value->ID.'"> </td>
				</tr>';

			}

		?>
		</tbody>
	</table>
</div>
