<?php

	class Fire extends CI_Controller{

		function index()
		{
			for($i = 0; $i<=25; $i++){
				$test = array(
					'is_active'		=> 1,
					'inventory_id'	=> 00001,
					'item_quantity'	=> 15,
					'item_expiry'	=> '2017-06-18'
				);

				$this->commonmodel->insert('inventory_entry_tbl',$test);
			}
		}
	}