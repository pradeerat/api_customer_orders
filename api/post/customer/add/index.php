<?php
// Required headers
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
//TEST
$json_str = '{"first_name" : "Shyannn",
	"last_name" : "Nutruik",
	"email" : "Nutruik@test123dom.com",
	"phone" : "1234567890",
	"address1" : "123",
	"address2" : "Some Street",
	"city" : "Auckland",
	"state" : "",
	"postal_code" : "1010",
	"country" : "New Zealand"
}';
$post_data = json_decode ($json_str);
*/

if (isset($post_data) && !empty($post_data->first_name))
{	
	$res = $customer->add_customer($conn, $post_data);
}

if (!empty($res))
{
   // Set to response code, 200 - OK
   http_response_code(200);

	echo json_encode(array('Message'=> 'Customer added', 'Id' => $res));
}
else
{
	// Set to response code, 404 - No records found
	http_response_code(404);

	echo json_encode(array('Message'=> 'Failed to add customer'));
}
?>