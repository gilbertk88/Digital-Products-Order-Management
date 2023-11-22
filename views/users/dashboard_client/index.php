<style>
	.ewm_dpm_dashboard{
		width: 100%;
		padding:20px;
	}

</style>
<div class="ewm_dpm_dashboard">

	<?php include_once dirname(dirname(__FILE__)) . '/dashboard_client/menu/index.php'; ?>

	

	<?php

	if(array_key_exists('ewm_dpm_main_page', $_GET )){

		if(strlen($_GET['ewm_dpm_main_page']) > 0){

			include_once dirname(dirname(__FILE__)) . '/dashboard_client/pages/'.$_GET['ewm_dpm_main_page'].'.php';

		}
		else{

			include_once dirname(dirname(__FILE__)) . '/dashboard_client/pages/home.php';
			
		}

	}
	else{

		include_once dirname(dirname(__FILE__)) . '/dashboard_client/pages/home.php';

	}

	?>

</div>