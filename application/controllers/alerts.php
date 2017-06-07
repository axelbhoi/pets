<?php

	class Alerts extends CI_Controller{

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
			$data['expiry'] = $this->commonmodel->alertExpiry();

			$data['levels'] = $this->commonmodel->alertLevel();

			$this->load->view('alerts',$data);
		}
	}