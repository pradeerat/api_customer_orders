<?php
//--- Data manipulation, table: inventory ---

class Product
{
	private $result;

	public function get_product($conn, $id=FALSE)
	{
		if (isset($id) && $id != 0)
		{
			$sql = "SELECT * FROM inventory WHERE id = '$id'";
		}
		else
		{
			$sql = "SELECT * FROM inventory ORDER BY item_name";
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