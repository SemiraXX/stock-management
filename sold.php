

<?php include 'database.php';?>
<?php

	
	
	$productid=$_POST['productid'];
	$qty=$_POST['qty'];
	
	foreach ($productid as $key => $id) {
		//var_dump($id, $qty[$key]);

		 $update = "UPDATE tbl_products  SET stocks = stocks - $qty[$key], sold = sold + $qty[$key]  WHERE  id = '$id'";
    	 mysqli_query($connection, $update);

	}

echo '<script>window.location.href = "Stocks.php";</script>';

?>

