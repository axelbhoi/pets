<?php

	class Inventory extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			// Your own constructor code
			if(($this->session->userdata('is_login') != 1)){
				redirect(base_url());
			}	

		}

		function entries()
		{
			if($this->session->userdata('user_type') == 1){
				//echo end($this->uri->segments);
				if($this->input->post()){

					
					if($this->input->post('expiration_date') == "0"){
						$exploded_dates = explode('/',$this->input->post('item_expiry'));
						$expiration = $exploded_dates[2].'-'.$exploded_dates[0].'-'.$exploded_dates[1];
						//$expiration = $this->input->post('item_expiry');
					}
					else{
						$expiration = $this->input->post('expiration_date');
					}
					

					$entry = array(
						'is_active'	=> 1,
						'inventory_id'	=> $this->input->post('inventory_id'),
						'item_quantity'	=> $this->input->post('item_quantity'),
						'item_expiry'	=> $expiration
					);

					$this->commonmodel->insert('inventory_entry_tbl',$entry);

					redirect('inventory/entries/'.$this->input->post('inventory_id'));
				}
				else{
					$data['items'] = $this->commonmodel->newEntry(end($this->uri->segments));

					$data['code'] = $this->commonmodel->getOne('inventory_tbl','id',end($this->uri->segments));

					$this->load->view('inventory/new_entry',$data);					
				}
			}
			else{
				redirect('inventory');
			}
		}		

		function entries_edit()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post()){

					if($this->input->post('expiration_date') == "0"){
						$exploded_dates = explode('/',$this->input->post('edit_item_expiry'));
						$expiration = $exploded_dates[2].'-'.$exploded_dates[0].'-'.$exploded_dates[1];
						//$expiration = $this->input->post('edit_item_expiry');
					}
					else{
						$expiration = $this->input->post('expiration_date');
					}

					$entry = array(
						'item_quantity'	=> $this->input->post('edit_item_quantity'),
						'item_expiry'	=> $expiration
					);

					$this->commonmodel->update('inventory_entry_tbl','id',$this->input->post('item-id'),$entry);

					redirect('inventory/entries/'.$this->input->post('edit_inventory_id'));
				}
				else{
					redirect('inventory');
				}
			}
			else{
				redirect('inventory');
			}

		}

		function entries_delete()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post()){
					//explode the values
					$exploded_values = explode(',',$this->input->post('items_to_delete'));

					foreach($exploded_values as $exploded_value)
					{
						$values = array(
							'is_active'		=> 0
						);

						$this->commonmodel->update('inventory_entry_tbl','id',$exploded_value,$values);					
					}

					redirect('inventory/entries/'.$this->input->post('inventory_id'));	
					
				}
				else{
					redirect('inventory');
				}
			}
			else{
				redirect('inventory');
			}
		}

		//get
		function index()
		{
			//$data['items'] = $this->commonmodel->getOne('inventory_tbl','is_active',1);
			$data['items'] = $this->commonmodel->inventorySupplier();
			$entries = $this->commonmodel->inventoryEntry();

			if($entries){
				$entry = array();

				foreach($entries as $row){
					$entry[$row->inventory_id] = $row->quantity;
				}
			}

			$data['entries'] = $entry;
			$this->load->view('inventory/view',$data);
		}

		//add
		function add()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post())
				{
					$inventory_details = array(
						'is_active'					=> 1,
						'supplier_id'				=> $this->input->post('supplier'),
						'inventory_name'			=> $this->input->post('inventory_name'),
						'inventory_description'		=> $this->input->post('inventory_description'),
						'inventory_location'		=> $this->input->post('inventory_location'),
						'inventory_measurement'		=> $this->input->post('inventory_measurement'),
						'inventory_level'			=> $this->input->post('inventory_level'),
						'inventory_unit'			=> $this->input->post('inventory_unit')
					);

					//insert to database
					$this->commonmodel->insert('inventory_tbl',$inventory_details);

					//redirect to inventory table
					redirect('inventory');				
				}
				else
				{
					$data['suppliers'] = $this->commonmodel->getSuppliers();

					$this->load->view('inventory/add',$data);
				}
			}
			else{
				redirect('inventory');
			}
		}

		//edit
		function edit()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post())
				{
					//check if user exist
					$result = $this->commonmodel->getOne('inventory_tbl','id',$this->input->post('inventory_id'));
					
					if($result)
					{
						/*if($this->input->post('expiration_date') == "0"){
							$exploded_dates = explode('/',$this->input->post('inventory_expiry'));
							$expiration = $exploded_dates[2].'-'.$exploded_dates[0].'-'.$exploded_dates[1];
						}
						else{
							$expiration = $this->input->post('expiration_date');
						}
						*/

						$inventory_details = array(
							'inventory_name'			=> $this->input->post('inventory_name'),
							'inventory_description'		=> $this->input->post('inventory_description'),
							'inventory_location'		=> $this->input->post('inventory_location'),
							'inventory_measurement'		=> $this->input->post('inventory_measurement'),
							'inventory_level'			=> $this->input->post('inventory_level'),
							'inventory_unit'			=> $this->input->post('inventory_unit')
						);	
						
						//save to database
						$this->commonmodel->update('inventory_tbl','id',$this->input->post('inventory_id'),$inventory_details);

						//redirect to inventory table
						redirect('inventory');										
					}
					else
					{
						redirect('inventory');
					}
				}
				else
				{
					//$data['items'] = $this->commonmodel->getOne('inventory_tbl','id',end($this->uri->segments));
					$data['items'] = $this->commonmodel->updateInventory(end($this->uri->segments));
					$data['suppliers'] = $this->commonmodel->getSuppliers();
					//check if user exists in database
					if($data['items'])
					{
						$this->load->view('inventory/edit',$data);
					}
					else
					{
						redirect('inventory');
					}				
				}				
			}
			else{
				redirect('inventory');
			}
		}

		//delete
		function delete()
		{
			if($this->session->userdata('user_type') == 1){
				if($this->input->post())
				{
					//explode the values
					$exploded_values = explode(',',$this->input->post('items_to_delete'));

					foreach($exploded_values as $exploded_value)
					{
						$values = array(
							'is_active'		=> 0
						);
						$this->commonmodel->update('inventory_tbl','id',$exploded_value,$values);					
					
						$this->commonmodel->update('inventory_entry_tbl','inventory_id',$exploded_value,$values);	
					}
					redirect('inventory');				
				}
				else
				{
					redirect('inventory');
				}
			}
			else{
				redirect('inventory');
			}
		}
	}