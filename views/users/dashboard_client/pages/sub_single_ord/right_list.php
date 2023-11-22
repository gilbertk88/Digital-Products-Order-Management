<style type="text/css">
	.ewm_dpm_ord_prof_list{
		width:100%;
		padding:5px 5px 5px 30px;
		overflow:auto;
	}
	.ewm_dpm_ord_t_ {
		float:left;
		padding:5px;
		overflow:auto;
		min-width: 100px;
	}
	.ewm_dpm_ord_v_{
		padding: 0px 20px !important;
		background-color: #fff;
		color: #333;
		float: left;
		border-radius: 4px;
		border: 1px solid #cccccc80;
		background-color: aliceblue;
	}

</style>

<div class="ewm_dpm_ord_profile_number_details">

	<?php 

		$ewm_dpm_ord_profile_number_details = [
			[
				'title'		=>	'Product',
				'details'	=>	$product_list
			],
			[
				'title'		=>	'Amount',
				'details' 	=>	'$'.$get_p_m['_order_total'][0]
			],
			[
				'title'		=>	'Order Date',
				'details' 	=>	$get_post_ord_data->post_date
			],
		];

		$line_number = 5;

		foreach( $ewm_dpm_ord_profile_number_details as $row_value ) {

			$row_value_details = '';

			if( is_array( $row_value['details'] ) ) {

				$item_count = 0 ;

				foreach( $row_value['details'] as $single_value ){
					$row_value_details .= '<span data-single-product-id="'.$single_value['id'].'">'. $single_value['name']. '</span>';
					if( $item_count > 0 ){
						$row_value_details .= ', ';
					}
					$item_count++;
				}

			}
			else{
				$row_value_details = $row_value['details'];
			}

			echo '
				<div class="ewm_dpm_ord_prof_list">
					<div class="ewm_dpm_ord_t_">'. $row_value['title'] .'</div>
					<div class="ewm_dpm_ord_v_">'. $row_value_details .'</div>
			</div>';

		}

	?>
				
</div>

    