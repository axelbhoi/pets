<?php

	class Dashboard extends CI_Controller{

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
			$total_items = 0;

			$data['supplier_count'] = $this->commonmodel->supplier_count();

			$data['transactions_count'] = $this->commonmodel->transactions_count();

			$data['clients_count'] = $this->commonmodel->client_count();

			$alertExpiry = $this->commonmodel->alertExpiry();

			$alertLevel = $this->commonmodel->alertLevel();

			$data['total_alerts'] = count($alertExpiry) + count($alertLevel);

			$data['transactions'] = $this->commonmodel->dashboardTransactions();

			$data['services_count'] = count($this->commonmodel->countServices(date('m'),date('Y')));

			if($this->commonmodel->countItems(date('m'),date('Y'))){
				foreach($this->commonmodel->countItems(date('m'),date('Y')) as $row){
					$total_items = $total_items + $row->total;
				}
			}


			$data['items_count'] = $total_items;

			$this->load->view('dashboard',$data);
		}
	}