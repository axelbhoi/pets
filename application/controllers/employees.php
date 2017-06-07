<?php

	class Employees extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			// Your own constructor code
			if(($this->session->userdata('is_login') != 1) || $this->session->userdata('user_type') != 1){
				redirect(base_url());
			}	

		}

		//get
		function index()
		{	
			$data['employees'] = $this->commonmodel->getTwo('employees_tbl','type','is_active',0,1); 

			$data['mine'] = $this->commonmodel->getTwo('employees_tbl','is_active','id',1,$this->session->userdata('user_id'));

			$this->load->view('employees/view',$data);
		}

		//add
		function add()
		{
			if($this->input->post())
			{
				//form validation here
				$employee_details = array(
					'type'						=>	$this->input->post('employee_type'),
					'is_active'					=>	1,
					'employee_username'			=>	$this->input->post('employee_username'),
					'employee_password'			=>	'password123',
					'employee_firstname'		=>	$this->input->post('employee_firstname'),
					'employee_lastname'			=>	$this->input->post('employee_lastname'),
					'employee_contactnumber'	=>	$this->input->post('employee_contactnumber'),
					'employee_sss'				=>	$this->input->post('employee_sss'),
					'employee_tin'				=>	$this->input->post('employee_tin'),
					'employee_salary'			=>	$this->input->post('employee_salary')
				);

				//insert to database
				$this->commonmodel->insert('employees_tbl',$employee_details);

				//redirect to employees table
				redirect('employees');				
			}
			else
			{
				$data['users'] = $this->commonmodel->getOne('employees_tbl','is_active',1);

				$this->load->view('employees/add',$data);
			}
		}

		//edit
		function edit()
		{
			if($this->input->post())
			{	
				//check if user exist
				$result = $this->commonmodel->getOne('employees_tbl','id',$this->input->post('employee_id'));
			
				if($result)
				{
					$employee_details = array(
						'employee_username'			=>	$this->input->post('employee_username'),
						'employee_password'			=>	$this->input->post('employee_password'),
						'employee_firstname'		=>	$this->input->post('employee_firstname'),
						'employee_lastname'			=>	$this->input->post('employee_lastname'),
						'employee_contactnumber'	=>	$this->input->post('employee_contactnumber'),
						'employee_sss'				=>	$this->input->post('employee_sss'),
						'employee_tin'				=>	$this->input->post('employee_tin'),
						'employee_salary'			=>	$this->input->post('employee_salary')
					);

					//save to database
					$this->commonmodel->update('employees_tbl','id',$this->input->post('employee_id'),$employee_details);

					//redirect to employees table
					redirect('employees');	

				}
				else
				{
					redirect('employees');
				}	
			}
			else
			{
				$data['employees'] = $this->commonmodel->getOne('employees_tbl','id',end($this->uri->segments));
				//check if user exists in database
				if($data['employees'])
				{
					$data['users'] = $this->commonmodel->getOne('employees_tbl','is_active',1);
					
					$this->load->view('employees/edit',$data);
				}
				else
				{
					redirect('employees');
				}
			}
		}

		//delete
		function delete()
		{	
			if($this->input->post())	
			{
				$ctr = 0;
				//explode the values
				$exploded_values = explode(',',$this->input->post('employees_to_delete'));

				foreach($exploded_values as $exploded_value)
				{
					$values = array(
						'is_active'		=> 0
					);

					if($exploded_value == $this->session->userdata('user_id')){
						$ctr = $ctr + 1;
					}

					$this->commonmodel->update('employees_tbl','id',$exploded_value,$values);
				}

				if($ctr > 0){
					redirect('logout');
				}
				else{
					redirect('employees');
				}
			}	
			else
			{
				redirect('employees');
			}				
		}
	}