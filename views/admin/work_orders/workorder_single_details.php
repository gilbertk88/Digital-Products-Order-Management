<style>
	.ewm_dpm_parent_newworkorder_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 14px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_newworkorder_header{
		padding: 20px 0px 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_newworkorder_content{}

	.ewm_dpm_newworkorder_table_list{}
	
	.ewm_dpm_single_cell_newworkorder_header{
		padding: 10px 25px;
		background-color:#cccccc30;
		border-radius:5px;
		min-width: 120px;
	}
	.ewm_dpm_single_cell_newworkorder_body{
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_newworkorder_button{
		background-color:#039bb8;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_new_single_newworkorder_button{
		background-color:white;
		padding: 5px 50px;
		font-size: 15px;
		color:white;
		border: 1px #33333340 solid;
		color:#333;
		cursor: pointer;
		border-radius:4px;
		float:right;
		margin:30px 5px;
	}
	.ewm_dpm_top_menu_area_newworkorder{
		width:100%;
		overflow: auto !important;
	}
	.ewm_dpm_single_cell_newworkorder_description{
		font-size:10px;
	}
	.ewm_dpm_new_single_newworkorder_button{
		background-color:#007e55 !important;
		padding: 5px 50px;
		font-size: 15px;
		color:white !important;
		border: 1px #cccccc50 solid;
		cursor: pointer;
		border-radius:5px;
		float:right;
		margin:30px 5px;
		box-shadow: 0 5px 8px 0 rgb(180 178 178 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_container{
		width:100%;
	}
	.ewm_dpm_single_workorder_f{
		min-width: 100%;
	}
	.ewm_swo_title_{
		min-width: 100%;
		min-width: 100%;
    	padding: 10px 10px 5px 10px;
	}
	.ewm_swo_input_{
		min-width: 100%;
	}
	.ewm_dpm_single_input{
		min-width: 100%;
		padding: 10px 15px;
		border-radius: 80px;
		border: 1px solid #ccc;
		margin-bottom: 20px;
	}
	.ewm_dpm_save_new_workorder_button{
		background-color:#cccccc50;
		padding: 10px 20px;
		border-radius: 100px;
		border: 1px solid #cccccc50;
		margin-bottom:30px;
		cursor: pointer;
	}
</style>

<?php

	$single_workorder = get_post( $_GET['single_workorder_edit'] );

	$swo_Work_Order_Title = $single_workorder->post_title;
	$swo_Order_Name = $single_workorder->post_name;
	$swo_Client_Code = get_post_meta( $single_workorder->ID, 'swo_Client_Code', true );
	$swo_Website = get_post_meta( $single_workorder->ID, 'swo_Website', true );
	$swo_Due_Date = get_post_meta( $single_workorder->ID, 'swo_Due_Date', true );
	$swo_Start_Date = $single_workorder->post_date;
	$swo_GMB_Services = get_post_meta( $single_workorder->ID, 'swo_GMB_Services', true );

	$swo_Client_Active_Paid_Locations = get_post_meta( $single_workorder->ID, 'swo_Client_Active_Paid_Locations', true );
	$swo_GMB_Optimizations = get_post_meta( $single_workorder->ID, 'swo_GMB_Optimizations', true );
	$swo_Required_Team_Members = get_post_meta( $single_workorder->ID, 'swo_Required_Team_Members', true );
	$swo_Required_Tool = get_post_meta( $single_workorder->ID, 'swo_Required_Tool', true );
	$swo_Monthly_Reports = get_post_meta( $single_workorder->ID, 'swo_Monthly_Reports', true );
	$swo_Third_Party_Service = get_post_meta( $single_workorder->ID, 'swo_Third_Party_Service', true );

?>

<div class="ewm_dpm_parent_newworkorder_wrapper">
	<div class="ewm_dpm_top_newworkorder_header">
		<center>Edit Work Order</center>
	</div>
	<div class="ewm_dpm_top_menu_area_newworkorder">
	</div>

	<div class="ewm_dpm_main_newworkorder_content">

	<div class="ewm_dpm_top_menu_area_newworkorder">

	</div>
		<?php			
		// Get associated product from meta
		// If product

		?>
		<div class="ewm_dpm_container">
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Work Order Title
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Work_Order_Title" value='<?php echo $swo_Work_Order_Title; ?>'>
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Order Name
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Order_Name" value="<?php echo $swo_Order_Name; ?>">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Client Code
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Client_Code" value="<?php echo $swo_Client_Code ; ?> " >
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Website
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Website" value="<?php echo $swo_Website; ?>">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Due Date
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Due_Date" value="<?php echo $swo_Due_Date ; ?>">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Start Date
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Start_Date" value="<?php echo $swo_Start_Date; ?> " >
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					GMB Services
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_GMB_Services" value="<?php echo $swo_GMB_Services; ?>" >
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Client Active Paid Locations
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Client_Active_Paid_Locations" value="<?php echo $swo_Client_Active_Paid_Locations; ?>" >
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					GMB Optimizations
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_GMB_Optimizations" value="<?php echo $swo_GMB_Optimizations; ?>">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Required Team Members
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Required_Team_Members" value="<?php echo $swo_Required_Team_Members; ?>">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Required Tool
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Required_Tool" value="<?php echo $swo_Required_Tool; ?>">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Third Party Service
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Third_Party_Service" value="<?php echo $swo_Third_Party_Service; ?>" >
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Monthly Reports
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Monthly_Reports" value="<?php echo $swo_Monthly_Reports; ?>">
				</div>
			</div>
			<div class="ewm_dpm_single_workorder_f">
				<div class="ewm_swo_title_">
					Third Party Service.
				</div>
				<div class="ewm_swo_input_">
					<input class="ewm_dpm_single_input" id="swo_Third_Party_Service" value = "<?php echo $swo_Third_Party_Service; ?>" >
				</div>
			</div>
			
			<div class="ewm_dpm_single_cell_order_body">
				<center>
					<input type="button" value="Save" class="ewm_dpm_save_new_workorder_button" >
				</center>
			</div>
		</div>

	</div>

</div>
