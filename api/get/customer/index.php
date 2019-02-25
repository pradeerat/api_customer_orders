<?php

// Required headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//include_once $_SERVER['DOCUMENT_ROOT'].'/api_customer_orders/config/db_conn.php';
include_once '../../../config/db_conn.php';
include_once '../../../data/customer.php';

$db_conn = new DBconn();
$conn = $db_conn->db_connection();
  
$get_cust = new Customer();

if (
	(isset($_REQUEST['id']) && $_REQUEST['id'] != '') || 
	(isset($_REQUEST['customer_id']) && $_REQUEST['customer_id'] != '')
){

	$id = htmlspecialchars($_REQUEST['id']);
}
else $id = 0;

$query_res = $get_cust->get_customer($conn, $id);

if (!empty($query_res))
{
	$arr_result = array();

	while ($row = $query_res->fetch_assoc())
	{
		if ($query_res->num_rows > 1)
		{
			//$arr_result['data'][] = $row;
			$arr_result[] = $row;				
		}
		else
		{
			$arr_result['id'] = $id;		
			$arr_result['cust_name'] = $row['cust_name'];
			$arr_result['cust_addr'] = $row['cust_addr'];		
			$arr_result['email'] = $row['email'];
			$arr_result['phone'] = $row['phone'];
			$arr_result['unit_price'] = $row['unit_price'];
			$arr_result['order_quantity'] = $row['order_quantity'];
			$arr_result['order_date'] = $row['order_date'];
			$arr_result['delivery_date'] = $row['delivery_date'];
		}
		//echo json_encode($arr_result);
	}

   // Set to response code, 200 - OK
   http_response_code(200);

	echo json_encode($arr_result);
}
else
{
	// Set to response code, 404 - No records found
	http_response_code(404);

	//echo json_encode('No existing customers');
	echo json_encode(array('Message'=> 'No existing customer/s'));
}
?>