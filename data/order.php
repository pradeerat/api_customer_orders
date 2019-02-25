<?php
//--- Data manipulation, tables: customer, customer_order tables ---

class Order
{
	private $result;

	public function get_cust_order($conn, $id=FALSE)
	{
		if (isset($id) && $id != 0)
		{
			/*
			// Get orders of a particular customer
			$sql = "SELECT customer_order.*, CONCAT(customer.first_name, ' ', customer.last_name) as customer_name, inventory.item_code, inventory.item_name
				FROM customer 
				LEFT JOIN customer_order ON customer.id = customer_order.customer_id
				LEFT JOIN inventory ON customer_order.item_id = inventory.id
				WHERE customer.id = '$id'";
				ORDER BY customer.first_name, customer_order.order_date, inventory.item_name";
			*/
			// Get particular order details
				$sql = "SELECT customer_order.*, CONCAT(customer.first_name, ' ', customer.last_name) as customer_name, inventory.item_code, inventory.item_name
					FROM customer_order 
					LEFT JOIN customer ON customer_order.customer_id = customer.id
					LEFT JOIN inventory ON customer_order.item_id = inventory.id
					WHERE customer_order.id = '$id'
					ORDER BY customer.first_name, customer_order.order_date, inventory.item_name";
		}
		else
		{
			// Get all existing customer orders
			$sql = "SELECT customer_order.*, CONCAT(customer.first_name, ' ', customer.last_name) as customer_name, inventory.item_code, inventory.item_name
				FROM customer_order 
				LEFT JOIN customer ON customer_order.customer_id = customer.id
				LEFT JOIN inventory ON customer_order.item_id = inventory.id
				ORDER BY customer.first_name, customer_order.order_date, inventory.item_name";
		}
		
		$this->result = $conn->query($sql);
		
		if ($this->result->num_rows > 0)
		{
			return $this->result;
		}
		else
		{
			//return 'no records';
			return '';
		}

		$conn->close;
	}
}
?>