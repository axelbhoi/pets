<?php

	class Reports extends CI_Controller{

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
			redirect(base_url());
		}

		function sales_report()
		{
			$grand_total = 0;

			if($this->input->post()){
				$data['reports'] = $this->commonmodel->monthlyItems($this->input->post('month'),$this->input->post('year'));

				$data['years'] = $this->commonmodel->distinctYearReports();
				
				$data['month'] = $this->input->post('month');

				$data['yer'] = $this->input->post('year');

				if(!empty($data['reports'])){
					foreach($data['reports'] as $report){
						$grand_total = $grand_total + $report->total_amount;
					}
				}

				$data['grand_total'] = $grand_total;

				$this->load->view('reports/sales',$data);	
			}
			else{

				$data['years'] = $this->commonmodel->distinctYearReports();

				$data['reports'] = "select";

				$this->load->view('reports/sales',$data);				
			}
		}

		function services_report()
		{
			$grand_total = 0;

			if($this->input->post()){

				$data['reports'] = $this->commonmodel->monthlyServices($this->input->post('month'),$this->input->post('year'));

				$data['years'] = $this->commonmodel->distinctYearReports();
				
				$data['month'] = $this->input->post('month');

				$data['yer'] = $this->input->post('year');

				if(!empty($data['reports'])){
					foreach($data['reports'] as $report){
						$grand_total = $grand_total + $report->total_amount;
					}
				}

				$data['grand_total'] = $grand_total;

				$this->load->view('reports/service',$data);	
			}
			else{
			
				$data['years'] = $this->commonmodel->distinctYearReports();

				$data['reports'] = "select";

				$this->load->view('reports/service',$data);
			}
		}
	
		function inventory_report()
		{
			$data['prints'] = $this->commonmodel->printInventory();
		
			$this->load->view('reports/inventory',$data);
		}

		function print_inventory()
		{
			$data['prints'] = $this->commonmodel->printInventory();

			$this->load->view('reports/print',$data);
		}
	}