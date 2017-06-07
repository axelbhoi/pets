<?php

	class Services extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			// Your own constructor code
			if(($this->session->userdata('is_login') != 1)){
				redirect(base_url());
			}	

		}

		//get
		function index()
		{
			$data['services'] = $this->commonmodel->getOne('services_tbl','is_active',1);

			$this->load->view('services/view',$data);
		}

		//add
		function add()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post())
				{
					//form validation goes here

					$service_details = array(
						'is_active'			=>	1,
						'service_name'		=>	$this->input->post('service_name'),
						'service_details'	=>	$this->input->post('service_details'),
						'service_size'		=>	$this->input->post('service_size'),
						'service_amount'	=>	$this->input->post('service_amount')
					);

					//save to database
					$this->commonmodel->insert('services_tbl',$service_details);
					//redirect back to services
					redirect('services');
				}
				else
				{
					$this->load->view('services/add');
				}
			}
			else{
				redirect('services');
			}
		}

		//edit
		function edit()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post())
				{
					//check if user exist
					$result = $this->commonmodel->getOne('services_tbl','id',$this->input->post('service_id'));
				
					if($result)
					{
						$service_details = array(
							'service_name'		=>	$this->input->post('service_name'),
							'service_details'	=>	$this->input->post('service_details'),
							'service_size'		=>	$this->input->post('service_size'),
							'service_amount'	=>	$this->input->post('service_amount')
						);

						//save to database
						$this->commonmodel->update('services_tbl','id',$this->input->post('service_id'),$service_details);

						//redirect to employees table
						redirect('services');	

					}
					else
					{
						redirect('services');
					}
				}
				else
				{
					$data['services'] = $this->commonmodel->getOne('services_tbl','id',end($this->uri->segments));
					//check if user exists in database
					if($data['services'])
					{
						$this->load->view('services/edit',$data);
					}
					else
					{
						redirect('services');
					}
				}
			}
			else{
				redirect('services');
			}
		}

		//delete
		function delete()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post())	
				{
					//explode the values
					$exploded_values = explode(',',$this->input->post('services_to_delete'));

					foreach($exploded_values as $exploded_value)
					{
						$values = array(
							'is_active'		=> 0
						);
						$this->commonmodel->update('services_tbl','id',$exploded_value,$values);

					}
					redirect('services');
				}	
				else
				{
					redirect('services');
				}					
			}
			else{
				redirect('services');
			}

		}
	}