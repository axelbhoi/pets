<?php

	class Sms extends CI_Controller{

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
			$this->load->view('sms/sms');
		}

		function send()
		{
			include_once("ViaNettSMS.php");

			//echo $this->input->post('cpnum');
		
			if($this->input->post()){
				$Username = "pakitodantes1224@gmail.com";
				$Password = "wverh";
				$MsgSender = "09060678425";
				$DestinationAddress = "+63".$this->input->post('cpnum');
				$Message = $this->input->post('msg');

				$ViaNettSMS = new ViaNettSMS($Username, $Password);
				try
				{
					// Send SMS through the HTTP API
					$Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
					// Check result object returned and give response to end user according to success or not.
					if ($Result->Success == true)
						$Message = "Success";
					else
						$Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
				}
				catch (Exception $e)
				{
					//Error occured while connecting to server.
					$Message = $e->getMessage();
				}
				echo $Message;	
			}
			else{
				echo "error";
			}
		}
	}