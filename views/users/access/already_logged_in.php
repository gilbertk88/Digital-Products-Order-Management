<style type="text/css">
        .ewm_dpm_cover_sec{
            border: 1px;
            background-color: #80808029;
            min-width: 200px;
            padding: 20px;
        }
        .login-username>label, .login-password>label, .login-remember>label{
            width:100%;
			color:#333;
        }
        #user_login, #user_pass{
			padding:10px;
			border:1px solid gray;
			width:100%;
        }
        #wp-submit{
            background-color: blue;
            border: 0px solid #000000;
            color: #fff;
            padding: 14px 30px;
            width: 100%;
            cursor: pointer;
        }
		.ewm_dpm_title_top{
			width:100%;
			padding:24px;
			font-size:22px;	
		}
		.ewm_dpm_already_logged_in_description{
			font-size:18px;
			width:100%;
			padding:24px;
		}

</style>

<?php

	$wp_get_current_user = wp_get_current_user();

?>

<div class="ewm_dpm_cover_sec">
	<div class="ewm_dpm_title_top"><center>Welcome <b><?php echo $wp_get_current_user->display_name ; ?></b></center></div>
	<div class="ewm_dpm_already_logged_in_description"><center> You are logged in, please proceed to dashboard </center></div>
</div>
