


<?php include 'database.php';?>
<?php

	
	
	$name=$_POST['name'];
	$price=$_POST['price'];
	$stocks=$_POST['stocks'];

	$datenow = date("F Y h:i:s");
	
	$get = "INSERT INTO tbl_products (id,name,stocks,price,status,sold,date) 
	VALUES ('', '$name','$stocks','$price','ON','0','$datenow')";
     
    mysqli_query($connection, $get);

?>