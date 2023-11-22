<style>
	.ewm_dpm_parent_no_wrapper_single{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 8px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_no_header_single{
		padding: 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_no_content_single{}
	.ewm_dpm_no_table_list_single{
		margin-bottom:40px;
		margin-top:20px;
	}
	.ewm_dpm_single_cell_no_header_single{
		padding: 10px 25px;
		background-color: #13b184f2;
		border-radius: 4px;
		color: #ffff;
	}
	.ewm_dpm_single_cell_no_body_single{
		padding: 10px 10px 2px 15px;
		background-color:#fff;
		min-width:180px;
	}
	.ewm_dpm_single_cell_no_body_single_value{
		padding: 5px;
		font-weight:bold;
		min-width:500px;
		border:0px solid #74af9a24;
	}
	.ewm_dpm_view_manage_no_button_single{
		background-color:#13b97d;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_new_single_no_button_single{
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
	.ewm_dpm_top_menu_area_no_single{
		width: 90%;
		overflow: auto !important;
		padding: 20px 50px;

	}
	.ewm_dpm_single_cell_no_description_single{
		font-size:10px;
	}
	.ewm_button_no{
		float:right;			
		background-color: #007e55 !important;
		padding: 5px 50px;
		font-size: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 5px;
		float: right;
		box-shadow: 0 5px 8px 0 rgb(97 97 97 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_button_no{
		float:right;
		background-color: #007e55 !important;
		padding: 5px 50px;
		font-size: 15px;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 5px;
		float: right;
		box-shadow: 0 5px 8px 0 rgb(97 97 97 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	#ewm_dpm_submit_new_order{
		width: 100%;
		background-color: #2ea2cc !important;
		padding: 6px 50px;
		font-size: 15px;
		font-weight: 400;
		color: white;
		border: 0px;
		cursor: pointer;
		border-radius: 50px;
		float: right;
		box-shadow: 0 5px 8px 0 rgb(97 97 97 / 50%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_single_input_f{
		width: 100%;
		border: 1px solid gray;
		border-radius: 50px;
		padding:5px 15px;
	}
	#_order_stage{
		width: 100%;
		font-weight: 380;
	}
	.ewmdpm_main_stage{
		width: 100%;
		overflow: auto;
		padding:10px;
		margin-bottom: 20px;
	}
	.ewmdpm_order_creation_stage{
		width: 18%;
		font-size: 14px;
		font-weight: 300;
		color: #222;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
		border-radius: 8px;
		float: left;
		border: 1px solid #cccccc59;
		padding: 9px;
		cursor: pointer;
		margin-right: 5px;
		background: #ececec17;
	}
	.ewmdpm_order_creation_stage_settings{
		background-color: #f0f0f1;
		padding: 15px;
		color: #333;
		border: 0px;
		cursor: pointer;
		border-radius: 15px;
		float: right;
		margin: 10px;
		font-size: 14px;
		font-weight: 400;
	}
	.ewmdpm_order_creation_stage_active{
		background-color: #2ea7d3;
    	color: #fff;
    	border-radius: 10px;
	}
	.ewm_dpm_ord_det_sec{
		padding: 5px 15px;
		overflow: auto;
		background: #e7e7e7cf;
		color: #333;
		float: left;
		margin-bottom: 8px;
		border-radius: 5px;
		margin-right: 2px;
	}
</style>

<?php
	$ord_name = 'New Order';
	// var_dump( get_post_meta( $_GET['single_order_id'] ) );
	if( $_GET['single_order_id'] > 0 ){
		$__single_order = get_post( $_GET['single_order_id'] );
		$ord_name = 'Order #'.$__single_order->ID;
	}
	else{
		// create new order.
		$ord_draft = EwmDpm\Hooks\MyUser::create_new_order_draft();
		echo '<script>
			window.location.search += "&single_order_id=" + '. $ord_draft .';
		</script>';
	}
	echo '<input value="'.$_GET['single_order_id'].'" type="hidden" id="ewm_dpm_single_order_id">';

	$single_order = get_post( $_GET['single_order_id'] );

	// var_dump( $single_order );
	// echo '<br><br>';
	// $order_meta =  get_post_meta( $_GET['single_order_id'] );
	// var_dump( $order_meta );

?>

<div class="ewm_dpm_parent_no_wrapper_single">
<div class="ewm_dpm_top_menu_area_no_single">
	<div class="ewm_dpm_ord_t">
		<h1> <?php echo $ord_name; ?></h1>
	</div>
	<?php
		$arr_list = [
			[
				'links'=> admin_url('admin.php?page=ewm-dpm-orders'),
				'name' => 'Order'
			],
			[
				'links'=> admin_url('admin.php?page=ewm-dpm-orders&single_order_id='.$_GET['single_order_id'] ),
				'name' => $ord_name
			]
		];	
		echo EwmDpm\Hooks\MyUser::bread_crumb( $arr_list );
	?>

	<div class="ewm_dpm_top_no_header_single">
		<a href="<?php echo  admin_url('admin.php?page=ewm-dpm-orders&ewm_c_stage=single_order_settings&single_order_id='.$_GET['single_order_id'] ); ?> " class="">
			<div class='ewmdpm_order_creation_stage_settings' data-creation-stage="stage8" id="ewm_stage" >
				<center> Order Settings </center>
			</div>
		</a>
		<div class="ewmdpm_main_stage">
			<div class='ewmdpm_order_creation_stage' data-creation-stage="stage1" id="ewm_stage1" ><center> Product >> </center></div>
			<div class='ewmdpm_order_creation_stage' data-creation-stage="stage2" id="ewm_stage2" ><center> Client Details >> </center> </div>
			<div class='ewmdpm_order_creation_stage' data-creation-stage="stage7" id="ewm_stage7" ><center> Communication >> </center></div>
			<div class='ewmdpm_order_creation_stage' data-creation-stage="stage3" id="ewm_stage3" ><center> Payments </center></div>
			<?php // echo $single_no_p->post_title ; ?>
		</div>
	</div>

	<style>
		.ewm_dpm_order_details_list{
			width:95%;
			padding:0px;
			overflow: auto;
		}
	</style>
	<div class="ewm_dpm_order_details_list">
		<?php
			// var_dump($__single_order);
			$_customer_meta = get_post_meta( $__single_order->ID );
			$_customer_user = get_post_meta( $__single_order->ID, '_customer_user' , true );			
			$wc_get_order_statuses = wc_get_order_statuses();
			$client_details = '' ;
			// var_dump( $_customer_user );

			if( strlen($_customer_user) > 0){
				if( $_customer_user > 0 ) {
					$__single_post_author = get_userdata( $_customer_user );
					$client_details = $__single_post_author->data->display_name .' ('. $__single_post_author->data->user_login.' | '. $__single_post_author->data->user_email.' ) ';
				}
			}
			// array(8) { ["wc-pending"]=> string(15) "Pending payment" ["wc-processing"]=> string(10) "Processing" ["wc-on-hold"]=> string(7) "On hold" ["wc-completed"]=> string(9) "Completed" ["wc-cancelled"]=> string(9) "Cancelled" ["wc-refunded"]=> string(8) "Refunded" ["wc-failed"]=> string(6) "Failed" ["wc-checkout-draft"]=> string(5) "Draft" }
			$order_details_list = [
				[
					'name'=> 'Order Number',
					'data'=> '#'.$__single_order->ID
				],
				[
					'name'=> 'Client',
					'data'=> $client_details
				],
				[
					'name'=> 'Order Creation Date',
					'data'=> $__single_order->post_date
				],
				[
					'name'=> 'Order Deadline',
					'data'=> 'Unspecified' , // $__single_order->post_title
				],
				[
					'name'=> 'Order Stage',
					'data'=> $wc_get_order_statuses[ $__single_order->post_status ]
				],
				[
					'name'=> 'Order Last Modification',
					'data'=> $__single_order->post_modified
				]
			];
			$html_ord_list = '';
			foreach( $order_details_list as $key_d => $val_d ){
				$html_ord_list .= '<span class="ewm_dpm_ord_det_sec">'.$val_d['name'].': <b>'.$val_d['data'] .'</b> </span>';
			}
			echo $html_ord_list;
	?>
	</div>
</div>

<div class="ewm_dpm_main_no_content_single">
<?php
	if( !array_key_exists( 'ewm_c_stage', $_GET ) ){
		$_GET['ewm_c_stage'] = 'stage1';
	}
	$html_script = "<script type=\"text/javascript\">";
	$html_script .= '
	document.addEventListener(\'DOMContentLoaded\', function(event) {
		document.getElementById( "ewm_'.$_GET['ewm_c_stage'] .'" ).classList.add(\'ewmdpm_order_creation_stage_active\');
	})';
	$html_script .= "</script>";
	echo $html_script ;
	$order_list_url = THEMOSIS_PUBLIC_DIR . '/views/admin/orders/new_order_creation_stage/'.$_GET['ewm_c_stage'].'.php';
	include_once $order_list_url ;
?>
</div>
</div>

<script type="text/javascript">

	var ewm_dpm_open_workorder = 'no';
	// var ewm_dpm_workorder_p_id = '0';
	<?php
	if( array_key_exists( 'open_workorder', $_GET ) ){
		echo 'ewm_dpm_open_workorder = "'.$_GET['open_workorder'].'";';
		echo 'ewm_dpm_workorder_p_id = "'.$_GET['wo_p_id'].'" ;';	
	}
	?>

</script>
