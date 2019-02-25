<?php
//--- Data manipulation, table: customer ---

class Customer
{
	private $result;

	public function get_customer($conn, $id=FALSE)
	{
		if (isset($id) && $id != 0)
		{
			// Get orders of a particular customer.
			/*
			//$sql = "SELECT CONCAT(customer.first_name, ' ', customer.last_name) as cust_name, customer.email, customer.phone, CONCAT(customer.address1, ' ', customer.address2, ' ', customer.city, ' ', customer.country) as cust_addr, inventory.item_name, inventory.unit_price, customer_order.order_quantity, customer_order.order_date, customer_order.delivery_date 
			$sql = "SELECT customer.id, CONCAT(customer.first_name, ' ', customer.last_name) as cust_name, customer.email, customer.phone, CONCAT(customer.address1, ' ', customer.address2, ' ', customer.city, ' ', customer.country) as cust_addr, inventory.item_name, inventory.unit_price, customer_order.order_quantity, customer_order.order_date, customer_order.delivery_date 
			FROM customer 
			INNER JOIN customer_order ON customer.id = customer_order.customer_id 
			INNER JOIN inventory ON inventory.id = customer_order.item_id
			WHERE customer.id = '$id'";
			*/
			
			$sql = "SELECT customer.id, CONCAT(customer.first_name, ' ', customer.last_name) as cust_name, customer.email, customer.phone, CONCAT(customer.address1, ' ', customer.address2, ' ', customer.city, ' ', customer.country) as cust_addr, inventory.item_name, inventory.unit_price, customer_order.order_quantity, customer_order.order_date, customer_order.delivery_date 
			FROM customer 
			LEFT JOIN customer_order ON customer.id = customer_order.customer_id 			
			LEFT JOIN inventory ON inventory.id = customer_order.item_id
			WHERE customer.id = '$id'";
			
		}
		else
		{
			// Get all customers regardless of their orders.

			$sql = "SELECT CONCAT(customer.first_name, ' ', customer.last_name) as cust_name, customer.email, customer.phone, CONCAT(customer.address1, ' ', customer.address2, ' ', customer.city, ' ', customer.country) as cust_addr, inventory.item_name, inventory.unit_price, customer_order.order_quantity, customer_order.order_date, customer_order.delivery_date 
			FROM customer 
			LEFT JOIN customer_order ON customer.id = customer_order.customer_id 
			LEFT JOIN inventory ON inventory.id = customer_order.item_id
			ORDER BY customer.first_name";
		}
		
		$this->result = $conn->query($sql);

		if (($this->result) == true && $this->result->num_rows > 0)
		{
				//$conn->close;
				return $this->result;
		}
		else
		{
			//return 'no records';
			return '';
		}
	}
	//---end function get_customer

	public function add_customer($conn, $data)
	{
		$first_name = htmlspecialchars($data->first_name);
		$last_name = htmlspecialchars($data->last_name);
		$email = htmlspecialchars($data->email);
		$phone = htmlspecialchars($data->phone);			
		$address1 = htmlspecialchars($data->address1);			
		$address2 = htmlspecialchars($data->address2);			
		$city = htmlspecialchars($data->city);			
		$state = htmlspecialchars($data->state);						
		$postal_code = htmlspecialchars($data->postal_code);
		$country = htmlspecialchars($data->country);
		
		$sql = 	"INSERT INTO customer(first_name, last_name, email, phone, address1, address2, city, state, postal_code, country)
				  	VALUES (
					'$first_name',
					'$last_name',	
					'$email',									  								  
					'$phone',									  
					'$address1',									  
					'$address2',									  
					'$city',									  
					'$state',									  
					'$postal_code',					  
					'$country'								  
					)";
		$this->result = $conn->query($sql);
		
		if ($this->result === TRUE)
		{
			return $conn->insert_id;
			//$conn->close;
		}
	}
	//---end function update_customer
	
	public function update_customer($conn, $data)
	{
		$id = htmlspecialchars($data->id);
		$first_name = htmlspecialchars($data->first_name);
		$last_name = htmlspecialchars($data->last_name);
		$email = htmlspecialchars($data->email);
		$phone = htmlspecialchars($data->phone);			
		$address1 = htmlspecialchars($data->address1);			
		$address2 = htmlspecialchars($data->address2);			
		$city = htmlspecialchars($data->city);			
		$state = htmlspecialchars($data->state);						
		$postal_code = htmlspecialchars($data->postal_code);
		$country = htmlspecialchars($data->country);

		$sql = "SELECT id FROM customer WHERE id = '$id'";
		$this->result = $conn->query($sql);

		if ($this->result->num_rows == 0)
		{
			return '';
		}
		
		$sql = 	"UPDATE customer
					SET first_name = '$first_name',
					last_name = '$last_name',
					email = '$email',
					phone = '$phone',	
					address1 = '$address1',
					address2 = '$address2',
					city = '$city',
					state = '$state',
					postal_code = '$postal_code',
					country = '$country'
		WHERE id = '$id'";
		
		$this->result = $conn->query($sql);
		
		if ($this->result === TRUE)
		{
			return htmlspecialchars($data->id);
		}
	}
	//---end function update_customer
	
	public function delete_customer($conn, $data)
	{
		$id = htmlspecialchars($data->id);
		
		$sql = 	"DELETE FROM customer WHERE id = '$id'";
		
		$this->result = $conn->query($sql);
		
		if ($this->result === TRUE && $conn->affected_rows > 0)
		{
			return htmlspecialchars($data->id);
		}
	}
	//---end function delete_customer
}
// ---end class Customer
?>