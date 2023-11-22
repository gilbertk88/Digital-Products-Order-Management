<?php

class ewm_dpm_workorders_n {

	public static function init() {

		// work order created.
		add_action( 'work_order_created',['ewm_dpm_workorders_n','work_order_created'] );

		// task edited.
		add_action( 'task_edited',['ewm_dpm_workorders_n','task_edited'] );

		// work order completed
		add_action( 'work_order_completed',['ewm_dpm_workorders_n','work_order_completed'] );

	}

	public static function work_order_created(){

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

	public static function task_edited(){

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

	public static function work_order_completed(){

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

 ewm_dpm_workorders_n::init();

?>