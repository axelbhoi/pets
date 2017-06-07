<?php

	class Login extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			// Your own constructor code
			if(($this->session->userdata('is_login') == 1)){

				if($this->session->userdata('user_type') == 1){
					redirect('dashboard');
				}
				else{
					redirect('transactions');
				}
			}	

		}

		function index()
		{
			if($this->input->post()){

				$result = $this->commonmodel->validate('employees_tbl','employee_username','employee_password',$this->input->post('username'),$this->input->post('password'));
				if($result){

					$session['username'] = $this->input->post('username');

					$session['user_id']	= $result[0]->id;

					$session['user_type'] = $result[0]->type;

					$session['is_login'] = 1;

					$this->session->set_userdata($session);

					if($result[0]->type == 1){
						redirect('dashboard');
					}
					else{
						redirect('transactions');
					}
				}
				else{
					$data['error_msg'] = "validate";

					$this->load->view('login',$data);
				}
			}
			else{

				$data['error_msg'] = "";

				$this->load->view('login',$data);	
			}
			
		}
	}