<style>

.ewm_dsm_container_profile{
	border:1px solid #ccc;
	background-color:#fff;
	min-width:200px;
	padding:20px;
	border-radius: 10px;
}
.ewmdsm_field_profile{
	padding:5px 10px !important;
	border:1px solid #ccc !important;
	width:100%;
	border-radius: 10px !important;
	background:#fff !important;
}
.ewmdsm_field_container_profile{
	width:100%;
}
.ewmdsm_single_field_container_profile{
	width:100%;
	padding:14px
}
.ewmdsm_field_button_profile{
	width:100%;
	cursor:pointer;
	border:0px !important;
	cursor:pointer !important;
	background: cornflowerblue !important;
    color: #fff !important;
    border-radius: 5px !important;
    padding: 3px 30px !important;
}
.ewm_dsm_title_container_profile{
	width:100%;
	padding:24px;
	font-size:22px;	
}

</style>

<?php

$wp_current_user = wp_get_current_user();

// var_dump($wp_current_user->data);

$ewmdsm_profile_display_name	= $wp_current_user->data->display_name;

$ewmdsm_profile_username	= $wp_current_user->data->user_login;

$ewmdsm_profile_email		= $wp_current_user->data->user_email;

?>

<div class="ewm_dsm_container_profile">
	<div class="ewm_dsm_title_container_profile"> <center> My Profile </center> </div>
	<div class="ewmdsm_field_container_profile">

		<div class="ewmdsm_single_field_container_profile">
			<input type="text" name="" class="ewmdsm_field_profile" id="ewmdsm_profile_display_name" value="<?php echo $ewmdsm_profile_display_name; ?>" placeholder="First Name">
		</div>		
		<div class="ewmdsm_single_field_container_profile">
			<input type="text" name="" class="ewmdsm_field_profile" id="ewmdsm_profile_username" value="<?php echo $ewmdsm_profile_username; ?>" placeholder="Username">
		</div>
		<div class="ewmdsm_single_field_container_profile">
			<input type="email" name="" class="ewmdsm_field_profile" id="ewmdsm_profile_email" value="<?php echo $ewmdsm_profile_email; ?>" placeholder="Email">
		</div>
		
		<div class="ewmdsm_single_field_container_profile"><input type="button" name="" class="ewmdsm_field_button_profile"  id="" value="Create User"></div>	
	</div>
</div>
