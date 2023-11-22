jQuery(document).ready(function($) {

	var ewm_dpm_focus_on_new_ticket = function(ticket) {

		$( '.ewm_dpm_ticket_menu_items_new' ).addClass( 'ewm_dpm_ticket_menu_items_focus' );
		$( '.ewm_dpm_ticket_menu_items_new' ).removeClass( 'ewm_dpm_ticket_menu_items' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_progress').addClass( 'ewm_dpm_ticket_menu_items' );
		$('.ewm_dpm_ticket_menu_items_progress').removeClass( 'ewm_dpm_ticket_menu_items_focus' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_resolved').addClass( 'ewm_dpm_ticket_menu_items' );
		$('.ewm_dpm_ticket_menu_items_resolved').removeClass( 'ewm_dpm_ticket_menu_items_focus' );

		// Update on status server

	}

	var ewm_dpm_focus_on_progress_ticket = function(){

		$( '.ewm_dpm_ticket_menu_items_progress' ).addClass( 'ewm_dpm_ticket_menu_items_focus' );
		$( '.ewm_dpm_ticket_menu_items_progress' ).removeClass( 'ewm_dpm_ticket_menu_items' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_new').addClass( 'ewm_dpm_ticket_menu_items' );
		$('.ewm_dpm_ticket_menu_items_new').removeClass( 'ewm_dpm_ticket_menu_items_focus' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_resolved').addClass( 'ewm_dpm_ticket_menu_items' );
		$('.ewm_dpm_ticket_menu_items_resolved').removeClass( 'ewm_dpm_ticket_menu_items_focus' );

		// Update on status server

		// Update on status server
	}

	var ewm_dpm_focus_on_resolved_ticket = function(){

		$( '.ewm_dpm_ticket_menu_items_progress' ).addClass( 'ewm_dpm_ticket_menu_items' );
		$( '.ewm_dpm_ticket_menu_items_progress' ).removeClass( 'ewm_dpm_ticket_menu_items_focus' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_new').addClass( 'ewm_dpm_ticket_menu_items' );
		$('.ewm_dpm_ticket_menu_items_new').removeClass( 'ewm_dpm_ticket_menu_items_focus' );

		//--------------------------------------------------------------------------------------------

		$( '.ewm_dpm_ticket_menu_items_resolved' ).addClass( 'ewm_dpm_ticket_menu_items_focus' );
		$( '.ewm_dpm_ticket_menu_items_resolved' ).removeClass( 'ewm_dpm_ticket_menu_items' );

		// Update on status server

	}

	var ewm_dpm_update_new_ticket = function ( args = [] ) {

		var form_data = new FormData();
		
		form_data.append( 'action', 'ewm_dpm_update_ticket_status' );
		form_data.append( 'ewmdsm_ticket_status', args.status );
		form_data.append( 'ewmdsm_ticket_id', args.ticket_id );

		jQuery.ajax({

			url: ajax_object.ajaxurl,

			type: 'post',

			contentType: false,

			processData: false,

			data: form_data,

			success: function ( response ) {

				console.log( response );

				response = jQuery.parseJSON( response );

			},

			error: function (response) {

				console.log( response );

			}

		} ) ;

	};

	var ewm_dpm_ticket_listener = function(){

		$('.ewm_dpm_ticket_menu_items_new').click(function(){

			ewm_dpm_focus_on_new_ticket();

			ewm_dpm_update_new_ticket({
				'status':'new',
				'ticket_id': $('.ewm_dpm_single_mes_send_message_button').data('ticket-id')
			});

		});

		$('.ewm_dpm_ticket_menu_items_progress').click(function(){

			ewm_dpm_focus_on_progress_ticket();

			ewm_dpm_update_new_ticket( {
				'status':'progress',
				'ticket_id': $('.ewm_dpm_single_mes_send_message_button').data('ticket-id')
			} );

		});

		$('.ewm_dpm_ticket_menu_items_resolved').click(function(){

			ewm_dpm_focus_on_resolved_ticket();

			ewm_dpm_update_new_ticket( {
				'status':'resolved',
				'ticket_id': $('.ewm_dpm_single_mes_send_message_button').data('ticket-id')
			} );

		});

	};

	var ewm_dpm_update_ticket_comments = function ( args = {} ){

		$('.ewm_dpm_ticket_chat_box').html('');

		args.comment_list.forEach(function(currentValue, index, arr){

			single_message_item = '<div class="ewm_dpm_single_ticket_message">\
					<div class="ewm_dpm_single_mes_profile">' + args.user_comments_list[arr[index].comment_ID ][0] + '</div>\
					<div class="ewm_dpm_single_mes_actual_message"> '+ arr[index].comment_content +' <br> <span class="ewm_dpm_second_line_det">'+ args.user_comments_list[arr[index].comment_ID ] + ' - '+ arr[index].comment_date_gmt+' </span> </div>\
				</div>';

			$('.ewm_dpm_ticket_chat_box').append( single_message_item );

			var objDiv = document.getElementById("ewm_dpm_ticket_chat_box");
			objDiv.scrollTop = objDiv.scrollHeight;

		})

	};

	var ewm_dpm_update_single_ticket_comments = function ( args = {} ){

		// console.log( args );

		single_message_item = '<div class="ewm_dpm_single_ticket_message">\
				<div class="ewm_dpm_single_mes_profile">GK</div>\
				<div class="ewm_dpm_single_mes_actual_message"> '+ args.comment_details.comment_content +' <br> <span class="ewm_dpm_second_line_det">'+ args.user + ' - '+ args.comment_details.comment_date_gmt+' </span> </div>\
			</div>';

		$('.ewm_dpm_ticket_chat_box').append( single_message_item );

		var objDiv = document.getElementById("ewm_dpm_ticket_chat_box");
		objDiv.scrollTop = objDiv.scrollHeight;

	};

	var ewm_dpm_populate_ticket_details = function( args = [] ){

		$('.ewm_dpm_ticket_issue_box_title').html( args.single_ticket.post_title );

		$('.ewm_dpm_ticket_issue_box_detail').html( args.single_ticket.post_content );

		ewm_dpm_update_ticket_comments( args );

		if( args.ticket_status == "new" ) {

			ewm_dpm_focus_on_new_ticket();

		}
		if( args.ticket_status == "progress" ) {
	
			ewm_dpm_focus_on_progress_ticket();

		}
		if( args.ticket_status == "resolved" ) {
	
			ewm_dpm_focus_on_resolved_ticket();

		}

	}

	ewm_dpm_ticket_listener();

	var ewm_dpm_get_single_ticket = function( $args = {} ){

		var form_data = new FormData();
		
		form_data.append( 'action', 'ewm_dpm_get_single_ticket' );

		form_data.append( 'ewmdsm_ticket_id', $args.ticket_id );

		jQuery.ajax({

			url: ajax_object.ajaxurl,

			type: 'post',

			contentType: false,

			processData: false,

			data: form_data,

			success: function ( response ) {

				console.log( response );

				response = jQuery.parseJSON( response );

				ewm_dpm_populate_ticket_details( response );

			},

			error: function (response) {

				console.log( response );

			}

		} );

	}

	$('.ewm_dpm_view_manage_ticket_button').click(function() {

		$('.ewm_dpm_popup_ticket_').show();

		$('.ewm_dpm_single_mes_send_message_button').attr('data-ticket-id', $( this ).data('ticket-id') );

		ewm_dpm_get_single_ticket({
			'ticket_id' : $( this ).data('ticket-id'),
		});

	});

	$('.ewm_dpm_popup_close_ticket').click(function(){
		$('.ewm_dpm_popup_ticket_').hide();
	});

	var ewm_dpm_add_comment_to_ticket = function( args = {} ) {

		ewm_dpm_single_mes = $('.ewm_dpm_single_mes_textarea_input').val();

		var form_data = new FormData();
		
		form_data.append( 'action', 'ewm_dpm_add_comment_on_ticket' );

		form_data.append( 'ewmdsm_ticket_id', args.ticket_id );

		form_data.append( 'ewmdsm_ticket_message', args.ticket_message );

		jQuery.ajax({

			url: ajax_object.ajaxurl,

			type: 'post',

			contentType: false,

			processData: false,

			data: form_data,

			success: function ( response ) {

				console.log( response );

				response = jQuery.parseJSON( response );

				ewm_dpm_update_single_ticket_comments(response);

			},

			error: function (response) {

				console.log( response );

			}

		} ) ;

	}

	$('.ewm_dpm_single_mes_send_message_button').click(function(){

		ewm_dpm_add_comment_to_ticket( {
			'ticket_id'		: $( this ).data('ticket-id'),
			'ticket_message': $( '.ewm_dpm_single_mes_textarea_input' ).val(),
		});

		$( '.ewm_dpm_single_mes_textarea_input' ).val('');

	});

	var ewm_dpm_update_t_stage = function( args = {} ){}

	$('.ewm_dpm_ticket_menu_items_d').click(function() {

		ewm_dpm_update_t_stage({
			'stage_id' : $( this ).data('status-id'),
			'ticket_id': $( '.ewm_dpm_single_mes_send_message_button').data('ticket-id')
		});

	});

	var  ewm_dpm_create_single_product =  function(){

		var form_data = new FormData();
		
		form_data.append( 'action', 'ewm_dpm_create_new_product' );

		form_data.append( 'ewm_dpm_name', $('#ewm_dpm_name').val() );

		form_data.append( 'ewm_dpm_form_id', $('#ewm_dpm_form_id').val() );

		form_data.append( 'ewm_dpm_long_description', $('#ewm_dpm_long_description').val() );

		form_data.append( 'ewm_dpm_short_description', $('#ewm_dpm_short_description').val() );

		form_data.append( 'ewm_dpm_payment_type', $('#ewm_dpm_payment_type').val() );

		form_data.append( 'ewm_dpm_retails_price', $('#ewm_dpm_retails_price').val() );

		form_data.append( 'ewm_dpm_p_type_data' , $('#ewm_dpm_p_type_data').val() );

		jQuery.ajax({

			url: ajax_object.ajaxurl,

			type: 'post',

			contentType: false,

			processData: false,

			data: form_data,

			success: function ( response ) {

				console.log( response );

				response = jQuery.parseJSON( response );

			},

			error: function (response) {

				console.log( response );

			}

		} ) ;

	}

	$('.ewm_dpm_single_product_submit').click(function(){

		ewm_dpm_create_single_product();

	});

	var ewm_dpm_edit_single_product =  function( args = {} ){

		var form_data = new FormData();
		
		form_data.append( 'action', 'ewm_dpm_edit_new_product' );

		form_data.append( 'ewm_dpm_product_id', args.product_id );

		form_data.append( 'ewm_dpm_name', $('#ewm_dpm_name').val() );

		form_data.append( 'ewm_dpm_form_id', $('#ewm_dpm_form_id').val() );

		form_data.append( 'ewm_dpm_long_description', $('#ewm_dpm_long_description').val() );

		form_data.append( 'ewm_dpm_short_description', $('#ewm_dpm_short_description').val() );

		form_data.append( 'ewm_dpm_payment_type', $('#ewm_dpm_payment_type').val() );

		form_data.append( 'ewm_dpm_retails_price', $('#ewm_dpm_retails_price').val() );

		form_data.append( 'ewm_dpm_p_type_data' , $('#ewm_dpm_p_type_data').val() );


		jQuery.ajax({

			url: ajax_object.ajaxurl,

			type: 'post',

			contentType: false,

			processData: false,

			data: form_data,

			success: function ( response ) {

				// console.log( response );

				response = jQuery.parseJSON( response );

				alert( 'Product saved.' );

			},

			error: function (response) {

				console.log( response );

			}

		} ) ;

	}

	$('.ewm_dpm_single_product_edit_submit').click(function(){

		ewm_dpm_product_id = $(this).data('product-id');

		ewm_dpm_edit_single_product({
			'product_id': ewm_dpm_product_id,
		});

	})

	$("#ewm_dpm_onetime_select").click(function() {

		$("#ewm_dpm_onetime_select").addClass("ewm_dpm_payment_type_active");

		$("#ewm_dpm_onetime_select").removeClass("ewm_dpm_payment_type_inactive");

		$("#ewm_dpm_subscription_monthly_select").addClass("ewm_dpm_payment_type_inactive");

		$("#ewm_dpm_subscription_monthly_select").removeClass("ewm_dpm_payment_type_active");

		$("#ewm_dpm_payment_type").val('onetime');

	})
	
	$("#ewm_dpm_subscription_monthly_select").click(function() {

		$("#ewm_dpm_subscription_monthly_select").addClass("ewm_dpm_payment_type_active");

		$("#ewm_dpm_subscription_monthly_select").removeClass("ewm_dpm_payment_type_inactive");

		$("#ewm_dpm_onetime_select").addClass("ewm_dpm_payment_type_inactive");

		$("#ewm_dpm_onetime_select").removeClass("ewm_dpm_payment_type_active");

		$("#ewm_dpm_payment_type").val('subscription_monthly');

	})

	$('.ewm_dpm_filter_single_user_item').click(function (){

		ewm_user_type = $( this ).data( 'user-type' );

		window.location.search += '&ewm_user_type=' + ewm_user_type;
       
	})

	$('.ewm_dpm_new_single_pf_button').click(function(e) {

		e.preventDefault();
		$('.ewm_dpm_pf_popup_wrapper').show();
		// Record as new.
		ewm_dpm_pf_clear_feature();
		
	});

	$('.ewm_dpm_pf_pop_close').click(function(){
		$('.ewm_dpm_pf_popup_wrapper').hide();
	})

	var ewm_dpm_pf_add_new_feature = function(){

		var form_data = new FormData();
		
		form_data.append( 'action', 'ewm_dpm_pf_add_feature' );

		form_data.append( 'ewm_dpm_pf_f', $("#ewm_dpm_pf_f").val() ); // Feature

		form_data.append( 'ewm_dpm_pf_fd',$("#ewm_dpm_pf_fd").val() ); // Feature description

		form_data.append( 'ewm_dpm_pf_q', $("#ewm_dpm_pf_q").val() ); // Quantity

		jQuery.ajax( {

			url: ajax_object.ajaxurl,

			type: 'post',

			contentType: false,

			processData: false,

			data: form_data,

			success: function ( response ) {

				console.log( response );

				response = jQuery.parseJSON( response );

				$('.ewm_dpm_pf_popup_wrapper').hide();

				location.reload();

			},

			error: function (response) {

				console.log( response );

			}

		} ) ;

	}

	$('.ewm_dpm_pf_single_field_input_button').click(function(){

		ewm_edit_type = $('#ewm_dpm_pf_edit_type').val(); 

		// if new feature? add feature : else edit feature.
		if(ewm_edit_type == 'new' ){
			ewm_dpm_pf_add_new_feature();
		}

		else if(ewm_edit_type == 'edit' ){
			ewm_post_id = $('#ewm_dpm_pf_post_id').val(); 
			ewm_dpm_pf_edit_feature( ewm_post_id );
		}
		// feature will be a custom post type

	})

	var ewm_dpm_pf_clear_feature = function(){

		$("#ewm_dpm_pf_f").val( '' ); // Feature
	
		$("#ewm_dpm_pf_fd").val('' ); // Feature description
	
		$("#ewm_dpm_pf_q").val(''); // Quantity

		$("#ewm_dpm_pf_edit_type").val( 'new' ); // Post ID

		$('#ewm_dpm_pf_post_id').val( 0 );

	}
	
	var ewm_dpm_pf_populate_feature = function( post_id ){

		$("#ewm_dpm_pf_f").val( $( "#ewm_dpm_pf_f_"+post_id ).html().trim() ); // Feature
	
		$("#ewm_dpm_pf_fd").val($( "#ewm_dpm_pf_fd_"+post_id ).html().trim() ); // Feature description
	
		$("#ewm_dpm_pf_q").val($( "#ewm_dpm_pf_q_"+post_id ).html().trim() ); // Quantity

		$("#ewm_dpm_pf_edit_type").val( 'edit' ); // Post ID

		$('#ewm_dpm_pf_post_id').val( post_id );

	}

	var ewm_dpm_pf_edit_feature = function( post_id ){

		var form_data = new FormData();
			
		form_data.append( 'action', 'ewm_dpm_pf_edit_feature' );
	
		form_data.append( 'ewm_dpm_pf_f', $("#ewm_dpm_pf_f" ).val() ); // Feature
	
		form_data.append( 'ewm_dpm_pf_fd',$("#ewm_dpm_pf_fd" ).val() ); // Feature description
	
		form_data.append( 'ewm_dpm_pf_q', $("#ewm_dpm_pf_q" ).val() ); // Quantity

		form_data.append( 'ewm_dpm_pf_p_id', post_id ); // Post ID
	
		jQuery.ajax( {
	
			url: ajax_object.ajaxurl,
	
			type: 'post',
	
			contentType: false,
	
			processData: false,
	
			data: form_data,
	
			success: function ( response ) {
	
				console.log( response );

				location.reload();

			},
	
			error: function (response) {
	
				console.log( response );
	
			}
	
		} ) ;

	}

	$('.ewm_dpm_view_manage_pf_button').click(function(){

		$('.ewm_dpm_pf_popup_wrapper').show();

		// Record as edit.
		$('#ewm_dpm_pf_edit_type').val('edit');

		// add values to fields
		data_pf_id = $(this).data('pf-id');

		ewm_dpm_pf_populate_feature( data_pf_id );

		// ewm_dpm_pf_edit__feature( data_pf_id );

	})

	var ewm_dpm_pfs_add_feature = function( args = {} ){

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_dpm_pfs_connect_feature' );
	
		form_data.append( 'ewm_dpm_post_id', args.post_id ); // Post id
	
		form_data.append( 'ewm_dpm_checkbox_value', args.checkbox_value ); // Checkbox

		form_data.append( 'ewm_dpm_feature_id', args.feature_id ); // Feature ID
	
		jQuery.ajax( {
	
			url: ajax_object.ajaxurl,
	
			type: 'post',
	
			contentType: false,
	
			processData: false,
	
			data: form_data,
	
			success: function ( response ) {
	
				console.log( response );

				// location.reload();

			},
	
			error: function (response) {
	
				console.log( response );
	
			}
	
		} ) ;

	}

	$('.ewm_dpm_checklist_pfs_input').click( function(){

		console.log( $( this ).is(":checked") );

		// Update server
		ewm_dpm_pfs_add_feature( {
			'post_id': $('#ewm_product_id').val(),
			'checkbox_value': $( this ).is(":checked"),
			'feature_id':$( this ).data("pfs-id") 
		} );
		// Check

	} );

	var ewm_swo_create_new_wo = function(){

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_swo_new_workorder' );
	
		form_data.append( 'swo_Work_Order_Title', $("#swo_Work_Order_Title").val() );
		form_data.append( 'swo_Order_Name', $("#swo_Order_Name").val() );
		form_data.append( 'swo_Client_Code', $("#swo_Client_Code").val() );
		form_data.append( 'swo_Website', $("#swo_Website").val() );
		form_data.append( 'swo_Due_Date', $("#swo_Due_Date").val() );
		// form_data.append( 'swo_Start_Date', $("#swo_Start_Date").val() );
		form_data.append( 'swo_GMB_Services', $("#swo_GMB_Services").val() );
		form_data.append( 'swo_Client_Active_Paid_Locations', $("#swo_Client_Active_Paid_Locations").val() );
		form_data.append( 'swo_GMB_Optimizations', $("#swo_GMB_Optimizations").val() );
		form_data.append( 'swo_Required_Team_Members', $("#swo_Required_Team_Members").val() );
		form_data.append( 'swo_Required_Tool', $("#swo_Required_Tool").val() );
		form_data.append( 'swo_Third_Party_Service', $("#swo_Third_Party_Service").val() );
		form_data.append( 'swo_Monthly_Reports', $("#swo_Monthly_Reports").val() );
		form_data.append( 'swo_Third_Party_Service', $("#swo_Third_Party_Service").val() );

		jQuery.ajax( {	
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				alert('The New Order Has Been Created. Order ID:' + response.post_id );
			},
			error: function (response) {
				console.log( response );
			}
		} );

	}

	$('.ewm_dpm_save_new_workorder_button').click( function(){
		ewm_swo_create_new_wo();
	})

	$("#swo_Due_Date").datepicker();

	$('.ewm_s_team_member').click( function(){
		if( $(this).hasClass("selected")){
			// remove user from list
			$(this).removeClass('selected');
			swo_Required_Team_Members = $('#swo_Required_Team_Members').val();
			team_member_id = $(this).data('team-member-id');
			// removing character
			var new_string = swo_Required_Team_Members.replace(team_member_id,'');
			$('#swo_Required_Team_Members').val( new_string );

		}
		else{
			// add user from list
			$(this).addClass('selected');
			new_string = $('#swo_Required_Team_Members').val() + ', ' + $(this).data('team-member-id');
			$('#swo_Required_Team_Members').val( new_string );
		}
	} )

	var ewm_dpm_save_settings = function(){

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_dpm_settings' );
	
		form_data.append( 'dpm_freelancer_d', $('#ewm_dpm_setting_freelancer_d').val() );

		form_data.append( 'dpm_client_d', $('#ewm_dpm_setting_client_d').val() );

		jQuery.ajax( {
	
			url: ajax_object.ajaxurl,
	
			type: 'post',
	
			contentType: false,
	
			processData: false,
	
			data: form_data,
	
			success: function ( response ) {
	
				console.log( response );

				alert('Settings Saved');

			},
	
			error: function (response) {
	
				console.log( response );
	
			}
	
		} ) ;
		
	}

	$('#ewm_dpm_setting_save').click( function(){ 
		ewm_dpm_save_settings();
	} )

    $('.ewm_dpm_view_manage_od_button').click( function(){
		
		ewm_v_code = $(this).data( 'code-id' );

		// Title.
		$('.ewm_dpm_main_dp__specific_v').html( $('.ewmdpam_v_title_' + ewm_v_code ).html() );

		$('.ewm_dpm_main_dp_data_title').val( $('.ewmdpam_v_title_' + ewm_v_code ).html() );

		$(".ewm_dpm_main_dp_data_code").val( ewm_v_code );

		// Value.
		$('.ewmdpam_v_code_' + ewm_v_code ).html();

		// Data code
		$('.ewm_dpm_main_dp_value').val( $('.ewmdpam_v_value_' + ewm_v_code ).html().trim() );

		$('.ewm_dpm_main_single_dp_wrapper').show();

    })

	$('.ewm_dpm_close_b').click(function(){
		$('.ewm_dpm_main_single_dp_wrapper').hide();
	})

	/*** Manage tasks ***/

	$('.ewm_dpm_new_single_pt_button').click(function(){
		$('.ewm_dpm_pt_popup_wrapper').show();
		$('#ewm_dpm_pt_edit_type').val('new');
		$('#ewm_dpm_pt_post_id').val('0');
	})

	$('.ewm_dpm_pt_pop_close').click(function(){
		$('.ewm_dpm_pt_popup_wrapper').hide();
		
		$('#ewm_dpm_pt_edit_type').val('');
		$('#ewm_dpm_pt_post_id').val('');
	})

	var ewm_dpm_save_new_task =  function(){

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_dpm_new_task' );
	
		form_data.append( 'dpm_task_title', $('#ewm_dpm_task_title').val() );

		form_data.append( 'dpm_task_description', $('#ewm_dpm_task_description').val() );

		form_data.append( 'dpm_task_days_to_deliver', $('#ewm_dpm_task_days_to_deliver').val() );

		jQuery.ajax( {
	
			url: ajax_object.ajaxurl,
	
			type: 'post',
	
			contentType: false,
	
			processData: false,
	
			data: form_data,
	
			success: function ( response ) {
	
				console.log( response );

				alert('Task Saved');

				$('.ewm_dpm_pt_popup_wrapper').hide();

				location.reload();

			},
	
			error: function (response) {
	
				console.log( response );
	
			}
	
		} ) ;

	}

	var ewm_dpm_save_edit_task =  function(){

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_dpm_edit_task' );
	
		form_data.append( 'dpm_task_title', $('#ewm_dpm_task_title').val() );

		form_data.append( 'dpm_task_description', $('#ewm_dpm_task_description').val() );

		form_data.append( 'dpm_task_days_to_deliver', $('#ewm_dpm_task_days_to_deliver').val() );

		form_data.append( 'ewm_dpm_pt_post_id', $("#ewm_dpm_pt_post_id").val() );

		jQuery.ajax( {
	
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
	
			success: function ( response ) {

				console.log( response );
				alert('Task Saved');
				$('.ewm_dpm_pt_popup_wrapper').hide();
				location.reload();

			},
	
			error: function (response) {
	
				console.log( response );
	
			}
	
		} ) ;

	}

	$('.ewm_dpm_pt_single_field_input_button').click(function(){
		if( $("#ewm_dpm_pt_edit_type").val() == 'new' ){
			ewm_dpm_save_new_task();
		}
		else{
			ewm_dpm_save_edit_task();
		}
	})

	$('.ewm_dpm_view_manage_pt_button').click(function(){
		$('.ewm_dpm_pt_popup_wrapper').show();
		// register as edit
		this_pt_id = $( this ).data( 'pt-id' );

		// alert(this_pt_id);
		$("#ewm_dpm_task_title").val( $("#ewm_dpm_pt_t_" + this_pt_id).html().trim() );
		$("#ewm_dpm_task_description").val( $("#ewm_dpm_pt_td_" + this_pt_id).html().trim() );
		$("#ewm_dpm_task_days_to_deliver").val( $( "#ewm_dpm_pt_d_" + this_pt_id).html().trim() );

		$("#ewm_dpm_pt_edit_type").val('edit');
		$("#ewm_dpm_pt_post_id").val( this_pt_id );

	})

	var ewm_dpm_pt_add_feature = function( args = {} ){

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_dpm_pt_connect_feature' );
		form_data.append( 'ewm_dpm_post_id', args.post_id ); // Post id
		form_data.append( 'ewm_dpm_checkbox_value', args.checkbox_value ); // Checkbox
		form_data.append( 'ewm_dpm_task_id', args.task_id ); // Feature ID
	
		jQuery.ajax( {
	
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				// location.reload();
			},
			error: function (response) {
				console.log( response );
			}
		} ) ;

	}

	$('.ewm_dpm_checklist_pt_input').click( function(){

		// console.log( $( this ).is(":checked") );

		// Update server
		ewm_dpm_pt_add_feature( {
			'post_id': $('#ewm_product_id').val(),
			'checkbox_value': $( this ).is(":checked"),
			'task_id':$( this ).data("pt-id")
		} );
		// Check

	} );

	var ewm_dpm_pt_add_feature_wo = function( args = {} ){

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_dpm_pt_connect_feature_wo' );
		form_data.append( 'ewm_dpm_post_id', args.post_id ); // Post id
		form_data.append( 'ewm_dpm_checkbox_value', args.checkbox_value ); // Checkbox
		form_data.append( 'ewm_dpm_task_id', args.task_id ); // Feature ID
	
		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				// location.reload();
			},
			error: function (response) {
				console.log( response );
			}
		});
	}

	//$('.ewm_dpm_checklist_pt_input_wo').click( function(){

		// Update server
	/*	ewm_dpm_pt_add_feature_wo({
			'post_id': $( this ).data("data_post_id"),
			'checkbox_value': $( this ).is(":checked"),
			'task_id':$( this ).data("pt-id"),
		});
		
	} );
	*/


	$('.ewm_dpm_checklist_pt_input_task_a').click( function(){

		// console.log( $( this ).is(":checked") );

		// Update server
		ewm_dpm_pt_add_feature( {
			'post_id': $('#ewm_product_id').val(),
			'checkbox_value': $( this ).is(":checked"),
			'task_id':$( this ).data("pt-id")
		} );
		// Check

	} );


	var ewm_save_new_order_all = function() {

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_save_new_order_all' );
		form_data.append( '_order_stage', $('#_order_stage').val() );
		form_data.append( '_payment_method_title', $('#_payment_method_title').val() );
		form_data.append( '_billing_first_name', $('#_billing_first_name').val() );
		form_data.append( '_billing_last_name', $('#_billing_last_name').val() );
		form_data.append( '_billing_company', $('#_billing_company').val() );
		form_data.append( '_billing_address_1', $('#_billing_address_1').val() );

		form_data.append( '_billing_address_2', $('#_billing_address_2').val() );
		form_data.append( '_billing_city', $('#_billing_city').val() );
		form_data.append( '_billing_state', $('#_billing_state').val() );
		form_data.append( '_billing_postcode', $('#_billing_postcode').val() );
		form_data.append( '_billing_country', $('#_billing_country').val() );
		form_data.append( '_billing_email', $('#_billing_email').val() );

		form_data.append( '_billing_phone', $('#_billing_phone').val() );
		form_data.append( '_order_currency', $('#_order_currency').val() );
		form_data.append( '_cart_discount', $('#_cart_discount').val() );
		form_data.append( '_cart_discount_tax', $('#_cart_discount_tax').val() );
		form_data.append( '_order_tax', $('#_order_tax').val() );
	
		form_data.append( '_order_total', $('#_order_total').val() );
		form_data.append( '_prices_include_tax', $('#_prices_include_tax').val() );
		form_data.append( 'is_vat_exempt', $('#is_vat_exempt').val() );
		form_data.append( '_new_order_email_sent', $('#_new_order_email_sent').val() );

		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				// location.reload();
			},
			error: function (response) {
				console.log( response );
			}
		} );	
	}

	$('#ewm_dpm_submit_new_order').click(function() {
		ewm_save_new_order_all();
	})

	$('.ewmdpm_order_creation_stage').click( function() {
		$('.ewmdpm_order_creation_stage').removeClass('ewmdpm_order_creation_stage_active') ;
		$(this).addClass('ewmdpm_order_creation_stage_active') ;
		// reload with new stage
		creation_stage = $(this).data('creation-stage');
		window.location.search += '&ewm_c_stage=' + creation_stage ;
	} )
	var ewm_acivate_sliv_workorder = function(){
		// $('#ewm_dpm_wo_setting').click();
		$('.ewm_dpm_wo_tab').removeClass('ewm_dpm_wo_tab_active');
		$('.ewm_dpm_wo_setting_right').addClass('ewm_dpm_wo_tab_active');
		
		ewm_workorder_settings();
	}

	var ewm_acivate_sliv_form = function(){
		// write html to manage form
		$('.form-group_all').hide();
		// ready have forms so that you only show section
		$( '.form-group_' + $('#ewm_dpm_args_product_id').val() ).show();
		// console.log( $('#ewm_forms').data('f-s-p') );
	}
	var ewm_acivate_sliv_tasks = function(){
		// write html to manage tasks
		// loan listeners
		$('.form-group_all').hide();
		// ready have forms so that you only show section
		$( '.task-group_' + $('#ewm_dpm_args_product_id').val() ).show();
		$('.workorder-group_'+ $('#ewm_dpm_args_product_id').val() ).show();
		// console.log( $('#ewm_forms').data('f-s-p') );
	}
	var ewm_acivate_sliv_jobs = function(){
		// write html to manage jobs
		// loan listeners
		$('.form-group_all').hide()
		// ready have forms so that you only show section
		$( '.job-group_' + $('#ewm_dpm_args_product_id').val() ).show();
		// console.log( $('#ewm_forms').data('f-s-p') );
		$('.workorder-group_'+ $('#ewm_dpm_args_product_id').val() ).show();
	}
	var ewm_acivate_sliv_settings = function(){
		// write html to manage jobs
		// loan listeners
		$('.form-group_all').hide();
		// ready have forms so that you only show section
		$('.setting-group_' + $('#ewm_dpm_args_product_id').val() ).show();
		// console.log( $('#ewm_forms').data('f-s-p') );
	}

	$('.ewmdpm_order_creation_stage_sliv').click( function() {
		$('.ewmdpm_order_creation_stage_sliv').removeClass('ewmdpm_order_creation_stage_active_sliv');
		$(this).addClass('ewmdpm_order_creation_stage_active_sliv');

		// reload with new stage
		creation_stage = $(this).data('creation-stage');
		// eval( creation_stage + '()' )();

		if( creation_stage == 'ewm_acivate_sliv_workorder'){
			ewm_acivate_sliv_workorder();
		}
		else if( creation_stage == 'ewm_acivate_sliv_form'){
			ewm_acivate_sliv_form();
		}
		else if( creation_stage == 'ewm_acivate_sliv_tasks'){
			ewm_acivate_sliv_tasks();
		}
		else if( creation_stage == 'ewm_acivate_sliv_jobs'){
			ewm_acivate_sliv_jobs();
		}
		else if( creation_stage == 'ewm_acivate_sliv_settings'){
			ewm_acivate_sliv_settings();
		}
		
	} )

	var ewm_dpm_args_product_id = '';
	
	var ewm_dpm_do_slive_select_product = function(args){
		$('#ewm_form').attr( {
			'data-f-s-p':args.product_id
		} );
		$('.ewm_dpm_product_background_side_slive').fadeIn('slow');
		$('#ewm_form').click();
		ewm_dpm_args_product_id = args.product_id;
	}

	var ewm_dpm_do_slive_removed_product = function(){
		// alert('product removed');
		$('.ewm_dpm_product_background_side_slive_r').fadeIn('slow');
	}

	var ewm_dpm_new_load_product = 'not_loaded';

	var process_single_product_click = function( args ){

		$('#ewm_dpm_args_product_id').val( args.product_id );

		if ( ewm_dpm_products_selected[ args.product_id ] == 'selected' ){
			ewm_dpm_products_selected[ args.product_id ] = 'not_selected';
			// add focus
			$( '.ewm_dpm_single_product_select_' + args.product_id ).removeClass('ewm_dpm_single_product_selected_ano');
			args.product_selected.val('Open') ;
			$( '#ewm_dpm_single_edit_p_' + args.product_id ).hide();
			if( ewm_dpm_new_load_product == 'loaded' ){
				// select remove flow.
				ewm_dpm_do_slive_removed_product( args );
			}
		}
		else{
			ewm_dpm_products_selected[ args.product_id ] = 'selected';
			// remove focus
			$( '.ewm_dpm_single_product_select_' + args.product_id  ).addClass('ewm_dpm_single_product_selected_ano');
			args.product_selected.val('Remove');
			$( '#ewm_dpm_single_edit_p_' + args.product_id ).show()
			if( ewm_dpm_new_load_product == 'loaded' ){
				// show select flow.
				ewm_dpm_do_slive_select_product( args );
			}
		}
	}

	var ewm_dpm_do_removed_product_from_order = function( args ){

		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_do_removed_product_from_order' );
		form_data.append( 'product_id' , args.product_id );
		form_data.append( 'order_id',  args.order_id );

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );				
				response = jQuery.parseJSON( response );
				// return post id
				//window.location.search += '&ewm_c_stage=stage2&cache_id='+response.post_id;
			},
			error: function (response) {
				console.log( response );
			}
		});
		
	}
	
	var ewm_dpm_do_select_product_from_order = function( args ){

		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_do_select_product_from_order' );
		form_data.append( 'product_id' , args.product_id );
		form_data.append( 'order_id',  args.order_id );

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );				
				response = jQuery.parseJSON( response );
				// return post id
				//window.location.search += '&ewm_c_stage=stage2&cache_id='+response.post_id;
			},
			error: function (response) {
				console.log( response );
			}
		});
		
	}

	var ewm_process_add_remove_single_product_to_order = function( args ){

		$('#ewm_dpm_args_product_id').val( args.product_id );
		if( ewm_dpm_products_selected[ args.product_id ] == 'selected' ){
			if( ewm_dpm_new_load_product == 'loaded' ){
				// select remove flow.
				ewm_dpm_do_removed_product_from_order( args );
			}
		}
		else{
			if( ewm_dpm_new_load_product == 'loaded' ){
				// show select flow.
				ewm_dpm_do_select_product_from_order( args );
			}
		}

	}

	var ewm_dpm_create_workorder_template = function( args ) {

		// look if the workorder exists. It's order and product
		// args.product_id
		// args.product_selected
		// args.order_id
		if( $('#ewm_dpm_wo_id_' + args.order_id + '_' + args.product_id ).val() == 0 ){
			
			var form_data = new FormData();

			form_data.append( 'action', 'ewm_dpm_create_workorder_template' );
			form_data.append( 'product_id' , args.product_id );
			form_data.append( 'order_id',  args.order_id );
			form_data.append( 'swo_Work_Order_Title', 'WorkOrder for Order: #' + args.order_id +' | Product: #'+  args.product_id );
			form_data.append( 'swo_Order_Name',  args.order_id );
			form_data.append( 'swo_Client_Code', '' );
			form_data.append( 'swo_Website', '' );
			form_data.append( 'swo_Due_Date', '' );
			form_data.append( 'swo_Start_Date', '' );
			form_data.append( 'swo_Delegation_Date', '' );
			form_data.append( 'swo_GMB_Services', '' );
			form_data.append( 'swo_Client_Active_Paid_Locations', '' );
			form_data.append( 'swo_GMB_Optimizations', '' );
			form_data.append( 'swo_Required_Team_Members', '' );
			form_data.append( 'swo_Required_Tool', '' );
			form_data.append( 'swo_Third_Party_Service', '' );
			form_data.append( 'swo_Monthly_Reports', '' );
			form_data.append( 'swo_Third_Party_Service', '' );
			form_data.append( 'swo_Product_Name', args.product_id );

			jQuery.ajax( {
				url: ajax_object.ajaxurl,
				type: 'post',
				contentType: false,
				processData: false,
				data: form_data,
				success: function ( response ) {
					console.log( response );
					response = jQuery.parseJSON( response );					
					// return post id
					console.log( response.post_id );
					console.log( '#ewm_dpm_wo_id_' + args.order_id + '_' + args.product_id );
					$( '#ewm_dpm_wo_id_' + args.order_id + '_' + args.product_id ).val( response.post_id );
				},
				error: function ( response ) {
					console.log( response );
				}
			} );			
		}

	}

	$('.ewm_dpm_single_product_action_button_click_ano').click( function(){

		data_product_id  = $(this).data('product-id');

		ewm_dpm_create_workorder_template( {
			'product_id' : $(this).data('product-id'),
			'product_selected' :  $(this),
			'order_id' : $('#order_post_id').val()
		} );
		process_single_product_click( {
			'product_id' : $(this).data('product-id'),
			'product_selected' :  $(this)
		} );

		ewm_process_add_remove_single_product_to_order( {
			'product_id' : $(this).data('product-id'),
			'product_selected' :  $(this)
		} );

	} )

	var ewm_dpm_do_slive_edit_product = function ( args ){

		$('#ewm_form').attr({
			'data-f-s-p':args.product_id
		});
		$('.ewm_dpm_product_background_side_slive').fadeIn('slow');
		$('#ewm_form').click();
		ewm_dpm_args_product_id = args.product_id;
	}

	var ewm_dpm_process_single_product_click = function( args ){

		$('#ewm_dpm_args_product_id').val( args.product_id );
		if ( ewm_dpm_products_selected[ args.product_id ] == 'selected' ){
			// ewm_dpm_products_selected[ args.product_id ] = 'not_selected';
			// add focus
			// $( '.ewm_dpm_single_product_select_' + args.product_id ).removeClass('ewm_dpm_single_product_selected_ano');
			//args.product_selected.val('Open') ;
			// $( '#ewm_dpm_single_edit_p_' + args.product_id ).hide();
			if( ewm_dpm_new_load_product == 'loaded' ){
				// select remove flow.
				ewm_dpm_do_slive_edit_product( args );
			}
		}
	}

	$('.ewm_dpm_single_product_action_button_click_edit_ano').click( function(){
		ewm_dpm_process_single_product_click({
			'product_id':$(  this ).data('product-id')
		});
		// $('.ewm_dpm_wo_tab').attr({ 'data-ewm-product-id' : $(this).data('product-id') });
	})

	var ewm_dpm_create_order_cache_post = function(){
		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_create_order_cache_post' );
		form_data.append( 'product_list' , JSON.stringify( ewm_dpm_products_selected ) );
		form_data.append( 'post_id', $('#order_post_id').val());

		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );				
				response = jQuery.parseJSON( response );
				// return post id
				//window.location.search += '&ewm_c_stage=stage2&cache_id='+response.post_id;
			},
			error: function (response) {
				console.log( response );
			}
		} );
	
	}

	var ewm_dpm_update_order_cache_post = function(){
		console.log( ewm_dpm_products_selected );

		console.log(  JSON.stringify( ewm_dpm_products_selected ) );

		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_update_order_cache_post' );
		form_data.append( 'product_list' , JSON.stringify( ewm_dpm_products_selected ) );
		form_data.append( 'post_id', $('#order_post_id').val() );

		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {

				console.log( response );		
				// response = jQuery.parseJSON( response );
				// return post id
				// window.location.search += '&ewm_c_stage=stage2&cache_id='+response.post_id;

			},
			error: function (response) {
				console.log( response );
			}
		} );
	
	}

	var ewm_dpm_from_product_to_client_details = function(){

		// console.log( ewm_dpm_products_selected );

		// check if at least one product has been selected
		if( Object.keys( ewm_dpm_products_selected ).length == 0 ){
			alert('Please select at least one product');
			return;
		}
		select_count = 0;
		Object.entries( ewm_dpm_products_selected ).forEach( ([key,value]) => {
			if( value == 'selected' ){
				select_count ++;
			}
		} )
		if (select_count==0) {
			alert('Please select at least one product');
			return;
		}

		if( $('#order_post_id').val() == 0 ){
			// create the order and update local stage
			ewm_dpm_create_order_cache_post();
			// redirect to the new stage
		}
		else{
			ewm_dpm_update_order_cache_post();
		}
		// console.log( ewm_dpm_products_selected );

	}

	var ewm_dpm_run_ajax_client_details_payment = function( args ){

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_dpm_client_details_payment' );

		form_data.append( 'post_id', $('#ewm_dpm_cache_post').val() );

		Object.entries( args ).forEach( ( [key_outer,value_outer] ) => {
			form_data.append( value_outer.key , $( '#'+value_outer.key ).val() );
		} )

		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				// location.reload();
				response = jQuery.parseJSON( response );
				// return post id
				window.location.search += '&ewm_c_stage=stage4&single_order_id='+response.post_id;

			},
			error: function (response) {
				console.log( response );
			}
		} );
	}

	var ewm_dpm_run_ajax_client_details_billing = function( args ){
		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_client_details_billing' );
		form_data.append( 'post_id', $('#ewm_dpm_cache_post').val() );
		Object.entries(args).forEach(([key_outer,value_outer]) => {
			form_data.append( value_outer.key , $('#'+value_outer.key).val() );
		})
		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				// location.reload();
				response = jQuery.parseJSON( response );
				// return post id
				// window.location.search += '&ewm_c_stage=stage3&cache_id='+response.post_id;
				alert('Congratulations! You have successfully saved the client billing.');

				//
			},
			error: function (response) {
				console.log( response );
			}
		} );

	}

	var ewm_dpm_from_client_details_billing_to_payment_details = function(){

		client_billing_details = {
			1:{
				title:'Billing First Name',
				key:'_billing_first_name',
			},
			2:{
				title:'Billing Last Name',
				key:'_billing_last_name',
			},
			3:{
				title:'Billing Company',
				key:'_billing_company',
			},
			4:{
				title:'Billing Address 1',
				key:'_billing_address_1'
			},
			5:{
				title:'Billing Address 2',
				key:'_billing_address_2',
			},
			6:{
				title:'Billing City',
				key:'_billing_city'
			},
			7:{
				title:'Billing State',
				key:'_billing_state'
			},
			8:{
				title:'Billing Postal Code',
				key:'_billing_postcode'
			},
			9:{
				title:'Billing Country',
				key:'_billing_country'
			},
			10:{
				title:'Billing Email',
				key:'_billing_email'
			},
			11:{
				title:'Billing Phone',
				key:'_billing_phone'
			},
			12:{
				title:'Cart Discount',
				key:'_cart_discount'
			}, 
			13:{
				title:'Cart Discount Tax',
				key:'_cart_discount_tax'
			},
			14:{
				title:'Order Tax',
				key:'_order_tax'
			},
			15:{
				title:'Order Total',
				key:'_order_total'
			},
			16:{
				title:'Prices Include tax',
				key:'_prices_include_tax'
			},
			17:{
				title:'Vat Exempt',
				key:'is_vat_exempt'
			}
		}

		missing_entries_details = 0 ;

		Object.entries( client_billing_details ).forEach( ([key_outer,value_outer]) => {
			if( $( '#'+value_outer.key ).val() == '' ){
				missing_entries_details++
				$( '#'+value_outer.key ).css( {"border":"1px solid red"} )
			}
		} )

		if( missing_entries_details > 0 ){
			alert( 'Please fill in the marked fields' );

			return false;
		}

		ewm_dpm_run_ajax_client_details_billing( client_billing_details );

	}

	var ewm_dpm_from_payment_details_to_form_details = function() {
		// save updates and redirect to Form details.
		// check if all required sections are filled.
		// update on the server and redirect.

		payment_details = {
			1:{
				title:'Order Stage',
				key:'_order_stage',
			},
			2:{
				title:'Payment Method Title',
				key:'_payment_method_title',
			},
			3:{
				title:'Payment Details',
				key:'ewm_dpm_payment_details',
			},
			4:{
				title:'Order Currency',
				key:'_order_currency',
			},
			5:{
				title:'Cart Discount',
				key:'_cart_discount',
			},
			6:{
				title:'Cart Discount Tax',
				key:'_cart_discount_tax',
			},
			7:{
				title:'Order Tax',
				key:'_order_tax',
			},
			8:{
				title:'Prices Include Tax',
				key:'_prices_include_tax',
			},
			9:{
				title:'is vat exempt',
				key:'is_vat_exempt',
			},
		}

		missing_entries_details = 0 ;

		Object.entries( payment_details ).forEach( ([key_outer,value_outer]) => {
			if( $( '#'+value_outer.key ).val() == '' ){
				missing_entries_details++
				$( '#'+value_outer.key ).css( {"border":"1px solid red"} )
			}
		} )

		if( missing_entries_details > 0 ){
			alert( 'Please fill in the marked fields' );

			return false;
		}

		ewm_dpm_run_ajax_client_details_payment( payment_details );

	}

	$('#ewm_dpm_submit_new_order_stage3').click( function(){
		// ewm_dpm_from_payment_details_to_form_details();
		ewm_dpm_from_payment_details_to_form_details();
	})

	var ewm_dpm_from_form_details_to_tasks = function() {
		// Save form and and redirect to task
		order_id = $('#ewm_dpm_product_id').val();
		window.location.search += '&ewm_c_stage=stage5&single_order_id='+order_id ;
		
	}

	$('#ewm_dpm_submit_new_order_stage2').click(function() {
		ewm_dpm_from_client_details_billing_to_payment_details(); // do redirect
	})

	$('.ewm_dpm_ano_single_menu').click( function () {

		if( $( this ).data('order-stage') == "product_next_forward" ) {
			ewm_dpm_from_product_to_client_details();
		}
		if( $( this ).data('order-stage') == "product_next_back" ) {
			//ewm_dpm_from_product_to_client_details();
		}

		if( $( this ).data('order-stage') == "client_details_billing_forward" ){
			ewm_dpm_from_client_details_billing_to_payment_details(); // do redirect
		}
		if( $( this ).data('order-stage') == "client_details_billing_back" ){
			// ewm_dpm_from_client_details_billing_to_payment_details(); // do redirect
		}

		if( $( this ).data('order-stage') == "payment_details_forward" ){
			ewm_dpm_from_payment_details_to_form_details();
		}
		if( $( this ).data('order-stage') == "payment_details_back" ){
			// ewm_dpm_from_payment_details_to_form_details();
		}

		if( $( this ).data('order-stage') == "form_next_forward" ){
			ewm_dpm_from_form_details_to_tasks();
		}
		if( $( this ).data('order-stage') == "form_details_back" ){
			// ewm_dpm_from_form_details_to_tasks();
		}

		if( $( this ).data('order-stage') == "tasks_forward" ){
			ewm_dpm_from_form_details_to_tasks();
		}
		if( $( this ).data('order-stage') == "tasks_back" ){
			ewm_dpm_from_form_details_to_tasks();
		}

	} );

	stage4_product_list = [];

	stage4_product_list = { // TODO
		'552' : '552',
		'551' : '551'
	};

	Object.entries( stage4_product_list ).forEach( ([key,value]) => {
		console.log( value );
	} )
	
	$('.ewm_dpm_menu_product_single').click( function(){
		$('.ewm_dpm_menu_product_single').css('border','1px #ccc solid');
		$('.ewm_dpm_menu_product_single').css('background','#fff');
		$('.ewm_dpm_menu_product_single').css('color','#333');

		$(this).css('border','1px solid #333');
		$(this).css('background','#333');
		$(this).css('color','#fff');

		//$('.form-group_all').hide();
		ewm_form_id = $(this).data('f-s-p');

		$( '.form-group_' + ewm_form_id ).show();

	} )

	var ewm_dpm_assign_to_product = function ( args ){

		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_assign_to_work_order' );
		form_data.append( 'assignee', args.assignee );
		form_data.append( 'swo_Order_Name', args.swo_Order_Name ); // Order id #_post_id_
		form_data.append( 'swo_Product_Name', args.swo_Product_Name ); // Product id
		form_data.append( 'swo_Client_Code', args.swo_Client_Code ); // code
		form_data.append( 'swo_Due_Date', args.swo_Due_Date ); // swo_Due_Date_d
		form_data.append( 'swo_GMB_Services', args.swo_GMB_Services );
		form_data.append( 'swo_Client_Active_Paid_Locations', args.swo_Client_Active_Paid_Locations );
		form_data.append( 'swo_GMB_Optimizations', args.swo_GMB_Optimizations );
		form_data.append( 'swo_Required_Team_Members', args.swo_Required_Team_Members );
		form_data.append( 'swo_Required_Tool', args.swo_Required_Tool );
		form_data.append( 'swo_Third_Party_Service', args.swo_Third_Party_Service );
		form_data.append( 'swo_Monthly_Reports', args.swo_Monthly_Reports );
		form_data.append( 'swo_Start_Date', args.swo_Start_Date );
		form_data.append( 'swo_Delegation_Date', args.swo_Delegation_Date );
		form_data.append( 'swo_Work_Order_Title', args.swo_Work_Order_Title );

		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				// return post id
				// window.location.search += '&ewm_c_stage=stage3&cache_id='+response.post_id;
			},
			error: function (response) {
				console.log( response );
			}
		} );

	}

	var ewm_dpm_process_product = function ( ewm_dpm_args ) {

		ewm_dpm_args.forEach( function( rcurrentValue, rindex, rarr ){
			$( '#ewm_dpm_single_p_'+rcurrentValue ).click();
			// console.log( 'product list' );
			// console.log( rcurrentValue );
			// console.log( rindex );
			// console.log( rarr );
		});

		ewm_dpm_new_load_product = 'loaded';

	}

	if( typeof ewm_dpm_products_selected !== 'undefined' ){
		ewm_dpm_process_product(ewm_dpm_products_selected);
	}
	else{
		ewm_dpm_products_selected = [];
	}

	var ewm_dpm_assign_to_product_delegation = function ( args ){

		var form_data = new FormData();

		form_data.append( 'action', 'ewm_dpm_assign_to_work_order_delegation' );
		form_data.append( args.meta_key , args.meta_value );

		// Create
        form_data.append( 'swo_Order_Name', $('#order_post_id').val() ); // Order id #_post_id_
		form_data.append( 'swo_Product_Name', args.product_value ); // Product id

		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				// location.reload();
				response = jQuery.parseJSON( response );
				// return post id
				// window.location.search += '&ewm_c_stage=stage3&cache_id='+response.post_id;
			},
			error: function (response) {
				console.log( response );
			}
		} );
	}

	$('.ewm_dpm_drop_down_input').change( function(){

		ewm_dpm_p_id = $(this).data('ewm_dpm_p_id');
		// console.log( $( '#assignee_'+ ewm_dpm_p_id ).val() );
		if( $( this ).val() != 'no_select' ){

			$( '.ewm_dpm_single_wo_' + ewm_dpm_p_id ).show();
			$('.ewm_dpm_wo_m_'+ ewm_dpm_p_id ).show();
			$('.ewm_ewm_message_show_top_'+ewm_dpm_p_id).hide();

			// console.log( '.ewm_dpm_single_wo_' + ewm_dpm_p_id );
			ewm_dpm_assign_to_product_delegation( {
				'meta_key' : 'assignee',
				'meta_value' : $( '#assignee_'+ ewm_dpm_p_id ).val(),
				'product_value' : $( '#assignee_'+ ewm_dpm_p_id ).data('ewm_dpm_p_id'),
			} );
		}
		else{
			$('.ewm_dpm_wo_m_'+ ewm_dpm_p_id ).hide();
			// console.log('.ewm_ewm_message_show_top_'+ewm_dpm_p_id);
			$('.ewm_ewm_message_show_top_'+ewm_dpm_p_id).show();
		}

	} );

	var ewm_dpm_assign_to_product_single = function( args ){

		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_update_single_workspace_meta' );
		form_data.append( 'meta_key', args.meta_key );
		form_data.append( 'meta_value' , args.meta_value );

		//console.log('p id:');
		//console.log( $('.ewm_dpm_wo_tab').data('ewm-product-id') );
		// Create
        form_data.append( 'swo_Order_Name', $('#order_post_id').val() ); // Order id #_post_id
		form_data.append( 'swo_Product_Name', $('#ewm_dpm_args_product_id').val() ); // Order id #$('.ewm_dpm_wo_tab').data('ewm-product-id') ); // Product id

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				// location.reload();
				response = jQuery.parseJSON( response );
				// return post id
				// window.location.search += '&ewm_c_stage=stage3&cache_id='+response.post_id;
			},
			error: function (response) {
				console.log( response );
			}
		});

	}

	$(".swo_Due_Date_d").change(function(){
		ewm_dpm_assign_to_product_single( {
			'meta_key' : 'swo_Due_Date',
			'meta_value' : $( this ).val()
		});
	})
	$(".swo_Start_Date").change(function(){
		ewm_dpm_assign_to_product_single( {
			'meta_key' : 'swo_Start_Date',
			'meta_value' : $( this ).val()
		});
	})
	$(".swo_Delegation_Date").change(function(){
		ewm_dpm_assign_to_product_single({
			'meta_key' : 'swo_Delegation_Date',
			'meta_value' : $( this ).val()
		});
	})
	$(".swo_Required_Tool").change(function(){
		ewm_dpm_assign_to_product_single({
			'meta_key' : 'swo_Required_Tool',
			'meta_value' : $( this ).val()
		});
	})
	$(".swo_Third_Party_Service").change(function(){
		ewm_dpm_assign_to_product_single({
			'meta_key' : 'swo_Third_Party_Service',
			'meta_value' : $( this ).val()
		});
	})
	$(".swo_Monthly_Reports").change(function(){
		ewm_dpm_assign_to_product_single({
			'meta_key' : 'swo_Monthly_Reports',
			'meta_value' : $( this ).val()
		});
	})

	var ewm_dpm_json_send_form_value = function( args ){

		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_send_form_values' );
		form_data.append( 'form_list' , JSON.stringify( args.json_details ) );
		form_data.append( 'product_id', args.product_id );
		form_data.append( 'order_id', $('#ewm_dpm_product_id').val() );

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				// return post id
				// window.location.search += '&ewm_c_stage=stage5&single_order_id='+response.order_id;
				alert('Product updated successfully.');
				$( '.ewm_dpm_form_filled_message_'+args.product_id ).hide();
		 		$( '.ewm_ewm_message_show_'+args.product_id ).show();
			},
			error: function (response) {
				console.log( response );
			}
		});

	}

	$('.ewm_form_f_s_b').click(function(){

		ewm_p_id = $( this ).data('p-id');
		indexr_id 	= 0 ;
		json_details = {} ;
		looks_good = true ;

		Object.entries( $('.form_f_'+ewm_p_id ) ).forEach(function( rcurrentValue, rindex, rarr ){

			// console.log( 'Form Values:' );
			//console.log( rcurrentValue[1].value );
			//console.log( rcurrentValue[1].tagName == 'INPUT' ) ;
			//console.log( rcurrentValue[1].data('code-details') );

			if( rcurrentValue[1].tagName == 'INPUT' ){

				if( rcurrentValue[1].value == '' ){
					looks_good = false;
				}
				json_details[rcurrentValue[1].dataset.codeDetails] = {
					'name': rcurrentValue[1].dataset.codeDetails,
					'data': rcurrentValue[1].value
				}
			};

			// console.log( rcurrentValue[1].dataset.codeDetails );
			// add values into json
			// send to ajax function 
			//console.log( rindex );
			// console.log( rarr );

			indexr_id++;

		});

		if( looks_good == false ){
			alert('Please check the missing values');
		}
		else{
			// console.log( json_details );
			ewm_dpm_json_send_form_value( {
				'json_details'	: json_details,
				'product_id'		: ewm_p_id
			} );
		}

	});

	$('.ewm_s_team_member_s').click( function(){

		ewm_dpm_ap_id = $(this).data('ap-id');
		if( $(this).hasClass("selected")){
			// remove user from list
			$(this).removeClass('selected');
			swo_Required_Team_Members = $( '#swo_Required_Team_Members_'+ewm_dpm_ap_id ).val();
			team_member_id = $(this).data('team-member-id');
			// removing character
			var new_string = swo_Required_Team_Members.replace(team_member_id,'');
			$('#swo_Required_Team_Members_'+ewm_dpm_ap_id).val( new_string );
		}
		else{
			// add user from list
			$(this).addClass('selected');
			new_string = $('#swo_Required_Team_Members_'+ewm_dpm_ap_id).val() + ', ' + $(this).data('team-member-id');
			$('#swo_Required_Team_Members_'+ewm_dpm_ap_id).val( new_string );
		}

	} )

	$('.ewm_dpm_close_b_sliv').click(function(){
		$('.ewm_dpm_product_background_side_slive').fadeOut('slow');
	})

	$('.ewm_dpm_close_b_sliv_r').click(function(){
		$('.ewm_dpm_product_background_side_slive_r').fadeOut('slow');
	} )
	$('.ewm_dpm_refund_b').click( function(){
		$( this ).data( 'refund-product' );
	} );

	$('.ewm_dpm_fill_in_form_before_workorder').click(function(){
		$('#ewm_form').click();
	} );
/*
	$('.ewm_dpm_submit_workorder_').click(function(){

		data_wo_p_id = $(this).data('wo-p-id');
		//console.log( data_wo_p_id );
		ewm_dpm_assign_to_product( {
			'assignee' : $( '#assignee_'+data_wo_p_id ).val(),
			//'swo_Order_Name': $('#order_post_id').val(), // Order id #_post_id_
			//'swo_Product_Name': $('#ewm_form').data('f-s-p'), // Product id
        	'swo_Client_Code': '', // code
        	'swo_Due_Date': $('#swo_Due_Date_d_'+data_wo_p_id).val(), // swo_Due_Date_d
        	'swo_GMB_Services': '',
        	'swo_Client_Active_Paid_Locations': '',
        	'swo_GMB_Optimizations': '',
			'swo_Start_Date':$('#swo_Start_Date_'+data_wo_p_id).val(),
			'swo_Delegation_Date':$('#swo_Delegation_Date_'+data_wo_p_id).val(),
			'swo_Required_Team_Members': $('#swo_Required_Team_Members_'+data_wo_p_id).val(),
			'swo_Required_Tool_': $('#swo_Required_Tool_'+data_wo_p_id).val(),
			'swo_Third_Party_Service': $('#swo_Third_Party_Service_'+data_wo_p_id).val(),
			'swo_Monthly_Reports': $('#swo_Monthly_Reports_'+data_wo_p_id).val(),
			'swo_Work_Order_Title' : $('#swo_Work_Order_Title_'+data_wo_p_id).val(),
			'swo_Order_Name': $('#swo_Order_Name_'+data_wo_p_id).val(),
			'swo_Product_Name': $('#swo_Product_Name_'+data_wo_p_id).val(),
		} ) ;

	} )
*/
	var ewm_dpm_save_settings_save = function( args ){

		product_id = args.product_id;
		order_id = args.order_id;

		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_product_settings_save' );

		form_data.append( 'product_id', product_id );
		form_data.append( 'order_id', order_id );

		form_data.append( 'swo_settings_subscription_date' , $('#swo_settings_subscription_date_' + product_id ).val() );
		form_data.append( 'swo_settings_paid_unpaid', $('#swo_settings_paid_unpaid_' + product_id ).val() );
		form_data.append( 'swo_settings_wo_deadline_date', $('#swo_settings_wo_deadline_date_' + product_id ).val() );
		form_data.append( 'swo_settings_paid_unpaid', $('#swo_settings_paid_unpaid_' + product_id ).val() );

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				// return post id
				// window.location.search += '&ewm_c_stage=stage5&single_order_id='+response.order_id;
				alert('Product settings updated successfully.');
			},
			error: function (response) {
				console.log( response );
			}
		});


	}

	$('.ewm_dpm_save_settings_butt').click(function(){
		ewm_settings_butt = $(this).data('settings-butt');
		// alert( ewm_settings_butt );
		ewm_dpm_save_settings_save({
			'product_id':ewm_settings_butt,
			'order_id'	:$('#order_post_id').val(),
		});
	});
	
	$('.ewm_dpm_toggle_more_det').click(function() {
		$('.ewm_dpm_main_sections_details').toggle();
	})
	
	$('.ewm_dpm_manage_single_pp').click(function() {
		$('.ewm_dpm_product_background_side_slive_r_p').show();
	});
	$('.ewm_dpm_close_b_sliv_r_p').click(function(){
		$('.ewm_dpm_product_background_side_slive_r_p').hide();
	});

	$('#ewm_dpm_payment_selection_p').click(function(){

		$('.ewm_dpm_payment_s').show();
		$('#ewm_dpm_payment_selection_p').addClass('ewm_dpm_payment_s_active');
		
		$('.ewm_dpm_refund_s').hide();
		$('#ewm_dpm_refund_selection_p').removeClass('ewm_dpm_payment_s_active');

	})

	$('#ewm_dpm_refund_selection_p').click(function(){
		$('.ewm_dpm_payment_s').hide();
		$('#ewm_dpm_refund_selection_p').addClass('ewm_dpm_payment_s_active');
		$('.ewm_dpm_refund_s').show();
		$('#ewm_dpm_payment_selection_p').removeClass('ewm_dpm_payment_s_active');
	})

	$('#ewm_dpm_select_inbox').click(function(e) {

		$('.ewm_dpm_body_item_select_coms').hide();
		$('.ewm_dpm_menu_item_select_coms').removeClass('ewm_dpm_menu_item_select_coms_active');
		$( this ).addClass( 'ewm_dpm_menu_item_select_coms_active' );
		$("#ewm_dpm_section_inbox").show();
		
	});

	$('#ewm_dpm_select_ticket').click(function(e) {
		$('.ewm_dpm_body_item_select_coms').hide();
		$('.ewm_dpm_menu_item_select_coms').removeClass('ewm_dpm_menu_item_select_coms_active');
		$( this ).addClass( 'ewm_dpm_menu_item_select_coms_active' );
		$("#ewm_dpm_section_ticket").show();
	});

	$('#ewm_dpm_select_notification').click(function(e) {
		$('.ewm_dpm_body_item_select_coms').hide();
		$('.ewm_dpm_menu_item_select_coms').removeClass('ewm_dpm_menu_item_select_coms_active');
		$( this ).addClass( 'ewm_dpm_menu_item_select_coms_active' );
		$("#ewm_dpm_section_notification").show();
	});

	var ewm_tasks = function(){
		$('.tasks_section').show();
		$('.workorder_settings_section').hide();
		$('.job_section').hide();
		ewm_acivate_sliv_tasks();
	};

	var ewm_jobs = function(){
		$('.tasks_section').hide();
		$('.workorder_settings_section').hide();
		$('.job_section').show();

		ewm_acivate_sliv_jobs();
	};

	var ewm_workorder_settings = function(){

		// write html to manage work order
		$('.form-group_all').hide();
		// ready have forms so that you only show section
		$( '.workorder-group_' + $('#ewm_form').data('f-s-p') ).show();
		// console.log( $('#ewm_forms').data('f-s-p') );
		// $( '#ewm_dpm_active_product_id' ).val();

		$('#ewm_dpm_wo_setting').click();
		$(".job_section").hide();
		$(".tasks_section").hide();
		$(".workorder_settings_section").show();

		ewm_is_manager_selected = false;

		if( $('.ewm_dpm_single_field_input_ass').val().length > 0 ){
			if($('.ewm_dpm_single_field_input_ass').val() !== 'no_select' ){
				ewm_is_manager_selected = true;
			}
		}

		// statg 1: form is unfilled
		// state 2: manager is not delegated to
		// state 3: form is filled and manager delegated
		// console.log( ewm_is_manager_selected );
	};

	$('.ewm_dpm_wo_tab').click(function() {
		$('.ewm_dpm_wo_tab').removeClass( 'ewm_dpm_wo_tab_active' );
		$( this ).addClass( 'ewm_dpm_wo_tab_active' );
		ewm_workorder_tab_selection = $( this ).data( 'ewm-workorder-tab-selection' );
		if( ewm_workorder_tab_selection == "tasks"){
			ewm_tasks();
		}
		else if( ewm_workorder_tab_selection == "jobs"){
			ewm_jobs();
		}
		else if( ewm_workorder_tab_selection == "workorder_settings" ){
			ewm_workorder_settings();
		}
	} )

	var ewm_dpm_populate_wo_fields = function( args ){
		// args.post_id	
		$('[name=ewm_dpm_status_checks]').val( args.task_status );
		$('[name=ewm_dpm_user_assigned]').val( args.task_assignee );
		// $('.ewm_dpm_follow_tab').val( );
		$('.ewm_dpm_follow_tab').prop( 'checked', args.task_following );
		$('.ewm_dpm_t_title_text').val( args.ewm_dpm_t_title_text );
		$('.ewm_dpm_t_title_describe').val( args.ewm_dpm_t_title_describe );
		$('.ewm_dpm_task_date_input').val( args.ewm_dpm_task_date_input );
		$('.ewm_dpm_comment_list').html('');

		Object.entries( args.ewm_dpm_comment_list ).forEach( ([key,value]) => {
			console.log( value );
			// Post on text field
			
			$('.ewm_dpm_comment_list').append( '<div class="ewm_dpm_s_message_details">\
				<div class="ewm_dpm_s_message_h">\
					<span class="ewm_dpm_s_message_pic">'+ value.comment_author.charAt(0) + value.comment_author.charAt(1) + value.comment_author.charAt(2) +'</span>\
				</div>\
				<div class="ewm_dpm_s_message_b">\
					<div>' + value.comment_content + '</div>\
					<div class="ewm_dpm_details_below">'+ value.comment_author +' - '+ value.comment_date +'</div> \
				</div>\
			</div>');
			
		} )

		// $('.ewm_dpm_comment_list').append('line')

	}

	var ewm_dmp_update_task_inputs_wo = function( args ){

		// console.log( args.task_id );
		// ewm_dpm_t_title_text -> title
		// post id
		// ewm_dpm_t_title_describe -> description
		// ewm_dpm_task_date_input -> due date
		// ewm_dpm_comment_list -> comment
		// update_hidden_html
		// Create a new
		var form_data = new FormData();
		form_data.append( 'action' , 'ewm_dpm_update_task_wo' );
		form_data.append( 'post_id' , args.task_id );
		
		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				ewm_dpm_populate_wo_fields( response );
				// $('#ewm_dpm_new_task_draft').val( response.post_id );
			},
			error: function (response) {
				console.log( response );
			}
		} ) ;
	}

	$('.ewm_dpm_checklist_pt_input_wo').click( function(){

		$('.ewm_dpm_task_background_side_slive').show();
		$('#ewm_dpm_new_task_draft').val( $( this ).data( "data_post_id" ) );

		ewm_dmp_update_task_inputs_wo( {
			"task_id": $( this ).data( "data_post_id" )
		} );

	} );

	$('.ewm_dpm_s_t_i').click(function(){
		// alert( $( this ).data('btn-option') );
	})

	$('.ewm_dpm_close_task_sliv').click(function(){
		$('.ewm_dpm_task_background_side_slive').hide();
		$('#ewm_dpm_new_task_draft').val('');
	})

	$('.ewm_dpm_status_close').click(function() {
		$('.ewm_dpm_status_body').hide();
	})

	$('.ewm_dpm_status_header').click(function() {
		$('.ewm_dpm_status_body').show();
	})

	$('.ewm_dpm_assign_close').click(function() {
		$('.ewm_dpm_assign_body').hide();
	})

	$('.ewm_dpm_assign_header').click(function() {
		$('.ewm_dpm_assign_body').show();
	})

	var ewm_dpm_create_pending_task = function() {

		// Create a new
		var form_data = new FormData();
		form_data.append( 'action', 'ewm_dpm_create_new_task' );
		form_data.append( 'task_order_id', $('#ewm_dpm_ord_id').val() );
		form_data.append( 'task_product_id', $('#ewm_dpm_args_product_id').val() );

		jQuery.ajax( {
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				$('#ewm_dpm_new_task_draft').val( response.post_id );
			},
			error: function (response) {
				console.log( response );
			}
		} );

	}
	var ewm_clear_task_fields = function(){

		$('.ewm_dpm_t_title_text').val('');
		$('.ewm_dpm_t_title_describe').val();
		$('[name="ewm_dpm_status_checks"]').val('');
		$('[name="ewm_dpm_user_assigned"]').val('');
		$('.ewm_dpm_follow_tab').val('');
		$('.ewm_dpm_task_date_input').val('');
		$('.ewm_dpm_comment_list').html('');
		$('.ewm_dpm_send_comment').html('');

	}

	$('.ewm_dpm_create_task_b').click( function() {

		$('.ewm_dpm_task_background_side_slive').show();
		$('.ewm_dpm_current_task_id').val( 0 );
		$('.ewm_dpm_current_task_order_id').val( $('#ewm_dpm_ord_id').val() );
		$('.ewm_dpm_current_task_product_id').val( $('#ewm_dpm_args_product_id').val() );
		// ewm_product_script[$('#ewm_dpm_args_product_id').val()]
		// $('._client_name').html( $('#_billing_first_name').val() +' '+ $('#_billing_last_name').val() +'('+ $('#_billing_company').val() +')' );
		$('.ewm_dpm_task_product_name').html( '#' + $('#ewm_dpm_args_product_id').val() );
		// create task that is in pending mode -> update the task id
		ewm_clear_task_fields();
		ewm_dpm_create_pending_task();

	} )

	var ewm_dpm_update_single_meta_value = function ( args ){

		// console.log( args );
		var form_data = new FormData();
		// Create a new
		form_data.append( 'action', 'ewm_dpm_update_single_task_meta_value' );
		form_data.append( 'task_id', $('#ewm_dpm_new_task_draft').val() );
		form_data.append( 'meta_key', args.meta_key );
		form_data.append( 'meta_value', args.meta_value );

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				// alert( response.post_id) ;
				//$('#ewm_dpm_new_task_draft').val( response.post_id );
			},
			error: function (response) {
				console.log( response );
			}
		} ) ;

	}

	$('[name=ewm_dpm_status_checks]').on('change', function(){
		ewm_dpm_update_single_meta_value({
			'meta_key': 'task_status',
			'meta_value': $( this ).val()
		});
	})

	$('[name=ewm_dpm_user_assigned]').on('change',function(){
		ewm_dpm_update_single_meta_value( {
			'meta_key': 'task_assignee',
			'meta_value': $( this ).val()
		} );
	})

	$('.ewm_dpm_follow_tab').click(function() {
		console.log('Current user id:');
		console.log( $('#ewm_dpm_current_user_id').val() );
		ewm_dpm_update_single_meta_value( {
			'meta_key': 'task_following_' + $('#ewm_dpm_current_user_id').val().trim(),
			'meta_value': $( this ).is(":checked")
		} );
	})

	var ewm_dpm_update_main_tast_post = function( args ){

		var form_data = new FormData();
		// Create a new
		form_data.append( 'action', 'ewm_dpm_update_single_task_main_post_value' );
		form_data.append( 'task_id', $('#ewm_dpm_new_task_draft').val() );
		form_data.append( 'post_key', args.post_key );
		form_data.append( 'post_value', args.post_value );

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				// alert( response.post_id) ;
				//$('#ewm_dpm_new_task_draft').val( response.post_id );
			},
			error: function (response) {
				console.log( response );
			}
		} ) ;

	}

	$('.ewm_dpm_t_title_text').keyup(function(){
		ewm_dpm_update_main_tast_post({
			'post_key' : 'post_title',
			'post_value': $('.ewm_dpm_t_title_text').val()
		});
	} )

	$('.ewm_dpm_t_title_describe').keyup(function(){
		ewm_dpm_update_main_tast_post({
			'post_key' : 'post_content',
			'post_value': $('.ewm_dpm_t_title_describe').val()
		});
	});

	$('.ewm_dpm_task_date_input').on('change', function (){

		ewm_dpm_update_single_meta_value({
			'meta_key': 'task_due_date',
			'meta_value': $('.ewm_dpm_task_date_input').val()
		});

	})

	var ewm_dpm_send_task_comment_to_db = function ( args ){

		var form_data = new FormData();
		// Create a new
		form_data.append( 'action', 'ewm_dpm_add_task_comment' );
		form_data.append( "comment_post_ID", args.comment_post_ID ); // $task_id
        form_data.append( "comment_author", args.comment_author ); // $c_User_id
        form_data.append( "comment_author_email", args.comment_author_email ); // $value_comment_author_email
        form_data.append( "comment_content", args.comment_content ); // $task_message
        form_data.append( "comment_parent", args.comment_parent ); // $value_comment_parent
        form_data.append( "user_id", args.user_id ); // $c_User_id

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				// alert( response.post_id) ;
				//$('#ewm_dpm_new_task_draft').val( response.post_id );
				// response.command_data.comment_author_email			

				// Post on text field
				$('.ewm_dpm_comment_list').append( '<div class="ewm_dpm_s_message_details">\
					<div class="ewm_dpm_s_message_h">\
						<span class="ewm_dpm_s_message_pic">'+ response.command_data.comment_author.charAt(0) + response.command_data.comment_author.charAt(1) + response.command_data.comment_author.charAt(2) +'</span>\
					</div>\
					<div class="ewm_dpm_s_message_b">\
						<div>' + response.command_data.comment_content + '</div>\
						<div class="ewm_dpm_details_below">'+ response.command_data.comment_author +' - '+ response.command_data.comment_date +'</div> \
					</div>\
				</div>');
			},
			error: function (response) {
				console.log( response );
			}
		});

	}

	$('.ewm_dpm_p_type_half').click(function () {
		$('.ewm_dpm_p_type_half').removeClass('ewm_dpm_type_active');
		$(this).addClass('ewm_dpm_type_active');
		// set product type in db]
		$('.ewm_dpm_p_type_data').val( $(this).data('product-type') );
	})

	$('.ewm_dpm_send_comment').click(function(e) {
		// Post to db
		ewm_dpm_send_task_comment_to_db({
			'comment_post_ID' :  $('#ewm_dpm_new_task_draft').val(),
			'comment_author' : 'Gilbert',
			'comment_author_email' : 'mai@mail.com',
			'comment_content' : $('.ewm_dpm_comment_area_f').val(),
			'comment_parent' : '',
			'user_id' : $('#ewm_dpm_current_user_id').val()
		});

		// Remove from text area
		$('.ewm_dpm_comment_area_f').val( '' );

	} )
	
	var ewm_dpm_remove_task_from_list = function( args ) {

		var form_data = new FormData();
		// Create a new
		form_data.append( 'action', 'ewm_dpm_remove_task_from_list' );
		form_data.append( "ewm_post_id", args.ewm_post_id ); // $task_id

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				$( '.ewm_dpm_delete_task_' + response.deleted_post_id ).remove();

			},
			error: function (response) {
				console.log( response );
			}
		});

	}

	$('.ewm_dpm_checklist_pt_delete_wo').click(function(){
		data_post_id = $(this).data('data_post_id');
		ewm_dpm_remove_task_from_list({
			'ewm_post_id' : data_post_id
		});
	});

	$('.ewm_dpm_client_menu_item').click(function(){
		$('.ewm_dpm_client_menu_item').removeClass('ewm_dpm_client_menu_item_active');
		$( this ).addClass('ewm_dpm_client_menu_item_active');
		// activate default submenu
	});

	$('.ewm_dpm_close_client_pop').click(function(){
		$('.ewm_dpm_wrapper_slive').hide();		
	})

	$('.ewm_dpm_sub_client_menu_o').click(function(){
		$('.ewm_dpm_client_subsection_f').hide();
		$('.ewm_dpm_sub_client_menu_o').removeClass('ewm_dpm_sub_active_m_i');

		$( this ).addClass('ewm_dpm_sub_active_m_i');
		ewm_sub_section_data = $( this ).data('subsection-f');
		$( '.'+ewm_sub_section_data).show();
	});

	var ewm_dpm_activate_client_details_billing = function(){
		$('.ewm_dpm_client_subsection').hide();
		$('.ewm_dpm_submenu_options_details').show(); // Show menu billing
		$('.ewm_dpm_client_code_section').show(); // Show billing
		$('.ewm_dpm_sub_client_menu_o').removeClass('ewm_dpm_sub_active_m_i');
		$( '.ewm_dpm_sub_client_details' ).addClass('ewm_dpm_sub_active_m_i');
	};

	var ewm_dpm_activate_client_order_payment_d = function(){
		$('.ewm_dpm_client_subsection').hide();
		$('.ewm_dpm_client_order_list').show(); // Show billing
		// $('.ewm_dpm_client_subsection_f').hide(); //
		// $('.ewm_dpm_client_code_section').show(); // Show code section
		$('.ewm_dpm_submenu_options_orders').show(); // Show
		$('.ewm_dpm_sub_client_order').show(); // Show
		$('.ewm_dpm_sub_client_menu_o').removeClass( 'ewm_dpm_sub_active_m_i' );
		$( '.ewm_dpm_sub_client_order' ).addClass( 'ewm_dpm_sub_active_m_i' );
	};

	$('.ewm_dpm_client_menu_item').click(function(){
		ewm_selected_client_tab = $( this ).data('selected-client-tab');
		if( ewm_selected_client_tab == 'ewm_dpm_client_details_billing'){
			ewm_dpm_activate_client_details_billing();
		}
		else if( ewm_selected_client_tab == 'ewm_dpm_client_order_payment'){
			ewm_dpm_activate_client_order_payment_d();
		}
	})

	$('.ewm_dpm_client_c_submit_button').click(function(){
		
		var form_data = new FormData();

		// Create a new
		form_data.append( 'action', 'ewm_dpm_client_code_data' );
		form_data.append( "ewm_client_id", $( '#ewm_client_id').val() );

		form_data.append( "ewm_dpm_client_username", $("#ewm_dpm_client_username").val() );
		form_data.append( "ewm_dpm_client_code", $("#ewm_dpm_client_code").val() );
		form_data.append( "ewm_dpm_first_name", $("#ewm_dpm_first_name").val() );
		form_data.append( "ewm_dpm_last_name", $("#ewm_dpm_last_name").val() );
		form_data.append( "ewm_dpm_company_name", $("#ewm_dpm_company_name").val() );
		form_data.append( "ewm_dpm_phone", $("#ewm_dpm_phone").val() );
		form_data.append( "ewm_dpm_email", $("#ewm_dpm_email").val() );
		form_data.append( "ewm_dpm_number_of_locations", $("#ewm_dpm_number_of_locations").val() );
		form_data.append( "ewm_dpm_main_location", $("#ewm_dpm_main_location").val() );

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				$( '#ewm_client_id').val( response.user_id );
				alert('Client details saved.');
			},
			error: function (response) {
				console.log( response );
			}
		});

	} )

	var ewm_dpm_list_ors_for_single_client = function( order_list ){

		Object.entries( order_list ).forEach( ([ key,value ]) => {
			$('.ewm_dpm_client_main_table').append( '<tr> \
				<td class="ewm_dpm_c_title">#' + value.ID + '</td> \
				<td class="ewm_dpm_c_body">' + value.post_status + '</td> \
				<td class="ewm_dpm_c_edit"> \
					<center><a href="' + value.href_url + '"><input value="Open" type="button" class="ewm_dpm_open_order"></a></center> \
				</td> \
			</tr>' );
		});

	}

	var ewm_dpm_get_order_list = function( args ) {
		
		var form_data = new FormData();
		// Create a new
		form_data.append( 'action', 'ewm_dpm_ewm_dpm_get_order_list' );
		form_data.append( "ewm_client_id", args.client_id );
		var order_list;

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			async: true,
			data: form_data,
			success: function ( response ) {
				response
				order_list = jQuery.parseJSON( response );
				ewm_dpm_list_ors_for_single_client( order_list );
			},
			error: function (response) {
				console.log( response );
			}
		});

	}

	var ewm_list_client_orders = function( args ) {

		order_list = ewm_dpm_get_order_list( args );

	}

	var ewm_get_all_client_fields = function( args ) {

		var form_data = new FormData();
		// Create a new
		form_data.append( 'action', 'ewm_dpm_get_all_client_fields' );
		form_data.append( 'ewm_client_id', args.client_id );
		var client_response;

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			async: false,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				// console.log( response );
				client_response = jQuery.parseJSON( response );
			},
			error: function (response) {
				console.log( response );
			}
		});

		return client_response;
		
	}

	var ewm_dpm_populate_client_fields = function( args ) {

		ewm_client_data = ewm_get_all_client_fields({
			'client_id': args.client_id
		});

		// Populate fields code form
		$("#ewm_dpm_client_username").val( ewm_client_data.ewm_dpm_client_username );
		$("#ewm_dpm_client_code").val( ewm_client_data.ewm_dpm_client_code );
		$("#ewm_dpm_first_name").val( ewm_client_data.ewm_dpm_first_name );
		$("#ewm_dpm_last_name").val( ewm_client_data.ewm_dpm_last_name );
		$("#ewm_dpm_company_name").val( ewm_client_data.ewm_dpm_company_name );
		$("#ewm_dpm_phone").val( ewm_client_data.ewm_dpm_phone );
		$("#ewm_dpm_email").val( ewm_client_data.ewm_dpm_email );
		$("#ewm_dpm_number_of_locations").val( ewm_client_data.ewm_dpm_number_of_locations );
		$("#ewm_dpm_main_location").val( ewm_client_data.ewm_dpm_main_location );

		// Billing form
		$('#_billing_first_name').val( ewm_client_data.ewm_dpm_billing_first_name );
		$('#_billing_last_name').val( ewm_client_data.ewm_dpm_billing_last_name );
		$('#_billing_company').val( ewm_client_data.ewm_dpm_billing_company );
		$('#_billing_address_1').val( ewm_client_data.ewm_dpm_billing_address_1 );
		$('#_billing_address_2').val( ewm_client_data.ewm_dpm_billing_address_2 );
		$('#_billing_city').val( ewm_client_data.ewm_dpm_billing_city );
		$('#_billing_state').val( ewm_client_data.ewm_dpm_billing_state );
		$('#_billing_postcode').val( ewm_client_data.ewm_dpm_billing_postcode );
		$('#_billing_country').val( ewm_client_data.ewm_dpm_billing_country );
		$('#_billing_email').val( ewm_client_data.ewm_dpm_billing_email );
		$('#_billing_phone').val( ewm_client_data.ewm_dpm_billing_phone );
		$('#_cart_discount').val( ewm_client_data.ewm_dpm_cart_discount );
		$('#_cart_discount_tax').val( ewm_client_data.ewm_dpm_cart_discount_tax );
		$('#_order_tax').val( ewm_client_data.ewm_dpm_order_tax );
		$('#_order_total').val( ewm_client_data.ewm_dpm_order_total );
		$('#_prices_include_tax').val( ewm_client_data.ewm_dpm_prices_include_tax );
		$('#is_vat_exempt').val( ewm_client_data.ewm_dpm_is_vat_exempt );
		
		ewm_list_client_orders({
			"client_id": args.client_id
		});

	}

	$('.ewm_dpm_view_manage_user_button').click(function () {

		ewm_dpm_client_id = $( this ).data('ewm-client-id');
		$( '#ewm_client_id').val( ewm_dpm_client_id );

		ewm_dpm_populate_client_fields({
			'client_id':ewm_dpm_client_id
		});

		$('.ewm_dpm_wrapper_slive').show();
		$('[data-selected-client-tab=ewm_dpm_client_details_billing]').click();

	});

	var ewm_dpm_populate_client_fields_for_new = function(){

		// Populate fields code form
		$("#ewm_dpm_client_username").val();
		$("#ewm_dpm_client_code").val();
		$("#ewm_dpm_first_name").val();
		$("#ewm_dpm_last_name").val();
		$("#ewm_dpm_company_name").val();
		$("#ewm_dpm_phone").val();
		$("#ewm_dpm_email").val();
		$("#ewm_dpm_number_of_locations").val();
		$("#ewm_dpm_main_location").val();

		// Billing form
		$('#_billing_first_name').val('');
		$('#_billing_last_name').val('');
		$('#_billing_company').val('');
		$('#_billing_address_1').val('');
		$('#_billing_address_2').val('');
		$('#_billing_city').val('');
		$('#_billing_state').val('');
		$('#_billing_postcode').val('');
		$('#_billing_country').val('');
		$('#_billing_email').val('');
		$('#_billing_phone').val('');
		$('#_cart_discount').val('');
		$('#_cart_discount_tax').val('');
		$('#_order_tax').val('');
		$('#_order_total').val('');
		$('#_prices_include_tax').val('');
		$('#is_vat_exempt').val('');

	}

	$('.ewm_dpm_add_new_client').click(function () {
		ewm_dpm_client_id = 0; // $( this ).data('ewm-client-id');
		$( '#ewm_client_id').val( ewm_dpm_client_id );

		ewm_dpm_populate_client_fields_for_new();

		$('.ewm_dpm_wrapper_slive').show();
		$('.ewm_dpm_order_list_items').remove();
		$('[data-selected-client-tab=ewm_dpm_client_details_billing]').click();
	} );

	var ewm_dpm__ajax_save_client_billing = function ( args ){
	
		var form_data = new FormData();
		// Create a new
		form_data.append( 'action', 'ewm_dpm_save_individual_client' );
		form_data.append( "ewm_client_id", $( '#ewm_client_id').val() );
		
		Object.entries( client_billing_details ).forEach( ([key_outer,value_outer]) => {
			form_data.append( value_outer.key , $( '#'+value_outer.key).val() );
		});

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			async: false,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				client_response = jQuery.parseJSON( response );
				// alert('Client details saved.');
			},
			error: function (response) {
				console.log( response );
			}
		});

		return client_response;
		
	}

	var ewm_dpm_save_individual_client_billing = function(){

		client_billing_details = {
			1:{
				title:'Billing First Name',
				key:'_billing_first_name',
			},
			2:{
				title:'Billing Last Name',
				key:'_billing_last_name',
			},
			3:{
				title:'Billing Company',
				key:'_billing_company',
			},
			4:{
				title:'Billing Address 1',
				key:'_billing_address_1'
			},
			5:{
				title:'Billing Address 2',
				key:'_billing_address_2',
			},
			6:{
				title:'Billing City',
				key:'_billing_city'
			},
			7:{
				title:'Billing State',
				key:'_billing_state'
			},
			8:{
				title:'Billing Postal Code',
				key:'_billing_postcode'
			},
			9:{
				title:'Billing Country',
				key:'_billing_country'
			},
			10:{
				title:'Billing Email',
				key:'_billing_email'
			},
			11:{
				title:'Billing Phone',
				key:'_billing_phone'
			},
			12:{
				title:'Cart Discount',
				key:'_cart_discount'
			}, 
			13:{
				title:'Cart Discount Tax',
				key:'_cart_discount_tax'
			},
			14:{
				title:'Order Tax',
				key:'_order_tax'
			},
			15:{
				title:'Order Total',
				key:'_order_total'
			},
			16:{
				title:'Prices Include tax',
				key:'_prices_include_tax'
			},
			17:{
				title:'Vat Exempt',
				key:'is_vat_exempt'
			}
		}

		missing_entries_details = 0;

		Object.entries( client_billing_details ).forEach( ([key_outer,value_outer]) => {
			if( $( '#'+value_outer.key ).val() == '' ){
				missing_entries_details++
				$( '#'+value_outer.key ).css( {"border":"1px solid red"} )
			}
		});

		if( missing_entries_details > 0 ){
			alert( 'Please fill in the marked fields' );
			return false;
		}

		ewm_dpm__ajax_save_client_billing( client_billing_details );

	}

	$('#ewm_dpm_submit_client_billing_details').click(function(e) {

		ewm_dpm_save_individual_client_billing();

	})

	/*
	var ewm_dpm_populate_client_fields = function( args ) {

		console.log( args );
		args = args.client_info;
		$('#_billing_first_name').val( args._billing_first_name );
		$('#_billing_last_name').val( args._billing_last_name );
		$('#_billing_company').val( args._billing_company );
		$('#_billing_address_1').val( args._billing_address_1 );
		$('#_billing_address_2',).val( args._billing_address_2 );
		$('#_billing_city').val( args._billing_city);
		$('#_billing_state').val( args._billing_state );
		$('#_billing_postcode').val( args._billing_postcode );
		$('#_billing_country').val( args._billing_country );
		$('#_billing_email').val( args._billing_email );
		$('#_billing_phone').val( args._billing_phone );
		$('#_cart_discount').val( args._cart_discount );
		$('#_cart_discount_tax').val( args._cart_discount_tax );
		$('#_order_tax').val( args._order_tax );
		$('#_order_total').val( args._order_total );
		$('#_prices_include_tax').val( args._prices_include_tax );
		$('#is_vat_exempt').val( args.is_vat_exempt );
		$('#_customer_user').val( args._customer_user );

	}
	*/

	var ewm_dpm_change_client_on_order = function( args ){

		var form_data = new FormData();
		// Create a new
		form_data.append( 'action', 'ewm_dpm_change_client_on_order');
		form_data.append( "ewm_client_id", args.ewm_client_id );
		form_data.append( "ewm_order_id", args.ewm_order_id );

		jQuery.ajax({
			url: ajax_object.ajaxurl,
			async: false,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				client_response = jQuery.parseJSON( response );
				ewm_dpm_populate_client_fields( client_response );
			},
			error: function (response) {
				console.log( response );
			}
		});

	}

	$('.ewm_dpm_client_dropdown_input').change(function(){
		ewm_dpm_change_client_on_order({
			'ewm_client_id': $( this ).val(),
			'ewm_order_id': $( '#ewm_dpm_single_order_id').val()
		});
	} )

	var ewm_show_workorder_in_order = function( args ){

		ewm_product_id = args.product_id;

		inner_args = {
			'product_id' : ewm_product_id,
			'product_selected' :  $( '#ewm_dpm_single_edit_p_' + ewm_product_id )
		};

		$('#ewm_dpm_args_product_id').val( inner_args.product_id );

			ewm_dpm_products_selected[ inner_args.product_id ] = 'selected';
			// remove focus
			$( '.ewm_dpm_single_product_select_' + inner_args.product_id  ).addClass('ewm_dpm_single_product_selected_ano');
			inner_args.product_selected.val('Remove');
			$( '#ewm_dpm_single_edit_p_' + inner_args.product_id ).show()
			if( ewm_dpm_new_load_product == 'loaded' ){
				// show select flow.
				// ewm_dpm_do_slive_select_product( inner_args );
				$('#ewm_form').attr({
					'data-f-s-p':inner_args.product_id
				});
				$('.ewm_dpm_product_background_side_slive').fadeIn('slow');
				$('#ewm_workorder').click();
				ewm_dpm_args_product_id = args.product_id;

			}
		

		$('.ewmdpm_order_creation_stage_sliv').removeClass('ewmdpm_order_creation_stage_active_sliv') ;
		$( '[data-creation-stage="ewm_acivate_sliv_workorder"]' ).addClass('ewmdpm_order_creation_stage_active_sliv') ;
		
		// reload with new stage
		ewm_acivate_sliv_workorder();

	}

	if( typeof ewm_dpm_open_workorder !== 'undefined' ){
		if( ewm_dpm_open_workorder == 'yes' ){
			ewm_show_workorder_in_order( {
				'product_id': ewm_dpm_workorder_p_id
			} );

		}
	}

    $( document).ajaxStart( function() {
        // $('.ewm_llt_save_llt_main').css({'cursor' : 'wait'});
        document.body.style.cursor='wait';
    } ).ajaxStop( function() {
        // console.log('cursor load...');
        // $('.ewm_llt_save_llt_main').css({'cursor' : 'pointer'});
        document.body.style.cursor='default';
    } );

} )
