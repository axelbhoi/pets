<?php

	class Schedule extends CI_Controller{

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
			$this->load->view('schedule/view');
		}

	}