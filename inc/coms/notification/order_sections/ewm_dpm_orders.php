<?php

class ewm_dpm_orders_n{ // extends ewm_dpm_workorders_n{

	public static function init(){

		// add_action('init','ewm_dpm_workorders_n','init');
		// new order that is not completed.
		add_action('new_order_that_is_not_completed',['ewm_dpm_orders_n','new_order_that_is_not_completed']);
		// new order that is completed without form add.	
		add_action('new_order_that_is_completed_without_form_add',['ewm_dpm_orders','new_order_that_is_completed_without_form_add']);
		// new order that is completed with form fills.
		add_action('new_order_that_is_completed_with_form_fills',['ewm_dpm_orders','new_order_that_is_completed_with_form_fills']);
		// tasks approved created.
		add_action('tasks_approved_created',['ewm_dpm_orders','tasks_approved_created']);
		// order completed.
		add_action('order_completed',['ewm_dpm_orders','order_completed']);
		// overdue tasks and orders.
		add_action('overdue_tasks_and_orders',['ewm_dpm_orders','overdue_tasks_and_orders']);
		// issue on completion of task, and a recursive notification created.
		add_action('issue_on_completion_of_task_with_a_recursive_notification',['ewm_dpm_orders','issue_on_completion_of_task_with_a_recursive_notification']);
		// order status change
		add_action('order_status_change',['ewm_dpm_orders','order_status_change']);
		
	}

	public static function new_order_that_is_not_completed() {

		$message = [
			'dashboard'=>'',
			'email'=>[
				'recipients' =>'',
				'subject' => '',
				'message' => '',
					
			]
		] ;

		ewm_dpm_create_n::notify($message);

	}

	public static function new_order_that_is_completed_without_form_add(){

		$message = [
			'dashboard'=>'',
			'email'=>[
				'recipients' =>'',
				'subject' => '',
				'message' => '',
					
			]
		] ;

		ewm_dpm_create_n::notify($message);

	}

	public static function new_order_that_is_completed_with_form_fills(){

		$message = [
			'dashboard'=>'',
			'email'=>[
				'recipients' =>'',
				'subject' => '',
				'message' => '',
					
			]
		] ;

		ewm_dpm_create_n::notify($message);
	}

	public static function tasks_approved_created(){ 

		$message = [
			'dashboard'=>'',
			'email'=>[
				'recipients' =>'',
				'subject' => '',
				'message' => '',
					
			]
		] ;

		ewm_dpm_create_n::notify($message);

	}

	public static function each_task_completed(){

		$message = [
			'dashboard'=>'',
			'email'=>[
				'recipients' =>'',
				'subject' => '',
				'message' => '',
					
			]
		] ;

		ewm_dpm_create_n::notify($message);

	}

	public static function order_completed(){ 

		$message = [
			'dashboard'=>'',
			'email'=>[
				'recipients' =>'',
				'subject' => '',
				'message' => '',
					
			]
		] ;

		ewm_dpm_create_n::notify($message);

	}

	public static function overdue_tasks_and_orders(){ 

		$message = [
			'dashboard'=>'',
			'email'=>[
				'recipients' =>'',
				'subject' => '',
				'message' => '',
					
			]
		] ;

		ewm_dpm_create_n::notify($message);

	}

	public static function issue_on_completion_of_task_with_a_recursive_notification(){

		$message = [
			'dashboard'=>'',
			'email'=>[
				'recipients' =>'',
				'subject' => '',
				'message' => '',
					
			]
		] ;

		ewm_dpm_create_n::notify($message);

	}

	public static function order_status_change(){
	
		$message = [
			'dashboard'=>'',
			'email'=>[
				'recipients' =>'',
				'subject' => '',
				'message' => '',
					
			]
		] ;

		ewm_dpm_create_n::notify($message);

	}

}

ewm_dpm_orders_n::init();

?>