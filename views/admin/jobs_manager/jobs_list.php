<style>
	.ewm_dpm_job_main_wrapper{
		width: 95%;
		margin: 20px;
		background: #fff;
		border-radius: 5px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
		padding: 40px 0px;
	}
	.ewm_dpm_top_menu_list_job{
		width:80%;
		overflow: auto;
		margin-bottom: 30px;
	}
	.ewm_dpm_filter_single_job_item{
		float: left;
		margin-right: 1px;
		border: #cccccc4a 1px solid;
		padding: 5px 25px;
		border-radius: 0px;
		min-width: 200px;
		cursor: pointer;
	}
	.ewm_dpm_single_cell_job_header {
		padding: 10px 25px;
		background-color: #cccccc30;
		border-radius: 5px;
		min-width: 230px;
	}
	.ewm_dpm_single_cell_job_body {
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_job_button {
		background-color: #039bb8;
		padding: 5px 50px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 4px;
	}
	.ewm_dpm_top_job_header {
		padding: 20px 0px;
		font-size: 18px;
		font-weight: bold;
	}
	.ewm_dpm_top_body_list_job{
		padding: 0px 100px;
	}
	.ewm_dpm_job_active{
		background-color: #039bb8;
		color: white;
	}
	.ewm_dpm_job_inactive{
		background: #dcdcdc1c;
	}
</style>
<div class="ewm_dpm_job_main_wrapper">
	<div class="ewm_dpm_top_job_header">
		<center>Jobs</center>
	</div>

	<div class="ewm_dpm_top_body_list_job">
		<?php $data_list = []; // get_users();	?>

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<td class="ewm_dpm_single_cell_job_header"> <center> Job Name </center> </td>
					<td class="ewm_dpm_single_cell_job_header"> <center> Order ID </center> </td>
					<td class="ewm_dpm_single_cell_job_header"> <center> Work Order ID </center> </td>
					<td class="ewm_dpm_single_cell_job_header"></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data_list as $u_key => $u_value){ ?>
				<tr>
					<td class="ewm_dpm_single_cell_job_body"><?php echo $u_value->data->ID ; ?></td>
					<td class="ewm_dpm_single_cell_job_body"><?php echo $u_value->data->display_name .' ('. $u_value->data->user_login.')' ; ?></td>
					<td class="ewm_dpm_single_cell_job_body"><?php echo $u_value->data->user_email ; ?></td>
					<td class="ewm_dpm_single_cell_job_body">
						<center><input type="button" class="ewm_dpm_view_manage_job_button" value="View"></center>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>

</div>