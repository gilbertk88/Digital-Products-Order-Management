<style type="text/css">
	.ewm_dpm_pt_popup_wrapper{
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		background-color: #33333330;
		display: none;
		padding: 5% 18%;
	}
	.ewm_dpm_pt_pop_close{
		padding: 5px 20px;
		color:#333;
		background-color:#fff !important;
		font-size: 15px;
		border: 1px #cccccc50 solid;
		cursor: pointer;
		border-radius:5px;
		float:right;
		margin:30px 5px;
		box-shadow: 0 5px 8px 0 rgb(180 178 178 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_pt_inner{
		width: 70%;
		height: 58%;
		background-color: #fff;
		padding:10px 20px;
		border-radius: 10px;
		overflow:auto;
	}
	.ewm_dpm_pt_top_menu{
		width: 100%;
		overflow: auto;
	}
	.ewm_dpm_pt_container{
		width: 100%;
	}
	.ewm_dpm_pt_single_sec{
		width: 100%;
	}
	.ewm_dpm_pt_container{
		width: 100%;
		overflow: auto;
	}
	.ewm_dpm_pt_single_field_input{
		width: 99%;
		border: 1px solid #ccc !important;
		border-radius: 15px !important;
	}
	.ewm_dpm_pt_t{
		padding-top: 10px;
		font-size: 12px;
		padding: 2px 5px;
	}
	.ewm_dpm_pt_single_field_input_button{
		margin-top: 50px;
		background-color: #cccccc50;
		border: 0px;
		border: 1px solid #cccccc50;
		color: #000000;
		padding: 10px 15px !important;
		border-radius: 40px !important;
		cursor: pointer;
	}

</style>
<div class="ewm_dpm_pt_popup_wrapper">
	<div class="ewm_dpm_pt_inner">
		<div class="ewm_dpm_pt_top_menu">
			<input type="submit" value="Close[x]" class="ewm_dpm_pt_pop_close">
		</div>
		<div class="ewm_dpm_pt_container">
			<div class="ewm_dpm_pt_single_sec">
				<div class="ewm_dpm_pt_t">
					Task Title
				</div>
				<div class="ewm_dpm_pt_single_field">
					<input type="text" class="ewm_dpm_pt_single_field_input" id="ewm_dpm_task_title">
				</div>
			</div>
			<div class="ewm_dpm_pt_single_sec">
				<div class="ewm_dpm_pt_t">
					Task Description
				</div>
				<div class="ewm_dpm_pt_single_field">
					<input type="text" class="ewm_dpm_pt_single_field_input" id="ewm_dpm_task_description">
				</div>
			</div>
			<div class="ewm_dpm_pt_single_sec">
				<div class="ewm_dpm_pt_t">
					Days to Deadline
				</div>
				<div class="ewm_dpm_pt_single_field">
					<input type="text" class="ewm_dpm_pt_single_field_input"  id="ewm_dpm_task_days_to_deliver">
					<input type="hidden" class="ewm_dpm_pt_single_field_input"  id="ewm_dpm_pt_edit_type">
					<input type="hidden" class="ewm_dpm_pt_single_field_input"  id="ewm_dpm_pt_post_id">
				</div>
			</div>
			<div class="ewm_dpm_pt_single_sec">
				<div class="ewm_dpm_pt_single_field">
					<center>
					<input type="button" class="ewm_dpm_pt_single_field_input_button" value='Save'>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
