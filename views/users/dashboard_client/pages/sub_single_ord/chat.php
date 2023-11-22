<style type="text/css">
	.ewm_dpm_ord_chat_f{
		width: 100%;
		padding: 20px;
	}
	.ewm_dpm_ord_chat_text_area{
		color:#333;
		width: 100%;
	}
	.ewm_dpm_single_tkt_line_{
		background-color: #fff !important;
		color: #333;
		padding: 3px 15px;
		font-weight: 350;
		font-size: 15px;
		border: 1px solid #80808046;
		margin: 5px;
		width: 100%;
		cursor: pointer;
		border-radius: 61px;
	}
	.ewm_dpm_new_tkt_line_{
		padding: 5px 10px !important;
		font-weight: 300;
		font-size: 15px;
		border: 1px solid blue;
		margin: 5px;
		width: 100%;
		cursor: pointer;
		color:#fff !important;
		border-radius: 5px !important;
		background: cornflowerblue !important;
	}
	.ewm_dpm_ord_chat_title_txt_{
		padding: 5px 13px;
		font-weight: 500;
		font-size: 16px;
		border: 0px solid gray;
		margin: 10px 0px;
		cursor: pointer;
	}
</style>
<div class="ewm_dpm_ord_chat_f">
	<div class="ewm_dpm_ord_chat_title_txt_"><center> Tickets </center></div>
	<div class="ewm_dpm_ord_chat_text_area">
		<?php
		/*
				$ewm_dpm_ord_tkt = [
					[
						'ticket_number' 	=> '#TKT3',
						'status' 			=> 'Open',
						'order_id'			=> '3',
					],
					[
						'ticket_number' 	=> '#TKT2',
						'status' 			=> 'Closed',
						'order_id'			=> '2',
					],
					[
						'ticket_number' 	=> '#TKT1',
						'status' 			=> 'Closed',
						'order_id'			=> '1',
					]
				];
		*/

        $args = array(
            'numberposts' => 900,
            'post_type'   => 'ewm_dpm_ticket',
			"post_parent" => $_GET['ord_id'],
        );

        $ewm_dpm_tickets = get_posts( $args );

		?>
		<div class="ewm_dpm_single_ticket">

			<?php

			$html_list = '';

			foreach (  $ewm_dpm_tickets as $ticket_single ){

				$ticket_code = 'new';

				$ticket_code_to_front = [
					'new'		=> 'Submitted',
					'progress'	=> 'In progress',
					'resolved'	=> 'Resolved',
				];

				$ticket_single_status =  get_post_meta( $ticket_single->ID, 'ewm_dpm_ticket_status', true );

				if( strlen( $ticket_single_status ) > 0 ){
					$ticket_code = $ticket_single_status ;
				}

				$ticket_single_status_name = $ticket_code_to_front[$ticket_code] ;

				$html_list .= '<div class="ewm_dpm_single_tkt_line_" data-single-ticket-id="'. $ticket_single->ID .'" data-single-ticket-status ="'.$ticket_single_status_name .' " >( #'. $ticket_single->ID .' - '.$ticket_single_status_name .') '.$ticket_single->post_title.' </div>';

			}

			echo $html_list;

			?>

		</div>

		<input type="button" name="id" value="Create a Ticket" class="ewm_dpm_new_tkt_line_">

	</div>

</div>