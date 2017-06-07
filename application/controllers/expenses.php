<?php

	class Expenses extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			// Your own constructor code
			if(($this->session->userdata('is_login') != 1) || $this->session->userdata('user_type') != 1){
				redirect(base_url());
			}	

		}

		function index()
		{
			//check if it exists
			$expense_name = str_replace('_',' ',end($this->uri->segments));

			$result = $this->commonmodel->getOne('operating_expense_list','operating_expense_name',$expense_name);

			$table = "expense_".strtolower(end($this->uri->segments));

			if($result){
				if($this->input->post()){

					$data['fields']  = explode(',',$result[0]->operating_expense_fields);

					$data['expenses'] = $this->commonmodel->getTwo($table,'month','year',$this->input->post('month'),$this->input->post('year'));			

					$data['month'] = $this->input->post('month');
					$data['yer'] = $this->input->post('year');

					$data['years'] = $this->commonmodel->distinctYear($table);
					$data['title'] = $expense_name;
					$data['create_title'] = end($this->uri->segments);
					$this->load->view('expenses/home',$data);						

				}
				else{
					
					$data['expenses'] = "none";

					$data['years'] = $this->commonmodel->distinctYear($table);
					$data['title'] = $expense_name;
					$data['create_title'] = end($this->uri->segments);
					$this->load->view('expenses/home',$data);					
				}
			}
			else{
				redirect('expenses/lists');
			}
		}

		function create()
		{
			$expense_name = str_replace('_',' ',end($this->uri->segments));

			$result = $this->commonmodel->getOne('operating_expense_list','operating_expense_name',$expense_name);
			
			if($this->input->post()){
			
				$new_data = array();
				$new_data_values = array();

				$exploded_data = explode(',',$result[0]->operating_expense_fields);

				$exploded_date = explode('/',$this->input->post('date'));

				foreach($exploded_data as $key=>$value){
					$new_data_values[$value] = $this->input->post($value);
				}
				$new_data_values['month'] = $exploded_date[0];
				$new_data_values['year'] = $exploded_date[2];
				$new_data_values['total'] = $this->input->post('total');

				$table_name = "expense_".strtolower(end($this->uri->segments));

				$this->commonmodel->insert($table_name,$new_data_values);		

				$data['fields'] = $result;
				$data['title'] = $expense_name;
				$data['title_url'] = end($this->uri->segments);
				$data['confirmation'] = "submitted";

				$this->load->view('expenses/create',$data);

			}
			else{
				$data['fields'] = $result;
				$data['title'] = $expense_name;
				$data['title_url'] = end($this->uri->segments);
				$data['confirmation'] = "";

				$this->load->view('expenses/create',$data);
			}
		}

		function lists()
		{
			$data['lists'] = $this->commonmodel->getAll('operating_expense_list');
			$this->load->view('expenses/lists',$data);
		}

		function delete_list()
		{
			if($this->input->post()){
				$this->load->dbforge();
				
				$result = $this->commonmodel->getOne('operating_expense_list','id',$this->input->post('delete_id'));
				
				$this->commonmodel->delete('operating_expense_list','id',$this->input->post('delete_id'));

				$name = strtolower(str_replace(' ','_',$result[0]->operating_expense_name));
			
				$this->dbforge->drop_table('expense_'.$name);
			
				redirect('expenses/lists');
			}
			else{
				redirect('expenses/lists');
			}
		}

		function add(){

			if($this->input->post()){
				$this->load->dbforge();

				$field_name = array();

				//change expense name fields spaces to underscores
				$expense_name = str_replace(' ','_',$this->input->post('expense_name'));

				//check if expense name is unique
				$result = $this->commonmodel->getOne('operating_expense_list','operating_expense_name',$this->input->post('expense_name'));

				if($result){
					redirect('expenses/imap_listscan(imap_stream, ref, pattern, content)');
				}
				else{
					foreach($this->input->post('operating_expense_name') as $key=>$value){
						$field_name[$key] = str_replace(' ','_',$value);
					}

					$imploded_fields = implode(',',$field_name);

					$lists = array(
						'operating_expense_name'	=> $this->input->post('expense_name'),
						'operating_expense_fields'	=> $imploded_fields
					);

					//save
					$this->commonmodel->insert('operating_expense_list',$lists);
					$total_row = count($field_name) -1;
					//create new table
					$new_table = array();
					foreach($field_name as $value){
						$new_table[$value] = array(
							'type' => 'VARCHAR',
							'constraint' => '150'
						);
					}

					$new_table['month'] = array(
						'type'	=> 'VARCHAR',
						'constraint'	=> '2'
					);

					$new_table['year']	= array(
						'type'	=> 'VARCHAR',
						'constraint'	=> '4'
					);

					$new_table['total'] = array(
						'type'	=> 'VARCHAR',
						'constraint'	=> '125'
					);

					$new_table['id'] = array(
						'type'	=> 'int',
						'constraint'	=> '25',
						'auto_increment'	=> TRUE
					);
					
					$table_name = "expense_".$expense_name;
					$this->dbforge->add_field($new_table);
					$this->dbforge->add_key('id',TRUE);
					$this->dbforge->create_table($table_name, TRUE);	
					
					redirect('expenses/lists');
				}
			}
			else{
				$this->load->view('expenses/new_expense');
			}
		}

		function delete()
		{
			if($this->input->post()){
				echo "<pre>";
					print_r($this->input->post());
				echo "</pre>";

				$table = "expense_".strtolower($this->input->post('table'));	
			
				$this->commonmodel->delete($table,'id',$this->input->post('delete_id'));
			
				redirect('expenses/'.$this->input->post('table'));
			}
			else{
				redirect('expenses/lists');
			}
		}
	}