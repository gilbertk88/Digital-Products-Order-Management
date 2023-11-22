<style>
	.ewm_dpm_parent_od_wrapper{
		border: 0px solid #ccc;
		padding: 20px;
		margin:30px 30px 0px 0px;
		background-color: #fff;
		border-radius: 4px;
		box-shadow: 0 5px 8px 0 rgb(151 151 151 / 10%), 0 6px 10px 0 rgb(118 118 118 / 10%) !important;
	}
	.ewm_dpm_top_od_header{
		padding: 20px 0px;
		font-size:18px;
		font-weight:bold;
	}
	.ewm_dpm_main_od_content{

	}
	.ewm_dpm_od_table_list{

	}
	.ewm_dpm_single_cell_od_header{
		padding: 10px 25px;
		background-color:#cccccc30;
		border-radius:5px;
		min-width: 240px;
	}
	.ewm_dpm_single_cell_od_body{
		padding: 5px 15px;
	}
	.ewm_dpm_view_manage_od_button{
		background-color:#039bb8;
		padding: 5px 50px;
		color:white;
		border: 0px;
		cursor: pointer;
		border-radius:4px;
	}
	.ewm_dpm_new_single_od_button{
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
	.ewm_dpm_top_menu_area_od{
		width:100%;
		overflow: auto !important;
	}
	.ewm_dpm_single_cell_od_description{
		font-size:10px;
	}
</style>

<div class="ewm_dpm_parent_od_wrapper">

	<div class="ewm_dpm_top_od_header">
		<center>Order Form Details</center>
	</div>
	<div class="ewm_dpm_top_menu_area_od">
		
	</div>

	<div class="ewm_dpm_main_od_content">

	<style>
	.ewm_dpm_od_details{
		padding: 20px;
		border: 1px #cccccc50 solid;
		overflow: auto;
		width: 100%;
		border-radius: 4px;
	}
	.ewm_dpm_od_det_top_menu{
		width: 100%;
		padding: 5px 30px;
		overflow: auto;
		background-color: #f0f0f082;
		color: #333;
		margin-bottom: 40px;
		border-radius: 5px;
		border: 0px solid #3335;
	}
	.ewm_dpm_od_det_body{
		width:100%;
		overflow:auto;
	}
	.ewm_dpm_od_details_list{
		width:60%;
		float:left;
	}
	.ewm_dpm_od_order_det_chat{
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

$get_post_od_data = get_post( $_GET['single_order_ordervalues'] );

$post_parent_list = get_posts([
	'post_parent'   => $_GET['single_order_ordervalues'],
	"post_type"     => "ewmdpm_f_d_v",
	"post_status"   => "publish"
]);

$list_of_values = [];

if ( count($post_parent_list) > 0 ) {
foreach($post_parent_list as $post_kk => $post_parent_s) {

    $post_parent_Data = get_post_meta($post_parent_s->ID);

    foreach ($post_parent_Data as $data_k => $data_v) {
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

$get_p_m = get_post_meta( $get_post_od_data->ID );
$order_id = $get_post_od_data->ID;
$order = wc_get_order( $order_id );
$items = $order->get_items();
$product_list = [];

foreach ( $items as $item ) {
    $product_name = $item->get_name();
    $product_id = $item->get_product_id();
	array_push( $product_list, [ 'name' => $product_name, 'id' => $product_id ] );
    // $product_variation_id = $item->get_variation_id();
}

?>


		<table class="ewm_dpm_od_table_list">
			<thead>
				<td class="ewm_dpm_single_cell_od_header">
					Title
				</td>
				<td class="ewm_dpm_single_cell_od_header">
					Value
				</td>
				
				<td class="ewm_dpm_single_cell_od_header">
				
				</td>
			</thead>
			<tbody>
				<?php

				foreach ( $list_of_values as $row => $data_order ) {
					
					echo '
						<tr>
							<td class="ewm_dpm_single_cell_od_body ewmdpam_v_code_'. $data_order['data_code'].'">
								'. $data_order['title'] .'
							</td>
							<td class="ewm_dpm_single_cell_od_body ewmdpam_v_value_'. $data_order['data_code'].'">
							'. $data_order['data_value'] .'
							</td>
							<td class="ewm_dpm_single_cell_od_body">
							<center>
								<input type="button" value="Edit" data-code-id="'. $data_order['data_code'] .'" class="ewm_dpm_view_manage_od_button">
							</center>
							</td>
						</tr>';
				
				}
				?>
			</tbody>
		</table>

	</div>

</div>
<?php 

include_once THEMOSIS_PUBLIC_DIR . '/views/admin/orders/edit_single_value_data.php';        

?>
