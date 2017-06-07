<?php

	class Calendar extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			// Your own constructor code
			if(($this->session->userdata('is_login') != 1)){
				redirect(base_url());
			}	

		}

		function getSchedules()
		{
			$schedules = $this->commonmodel->getAll('scheduling_tbl');
			echo json_encode($schedules);
		}

		function addSchedules()
		{
			if($this->input->post())
			{
				$schedule_details = array(
					'schedule_clientname'	=>	$this->input->post('schedule_clientname'),
					'schedule_pets'			=>	$this->input->post('schedule_pets'),
					'schedule_services'		=>	$this->input->post('schedule_services'),
					'schedule_dates'		=>	$this->input->post('schedule_dates')
				);

				//save to database
				$this->commonmodel->insert('scheduling_tbl',$schedule_details);
			
				echo true;
			}
			else
			{
				redirect('dashboard');
			}
		}

		function editSchedules()
		{
			if($this->input->post())
			{
				$schedule_details = array(
					'schedule_clientname'	=>	$this->input->post('schedule_clientname'),
					'schedule_pets'			=>	$this->input->post('schedule_pets'),
					'schedule_services'		=>	$this->input->post('schedule_services'),
					'schedule_dates'		=>	$this->input->post('schedule_dates')
				);

				//save to database
				$this->commonmodel->update('scheduling_tbl','id',$this->input->post('schedule_id'),$schedule_details);
			
				echo true;
			}
			else
			{
				redirect('dashboard');
			}
		}
	
		function deleteSchedules()
		{
			if($this->input->post())
			{
				$this->commonmodel->delete('scheduling_tbl','id',$this->input->post('delete_id'));

				echo true;
			}
			else
			{
				redirect('dashboard');
			}
		}
	}