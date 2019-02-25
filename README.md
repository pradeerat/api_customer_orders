# api_customer_orders
Create (CRUD options )and consume API for customer orders

Get Requests

Retrieve all customers with their order details:
http://127.0.0.1/api_customer_orders/api/get/customer/

Retrieve a particular customer and its order details by providing customer ID
(Ex: ID = 2)

http://127.0.0.1/api_customer_orders/api/get/customer/?id=2

Retrieve all orders in file:
http://127.0.0.1/api_customer_orders/api/get/customer_order/

Retrieve a particular order by sending its Order ID:
http://127.0.0.1/api_customer_orders/api/get/customer_order/?id=1
(Ex: ID = 1)

Retrieve all product/ item in file:
http://127.0.0.1/api_customer_orders/api/get/product/

Retrieve a particular item in file by providing its iD:

http://127.0.0.1/api_customer_orders/api/get/product/?id=2
(Ex: ID = 3)

---

Post Requests:

Use a test client such as Postman for Post Requests.

Add a new customer by sending nessary details:

Ex:

http://127.0.0.1/api_customer_orders/api/post/customer/add/

{	
	"first_name" : "Shyannn",
	"last_name" : "Nutruik",
	"email" : "Nutruik@test123dom.com",
	"phone" : "1234567890",
	"address1" : "123",
	"address2" : "Some Street",
	"city" : "Auckland",
	"state" : "",
	"postal_code" : "1010",
	"country" : "New Zealand"
}

If the request is successful you recieve, for example:

{
 "Message": "Customer added",
    "Id": 12}

Or if something goes wrong:

{"Message":"Failed to add customer"}



Delete a customer by sending its ID:

Ex:

http://127.0.0.1/api_customer_orders/api/post/customer/delete/

{
"id" : "13"
}

If Successful:

{
 "Message": "Customer deleted",
    "Id": "13"
}

Else

{"Message":"Failed to delete customer"}


Update a Customer by providing its ID

Ex:

http://127.0.0.1/api_customer_orders/api/post/customer/update/

{
	"id" : "14",
	"first_name" : "Testfirst",
	"last_name" : "Last",
	"email" : "test@testdom.com",
	"phone" : "476544443",
	"address1" : "3",
	"address2" : "SomeStr",
	"city" : "SomeCity",
	"state" : "SomeState",
	"postal_code" : "1111",
	"country" : "SomeCtry"
}

If Successful:

{
 "Message": "Customer update successful",
    "Id": "14"
}


If failed:

{
 "Message": "Failed to update customer"
}

-------------

Using API Client:

Send Get Requests via API client:

Get a customer (with order details):

1. Enter Customer ID and click on Submit button.
2. If the customer found on file, details will be dispalyed on screen.
3. If the customer has any orders, order details also will be displayed.
4. If the customer does not exist, a message will be displayed on screen.




