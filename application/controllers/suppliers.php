<?php

	class Suppliers extends CI_Controller{

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
			$data['suppliers'] = $this->commonmodel->getOne('suppliers_tbl','is_active',1);

			$this->load->view('suppliers/view',$data);
		}

		//add
		function add()
		{
			if($this->input->post())
			{
				//form validation goes here
				$supplier_details = array(
					'is_active'					=>	1,
					'supplier_name'				=>	$this->input->post('supplier_name'),
					'supplier_contactnumber'	=>	$this->input->post('supplier_contactnumber'),
					'supplier_address'			=>	$this->input->post('supplier_address'),
					'supplier_email'			=>	$this->input->post('supplier_email'),
					'supplier_tin'				=>	$this->input->post('supplier_tin'),	
					'supplier_type'				=>	$this->input->post('supplier_type'),
					'supplier_products'			=>	$this->input->post('supplier_products')
				);

				// save to database
				$this->commonmodel->insert('suppliers_tbl',$supplier_details);

				//redirect to suppliers table
				redirect('suppliers');					

			}
			else
			{
				$this->load->view('suppliers/add');
			}
		}

		//edit
		function edit()
		{
			if($this->input->post())
			{
				//check if user exist
				$result = $this->commonmodel->getOne('suppliers_tbl','id',$this->input->post('supplier_id'));
			
				if($result)
				{
					$supplier_details = array(
						'supplier_name'				=>	$this->input->post('supplier_name'),
						'supplier_contactnumber'	=>	$this->input->post('supplier_contactnumber'),
						'supplier_address'			=>	$this->input->post('supplier_address'),
						'supplier_email'			=>	$this->input->post('supplier_email'),
						'supplier_tin'				=>	$this->input->post('supplier_tin'),
						'supplier_type'				=>	$this->input->post('supplier_type'),
						'supplier_products'			=>	$this->input->post('supplier_products')
					);

					//save to database
					$this->commonmodel->update('suppliers_tbl','id',$this->input->post('supplier_id'),$supplier_details);

					//redirect to employees table
					redirect('suppliers');	

				}
				else
				{
					redirect('suppliers');
				}				
			}
			else
			{
				$data['suppliers'] = $this->commonmodel->getOne('suppliers_tbl','id',end($this->uri->segments));
				//check if user exists in database
				if($data['suppliers'])
				{
					$this->load->view('suppliers/edit',$data);
				}
				else
				{
					redirect('suppliers');
				}
			}
		}

		//delete
		function delete()
		{
			if($this->input->post())	
			{
				//explode the values
				$exploded_values = explode(',',$this->input->post('suppliers_to_delete'));

				foreach($exploded_values as $exploded_value)
				{
					$values = array(
						'is_active'		=> 0
					);
					$this->commonmodel->update('suppliers_tbl','id',$exploded_value,$values);

				}
				redirect('suppliers');
			}	
			else
			{
				redirect('suppliers');
			}				
		}
	}