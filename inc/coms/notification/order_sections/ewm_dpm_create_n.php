<?php

class ewm_dpm_create_n{

	// dashboard notification
	// email notification
	public static function notify( $param='' ){
		
    	// schedule - create post that 
		$timestamp	= time();
		$hook		= 'ewm_run_schedule';
		$args		= $param;

		as_schedule_single_action( $timestamp, $hook, $args );

	}

	public static function run_schedule( $param='' ){
		//@todo (create this table)add to account notification
		ewm_dpm_create_n::add_notification_on_dashboard( $param );
		ewm_dpm_create_n::do_email_notification( $param );
	}

	public static function do_email_notification($param=''){
		//@todo send out email/ set
		ewm_dpm_create_n::mailout([
			'mail_subject'	=> 'New Notification '.$_SERVER['HTTP_HOST'],
			'mail_content '	=> 'You have a new notification, click <br> <a href="'.mvc_public_url(array('controller' => 'p_clientloans' , 'action' => 'notification')).'">Click Here</a>',
			'recipient_list'=> $param['user_data']->email, // make this a list
		]);
	}

	public static function do_advanced_notification_with_api(){
		//@todo 
	}

	public static function create_dashboard_notification_post(){
		
	}

	public static function add_notification_on_dashboard($param=''){
		//@todo test
		ewm_dpm_create_n::create_dashboard_notification_post([
			'message'	=>$param['message'],
			'user_id'	=>$param['borrower_data']->id,
			'status'	=>1,
			'time_created'=>date("Y-m-d H:i:s")
		]);

	}

	public static function mailout($param=[]){
		$mail_subject = $param['mail_subject'];
        $mail_content = $param['mail_content'];
    
        $recipient_list = $param['recipient_list']; // add recipient list to settings
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
        $headers .= 'From: no_reply@'.$_SERVER['HTTP_HOST']. "\r\n";
        $email_sent = wp_mail( $recipient_list, $mail_subject , $mail_content,$headers);		
		return $email_sent;
	}
}

add_action( 'ewm_run_schedule' , ['ewm_dpm_create_n','run_schedule'] );

?>