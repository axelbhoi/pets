<?php

	class commonmodel extends CI_Model{

		function getOne($table,$column1,$compare1)
		{
			$this->db->where($column1,$compare1);

			$query = $this->db->get($table);
			
			if($query->result())
			{
				return $query->result();
			}

			else
			{
				return false;
			}
		}

		function login($table,$column1,$compare1,$column2,$compare2)
		{
			$this->db->where($column1,$compare1);
			$this->db->where($column2,$compare2);

			$query = $this->db->get($table);

			if($query->result())
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}

		function getTwo($table,$column1,$column2,$compare1,$compare2)
		{
			$this->db->where($column1,$compare1);
			$this->db->where($column2,$compare2);

			$query = $this->db->get($table);

			if($query->result())
			{
				return $query->result();
			}
			else
			{
				return false;
			}

		}

		function validate($table,$column1,$column2,$compare1,$compare2)
		{
			$this->db->where($column1,$compare1);
			$this->db->where($column2,$compare2);
			$this->db->where('is_active',1);

			$query = $this->db->get($table);

			if($query->result())
			{
				return $query->result();
			}
			else
			{
				return false;
			}

		}
		
		function supplier_count()
		{
			$query = "SELECT * FROM suppliers_tbl";

			$result = $this->db->query($query);

			return $result->num_rows();			
		}

		function client_count()
		{
			$query = "SELECT * FROM clients_tbl";

			$result = $this->db->query($query);

			return $result->num_rows();
		}

		function transactions_count()
		{
			$query = "SELECT * FROM transactions_tbl";

			$result = $this->db->query($query);

			return $result->num_rows();
		}

		function getAll($table)
		{
			$query = $this->db->get($table);

			return $query->result();
		}

		function insert($table,$values)
		{
			return $this->db->insert($table,$values); 
		}

		function insert_id($table,$values)
		{
			$this->db->insert($table,$values);
			
			return $this->db->insert_id();
		}

		function update($table,$column1,$id,$values)
		{
			$this->db->where($column1,$id);

			return $this->db->update($table,$values);
		}

		function delete($table,$column1,$id)
		{
			$this->db->where($column1,$id);

			return $this->db->delete($table);
		}
		
		function deleteTwo($table,$column1,$column2,$compare1,$compare2)
		{
			$this->db->where($column1,$compare1);

			$this->db->where($column2,$compare2);

			return $this->db->delete($table);
		}

		function transaction_delete($table,$column1,$column2,$column3,$transaction_id,$inventory_id,$quantity)
		{
			$this->db->where($column1,$transaction_id);

			$this->db->where($column2,$inventory_id);

			$this->db->where($column3,$quantity);

			return $this->db->delete($table);
		}

		function getCLientAndPets()
		{
			$query = "SELECT c.*, group_concat(p.pet_name separator ',') AS pet_name
					FROM `clients_tbl` c
					LEFT JOIN `pets_tbl` p
					ON c.id = p.client_id
					WHERE c.is_active = 1
					AND p.is_active = 1
					GROUP BY c.id";
			$result = $this->db->query($query);

			return $result->result();
		}

		function getInventoryExpiry()
		{
			$query = 	"SELECT i.*, it.inventory_name, it.inventory_unit
						FROM `inventory_entry_tbl` i 
						JOIN inventory_tbl it
						ON i.inventory_id = it.id
						WHERE i.item_expiry > curdate()
						OR i.item_expiry = 'none'
						AND i.is_active = 1
						AND it.is_active = 1";		
			$result = $this->db->query($query);
			//date_format(curdate(), '%m/%d/%Y')
			return $result->result();
		}

		function getProductsHistory($id)
		{
			$query = "SELECT et.employee_firstname,et.employee_lastname,t.*, ti.inventory_quantity AS quantity, i.id as inventory_id, i.inventory_name,ti.inventory_price
				FROM transactions_tbl t
				INNER JOIN transactions_items_tbl ti
				ON t.id = ti.transaction_id
				INNER JOIN inventory_entry_tbl ie
				ON ti.inventory_id = ie.id
				INNER JOIN inventory_tbl i
				ON i.id = ie.inventory_id
				INNER JOIN employees_tbl et
				ON t.emp_id = et.id
				WHERE t.id = $id";
			$result = $this->db->query($query);

			return $result->result();
		}

		function getServiceHistory($id)
		{
			$query = 	"SELECT e.employee_firstname,e.employee_lastname,ts.*,s.service_name,s.service_details, t.created_at
						FROM transactions_services_tbl ts
						INNER JOIN transactions_tbl t
						ON ts.transaction_id = t.id
						INNER JOIN services_tbl s
						ON ts.service_id = s.id
						INNER JOIN employees_tbl e
						ON t.emp_id = e.id 
						WHERE ts.transaction_id = $id";
			$result = $this->db->query($query);

			return $result->result();
		}

		function getClients($id)
		{
			$query =	"SELECT c.client_lastname, c.client_firstname, p.pet_name, p.pet_breed
						FROM transactions_clients_tbl tc
						INNER JOIN clients_tbl c
						ON tc.client_id = c.id
						INNER JOIN pets_tbl p
						ON tc.pet_id = p.id
						WHERE tc.transaction_id = $id";
			$result =	$this->db->query($query);

			return $result->result();
		}

		function transactions()
		{
			$query = 	"SELECT e.employee_firstname, e.employee_lastname,t.*, c.client_firstname, c.client_lastname, GROUP_CONCAT(p.pet_name SEPARATOR ',') AS pet_name
						FROM transactions_tbl t
						LEFT JOIN transactions_clients_tbl tc
						ON t.id = tc.transaction_id
						LEFT JOIN clients_tbl c
						ON tc.client_id = c.id
						LEFT JOIN pets_tbl p
						ON tc.pet_id = p.id
						LEFT JOIN employees_tbl e
						ON t.emp_id = e.id
						GROUP BY t.id";
			$result =	$this->db->query($query);

			return $result->result();
		}

		function getTransactionClients($transaction_id)
		{
			$query = 	"SELECT c.id, CONCAT( c.client_firstname,  ' ', c.client_lastname ) AS client_name,  GROUP_CONCAT( p.pet_name SEPARATOR  ',' ) AS pet_name, GROUP_CONCAT( p.id SEPARATOR  ',' ) AS pet_id
				FROM transactions_clients_tbl tc
				LEFT JOIN clients_tbl c ON tc.client_id = c.id
				LEFT JOIN pets_tbl p ON tc.pet_id = p.id
				WHERE tc.transaction_id = $transaction_id
				GROUP BY tc.client_id";
			$result =	$this->db->query($query);

			return $result->result();
		}

		function getTransactionServices($transaction_id)
		{
			$query =	"SELECT ts.id AS main_id,ts.service_id, ts.service_amount, s.service_name, s.service_size
						FROM transactions_services_tbl ts
						LEFT JOIN services_tbl s ON ts.service_id = s.id
						WHERE ts.transaction_id = $transaction_id";
			$result =	$this->db->query($query);

			return $result->result();
		}

		function getTransactionInventory($id)
		{
			$query = 	"SELECT ti.*,i.inventory_name
						FROM transactions_items_tbl ti
						LEFT JOIN inventory_tbl i
						ON ti.inventory_id = i.id
						WHERE ti.transaction_id = $id";
			$result =	$this->db->query($query);

			return $result->result();
		}
	
		function getSalaries($year,$month)
		{
			$query =	"SELECT e.employee_firstname, e.employee_lastname, e.employee_contactnumber, e.employee_sss, e.employee_tin, e.employee_salary, o.overtime, o.total, o.month, o.year, o.id
				FROM employees_tbl e
				JOIN operating_expense_salaries_wages o
				ON o.emp_id = e.id
				WHERE o.year = $year
				AND o.month = $month";
			$result = $this->db->query($query);

			return $result->result();
		}
	
		function distinctYear($table)
		{
			$query =	"SELECT DISTINCT(o.year) AS year FROM $table o ORDER BY o.year DESC";

			$result = $this->db->query($query);

			return $result->result();
		}

		function distinctYearUtilities()
		{
			$query =	"SELECT DISTINCT(o.year) AS year FROM operating_expense_utilities o ORDER BY o.year DESC";

			$result = $this->db->query($query);

			return $result->result();
		}

		function distinctYearOffices()
		{
			$query = "SELECT DISTINCT(o.year) AS year FROM operating_expense_office_supplies o ORDER BY o.year DESC";

			$result = $this->db->query($query);

			return $result->result();
		}

		function distinctYearLicenses()
		{
			$query = "SELECT DISTINCT(o.year) AS year FROM operating_expense_licenses o ORDER BY o.year DESC";

			$result = $this->db->query($query);

			return $result->result();
		}

		function distinctYearReports()
		{
			$query = "SELECT DISTINCT YEAR(t.created_at) AS year FROM transactions_tbl t ORDER BY t.created_at DESC";

			$result = $this->db->query($query);

			return $result->result();
		}

		function totalWage($year,$month)
		{
			$query = "SELECT FORMAT(SUM(replace(o.total, ',', '')), 0) AS total_wage FROM operating_expense_salaries_wages o WHERE o.year = $year AND o.month = $month";
			$result = $this->db->query($query);

			return $result->result();
		}

		function totalUtilities($year,$month)
		{
			$query = "SELECT FORMAT(SUM(replace(o.utility_amount, ',', '')), 0) AS total_utility FROM operating_expense_utilities o WHERE o.year = $year AND o.month = $month";
			$result = $this->db->query($query);

			return $result->result();			
		}

		function totalOffices($year,$month)
		{
			$query = "SELECT FORMAT(SUM(replace(o.office_supplies_amount, ',', '')), 0) AS total_supplies FROM operating_expense_office_supplies o WHERE o.year = $year AND o.month = $month";
			$result = $this->db->query($query);

			return $result->result();				
		}
		function totalLicenses($year,$month)
		{
			$query = "SELECT FORMAT(SUM(replace(o.license_amount, ',', '')), 0) AS total_expense FROM operating_expense_licenses o WHERE o.year = $year AND o.month = $month";
			$result = $this->db->query($query);

			return $result->result();				
		}

		function history($client_id)
		{
			$query = "SELECT t.*, c.client_firstname, c.client_lastname, e.employee_firstname, e.employee_lastname
					FROM transactions_clients_tbl tc
					JOIN transactions_tbl t
					ON tc.transaction_id = t.id
					JOIN clients_tbl c
					ON c.id = tc.client_id
					JOIN employees_tbl e
					ON t.emp_id = e.id
					WHERE tc.client_id = $client_id
					GROUP BY tc.transaction_id";
			$result = $this->db->query($query);

			return  $result->result();
		}

		function detailedTransactions($transaction_id)
		{
			$query = "SELECT t.*, e.employee_lastname, e.employee_firstname
					FROM transactions_tbl t
					JOIN employees_tbl e
					ON t.emp_id = e.id
					WHERE t.id = $transaction_id";
			$result = $this->db->query($query);

			return $result->result();
		}

		function monthlyServices($month,$year)
		{
			$query = "SELECT ts.transaction_id, SUM(ts.service_amount) AS total_amount, group_concat(s.service_name separator ',') AS service_name, group_concat(s.service_amount separator ',') AS service_amount, group_concat(s.service_size separator ',') AS service_size, t.created_at
				FROM transactions_services_tbl ts
				JOIN transactions_tbl t
				ON ts.transaction_id = t.id
				JOIN services_tbl s
				ON ts.service_id = s.id
				WHERE MONTH(t.created_at) = $month
				AND YEAR(t.created_at) = $year
				GROUP BY ts.transaction_id";
		
			$result = $this->db->query($query);

			return $result->result();
		}		

		function monthlyItems($month,$year)
		{
			$query = "SELECT ti.transaction_id, ti.inventory_quantity, ti.inventory_price, i.inventory_name, (ti.inventory_quantity * ti.inventory_price) AS total_amount, t.created_at
					FROM transactions_items_tbl ti
					JOIN transactions_tbl t
					ON ti.transaction_id = t.id
					JOIN inventory_entry_tbl ie
					ON ti.inventory_id = ie.id
					JOIN inventory_tbl i
					ON ie.inventory_id = i.id
					WHERE MONTH(t.created_at) = $month
					AND YEAR(t.created_at) = $year";
			$result = $this->db->query($query);

			return $result->result();
		}

		function newEntry($code)
		{
			$query = "SELECT ie.*, i.inventory_name
					FROM inventory_entry_tbl ie
					JOIN inventory_tbl i
					ON ie.inventory_id = i.id
					WHERE i.id = $code
					AND ie.is_active = 1";
			$result = $this->db->query($query);

			return $result->result();
		}
	
		function updateInventory($id)
		{
			$query = "SELECT i.*, s.id AS suppID, s.supplier_name
					FROM inventory_tbl i
					JOIN suppliers_tbl s
					ON i.supplier_id = s.id
					WHERE i.id = $id
					AND i.is_active = 1";
			$result = $this->db->query($query);

			return $result->result();
		}

		function getSuppliers()
		{
			$query = "SELECT s.*
					FROM suppliers_tbl s
					WHERE s.id > 1
					AND s.is_active = 1";
			$result = $this->db->query($query);

			return $result->result();
		}

		function inventoryReport()
		{
			$query = "SELECT ie.*, i.inventory_name, i.inventory_level, i.inventory_unit
					FROM inventory_entry_tbl ie
					JOIN inventory_tbl i
					ON ie.inventory_id = i.id
					WHERE ie.is_active = 1";
			$result = $this->db->query($query);

			return $result->result();
		}
		
		function printInventory()
		{
			$query = "SELECT i.*, ie.item_quantity, ie.item_expiry
					FROM inventory_entry_tbl ie
					JOIN inventory_tbl i
					ON ie.inventory_id = i.id
					WHERE i.is_active = 1
					AND ie.is_active = 1";
			$result = $this->db->query($query);

			return $result->result();
		}

		function alertExpiry()
		{
			$query = "SELECT ie.*, i.inventory_name
					FROM
					    inventory_entry_tbl ie
					JOIN inventory_tbl i
					ON ie.inventory_id = i.id
					WHERE
					    ie.item_expiry >= DATE(now())
					AND
					    ie.item_expiry <= DATE_ADD(DATE(now()), INTERVAL 7 DAY)";
			$result = $this->db->query($query);

			return $result->result();
		}

		function alertLevel()
		{
			$query = "SELECT ie.*, SUM(ie.item_quantity) AS total_quantity, i.inventory_name, i.inventory_level AS level
				FROM inventory_entry_tbl ie
				JOIN inventory_tbl i
				ON ie.inventory_id = i.id
				WHERE ie.item_expiry >= DATE(now())
				AND ie.is_active = 1
				AND i.is_active = 1
				GROUP BY ie.inventory_id
				HAVING total_quantity <= level";
			$result = $this->db->query($query);

			return $result->result();			
		}
	
		function dashboardTransactions()
		{
			$query = "SELECT t.*, e.employee_firstname, e.employee_lastname
					FROM transactions_tbl t
					JOIN employees_tbl e
					ON t.emp_id = e.id
					ORDER BY t.id DESC
					LIMIT 10";
			$result = $this->db->query($query);

			return $result->result();
		}
	
		function countServices($month,$year)
		{
			$query = "SELECT t.* 
					FROM transactions_tbl t
					JOIN transactions_services_tbl ts
					ON t.id = ts.transaction_id
					WHERE MONTH(t.created_at) = $month
					AND YEAR(t.created_at) = $year";
			$result = $this->db->query($query);

			return $result->result();
		}

		function countItems($month,$year)
		{
			$query = "SELECT t.*, SUM(ti.inventory_quantity) AS total
					FROM transactions_tbl t
					JOIN transactions_items_tbl ti
					ON t.id = ti.transaction_id
					WHERE MONTH(t.created_at) = $month
					AND YEAR(t.created_at) = $year
					GROUP BY ti.inventory_id";
			$result = $this->db->query($query);

			return $result->result();
		}
	
		function inventoryEntry()
		{
			$query = "SELECT ie.inventory_id, SUM(ie.item_quantity) as quantity
						FROM inventory_entry_tbl ie
						WHERE ie.item_expiry >= DATE(now())
						OR ie.item_expiry = 'none'
						GROUP BY ie.inventory_id";
			$result = $this->db->query($query);

			return $result->result();
		}

		function inventorySupplier()
		{
			$query = "SELECT i.*, s.supplier_name
					FROM inventory_tbl i
					JOIN suppliers_tbl s
					ON s.id = i.supplier_id
					WHERE i.is_active = 1";
			$result = $this->db->query($query);

			return $result->result();
		}
	}