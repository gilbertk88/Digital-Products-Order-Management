<style type="text/css">
	.ewm_dpm_popup_ticket_{
		padding:15px;
		background:#fff;
		color:white;
		width:100%;
		height:100%;
		overflow:auto;
	}
	.ewm_dpm_second_line_det{
		font-size:10px;
		color:#333;
	}
	.ewm_dpm_popup_ticket_inner{
		background-color:white;
		border-radius: 10px;
		width:100%;
		height:100%;
		color:gray;
	}
	.ewm_dpm_popup_ticket_head_title{
		padding:20px;
		font-size:18px;
	}
	.ewm_dpm_popup_ticket_head_menu_list{
		width: 100%;
		padding: 8px 0px 35px 26px;
		overflow: auto;
	}
	.ewm_dpm_ticket_menu_items{
		float:left;
		width:32%;
		margin-right: 1%;
		background-color:#cccccc50;
		color:#333333;
		padding:3px 20px;
		border-radius: 5px;
		font-size: 13px;
		cursor:pointer;
		border:1px solid #cccccc50;
		margin-top: 3px;
	}
	.ewm_dpm_ticket_menu_items_focus{
		float:left;
		width:30%;
		margin-right: 1%;
		background-color:#0db9a8f7;
		color:white;
		padding:5px 20px;
		border-radius: 5px;
		font-size: 13px;
		margin-top: 0px;
	}
	.ewm_dpm_ticket_issue_box{
		width: 38%;
		float: left;
		padding: 10px;
		overflow-y: hidden;
		height: 380px;
		border: #cccccc80 1px solid;
		margin: 5px;
		border-radius:5px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_ticket_chat_box{
		width:58%;
		float:left;
		overflow-y:scroll;
		height: 280px;
		padding:8px;
	}
	.ewm_dpm_ticket_issue_box_title{
		width:100%;
		font-weight: 600 ;
		padding:10px 0px;
	}
	.ewm_dpm_ticket_issue_box_detail{
		width:100%;
		overflow-y: scroll;
		height: 280px;
	}
	.ewm_dpm_single_ticket_message{
		padding:0px;
		border:0px solid gray;
		width:100%;
		margin-bottom:30px;
		overflow:auto;
	}
	.ewm_dpm_single_mes_profile{
		float: left;
		background-color: #333;
		border-radius: 5px;
		padding: 6px 5px 10px 10px;
		margin-left: 15px;
		width: 30px;
		height: 30px;
	}
	.ewm_dpm_single_mes_actual_message{
		float: left;
		padding:5px 15px;
		width:80%;
	}
	.ewm_dpm_single_mes_actual_message_input{
		float:right;
		width:55%;
		margin-top: 10px;
	}
	.ewm_dpm_single_mes_textarea_input{
		width:95%;
		height:50px;
		border-radius:5px;
		padding:5px;
		background-color:#fff !important;
	}
	.ewm_dpm_single_mes_send_message_button{
		background-color: cornflowerblue !important;
		width:95%;
		color:white !important;
		border:1px solid #3336 !important;
		padding: 3px 15px !important;
		border-radius: 5px !important;
		cursor:pointer;
		margin-top:10px;
	}
</style>
<?php

	$tkt_post = get_post( $_GET["tkt_id"] );

	$ewm_dpm_ticket_status = get_post_meta( $tkt_post->ID , 'ewm_dpm_ticket_status', true );

	$ewm_new_class = $ewm_dpm_ticket_status == 'new' ? 'ewm_dpm_ticket_menu_items_focus' : 'ewm_dpm_ticket_menu_items';

	$ewm_progress_class =  $ewm_dpm_ticket_status == 'progress' ? 'ewm_dpm_ticket_menu_items_focus' : 'ewm_dpm_ticket_menu_items';

	$ewm_resolved_class =  $ewm_dpm_ticket_status == 'resolved' ? 'ewm_dpm_ticket_menu_items_focus' : 'ewm_dpm_ticket_menu_items';

	$tkt_post_data  = get_post( $tkt_post->ID );

?>

<div class="ewm_dpm_popup_ticket_">
	<div class="ewm_dpm_popup_ticket_inner">
		<div class="ewm_dpm_popup_ticket_head_title">
			<center>Ticket: #<?php echo $tkt_post_data->ID; ?> | Order: #<?php echo $tkt_post_data->post_parent; ?></center>
		</div>
	
		<div class="ewm_dpm_popup_ticket_head_menu_list">
			<div class="ewm_dpm_ticket_menu_items ewm_dpm_ticket_menu_items_new ewm_dpm_ticket_menu_items_d <?php echo $ewm_new_class; ?>" data-status-id='new' >
				<center>Submitted</center>
			</div>
			<div class="ewm_dpm_ticket_menu_items ewm_dpm_ticket_menu_items_progress ewm_dpm_ticket_menu_items_d <?php echo $ewm_progress_class ; ?>" data-status-id='progress' >
				<center>In Progress</center>
			</div>
			<div class="ewm_dpm_ticket_menu_items ewm_dpm_ticket_menu_items_resolved ewm_dpm_ticket_menu_items_d <?php echo $ewm_resolved_class ?>" data-status-id='resolved' >
				<center>Resolved</center>
			</div>
			<input type="hidden" name="status" value="<?php echo $ewm_dpm_ticket_status; ?>" id="ewm_dpm_ticket_status_hidden">
		</div>
		<div class="ewm_dpm_popup_ticket_body_content">
			<div class="ewm_dpm_ticket_issue_box">
				<center><div class="ewm_dpm_ticket_issue_box_title"> <?php echo $tkt_post->post_title ?> </div></center>
				<div class="ewm_dpm_ticket_issue_box_detail"> <?php echo $tkt_post->post_content ?> </div>
			</div>
			<div class="ewm_dpm_ticket_chat_box" id="ewm_dpm_ticket_chat_box">

				<?php
					$ticket_comments 	= get_comments( [

						'orderby'   => 'comment_date_gmt',
						'order'   	=> 'ASC', //'DESC'.
						'post_id'	=>  $_GET["tkt_id"]
			
					] );

					function ewm_initials( $str ) {
						$ret = '';
						foreach (explode(' ', $str) as $word)
							$ret .= strtoupper($word[0]);
						return $ret;
					}

					foreach ($ticket_comments as $arr_key => $arr_value ) {

						$user_data = get_userdata( $arr_value->user_id );

						$user_poster_name =  $user_data->data->display_name .' ('.$user_data->data->user_login.')';

						$user_data_display_name = $user_data->data->display_name;

						$user_data_display_name = $user_data_display_name[0];//ewm_initials($user_data_display_name);

						echo '<div class="ewm_dpm_single_ticket_message">
							<div class="ewm_dpm_single_mes_profile">'.$user_data_display_name.'</div>
							<div class="ewm_dpm_single_mes_actual_message"> '. $arr_value->comment_content .' <br> <span class="ewm_dpm_second_line_det">'. $user_poster_name .' - '. $arr_value->comment_date_gmt . ' </span> </div>
						</div>';

					}
				?>

			</div>
			<div class="ewm_dpm_single_mes_actual_message_input">
				<textarea class="ewm_dpm_single_mes_textarea_input" ></textarea>
				<input type="button" class="ewm_dpm_single_mes_send_message_button" value="Send">
			</div>

		</div>

	</div>
</div>
