<style type="text/css">
	.ewm_dpm_single_ord_pop_wrapper_OF{
		position:fixed;
		left:0px;
		top:0px;
		padding:5% 5%;
		background:#00000085;
		color:white;
		width:100%;
		height:100%;
		display:none;
	}
	.ewm_dpm_second_line_det_OF{
		font-size:10px;
		font-color:#333;
	}
	.ewm_dpm_popup_ticket_inner_OF{
		background-color:white;
		border-radius: 10px;
		width:100%;
		height:100%;
		color:gray;
	}
	.ewm_dpm_popup_ticket_head_title_OF{
		padding:20px;
		font-size:18px;
	}
	.ewm_dpm_popup_ticket_head_menu_list_OF{
		width: 100%;
		padding: 8px 0px 30px 26px;
		overflow: auto;
	}
	.ewm_dpm_ticket_menu_items_OF{
		float:left;
		width:32%;
		margin-right: 1%;
		background-color:#cccccc50;
		color:#333333;
		padding:5px 20px;
		border-radius: 5px;
		font-size: 13px;
		cursor:pointer;
		border:1px solid #cccccc50;
	}
	.ewm_dpm_ticket_menu_items_focus_OF{
		float:left;
		width:30%;
		margin-right: 1%;
		background-color:#0db9a8f7;
		color:white;
		padding:8px 20px;
		border-radius: 5px;
		font-size: 13px;
	}
	.ewm_dpm_popup_close_ticket_OF{
		float: right !important;
		margin:20px !important;
		background-color:#fff !important;
		border-radius: 35px !important;
		border:1px solid #ccc !important;
		padding:5px 15px !important;
		cursor:pointer !important;
		border-radius: 5px !important;
	}
	.ewm_dpm_ticket_issue_box_OF{
		width: 38%;
		float: left;
		padding: 10px;
		overflow-y: hidden;
		height: 400px;
		border: #cccccc80 1px solid;
		margin: 15px;
		border-radius: 5px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_ticket_chat_box_OF{
		width:58%;
		float:left;
		overflow-y:scroll;
		height: 300px;
	}
	.ewm_dpm_ticket_issue_box_title_OF{
		width:100%;
		font-weight: 600 ;
		padding:10px 0px;
	}
	.ewm_dpm_ticket_issue_box_detail_OF{
		width:100%;
		overflow-y: scroll;
		height:320px;
	}
	.ewm_dpm_single_ticket_message_OF{
		padding:0px;
		border:0px solid gray;
		width:100%;
		margin-bottom:30px;
		overflow:auto;
	}
	.ewm_dpm_single_mes_profile_OF{
		float:left;
		background-color:#333;
		border-radius: 5px;
		padding:10px;
		margin-left:10px;
	}
	.ewm_dpm_single_mes_actual_message_OF{
		float: left;
		padding:5px 15px;
		width:80%;
	}
	.ewm_dpm_single_mes_actual_message_input_OF{
		position:fixed;
		bottom:0px;
		right:2%;
		width:56%;
		height:25%;
	}
	.ewm_dpm_single_mes_textarea_input_OF{
		width:90%;
		height:50px;
		border-radius: 5px;
		padding:5px;
		margin-bottom: 5px;
	}
	.ewm_dpm_single_mes_send_message_button_OF{
		background-color: cornflowerblue !important;
		width: 90% !important;
		color: white !important;
		border: 0px solid #333 !important;
		padding: 3px 15px !important;
		border-radius: 6px !important;
		cursor: pointer !important;
	}
</style>
<div class="ewm_dpm_single_ord_pop_wrapper_OF">
	<div class="ewm_dpm_popup_ticket_inner_OF">
		<input type="button" value="Close[x]" class="ewm_dpm_popup_close_ticket_OF">
		<div class="ewm_dpm_popup_ticket_head_title_OF">
			<center>Manager Ticket</center>
		</div>
		<div class="ewm_dpm_popup_ticket_head_menu_list_OF">
			<div class="ewm_dpm_ticket_menu_items_OF ewm_dpm_ticket_menu_items_new_OF ewm_dpm_ticket_menu_items_d_OF" data-status-id='new' >
				<center>New</center>
			</div>
			<div class="ewm_dpm_ticket_menu_items_OF ewm_dpm_ticket_menu_items_progress_OF ewm_dpm_ticket_menu_items_d_OF" data-status-id='progress' >
				<center>In Progress</center>
			</div>
			<div class="ewm_dpm_ticket_menu_items_OF ewm_dpm_ticket_menu_items_resolved_OF ewm_dpm_ticket_menu_items_d_OF" data-status-id='resolved' >
				<center>Resolved</center>
			</div>
		</div>
		<div class="ewm_dpm_popup_ticket_body_content_OF">
			<div class="ewm_dpm_ticket_issue_box_OF">
				<center><div class="ewm_dpm_ticket_issue_box_title_OF"> Ticket Title </div></center>
				<div class="ewm_dpm_ticket_issue_box_detail_OF"> Ticket Details </div>
			</div>
			<div class="ewm_dpm_ticket_chat_box_OF" id="ewm_dpm_ticket_chat_box_OF">

			</div>
			<div class="ewm_dpm_single_mes_actual_message_input_OF">
				<textarea class="ewm_dpm_single_mes_textarea_input_OF" ></textarea>
				<input type="button" class="ewm_dpm_single_mes_send_message_button_OF" value="Send">
			</div>

		</div>

	</div>
</div>
