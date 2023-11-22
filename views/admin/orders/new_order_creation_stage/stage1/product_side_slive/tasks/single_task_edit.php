<style>
.ewm_dpm_task_background_side_slive {
    width: 100%;
    height: 100%;
    background-color: #33333350;
    position: fixed;
    left: 0px;
    top: 0px;
    padding-left: 20%;
    display: none;
    z-index: 10000000;
}
.ewm_dpm_task_edit_side_slive {
    width: 60%;
    background-color: #fff !important;
    float: right;
    position: fixed;
    right: 0px;
    top: 0px;
    padding-top: 30px;
    height: 100%;
    padding-left: 20px;
    box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
    overflow: auto;
}
.ewm_dpm_task_menu_side_slive {
    width: 100%;
    overflow: auto;
    margin-top: 5px;
}
.ewm_dpm_task_main_side_slive{
	width: 98%;
	overflow: hidden;
}
.ewm_dpm_close_task_sliv{
	float: right;
	border-radius: 5px;
	background-color:#009688;
	color: #fff;
	padding:10px;
	border: 0px;
	margin: 10px;
	cursor: pointer;
}
.ewm_dpm_top_menu_sec{
	width:98%;
	padding:10px;
	overflow: auto;
}
.ewm_dpm_s_t_i{
	float: left;
	width:30%;	
	margin-right: 13px;
}
.ewm_dpm_status_header{
	background-color: #333;
	color: #fff;
	margin-right: 5px;
	padding:5px;
	border-radius: 30px;
	cursor: pointer;
}
.ewm_dpm_t_input_sec{
	width:95%;
}
.ewm_dpm_t_title_text{
	width:98%;
	margin-top:8px;
	border-radius: 5px;
	padding:5px;
	border: 1px solid #cccccc90;
}
.ewm_dpm_t_title_describe{
	width:98%;
	margin-top: 20px;
	border-radius: 5px;
	padding:5px;
	border: 1px solid #cccccc90;
	height:200px;
}
.ewm_dpm_edit_s_t_i{
	width:98%;
	padding:5px
}

.ewm_dpm_f_left_title{
    background-color: #323131;
    color: #fffcfc;
    border-radius: 5px;
    padding: 5px;
}
.ewm_dpm_order_wrapper{
	width:95%;
	overflow: auto;
}
.ewm_dpm_single_item{
	width:46%;
	float:left;
	margin: 5px;
	overflow: auto;
	border: 1px solid cccccc90;
	padding: 0px;
	border-radius: 3px;
}
.ewm_dpm_f_left{
	width:80%;
	float:left;
	padding: 5px;
}
.ewm_dpm_chat_area_f{
    width: 95%;
    border-radius: 5px;
    background-color: #cccccc36;
}
.ewm_dpm_status_header{
	width: 100%;
}
.ewm_dpm_status_body{
    width: 95%;
    position: relative;
    left: 0px;
    top: 5px;
    color: black;
    background: bisque;
    padding: 10px;
    border-radius: 5px;
	display:none;
}
.ewm_dpm_status_single{
	width: 100%;
	margin: 5px;
	padding: 5px;
	border-radius: 5px;
	overflow: auto;
}
.ewm_dpm_status_close{
	float:right;
	color: black;
	border: 1px solid black;
	cursor:pointer;
	margin: 5px 10px 5px 5px;
	background: bisque;
	border-radius: 5px;
}

/*assign*/
.ewm_dpm_assign_header{
	width: 100%;
    background-color: #333;
    color: #fff;
    margin-right: 5px;
    padding: 5px;
    border-radius: 30px;
    cursor: pointer;
}
.ewm_dpm_assign_body{
    width: 95%;
    position: relative;
    left: 0px;
    top: 5px;
    color: black;
    background: bisque;
    padding: 10px;
    border-radius: 5px;
	display: none;
}
.ewm_dpm_assign_single{
	width: 100%;
	margin: 5px;
	padding: 5px;
	border-radius: 5px;
	overflow: auto;
}
.ewm_dpm_assign_close{
	float:right;
	color: black;
	border: 1px solid black;
	cursor:pointer;
	margin: 5px 10px 5px 5px;
	background: bisque;
	border-radius: 5px;
}
.ewm_dpm_follow_tab{
	border: 0px solid ;
}
.ewm_dpm_follow_header{
	width: 100%;
    background-color: #333;
    color: #fff;
    margin-right: 5px;
    padding: 5px;
    border-radius: 30px;
    cursor: pointer;
}
.ewm_dpm_task_date_input{
	width: 95%;
}
.ewm_dpm_sec_1, .ewm_dpm_sec_2{
	width: 46%;
	float: left;
	padding-top: 10px;
}
</style>

<div class="ewm_dpm_task_background_side_slive">
	<div class="ewm_dpm_task_edit_side_slive">
		<div class="ewm_dpm_task_menu_side_slive">
			<input type="button" class="ewm_dpm_close_task_sliv" value="Close">
		</div>
		<div class="ewm_dpm_task_main_side_slive">
			<div class="ewm_dpm_top_menu_sec">
				<div class="ewm_dpm_s_t_i" data-btn-option = 'status'>
				<div class="ewm_dpm_status_header"><center>Status</center></div>				
					<div class="ewm_dpm_status_body">
						<div class="ewm_dpm_status_single">
							<input type="button" value="X" class="ewm_dpm_status_close">
						</div>
						<div class="ewm_dpm_status_single">
							<input type="radio" name="ewm_dpm_status_checks" value="new_task">New Task
						</div>
						<div class="ewm_dpm_status_single">
							<input type="radio" name="ewm_dpm_status_checks" value="assigned_inprogress">Assigned(In Progress)
						</div>
						<div class="ewm_dpm_status_single">
							<input type="radio" name="ewm_dpm_status_checks" value="complete">Completed
						</div>
					</div>
				</div>
				<div class="ewm_dpm_s_t_i" data-btn-option = 'assign'>
					<div class="ewm_dpm_assign_header"><center>Assign</center></div>
					<div class="ewm_dpm_assign_body">						
						<div class="ewm_dpm_assign_single"><input type="button" value="X" class="ewm_dpm_assign_close"> </div>

						<?php 
						$get_users = get_users( array(
							'role__in' => array( 'administrator', 'ewmdsm_freelancer' )
						));
					
						foreach( $get_users as $single_k => $single_v){
							echo '<div class="ewm_dpm_assign_single">
								<input type="radio" name="ewm_dpm_user_assigned" value="'. $single_v->ID .'">'. $single_v->display_name .'('. $single_v->user_login .')
							</div>';
						}
						?>
					</div>
				</div>
				<div class="ewm_dpm_s_t_i" data-btn-option = 'follow'>
					<div class="ewm_dpm_follow_header"><center><input type="checkbox" class="ewm_dpm_follow_tab">Follow</center></div>
				</div>
			</div>
			<div class="ewm_dpm_sec_1">
				<div class="ewm_dpm_t_input_sec">
					<div class="form">
						<input placeholder='Title' class="ewm_dpm_t_title_text" >
					</div>
					<div>
						<textarea class="ewm_dpm_t_title_describe">Descriptions</textarea>
					</div>
				</div>
				<div class='ewm_dpm_order_wrapper'>
				<div class="ewm_dpm_single_item">
					<div class="ewm_dpm_f_left ewm_dpm_f_left_title">Order</div>
					<div class="ewm_dpm_f_left">#<?php echo $_GET['single_order_id']; ?></div>
				</div>
				<div class="ewm_dpm_single_item">
					<div class="ewm_dpm_f_left ewm_dpm_f_left_title">Client</div> 
					<div class="ewm_dpm_f_left _client_name" >
						<?php
							$client_name_details = '';
							if (isset($__single_post_author)) {
								if (is_object($__single_post_author)) {
									$client_name_details = $__single_post_author->data->display_name . ' (' . $__single_post_author->data->user_login . ' | ' . $__single_post_author->data->user_email . ' )' ;
								}
							}
							echo $client_name_details;
						?>
						
					</div>
				</div>
				<div class="ewm_dpm_single_item">
					<div class="ewm_dpm_f_left ewm_dpm_f_left_title">Due Date </div>
					<div class="ewm_dpm_f_left"><input type="date" class="ewm_dpm_task_date_input"></div>
				</div>
				<div class="ewm_dpm_single_item">
					<div class="ewm_dpm_f_left ewm_dpm_f_left_title">Service/ Product ID</div>
					<div class="ewm_dpm_f_left ewm_dpm_task_product_name">SEO</div>
				</div>
			</div>
			</div>
			
			<div class="ewm_dpm_sec_2">
				<div class="ewm_dpm_chat_area_f">
					<?php
						$_ewm_dpm_comment_import = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/stage1/product_side_slive/tasks/task_comment_chat.php';
						include $_ewm_dpm_comment_import ;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
	
<input type="hidden" class='ewm_dpm_current_task_id'>
<input type="hidden" class='ewm_dpm_current_task_order_id'>
<input type="hidden" class='ewm_dpm_current_task_product_id'>

