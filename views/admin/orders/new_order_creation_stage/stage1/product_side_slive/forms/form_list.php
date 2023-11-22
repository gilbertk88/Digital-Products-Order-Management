<div class="form-group_all form-group_<?php echo $value_t['id']; ?>  ewm_dm_form_wrap_top_d">
	<div class="ewm_dpm_header_d" >
		<div class="ewm_dpm_menu_product_single_t" data-f-s-p="<?php echo $value_t['id']; ?>"><center><?php echo $value_t['name']; ?> Form </center></div>
	</div>

	<input type="hidden" id="ewm_dpm_product_id" value="<?php echo $value_t['id'] ?>" >
	<div class="ewm_dpm_menu_product_list">
		<center><center>
	</div>

		<div class="form-group_<?php echo $value_t['id']; ?> form-group_all">
			<div class="form-group_title">
				
			</div>
			<div>
			<?php
				$product_id = $value_t['id'];
				$post_parent_list = get_posts([
					'post_parent'   => $product_id,
					"post_type"     => "ewmdpm_f_d_v",
					"post_status"   => "publish"
				] );

				if( count( $post_parent_list ) == 0 ){
					
					// create data form for product $value_t['id'] $value_t['id'] 
					EwmDpm\Hooks\MyUser::create_new_form_post([
						'product_id'=> $product_id,
						'order_id'  => $_GET['single_order_id']
					]);
					
					$post_parent_list = get_posts([
						'post_parent'   => $product_id,
						"post_type"     => "ewmdpm_f_d_v",
						"post_status"   => "publish"
					] );
				}

				if ( count( $post_parent_list ) > 0 ) {
					$post_parent_list_meta  = get_post_meta( $post_parent_list[0]->ID );
					// var_dump( $post_parent_list_meta );
				}

				$form_id = get_post_meta( $value_t['id'] , 'ewm_dpm_form_id' , true );

				$ewm_get_post_meta = [];

				$form_shows = FALSE;

				if( $form_id ) {
					$ewm_get_post_meta = get_all_form_fields( $form_id );
					$form_shows = TRUE ;
				}

				// 'title_'.$entry["form_id"]. '_'.$field->id .'_'. $field->label
				// var_dump( $ewm_get_post_meta );

				foreach( $ewm_get_post_meta as $key_r => $value_r ){
					$ewm_dpm__title_d = 'title_'.$form_id. '_'.$value_r[0] .'_'. $value_r[1];
					$ewm_dpm_val_d = get_post_meta( $post_parent_list[0]->ID , $ewm_dpm__title_d , true );
					// var_dump( $ewm_dpm_val_d );

					echo  '<div class="ewm_dpm_s_title">' .$value_r[1]. '</div><input type="text" class="form_f_'. $value_t['id'] .' form_f_css_stage4" data-field-name="name" data-code-details = "'.$ewm_dpm__title_d.'" id="'. $value_r[1] .'" value="'.$ewm_dpm_val_d.'">';
				}
	
			$post_parent_list = get_posts([
				'post_parent'   => $value_t['id'],
				"post_type"     => "ewmdpm_f_d_v",
				"post_status"   => "publish"
			]);

			if (count($post_parent_list) > 0) {
				$post_parent_list_Data = get_post_meta( $post_parent_list[0]->ID );
			}

		?>
					<center>
						<input type="button" value="Save( Product '<?php echo $value_t['name']; ?>' Form )" class="button_f_<?php echo $value_t['id']; ?> ewm_form_f_s_b" data-field-name="name" data-p-id="<?php echo $value_t['id']; ?>"><br>
					</center>
				
				
			</div>
		</div>
	<div>

	</div>
	
</div>