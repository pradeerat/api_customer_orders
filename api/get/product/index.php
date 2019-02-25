<?php
// Required headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../../config/db_conn.php';
include_once '../../../data/product.php';

$db_conn = new DBconn();
$conn = $db_conn->db_connection();
  
$get_product = new Product();

if (isset($_REQUEST['id']) && $_REQUEST['id'] != '')
{
	$id = htmlspecialchars($_REQUEST['id']);
}
else $id = 0;

$query_res = $get_product->get_product($conn, $id);

if (!empty($query_res))
{
	$arr_result = array();
	
	while ($row = $query_res->fetch_assoc())
	{
		$arr_result['data'][] = $row;
	}

   // Set to response code, 200 - OK
   http_response_code(200);

	echo json_encode($arr_result);
}
else
{
	// Set to response code, 404 - No records found
	http_response_code(404);

	echo json_encode(array('Message'=> 'No Product/s found'));
}
?>