<style>
	.ewm_dpm_ord_details{
		padding: 20px;
		border: 1px #cccccc50 solid;
		overflow: auto;
		width: 100%;
		border-radius: 4px;
	}
	.ewm_dpm_ord_det_top_menu{
		width: 100%;
		padding: 5px 30px;
		overflow: auto;
		background-color: #f0f0f082;
		color: #333;
		margin-bottom: 40px;
		border-radius: 5px;
		border: 0px solid #3335;
	}
	.ewm_dpm_ord_det_body{
		width:100%;
		overflow:auto;
	}
	.ewm_dpm_ord_details_list{
		width:60%;
		float:left;
	}
	.ewm_dpm_ord_order_det_chat{
		float:left;
		width:35%;
	}
	.ewm_dpm_single_data_point_button{
		background-color:cornflowerblue !important;
		padding: 0px 20px !important;
		border-radius: 40px !important;
		color: #fff !important;
	}
</style>

<?php 

$get_post_ord_data = get_post( $_GET['ord_id'] );

$post_parent_list = get_posts([
	'post_parent'   => $_GET['ord_id'],
	"post_type"     => "ewmdpm_f_d_v",
	"post_status"   => "publish"
]);

$list_of_values = [];

if ( count($post_parent_list) > 0 ) {
foreach ($post_parent_list as $post_parent_s) {
	
    $post_parent_Data = get_post_meta($post_parent_s->ID);

    foreach ($post_parent_Data as $data_k => $data_v) {
        //var_dump($data_k );
        if (str_starts_with($data_k, 'title_')) {
            $data_k_arr = explode('_', $data_k);
            array_push($list_of_values, [
                'title'			=> $data_k_arr[3],
                'data_code'		=> $data_k ,
                'data_value'	=> $data_v[0],
                'value_date_id'	=> $post_parent_s->ID
            ]);
        }
    }
}
}

$get_p_m = get_post_meta( $get_post_ord_data->ID );
$order_id = $get_post_ord_data->ID;
$order = wc_get_order( $order_id );
$items = $order->get_items();
$product_list = [];

foreach ($items as $item) {
    $product_name = $item->get_name();
    $product_id = $item->get_product_id();
	array_push( $product_list, [ 'name' => $product_name, 'id' => $product_id ] );
    // $product_variation_id = $item->get_variation_id();
}

?>

<div class="ewm_dpm_ord_details" data-ord-numb="<?php echo $_GET['ord_id'] ; ?>" >
	<div class="ewm_dpm_ord_det_top_menu">
		Order Id: <?php echo $_GET['ord_id']; ?>
	</div>
	<div class="ewm_dpm_ord_det_body">
		<div class="ewm_dpm_ord_details_list">
			<table>
				<thead>
					<tr>
						<td><b>Title</b></td>
						<td><b>Value</b></td>
					</tr>
				</thead>
				<tbody>
					<?php 

					foreach ($list_of_values as $value) {
						// 'title'		=>$data_k_arr[3],
						// 'data_code'	=>$data_k ,
			      		// 'data_value'=>$data_v[0]

			
						echo '
							<tr>
								<td>'.$value['title'].'</td>
								<td class="'.$value['data_code'].'" >'.$value['data_value'].'</td>
								<td><input type="button" class="ewm_dpm_single_data_point_button" data-singledata-post_id ="'.$value['value_date_id'].'" data-singledata-code="'.$value['data_code'].'" value="Edit"></td>
							</tr>';
					}

					$line_number = 12;

					for( $i = 1; $i < $line_number; $i++ ) {
						
					}
					?>		
				</tbody>
			</table>
		</div>
		<div class="ewm_dpm_ord_order_det_chat">

			<?php include_once dirname(dirname(__FILE__)) . '/pages/sub_single_ord/right_list.php'; ?>
			
			<?php include_once dirname(dirname(__FILE__)) . '/pages/sub_single_ord/chat.php'; ?> 
			
		</div>
	</div>
</div>

<?php

	include_once dirname(dirname(__FILE__)) . '/pages/sub_single_ord/old_ticket_popup.php';

	include_once dirname(dirname(__FILE__)) . '/pages/sub_single_ord/new_ticket_popup.php';

	include_once dirname(dirname(__FILE__)) . '/pages/sub_single_ord/single_data_point_poupup.php'

?>
