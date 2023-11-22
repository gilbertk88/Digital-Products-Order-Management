<style>
.ewm_dpm_order_summary_sub{
	border:1px solid #cccccc70;
	margin-bottom: 40px;
	border-radius: 5px;
	box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
}
.ewm_dpm_order_title{
	font-size:22px;
	width:100%;
	padding:25px;
}
.ewm_dpm_single_ord_view{
	border:0px !important;
	cursor:pointer !important;
	background: cornflowerblue !important;
    color: #fff !important;
    border-radius: 5px !important;
    padding: 3px 30px !important;
}
.ewm_dpm_f_numb_item_ord{
    padding-left: 30px;
}
</style>

<?php 

$args = array(
	'numberposts'   => 900,
	'post_type'     => 'shop_order',
	"post_status"   => "wc-processing" 
);

$ewm_dpm_orders = get_posts( $args );

?>

<div class="ewm_dpm_order_summary_sub">

	<div class="ewm_dpm_order_title"><center>Active Orders</center></div>

	<table>
		<thead>
			<td>Order Id</td>
			<td>Order Date</td>
			<td>Order Status</td>
			<td></td>
		</th>
		<tbody>
			<?php
			
				$ewm_dpm_orders = array_reverse( $ewm_dpm_orders );

				$ord_tech_count = 0 ;

				foreach( $ewm_dpm_orders as $key_order => $value_order ) {

					if( $ord_tech_count > 4 ){

						continue;

					}

					$order_statuses_l = [
						'wc-pending'    => _x( 'Pending payment', 'Order status', 'woocommerce' ),
						'wc-processing' => _x( 'Processing', 'Order status', 'woocommerce' ),
						'wc-on-hold'    => _x( 'On hold', 'Order status', 'woocommerce' ),
						'wc-completed'  => _x( 'Completed', 'Order status', 'woocommerce' ),
						'wc-cancelled'  => _x( 'Cancelled', 'Order status', 'woocommerce' ),
						'wc-refunded'   => _x( 'Refunded', 'Order status', 'woocommerce' ),
						'wc-failed'     => _x( 'Failed', 'Order status', 'woocommerce' ),
					];

					$ewm_dpm_orders_l = $order_statuses_l[ $value_order->post_status ];

					echo '<tr>
						<td class="ewm_dpm_f_numb_item_ord"> #'.$value_order->ID.' </td>
						<td> '.$value_order->post_date.' </td>
						<td> '.$ewm_dpm_orders_l .' </td>
						<td> <input type="button" class="ewm_dpm_single_ord_view" value="View" data-single-ord="'.$value_order->ID.'"> </td>
					</tr>';

					$ord_tech_count++;

				}

			?>
		</tbody>
	</table>
</div>