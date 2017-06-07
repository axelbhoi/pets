<?php

	class Clients extends CI_Controller{

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
			$data['clients'] = $this->commonmodel->getCLientAndPets();

			$this->load->view('clients/view',$data);
		}

		function add()
		{
			if($this->input->post())
			{
				$counter =  count($this->input->post('pet_name'));
				//form validation goes here

				$clients_details = array(
					'is_active'				=>	1,
					'client_lastname'		=>	$this->input->post('client_lastname'),
					'client_firstname'		=>	$this->input->post('client_firstname'),
					'client_contactnumber'	=>	$this->input->post('client_contactnumber'),
					'client_address'		=>	$this->input->post('client_address'),
					'client_email'			=>	$this->input->post('client_email')
				);

				//save to database
				$result = $this->commonmodel->insert_id('clients_tbl',$clients_details);		

				for($ctr = 0; $ctr <= $counter - 1; $ctr++ )
				{
					$pets_details = array(
						'client_id'		=> $result,
						'is_active'		=>	1,
						'pet_name'		=>	$this->input->post('pet_name')[$ctr],	
						'pet_species'	=>	$this->input->post('pet_species')[$ctr],
						'pet_breed'		=>	$this->input->post('pet_breed')[$ctr], 		
						'pet_sex'		=>	$this->input->post('pet_sex')[$ctr],	
						'pet_color'		=>	$this->input->post('pet_color')[$ctr],	
						'pet_microchip'	=>	$this->input->post('pet_microchip')[$ctr],	
						'pet_weight'	=>	$this->input->post('pet_weight')[$ctr],	
						'pet_birth'		=>	$this->input->post('pet_birth')[$ctr],	
						'pet_cycle'		=>	$this->input->post('pet_cycle')[$ctr]	
					);

					//save to database			
					$this->commonmodel->insert('pets_tbl',$pets_details);				
				}

				redirect('clients');
			}
			else
			{
				$this->load->view('clients/add');
			}
		}
		
		function edit()
		{
			if($this->input->post())
			{
				$counter =  count($this->input->post('pet_name'));

				$clients_details = array(
					'client_lastname'		=>	$this->input->post('client_lastname'),
					'client_firstname'		=>	$this->input->post('client_firstname'),
					'client_contactnumber'	=>	$this->input->post('client_contactnumber'),
					'client_address'		=>	$this->input->post('client_address'),
					'client_email'			=>	$this->input->post('client_email')
				);

				$this->commonmodel->update('clients_tbl','id',$this->input->post('client_id'),$clients_details);

				for($ctr = 0; $ctr <= $counter - 1; $ctr++ )
				{
				
					if($this->input->post('pet_id')[$ctr] == 0)
					{
						$insert_pets_details = array(
							'client_id'		=>	$this->input->post('client_id'),
							'is_active'		=>	1,
							'pet_name'		=>	$this->input->post('pet_name')[$ctr],	
							'pet_species'	=>	$this->input->post('pet_species')[$ctr],
							'pet_breed'		=>	$this->input->post('pet_breed')[$ctr], 		
							'pet_sex'		=>	$this->input->post('pet_sex')[$ctr],	
							'pet_color'		=>	$this->input->post('pet_color')[$ctr],	
							'pet_microchip'	=>	$this->input->post('pet_microchip')[$ctr],	
							'pet_weight'	=>	$this->input->post('pet_weight')[$ctr],	
							'pet_birth'		=>	$this->input->post('pet_birth')[$ctr],	
							'pet_cycle'		=>	$this->input->post('pet_cycle')[$ctr]	
						);

						//insert to database
						$this->commonmodel->insert_id('pets_tbl',$insert_pets_details);
					}
					else
					{
						$pets_details = array(
							'pet_name'		=>	$this->input->post('pet_name')[$ctr],	
							'pet_species'	=>	$this->input->post('pet_species')[$ctr],
							'pet_breed'		=>	$this->input->post('pet_breed')[$ctr], 		
							'pet_sex'		=>	$this->input->post('pet_sex')[$ctr],	
							'pet_color'		=>	$this->input->post('pet_color')[$ctr],	
							'pet_microchip'	=>	$this->input->post('pet_microchip')[$ctr],	
							'pet_weight'	=>	$this->input->post('pet_weight')[$ctr],	
							'pet_birth'		=>	$this->input->post('pet_birth')[$ctr],	
							'pet_cycle'		=>	$this->input->post('pet_cycle')[$ctr]	
						);

						//update database
						$this->commonmodel->update('pets_tbl','id',$this->input->post('pet_id')[$ctr],$pets_details);
					}
				}

				redirect('clients');

			}
			else
			{
				$data['clients'] = $this->commonmodel->getOne('clients_tbl','id',end($this->uri->segments));

				$data['pets'] = $this->commonmodel->getTwo('pets_tbl','client_id','is_active',end($this->uri->segments),1);

				if($data['clients'])
				{
					$this->load->view('clients/edit',$data);
				}
				else
				{
					redirect('clients');
				}
			}
		}

		function delete()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post())
				{
					if($this->input->post())	
					{
						//explode the values
						$exploded_values = explode(',',$this->input->post('clients_to_delete'));

						foreach($exploded_values as $exploded_value)
						{
							//delete in clients table
							$this->commonmodel->delete('clients_tbl','id',$exploded_value);
						
							//delete in pets table
							$this->commonmodel->delete('pets_tbl','client_id',$exploded_value);
						}
						redirect('clients');
					}	
					else
					{
						redirect('clients');
					}

				}
				else
				{
					redirect('clients');
				}				
			}
			else{
				redirect('clients');
			}
		}

		function deletePet()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post())
				{
					$values = array(
						'is_active'	=> 0
					);

					echo $this->commonmodel->update('pets_tbl','id',$this->input->post('petID'),$values);//$this->commonmodel->delete('pets_tbl','id',$this->input->post('petID'));
				}
				else
				{
					redirect('clients');
				}
			}
			else{
				redirect('clients');
			}
		}
	
		function history()
		{
			if(end($this->uri->segments) >= 1){

				$data['client'] = $this->commonmodel->getOne('clients_tbl','id',end($this->uri->segments));

				$data['datas'] = $this->commonmodel->history(end($this->uri->segments));

				$this->load->view('clients/history',$data);
			}	
			else{
				redirect('clients');
			}
		}

		function detailedHistory()
		{
			if(end($this->uri->segments) >= 1){
				//check if transaction exists
				$transaction = $this->commonmodel->detailedTransactions(end($this->uri->segments));
				$total_services = 0;
				$total_items = 0;

				if($transaction){

					//get transactions from items and services
					$data['services'] = $this->commonmodel->getTransactionServices(end($this->uri->segments));

					$data['items'] = $this->commonmodel->getTransactionInventory(end($this->uri->segments));

					$data['transactions'] = $transaction;
				
					$data['clients'] = $this->commonmodel->getTransactionClients(end($this->uri->segments));

					if($data['services']){
						foreach($data['services'] as $service){
							$total_services = $total_services + $service->service_amount;
						}
					}

					if($data['items']){
						foreach($data['items'] as $item){
							$total_items = $total_items + ($item->inventory_price * $item->inventory_quantity);
						}
					}

					$data['total_service'] = number_format($total_services,2,'.','');

					$data['total_items'] = number_format($total_items,2,'.','');

					$this->load->view('clients/detailed',$data);
				}
				else{
					redirect('clients');
				}
			}
			else{
				redirect('clients');
			}
		}
	}