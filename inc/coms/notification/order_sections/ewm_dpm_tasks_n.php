<?php

class ewm_dpm_tasks_n { //extends ewm_dpm_create_n{

	public static function init(){
		// Create task.
		add_action('create_task',['ewm_dpm_tasks_n','create_task']);

		// Assign task.
		add_action('assign_task',['ewm_dpm_tasks_n','assign_task']);

		// Freelance Acceptance.
		add_action('freelance_acceptance',['ewm_dpm_tasks_n','freelance_acceptance']);

		// Task completion.
		add_action('a_task_completed',['ewm_dpm_tasks_n','a_task_completed']);

		// Task has an obstraction.
		add_action('task_has_an_obstraction',['ewm_dpm_tasks_n','task_has_an_obstraction']);

	}

	public static function create_task(){

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

	// Assign task.
	public static function assign_task(){

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

	// Freelance Acceptance.
	public static function  freelance_Acceptance(){

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

	// Task completion.
	public static function a_task_completed(){

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

	// Task has an obstraction.
	public static function task_has_an_obstraction(){

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

ewm_dpm_tasks_n::init();

?>