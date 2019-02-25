<!DOCTYPE html>
<html>
<head>
 	<link rel="stylesheet" href="css/styles.css">
	<title>Consume API</title>

<script>

function validate_input()
{
//alert('test');
	if (document.getElementById("customer_id").value == "")
	{
		alert("Customer ID is required, please enter it.");
		document.getElementById("customer_id").focus();
		return false;
	}
	return false;
}
</script>

</head>

<body>

<div class="main">

<h3>Get a Customer with order details</h3> 
  
<form action="" method="post" />
<!--<form action="" method="post" onSubmit="return validate_input();" />-->
	<p class='elements'>
	<label for "customer_id">Customer ID:</label>
	<input type="text" name="customer_id" placeholder="Customer ID" required/>
	</p>

	<p class='elements'><button type="submit" name="submit">Submit</button></p>
<br/>
</form>    

<?php
if (isset($_POST['customer_id']) && $_POST['customer_id']!="")
{
	$url = "http://127.0.0.1/api_customer_orders/api/get/customer/?id=".$_POST['customer_id'];

	$cus_url = curl_init($url);
	curl_setopt($cus_url,CURLOPT_RETURNTRANSFER,true);
	$cus_res = curl_exec($cus_url);
	
	$customer = json_decode($cus_res, true);

	if (isset($customer['Message']) && $customer['Message'] == 'No existing customer/s')
	{
		print "<p style='color: red;' class='elements'>".$customer['Message']."</p>";
	}
	else if (count($customer) == count($customer, COUNT_RECURSIVE))
	{		
		echo "<table>";
		echo "<tr><td>Customer ID:</td><td>".$customer['id']."</td></tr>";
		echo "<tr><td>Customer name:</td><td>".$customer['cust_name']."</td></tr>";
		echo "<tr><td>Address:</td><td>".$customer['cust_addr']."</td></tr>";
		echo "<tr><td>Email:</td><td>".$customer['email']."</td></tr>";
		echo "<tr><td>Phone:</td><td>".$customer['phone']."</td></tr>";
		
		if ($customer['order_quantity'] != "")
		{
			$amount = floatval($customer['unit_price']) * floatval($customer['order_quantity']);
			$order_date = Date('d-m-Y', strtotime($customer['order_date']));
			$delivery_date = Date('d-m-Y', strtotime($customer['delivery_date']));

			echo "<tr><td>Quantity Ordered:</td><td>".$customer['order_quantity']."</td></tr>";
			echo "<tr><td>Amount:</td><td>$ $amount</td></tr>";
			echo "<tr><td>Order Date:</td><td>$order_date</td></tr>";
			echo "<tr><td>Delivery Date:</td><td>$delivery_date</td></tr>";
		}
		echo "</table>";
	}
	else
	{
		foreach ($customer as $cust)
		{
			echo "<p class='content'> Customer ID: ".$cust['id']."</p>";
			echo "<p class='content'> Customer name: ".$cust['cust_name']."</p>";
			echo "<p class='content'> Address: ".$cust['cust_addr']."</p>";
			echo "<p class='content'> Email: ".$cust['email']."</p>";
			echo "<p class='content'> Phone: ".$cust['phone']."</p>";
			break;
		}
		
		echo "<hr>";

		echo "<table class='content'>";
		foreach ($customer as $cust)
		{
			if ($cust['order_quantity'] != "")
			{
				$amount = floatval($cust['unit_price']) * floatval($cust['order_quantity']);
				$order_date = Date('d-m-Y', strtotime($cust['order_date']));
				$delivery_date = Date('d-m-Y', strtotime($cust['delivery_date']));
		
				echo "<tr><td>Quantity Ordered:</td><td>".$cust['order_quantity']."</td></tr>";
				echo "<tr><td>Amount:</td><td>$ $amount</td></tr>";
				echo "<tr><td>Order Date:</td><td>$order_date</td></tr>";
				echo "<tr><td>Delivery Date:</td><td>$delivery_date</td></tr>";
				echo "<tr><td></td><td></td></tr>";
			}
			else
				break;
		}
		echo "</table>";
	}
}
?>
</div>

</body>
</html>