<!DOCTYPE html>
<html>
<head>
	<title>Stocks</title>
	<?php include 'cdn.php';?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color:#4267B2">

                    <div class="validation">
                        <div class="alert-box err4 success">Success!</div>
                    </div>

<?php  $connection = mysqli_connect("localhost", "root", "", "stocks");?>


<form action="sold.php" method="post">
<div class="main-container">
    <div class="container mt-3">
          <h2 class="logintext1">Create sale</h2>
          <p>Select products from your stocks.</p> 

          <table class="table table-hover">
            <thead>
              <tr>
                <th style="width:40%">Products</th>
                <th>Stocks</th>
                <th>Price</th>
                <th style="text-align:center;width:200px">Modify Quantity</th>
              </tr>
            </thead>
            <tbody>


                <?php

                  $allids = $_POST['allids'];

                  $idarray = explode(',',$allids);

                    foreach ($idarray as $id) {

                       $query20 = "SELECT * FROM tbl_products where id = '$id' order by id desc";
                    
                  
                    if ($result = (mysqli_query($connection, $query20)))
                    {
                    while ($data = mysqli_fetch_array($result))
                    {
                    $id = $data['id'];
                    $name = $data['name'];
                    $stocks = $data['stocks'];
                    $price = $data['price'];
                    $sold = $data['sold'];
                ?>
              <tr>
    
                <td><?php echo $name ?></td>
                <td><?php echo $stocks ?></td>
                <td><?php echo $price ?></td>
                
                <td style="text-align:center;"><div class="alldatahere">
                   <input type="number" class="form-control" id="qty[]" value="1" name="qty[]">
                    <input type="hidden" class="form-control" id="productid[]" value="<?php echo $id ?>" name="productid[]">
                </td>

                         
              </tr>
              <?php 	}
          			}

                }
                ?>

            </tbody>
          	</table>

                      <!-- for functions and buttons -->
                      <br>
                      <div class="row">

                        <div class="col-sm-6">
                            
                        </div>

                        <div class="col-sm-6">
                            <button type="submit" class="cancelbtn sellbtn">Sell product</button>
                            <a href="stocks.php"><button type="button" class="addbtn">Back</button></a>
                        </div>
                          
                      </div>
                     
                     <!-- -------------------------------------------------------------------- -->

</div>
</form>
<script type="text/javascript">
$(document).ready(function(){

        var name = $('#name').val();
        var price = $('#price').val();
        var stocks = $('#stocks').val();

 });
</script>


</body>
</html>
