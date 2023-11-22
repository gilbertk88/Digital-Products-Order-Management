<style type="text/css">
	.ewm_dpm_popup_ticket_{
		position:fixed;
		left:0px;
		top:0px;
		padding:5% 15%;
		background:#00000066;
		color:white;
		width:100%;
		height:100%;
		display:none;
	}
	.ewm_dpm_second_line_det{
		font-size:10px;
		font-color:#333;
	}
	.ewm_dpm_popup_ticket_inner{
		background-color:white;
		border-radius: 5px;
		width:80%;
		height:80%;
		color:gray;
	}
	.ewm_dpm_popup_ticket_head_title{
		padding:20px;
		font-size:18px;
		color:#333;
	}
	.ewm_dpm_popup_ticket_head_menu_list{
		width:100%;
		padding:18px;
		overflow:auto;
	}
	.ewm_dpm_ticket_menu_items{
		float: left;
		width: 25%;
		margin-right: 5px;
		background-color: #f0f0f1;
		color: #333333;
		padding: 10px;
		border-radius: 10px;
		font-size: 13px;
		cursor: pointer;
		border: 0px solid #cccccc50;
	}
	.ewm_dpm_ticket_menu_items_focus{
		float: left;
		width: 25%;
		margin-right: 1%;
		background-color: #2ea7d3;
		color: white;
		padding: 10px;
		border-radius: 15px;
		font-size: 13px;
	}
	.ewm_dpm_popup_close_ticket{		
		float: right;
		margin: 20px;
		background-color: #cccccc50;
		border-radius: 15px !important;
		border: 0px solid #cccccc50;
		padding: 15px !important;
		cursor: pointer;
	}
	.ewm_dpm_ticket_issue_box{
		width: 38%;
		float: left;
		padding: 20px 0px 20px 15px;
		overflow-y: hidden;
		height: 380px;
		border: #cccccc30 1px solid;
		margin: 20px;
		border-radius: 15px;
		box-shadow: 0 3px 4px 0 rgb(151 151 151 / 10%), 0 3px 5px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_ticket_chat_box{
		width: 54%;
		float: left;
		overflow-y: scroll;
		height: 330px;
	}
	.ewm_dpm_ticket_issue_box_title{
		width:100%;
		font-weight: 600 ;
		padding:0px 0px 15px 0px;
	}
	.ewm_dpm_ticket_issue_box_detail{
		width:100%;
		overflow-y: scroll;
		height: 325px;
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
		/* padding: 10px; */
		margin-left: 10px;
		width: 15px;
		height: 15px;
		font-size: 20px;
		padding: 10px;
	}
	.ewm_dpm_single_mes_actual_message{
		float: left;
		padding:5px 15px;
		width:80%;
	}
	.ewm_dpm_single_mes_actual_message_input{
		position:fixed;
		bottom:0px;
		right:2%;
		width:46.9%;
		height:25%;
	}
	.ewm_dpm_single_mes_textarea_input{
		width:90%;
		height:50px;
		border-radius: 5px;
		padding:5px;
		border: 1px solid #cccccc90;
	}
	.ewm_dpm_single_mes_send_message_button{
		background-color: #2ea7d3 !important;
		width: 20%;
		color: white;
		border: 0px solid #3c434a !important;
		padding: 15px;
		border-radius: 15px;
		cursor: pointer;
	}
</style>
<div class="ewm_dpm_popup_ticket_">
	<div class="ewm_dpm_popup_ticket_inner">
		<input type="button" value="Close[x]" class="ewm_dpm_popup_close_ticket">
		<div class="ewm_dpm_popup_ticket_head_title">
			<center>Manage Ticket</center>
		</div>
		<div class="ewm_dpm_popup_ticket_head_menu_list">
			<div class="ewm_dpm_ticket_menu_items ewm_dpm_ticket_menu_items_new ewm_dpm_ticket_menu_items_d" data-status-id='new' >
				<center>New</center>
			</div>
			<div class="ewm_dpm_ticket_menu_items ewm_dpm_ticket_menu_items_progress ewm_dpm_ticket_menu_items_d" data-status-id='progress' >
				<center>In Progress</center>
			</div>
			<div class="ewm_dpm_ticket_menu_items ewm_dpm_ticket_menu_items_resolved ewm_dpm_ticket_menu_items_d" data-status-id='resolved' >
				<center>Resolved</center>
			</div>
		</div>
		<div class="ewm_dpm_popup_ticket_body_content">
			<div class="ewm_dpm_ticket_issue_box">
				<center><div class="ewm_dpm_ticket_issue_box_title"> Ticket Title </div></center>
				<div class="ewm_dpm_ticket_issue_box_detail"> Ticket Details </div>
			</div>
			<div class="ewm_dpm_ticket_chat_box" id="ewm_dpm_ticket_chat_box">
				
			</div>
			<div class="ewm_dpm_single_mes_actual_message_input">
				<textarea class="ewm_dpm_single_mes_textarea_input" ></textarea>
				<input type="button" class="ewm_dpm_single_mes_send_message_button" value="Send">
			</div>

		</div>

	</div>
</div>

