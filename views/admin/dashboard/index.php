<style>
	.ewm_dpm_order_summ{
		width:90%;
		overflow:auto;
		margin-top:10px;
		padding:50px 10px 10px 40px;
	}
	.ewm_dpm_order_single{		
		padding: 40px;
		border: 0px solid #ccc;
		border-radius: 15px;
		float: left;
		min-height: 78px;
		font-size: 18px;
		margin-right: 1%;
		background: #65d2fa;
		width: 20%;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
		color: #fff;
	}
	.ewm_dpm_ticket_summ{
		width:90%;
		overflow:auto;
		padding:10px 10px 10px 40px;
	}
	.ewm_dpm_ticket_single{
		padding: 40px;
		border: 0px solid #ccc;
		border-radius: 15px;
		float: left;
		min-height: 78px;
		font-size: 18px;
		margin-right: 1%;
		background: #65d2fa;
		width: 20%;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
		color: #fff;
	}
	.ewm_dpm_order_explanation, .ewm_dpm_tkt_explanation{
		font-size: 12px;
		color:#fff;
	}
</style>
<?php

	$args_ord = array(
		'numberposts'   => 900,
		'post_type'     => 'shop_order',
		"post_status"   => "wc-processing" 
	);

	$ewm_dpm_orders = get_posts( $args_ord );

	$args_tkt = array(
		'numberposts' => 900,
		'post_type'   => 'ewm_dpm_ticket',
	);

	$ewm_dpm_ticket = get_posts( $args_tkt );

	$ewm_dpm_ticket_count = 0 ;

	foreach( $ewm_dpm_ticket as $ticket ){
		
        $old_ticket_status = get_post_meta( $ticket->ID, 'ewm_dpm_ticket_status', true );

		if( $old_ticket_status == 'new' ||  $old_ticket_status == 'progress' ){
			$ewm_dpm_ticket_count++;
		}

	}

?>
<div>
	<div class="ewm_dpm_order_summ">
		<div class="ewm_dpm_order_single">
			<center>Active Orders<center><br>
			<span><?php echo count($ewm_dpm_orders) ; ?></span>
		</div>
		<div class="ewm_dpm_order_single">
			<center>Urgent Orders<br><span class="ewm_dpm_order_explanation">( Almost Overdue )</span><center><br>
			<span>0</span>
		</div>
		<div class="ewm_dpm_order_single">
			<center>Overdue Orders<center><br>
			<span>0</span>
		</div>
	</div>
	<div class="ewm_dpm_ticket_summ">
		<div class="ewm_dpm_ticket_single">
			<center>Active Tickets<center><br>
			<span><?php echo $ewm_dpm_ticket_count ; ?></span>
		</div>
		<div class="ewm_dpm_ticket_single">
			<center>Urgent Tickets <br> <span class="ewm_dpm_tkt_explanation">( Almost Overdue )</span><center><br>
			<span>0</span>
		</div>
		<div class="ewm_dpm_ticket_single">
			<center>Overdue Tickets<center><br>
			<span>0</span>
		</div>
	</div>
	
</div>