<style type="text/css">
        .ewm_dpm_cover_sec{
            background-color: #fff;
            min-width: 200px;
            padding: 20px;
            border-radius: 15px;
        }
        .login-username>label, .login-password>label, .login-remember>label{
            width:100%;
			color:#333;
        }
        #user_login, #user_pass{
			padding:3px 15px;
			width:100%;
            background-color: #fff;
            border-radius: 15px;
        }
        #wp-submit{
            background-color: cornflowerblue !important;
            border: 0px solid #000000;
            color: #fff !important;
            padding: 3px 15px;
            width: 100%;
            cursor: pointer;
            border-radius: 15px;
        }
		.ewm_dpm_title_top{
			width:100%;
			padding:24px;
			font-size:22px;	
		}

</style>

<div class="ewm_dpm_cover_sec">
	<div class="ewm_dpm_title_top"><center>Login</center></div>

    <?php
   
    if ( !isset($redirect_url) ) {
        $redirect_url = '';
    }

    $dpm_freelancer_d = get_option( 'dpm_freelancer_d' ) ;

    if( strlen( $dpm_freelancer_d ) > 0 ){
        $redirect_url = get_the_guid(get_option('dpm_freelancer_d'));
    }

    echo wp_login_form(array( 'echo' => false, 'redirect'=> $redirect_url)) ;

    ?> 

</div>
