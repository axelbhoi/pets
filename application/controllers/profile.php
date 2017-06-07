<?php

	class Profile extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			// Your own constructor code
			if(($this->session->userdata('is_login') != 1)){
				redirect(base_url());
			}	

		}

		function index()
		{
			$data['profile'] = $this->commonmodel->getOne('employees_tbl','id',$this->session->userdata('user_id'));

			$this->load->view('profile/view',$data);
		}

		function change_password()
		{
			if($this->input->post()){
			
				$values = array(
					'employee_password'	=> $this->input->post('new_password')
				);

				$this->commonmodel->update('employees_tbl','id',$this->session->userdata('user_id'),$values);
				
				$data['confirmation'] = "submitted";

				$this->load->view('profile/password',$data);
			}
			else{

				$data['confirmation'] = "none";

				$this->load->view('profile/password',$data);
			}
		}
	}