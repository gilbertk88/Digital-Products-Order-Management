<style>
.ewm_dpm_order_summary_sub{
	border:1px solid #80808026;
	margin-bottom: 40px;
	border-radius: 5px ;
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
</style>

<?php 

$ewm_dpm_stages = [
	[ 'code'=> 'wc-pending', 'title' => 'Pending payment' ],
	[ 'code'=> 'wc-processing','title' => 'Active Orders' ],
	[ 'code'=> 'wc-on-hold','title' => 'On hold' ],
	[ 'code'=> 'wc-completed', 'title' => 'Completed' ],
	[ 'code'=> 'wc-cancelled', 'title'  => 'Cancelled' ],
	[ 'code'=> 'wc-refunded','title' => 'Refunded' ],
	[ 'code'=> 'wc-failed', 'title' => 'Failed' ],
];

foreach ( $ewm_dpm_stages as $ewm_stages_key => $ewm_stages_value ) {
	
    $args = array(
        'numberposts'   => 900,
        'post_type'     => 'shop_order',
        "post_status"   => $ewm_stages_value['code']
    );

    $ewm_dpm_orders = get_posts( $args );

	if( count( $ewm_dpm_orders ) == 0 ) {
		continue;
	}

    ?>

	<div class="ewm_dpm_order_summary_sub">

		<div class="ewm_dpm_order_title"><center><?php echo $ewm_stages_value['title']; ?></center></div>

		<table>
			<thead>
				<td>Order Id</td>
				<td>Order Date</td>
				<td>Order Status</td>
				<td></td>
			</th>
			<tbody>
				<?php

                        $ewm_dpm_orders = array_reverse($ewm_dpm_orders);

    foreach ($ewm_dpm_orders as $key_order => $value_order) {

        $order_statuses_l = [
            'wc-pending'    => _x('Pending payment', 'Order status', 'woocommerce'),
            'wc-processing' => _x('Processing', 'Order status', 'woocommerce'),
            'wc-on-hold'    => _x('On hold', 'Order status', 'woocommerce'),
            'wc-completed'  => _x('Completed', 'Order status', 'woocommerce'),
            'wc-cancelled'  => _x('Cancelled', 'Order status', 'woocommerce'),
            'wc-refunded'   => _x('Refunded', 'Order status', 'woocommerce'),
            'wc-failed'     => _x('Failed', 'Order status', 'woocommerce'),
        ];

        $ewm_dpm_orders_l = $order_statuses_l[ $value_order->post_status ];

        echo '<tr>
			<td> #'.$value_order->ID.' </td>
			<td> '.$value_order->post_date.' </td>
			<td> '.$ewm_dpm_orders_l .' </td>
			<td> <input type="button" class="ewm_dpm_single_ord_view" value="View" data-single-ord="'.$value_order->ID.'"> </td>
		</tr>';
    }

    ?>
			</tbody>
		</table>
	</div>

<?php } 

function playerrr_manager(){

    //echo 'hello';

    include_once THEMOSIS_PUBLIC_DIR . '/views/admin/users_manager/userlist_list.php';

}

// playerrr_manager();

?>

