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

<div class="main-container">
    <div class="container mt-3">
          <h2 class="logintext1">My Candy Products</h2>
          <p>These are the following products. You can modify each of list.</p> 

          <table class="table table-hover">
            <thead>
              <tr>
                <th> </th>
                <th>Products</th>
                <th>Stocks</th>
                <th>Price</th>
                <th style="text-align:center;">SOLD</th>
                 <th style="text-align:center;">Modify</th>
              </tr>
            </thead>
            <tbody>


                <?php
                    $get = "SELECT * FROM tbl_products order by id desc";

                    if ($result = (mysqli_query($connection, $get)))
                    {
                    while ($data = mysqli_fetch_array($result))
                    {
                    $id = $data['id'];
                    $name = $data['name'];
                    $stocks = $data['stocks'];
                    $price = $data['price'];
                    $sold = $data['sold'];
                    $sale = $sold * $price;
                ?>
              <tr>
                <td>
                    <div class="form-check hered">
                        <input class="form-check-input" onclick='printChecked()' type="checkbox" 
                        id="orderid"  name="orderid" value="<?php echo $id ?>"> 
                    </div>
                </td>
    
                <td><?php echo $name ?></td>
                <td><?php echo $stocks ?></td>
                <td><?php echo $price ?></td>
                <td style="text-align:center;"><p class="sold"><?php echo $sold ?></p></td>
                <td style="text-align:center;"><div class="alldatahere">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#updatemodal" class="editbtn updatebtn">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                    </button>
                    <button type="button" class="deletebtn" data-bs-toggle="modal" data-bs-target="#deletemodal">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <input type="hidden" name="prodid" id="prodid" value="<?php echo $id ?>">
                    <input type="hidden" name="prodname" id="prodname" value="<?php echo $name ?>">
                    <input type="hidden" name="prodstock" id="prodstock" value="<?php echo $stocks ?>">
                    <input type="hidden" name="prodprice" id="prodprice" value="<?php echo $price ?>">
                    </div>

                    <input type="hidden" class="form-control sale" id="sale" name="sale" value="<?php echo $sale;?>">
                </td>

                         
              </tr>
              <?php }
                }
                ?>



                <tr style="background-color: #E1E1E1">
                <td>
                </td>
                <td>
                </td>
                <td></td>
                <td></td>
                <td style="text-align:center;">
                    <P class="totainput">TOTAL SALE</P>
                </td>
                <td style="width:30%;">
                    <input  type="number" class="form-control" id="total" name="total">
                </td>
                
                         
              </tr>


            </tbody>
          </table>


                      <!-- for functions and buttons -->
                      <br>
                      <div class="row">

                        <div class="col-sm-6">
                            
                        </div>

                        <div class="col-sm-6">
                            <form action="sell.php" method="post">
                                <input type="hidden" name="allids" id="allids" >
                                <button type="submit" class="cancelbtn">Sell product</button>
                            </form>
                            <button type="submit" data-bs-toggle="modal" data-bs-target="#myModal" class="guidebtn">Add new product</button>
                        </div>
                          
                      </div>
                      <?php include 'modal.php';?>
                     <!-- -------------------------------------------------------------------- -->


       



<script type="text/javascript">

            function printChecked(){
                    var items=document.getElementsByName('orderid');
                    var selectedItems="";

                    for(var i=0; i<items.length; i++){
                        if(items[i].type=='checkbox' && items[i].checked==true)
                            selectedItems+=items[i].value+",";
                    }
                    

                    $("#allids").val(selectedItems+'0');
                }

   $(document).ready(function(){

   var sum = 0;
    $("input[class *= 'sale']").each(function(){
        sum += +$(this).val();
    });

    $("#total").val(sum);


    $('.addbtn').click(function(){

        var name = $('#name').val();
        var price = $('#price').val();
        var stocks = $('#stocks').val();

        if (name.length == " ") {alert("Product name required.");}
            else if(price.length == " ") {alert("Price required.");}
                else if(stocks.length == " ") {alert("Stocks required.");}

        else
        {
            $.ajax({
                method: "POST",
                url: "save.php",
                data:{
                    'name': name,
                    'price': price,
                    'stocks': stocks
                },
                success:function (){
                    setTimeout(function(){ 
                        location.reload(); 
                        }, 
                        1400);

                      $( "div.err4" ).fadeIn(200 ).delay(1200).fadeOut( 800 );
                } 
           });

        }

    });


    //if delete click 
    $('.deletebtn').click(function(){

        var prodid = $(this).closest('.alldatahere').find("input[name=prodid]").val();
        $('#deletename').val(prodid);

    });


    // for delete function
    $('.sellbtn').click(function(){

        var allids = $('#allids').val();
    
            $.ajax({
                method: "POST",
                url: "sell.php",
                data:{
                    'allids': allids
                },
                success:function (){
                    setTimeout(function(){ 
                        location.reload(); 
                        }, 
                        1400);

                     window.location.href = "sell.php";
                } 
           });


    });




    // for delete function
    $('.continuedelete').click(function(){

        var id = $('#deletename').val();
    

            $.ajax({
                method: "POST",
                url: "delete.php",
                data:{
                    'id': id
                },
                success:function (){
                    setTimeout(function(){ 
                        location.reload(); 
                        }, 
                        1400);

                      $( "div.err4" ).fadeIn(200 ).delay(1200).fadeOut( 800 );
                } 
           });


    });


    //if delete click 
    $('.updatebtn').click(function(){

        var prodid = $(this).closest('.alldatahere').find("input[name=prodid]").val();
        var prodname = $(this).closest('.alldatahere').find("input[name=prodname]").val();
        var prodstock = $(this).closest('.alldatahere').find("input[name=prodstock]").val();
        var prodprice = $(this).closest('.alldatahere').find("input[name=prodprice]").val();

        $('#updateid').val(prodid);
        $('#updatename').val(prodname);
        $('#updatestocks').val(prodstock);
        $('#updateprice').val(prodprice);

    });

});
</script>

</body>
</html>
