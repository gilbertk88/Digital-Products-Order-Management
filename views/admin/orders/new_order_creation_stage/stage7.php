<style>
	.ewm_dpm_ano_menu{
		width: 100%;
		overflow: auto;
	}
	.ewm_dpm_ano_single_menu{
		width:48%;
		padding:5px;
		float:left;
		background:#50575e;
		color:#fff;
		cursor:pointer;
		margin-right:1%;
		border-radius:6px;
	}
	.ewm_dpm_header_d{
		width: 100%;
		overflow: auto;
	}
	.ewm_dpm_menu_product_list{
		width:90%;
		overflow:auto;
		padding:20px;
		overflow:auto;
	}
	.ewm_dpm_menu_product_single{
		float:left;
		border:1px #ccc solid;
		border-radius:5px;
		padding:5px 30px;
		margin-right:1%;
		cursor:pointer;
	}
	.form-group_all{
		display: none;
	}
	.form_f_css_stage4{
		width:100%;
		margin-bottom:30px;
	}
	.form-group_all{
		padding:20px;
	}
	.form-group_title{
		width:100%;
		margin-bottom:23px;
		font-size:22px;
	}
	.ewm_form_f_s_b{
		color:#fff;
		background-color:#ffba00;
		width:100%;
		padding:5px;
		border-radius: 20px;
		border:1px solid #ffba00;
		cursor: pointer;
	}
	.ewm_dpm_menu_product_select_stage4{
		width: 80%;
		padding:5px;
	}
	.ewm_dpm_menu_item_select_coms{	
		width: 25%;
		float: left;
		padding: 10px;
		border: 1px solid #ffba00f2;
		border-radius: 15px;
		margin: 3px;
		cursor: pointer;
	}
	.ewm_dpm_menu_item_select_coms_active{
		background-color:#ffba0052;
	}
	.ewm_dpm_body_item_select_coms{
		display:none;
	}
	.ewm_dpm_main_wrapper{
		overflow: auto;
	}
	.ewm_dpm_main_list_det{
		width: 96%;
		overflow: auto;
		padding: 15px;
	}
</style>
<div class="ewm_dpm_main_wrapper">
	<div class="ewm_dpm_header_d" >
		<h3><center>Communications</center></h3>
	</div>
	<center>
	<div class="ewm_dpm_menu_product_select_stage4">
		<div class="ewm_dpm_menu_item_select_coms ewm_dpm_menu_item_select_coms_active" id="ewm_dpm_select_inbox">
			<center>Inbox</center>
		</div>
		<div class="ewm_dpm_menu_item_select_coms" id="ewm_dpm_select_ticket">
			<center>Ticket</center>
		</div>
		<div class="ewm_dpm_menu_item_select_coms" id="ewm_dpm_select_notification">
			<center>Notifications</center>
		</div>
	</div>
	</center>
	<div class="ewm_dpm_main_list_det">
		<div class="ewm_dpm_body_item_select_coms" id="ewm_dpm_section_inbox">
			<?php
			$inbox_list_d = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage7/inbox/inbox_list.php';
			include_once $inbox_list_d;
			?>
		</div>
		<div class="ewm_dpm_body_item_select_coms" id="ewm_dpm_section_ticket">
			<?php
			$ticket_list_d = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage7/ticket/ticket_list.php';
			include_once $ticket_list_d;
			?>
		</div>
		<div class="ewm_dpm_body_item_select_coms" id="ewm_dpm_section_notification">
			<?php
			$notification_list_d = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage7/notification/notification_list.php';
			include_once $notification_list_d;
			?>
		</div>
	</div>
</div>