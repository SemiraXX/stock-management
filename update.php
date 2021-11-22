

<?php include 'database.php';?>

<?php

	
	$updatename=$_POST['updatename'];
	$updateprice=$_POST['updateprice'];
	$updatestocks=$_POST['updatestocks'];
	$updateid=$_POST['updateid'];
	

		 $update = "UPDATE tbl_products  SET name = '$updatename', price = '$updateprice', stocks = '$updatestocks'  WHERE  id = '$updateid'";
    	 mysqli_query($connection, $update);


echo '<script>window.location.href = "Stocks.php";</script>';

?>
