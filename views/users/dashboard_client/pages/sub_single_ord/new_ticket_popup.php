<style type="text/css">
.ewm_dpm_single_ord_pop_wrapper_new{
	width: 100%;
	position: fixed;
	left: 0px;
	top: 0px;
	background-color: #333333a8;
	height: 100%;
	padding: 5%;
}
.ewm_dpm_single_ord_inner_new{
    background-color: #fff;
    border: 1px solid #ccc;
    opacity: 1;
    overflow: auto;
    padding: 20px;
	height: 100%;
	border-radius: 5px;
}
.ewm_dpm_close_old_ord_new{
    padding: 3px 20px !important;
    cursor: pointer;
    float: right;
    border: 1px solid #ccc;
    color: #333;
    border-radius: 5px !important;
}
.ewm_dpm_s_top_menu_popup_new{
    width: 100%;
    background-color: #fff;
    overflow: auto !important;
    border-radius: 4px;
	color: #333;
}
.ewm_dpm_s_body_details_new{
	width: 100%;
	overflow: auto;
	margin-top: 50px;
	padding: 35px;
}
.ewm_dpm_s_ticket_details_new{
	width: 100%;
	background-color: #fff;
	padding: 35px;
	float: left;
	overflow: auto;
	border-radius:10px;
}
.ewm_dpm_one_chat_list_new{
    background-color: #cccccc54;
    width: 95%;
    margin: 10px;
    padding: 15px 20px;
    border-radius: 4px;
	overflow: auto;
}

.ewm_dpm_popup_sender_details_new{
	font-size: 10px;
	color: blue;
}
.ewm_dpm_ticket_message_area_new{
	width: 98%;
}
.ewm_dpm_text_area_field_new{
	border: 1px solid #ddd;
	background-color:#fff;
	width: 98%;
}
.ewm_dpm_ticket_message_area_new{
    position: relative;
    bottom: 0px;
    left: 0px;
}
.ewm_dpm_single_ord_pop_wrapper_new{
	display: none;
}
.ewm_dpm_new_ticket_title{
    width: 100%;
    color: gray;
    margin-bottom: 25px;
    border-radius: 5px;
    padding: 3px 15px !important;
    border: 1px solid #cccccc50 !important;
    background-color: #fff !important;
}
.ewm_dpm_new_ticket_details{
	width: 100%;
	color: gray;
	border:1px solid #cccccc50 !important;
	margin-bottom: 30px;
	border-radius: 10px;
	background-color:#fff !important;
}
.ewm_dpm_new_ticket_submit{
	background-color: cornflowerblue !important;
	border: 1px solid cornflowerblue !important;
	width: 100px !important;
	color: #fff !important;
	padding: 5px 15px !important;
	border-radius: 5px !important;

}
.ewm_dpm_new_tkt_line_{
	background-color: cornflowerblue;
	border: 1px solid cornflowerblue;
	width: 100%;
	color: #fff;
}
.ewm_dpm_new_s_menu_popup_title{
	color: #333;
	float: left;
	padding: 9px 40px;
	width:100%;
}
.ewm_dpm_new_s_menu_pop_new_close{
	float: right;
}
</style>
<div class="ewm_dpm_single_ord_pop_wrapper_new">
	<div class="ewm_dpm_single_ord_inner_new">
		<div class="ewm_dpm_s_top_menu_popup_new">
			<div class="ewm_dpm_new_s_menu_pop_new_close">
				<input type="button" class="ewm_dpm_close_old_ord_new" value="Close [x]">
			</div>
			<div class="ewm_dpm_new_s_menu_popup_title">
				<center> New Ticket </center>
			</div>
		</div>
		
		<div class="ewm_dpm_s_body_details_new">
			<div class="ewm_dpm_s_ticket_details_new">
				<input type="text" class="ewm_dpm_new_ticket_title" id="ewm_dpm_new_ticket_title" placeholder="New Ticket Details">
				<textarea class="ewm_dpm_new_ticket_details"  id="ewm_dpm_new_ticket_details" placeholder="Ticket Details"></textarea>
				<input type="hidden" class="ewm_dpm_new_order_id"  id="ewm_dpm_new_order_id" value="">
				<center><input type="button" class="ewm_dpm_new_ticket_submit" id="ewm_dpm_new_ticket_submit" value="Add Ticket"></center>
			</div>
		</div>
		
	</div>
</div>
