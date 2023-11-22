jQuery(document).ready(function($) {

	var ewm_dpm_signup_form_submit = function(){

        var form_data = new FormData();
    
        form_data.append( 'action', 'ewm_dpm_submit_signup_form' );

        form_data.append( 'ewmdsm_signup_first_name', $("#ewmdsm_signup_first_name").val() );

        form_data.append( 'ewmdsm_signup_last_name', $("#ewmdsm_signup_last_name").val() );

        form_data.append( 'ewmdsm_signup_username', $("#ewmdsm_signup_username").val() );

        form_data.append( 'ewmdsm_signup_email', $("#ewmdsm_signup_email").val() );

		form_data.append( 'ewmdsm_signup_password',  $("#ewmdsm_signup_password").val() );

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

	$('.ewmdsm_field_button_signup').click(function(){

		// TODO check new password and confirm password are correct.
		if( $("#ewmdsm_signup_password").val() !== $("#ewmdsm_signup_confirm_password").val() ){

			alert("Please ensure your new password and confirm password are similar");

		}

		// TODO check that fields are filled

		// Push to server
		ewm_dpm_signup_form_submit();

	} )

    var ewm_dpm_switch_page = function( _args = {} ) {

        // Add get var
        window.location.search += '&ewm_dpm_main_page='+ _args.page_id ;
       
    }

    $('.ewm_dpm_d_menu_item_li').click(function(e) {

        ewm_dpm_switch_page({
            'page_id': $( this ).data('page-name')
        });

    });

    $('.ewm_dpm_single_ord_view').click(function(e) {

        ord_id = $( this ).data('single-ord') ;

        // Set page to single order view and page id
        window.location.search += '&ewm_dpm_main_page=single_order_details&ord_id='+ ord_id ;

    } );

    $('.ewm_dpm_single_tkt_view').click(function(e) {

        tkt_id = $( this ).data('single-tkt');

        // Set page to single order view and page id
        window.location.search += '&ewm_dpm_main_page=single_tkt_details&tkt_id='+ tkt_id ;

    } );

    var ewm_dpm_populate_popup_frontend_tkt = function( tkt_id ){

        alert( 'Ticket_id' + tkt_id );
        // get the data
        // stage
        // title 
        // content
        // chat
        // 

    }

    var ewm_dpm_refresh_ticket_list_listener = function(){

        $('.ewm_dpm_single_tkt_line_').click(function() {

            $('.ewm_dpm_single_ord_pop_wrapper_OF').show();

            single_ticket_id = $( this ).data('single-ticket-id');

            ewm_dpm_get_single_ticket( { 'ticket_id': single_ticket_id } );

            // $('.ewm_dpm_single_old_ticket_nu_').html( single_ticket_id );

            // single_ticket_status = $( this ).data('single-ticket-status');

            // $('.ewm_dpm_single_old_ticket_status').html( single_ticket_status );

            //ewm_dpm_single_old_ticket_status

        } )

    }

    ewm_dpm_refresh_ticket_list_listener();

    $('.ewm_dpm_close_old_ord').click(function() {
        $('.ewm_dpm_single_ord_pop_wrapper').hide();
    })

    var ewm_dpm_update_profile_details = function() {

        var form_data = new FormData();
    
        form_data.append( 'action', 'ewm_dpm_submit_profile_form' );

        form_data.append( 'ewmdsm_profile_display_name', $("#ewmdsm_profile_display_name").val() );

        form_data.append( 'ewmdsm_profile_username', $("#ewmdsm_profile_username").val() );

        form_data.append( 'ewmdsm_profile_email', $("#ewmdsm_profile_email").val() );

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

    $('.ewmdsm_field_button_profile').click(function() {
        ewm_dpm_update_profile_details();
    })

    var ewm_dpm_activate_login = function(){

        $('.ewm_dpm_cover_sec').show();

        $('.ewm_dsm_container_signup').hide();

        $('.ewm_dpm_ls_login').css({'background-color':'#333'});

        $('.ewm_dpm_ls_signup').css({'background-color':'gray'});

    }

    $('.ewm_dpm_ls_login').click(function() {

        ewm_dpm_activate_login();

    });

    var ewm_dpm_activate_signup = function(){

        $('.ewm_dpm_cover_sec').hide();

        $('.ewm_dsm_container_signup').show();

        $('.ewm_dpm_ls_login').css({'background-color':'gray'});

        $('.ewm_dpm_ls_signup').css({'background-color':'#333'});

    }

    $('.ewm_dpm_ls_signup').click(function(){

        ewm_dpm_activate_signup();

    });

    if( typeof ewm_is_dual_access == 'boolean' ){
        $('.ewm_dpm_ls_login').click();
    }

    $('.ewm_dpm_new_tkt_line_').click(function(){

        // Close previous pop up
        $('.ewm_dpm_single_ord_pop_wrapper').hide();

        // Show new pop up
        $('.ewm_dpm_single_ord_pop_wrapper_new').show();

        ord_numb = $('.ewm_dpm_ord_details').data('ord-numb');

        $('.ewm_dpm_new_order_id').val( ord_numb );

    })

    $('.ewm_dpm_close_old_ord_new').click(function() {

        // Show new pop up
        $('.ewm_dpm_single_ord_pop_wrapper_new').hide();

    } )

    var ewm_dpm_submit_new_ticket = function() {}

    $('.ewm_dpm_new_ticket_submit').click(function() {

        var form_data = new FormData();
    
        form_data.append( 'action', 'ewm_dpm_new_ticket_form' );

        form_data.append( 'ewm_dpm_new_ticket_title', $("#ewm_dpm_new_ticket_title").val() );

        form_data.append( 'ewm_dpm_new_ticket_details', $("#ewm_dpm_new_ticket_details").val() );

        form_data.append( 'ewm_dpm_new_order_id', $("#ewm_dpm_new_order_id").val() );

        jQuery.ajax({

            url: ajax_object.ajaxurl,

            type: 'post',

            contentType: false,

            processData: false,

            data: form_data,

            success: function ( response ) {

                console.log( response );

                $('.ewm_dpm_single_ord_pop_wrapper_new').hide();

                response = jQuery.parseJSON( response );

                $('.ewm_dpm_single_ticket').append( '<div class="ewm_dpm_single_tkt_line_" data-single-ticket-id="'+ response.post_id +'" data-single-ticket-status="Resolved ">( #'+ response.post_id +' - Resolved)'+response.post_details.ewm_dpm_new_ticket_title+' </div>' ) ;

                ewm_dpm_refresh_ticket_list_listener();

            },

            error: function (response) {

                console.log( response );

            }

        } ) ;

    } )

    $('.ewm_dpm_single_product_action_button_click_frontend').click(function () {

        frontend_product_id_ewm = $( this ).data( 'frontend-product-id-ewm' );

        $('.ewm_dpm_add_to_shopping_popup').show();

        $('.ewm_dpm_add_to_shopping_popup').attr( 'data-shopping-product-id' , frontend_product_id_ewm );
        
    })

    $('.ewm_dpm_button_close_shopping_popup').click( function () {

        $('.ewm_dpm_add_to_shopping_popup').hide() ;

    });

    var ewm_dpm_add_single_p_to_cart = function( product_id ) {

		var form_data = new FormData();
		
		form_data.append( 'action', 'ewm_dpm_add_p_to_cart' );

		form_data.append( 'ewm_dpm_product_id', product_id );

		jQuery.ajax({

			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {

				console.log( response );
				response = jQuery.parseJSON( response );

                window.location = response.wp_cart_url;

			},
			error: function (response) {
				console.log( response );
			}

		} ) ;

    }

    $('.ewm_dpm_single_product_action_button_click').click( function () {

        ewm_dpm_add_single_p_to_cart( $( this ).data('product-id') );
        
    } );

    $('.ewm_dpm_popup_close_ticket_OF').click( function () {
        $('.ewm_dpm_single_ord_pop_wrapper_OF').hide();
    })

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

	var ewm_dpm_update_ticket_comments = function ( args = {} ){

        $('.ewm_dpm_ticket_chat_box_OF').html('');

		args.comment_list.forEach(function(currentValue, index, arr){

			single_message_item = '<div class="ewm_dpm_single_ticket_message_OF">\
					<div class="ewm_dpm_single_mes_profile_OF">Pic</div>\
					<div class="ewm_dpm_single_mes_actual_message_OF"> '+ arr[index].comment_content +' <br> <span class="ewm_dpm_second_line_det_OF">'+ args.user_comments_list[arr[index].comment_ID ] + ' - '+ arr[index].comment_date_gmt+' </span> </div>\
				</div>';

			$('.ewm_dpm_ticket_chat_box_OF').append( single_message_item );

			var objDiv = document.getElementById("ewm_dpm_ticket_chat_box_OF");
			objDiv.scrollTop = objDiv.scrollHeight;

		})

	};

    var ewm_dpm_focus_on_new_ticket = function(ticket) {

		$( '.ewm_dpm_ticket_menu_items_new_OF' ).addClass( 'ewm_dpm_ticket_menu_items_focus_OF' );

		$( '.ewm_dpm_ticket_menu_items_new_OF' ).removeClass( 'ewm_dpm_ticket_menu_items_OF' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_progress_OF').addClass( 'ewm_dpm_ticket_menu_items_OF' );

		$('.ewm_dpm_ticket_menu_items_progress_OF').removeClass( 'ewm_dpm_ticket_menu_items_focus_OF' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_resolved_OF').addClass( 'ewm_dpm_ticket_menu_items_OF' );

		$('.ewm_dpm_ticket_menu_items_resolved_OF').removeClass( 'ewm_dpm_ticket_menu_items_focus_OF' );

		// Update on status server

	}

	var ewm_dpm_focus_on_progress_ticket = function(){

		$( '.ewm_dpm_ticket_menu_items_progress_OF' ).addClass( 'ewm_dpm_ticket_menu_items_focus_OF' );

		$( '.ewm_dpm_ticket_menu_items_progress_OF' ).removeClass( 'ewm_dpm_ticket_menu_items_OF' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_new_OF').addClass( 'ewm_dpm_ticket_menu_items_OF' );

		$('.ewm_dpm_ticket_menu_items_new_OF').removeClass( 'ewm_dpm_ticket_menu_items_focus_OF' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_resolved_OF').addClass( 'ewm_dpm_ticket_menu_items_OF' );

		$('.ewm_dpm_ticket_menu_items_resolved_OF').removeClass( 'ewm_dpm_ticket_menu_items_focus_OF' );

		// Update on status server

		// Update on status server
	}

	var ewm_dpm_focus_on_resolved_ticket = function(){


		$( '.ewm_dpm_ticket_menu_items_progress_OF' ).addClass( 'ewm_dpm_ticket_menu_items_OF' );

		$( '.ewm_dpm_ticket_menu_items_progress_OF' ).removeClass( 'ewm_dpm_ticket_menu_items_focus_OF' );

		//--------------------------------------------------------------------------------------------

		$('.ewm_dpm_ticket_menu_items_new_OF').addClass( 'ewm_dpm_ticket_menu_items_OF' );

		$('.ewm_dpm_ticket_menu_items_new_OF').removeClass( 'ewm_dpm_ticket_menu_items_focus_OF' );

		//--------------------------------------------------------------------------------------------

		$( '.ewm_dpm_ticket_menu_items_resolved_OF' ).addClass( 'ewm_dpm_ticket_menu_items_focus_OF' );

		$( '.ewm_dpm_ticket_menu_items_resolved_OF' ).removeClass( 'ewm_dpm_ticket_menu_items_OF' );

		// Update on status server

	}

    var ewm_dpm_populate_ticket_details = function( args = [] ){

		$('.ewm_dpm_ticket_issue_box_title_OF').html( args.single_ticket.post_title );

		$('.ewm_dpm_ticket_issue_box_detail_OF').html( args.single_ticket.post_content );

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

    // console.log( 'Confirm message' );
	if( typeof $( ".gform_confirmation_message" ).html() == 'undefined' ){
        // do nothing
    }
    else{
        // Redirect to dashboard
        console.log( 'Confirm message is showing' );
    }

    $('.ewm_dpm_single_data_point_button').click(function(){

        $(this).data('singledata-code');

        $(this).data('singledata-post_id');

        $('.ewm_dpm_main_dp_value').val( $('.' + $(this).data('singledata-code') ).html() );

        $('.ewm_dpm_main_single_dp_wrapper').show();

    });

    $('.ewm_dpm_close_b').click(function() {
        $('.ewm_dpm_main_single_dp_wrapper').hide();
    })

	$('.ewm_call_me_now').click( function(){ 
		$('.ewm_dpm_popup_inner_o').show();
	});

	$('.ewm_dpm_yes_form_fill').click( function(){ 
		$('.ewm_dpm_popup_inner_o').hide();
	});

    var ewm_make_call_request = function(){

		var form_data = new FormData();
		
		form_data.append( 'action', 'ewm_dpm_make_call_request' );

		form_data.append( 'ewmdsm_order_id', $args.ticket_id );

		jQuery.ajax({

			url: ajax_object.ajaxurl,
			type: 'post',
			contentType: false,
			processData: false,
			data: form_data,
			success: function ( response ) {
				console.log( response );
				response = jQuery.parseJSON( response );
				alert('');
			},
			error: function (response) {
				console.log( response );
			}

		} );

    }

    $('.ewm_dpm_no_call_me').click( function(){
        $(this).html('Making the request...');
        ewm_make_call_request();
    })
    
} );

//jQuery(document).on("gform_confirmation_loaded", function(event, formId){
    // code to be triggered when the confirmation page is loaded
//    alert("form submission is a success");
//});