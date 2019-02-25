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

$post_data = json_decode(file_get_contents('php://input'));

/*
//TEST code
$json_str = '
{
	"id" : "9"
}';
$post_data = json_decode ($json_str);
*/

if (isset($post_data) && !empty($post_data->id))
{
	$res = $customer->delete_customer($conn, $post_data);
}

if (!empty($res))
{
   // Set to response code, 200 - OK
   http_response_code(200);

	echo json_encode(array('Message'=> 'Customer deleted', 'Id' => $res));
}
else
{
	// Set to response code, 404 - No records found
	http_response_code(404);

	echo json_encode(array('Message'=> 'Failed to delete customer'));
}
?>