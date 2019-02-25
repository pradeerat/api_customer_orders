<?php

// Set required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../../../../config/db_conn.php';
include_once '../../../../data/customer.php';

$db_conn = new DBconn();
$conn = $db_conn->db_connection();
  
$customer = new Customer();

/*
//TEST code
$json_str = '
{
	"id" : "14",
	"first_name" : "Test first",
	"last_name" : "Last",
	"email" : "test@ttdom.com",
	"phone" : "",
	"address1" : "3",
	"address2" : "",
	"city" : "",
	"state" : "",
	"postal_code" : "",
	"country" : ""
}';
$post_data = json_decode ($json_str);
*/

$post_data = json_decode(file_get_contents('php://input'));

if (isset($post_data) && !empty($post_data->id))
{
	$res = $customer->update_customer($conn, $post_data);
}

if (!empty($res))
{
   // Set to response code, 200 - OK
   http_response_code(200);

	echo json_encode(array('Message'=> 'Customer update successful', 'Id' => $res));
}
else
{
	// Set to response code, 404 - No records found
	http_response_code(404);

	echo json_encode(array('Message'=> 'Failed to update customer'));
}
?>