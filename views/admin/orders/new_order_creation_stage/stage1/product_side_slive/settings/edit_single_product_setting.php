<?php
	$args = array(
		'numberposts' => 900,
		'post_type'   => 'ewm_p_sub_s',
		'post_status' => 'active',
		//'parent'
	);
	// Replace feature post type
	$ewm_dpm_pt = get_posts($args);
	$_single_product = get_post( $value_t['id'] );
	$swo_settings_paid_unpaid = get_post_meta( $_data_post_id , 'swo_settings_paid_unpaid', true );
	$swo_settings_subscription_date= get_post_meta( $_data_post_id , 'swo_settings_subscription_date', true ); // $_POST['swo_settings_subscription_date'],
    $swo_settings_paid_unpaid      = get_post_meta( $_data_post_id , 'swo_settings_paid_unpaid', true ); //$_POST['swo_settings_paid_unpaid'],
    $swo_settings_wo_deadline_date = get_post_meta( $_data_post_id , 'swo_settings_wo_deadline_date', true ); //$_POST['swo_settings_wo_deadline_date'],
    $swo_settings_subscription_p_unpaid= get_post_meta( $_data_post_id , 'swo_settings_subscription_p_unpaid', true ); // _POST['swo_settings_subscription_p_unpaid'],
?>
<style>
	.ewm_dpm_pt_table_list{
		padding:20px;
	}
	.ewm_dpm_save_settings_butt{
		cursor: pointer;
		width: 20%;
		margin-top: 20px;
		background: #4f94d4;
		color: #fff;
		padding: 10px;
		border-radius: 15px;
		border: 1px #4f94d4 solid;
	}
</style>
<div class="form-group_all setting-group_<?php echo $value_t['id']; ?> ">

<div class="ewm_dpm_parent_pt_wrapper">

	<div class="ewm_dpm_top_pt_header">
		<center>Product Settings( <?php echo $_single_product->post_title .' (#'.$value_t['id'] .') '; ?> )</center>
	</div>
	<input type="hidden" name="ewm_product_id" id="ewm_product_id" value="<?php echo $value_t['id']; ?>">

	<?php
		// Update the post meta 
        $pt_tasks = maybe_unserialize( get_post_meta( $value_t['id'] , 'pt_tasks' , true ) );
    ?>
	
	<div class="ewm_dpm_top_menu_area_pt">
	</div>

	<div class="ewm_dpm_main_pt_content">
		<div class="ewm_dpm_pt_table_list">
			<div class="ewm_dpm_s_sub_sec">
				<div class="ewm_dpm_s_sub_sec_f">
					Next Monthly Subscription Date
				</div>
				<div class="ewm_dpm_s_sub_sec_s">
					<input type="date" name="" id='swo_settings_subscription_date_<?php echo $value_t['id']; ?>' class="ewm_dpm_settings_input_f" value="<?php echo $swo_settings_subscription_date; ?>" >
				</div>
			</div>
			<div class="ewm_dpm_s_sub_sec">
				<div class="ewm_dpm_s_sub_sec_f">
					Payment Status
				</div>
				<div  class="ewm_dpm_s_sub_sec_s">
					<?php 
						$paid 	= $swo_settings_paid_unpaid == 'paid' ? 'selected' : '';
						$unpaid = $swo_settings_paid_unpaid == 'paid' ? 'selected' : '';
					?>
					<select type="date" name="" id='swo_settings_paid_unpaid_<?php echo $value_t['id']; ?>' class="ewm_dpm_settings_input_f" >
						<option value="not_selected" >Not Selected</option>
						<option value="paid" <?php echo $paid; ?> >Paid</option>
						<option value="unpaid" <?php echo $unpaid; ?> >Unpaid</option>
					</select>
				</div>
			</div>
			<div class="ewm_dpm_s_sub_sec">
				<div class="ewm_dpm_s_sub_sec_f">
					Product Deadline
				</div>
				<div  class="ewm_dpm_s_sub_sec_s">
					<input type="date" name="" id='swo_settings_wo_deadline_date_<?php echo $value_t['id']; ?>' class="ewm_dpm_settings_input_f" value="<?php echo $swo_settings_wo_deadline_date; ?>">
				</div>
			</div>
			<div class="ewm_dpm_s_sub_sec">
				<div class="ewm_dpm_s_sub_sec_f">
					Subscription Period
				</div>
				<?php
				$monthly = $swo_settings_subscription_p_unpaid == '' ? 'subscribed' : '' ;
				?>
				<div class="ewm_dpm_s_sub_sec_s">
					<select type="date" name="" id='swo_settings_paid_unpaid_<?php echo $value_t['id']; ?>' class="ewm_dpm_settings_input_f" >
						<option value="monthly" <?php echo $monthly; ?>>Monthly</option>
					</select>
				</div>
			</div>
			<div class="ewm_dpm_s_sub_sec">
				<center>
					<input type="button" class="ewm_dpm_save_settings_butt" value="Save Settings" data-settings-butt="<?php echo $value_t['id']; ?>">
				</center>
			</div>
		</div>
	</div>
</div>
</div>
