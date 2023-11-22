<style type="text/css">
	.ewm_dpm_main_single_dp_wrapper{
		width:100%;
		height:100%;
		background-color: #00000075;
		position:fixed;
		left:0px;
		top:0px;
		padding:10%;
		z-index:100000;
		display:none;
	}
	.ewm_dpm_main_dp_inner{
		background-color:white;
		padding: 50px;
		border:1px solid white;
		border-radius: 8px;	
	}
	.ewm_dpm_main_dp_heading{
		font-size: larger;
		font-weight: 400;
		overflow: auto;
		padding:20px;
	}
	.ewm_dpm_main_dp_value{
		width:100%;
		border-radius: 40px !important;
		padding:0px 20px;
	}
	.ewm_dpm_main_dp_update_dp{
		width:100%;
		color: #fff !important;
		background-color: cornflowerblue !important;
		cursor:pointer;
		border-radius: 40px !important;
	}
	.ewm_dpm_main_dp_inner_f{
		padding: 10px;
	}
	.ewm_dpm_close_b{
		float: right;
		border-radius: 30px !important;
	}
	.ewm_dpm_main_dp_heading_menu{
		width: 100%;
		overflow: auto;
	}

</style>
<div class="ewm_dpm_main_single_dp_wrapper">
	<div class="ewm_dpm_main_dp_inner">
		<div class="ewm_dpm_main_dp_heading_menu">
			<input type="button" value="close" class="ewm_dpm_close_b">
		</div>
		<div class="ewm_dpm_main_dp_heading">
			<center>Update Value</center>
		</div>
		<div class>
			<div class="ewm_dpm_main_dp_inner_f">
				<input type="text" class="ewm_dpm_main_dp_value">
			</div>
			<div class="ewm_dpm_main_dp_inner_f">
				<input type="hidden" class="ewm_dpm_main_dp_data_code">
				<input type="button" class="ewm_dpm_main_dp_update_dp" value="Update">
			</div>
		</div>
	</div>
</div>