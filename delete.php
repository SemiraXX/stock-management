
<?php include 'database.php';?>
<?php

	
	
	$id=$_POST['id'];

	$query = "DELETE FROM tbl_products  WHERE id = '$id'";

    mysqli_query($connection, $query);

?>