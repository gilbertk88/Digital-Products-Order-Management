<style type="text/css">
	.ewm_dpm_login_signup_wrapper{
		padding: 20px;
		border: 1px solid #cccccc50;
		border-radius: 10px;
	}
	.ewm_dpm_login_signup_menu_section{
		width: 100%;
		overflow: auto;
	}
	.ewm_dpm_ls_login,.ewm_dpm_ls_signup{
		float: left;
		width: 48%;
		margin: 1% ;
		background-color: #80808012;
		color: white;
		padding: 3px 20px;
		cursor: pointer;
		border-radius: 35px;
	}
	.ewm_dpm_cover_sec, .ewm_dsm_container_signup{
		display: none;
		
	}
</style>
<div class="ewm_dpm_login_signup_wrapper">
	<div class="ewm_dpm_login_signup_menu_section">
		<div class="ewm_dpm_ls_login"> 
			<center> Login </center>
		</div>
		<div class="ewm_dpm_ls_signup"> 
			<center> Sign Up </center> 
		</div>
	</div>
	<div class="ewm_dpm_ls_body">
		<?php
				
		include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/login.php';

		include_once THEMOSIS_PUBLIC_DIR . '/views/users/access/signup.php';

		?>
	</div>
</div>
<script type="text/javascript">
	var ewm_is_dual_access = true;
</script>