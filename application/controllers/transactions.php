<?php

	class Transactions extends CI_Controller{

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
			$data['transactions'] = $this->commonmodel->transactions();

			$this->load->view('transactions/view',$data);
		}

		function add()
		{
			if($this->input->post())
			{

				if($this->input->post('transaction-type') == 0){
					//insert to transactions_tbl
					$transactions_values = array(
						'type'			=>	$this->input->post('transaction-type'),
						'emp_id'		=>	$this->session->userdata('user_id'),
						'total_amount'	=>	number_format($this->input->post('total-amount'),2),
						'created_at'	=>	date("Y-m-d H:i:s"),
						'remarks'		=>	$this->input->post('remarks')
					);

					$result = $this->commonmodel->insert_id('transactions_tbl',$transactions_values);	
					
					//insert to transactions_clients_tbl
					//explode pets
					$exploded_pets = explode("@",$this->input->post('pet-id'));

					foreach($exploded_pets as $key=>$value){
						$transactions_clients_values = array(
							'transaction_id'	=>	$result,
							'client_id'		=>	$this->input->post('client_name'),
							'pet_id'			=>	$value
						);

						$this->commonmodel->insert('transactions_clients_tbl',$transactions_clients_values);

						unset($transactions_clients_values);
					}

					//insert to transactions_items_tbl
					if($this->input->post('item_id')){
						foreach($this->input->post('item_id') as $key=>$value){
							$transactions_items_values = array(
								'transaction_id'		=>	$result,
								'inventory_id'			=>	$value,
								'inventory_quantity'	=>	$this->input->post('item_quantity')[$key],
								'inventory_price'		=>	$this->input->post('item_price')[$key]
							);

							$this->commonmodel->insert('transactions_items_tbl',$transactions_items_values);
						
							//get item from inventory table
							$inventory_values = $this->commonmodel->getOne('inventory_entry_tbl','id',$value);

							//update inventory 
							$inventory_item_values = array(
								'item_quantity'	=>	$inventory_values[0]->item_quantity - $this->input->post('item_quantity')[$key]
							);

							$this->commonmodel->update('inventory_entry_tbl','id',$inventory_values[0]->id,$inventory_item_values);
							
							unset($transactions_items_values);
							unset($inventory_item_values);
						}						
					}

					//insert to transactions_services_tbl
					if($this->input->post('service_id')){
						foreach($this->input->post('service_id') as $key=>$value){
							$transactions_services_values = array(
								'transaction_id'	=> $result,
								'service_id'		=> $value,
								'service_amount'	=> $this->input->post('service_amount')[$key]
							);

							$this->commonmodel->insert('transactions_services_tbl',$transactions_services_values);

							unset($transactions_services_values);
						}						
					}
				}
				else{
					//insert to transactions_tbl
					$transactions_values = array(
						'type'			=>	$this->input->post('transaction-type'),
						'emp_id'		=>	$this->session->userdata('user_id'),
						'total_amount'	=>	number_format($this->input->post('total-amount'),2),
						'created_at'	=>	date("Y-m-d H:i:s"),
						'remarks'		=>	""
					);

					$result = $this->commonmodel->insert_id('transactions_tbl',$transactions_values);				

					//insert to transactions_items_tbl
					foreach($this->input->post('item_id') as $key=>$value){
						$transactions_items_values = array(
							'transaction_id'		=>	$result,
							'inventory_id'			=>	$value,
							'inventory_quantity'	=>	$this->input->post('item_quantity')[$key],
							'inventory_price'		=>	$this->input->post('item_price')[$key]
						);

						$this->commonmodel->insert('transactions_items_tbl',$transactions_items_values);
					
						//get item from inventory table
						$inventory_values = $this->commonmodel->getOne('inventory_entry_tbl','id',$value);
					
						//update inventory 
						$inventory_item_values = array(
							'item_quantity'	=>	$inventory_values[0]->item_quantity - $this->input->post('item_quantity')[$key]
						);

						$this->commonmodel->update('inventory_entry_tbl','id',$inventory_values[0]->id,$inventory_item_values);	
						
						unset($transactions_items_values);
						unset($inventory_item_values);
					}
				}
				redirect('transactions');	
			}
			else
			{
				$data['clients'] = $this->commonmodel->getOne('clients_tbl','is_active',1);
				
				$data['pets']	= $this->commonmodel->getOne('pets_tbl','is_active',1);
				
				$data['services'] = $this->commonmodel->getOne('services_tbl','is_active',1);

				$data['items'] = $this->commonmodel->getInventoryExpiry();
	
				$this->load->view('transactions/add',$data);
			}
		}

		function edit()
		{
			if($this->input->post()){

				if($this->input->post('transaction-type') == 1){
					if($this->input->post('remove-id')){
						
						foreach($this->input->post('remove-id') as $key=>$value){
							//delete from transactions items table
							//$this->commonmodel->transaction_delete('transactions_items_tbl','transaction_id','inventory_id','inventory_quantity',$this->input->post('transaction-id'),$value,$this->input->post('remove-quantity')[$key]);

							$this->commonmodel->delete('transactions_items_tbl','id',$value);

							//update inventory_tbl
							$inventory = $this->commonmodel->getOne('inventory_entry_tbl','id',$value);

							$update_array = array(
								'item_quantity'	=> $inventory[0]->item_quantity + $this->input->post('remove-quantity')[$key]
							);

							$this->commonmodel->update('inventory_entry_tbl','id',$value,$update_array);
						
							unset($update_array);										
						}

						//insert to transactions_items_tbl
						foreach($this->input->post('item_id') as $key=>$value){
							$transactions_items_values = array(
								'transaction_id'		=>	$this->input->post('transaction-id'),
								'inventory_id'			=>	$value,
								'inventory_quantity'	=>	$this->input->post('item_quantity')[$key],
								'inventory_price'		=>	$this->input->post('item_price')[$key]
							);

							$this->commonmodel->insert('transactions_items_tbl',$transactions_items_values);
						
							//get item from inventory table
							$inventory_values = $this->commonmodel->getOne('inventory_entry_tbl','id',$value);
						
							//update inventory 
							$inventory_item_values = array(
								'item_quantity'	=>	$inventory_values[0]->item_quantity - $this->input->post('item_quantity')[$key]
							);

							$this->commonmodel->update('inventory_entry_tbl','id',$inventory_values[0]->id,$inventory_item_values);	
							
							unset($transactions_items_values);
							unset($inventory_item_values);
						}					


						//update transactions table
						$transaction_values = array(
							'total_amount'	=> $this->input->post('total-amount')
						);

						$this->commonmodel->update('transactions_tbl','id',$this->input->post('transaction-id'),$transaction_values);
						
					}
					else{
						//insert to transactions_items_tbl
						foreach($this->input->post('item_id') as $key=>$value){
							$transactions_items_values = array(
								'transaction_id'		=>	$this->input->post('transaction-id'),
								'inventory_id'			=>	$value,
								'inventory_quantity'	=>	$this->input->post('item_quantity')[$key],
								'inventory_price'		=>	$this->input->post('item_price')[$key]
							);

							$this->commonmodel->insert('transactions_items_tbl',$transactions_items_values);
						
							//get item from inventory table
							$inventory_values = $this->commonmodel->getOne('inventory_entry_tbl','id',$value);
						
							//update inventory 
							$inventory_item_values = array(
								'item_quantity'	=>	$inventory_values[0]->item_quantity - $this->input->post('item_quantity')[$key]
							);

							$this->commonmodel->update('inventory_entry_tbl','id',$inventory_values[0]->id,$inventory_item_values);	
							
							unset($transactions_items_values);
							unset($inventory_item_values);
						}					


						//update transactions table
						$transaction_values = array(
							'total_amount'	=> $this->input->post('total-amount')
						);

						$this->commonmodel->update('transactions_tbl','id',$this->input->post('transaction-id'),$transaction_values);
					}	
					redirect('transactions');
				}
				else{

					//delete information on transactions_clients_tbl
					$this->commonmodel->deleteTwo('transactions_clients_tbl','transaction_id','client_id',$this->input->post('transaction-id'),$this->input->post('client-id'));

					//insert information in transactions_clients_tbl
					//explode pets
					$exploded_pets = explode("@",$this->input->post('pet-id'));

					foreach($exploded_pets as $key=>$value){
						$transactions_clients_values = array(
							'transaction_id'	=>	$this->input->post('transaction-id'),
							'client_id'			=>	$this->input->post('client-id'),
							'pet_id'			=>	$value
						);

						$this->commonmodel->insert('transactions_clients_tbl',$transactions_clients_values);

						unset($transactions_clients_values);
					}					

					//check if there is a previous service to be removed
					if($this->input->post('remove-service-id')){
						
						//remove service from transactions_services_tbl

						foreach($this->input->post('remove-service-id') as $key=>$value){
							$this->commonmodel->delete('transactions_services_tbl','id',$value);
						}	
					}

					//check if there is a previous item to be removed
					if($this->input->post('remove-items-id')){
						
						//remove items from transactions_items_tbl

						foreach($this->input->post('remove-transactions-inventory-id') as $key=>$value){
							
							$this->commonmodel->delete('transactions_items_tbl','id',$value);
						
							//get the item to be updated
							$inventory = $this->commonmodel->getOne('inventory_tbl','id',$this->input->post('remove-items-id')[0]);

							//set update inventory
							$update_inventory = array(
								'inventory_quantity'	=> $inventory[0]->inventory_quantity + $this->input->post('remove-items-quantity')[0]
							);

							//update inventory table
							$this->commonmodel->update('inventory_tbl','id',$this->input->post('remove-items-id')[0],$update_inventory);
						
							//unset values
							unset($inventory);
							unset($update_inventory);
						}
					}

					//check if there is a service to be added
					if($this->input->post('service_id')){
						
						foreach($this->input->post('service_id') as $key=>$value){
							//set values to be added to transactions_services_tbl
							$added_services = array(
								'transaction_id'	=> $this->input->post('transaction-id'),
								'service_id'		=> $value,
								'service_amount'	=> $this->input->post('service_amount')[$key]
							);
						
							$this->commonmodel->insert('transactions_services_tbl',$added_services);
						}
					}

					//check if there is an item to be added
					if($this->input->post('item_id')){
						foreach($this->input->post('item_id') as $key=>$value){
							$transactions_items_values = array(
								'transaction_id'		=>	$this->input->post('transaction-id'),
								'inventory_id'			=>	$value,
								'inventory_quantity'	=>	$this->input->post('item_quantity')[$key],
								'inventory_price'		=>	$this->input->post('item_price')[$key]
							);

							$this->commonmodel->insert('transactions_items_tbl',$transactions_items_values);
						
							//get item from inventory table
							$inventory_values = $this->commonmodel->getOne('inventory_tbl','id',$value);

							//update inventory 
							$inventory_item_values = array(
								'inventory_quantity'	=>	$inventory_values[0]->inventory_quantity - $this->input->post('item_quantity')[$key]
							);

							$this->commonmodel->update('inventory_tbl','id',$inventory_values[0]->id,$inventory_item_values);
							
							unset($transactions_items_values);
							unset($inventory_item_values);
						}							
					}
				
					//update transactions_tbl
					$transactions_values = array(
						'total_amount'	=>	number_format($this->input->post('total-amount'),2),
						'remarks'		=>	$this->input->post('remarks')
					);

					$this->commonmodel->update('transactions_tbl','id',$this->input->post('transaction-id'),$transactions_values);
				
					redirect('transactions');
				}
			}
			else{
				
				$result = $this->commonmodel->getOne('transactions_tbl','id',end($this->uri->segments));
			
				if($result){
					if($result[0]->type == 1){
						
						$data['transactions'] = $result;

						$data['items'] = $this->commonmodel->getInventoryExpiry();

						$data['products'] = $this->commonmodel->getTransactionInventory(end($this->uri->segments));

						$this->load->view('transactions/products_only',$data);
					}
					else{
						$service_total = 0;

						$items_total = 0;

						$data['transactions'] = $result;

						$data['clients'] = $this->commonmodel->getOne('clients_tbl','is_active',1);
						
						$data['pets']	= $this->commonmodel->getOne('pets_tbl','is_active',1);

						$data['services'] = $this->commonmodel->getAll('services_tbl');

						$data['transaction_clients'] = $this->commonmodel->getTransactionClients(end($this->uri->segments));

						$data['items'] = $this->commonmodel->getInventoryExpiry();

						$data['transaction_services'] = $this->commonmodel->getTransactionServices(end($this->uri->segments));

						$data['products'] = $this->commonmodel->getTransactionInventory(end($this->uri->segments));

						if($data['transaction_services']){
							foreach($data['transaction_services'] as $service){
								$service_total = $service_total + $service->service_amount;
							}
						}	

						if($data['products']){
							foreach($data['products'] as $product){
								$items_total = $items_total + ($product->inventory_price * $product->inventory_quantity);
							}
						}

						$data['service_total'] = number_format($service_total,2,'.','');

						$data['items_total'] = number_format($items_total,2,'.','');

						$this->load->view('transactions/service_products',$data);
					}
				}
				else{
					redirect('transactions');
				}

			}
		}

		function history()
		{
			$result = $this->commonmodel->getOne('transactions_tbl','id',end($this->uri->segments));

			if($result){
				if($result[0]->type == 1){
					$data['transactions'] = $result;

					$data['items'] = $this->commonmodel->getProductsHistory(end($this->uri->segments));

					$this->load->view('transactions/products_history',$data);
				}
				else{
					$data['transactions'] = $result;	

					$data['clients']	= $this->commonmodel->getClients(end($this->uri->segments));

					$data['services'] = $this->commonmodel->getServiceHistory(end($this->uri->segments));

					$data['items'] = $this->commonmodel->getProductsHistory(end($this->uri->segments));

					$this->load->view('transactions/history',$data);
				}
			}
			else{
				redirect('transactions');
			}
		}
	
		function delete()
		{
			if($this->input->post()){
				
				//delete it from transactions_tbl

				$this->commonmodel->delete('transactions_tbl','id',$this->input->post('transaction-id'));

				//check transactions_clients_tbl

				if($this->commonmodel->getOne('transactions_clients_tbl','transaction_id',$this->input->post('transaction-id'))){
					$this->commonmodel->delete('transactions_clients_tbl','transaction_id',$this->input->post('transaction-id'));
				}

				//check transactions_items_tbl

				if($this->commonmodel->getOne('transactions_items_tbl','transaction_id',$this->input->post('transaction-id'))){
					$this->commonmodel->delete('transactions_items_tbl','transaction_id',$this->input->post('transaction-id'));
				}

				//check transactions_services_tbl

				if($this->commonmodel->getOne('transactions_services_tbl','transaction_id',$this->input->post('transaction-id'))){
					$this->commonmodel->delete('transactions_services_tbl','transaction_id',$this->input->post('transaction-id'));
				}				

				redirect('transactions');
			}
			else{
				redirect('transactions');
			}
		}
	}