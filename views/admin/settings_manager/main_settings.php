<style>
	.ewm_dpm_setting_wrapper{
		width: 95% !important;
		padding: 20px 20px 40px 20px;
		border: 0px solid #ccc;
		margin: 30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_setting_title{
		width:100%;
		padding: 20px 0px;
		font-size: 18px;
		font-weight: bold;
	}
	.ewm_dpm_setting_wrapper{
		width:100%;
	}
	.ewm_dpm_setting_title_field{
		width:100%;

	}
	.ewm_dpm_setting_container{
		width:100%;
	}
	.ewm_dpm_setting_value{
		width:100% !important;
		border: 1px #cccccc solid !important;
		padding: 5px 20px !important;
		border-radius: 15px !important;
	}
	.ewm_dpm_setting_field{
		padding: 10px 0px;
	}
	.ewm_dpm_setting_save{
		background:#039bb8;
		border: 0px;
		color: #fff;
		padding: 10px 20px;
		border-radius: 15px;
		cursor:pointer;
	}
	.ewm_dpm_setting_title_field{
		padding: 5px 10px;
	}
</style>
<?php
	$page_get_posts = get_posts([
		'post_type' 	=> "page",
		"post_status"	=> "publish",
		'posts_per_page'=> 300,
	]);
?>

<div class="ewm_dpm_setting_wrapper">
	<div class="ewm_dpm_setting_title">
		<center>
			Settings
		</center>
	</div>
	<?php 
	$dpm_freelancer_d = get_option('dpm_freelancer_d') ;

	$dpm_client_d = get_option('dpm_client_d' ) ;

	?>
	<div class="ewm_dpm_setting_container">
		<div class="ewm_dpm_setting_field">
			<div class="ewm_dpm_setting_title_field">
				Client dashboard
			</div>
			<div class="ewm_dpm_setting_input">
				
				<select name="post_" class="ewm_dpm_setting_value" id="ewm_dpm_setting_client_d" >
					<option value='0'>Select a Page</option>
					<?php
						foreach( $page_get_posts as $post_key => $post_value ){
							$c_select = $dpm_client_d == $post_value->ID ? 'selected' : '' ;
							echo '<option value='.$post_value->ID .' '.$c_select.'> '. $post_value->post_title .'</option>' ;
						}
					?>
				</select>
			</div>
		</div>
		<div class="ewm_dpm_setting_field">
			<div class="ewm_dpm_setting_title_field">
				Freelancer dashboard
			</div>
			<div class="ewm_dpm_setting_input">
			<select name="post_" class="ewm_dpm_setting_value" id="ewm_dpm_setting_freelancer_d">
					<option value='0'>Select a Page</option>
					<?php
						foreach( $page_get_posts as $post_key => $post_value ){
							$F_selected = $dpm_freelancer_d == $post_value->ID ? 'selected' : '' ;
							echo '<option value='.$post_value->ID .' '.$F_selected.'> '. $post_value->post_title .'</option>';
						}
					?>
				</select>
			</div>
		</div>
		<div class="ewm_dpm_setting_field">			
			<div class="ewm_dpm_setting_input">
				<input type="button" class="ewm_dpm_setting_save" id="ewm_dpm_setting_save" value="Save">
			</div>
		</div>
	</div>
</div>